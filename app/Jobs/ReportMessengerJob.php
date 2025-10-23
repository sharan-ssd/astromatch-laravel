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
use Illuminate\Support\Facades\Log;

class ReportGeneratorJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $xavier_report_id;
    public function __construct($xavier_report_id, $message_type)
    {
        $this->xavier_report_id = $xavier_report_id;
        $this->horoscope = $horoscope;
        $this->report_tracker = XavierReport::getById($xavier_report_id);
        $this->user = User::find($this->report_tracker->user_id);
        $this->message_type = $message_type;
    }

    public function handle()
    {
        try {
            $whatsappService = new WhatsAppService();
            $mailService = new CustomMail();

            if (!$this->report_tracker) {
                Log::error("XavierReport not found for ID: " . $this->xavier_report_id);
                return;
            }

            if($this->message_type === 'whatsapp') {
                $this->sendWhatsAppDoc();
            } elseif($this->message_type === 'email') {
                $this->sendReportGenerationCampaign();
            }

        } catch (Exception $ex) {
            Log::error("Error in sending message: " . $ex->getMessage(), [
                'trace' => $ex->getTraceAsString()
            ]);
        }
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