<?php

namespace App\Services;

use App\Repositories\Contracts\DebtRepositoryInterface;
use App\Services\Contracts\DebtServiceInterface;

class DebtService implements DebtServiceInterface
{
    protected $debtRepository;

    public function __construct(DebtRepositoryInterface $debtRepository)
    {
        $this->debtRepository = $debtRepository;
    }

    public function getAllDebts()
    {
        return $this->debtRepository->getAll();
    }

    public function getPaginatedDebts($perPage = 10)
    {
        return $this->debtRepository->getPaginated($perPage);
    }

    public function getDebtById($id)
    {
        return $this->debtRepository->getById($id);
    }

    public function createDebt(array $data)
    {
        return $this->debtRepository->create($data);
    }

    public function updateDebt($id, array $data)
    {
        return $this->debtRepository->update($id, $data);
    }

    public function deleteDebt($id)
    {
        return $this->debtRepository->delete($id);
    }
}
