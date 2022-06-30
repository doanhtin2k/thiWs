<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuccessMail extends Mailable
{
    use Queueable, SerializesModels;
    public $username;
    public $email;
    public $rank;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username,$email,$rank)
    {
        //
        $this->username = $username;
        $this->email = $email;
        $this->rank = $rank;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('successMail');
    }
}
