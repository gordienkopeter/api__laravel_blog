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
        $token = $user->token;

        return new AuthResource($token);
    }

    public function register(AuthRegisterRequest $request)
    {
        $user = $this->userService->create($request->all());
        $token = $user->token()->create($user);

        return new AuthResource($token);
    }
}