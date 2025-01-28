<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDebtRequest;
use App\Http\Requests\UpdateDebtRequest;
use App\Models\Debt;
use App\Models\Debtor;
use App\Services\Contracts\DebtServiceInterface;

class DebtController extends Controller
{
    protected $debtService;

    public function __construct(DebtServiceInterface $debtService)
    {
        $this->debtService = $debtService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $debts = $this->debtService->getPaginatedDebts(20);
        return view('debts.index', compact('debts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $debtors = Debtor::all();
        return view('debts.create', compact('debtors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDebtRequest $request)
    {
        $this->debtService->createDebt($request->validated());

        return redirect()
            ->route('debts.index')
            ->with('success', 'Debt successfully added!');
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
        $debt = $this->debtService->getDebtById($id);
        $debtors = Debtor::all();
        return view('debts.edit', compact('debt', 'debtors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDebtRequest $request, string $id)
    {
        $this->debtService->updateDebt($id, $request->validated());

        return redirect()
            ->route('debts.index')
            ->with('success', 'Debt updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $this->debtService->deleteDebt($id);

        return redirect()
            ->route('debts.index')
            ->with('success', 'Debt successfully deleted!');
    }
}
