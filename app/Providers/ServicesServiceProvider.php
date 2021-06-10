<?php

namespace App\Providers;

use App\Contracts\Services\IBuyTicketService;
use App\Contracts\Services\ILoginService;
use App\Contracts\Services\IPackageOptionsService;
use App\Contracts\Services\IPackageService;
use App\Contracts\Services\IPrizeService;
use App\Contracts\Services\IUserService;
use App\Services\BuyTicketService;
use App\Services\LoginService;
use App\Services\PackageOptionsService;
use App\Services\PackageService;
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
        $this->app->bind(IPackageService::class, PackageService::class);
        $this->app->bind(IPackageOptionsService::class, PackageOptionsService::class);
        $this->app->bind(IBuyTicketService::class, BuyTicketService::class);
    }
}
