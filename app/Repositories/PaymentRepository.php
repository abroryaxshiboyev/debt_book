<?php

namespace App\Repositories;

use App\Models\Payment;
use App\Repositories\Contracts\PaymentRepositoryInterface;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function getAll()
    {
        return Payment::with(['debtor'])->orderByDesc('id')->get();
    }

    public function getPaginated(int $perPage = 10)
    {
        return Payment::with(['debtor'])->orderByDesc('id')->paginate($perPage);
    }

    public function getById($id)
    {
        return Payment::with(['debtor'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Payment::create($data);
    }
    public function update($id, array $data)
    {
        $payment = $this->getById($id);
        $payment->update($data);
        return $payment;
    }
    public function delete($id)
    {
        $payment = $this->getById($id);
        $payment->delete();
    }

}
