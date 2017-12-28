<?php

namespace App\Helpers\Contracts;


use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Carbon;

interface TokenServiceContract
{
    /**
     * @param User $user
     * @return Token
     */
    public function create(User $user): Token;

    /**
     * @return string
     */
    public function generateToken(): string;

    /**
     * @param int $minutes
     * @return Carbon
     */
    public function generateExpireToken(int $minutes = 0): Carbon;

    /**
     * @return array
     */
    public function generateTokens(): array;

    /**
     * @return array
     */
    public function generateEmptyTokens(): array;

    /**
     * @param string $id
     * @return mixed
     */
    public function show(string $id);

    /**
     * @param string $token
     * @return mixed
     */
    public function find(string $token);

    /**
     * @param string $access_token
     * @param string $refresh_token
     * @return mixed
     */
    public function refreshToken(string $access_token, string $refresh_token);

    /**
     * @param string $token
     * @return bool
     */
    public function existToken(string $token): bool;
}