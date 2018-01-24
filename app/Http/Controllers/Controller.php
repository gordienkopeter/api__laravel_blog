<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\CollectionContract;
use App\Helpers\Contracts\ControllerContract;
use App\Helpers\Contracts\ResourceContract;
use App\Helpers\Contracts\ServiceContract;
use App\Http\Resources\Collection;
use App\Http\Resources\Resource;
use App\Services\Service;
use App\Traits\FormRequestTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

abstract class Controller implements ControllerContract
{
    use FormRequestTrait;

    /**
     * @var Service
     */
    protected $service;

    public function __construct(ServiceContract $service)
    {
        $this->service = $service;
    }

    public function all(Request $request): CollectionContract
    {
        $collection = $this->service->all($request->all());

        return new Collection($collection);
    }

    public function show(Request $request, int $id): ResourceContract
    {
        $this->validateIdExists($id);

        $resource = $this->service->show($request->all(), $id);

        return new Resource($resource);
    }

    public function create(Request $request): ResourceContract
    {
        $resource = $this->service->create($request->all());

        return new Resource($resource);
    }

    public function update(Request $request, int $id): ResourceContract
    {
        $this->validateIdExists($id);

        $resource = $this->service->update($request->all(), $id);

        return new Resource($resource);
    }

    public function delete(Request $request, int $id): bool
    {
        $this->validateIdExists($id);

        return $this->service->delete($request->all(), $id);
    }

    public function callAction(string $method, array $parameters) {
        return self::$method(...array_values($parameters));
    }

    public function validate(array $data, array $rules, array $messages = [], array $attr = []): void
    {
        if (($validator = Validator::make($data, $rules, $messages, $attr)) && $validator->fails()) {
            $this->failedValidation($validator);
        }
    }

    public function validateIdExists(int $id): void
    {
        $this->validate(
            ['id' => $id],
            ['id' => 'exists:'. App::call([$this->service->model->getClass(), 'getTableName'])]
        );
    }
}
