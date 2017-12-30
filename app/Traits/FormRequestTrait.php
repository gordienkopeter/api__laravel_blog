<?php

namespace App\Traits;


use App\Exceptions\FormRequestException;
use App\Helpers\Constants\ValidationErrorConstants;
use Illuminate\Contracts\Validation\Validator;

trait FormRequestTrait
{
    protected function failedValidation(Validator $validator)
    {
        throw (new FormRequestException($validator))
            ->setError(ValidationErrorConstants::INVALID_REQUEST)
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}