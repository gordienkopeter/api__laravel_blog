<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\BaseCollectionContract;
use App\Helpers\Contracts\BaseControllerContract;
use App\Helpers\Contracts\BaseResourceContract;
use App\Helpers\Contracts\BaseServiceContract;
use App\Http\Resources\BaseCollection;
use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

abstract class BaseController extends Controller implements BaseControllerContract
{
    public $service;

    public function __construct(BaseServiceContract $service)
    {
        $this->service = $service;
    }

    public function all(Request $request): BaseCollectionContract
    {
        $collection = $this->service->all($request->all());

        return new BaseCollection($collection);
    }

    public function show(Request $request, int $id): BaseResourceContract
    {
        $resource = $this->service->show($request->all(), $id);

        return new BaseResource($resource);
    }

    public function create(Request $request): BaseResourceContract
    {
        $resource = $this->service->create($request->all());

        return new BaseResource($resource);
    }

    public function update(Request $request, int $id): BaseResourceContract
    {
        $resource = $this->service->update($request->all(), $id);

        return new BaseResource($resource);
    }

    public function delete(Request $request, int $id): bool
    {
        return $this->service->delete($request->all(), $id);
    }
}