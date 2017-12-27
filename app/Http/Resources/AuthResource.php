<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AuthResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'expire_token' => strtotime($this->expire_token),
            'token_type' => $this->token_type,
        ];
    }
}
