<?php

namespace App\Http\Resources;

use App\Exceptions\NotFoundException;
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

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     * @throws NotFoundException
     */
    public function toArray($request)
    {
        if (is_null($this->resource)) {
            throw new NotFoundException();
        }

        return [
            'item' => $this->resource,
            'relationships' => $this->relationship_ids,
        ];
    }
}
