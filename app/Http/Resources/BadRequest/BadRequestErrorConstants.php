<?php

namespace App\Http\Resources\BadRequest;

final class BadRequestErrorConstants
{
    const INVALID_CLIENT = 'invalid_client';
    const INVALID_REQUEST = 'invalid_request';
    const EXPIRED_TOKEN = 'expired_token';

    const INVALID_CLIENT_DESCRIPTION = 'invalid_client';
    const INVALID_REQUEST_DESCRIPTION = 'invalid_request';
    const EXPIRED_TOKEN_DESCRIPTION = 'expired_token';
}