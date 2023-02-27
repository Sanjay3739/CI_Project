<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     *
     */

    public $name;
    public $token;

    
    public function __construct($name, $token){


        $this->name = $name;
        $this->token = $token;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reset Password',
        );
    }


     /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    /**
     * Build the message.
     *
     * $this
     */
    public function build()
    {
        $user['name'] = $this->name;
        $user['token'] = $this->token;

        return $this->from("makwanasanjaylm@gmail.com", "Sanjay")
        ->subject('Password Reset Link')
        ->view('template.reset-password', ['user' => $user]);
    }
}
