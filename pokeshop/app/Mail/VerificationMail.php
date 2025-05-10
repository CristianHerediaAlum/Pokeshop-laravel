<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class VerificationMail extends Mailable
{
    public $verificationCode;

    public function __construct($verificationCode)
    {
        $this->verificationCode = $verificationCode;
    }

    public function build()
    {
        return $this->subject('Verifica tu cuenta')
                    ->view('emails.verification')
                    ->with(['verificationCode' => $this->verificationCode]);
    }
}
