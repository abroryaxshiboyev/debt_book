<?php

namespace App\Services\Contracts;

interface DebtServiceInterface
{
    public function getAllDebts();
    public function getPaginatedDebts($perPage = 10);
    public function getDebtById($id);
    public function createDebt(array $data);
    public function updateDebt($id, array $data);
    public function deleteDebt($id);
}
