<?php

namespace App\Models;

use App\Traits\ModelTrait;

class Post extends BaseModel
{
    use ModelTrait;

    protected $table = 'posts';
    protected $guarded = ['id'];

    public $timestamps = true;
}