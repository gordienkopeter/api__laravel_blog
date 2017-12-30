<?php

namespace App\Helpers\Contracts;


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
     */
    public function toArray($request);
}