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
           'Y-n-j G:i:00',
           mktime(
               date('G'),
               date('i') + 10,
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

    public function find(string $token): Token
    {
        return Token::where('access_token', $token)
            ->first();
    }

    public function refreshToken(string $refresh_token): Token
    {
        $token = Token::where('refresh_token', $refresh_token)->first();
        $token->update($this->generateTokens());

        return $token;
    }
}