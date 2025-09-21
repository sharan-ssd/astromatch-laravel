<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Exception;
use DateTime;
use DateTimeZone;

class ProkeralaService
{
    protected $panchangUrl = "https://api.prokerala.com/v2/astrology/panchang";
    protected $planetUrl   = "https://api.prokerala.com/v2/astrology/planet-position";
    protected $dasaUrl     = "https://api.prokerala.com/v2/astrology/dasha-periods";
    protected $apiID = 1;

    // ---------------------------
    // Get OAuth token
    // ---------------------------
    protected function getAccessToken()
    {
        $response = Http::asForm()->post('https://api.prokerala.com/token', [
            'grant_type'    => 'client_credentials',
            'client_id'     => config('services.prokerala.client_id'),
            'client_secret' => config('services.prokerala.client_secret'),
        ]);

        if (!$response->successful()) {
            throw new Exception("Failed to fetch access token: " . $response->body());
        }

        return $response->json()['access_token'];
    }

    // ---------------------------
    // Helper: Format datetime with timezone offset
    // ---------------------------
    protected function formatDatetime($birthdate, $birthtime, $timezoneIdentifier)
    {
        $timezone = new DateTimeZone($timezoneIdentifier);
        $date = new DateTime('now', $timezone);
        $offsetSeconds = $timezone->getOffset($date);
        $offsetHours = floor($offsetSeconds / 3600);
        $offsetMinutes = ($offsetSeconds % 3600) / 60;
        $offsetString = sprintf("%+03d:%02d", $offsetHours, $offsetMinutes);

        return $birthdate . "T" . $birthtime . ":00" . $offsetString;
    }

    // ---------------------------
    // Get Thithi, Paksha, Yogam, Karana
    // ---------------------------
    public function getThithiData($coordinates, $birthdate, $birthtime, $timezoneIdentifier, $profileId)
    {
        try {
            $datetime = $this->formatDatetime($birthdate, $birthtime, $timezoneIdentifier);

            $ayanamsa = config('services.report.ayanamsa');

            $token = $this->getAccessToken();

            $response = Http::withToken($token)->get($this->panchangUrl, [
                'ayanamsa'    => $ayanamsa,
                'coordinates' => $coordinates,
                'datetime'    => $datetime,
                'la'          => 'ta',
            ]);

            if (!$response->successful()) {
                throw new Exception("Prokerala API failed: " . $response->body());
            }

            $data = $response->json()['data'];

            // ---------------------------
            // Thithi & Paksha
            // ---------------------------
            $thithiID  = 0;
            $pakshamID = 1;
            $yogamID   = 0;
            $karanaID  = 0;
            $thithi    = null;
            $paksham   = null;

            foreach ($data['tithi'] as $tithiData) {
                if ($datetime > $tithiData['start'] && $datetime < $tithiData['end']) {
                    $thithi  = $tithiData['name'];
                    $paksham = $tithiData['paksha'];
                }
            }

            if ($thithi) {
                $row = DB::table('ab4_thithi_table')->where('thithiName_ta', 'like', $thithi)->first();
                if ($row) $thithiID = $row->thithiID;
            }

            foreach ($data['yoga'] as $yoga) {
                if ($datetime > $yoga['start'] && $datetime < $yoga['end']) $yogamID = $yoga['id'] + 1;
            }
            if ($yogamID == 28) $yogamID = 1;

            foreach ($data['karana'] as $karana) {
                if ($datetime > $karana['start'] && $datetime < $karana['end']) $karanaID = $karana['id'] + 1;
            }
            if ($karanaID == 12) $karanaID = 1;

            if ($paksham && str_contains($paksham, "கிருஷ்ண")) $pakshamID = 2;

            // ---------------------------
            // Log API
            // ---------------------------
            DB::table('ab_proKeralaLog_table')->insert([
                'apiAcID'     => $this->apiID,
                'apiName'     => 'Basic Panchang',
                'coordinates' => $coordinates,
                'datetime'    => $datetime,
                'ayanamsa'    => $ayanamsa,
                'language'    => 'ta',
                'credits'     => 20,
            ]);

            // ---------------------------
            // Update profile
            // ---------------------------
            DB::table('ab15b_astroProfile_table')
                ->where('astroProfileID', $profileId)
                ->update([
                    'thithiID'  => $thithiID,
                    'pakshamID' => $pakshamID,
                    'yogamID'   => $yogamID,
                    'karanaID'  => $karanaID,
                ]);

            \Log::error("Thithi data saved for astroprofileID: " . $profileId);
            return "saved";

        } catch (Exception $ex) {
            \Log::error("Thithi data failed: " . $ex->getMessage());
            return "Thithi data failed: " . $ex->getMessage();
        }
    }

