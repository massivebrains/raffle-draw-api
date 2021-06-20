<?php

namespace App\Providers;

use App\Contracts\Services\IBanksService;
use App\Contracts\Services\IBuyTicketService;
use App\Contracts\Services\IDrawWinnersService;
use App\Contracts\Services\IEmailService;
use App\Contracts\Services\IFundWalletService;
use App\Contracts\Services\IGameSessionService;
use App\Contracts\Services\ILoginService;
use App\Contracts\Services\INubanVerifyService;
use App\Contracts\Services\IPackageOptionsService;
use App\Contracts\Services\IPackageService;
use App\Contracts\Services\IPaymentProvidersService;
use App\Contracts\Services\IPrizeService;
use App\Contracts\Services\IRoutineFrequencyService;
use App\Contracts\Services\IRoutineService;
use App\Contracts\Services\IUserAccountDetailService;
use App\Contracts\Services\IUserService;
use App\Contracts\Services\IVerificationService;
use App\Contracts\Services\IWithdrawService;
use App\Services\BanksService;
use App\Services\BuyTicketService;
use App\Services\DrawWinnersService;
use App\Services\EmailService;
use App\Services\FundWalletService;
use App\Services\GameSessionService;
use App\Services\LoginService;
use App\Services\NubanVerifyService;
use App\Services\PackageOptionsService;
use App\Services\PackageService;
use App\Services\PaymentProvidersService;
use App\Services\PrizeService;
use App\Services\RoutineFrequencyService;
use App\Services\RoutineService;
use App\Services\UserAccountDetailService;
use App\Services\UserService;
use App\Services\VerificationService;
use App\Services\WithdrawService;
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
        $this->app->bind(INubanVerifyService::class, NubanVerifyService::class);
        $this->app->bind(IFundWalletService::class, FundWalletService::class);
        $this->app->bind(IPaymentProvidersService::class, PaymentProvidersService::class);
        $this->app->bind(IBanksService::class, BanksService::class);
        $this->app->bind(IUserAccountDetailService::class, UserAccountDetailService::class);
        $this->app->bind(IWithdrawService::class, WithdrawService::class);
        $this->app->bind(IGameSessionService::class, GameSessionService::class);
        $this->app->bind(IDrawWinnersService::class, DrawWinnersService::class);
        $this->app->bind(IRoutineService::class, RoutineService::class);
        $this->app->bind(IRoutineFrequencyService::class, RoutineFrequencyService::class);
        $this->app->bind(IVerificationService::class, VerificationService::class);
        $this->app->bind(IEmailService::class, EmailService::class);
    }
}
