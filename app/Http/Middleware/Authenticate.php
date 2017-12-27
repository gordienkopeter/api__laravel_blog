<?php

namespace App\Http\Middleware;

use App\Exceptions\ExpiredTokenException;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            throw new AuthenticationException();
        }

        if ($token = Auth::user()->token) {
            $date_now = date('U');
            $expire_token = strtotime($token->expire_token);
            $expire_refresh_token = $expire_token + (env('AUTH_REFRESH_EXPIRED') * 60);

            if ($expire_refresh_token < $date_now) {
                throw new AuthenticationException();
            }

            if ($expire_token < $date_now) {
                throw new ExpiredTokenException();
            }
        } else {
            throw new AuthenticationException();
        }

        return $next($request);
    }
}
