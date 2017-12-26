<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use ModelTrait;

    protected $table = 'users';
    protected $guarded = ['id'];

    public $timestamps = true;

    public function token()
    {
        return $this->hasOne(Token::class);
    }
}
