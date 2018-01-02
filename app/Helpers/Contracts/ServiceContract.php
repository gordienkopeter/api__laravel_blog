<?php

namespace App\Helpers\Contracts;

use Illuminate\Support\Collection;

interface ServiceContract
{
    /**
     * BaseServiceContract constructor.
     *
     * @param ModelContract $model
     */
    public function __construct(ModelContract $model);

    /**
     * @param array $data
     * @return Collection
     */
    public function all(array $data): Collection;

    /**
     * @param array $data
     * @param int $id
     * @return ModelContract
     */
    public function show(array $data, int $id): ?ModelContract;

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): ?ModelContract;

    /**
     * @param array $data
     * @param int $id
     * @return ModelContract
     */
    public function update(array $data, int $id): ?ModelContract;

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function delete(array $data, int $id): bool;
}