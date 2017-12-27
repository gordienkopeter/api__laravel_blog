<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;

class FormRequestException extends ValidationException
{
    public $status = 400;

    private $error = '';

    public function getError()
    {
        return $this->error;
    }

    public function setError(string $error)
    {
        $this->error = $error;

        return $this;
    }

    public function render($request)
    {
        return response()->json(
            [
                'error' => self::getError(),
                'error_description' => self::errors(),
            ],
            $this->status
        );
    }
}
