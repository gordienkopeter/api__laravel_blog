<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use ModelTrait;

    protected $table = 'posts';
    protected $guarded = ['id'];

    public $timestamps = true;
}