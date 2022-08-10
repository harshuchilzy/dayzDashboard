<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeUserNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $mailData = [
            'name' => $event->user->name,
            'email' => $event->user->email
        ];
        Mail::send('emails.welcome', $mailData, function($message) use ($mailData) {
            $message->to($mailData['email']);
            $message->subject('WelcomeMail');
        });
    }
}
