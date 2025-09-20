<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\CustomMail;
use Illuminate\Support\Facades\Mail;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\PanchangService;

class ReportGeneratorJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    protected $horoscope;

    public function __construct($user, $horoscope)
    {
        $this->user = $user;
        $this->horoscope = $horoscope;

    }

    public function handle()
    {
        $data = $this->horoscope;

        \Log::info("Deferred task fired for user: {$this->user->id}");
        \Log::info("Horoscope Data: " . json_encode($this->horoscope));

        try {
            DB::beginTransaction();

            $userId = Auth::id();
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
            
            $service = new PanchangService();

            $message = $service->getThithiData(
                $data['malecoordinates'],  // coordinates
                $maledob,       // birthdate
                $maletob,            // birthtime
                $data['maletimezone'],     // timezone
                $mainProfileId                // profileId                
    );

        } catch (\Exception $ex) {
            DB::rollBack();
            \Log::error("Horoscope generation failed: " . $ex->getMessage());
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
    }


    private function sendWhatsAppDoc()
    {
        $whatsapp = new WhatsAppService();

        $result = $whatsapp->sendDocument(
            '918610711834', 
            'https://pdfobject.com/pdf/sample.pdf', 
            'Here is your document'
        );

        return response()->json($result);
    }
}
