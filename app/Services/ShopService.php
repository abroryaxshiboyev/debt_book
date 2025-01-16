<?php

namespace App\Services;

use App\Services\Contracts\ShopServiceInterface;
use App\Repositories\Contracts\ShopRepositoryInterface;
use App\DTOs\Post\CreateShopDTO;

class ShopService implements ShopServiceInterface
{
    protected $shopRepository;

    public function __construct(ShopRepositoryInterface $shopRepository)
    {
        $this->shopRepository = $shopRepository;
    }

    public function getAllShops(){
        return $this->shopRepository->getAll();
    }

    public function getPaginatedShops($perPage = 10){
        return $this->shopRepository->getPaginatedShops($perPage);
    }

    public function getShopById($id){
        return $this->shopRepository->getById($id);
    }

    public function createShop(array $data){
        return $this->shopRepository->create($data);
    }

    public function updateShop($id, array $data){
        return $this->shopRepository->update($id, $data);
    }

    public function deleteShop($id){
        return $this->shopRepository->delete($id);
    }
}
