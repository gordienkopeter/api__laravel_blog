<?php

namespace App\Http\Controllers;

use App\Services\PostService;

class PostController extends BaseController
{
    public function __construct(PostService $service)
    {
        $this->service = $service;
    }
}