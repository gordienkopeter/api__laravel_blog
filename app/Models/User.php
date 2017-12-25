<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use ModelTrait;

    protected $table = 'users';
    /**
     * Auto create timestamp
     *
     * @var bool
     */
    public $timestamps = true;

    protected $guarded = ['id'];
}
