<?php

namespace App\Helpers\Contracts;


interface BaseResourceContract
{
    /**
     * BaseResourceContract constructor.
     *
     * @param $resource
     * @param array $relationship_ids
     */
     public function __construct($resource, array $relationship_ids = []);
}