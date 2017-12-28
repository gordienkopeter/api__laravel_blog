<?php

namespace App\Helpers\Contracts;


interface BaseCollectionContract
{
    /**
     * BaseCollection constructor.
     *
     * @param mixed $collection
     * @param array $relationship_ids
     */
     public function __construct($collection, array $relationship_ids = []);
}