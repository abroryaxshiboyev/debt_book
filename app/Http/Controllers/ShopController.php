<?php

namespace App\Http\Controllers;

use App\DTOs\Post\CreateShopDTO;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;
use App\Services\Contracts\ShopServiceInterface;

class ShopController extends Controller
{

    protected $shopService;

    public function __construct(ShopServiceInterface $shopService)
    {
        $this->shopService = $shopService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->shopService->getPaginatedShops(20);

        //TODO: View index page
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //TODO: View create page
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShopRequest $request)
    {
        $data=$this->shopService->createShop($request->validated());

        return $data;

        //TODO: Redirect to index page with success message
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        return $shop;
        //TODO: View show page
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //TODO: View edit page
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        $this->shopService->updateShop($shop->id, $request->validated());

        return $shop;

        //TODO: Redirect to index page with success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        $this->shopService->deleteShop($shop->id);

        return response()->json(['message' => 'Shop deleted successfully.'], 200);

        //TODO: Redirect to index page with success message
    }
}
