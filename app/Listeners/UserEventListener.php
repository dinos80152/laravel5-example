<?php

namespace App\Listeners;

class UserEventListener
{

    public function onUserRegister($event)
    {
        $user = $event->user;
        $this->mailer->send('emails.registerConfirmation', ['user' => $user], function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Registered Confirmation');
        });
    }

    /**
     * Handle user login events.
     */
    public function onUserLogin($event) {}

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event) {}

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {

        $events->listen(
            'App\Events\UserRegistered',
            'App\Listeners\UserEventListener@onUserRegister'
        );

        $events->listen(
            'App\Events\UserLoggedIn',
            'App\Listeners\UserEventListener@onUserLogin'
        );

        $events->listen(
            'App\Events\UserLoggedOut',
            'App\Listeners\UserEventListener@onUserLogout'
        );
    }

}
