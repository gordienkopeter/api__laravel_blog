<?php

namespace App\Services;

use App\Interfaces\IUserService;
use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class UserService implements IUserService
{
    protected $tokenService;

    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    public function userByLoginOrEmail(string $login)
    {
        return User::where('login', $login)
            ->orWhere('email', $login)
            ->first();
    }

    public function create(array $data): User
    {
        $salt = Str::random(33);

        return User::create([
            'login' => array_get($data, 'login'),
            'email' => array_get($data, 'email'),
            'first_name' => array_get($data, 'first_name'),
            'last_name' => array_get($data, 'last_name'),
            'password' => $this->preparePasswordBySalt($salt, array_get($data, 'password')),
            'salt' => Crypt::encryptString($salt)
        ]);
    }

    public function show(int $id): User
    {
        return User::where('id', $id)
            ->first();
    }

    public function userByToken(string $token): User
    {
        return $this->tokenService
            ->find($token)
            ->user;
    }

    public function preparePassword(User $user, string $password): string
    {
        return sha1(Crypt::decryptString($user->salt) . sha1($password));
    }

    public function preparePasswordBySalt(string $salt, string $password): string
    {
        return sha1($salt . sha1($password));
    }
}