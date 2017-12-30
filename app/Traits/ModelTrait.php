<?php

namespace App\Traits;


trait ModelTrait
{
    public static function getTableName(): string
    {
        return (new static)->getTable();
    }

    public function getClass(): string {
        return self::class;
    }
}