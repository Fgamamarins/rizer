<?php

namespace App\Http\Controllers;

use App\Events\TicketCreated;
use App\Helpers\RizerHelper;
use App\Helpers\TicketStatus;
use App\Http\Requests\Support\SupportTicketPostRequest;
use App\Http\Requests\Support\SupportTicketPutRequest;
use App\Repositories\SupportTicketRepository;
use DateTime;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class TicketController
 * @package App\Http\Controllers
 */
class TicketController
{
    /**
     * @var SupportTicketRepository
     */
    private $repository;
    /**
     * @var TicketStatus
     */
    private $ticketStatus;

    /**
     * TicketController constructor.
     * @param SupportTicketRepository $repository
     * @param TicketStatus $ticketStatus
     */
    public function __construct(
        SupportTicketRepository $repository,
        TicketStatus $ticketStatus
    )
    {
        $this->repository   = $repository;
        $this->ticketStatus = $ticketStatus;
    }

    /**
     * @return View|RedirectResponse
     */
    public function index()
    {
        try {
            $data = [
                "tickets"      => $this->repository->getAllTickets(),
                "ticketStatus" => $this->ticketStatus->getStatusOptions(),
            ];

            return view('support.ticket.index', $data);
        } catch (Exception $ex) {
            return redirect()->route('home')
                             ->with("error", RizerHelper::GENERIC_ERROR_MESSAGE);
        }
    }

    /**
     * @return  View|RedirectResponse
     */
    public function create()
    {
        try {
            $data = [
                "ticketStatus" => $this->ticketStatus->getStatusOptions(),
            ];

            return view('support.ticket.create', $data);
        } catch (Exception $ex) {
            return redirect()->route('home')->with("error", RizerHelper::GENERIC_ERROR_MESSAGE);
        }
    }

    /**
     * @param SupportTicketPostRequest $request
     * @return RedirectResponse
     */
    public function store(SupportTicketPostRequest $request): RedirectResponse
    {
        try {
            $data          = $request->validated();
            $supportTicket = $this->repository->save($data);
            event(new TicketCreated($supportTicket));

            return redirect()->route('support.ticket.index')->with("success", "Ticket criado com sucesso!");;
        } catch (Exception $ex) {
            return redirect()->route('support.ticket.index')
                             ->with("error", "Ocorreu um erro ao criar o ticket, tente novamente mais tarde!");
        }
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->repository->delete($id);

            return redirect()->back();
        } catch (Exception $ex) {
            return redirect()->route('home');
        }
    }

    /**
     * @param int $id
     * @return View|RedirectResponse
     */
    public function edit(int $id)
    {
        try {
            $ticket    = $this->repository->findById($id);
            $date      = new DateTime($ticket->open_ticket_date);
            $dataInput = $date->format('Y-m-d\TH:i:s');

            $data = [
                "ticket"       => $this->repository->findById($id),
                "ticketStatus" => $this->ticketStatus->getStatusOptions(),
                "date"         => $dataInput,
            ];

            return view('support.ticket.update', $data);
        } catch (Exception $ex) {
            return redirect()->route('support.ticket.index')
                             ->with("error", RizerHelper::GENERIC_ERROR_MESSAGE);
        }
    }

    /**
     * @param SupportTicketPutRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(SupportTicketPutRequest $request, int $id): RedirectResponse
    {
        try {
            $data = $request->validated();
            $this->repository->update($data, $id);

            return redirect()->route('support.ticket.index')->with("success", "Ticket atualizado com sucesso!");
        } catch (Exception $ex) {
            return redirect()->route('support.ticket.index')
                             ->with("error", "Ocorreu um erro ao atualizar o ticket, tente novamente mais tarde!");
        }
    }
}
