<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Resources\AuthResource;
use App\Services\TokenService;
use App\Services\UserService;

class AuthController extends Controller
{
    protected $userService;
    protected $tokenService;

    public function __construct(UserService $userService, TokenService $tokenService)
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
}