<?php

namespace App\Services;

use App\Helpers\Contracts\ServiceContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class Service implements ServiceContract
{
    /**
     * @var Model
     */
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $data): Collection
    {
        return $this->model->get();
    }

    public function show(array $data, int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(array $data, int $id): ?Model
    {
        $model = $this->model->find($id);

        if ($model) {
            $model->update($data);
        }

        return $model;
    }

    public function delete(array $data, int $id): bool
    {
        $model = $this->model->find($id);

        if ($model) {
            $model->delete();
        }
    }
}