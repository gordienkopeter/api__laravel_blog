<?php

namespace App\Helpers\Contracts;

use Illuminate\Support\Collection;

interface BaseServiceContract
{
    /**
     * BaseServiceContract constructor.
     *
     * @param BaseModelContract $model
     */
    public function __construct(BaseModelContract $model);

    /**
     * @param array $data
     * @return Collection
     */
    public function all(array $data): Collection;

    /**
     * @param array $data
     * @param int $id
     * @return BaseModelContract
     */
    public function show(array $data, int $id): BaseModelContract;

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): BaseModelContract;

    /**
     * @param array $data
     * @param int $id
     * @return BaseModelContract
     */
    public function update(array $data, int $id): BaseModelContract;

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function delete(array $data, int $id): bool;
}