<?php

namespace App\Providers;

use App\Contracts\FormRequest\IBuyTicketRequest;
use App\Contracts\FormRequest\ICreatePackageOptionsRequest;
use App\Contracts\FormRequest\ICreatePackageRequest;
use App\Contracts\FormRequest\ICreatePrizeRequest;
use App\Contracts\FormRequest\ICreateRoutineRequest;
use App\Contracts\FormRequest\ICreateUserAccountDetailRequest;
use App\Contracts\FormRequest\IDrawTicketRequest;
use App\Contracts\FormRequest\IFundWalletRequest;
use App\Contracts\FormRequest\INubanVerifyRequest;
use App\Contracts\FormRequest\IShuffleTicketRequest;
use App\Contracts\FormRequest\IUpdatePackageOptionsRequest;
use App\Contracts\FormRequest\IUpdatePackageRequest;
use App\Contracts\FormRequest\IUpdateUserRequest;
use App\Contracts\FormRequest\IUserLoginRequest;
use App\Contracts\FormRequest\IUserRegisterRequest;
use App\Contracts\FormRequest\IVerificationRequest;
use App\Contracts\FormRequest\IWithdrawRequest;
use App\Http\Request\BuyTicketRequest;
use App\Http\Request\CreatePackageOptionsRequest;
use App\Http\Request\CreatePackageRequest;
use App\Http\Request\CreatePrizeRequest;
use App\Http\Request\CreateRoutineRequest;
use App\Http\Request\CreateUserAccountDetailRequest;
use App\Http\Request\DrawTicketRequest;
use App\Http\Request\FundWalletRequest;
use App\Http\Request\NubanVerifyRequest;
use App\Http\Request\ShuffleTicketRequest;
use App\Http\Request\UpdatePackageOptionsRequest;
use App\Http\Request\UpdatePackageRequest;
use App\Http\Request\UpdateUserRequest;
use App\Http\Request\UserLoginRequest;
use App\Http\Request\UserRegisterRequest;
use App\Http\Request\VerificationRequest;
use App\Http\Request\WithdrawRequest;
use Illuminate\Support\ServiceProvider;

class FormRequestServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Form Requests

        $this->app->bind(IUserLoginRequest::class, UserLoginRequest::class);
        $this->app->bind(IUserRegisterRequest::class, UserRegisterRequest::class);
        $this->app->bind(IUpdateUserRequest::class, UpdateUserRequest::class);
        $this->app->bind(ICreatePrizeRequest::class, CreatePrizeRequest::class);
        $this->app->bind(ICreatePackageRequest::class, CreatePackageRequest::class);
        $this->app->bind(IUpdatePackageRequest::class, UpdatePackageRequest::class);
        $this->app->bind(ICreatePackageOptionsRequest::class, CreatePackageOptionsRequest::class);
        $this->app->bind(IUpdatePackageOptionsRequest::class, UpdatePackageOptionsRequest::class);
        $this->app->bind(IBuyTicketRequest::class, BuyTicketRequest::class);
        $this->app->bind(INubanVerifyRequest::class, NubanVerifyRequest::class);
        $this->app->bind(IFundWalletRequest::class, FundWalletRequest::class);
        $this->app->bind(ICreateUserAccountDetailRequest::class, CreateUserAccountDetailRequest::class);
        $this->app->bind(IShuffleTicketRequest::class, ShuffleTicketRequest::class);
        $this->app->bind(IDrawTicketRequest::class, DrawTicketRequest::class);
        $this->app->bind(IWithdrawRequest::class, WithdrawRequest::class);
        $this->app->bind(ICreateRoutineRequest::class, CreateRoutineRequest::class);
        $this->app->bind(IVerificationRequest::class, VerificationRequest::class);

    }
}
