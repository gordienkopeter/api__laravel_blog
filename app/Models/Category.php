<?php

namespace App\Models;

use App\Helpers\Contracts\ModelContract;
use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements ModelContract
{
    use ModelTrait;

    protected $table = 'categories';
    protected $guarded = ['id'];

    public $timestamps = true;
}