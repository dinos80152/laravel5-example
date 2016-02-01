<?php

namespace App\Events;

use App\User;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ServerCreated extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['user.'.$this->user->id];
    }

    /**
     * Optional
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return ['user_id' => $this->user->id];
    }

    /**
     * Optional
     * Customizing The Event Name
     * Get the broadcast event name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'app.server-created';
    }

    /**
     * Optional
     * Set the name of the queue the event should be placed on.
     *
     * @return string
     */
    public function onQueue()
    {
        return 'your-queue-name';
    }
}