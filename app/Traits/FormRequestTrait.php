<?php

namespace App\Traits;


use App\Exceptions\FormRequestException;
use App\Helpers\Constants\ValidationErrorConstants;
use Illuminate\Contracts\Validation\Validator;

trait FormRequestTrait
{
    /**
     * @param Validator $validator
     * @throws FormRequestException
     */
    public function failedValidation(Validator $validator): void
    {
        throw (new FormRequestException($validator))
            ->setError(ValidationErrorConstants::INVALID_REQUEST);
    }
}