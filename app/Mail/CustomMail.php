<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectLine;
    public $mailBody;

    public function __construct($subjectLine, $mailBody)
    {
        $this->subjectLine = $subjectLine;
        $this->mailBody = $mailBody;
    }

    public function build()
    {
        return $this->html($this->mailBody)->subject($this->subjectLine);
    }
}
