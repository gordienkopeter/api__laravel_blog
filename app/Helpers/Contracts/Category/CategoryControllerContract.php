<?php

namespace App\Helpers\Contracts\Category;

use App\Helpers\Contracts\CollectionContract;
use App\Helpers\Contracts\ResourceContract;
use App\Http\Requests\Category\SearchCategoryByNameRequest;
use App\Http\Requests\Category\ShowCategoryNestedTreeRequest;
use Illuminate\Http\Request;

interface CategoryControllerContract
{
    /**
     * @param ShowCategoryNestedTreeRequest $request
     * @return CollectionContract
     */
    public function showNestedTree(ShowCategoryNestedTreeRequest $request): CollectionContract;

    /**
     * @param Request $request
     * @param $id
     * @return ResourceContract
     */
    public function showNestedTreeById(Request $request, int $id): ResourceContract;

    /**
     * @param SearchCategoryByNameRequest $request
     * @return CollectionContract
     */
    public function searchByName(SearchCategoryByNameRequest $request): CollectionContract;
}