<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Exception;

class PanchangService
{
    protected $baseUrl = "https://api.prokerala.com/v2/astrology/panchang";

    public function getThithiData($coordinates, $birthdate, $birthtime, $timezoneIdentifier, $profileId)
    {
        $thithiID = 0;
        $pakshamID = 0;
        $yogamID = 0;
        $karanaID = 0;
        $message = "";

        try {
            // build datetime with offset
            $timezone = new \DateTimeZone($timezoneIdentifier);
            $date = new \DateTime('now', $timezone);
            $offsetSeconds = $timezone->getOffset($date);
            $offsetHours = floor($offsetSeconds / 3600);
            $offsetMinutes = ($offsetSeconds % 3600) / 60;
            $offsetString = sprintf("%+03d:%02d", $offsetHours, $offsetMinutes);

            $datetime = $birthdate . "T" . $birthtime . ":00" . $offsetString;

            // call Prokerala API
            $response = Http::withBasicAuth(
                config('services.prokerala.client_id'),
                config('services.prokerala.client_secret')
            )->get($this->baseUrl, [
                'ayanamsa'    => config('services.prokerala.client_id'),
                'coordinates' => $coordinates,
                'datetime'    => $datetime,
                'la'          => 'ta', // Tamil
            ]);

            $data = $response->json();

            if (!$response->successful() || empty($data['data'])) {
                throw new Exception("Prokerala API failed: " . $response->body());
            }

            $panchang = $data['data'];

            // ----------------
            // Thithi & Paksha
            // ----------------
            $thithi = null;
            $paksham = null;
            foreach ($panchang['tithi'] as $tithiData) {
                if ($datetime > $tithiData['start'] && $datetime < $tithiData['end']) {
                    $thithi = $tithiData['name'];
                    $paksham = $tithiData['paksha'];
                }
            }

            if ($thithi) {
                $row = DB::table('ab4_thithi_table')
                    ->where('thithiName_ta', 'like', $thithi)
                    ->first();
                if ($row) {
                    $thithiID = $row->thithiID;
                }
            }

            // ----------------
            // Yogam
            // ----------------
            $yogamName = "";
            $count = count($panchang['yoga']);
            foreach ($panchang['yoga'] as $yoga) {
                if ($datetime > $yoga['start'] && $datetime < $yoga['end']) {
                    $yogamName = $yoga['name'];
                    $yogamID = $yoga['id'] + 1;
                }
            }
            if ($yogamID == 28) $yogamID = 1;

            // ----------------
            // Karana
            // ----------------
            foreach ($panchang['karana'] as $karana) {
                if ($datetime > $karana['start'] && $datetime < $karana['end']) {
                    $karanaName = $karana['name'];
                    $karanaID = $karana['id'] + 1;
                }
            }
            if ($karanaID == 12) $karanaID = 1;

            // ----------------
            // Paksham
            // ----------------
            $pakshamID = 1;
            if ($paksham && str_contains($paksham, "கிருஷ்ண")) {
                $pakshamID = 2;
            }

            // ----------------
            // Save API log
            // ----------------
            DB::table('ab_proKeralaLog_table')->insert([
                'apiAcID'    => $apiID,
                'apiName'    => 'Basic Panchang',
                'coordinates'=> $coordinates,
                'datetime'   => $datetime,
                'ayanamsa'   => $ayanamsa,
                'language'   => 'ta',
                'credits'    => 20,
            ]);

            // ----------------
            // Update profile
            // ----------------
            DB::table('ab15b_astroProfile_table')
                ->where('astroProfileID', $profileId)
                ->update([
                    'thithiID'  => $thithiID,
                    'pakshamID' => $pakshamID,
                    'yogamID'   => $yogamID,
                    'karanaID'  => $karanaID,
                ]);

            $message = "saved";
            \Log::info("Thithi data saved for the astroProfile : " . $profileId);
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            \Log::error("Thithi data failed: " . $ex->getMessage());
        }

        return $message;
    }
}
