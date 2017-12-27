<?php

namespace App\Traits;


use App\Exceptions\FormRequestException;
use App\Helpers\Constants\ValidationBaseErrorConstants;
use Illuminate\Contracts\Validation\Validator;

trait FormRequestTrait
{
    protected function failedValidation(Validator $validator)
    {
        throw (new FormRequestException($validator))
            ->setError(ValidationBaseErrorConstants::INVALID_REQUEST)
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}