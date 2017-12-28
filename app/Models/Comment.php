<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use ModelTrait;

    protected $table = 'comments';
    protected $guarded = ['id'];

    public $timestamps = true;
}