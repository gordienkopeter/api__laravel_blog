<?php

namespace App\Interfaces;

use App\Models\User;

interface IUserService
{
    public function userByLoginOrEmail(string $login);
    public function create(array $data): User;
    public function show(int $id): User;
}