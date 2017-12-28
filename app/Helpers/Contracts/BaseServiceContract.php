<?php

namespace App\Helpers\Contracts;

use App\Models\BaseModel;

interface BaseServiceContract
{
    /**
     * BaseServiceContract constructor.
     *
     * @param BaseModel $model
     */
    public function __construct(BaseModel $model);

    /**
     * @param array $data
     * @return array
     */
    public function all(array $data): array;

    /**
     * @param array $data
     * @param int $id
     * @return BaseModel
     */
    public function show(array $data, int $id): BaseModel;

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): BaseModel;

    /**
     * @param array $data
     * @param int $id
     * @return BaseModel
     */
    public function update(array $data, int $id): BaseModel;

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function delete(array $data, int $id): bool;
}