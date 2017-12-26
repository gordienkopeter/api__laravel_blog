<?php

namespace App\Http\Middleware;

use App\Helpers\Constants\ValidationBaseErrorConstants;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     * @throws \Exception
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::guest()) {
            throw new AuthenticationException('Unauthenticated', $guards);
        }

        if ($token = Auth::user()->token) {
            if ($token->expire_token < (time() * 1000)) {
                throw new \Exception(ValidationBaseErrorConstants::EXPIRED_TOKEN);
            }
        }

        return $next($request);
    }
}
