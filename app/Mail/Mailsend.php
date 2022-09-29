<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mailsend extends Mailable
{
    use Queueable, SerializesModels;

    public $maildata;


    public function __construct($maildata)
    {
        $this->maildata = $maildata;
    }

    public function build()
    {
        //$replyToName = $this->mailData['full_name'];
        //$replyTo = $this->mailData['email'];

        $subject = "Personal Seleccionado";
        return $this->view('mail.mail')->subject($subject)->with(['data' => $this->maildata]);

        /* $subject = $this->mailData['subject'];
        $replyToName = $this->mailData['full_name'];
        $replyTo = $this->mailData['email'];

        return $this->view('emails.contact-us')->cc($replyTo, $replyToName)->subject($subject)->replyTo($replyTo, $replyToName)->with(['data' => $this->mailData]);
        */
    }

}
