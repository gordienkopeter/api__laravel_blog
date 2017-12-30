<?php

namespace App\Services;

use App\Helpers\Contracts\BaseServiceContract;
use App\Helpers\Contracts\BaseModelContract;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class BaseService implements BaseServiceContract
{
    public $model;

    public function __construct(BaseModelContract $model)
    {
        $this->model = $model;
    }

    public function all(array $data): Collection
    {
        return $this->model->get();
    }

    public function show(array $data, int $id): BaseModelContract
    {
        return $this->model->find($id);
    }

    public function create(array $data): BaseModelContract
    {
        return $this->model->create($data);
    }

    public function update(array $data, int $id): BaseModelContract
    {
        $model = $this->show([], $id);
        $model->update($data);

        return $model;
    }

    public function delete(array $data, int $id): bool
    {
        return App::call([$this->model->getClass(), 'all']);
    }
}