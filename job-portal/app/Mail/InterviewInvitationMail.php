<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InterviewInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $company;

    public function __construct($application, $company)
    {
        $this->application = $application;
        $this->company = $company;
    }

    public function build()
    {
        return $this->subject('Interview Invitation')
                    ->view('emails.interview-invitation');
    }
}