<?php

namespace App\Exceptions;

use App\Helpers\Constants\ValidationErrorConstants;
use Exception;

class ExpiredTokenException extends Exception
{
    public $status = 400;

    private $error;
    private $error_description;

    public function __construct(
        string $message = ValidationErrorConstants::EXPIRED_TOKEN,
        string $error_description = ValidationErrorConstants::EXPIRED_TOKEN_DESCRIPTION
    )
    {
        parent::__construct($message);

        $this->error = $message;
        $this->error_description = $error_description;
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function getErrorDescription(): string
    {
        return $this->error_description;
    }

    public function render($request)
    {
        return response()->json(
            [
                'error' => self::getError(),
                'error_description' => self::getErrorDescription(),
            ],
            $this->status
        );
    }
}
