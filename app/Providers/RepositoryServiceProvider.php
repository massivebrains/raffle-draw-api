<?php

namespace App\Providers;

use App\Api\V1\Repositories\Eloquent\BanksEloquentRepository;
use App\Api\V1\Repositories\Eloquent\DrawWinnersEloquentRepository;
use App\Api\V1\Repositories\Eloquent\GameSessionEloquentRepository;
use App\Api\V1\Repositories\Eloquent\OAuthRepository;
use App\Api\V1\Repositories\Eloquent\PackageOptionsEloquentRepository;
use App\Api\V1\Repositories\Eloquent\PackagesEloquentRepository;
use App\Api\V1\Repositories\Eloquent\PaymentEloquentRepository;
use App\Api\V1\Repositories\Eloquent\PaymentProvidersEloquentRepository;
use App\Api\V1\Repositories\Eloquent\RoutineEloquentRepository;
use App\Api\V1\Repositories\Eloquent\SysActivityTypesEloquentRepository;
use App\Api\V1\Repositories\Eloquent\SysCommChannelEloquentRepository;
use App\Api\V1\Repositories\Eloquent\SysPrizeEloquentRepository;
use App\Api\V1\Repositories\Eloquent\SysSettingsEloquentRepository;
use App\Api\V1\Repositories\Eloquent\TicketEloquentRepository;
use App\Api\V1\Repositories\Eloquent\UserAccountDetailEloquentRepository;
use App\Api\V1\Repositories\Eloquent\UserActivityLogEloquentRepository;
use App\Api\V1\Repositories\Eloquent\UserEloquentRepository;
use App\Api\V1\Repositories\Eloquent\UserRoleEloquentRepository;
use App\Api\V1\Repositories\Eloquent\UserVerificationEloquentRepository;
use App\Api\V1\Repositories\Eloquent\WalletCreditLogEloquentRepository;
use App\Api\V1\Repositories\Eloquent\WalletDebitLogEloquentRepository;
use App\Api\V1\Repositories\Eloquent\WalletEloquentRepository;
use App\Contracts\Repository\IBanks;
use App\Contracts\Repository\IDrawWinner;
use App\Contracts\Repository\IGameSession;
use App\Contracts\Repository\IOAuth;
use App\Contracts\Repository\IPackageOptions;
use App\Contracts\Repository\IPackages;
use App\Contracts\Repository\IPayment;
use App\Contracts\Repository\IPaymentProviders;
use App\Contracts\Repository\IRoutine;
use App\Contracts\Repository\ISysActivityTypesRepository;
use App\Contracts\Repository\ISysCommChannels;
use App\Contracts\Repository\ISysPrize;
use App\Contracts\Repository\ISysSettingsRepository;
use App\Contracts\Repository\ITicket;
use App\Contracts\Repository\IUser;
use App\Contracts\Repository\IUserAccountDetail;
use App\Contracts\Repository\IUserActivityLog;
use App\Contracts\Repository\IUserRoleRepository;
use App\Contracts\Repository\IUserVerificationRepository;
use App\Contracts\Repository\IWallet;
use App\Contracts\Repository\IWalletCreditLog;
use App\Contracts\Repository\IWalletDebitLog;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Repositories

        $this->app->bind(IUser::class, UserEloquentRepository::class);
        $this->app->bind(IOAuth::class, OAuthRepository::class);
        $this->app->bind(ISysActivityTypesRepository::class, SysActivityTypesEloquentRepository::class);
        $this->app->bind(ISysSettingsRepository::class, SysSettingsEloquentRepository::class);
        $this->app->bind(IUserRoleRepository::class, UserRoleEloquentRepository::class);
        $this->app->bind(IUserVerificationRepository::class, UserVerificationEloquentRepository::class);
        $this->app->bind(IBanks::class, BanksEloquentRepository::class);
        $this->app->bind(IDrawWinner::class, DrawWinnersEloquentRepository::class);
        $this->app->bind(IGameSession::class, GameSessionEloquentRepository::class);
        $this->app->bind(IPackages::class, PackagesEloquentRepository::class);
        $this->app->bind(IPackageOptions::class, PackageOptionsEloquentRepository::class);
        $this->app->bind(IPayment::class, PaymentEloquentRepository::class);
        $this->app->bind(IPaymentProviders::class, PaymentProvidersEloquentRepository::class);
        $this->app->bind(IRoutine::class, RoutineEloquentRepository::class);
        $this->app->bind(ISysCommChannels::class, SysCommChannelEloquentRepository::class);
        $this->app->bind(ISysPrize::class, SysPrizeEloquentRepository::class);
        $this->app->bind(ITicket::class, TicketEloquentRepository::class);
        $this->app->bind(IUserAccountDetail::class, UserAccountDetailEloquentRepository::class);
        $this->app->bind(IUserActivityLog::class, UserActivityLogEloquentRepository::class);
        $this->app->bind(IWallet::class, WalletEloquentRepository::class);
        $this->app->bind(IWalletDebitLog::class, WalletDebitLogEloquentRepository::class);
        $this->app->bind(IWalletCreditLog::class, WalletCreditLogEloquentRepository::class);
    }
}
