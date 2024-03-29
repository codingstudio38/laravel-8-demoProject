<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageEvents implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $data;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    //  public function broadcastAs()//for broadcast as custom class name
    // {
    //     return 'MessageEvents';
    // }
    //  public function broadcastWith()//for data stucture modification
    // {
    //     return ['custom_message'=>$this->data];
    // }
    public function broadcastOn()
    {   
        return new PresenceChannel('track-message-channel');
        // return new PrivateChannel('message-channel');
        // return new Channel('message-channel');
    }
}
