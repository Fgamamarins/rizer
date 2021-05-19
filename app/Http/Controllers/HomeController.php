<?php

namespace App\Http\Controllers;

use App\Helpers\TicketStatus;
use App\Repositories\SupportTicketRepository;
use Illuminate\Contracts\View\View;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController
{
    /**
     * @var SupportTicketRepository
     */
    private $supportTicketRepository;
    /**
     * @var TicketStatus
     */
    private $ticketStatus;

    /**
     * HomeController constructor.
     * @param SupportTicketRepository $supportTicketRepository
     * @param TicketStatus $ticketStatus
     */
    public function __construct(
        SupportTicketRepository $supportTicketRepository,
        TicketStatus $ticketStatus
    ) {
        $this->supportTicketRepository = $supportTicketRepository;
        $this->ticketStatus            = $ticketStatus;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $data = [
            "dashboardTickets" => $this->supportTicketRepository->getHomeResumeTickets(),
            "resumeTickets"    => $this->supportTicketRepository->getLastTickets(),
            "ticketStatus"     => $this->ticketStatus->getStatusOptions(),
        ];

        return view('dashboard', $data);
    }
}
