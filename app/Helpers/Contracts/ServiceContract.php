<?php

namespace App\Helpers\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ServiceContract
{
    /**
     * BaseServiceContract constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model);

    /**
     * @param array $data
     * @return Collection
     */
    public function all(array $data): Collection;

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function show(array $data, int $id): ?Model;

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): Model;

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function update(array $data, int $id): ?Model;

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function delete(array $data, int $id): bool;
}