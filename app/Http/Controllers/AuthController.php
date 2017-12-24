<?php

namespace App\Http\Controllers;


use App\Http\Requests\Auth\AuthLoginRequest;
use App\Services\UserService;

class AuthController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(AuthLoginRequest $request)
    {
        $login = $request->input('login');
        $pass = $request->input('password');

        $user = $this->userService->userByLoginOrEmail($login);

        return new AuthResource($this->userService->userByLoginAndPass($login, $pass));

    }

    public function register()
    {

    }
}