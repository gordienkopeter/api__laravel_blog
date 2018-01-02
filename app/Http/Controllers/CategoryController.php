<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\ServiceContract;
use App\Services\CategoryService;
use Illuminate\Support\Facades\App;

/**
 * Contextual binding dependency injection
 */
App::when(CategoryController::class)
    ->needs(ServiceContract::class)
    ->give(CategoryService::class);

class CategoryController extends Controller
{
    //
}