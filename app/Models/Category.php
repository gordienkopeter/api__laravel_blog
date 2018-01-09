<?php

namespace App\Models;

use App\Traits\ModelTrait;

class Category extends \Baum\Node
{
    use ModelTrait;

    protected $table = 'categories';

    protected $leftColumn = 'left';
    protected $rightColumn = 'right';

    public $timestamps = true;
}