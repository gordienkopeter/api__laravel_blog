<?php

namespace App\Helpers\Contracts\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface CategoryServiceContract
{
    /**
     * @param string $name
     * @return Collection
     */
    public function getByName(string $name): Collection;

    /**
     * @return Collection
     */
    public function getNestedTree(): Collection;

    /**
     * @param int $lft
     * @param int $rgt
     * @return Model
     */
    public function getNestedTreeByRgtAndLft(int $lft, int $rgt): ?Model;

    /**
     * @param Model $model
     * @return Model
     */
    public function getNestedTreeByModel(Model $model): Model;

    /**
     * @param int $id
     * @return Model
     */
    public function getNestedTreeById(int $id): ?Model;
}