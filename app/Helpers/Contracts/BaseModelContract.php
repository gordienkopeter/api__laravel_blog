<?php

namespace App\Helpers\Contracts;

interface BaseModelContract
{
    /**
     * @return string
     */
    public static function getTableName(): string;

    /**
     * @return string
     */
    public function getClass(): string;
}