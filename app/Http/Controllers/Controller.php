<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\CollectionContract;
use App\Helpers\Contracts\ControllerContract;
use App\Helpers\Contracts\ResourceContract;
use App\Helpers\Contracts\ServiceContract;
use App\Http\Resources\Collection;
use App\Http\Resources\Resource;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController implements ControllerContract
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $service;

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
        $resource = $this->service->update($request->all(), $id);

        return new Resource($resource);
    }

    public function delete(Request $request, int $id): bool
    {
        return $this->service->delete($request->all(), $id);
    }
}
