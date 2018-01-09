<?php

namespace App\Models;

use App\Helpers\Contracts\ModelContract;
use App\Traits\ModelTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use ModelTrait;

    protected $table = 'users';
    protected $guarded = ['id'];

    public $timestamps = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'salt',
    ];

    public function token()
    {
        return $this->hasOne(Token::class);
    }
}
