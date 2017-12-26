<?php

namespace App\Models;


use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use ModelTrait;

    protected $table = 'tokens';
    protected $guarded = ['id'];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getExpireTokenAttribute($value)
    {
        return strtotime( $value) * 1000;
    }
}