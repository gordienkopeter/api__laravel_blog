<?php

namespace App\Services;

use App\Interfaces\IUserService;
use App\Models\User;

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
        $salt = str_random(33);

        return User::create([
            'login' => array_get($data, 'login'),
            'email' => array_get($data, 'email'),
            'first_name' => array_get($data, 'first_name'),
            'last_name' => array_get($data, 'last_name'),
            'password' => $this->preparePasswordBySalt($salt, array_get($data, 'password')),
            'salt' => $salt,
            'access_token' => '',
            'access_token' => '',
            'access_token' => '',
        ]);
    }

    public function show(int $id): User
    {
        return User::where('id', $id)
            ->first();
    }

    public function preparePassword(User $user, string $password): string
    {
        return sha1($user->salt . sha1($password));
    }

    public function preparePasswordBySalt(string $salt, string $password): string
    {
        return sha1($salt . sha1($password));
    }
}