    // ---------------------------
    // Get Planet Positions
    // ---------------------------
    public function getPlanetPositions($coordinates, $birthdate, $birthtime, $timezoneIdentifier, $profileId, $userId, $gender)
    {
        try {
            $datetime = $this->formatDatetime($birthdate, $birthtime, $timezoneIdentifier);

            $ayanamsa = config('services.report.ayanamsa');

            $token = $this->getAccessToken();

            $response = Http::withToken($token)->get($this->planetUrl, [
                'ayanamsa'    => $ayanamsa,
                'coordinates' => $coordinates,
                'datetime'    => $datetime,
                'planets'     => '0,1,2,3,4,5,6,100,101,102',
                'la'          => 'en',
            ]);


            if (!$response->successful()) {
                throw new Exception("Prokerala API failed: " . $response->body());
            }

            $data = $response->json()['data']['planet_position'];

            // Log API usage
            DB::table('ab_proKeralaLog_table')->insert([
                'apiAcID'     => $this->apiID,
                'apiName'     => 'Planet Position',
                'coordinates' => $coordinates,
                'datetime'    => $datetime,
                'ayanamsa'    => $ayanamsa,
                'language'    => 'en',
                'credits'     => 30,
            ]);

            $update = DB::table('ab12_positions_table')->where('astroProfileID', $profileId)->exists();

            $positions = [];
            foreach ($data as $position) {
                $deg = floor($position['degree']);
                $fraction = $position['degree'] - $deg;

                $totalSeconds = round($fraction * 3600); // fraction to total seconds
                $min = intdiv($totalSeconds, 60);
                $sec = $totalSeconds % 60;

                $positions[] = [
                    'planetID' => $this->getPlanetID($position['id']),
                    'rasiID'   => $position['rasi']['id'] + 1,
                    'deg'      => $deg,
                    'min'      => $min,
                    'sec'      => $sec,
                ];
            }

            $positions[] = ['planetID'=>10,'rasiID'=>0,'deg'=>0,'min'=>0,'sec'=>0];

            foreach ($positions as $row) {
                if ($update) {
                    DB::table('ab12_positions_table')
                        ->where('astroProfileID', $profileId)
                        ->where('planetID', $row['planetID'])
                        ->update([
                            'gender'     => $gender,
                            'rasiID'     => $row['rasiID'],
                            'hposDegree' => $row['deg'],
                            'hposMinute' => $row['min'],
                            'hposSecond' => $row['sec'],
                        ]);
                } else {
                    DB::table('ab12_positions_table')->insert([
                        'userID'        => $userId,
                        'astroProfileID'=> $profileId,
                        'gender'        => $gender,
                        'chartID'       => 1,
                        'planetID'      => $row['planetID'],
                        'rasiID'        => $row['rasiID'],
                        'hposDegree'    => $row['deg'],
                        'hposMinute'    => $row['min'],
                        'hposSecond'    => $row['sec'],
                    ]);
                }
            }

            \Log::error("Planet positions saved for astroprofileID: " . $profileId);
            return "success";

        } catch (Exception $ex) {
            \Log::error("Planet position failed: " . $ex->getMessage());
            return "Planet position failed: " . $ex->getMessage();
        }
    }

