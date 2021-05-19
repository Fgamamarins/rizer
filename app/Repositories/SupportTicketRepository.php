<?php

namespace App\Repositories;

use App\Models\SupportTicket;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class SupportTicketRepository
 * @package App\Repositories
 */
class SupportTicketRepository
{
    /**
     * @var SupportTicket
     */
    private $model;

    /**
     * SupportTicketRepository constructor.
     * @param SupportTicket $model
     */
    public function __construct(SupportTicket $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return SupportTicket|null
     */
    public function save(array $data): ?SupportTicket
    {
        $this->model->fill($data);
        $this->model->save();

        return $this->model;
    }

    /**
     * @param array $data
     * @param int $id
     * @return SupportTicket
     */
    public function update(array $data, int $id): SupportTicket
    {
        $this->model = SupportTicket::find($id);
        $this->model->fill($data);
        $this->model->save();

        return $this->model;
    }

    /**
     * @return Collection|null
     */
    public function getAllTickets(): ?Collection
    {
        return SupportTicket::all();
    }

    /**
     * @return Collection|null
     */
    public function getLastTickets(): ?Collection
    {
        return SupportTicket::with('seller')->orderBy('id', 'desc')->take(5)->get();
    }

    /**
     * @return array
     */
    public function getHomeResumeTickets(): array
    {
        $tickets = SupportTicket::all();

        return [
            "open_tickets"    => $tickets->where('status_enum', 1)->count(),
            "running_tickets" => $tickets->where('status_enum', 2)->count(),
            "closed_tickets"  => $tickets->where('status_enum', 4)->count(),
        ];
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return SupportTicket::destroy($id);
    }

    /**
     * @param int $id
     * @return SupportTicket|null
     */
    public function findById(int $id): ?SupportTicket
    {
        return SupportTicket::find($id);
    }

    /**
     * @return Collection|null
     */
    public function getLatenessTickets(): ?Collection
    {
        return SupportTicket::whereIn('status_enum', [1, 2])
                            ->where('open_ticket_date', '<', Carbon::now()->subHour(24))
                            ->get();
    }
}
