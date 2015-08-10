<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Contracts\Mail\Mailer;

class EmailRegisterConfirmation implements ShouldQueue
{

    protected $mailer;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $user = $event->user;
        $this->mailer->send('emails.registerConfirmation', ['user' => $user], function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Registered Confirmation');
        });
    }

}
