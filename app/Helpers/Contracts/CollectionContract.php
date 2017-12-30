<?php

namespace App\Helpers\Contracts;


interface CollectionContract
{
    /**
     * BaseCollection constructor.
     *
     * @param mixed $collection
     * @param array $relationship_ids
     */
     public function __construct($collection, array $relationship_ids = []);


    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request);
}