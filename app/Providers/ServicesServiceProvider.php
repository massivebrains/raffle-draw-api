<?php

namespace App\Providers;

use App\Contracts\Services\ILoginService;
use App\Contracts\Services\IPrizeService;
use App\Contracts\Services\IUserService;
use App\Services\LoginService;
use App\Services\PrizeService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Services

        $this->app->bind(ILoginService::class, LoginService::class);
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IPrizeService::class, PrizeService::class);
    }
}
