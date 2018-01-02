<?php

namespace App\Helpers\Constants;

final class ValidationErrorConstants
{
    const INVALID_CLIENT = 'invalid_client';
    const INVALID_REQUEST = 'invalid_request';
    const EXPIRED_TOKEN = 'expired_token';

    const INVALID_CLIENT_DESCRIPTION = 'unauthenticated';
    const EXPIRED_TOKEN_DESCRIPTION = 'expired token';

    private function __construct()
    {
    }
}