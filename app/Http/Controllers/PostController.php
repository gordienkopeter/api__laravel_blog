<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\ServiceContract;
use App\Services\PostService;
use Illuminate\Support\Facades\App;

/**
 * Contextual binding dependency injection
 */
App::when(PostController::class)
    ->needs(ServiceContract::class)
    ->give(PostService::class);

class PostController extends Controller
{
    //
}