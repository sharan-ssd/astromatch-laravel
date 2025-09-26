<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\XavierReport;
use Illuminate\Support\Facades\DB; 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\CustomMail;
use Illuminate\Support\Facades\Mail;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\Auth;
use App\Services\ProkeralaService;
use App\Services\StoredProceduresService;

class ReportGeneratorJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    protected $horoscope;
    protected $report_tracker;
    protected $chartId;
    protected $reportLanguage;
    protected $allianceUserGender;
    protected $mainUserGender;
    protected $matchWrtGender;
    protected $astroOrgSDTemplateID;
    protected $astroOrgConfigID;
    
    public function __construct($user, $horoscope)
    {
        $this->user = $user;
        $this->horoscope = $horoscope;
        $this->report_tracker = XavierReport::create([
            'user_id' => $this->user->userID,
            'report_name' => 'Marriage Report Complete',
        ]);
        $this->chartId = config('services.report.chartId');
        $this->reportLanguage = "English";
        $this->mainUserGender = "Male";
        $this->allianceUserGender = "Female";
        $this->matchWrtGender = "Male";
        $this->astroOrgSDTemplateID = config('services.report.astroOrgSDTemplateID');
        $this->astroOrgConfigID = config('services.report.astroOrgConfigID');
        
        session(['xavier_report_id' => $this->report_tracker->xavier_id]);
        session()->save();
    }

    public function handle()
    {
        set_time_limit(30000);

        $data = $this->horoscope;

        \Log::info("Deferred task fired for user: {$this->user->userID}");
        \Log::info("Horoscope Data: " . json_encode($this->horoscope));

        try {
            DB::beginTransaction();
            $this->report_tracker->transitionTo('processing');

            $userId = $this->user->userID;
            $isdCode = $this->user->isdCode ?? '';
            $mobile  = $this->user->mobile ?? '';
            $email   = $this->user->email ?? '';

            $maledob = $data['male-year'].'-'.$data['male-month'].'-'.$data['male-date'];
            $maletob = $this->convertTo24Hour($data['male-hour'], $data['male-minute'], $data['ampm1']);

            $mainProfileId = DB::table('ab15b_astroProfile_table')->insertGetId([
                'astroProfileName'     => $data['fullname_male'],
                'userName'             => $data['fullname_male'],
                'gender'               => 'Male',
                'dateOfBirth'          => $maledob,
                'timeOfBirth'          => $maletob,
                'placeOfBirthCity'     => explode(",", $data['location1'])[0] ?? '',
                'placeOfBirthState'    => explode(",", $data['location1'])[1] ?? '',
                'placeOfBirthCountry'  => explode(",", $data['location1'])[2] ?? '',
                'associatedUserID'     => $userId,
                'isAllianceProfile'    => 'Y',
                'isMainUserProfile'    => 'Y',
                'isdCode'              => $isdCode,
                'mobileNumber'         => $mobile,
                'email'                => $email,
            ]);

            $femaledob = $data['female-year'].'-'.$data['female-month'].'-'.$data['female-date'];
            $femaletob = $this->convertTo24Hour($data['female-hour'], $data['female-minute'], $data['ampm2']);

            $allianceProfileId = DB::table('ab15b_astroProfile_table')->insertGetId([
                'astroProfileName'     => $data['fullname_female'],
                'userName'             => $data['fullname_female'],
                'gender'               => 'Female',
                'dateOfBirth'          => $femaledob,
                'timeOfBirth'          => $femaletob,
                'placeOfBirthCity'     => explode(",", $data['location2'])[0] ?? '',
                'placeOfBirthState'    => explode(",", $data['location2'])[1] ?? '',
                'placeOfBirthCountry'  => explode(",", $data['location2'])[2] ?? '',
                'associatedUserID'     => $userId,
                'isAllianceProfile'    => 'Y',
                'isMainUserProfile'    => 'Y',
                'isdCode'              => $isdCode,
                'mobileNumber'         => $mobile,
                'email'                => $email,
            ]);

            DB::commit();
            \Log::info("Main horoscope created: " . $mainProfileId);
            \Log::info("Alliance horoscope created: " . $allianceProfileId);
            
            $service = new ProkeralaService();

            $maleThithi = $service->getThithiData(
                $data['malecoordinates'],  // coordinates
                $maledob,       // birthdate
                $maletob,            // birthtime
                $data['maletimezone'],     // timezone
                $mainProfileId                // profileId
            );

            $femaleThithi = $service->getThithiData(
                $data['femalecoordinates'],  // coordinates
                $femaledob,       // birthdate
                $femaletob,            // birthtime
                $data['femaletimezone'],     // timezone
                $allianceProfileId                // profileId
            );

            $malePlanetPosition = $service->getPlanetPositions(
                $data['malecoordinates'], 
                $maledob, 
                $maletob, 
                $data['maletimezone'], 
                $mainProfileId, 
                $userId, 
                'Male'
            );

            $femalePlanetPosition = $service->getPlanetPositions(
                $data['femalecoordinates'], 
                $femaledob, 
                $femaletob, 
                $data['femaletimezone'], 
                $allianceProfileId, 
                $userId, 
                'Female'
            );
            
            /*$maleDasa = $service->getDasaDetail(
                $data['malecoordinates'], 
                $maledob, 
                $maletob, 
                $data['maletimezone'], 
                $mainProfileId,
            );

            $femaleDasa = $service->getDasaDetail(
                $data['femalecoordinates'], 
                $femaledob, 
                $femaletob, 
                $data['femaletimezone'], 
                $allianceProfileId,
            );*/


            //Process Future SP Calls

            $spService = new StoredProceduresService();
            $maleProcessResult = $spService->processFuture($userId, $mainProfileId, $this->chartId, $this->reportLanguage);
            \Log::info("Process future executed for Male Horoscope");
            $femaleProcessResult = $spService->processFuture($userId, $allianceProfileId, $this->chartId, $this->reportLanguage);
            \Log::info("Process future executed for Female Horoscope");

            //Calculate Bhavaga SP Call
            $bhavagaMatchResult = $spService->calculateBhavagaMatch($userId, $mainProfileId, $this->mainUserGender, $allianceProfileId, $this->allianceUserGender, $this->chartId, $this->matchWrtGender);
            \Log::info("Bhavaga match calculated");

            // 10point matching method process
            $matchmethod = "10point";            
            $southIndianMatchID = $spService->matchMaking($mainProfileId,$allianceProfileId,$matchmethod,$this->reportLanguage,$userId);
            $southIndianMatchDecisionResult = $spService->quickDezider($southIndianMatchID);

            // 36points matching method process
            $matchmethod = "36points";
            $northIndianMatchID = $spService->matchMaking($mainProfileId,$allianceProfileId,$matchmethod,$this->reportLanguage,$userId);
            $northIndianMatchDecisionResult = $spService->quickDezider($northIndianMatchID);
            
            $matchId = DB::table('ab_savedMatch_table')->insertGetId([
                'userID'              => $userId,
                'mainProfileID'       => $mainProfileId,
                'allianceProfileID'   => $allianceProfileId,
                'firstDecisionID'     => $southIndianMatchID,
                'secondDecisionID'    => $northIndianMatchID,
                'matchMakingMethod'   => '10point',
                'matchDate'           => now(),
                'registrationDate'    => now(),
                'isReportGenerated'   => 'Y',
                'isConfirmationPageNeed' => 'N',
                'toolsReportGenerated' => '',
            ]);

            $this->additionalMatch($mainProfileId,$allianceProfileId,$userId,$matchId);

            $this->report_tracker->transitionTo('completed', 'Report generation completed successfully.', $matchId);
            \Log::info("Report generation completed successfully for user: {$this->user->userID}");

        } catch (\Exception $ex) {
            DB::rollBack();
            \Log::error("Horoscope generation failed: " . $ex->getMessage());
            $this->report_tracker->transitionTo('failed',  $ex->getMessage());
            return;
        }

        //$this->sendReportGenerationCampaign();
        //$this->sendWhatsAppDoc();
    }

    private function convertTo24Hour($hour, $minute, $ampm)
    {
        if ($ampm == "AM" && $hour == "12") $hour = 0;
        if ($ampm == "PM" && $hour != "12") $hour += 12;
        return sprintf("%02d:%02d", $hour, $minute);
    }

    private function sendReportGenerationCampaign(){
        $toAddress = $this->user->email;
        $subject = 'Your Marriage Report has been generated';
        $mailBody = "<h1>Hello ".$this->user->userName."</h1>
                    <p>Make Your Payment immediately. to view your report</p>
                ";
        Mail::to($toAddress)->send(new CustomMail($subject, $mailBody));
        $this->report_tracker->increment('email_sent_count');
    }


    private function sendWhatsAppDoc()
    {
        $whatsapp = new WhatsAppService();

        $result = $whatsapp->sendDocument(
            '918610711834', 
            'https://pdfobject.com/pdf/sample.pdf', 
            'Here is your document'
        );

        $this->report_tracker->increment('whatsapp_sent_count');
        return response()->json($result);
    }

    private function additionalMatch($mainProfileId, $allianceProfileId, $userId, $matchId)
    {
        try {            

            // Call the stored procedure
            DB::statement("CALL SP_MatchMaker_v4(?, ?, ?, ?, ?, @a, @b, @c, @d)", [
                $this->astroOrgSDTemplateID,
                $mainProfileId,
                $allianceProfileId,
                $this->reportLanguage,
                $this->astroOrgConfigID
            ]);

            // Fetch the OUT parameters
            $row = DB::selectOne("SELECT @a as a, @b as b, @c as c, @d as d");

            $factor_values = explode(",", $row->c);
            $factor_remarks = explode("##", $row->d);

            $total_values = count($factor_values);

            // Extract values
            $starLordMatchPercentage   = $factor_values[0];
            $lagnaLordMatchPercentage  = $factor_values[1];
            $vrikshaMatchPercentage    = $factor_values[9];
            $pakshiMatchPercentage     = $factor_values[12];

            $starLordMatchRemarks   = $factor_remarks[0] ?? '';
            $lagnaLordMatchRemarks  = $factor_remarks[1] ?? '';
            $vrikshaMatchRemarks    = $factor_remarks[9] ?? '';
            $pakshiMatchRemarks     = $factor_remarks[12] ?? '';

            $kalaSarpaDoshaPercentage    = $factor_values[$total_values-1];
            $dasaSanthiPercentage        = $factor_values[$total_values-2];
            $manaSanchalaDoshaPercentage = $factor_values[$total_values-3];
            $numerologyMatchPercentage   = $factor_values[$total_values-4];
            $kalathiraDoshaPercentage    = $factor_values[$total_values-5];

            $kalaSarpaDoshaRemarks = $factor_remarks[$total_values-1] ?? '';

            // Mana Sanchala split
            $parts = explode(">>", $factor_remarks[$total_values-3] ?? '');
            $manaSanchalaDoshaRemarks = trim($parts[0] ?? '');

            $numerologyMatchRemarks = ''; // keeping same as your original code
            $kalathiraDoshaRemarks  = $factor_remarks[$total_values-5] ?? '';

            // Update the record
            DB::table('ab_savedMatch_table')
                ->where('userID', $userId)
                ->where('mainProfileID', $mainProfileId)
                ->where('allianceProfileID', $allianceProfileId)
                ->where('sno', $matchId)
                ->update([
                    'kalathiraDoshaPercentage'   => $kalathiraDoshaPercentage,
                    'kalathiraDoshaRemarks'      => $kalathiraDoshaRemarks,
                    'numerologyMatchPercentage'  => $numerologyMatchPercentage,
                    'numerologyMatchRemarks'     => $numerologyMatchRemarks,
                    'manaSanchalaDoshaPercentage'=> $manaSanchalaDoshaPercentage,
                    'manaSanchalaDoshaRemarks'   => $manaSanchalaDoshaRemarks,
                    'kalaSarpaDoshaPercentage'   => $kalaSarpaDoshaPercentage,
                    'kalaSarpaDoshaRemarks'      => $kalaSarpaDoshaRemarks,
                    'starLordMatchPercentage'    => $starLordMatchPercentage,
                    'starLordMatchRemarks'       => $starLordMatchRemarks,
                    'lagnaLordMatchPercentage'   => $lagnaLordMatchPercentage,
                    'lagnaLordMatchRemarks'      => $lagnaLordMatchRemarks,
                    'vrikshaMatchPercentage'     => $vrikshaMatchPercentage,
                    'vrikshaMatchRemarks'        => $vrikshaMatchRemarks,
                    'pakshiMatchPercentage'      => $pakshiMatchPercentage,
                    'pakshiMatchRemarks'         => $pakshiMatchRemarks,
                    'dasasanthiMatchPercentage'  => $dasaSanthiPercentage,
                ]);

        } catch (\Exception $ex) {
            Log::error("Error in additionalMatch: " . $ex->getMessage(), [
                'trace' => $ex->getTraceAsString()
            ]);
        }
    }

}
