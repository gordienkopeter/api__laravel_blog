<?php

namespace App\Services;

use App\Helpers\Contracts\ModelContract;
use App\Models\Category;
use Illuminate\Support\Facades\App;

/**
 * Contextual binding dependency injection
 */
App::addContextualBinding(CategoryService::class, ModelContract::class, Category::class);

class CategoryService extends Service
{
    //
}