<?php

namespace App\Services;

use App\Helpers\Contracts\ModelContract;
use App\Models\Post;
use Illuminate\Support\Facades\App;

/**
 * Contextual binding dependency injection
 */
App::when(PostService::class)
    ->needs(ModelContract::class)
    ->give(Post::class);

class PostService extends Service
{
    //
}