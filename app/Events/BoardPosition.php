<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BoardPosition implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $fen;
    public $room;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($fen, $room)
    {
        $this->fen = $fen;
        $this->room = $room;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chessteachingtool' . $this->room);
    }

    // public function broadcastAs()
    // {
    //     return 'boardPosition';
    // }
    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'position.updated';
    }
}
