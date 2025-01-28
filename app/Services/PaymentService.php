<?php

namespace App\Services;

use App\Repositories\Contracts\PaymentRepositoryInterface;
use App\Services\Contracts\PaymentServiceInterface;

class PaymentService implements PaymentServiceInterface
{
    protected $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository){
        $this->paymentRepository = $paymentRepository;
    }
    public function getAllPayments()
    {
        return $this->paymentRepository->getAll();
    }
    public function getPaginatedPayments($perPage = 10)
    {
        return $this->paymentRepository->getPaginated($perPage);
    }
    public function getPaymentById($id)
    {
        return $this->paymentRepository->getById($id);
    }
    public function createPayment(array $data)
    {
        return $this->paymentRepository->create($data);
    }
    public function updatePayment($id, array $data)
    {
        return $this->paymentRepository->update($id, $data);
    }
    public function deletePayment($id)
    {
        return $this->paymentRepository->delete($id);
    }
}
