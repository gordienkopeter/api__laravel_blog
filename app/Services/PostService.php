<?php

namespace App\Services;

use App\Helpers\Contracts\BaseModelContract;
use App\Models\Post;
use Illuminate\Support\Facades\App;

/**
 * Contextual binding dependency injection
 */
App::when(PostService::class)
    ->needs(BaseModelContract::class)
    ->give(Post::class);

class PostService extends BaseService
{
    //
}