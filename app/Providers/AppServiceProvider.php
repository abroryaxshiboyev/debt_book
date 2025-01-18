<?php

namespace App\Providers;

use App\Repositories\Contracts\DebtorRepositoryInterface;
use App\Repositories\Contracts\DebtRepositoryInterface;
use App\Repositories\Contracts\PaymentRepositoryInterface;
use App\Repositories\Contracts\ShopRepositoryInterface;
use App\Repositories\DebtorRepository;
use App\Repositories\DebtRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ShopRepository;
use App\Services\Contracts\DebtorServiceInterface;
use App\Services\Contracts\DebtServiceInterface;
use App\Services\Contracts\PaymentServiceInterface;
use App\Services\Contracts\ShopServiceInterface;
use App\Services\DebtorService;
use App\Services\DebtService;
use App\Services\PaymentService;
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

        $this->app->bind(DebtorRepositoryInterface::class, DebtorRepository::class);
        $this->app->bind(DebtorServiceInterface::class, DebtorService::class);

        $this->app->bind(DebtRepositoryInterface::class, DebtRepository::class);
        $this->app->bind(DebtServiceInterface::class, DebtService::class);

        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        $this->app->bind(PaymentServiceInterface::class, PaymentService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
