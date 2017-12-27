<?php

namespace App\Http\Requests\Auth;

use App\Models\Token;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthRefreshTokenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $authenticate = app('App\Http\Middleware\Authenticate');
            $tokenService = app('App\Services\TokenService');

            $authenticate->unauthenticated();
            $expire_dates = $authenticate->generateExpireDates();

            try {
                $authenticate->expiredRefreshToken($expire_dates);
            } catch (AuthenticationException $exception) {
                Auth::user()->token()
                    ->update($tokenService->generateEmptyTokens());

                throw $exception;
            }
        });
    }

    /**
     * Gets the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'refresh_token' => [
                'required',
                'string',
                'max:255',
                'refresh_token' => Rule::exists(Token::getTableName(), 'refresh_token')
                    ->where('access_token', $this->bearerToken())
            ],
        ];
    }
}