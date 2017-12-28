<?php

namespace App\Services;

use App\Helpers\Contracts\BaseModelContract;
use App\Helpers\Contracts\BaseServiceContract;
use App\Models\Post;

class BaseService implements BaseServiceContract
{
    public $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function all(array $data): array
    {
        dd($this->model);
    }

    public function show(array $data, int $id): BaseModelContract
    {
    }

    public function create(array $data): BaseModelContract
    {
    }

    public function update(array $data, int $id): BaseModelContract
    {
    }

    public function delete(array $data, int $id): bool
    {
    }
}