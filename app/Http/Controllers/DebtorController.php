<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDebtorRequest;
use App\Http\Requests\UpdateDebtorRequest;
use App\Models\Debtor;
use App\Services\Contracts\DebtorServiceInterface;

class DebtorController extends Controller
{

    protected $debtorService;

    public function __construct(DebtorServiceInterface $debtorService)
    {
        $this->debtorService = $debtorService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->debtorService->getPaginatedDebtors(20);
        //TODO: View index page for debtors
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //TODO: View create page for debtors
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDebtorRequest $request)
    {
        $data=$this->debtorService->createDebtor($request->validated());

        return $data;
        //TODO: Redirect to index page with success message
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->debtorService->getDebtorById($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Debtor $debtor)
    {
        //TODO: View edit page for
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDebtorRequest $request, string $id)
    {
        return $this->debtorService->updateDebtor($id,$request->validated());
        //TODO: Redirect to index page with success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->debtorService->deleteDebtor($id);
        //TODO: Redirect to index page with success message
    }
}
