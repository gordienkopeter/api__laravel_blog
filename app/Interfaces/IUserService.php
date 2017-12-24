<?php

namespace App\Interfaces;


use App\User;

interface IUserService
{
    public function userByLoginOrEmail(string $login): User;
    public function create(array $data): User;
    public function show(int $id): User;
}