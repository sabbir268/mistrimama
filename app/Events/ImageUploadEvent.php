<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ImageUploadEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $image;
    public $imageName;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($imageFile , $name)
    {
        $this->image = $imageFile;
        $this->imageName = $name;
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
