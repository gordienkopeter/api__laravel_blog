<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\Category\CategoryControllerContract;
use App\Helpers\Contracts\Category\CategoryServiceContract;
use App\Helpers\Contracts\CollectionContract;
use App\Helpers\Contracts\ResourceContract;
use App\Helpers\Contracts\ServiceContract;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\SearchCategoryByNameRequest;
use App\Http\Requests\Category\ShowCategoryNestedTreeRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Collection;
use App\Http\Resources\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

/**
 * Contextual binding dependency injection
 */
App::addContextualBinding(CategoryController::class, ServiceContract::class, CategoryServiceContract::class);

class CategoryController extends Controller implements CategoryControllerContract
{
    /**
     * @var CategoryServiceContract|ServiceContract
     */
    public $service;

    public function callAction(string $method, array $parameters) {
        switch ($method) {
            case 'create':
                return self::$method(app()->make(CreateCategoryRequest::class));
            case 'update':
                return self::$method(
                    app()->make(UpdateCategoryRequest::class),
                    array_get($parameters, 'id')
                );
            default:
                return self::$method(...array_values($parameters));
        }
    }

    public function showNestedTree(ShowCategoryNestedTreeRequest $request): CollectionContract
    {
        $lft = $request->input('left', 0);
        $rgt = $request->input('right', 0);

        if (!$lft || !$rgt) {
            return new Collection($this->service->getNestedTree());
        }

        return new Collection(collect([$this->service->getNestedTreeByRgtAndLft($lft, $rgt)]));
    }

    public function showNestedTreeById(Request $request, int $id): ResourceContract
    {
        $this->validateIdExists($id);

        return new Resource($this->service->getNestedTreeById($id));
    }

    public function searchByName(SearchCategoryByNameRequest $request): CollectionContract
    {
        return new Collection($this->service->getByName($request->input('name')));
    }
}