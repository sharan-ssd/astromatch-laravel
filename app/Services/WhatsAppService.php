<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppService
{
    protected $baseUrl;
    protected $token;

    public function __construct()
    {
        $this->baseUrl = "https://api.ultramsg.com/" . env('ULTRAMSG_INSTANCE') . "/messages";
        $this->token = env('ULTRAMSG_TOKEN');
    }

    public function sendDocument($to, $documentUrl, $caption = '')
    {
        $response = Http::asForm()->post($this->baseUrl . '/document', [
            'token'   => $this->token,
            'to'      => $to,               
            'document'=> $documentUrl,  
            'filename'=> basename($documentUrl),
            'caption' => $caption,
        ]);

        return $response->json();
    }
}
