<?php

namespace App\Providers;

use App\Helpers\Contracts\TokenServiceContract;
use App\Helpers\Contracts\UserServiceContract;
use App\Services\TokenService;
use App\Services\UserService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::singleton(UserServiceContract::class, UserService::class);
        App::singleton(TokenServiceContract::class, TokenService::class);
    }
}
