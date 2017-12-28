<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use ModelTrait;

    protected $table = 'categories';
    protected $guarded = ['id'];

    public $timestamps = true;
}