<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\ResourceContract;
use App\Helpers\Contracts\ServiceContract;
use App\Http\Requests\CreateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

/**
 * Contextual binding dependency injection
 */
App::addContextualBinding(CategoryController::class, ServiceContract::class, CategoryService::class);

class CategoryController extends Controller
{
    public function create(Request $request): ResourceContract
    {
        App::make(CreateCategoryRequest::class, [$request]);

        return parent::create($request);
    }
}