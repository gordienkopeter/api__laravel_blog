<?php

namespace App\Http\Resources;

use App\Helpers\Contracts\BaseCollectionContract;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseCollection extends ResourceCollection implements BaseCollectionContract
{
    private $relationship_ids;

    public function __construct($collection, array $relationship_ids = [])
    {
        parent::__construct($collection);

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
            'data' => $this->collection,
            'total' => $this->collection->count(),
            'relationships' => $this->relationship_ids,
        ];
    }
}
