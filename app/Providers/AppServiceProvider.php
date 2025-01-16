<?php

namespace App\Providers;

use App\Repositories\Contracts\ShopRepositoryInterface;
use App\Repositories\ShopRepository;
use App\Services\Contracts\ShopServiceInterface;
use App\Services\ShopService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ShopRepositoryInterface::class,ShopRepository::class);
        $this->app->bind(ShopServiceInterface::class,ShopService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
