<?php

namespace App\Helpers\Contracts;


use App\Exceptions\NotFoundException;

interface ResourceContract
{
    /**
     * BaseResourceContract constructor.
     *
     * @param $resource
     * @param array $relationship_ids
     */
     public function __construct($resource, array $relationship_ids = []);

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     * @throws NotFoundException
     */
    public function toArray($request);
}