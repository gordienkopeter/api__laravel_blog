<?php

namespace App\Providers;

use App\Helpers\Contracts\BaseCollectionContract;
use App\Helpers\Contracts\BaseControllerContract;
use App\Helpers\Contracts\BaseModelContract;
use App\Helpers\Contracts\BaseResourceContract;
use App\Helpers\Contracts\BaseServiceContract;
use App\Helpers\Contracts\TokenServiceContract;
use App\Helpers\Contracts\UserServiceContract;
use App\Http\Controllers\BaseController;
use App\Http\Resources\BaseCollection;
use App\Http\Resources\BaseResource;
use App\Models\Post;
use App\Services\BaseService;
use App\Services\PostService;
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
        App::singleton(BaseCollectionContract::class, BaseCollection::class);
        App::singleton(BaseResourceContract::class, BaseResource::class);
        App::singleton(BaseControllerContract::class, BaseController::class);
        App::singleton(BaseServiceContract::class, BaseService::class);
        App::singleton(BaseServiceContract::class, PostService::class);
//        App::singleton(Post::class, BaseModelContract::class);
    }
}
