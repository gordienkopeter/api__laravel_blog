<?php

namespace App\Services;


use App\Models\BaseModel;
use App\Models\Post;
class PostService extends BaseService
{
    public function __construct(BaseModel $model)
    {
        parent::__construct($model);
    }
}