<?php

namespace App\Providers;

use App\Contracts\FormRequest\ICreatePackageOptionsRequest;
use App\Contracts\FormRequest\ICreatePackageRequest;
use App\Contracts\FormRequest\ICreatePrizeRequest;
use App\Contracts\FormRequest\IUpdatePackageOptionsRequest;
use App\Contracts\FormRequest\IUpdatePackageRequest;
use App\Contracts\FormRequest\IUpdateUserRequest;
use App\Contracts\FormRequest\IUserLoginRequest;
use App\Contracts\FormRequest\IUserRegisterRequest;
use App\Http\Request\CreatePackageOptionsRequest;
use App\Http\Request\CreatePackageRequest;
use App\Http\Request\CreatePrizeRequest;
use App\Http\Request\UpdatePackageOptionsRequest;
use App\Http\Request\UpdatePackageRequest;
use App\Http\Request\UpdateUserRequest;
use App\Http\Request\UserLoginRequest;
use App\Http\Request\UserRegisterRequest;
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
    }
}
