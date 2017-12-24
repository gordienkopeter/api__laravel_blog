<?php

namespace App\Services;

use App\Interfaces\IUserService;
use App\User;

class UserService implements IUserService
{
    public function userByLoginOrEmail(string $login): User
    {
        return User::where('login', $login)
            ->orWhere('email', $login)
            ->first();
    }

    public function create(array $data): User
    {

    }

    public function show(int $id): User
    {
        return User::where('id', $id)
            ->first();
    }

}