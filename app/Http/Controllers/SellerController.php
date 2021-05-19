<?php

namespace App\Http\Controllers;

use App\Helpers\RizerHelper;
use App\Helpers\SellerStatus;
use App\Http\Requests\Sellers\SellerPostRequest;
use App\Http\Requests\Sellers\SellerPutRequest;
use App\Repositories\SellerRepository;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class SellerController
 * @package App\Http\Controllers
 */
class SellerController
{
    /**
     * @var SellerRepository
     */
    private $repository;
    /**
     * @var SellerStatus
     */
    private $sellerStatus;

    /**
     * SellerController constructor.
     * @param SellerRepository $repository
     * @param SellerStatus $sellerStatus
     */
    public function __construct(
        SellerRepository $repository,
        SellerStatus $sellerStatus
    ) {
        $this->repository   = $repository;
        $this->sellerStatus = $sellerStatus;
    }

    /**
     * @return View|RedirectResponse
     */
    public function index()
    {
        try {
            $data = [
                "sellers"      => $this->repository->getAllSellersWithTickets(),
                "sellerStatus" => $this->sellerStatus->getStatusOptions(),
            ];

            return view('seller.index', $data);
        } catch (Exception $ex) {
            return redirect()->route('home')
                             ->with("error", RizerHelper::GENERIC_ERROR_MESSAGE);
        }
    }

    /**
     * @return View|RedirectResponse
     */
    public function create()
    {
        try {
            $data = [
                "sellerStatus" => $this->sellerStatus->getStatusOptions(),
            ];

            return view('seller.create', $data);
        } catch (Exception $ex) {
            return redirect()->route('home')->with("error", RizerHelper::GENERIC_ERROR_MESSAGE);
        }
    }

    /**
     * @param SellerPostRequest $request
     * @return RedirectResponse
     */
    public function store(SellerPostRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            $this->repository->save($data);

            return redirect()->route('sellers.index')->with("success", "Vendedor salvo com sucesso!");
        } catch (Exception $ex) {
            return redirect()->route('sellers.index')
                             ->with("error", "Ocorreu um erro ao salvar o vendedor, tente novamente mais tarde!");
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

            return redirect()->route('sellers.index')->with("success", "Vendedor deletado com sucesso!");
        } catch (Exception $ex) {
            return redirect()->route('sellers.index')
                             ->with("error", "Ocorreu um erro ao deletar o vendedor, tente novamente mais tarde!");
        }
    }

    /**
     * @param int $id
     * @return View|RedirectResponse
     */
    public function edit(int $id)
    {
        try {
            $data = [
                "seller"       => $this->repository->findById($id),
                "sellerStatus" => $this->sellerStatus->getStatusOptions(),
            ];

            return view('seller.update', $data);
        } catch (Exception $ex) {
            return redirect()->route('sellers.index')
                             ->with("error", RizerHelper::GENERIC_ERROR_MESSAGE);
        }
    }

    /**
     * @param SellerPutRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(SellerPutRequest $request, int $id): RedirectResponse
    {
        try {
            $data = $request->validated();
            $this->repository->update($data, $id);

            return redirect()->route('sellers.index')->with("success", "Vendedor atualizado com sucesso!");
        } catch (Exception $ex) {
            return redirect()->route('sellers.index')
                             ->with("error", "Ocorreu um erro ao atualizar o vendedor, tente novamente mais tarde!");
        }
    }
}
