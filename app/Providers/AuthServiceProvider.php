<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->viaRequest('userAuth', function (Request $request) {
            if ($request->bearerToken()) {
                return app('App\Services\UserService')
                    ->userByToken($request->bearerToken());
            }
        });

        Auth::setDefaultDriver('user_auth');

        $this->registerPolicies();
    }
}
