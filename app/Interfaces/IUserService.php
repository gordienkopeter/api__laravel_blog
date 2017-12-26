<?php

namespace App\Interfaces;

use App\Models\User;
use App\Services\TokenService;

interface IUserService
{
    public function __construct(TokenService $tokenService);
    public function userByLoginOrEmail(string $login);
    public function create(array $data): User;
    public function show(int $id);
    public function userByToken(string $token);
    public function preparePassword(User $user, string $password): string;
    public function preparePasswordBySalt(string $salt, string $password): string;
}