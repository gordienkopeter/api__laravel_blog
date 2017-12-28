<?php

namespace App\Http\Resources;

use App\Helpers\Contracts\BaseResourceContract;
use Illuminate\Http\Resources\Json\Resource;

class BaseResource extends Resource implements BaseResourceContract
{
    private $relationship_ids;

    public function __construct($resource, array $relationship_ids = [])
    {
        parent::__construct($resource);

        $this->relationship_ids = $relationship_ids;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'item' => $this->resource,
            'relationships' => $this->relationship_ids,
        ];
    }
}
