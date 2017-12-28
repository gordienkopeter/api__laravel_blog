<?php

namespace App\Helpers\Contracts;

use Illuminate\Http\Request;

interface BaseControllerContract
{
    /**
     * BaseControllerContract constructor.
     * @param BaseServiceContract $service
     */
    public function __construct(BaseServiceContract $service);

    /**
     * @param Request $request
     * @return BaseCollectionContract
     */
    public function all(Request $request): BaseCollectionContract;

    /**
     * @param Request $request
     * @param int $id
     * @return BaseResourceContract
     */
    public function show(Request $request, int $id): BaseResourceContract;

    /**
     * @param Request $request
     * @return BaseResourceContract
     */
    public function create(Request $request): BaseResourceContract;

    /**
     * @param Request $request
     * @param int $id
     * @return BaseResourceContract
     */
    public function update(Request $request, int $id): BaseResourceContract;

    /**
     * @param Request $request
     * @param int $id
     * @return bool
     */
    public function delete(Request $request, int $id): bool;
}