<?php

namespace App\Helpers\Contracts;

use App\Models\User;

interface UserServiceContract
{
    /**
     * UserServiceContract constructor.
     *
     * @param TokenServiceContract $tokenService
     */
    public function __construct(TokenServiceContract $tokenService);

    /**
     * @param string $login
     * @return mixed
     */
    public function userByLoginOrEmail(string $login);

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): User;

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id);

    /**
     * @param string $token
     * @return mixed
     */
    public function userByToken(string $token);

    /**
     * @param User $user
     * @param string $password
     * @return string
     */
    public function preparePassword(User $user, string $password): string;

    /**
     * @param string $salt
     * @param string $password
     * @return string
     */
    public function preparePasswordBySalt(string $salt, string $password): string;
}