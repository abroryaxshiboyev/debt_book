<?php

namespace App\Repositories\Contracts;

interface ShopRepositoryInterface
{
    public function getAll();
    public function getPaginatedShops(int $perPage=10);
    public function getById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
