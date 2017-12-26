<?php

namespace App\Services;


use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class TokenService
{
    public function create(User $user): Token
    {
        return Token::create(array_merge(['user_id' => $user->id], $this->generateTokens()));
    }

    public function generateToken(): string
    {
       return Crypt::encryptString(Str::random(33));
    }

    public function generateExpireToken(): string
    {
       return date(
           'Y-n-j G:i',
           mktime(
               date('G'),
               date('i') + env('AUTH_EXPIRED'),
               0,
               date('m'),
               date('d'),
               date('Y')
           )
       );
    }

    public function generateTokens(): array
    {
        return [
            'access_token' => $this->generateToken(),
            'refresh_token' => $this->generateToken(),
            'expire_token' => $this->generateExpireToken()
        ];
    }

    public function show(string $id)
    {
        return Token::where('id', $id)
            ->first();
    }

    public function find(string $token)
    {
        return Token::where('access_token', $token)
            ->first();
    }

    public function refreshToken(string $refresh_token)
    {
        $token = Token::where('refresh_token', $refresh_token)->first();
        $token->update($this->generateTokens());

        return $token;
    }

    public function existToken(string $token): bool
    {
        return (bool)$this->find($token);
    }
}