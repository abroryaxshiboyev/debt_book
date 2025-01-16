<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDebtRequest;
use App\Http\Requests\UpdateDebtRequest;
use App\Models\Debt;
use App\Services\Contracts\DebtServiceInterface;

class DebtController extends Controller
{
    protected $debtService;

    public function __construct(DebtServiceInterface $debtService){
        $this->debtService = $debtService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->debtService->getPaginatedDebts(20);
        //TODO: View index page for debts
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //TODO: View create page for debts
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDebtRequest $request)
    {
        $data=$this->debtService->createDebt($request->validated());

        return $data;
        //TODO: Redirect to index page with success message
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->debtService->getDebtById($id);
        //TODO: View show page for debts
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //TODO: View edit page for debts
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDebtRequest $request, string $id)
    {
        return $this->debtService->updateDebt($id, $request->validated());
        //TODO: Redirect to index page with success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Debt $debt)
    {
        $this->debtService->deleteDebt($debt->id);

        return response()->json(['message' => 'Debt deleted successfully.'], 200);
        //TODO: Redirect to index page with success message
    }
}
