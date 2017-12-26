<?php

namespace App\Http\Requests\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

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
     * Gets the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'refresh_token' => 'required|string|max:255',
        ];
    }
}