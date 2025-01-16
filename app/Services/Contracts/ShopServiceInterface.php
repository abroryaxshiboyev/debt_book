<?php

namespace App\Services\Contracts;

use App\DTOs\Post\CreateShopDTO;

interface ShopServiceInterface
{
    public function getAllShops();
    public function getPaginatedShops($perPage = 10);
    public function getShopById($id);
    public function createShop(array $data);
    public function updateShop($id, array $data);
    public function deleteShop($id);
}
