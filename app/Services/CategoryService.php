<?php

namespace App\Services;

use App\Helpers\Contracts\Category\CategoryServiceContract;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

/**
 * Contextual binding dependency injection
 */
App::addContextualBinding(CategoryService::class, Model::class, Category::class);

class CategoryService extends Service implements CategoryServiceContract
{
    public function create(array $data): Model
    {
        $category = parent::create($data);

        if (
            ($parent_id = array_get($data, 'parent_id')) &&
            ($parent = $this->model->find($parent_id))
        ) {
            $category->makeChildOf($parent);
        }

        return $category;
    }

    public function getByName(string $name): Collection
    {
        return $this->model->where('name', 'like', '%' . $name . '%')->get();
    }

    public function getNestedTree(): Collection
    {
        return $this->model
            ->where($this->model->getParentColumnName(), 0)
            ->get()
            ->transform([$this, 'getNestedTreeByModel']);
    }

    public function getNestedTreeByRgtAndLft(int $lft, int $rgt): ?Model
    {
        $node = $this->model
            ->where($this->model->getLeftColumnName(), $lft)
            ->where($this->model->getRightColumnName(), $rgt)
            ->first();

        return $node ? $this->getNestedTreeByModel($node) : null;
    }

    public function getNestedTreeByModel(Model $model): Model
    {
        return $model->getDescendantsAndSelf()
            ->toHierarchy()
            ->first();
    }

    public function getNestedTreeById(int $id): ?Model
    {
        return ($node = $this->model->find($id)) ? $this->getNestedTreeByModel($node): null;
    }
}