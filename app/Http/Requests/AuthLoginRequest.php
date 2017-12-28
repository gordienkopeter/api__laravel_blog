<?php

namespace App\Http\Requests;

use App\Rules\AuthLoginRule;
use App\Rules\AuthPasswordRule;
use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
{
    use FormRequestTrait;

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
            'login' => ['required', 'string', 'max:255', new AuthLoginRule],
            'password' => ['required', 'string', 'min:6', new AuthPasswordRule],
        ];
    }
}