<?php

namespace App\Http\Resources;

use App\Helpers\Contracts\ResourceContract;
use Illuminate\Http\Resources\Json\Resource as IlluminateResource;

class Resource extends IlluminateResource implements ResourceContract
{
    private $relationship_ids;

    public function __construct($resource, array $relationship_ids = [])
    {
        parent::__construct($resource);

        $this->relationship_ids = $relationship_ids;
    }

    public function toArray($request)
    {
        return [
            'item' => $this->resource,
            'relationships' => $this->relationship_ids,
        ];
    }
}
