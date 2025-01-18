<?php

namespace App\Services\Contracts;

interface PaymentServiceInterface
{
    public function getAllPayments();
    public function getPaginatedPayments($perPage = 10);
    public function getPaymentById($id);
    public function createPayment(array $data);
    public function updatePayment($id, array $data);
    public function deletePayment($id);
}
