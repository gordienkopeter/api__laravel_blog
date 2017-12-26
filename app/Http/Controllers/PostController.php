<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
    }

    public function all()
    {
        dd(Auth::user());
    }
}