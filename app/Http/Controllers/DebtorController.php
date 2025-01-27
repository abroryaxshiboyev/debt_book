<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDebtorRequest;
use App\Http\Requests\UpdateDebtorRequest;
use App\Models\Debtor;
use App\Models\Shop;
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
        $debtors = $this->debtorService->getPaginatedDebtors(20);
        return view('debtors.index', compact('debtors'));
//        TODO: View index page for debtors
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shops = Shop::all();
        return view('debtors.create', compact('shops'));
        //TODO: View create page for debtors
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDebtorRequest $request)
    {
        // Validatsiya qilingan ma'lumotlarni oling
        $data = $request->validated();

        // Qarzdor yaratish uchun service metodini chaqiring
        $this->debtorService->createDebtor($data);

        // Muvaffaqiyatli xabar bilan index sahifasiga qayta yo'naltirish
        return redirect()
            ->route('debtors.index')
            ->with('success', 'Debtor successfully added!');
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
    public function edit($id)
    {
        $debtor = Debtor::findOrFail($id);
        $shops = Shop::all();
        return view('debtors.edit', compact('debtor', 'shops'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDebtorRequest $request, $id)
    {
        $debtor = Debtor::findOrFail($id);
        $debtor->update($request->validated());

        return redirect()
            ->route('debtors.index')
            ->with('success', 'Debtor updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Qarzdorni o'chirish
        $this->debtorService->deleteDebtor($id);

        // Muvaffaqiyatli xabar bilan index sahifasiga qayta yo'naltirish
        return redirect()
            ->route('debtors.index')
            ->with('success', 'Debtor successfully deleted!');
    }

}
