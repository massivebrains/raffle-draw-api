<?php

namespace App\Providers;

use App\Contracts\DTO\ICreateUserDTO;
use App\DTOs\CreateUserDTO;
use Illuminate\Support\ServiceProvider;

class DTOServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //DTO

        $this->app->bind(ICreateUserDTO::class, CreateUserDTO::class);
    }
}
