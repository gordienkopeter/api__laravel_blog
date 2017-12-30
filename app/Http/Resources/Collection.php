<?php

namespace App\Http\Resources;

use App\Helpers\Contracts\CollectionContract;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Collection extends ResourceCollection implements CollectionContract
{
    private $relationship_ids;

    public function __construct($collection, array $relationship_ids = [])
    {
        parent::__construct($collection);

        $this->relationship_ids = $relationship_ids;
    }

    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'total' => $this->collection->count(),
            'relationships' => $this->relationship_ids,
        ];
    }
}
