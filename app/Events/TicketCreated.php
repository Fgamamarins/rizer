<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class TicketCreated
 * @package App\Events
 */
class TicketCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $supportTicket;

    /**
     * TicketCreated constructor.
     * @param $supportTicket
     * @return void
     */
    public function __construct($supportTicket)
    {
        $this->supportTicket = $supportTicket;
    }

    /**
     * Get the channels the event should broadcast on.
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
