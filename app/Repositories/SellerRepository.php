<?php

namespace App\Repositories;

use App\Helpers\RizerHelper;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class SellerRepository
 * @package App\Repositories
 */
class SellerRepository
{
    /**
     * @var Seller
     */
    private $model;

    /**
     * SellerRepository constructor.
     * @param Seller $model
     */
    public function __construct(Seller $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return Seller|null
     */
    public function save(array $data): ?Seller
    {
        $this->model->fill($data);
        $this->model->save();

        return $this->model;
    }

    /**
     * @param array $data
     * @param int $id
     * @return Seller
     */
    public function update(array $data, int $id): Seller
    {
        $this->model = Seller::find($id);
        $this->model->fill($data);
        $this->model->save();

        return $this->model;
    }

    /**
     * @return Collection|null
     */
    public function getAllSellers(): ?Collection
    {
        $sellers = Seller::all();
        foreach ($sellers as $seller) {
            $seller->phone = RizerHelper::formatPhoneNumber($seller->phone);
        }

        return $sellers;
    }

    /**
     * @return Collection|null
     */
    public function getAllSellersWithTickets(): ?Collection
    {
        $sellers = Seller::with('supportTickets')->get();
        foreach ($sellers as $seller) {
            $seller->phone           = RizerHelper::formatPhoneNumber($seller->phone);
            $seller->open_tickets    = $seller->supportTickets->where('status_enum', 1)->count();
            $seller->running_tickets = $seller->supportTickets->where('status_enum', 2)->count();
            $seller->closed_tickets  = $seller->supportTickets->where('status_enum', 4)->count();
        }

        return $sellers;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return Seller::destroy($id);
    }

    /**
     * @param int $id
     * @return Seller|null
     */
    public function findById(int $id): ?Seller
    {
        return Seller::find($id);
    }

    /**
     * @return object
     */
    public function getSellerForNewTicket(): object
    {
        return current(DB::select(
            "SELECT s.name
                    , s.id
                    ,count(st.id) as qtd
                    FROM sellers s
                    LEFT JOIN support_tickets st ON st.seller_id = s.id AND st.status_enum = 1
                    GROUP BY s.name
                    , s.id
                    ORDER BY qtd ASC
                    LIMIT 1;"
        ));
    }
}
