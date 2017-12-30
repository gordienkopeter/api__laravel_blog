<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\BaseServiceContract;
use App\Services\PostService;
use Illuminate\Support\Facades\App;

/**
 * Contextual binding dependency injection
 */
App::when(PostController::class)
    ->needs(BaseServiceContract::class)
    ->give(PostService::class);

class PostController extends BaseController
{
    //
}