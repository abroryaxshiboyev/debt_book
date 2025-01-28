<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use App\Services\Contracts\PaymentServiceInterface;

class PaymentController extends Controller
{
    protected $paymentService;
    public function __construct( PaymentServiceInterface $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->paymentService->getPaginatedPayments(20);
        //TODO: View index page for payments
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //TODO: View create page for payments
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $data=$this->paymentService->createPayment($request->validated());

        return $data;
        //TODO: Redirect to index page with success message
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
    public function edit(Payment $payment)
    {
        //TODO: View edit page for
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, $id)
    {
        $payment=$this->paymentService->updatePayment($id, $request->validated());

        return $payment;
        //TODO: Redirect to index page with success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->paymentService->deletePayment($id);

        return response()->json(['message' => 'Payment deleted successfully.'], 200);
        //TODO: Redirect to index page with success message
    }
}
