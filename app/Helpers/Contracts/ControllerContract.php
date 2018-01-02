<?php

namespace App\Helpers\Contracts;

use App\Exceptions\NotFoundException;
use Illuminate\Http\Request;

interface ControllerContract
{
    /**
     * BaseControllerContract constructor.
     * @param ServiceContract $service
     */
    public function __construct(ServiceContract $service);

    /**
     * @param Request $request
     * @return CollectionContract
     */
    public function all(Request $request): CollectionContract;

    /**
     * @param Request $request
     * @param int $id
     * @return ResourceContract
     * @throws NotFoundException
     */
    public function show(Request $request, int $id): ResourceContract;

    /**
     * @param Request $request
     * @return ResourceContract
     */
    public function create(Request $request): ResourceContract;

    /**
     * @param Request $request
     * @param int $id
     * @return ResourceContract
     */
    public function update(Request $request, int $id): ResourceContract;

    /**
     * @param Request $request
     * @param int $id
     * @return bool
     */
    public function delete(Request $request, int $id): bool;
}