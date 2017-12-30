<?php

namespace App\Models;

use App\Helpers\Contracts\BaseModelContract;
use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements BaseModelContract
{
    use ModelTrait;

    protected $table = 'posts';
    protected $guarded = ['id'];

    public $timestamps = true;
}