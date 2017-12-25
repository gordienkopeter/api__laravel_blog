<?php

namespace App\Http\Requests\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
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
     * Gets the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        Validator::extend('authorize.login', '\App\Validators\AuthValidator@authorizeLoginRule');
        Validator::replacer('authorize.login', '\App\Validators\AuthValidator@authorizeLoginMessage');

        Validator::extend('authorize.password', '\App\Validators\AuthValidator@authorizePasswordRule');
        Validator::replacer('authorize.password', '\App\Validators\AuthValidator@authorizePasswordMessage');

        return [
            'login' => 'required|string|max:255|authorize.login',
            'password' => 'required|string|min:6|authorize.password'
        ];
    }
}