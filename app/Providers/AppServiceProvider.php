<?php

namespace App\Providers;

use App\Helpers\Contracts\CollectionContract;
use App\Helpers\Contracts\ControllerContract;
use App\Helpers\Contracts\ResourceContract;
use App\Helpers\Contracts\ServiceContract;
use App\Helpers\Contracts\TokenServiceContract;
use App\Helpers\Contracts\UserServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\Collection;
use App\Http\Resources\Resource;
use App\Services\Service;
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
        App::singleton(CollectionContract::class, Collection::class);
        App::singleton(ResourceContract::class, Resource::class);
        App::singleton(ControllerContract::class, Controller::class);
        App::singleton(ServiceContract::class, Service::class);
    }
}
