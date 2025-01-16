<?php

namespace App\Services\Contracts;

use App\DTOs\Post\CreateShopDTO;

interface DebtorServiceInterface
{
    public function getAllDebtors();
    public function getPaginatedDebtors($perPage = 10);
    public function getDebtorById($id);
    public function createDebtor(array $data);
    public function updateDebtor($id, array $data);
    public function deleteDebtor($id);
}
