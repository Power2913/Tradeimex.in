<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CareerFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;
    public $cvContent;

    public function __construct($formData, $cvContent)
    {
        $this->formData = $formData;
        $this->cvContent = $cvContent;
    }

    public function build()
    {
        return $this->subject('New Career Application')
                    ->view('emails.career')
                    ->attachData($this->cvContent, 'cv.pdf', ['mime' => 'application/pdf']);
    }
}
