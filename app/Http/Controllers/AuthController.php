<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\TokenServiceContract;
use App\Helpers\Contracts\UserServiceContract;
use App\Http\Requests\AuthRefreshTokenRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Resources\AuthResource;

class AuthController extends Controller
{
    protected $userService;
    protected $tokenService;

    public function __construct(
        UserServiceContract $userService,
        TokenServiceContract $tokenService
    )
    {
        $this->userService = $userService;
        $this->tokenService = $tokenService;
    }

    public function login(AuthLoginRequest $request)
    {
        $login = $request->input('login');
        $user = $this->userService->userByLoginOrEmail($login);

        $user->token()->update($this->tokenService->generateTokens());

        $token = $user->token;

        return new AuthResource($token);
    }

    public function register(AuthRegisterRequest $request)
    {
        $user = $this->userService->create($request->all());
        $token = $user->token()->create($this->tokenService->generateTokens());

        return new AuthResource($token);
    }

    public function refreshToken(AuthRefreshTokenRequest $request)
    {
        return new AuthResource($this->tokenService->refreshToken(
            $request->bearerToken(),
            $request->input('refresh_token')
        ));
    }
}