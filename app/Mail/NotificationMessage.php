<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $user;

    public function __construct($mymessage,$user)
    {
        $this->message = $mymessage;
        $this->user = $user;

    }

    public function build()
    {

        return $this->view('admin.emails.notification')
            ->subject($this->message->subject)
            ->with([
                'subject' => $this->message->subject,
                'body' => $this->message->body,
                'user' => $this->user->name,

            ]);
    }
}
