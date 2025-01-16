<?php

namespace App\Services;

use App\Repositories\Contracts\DebtorRepositoryInterface;
use App\Services\Contracts\DebtorServiceInterface;

class DebtorService implements DebtorServiceInterface
{
    protected $debtorRepository;

    public function __construct(DebtorRepositoryInterface $debtorRepository)
    {
        $this->debtorRepository = $debtorRepository;
    }

    public function getAllDebtors()
    {
        return $this->debtorRepository->getAll();
    }

    public function getPaginatedDebtors($perPage = 10)
    {
        return $this->debtorRepository->getPaginated($perPage);
    }

    public function getDebtorById($id)
    {
        return $this->debtorRepository->getById($id);
    }

    public function createDebtor(array $data)
    {
        return $this->debtorRepository->create($data);
    }

    public function updateDebtor($id, array $data)
    {
        return $this->debtorRepository->update($id, $data);
    }

    public function deleteDebtor($id)
    {
        return $this->debtorRepository->delete($id);
    }
}
