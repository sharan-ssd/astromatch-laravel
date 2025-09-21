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
class ReportGeneratorJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    protected $horoscope;
    protected $report_tracker;

    public function __construct($user, $horoscope)
    {
        $this->user = $user;
        $this->horoscope = $horoscope;
        $this->report_tracker = XavierReport::create([
            'user_id' => $this->user->userID,
            'report_name' => 'Marriage Report Complete',
        ]);
    }

    public function handle()
    {
        $data = $this->horoscope;

        \Log::info("Deferred task fired for user: {$this->user->id}");
        \Log::info("Horoscope Data: " . json_encode($this->horoscope));

        try {
            DB::beginTransaction();
            $this->report_tracker->transitionTo('processing');

            $userId  = $this->user->id;
            $isdCode = $this->user->isdCode ?? '';
            $mobile  = $this->user->mobile ?? '';
            $email   = $this->user->email ?? '';

            $mainProfileId = DB::table('ab15b_astroProfile_table')->insertGetId([
                'astroProfileName'     => $data['fullname1'],
                'userName'             => $data['fullname1'],
                'gender'               => 'Male',
                'dateOfBirth'          => $data['male-year'].'-'.$data['male-month'].'-'.$data['male-date'],
                'timeOfBirth'          => $this->convertTo24Hour($data['male-hour'], $data['male-minute'], $data['ampm1']),
                'placeOfBirthCity'     => explode(",", $data['maleplace'])[0] ?? '',
                'placeOfBirthState'    => explode(",", $data['maleplace'])[1] ?? '',
                'placeOfBirthCountry'  => explode(",", $data['maleplace'])[2] ?? '',
                'associatedUserID'     => $userId,
                'isAllianceProfile'    => 'Y',
                'isMainUserProfile'    => 'Y',
                'isdCode'              => $isdCode,
                'mobileNumber'         => $mobile,
                'email'                => $email,
            ]);

            DB::commit();
            \Log::info("Main horoscope created: " . $mainProfileId);

        } catch (\Exception $ex) {
            DB::rollBack();
            \Log::error("Horoscope generation failed: " . $ex->getMessage());
            $this->report_tracker->transitionTo('failed',  $ex->getMessage());
            return;
        }

        $this->sendReportGenerationCampaign();
        $this->sendWhatsAppDoc();
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
}
