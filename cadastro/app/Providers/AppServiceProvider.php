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
        $this->registerFacades();
        $this->registerRespository();
    }

    public function registerFacades()
    {
        $this->app->singleton(
            \App\Contract\Facades\CreateUserContract::class,
            \App\Facades\CreateUserFacades::class
        );
    }

    public function registerRespository()
    {

        $this->app->singleton(
            \App\Contract\Repository\UserContract::class,
            \App\Repository\UserRepository::class
        );

        $this->app->singleton(
            \App\Contract\Repository\WalletUserContract::class,
            \App\Repository\WalletUserRepository::class
        );
    }
}
