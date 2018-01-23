<?php

namespace App\Models;

use App\Traits\ModelTrait;
use \Baum\Node;

class Category extends Node
{
    use ModelTrait;

    protected $table = 'categories';

    protected $leftColumn = 'left';
    protected $rightColumn = 'right';

    public $timestamps = true;
}