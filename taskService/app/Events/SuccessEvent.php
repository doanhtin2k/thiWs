<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SuccessEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $username;
    public $email;
    public $rank;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($username, $email, $rank)
    {
        //
        $this->username = $username;
        $this->email = $email;
        $this->rank = $rank;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
