<?php

namespace App\Services;

use App\Helpers\Contracts\ModelContract;
use App\Models\Category;
use Illuminate\Support\Facades\App;

/**
 * Contextual binding dependency injection
 */
App::when(CategoryService::class)
    ->needs(ModelContract::class)
    ->give(Category::class);

class CategoryService extends Service
{
    //
}