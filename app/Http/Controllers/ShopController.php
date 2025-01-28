<?php

namespace App\Http\Controllers;

use App\DTOs\Post\CreateShopDTO;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;
use App\Models\User;
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
        $shops = $this->shopService->getPaginatedShops(20);

        return view('shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owners = User::all();
        return view('shops.create', compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShopRequest $request)
    {
        $this->shopService->createShop($request->validated());

        return redirect()
            ->route('shops.index')
            ->with('success', 'Shop successfully added!');
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
    public function edit(string $id)
    {
        $shop = $this->shopService->getShopById($id);
        $owners = User::all();
        return view('shops.edit', compact('shop', 'owners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShopRequest $request, string $id)
    {
        $this->shopService->updateShop($id, $request->validated());

        return redirect()
            ->route('shops.index')
            ->with('success', 'Shop updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shop = Shop::findOrFail($id);

        // Check if shop has debtors
        if ($shop->debtors()->exists()) {
            return redirect()->route('shops.index')->with('error', 'This shop cannot be deleted because it has associated debtors.');
        }

        $this->shopService->deleteShop($id);

        return redirect()
            ->route('shops.index')
            ->with('success', 'Shop successfully deleted!');
    }
}