    // ---------------------------
    // Get Dasha Periods
    // ---------------------------
    public function getDasaDetail($coordinates, $birthdate, $birthtime, $timezoneIdentifier, $profileId)
    {
        try {
            $datetime = $this->formatDatetime($birthdate, $birthtime, $timezoneIdentifier);

            $ayanamsa = config('services.report.ayanamsa');

            $token = $this->getAccessToken();

            $response = Http::withToken($token)->get($this->dasaUrl, [
                'ayanamsa'    => $ayanamsa,
                'coordinates' => $coordinates,
                'datetime'    => $datetime,
                'la'          => 'en',
            ]);


            if (!$response->successful()) {
                throw new Exception("Prokerala API failed: " . $response->body());
            }

            $data = $response->json()['data']['dasha_periods'];

            DB::table('ab_proKeralaLog_table')->insert([
                'apiAcID'     => $this->apiID,
                'apiName'     => 'Match Making - Dasha Periods',
                'coordinates' => $coordinates,
                'datetime'    => $datetime,
                'ayanamsa'    => $ayanamsa,
                'language'    => 'en',
                'credits'     => 200,
            ]);

            foreach ($data as $dasha) {
                $dashaPlanetID = $this->getPlanetID($dasha['id']);
                $dashaName     = $dasha['name'];
                $dashaStart    = $this->convertDate($dasha['start']);
                $dashaEnd      = $this->convertDate($dasha['end']);

                foreach ($dasha['antardasha'] as $bhukthi) {
                    $bhukthiPlanetID = $this->getPlanetID($bhukthi['id']);
                    $bhukthiName     = $bhukthi['name'];
                    $bhukthiStart    = $this->convertDate($bhukthi['start']);
                    $bhukthiEnd      = $this->convertDate($bhukthi['end']);

                    foreach ($bhukthi['pratyantardasha'] as $antara) {
                        $antaraPlanetID = $this->getPlanetID($antara['id']);
                        $antaraName     = $antara['name'];
                        $antaraStart    = $this->convertDate($antara['start']);
                        $antaraEnd      = $this->convertDate($antara['end']);

                        DB::table('ab18_dasaBhukti_table')->insert([
                            'astroProfileID' => $profileId,
                            'dasaLord'       => $dashaName,
                            'dasaPlanetID'   => $dashaPlanetID,
                            'dasaStartDate'  => $dashaStart,
                            'dasaEndDate'    => $dashaEnd,
                            'bhuktiLord'     => $bhukthiName,
                            'bhuktiPlanetID' => $bhukthiPlanetID,
                            'bhukthiStartDate'=> $bhukthiStart,
                            'bhukthiEndDate' => $bhukthiEnd,
                            'antaraLord'     => $antaraName,
                            'antaraPlanetID' => $antaraPlanetID,
                            'antaraStartDate'=> $antaraStart,
                            'antaraEndDate'  => $antaraEnd,
                        ]);
                    }
                }
            }

            \Log::error("Dasa details saved for astroprofileID: " . $profileId);
            return "success";

        } catch (Exception $ex) {
            \Log::error("Dasa detail failed: " . $ex->getMessage());
            return "Dasa detail failed: " . $ex->getMessage();
        }
    }

    // ---------------------------
    // Helper: Map Prokerala planet IDs to local IDs
    // ---------------------------
    protected function getPlanetID($id)
    {
        return match($id) {
            0 => 1,   // Surya
            1 => 2,   // Chandra
            4 => 3,   // Mars
            2 => 4,   // Mercury
            5 => 5,   // Jupiter
            3 => 6,   // Venus
            6 => 7,   // Saturn
            101 => 8, // Rahu
            102 => 9, // Ketu
            default => 0,
        };
    }

    // ---------------------------
    // Helper: Convert API datetime to MySQL datetime
    // ---------------------------
    protected function convertDate($apiDateTime)
    {
        return (new DateTime($apiDateTime))->format('Y-m-d H:i:s');
    }
}