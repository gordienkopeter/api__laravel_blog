<?php

namespace App\Traits;


use App\Exceptions\ValidationBaseException;
use App\Helpers\Constants\ValidationBaseErrorConstants;
use Illuminate\Contracts\Validation\Validator;

trait FailedValidationBaseTrait
{
    protected function failedValidation(Validator $validator)
    {
        throw (new ValidationBaseException($validator))
            ->setError(ValidationBaseErrorConstants::INVALID_REQUEST)
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}