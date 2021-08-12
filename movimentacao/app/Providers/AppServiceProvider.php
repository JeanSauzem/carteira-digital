<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerService();
        $this->registerFacades();
        $this->registerRepository();
    }

    public function registerFacades()
    {
        $this->app->singleton(
            \App\Contracts\Facades\DepositContract::class,
            \App\Facades\DepositFacades::class
        );

        $this->app->singleton(
            \App\Contracts\Facades\TransferContract::class,
            \App\Facades\TransferFacades::class
        );
    }

    public function registerRepository()
    {
        $this->app->singleton(
            \App\Contracts\Repository\WalletUserContract::class,
            \App\Repository\WalletRepository::class
        );

        $this->app->singleton(
            \App\Contracts\Repository\TransfersContract::class,
            \App\Repository\TransfersRepository::class
        );
    }

    public function registerService()
    {
        $this->app->singleton(
            \App\Contracts\Services\NotificationContract::class,
            \App\Services\NotificationService::class
        );

        $this->app->singleton(
            \App\Contracts\Services\TransactionContract::class,
            \App\Services\TransactionService::class
        );
    }
}
