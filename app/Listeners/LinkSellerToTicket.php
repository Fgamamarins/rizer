<?php

namespace App\Listeners;

use App\Events\TicketCreated;
use App\Repositories\SellerRepository;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

/**
 * Class LinkSellerToTicket
 * @package App\Listeners
 */
class LinkSellerToTicket
{
    /**
     * @var SellerRepository
     */
    private $sellerRepository;

    /**
     * LinkSellerToTicket constructor.
     * @param SellerRepository $sellerRepository
     */
    public function __construct(SellerRepository $sellerRepository)
    {
        $this->sellerRepository = $sellerRepository;
    }

    /**
     * Handle the event.
     * @param TicketCreated $event
     * @return void
     */
    public function handle(TicketCreated $event)
    {
        try {
            $supportTicket = $event->supportTicket;
            $sellerToLink  = $this->sellerRepository->getSellerForNewTicket();

            $supportTicket->seller_id = $sellerToLink->id;
            $supportTicket->save();

            return;
        } catch (Exception $ex) {
            return;
        }
    }
}
