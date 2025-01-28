<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Debtor;
use App\Models\Payment;
use App\Services\Contracts\PaymentServiceInterface;

class PaymentController extends Controller
{
    protected $paymentService;
    public function __construct(PaymentServiceInterface $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = $this->paymentService->getPaginatedPayments(20);

        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $debtors = Debtor::all();
        return view('payments.create', compact('debtors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $this->paymentService->createPayment($request->validated());

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->paymentService->getPaymentById($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = $this->paymentService->getPaymentById($id);
        $debtors = Debtor::all();
        return view('payments.edit', compact('payment', 'debtors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, $id)
    {
        $this->paymentService->updatePayment($id, $request->validated());
        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->paymentService->deletePayment($id);

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment successfully deleted!');
    }
}
