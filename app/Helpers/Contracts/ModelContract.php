<?php

namespace App\Helpers\Contracts;

interface ModelContract
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