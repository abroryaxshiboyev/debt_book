<?php

namespace App\Repositories;

use App\Models\Shop;
use App\Repositories\Contracts\ShopRepositoryInterface;

class ShopRepository implements ShopRepositoryInterface
{
    public function getAll()
    {
        return Shop::with(['owner'])->get();
    }

    public function getPaginatedShops(int $perPage=10){
        return Shop::with(['owner'])->paginate($perPage);
    }

    public function getById($id)
    {
        return Shop::with('owner')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Shop::create($data);
    }

    public function update($id, array $data)
    {
        $post = Shop::findOrFail($id);
        $post->update($data);
        return $post;
    }

    public function delete($id)
    {
        $post = Shop::findOrFail($id);
        $post->delete();
        return true;
    }
}
