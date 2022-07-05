<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegisterVolunteerMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $details_volunteer_user;

    public function __construct($details_volunteer_user)
    {
        // $this->id = $id;
        $this->details_volunteer_user = $details_volunteer_user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject('Karuna - User Register')->view('frontend.mail.user_register_volunteer_mail');
    }
}
