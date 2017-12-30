<?php

namespace App\Services;

use App\Helpers\Contracts\ServiceContract;
use App\Helpers\Contracts\ModelContract;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class Service implements ServiceContract
{
    public $model;

    public function __construct(ModelContract $model)
    {
        $this->model = $model;
    }

    public function all(array $data): Collection
    {
        return $this->model->get();
    }

    public function show(array $data, int $id): ModelContract
    {
        return $this->model->find($id);
    }

    public function create(array $data): ModelContract
    {
        return $this->model->create($data);
    }

    public function update(array $data, int $id): ModelContract
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