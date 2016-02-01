<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Contracts\Mail\Mailer;

class EmailRegisterConfirmation implements ShouldQueue
{

    use InteractsWithQueue;

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

        if (true) {
            $this->release(30);
        }

        // Stopping The Propagation Of An Event
        return false;
    }

}
