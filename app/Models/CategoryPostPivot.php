<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class CategoryPostPivot extends Model
{
    use ModelTrait;

    protected $table = 'category_post_pivot';
    protected $guarded = ['id'];

    public $timestamps = true;
}