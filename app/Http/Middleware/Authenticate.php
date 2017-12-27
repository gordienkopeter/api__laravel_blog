<?php

namespace App\Http\Middleware;

use App\Exceptions\ExpiredTokenException;
use App\Models\Token;
use App\Models\User;
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
        $this->unauthenticated();

        $expire_dates = $this->generateExpireDates();

        $this->expiredRefreshToken($expire_dates);
        $this->expiredToken($expire_dates);

        return $next($request);
    }

    public function unauthenticated()
    {
        if (Auth::guest()) {
            throw new AuthenticationException();
        }
    }

    public function expiredRefreshToken(array $expire_dates)
    {
        $expire_refresh_token = array_get($expire_dates, 'expire_refresh_token', 0);
        $date_now = array_get($expire_dates, 'date_now', 0);

        if ($expire_refresh_token <= $date_now) {
            throw new AuthenticationException();
        }
    }

    public function expiredToken(array $expire_dates)
    {
        $expire_token = array_get($expire_dates, 'expire_token', 0);
        $date_now = array_get($expire_dates, 'date_now', 0);

        if ($expire_token <= $date_now) {
            throw new ExpiredTokenException();
        }
    }

    public function generateExpireDates(): array
    {
        if ($token = Auth::user()->token) {
            $expire_token = strtotime($token->expire_token);

            return [
                'date_now' => (int)date('U'),
                'expire_token' => $expire_token,
                'expire_refresh_token' => $expire_token + (env('AUTH_REFRESH_EXPIRED') * 60),
            ];
        }

        throw new AuthenticationException();
    }
}
