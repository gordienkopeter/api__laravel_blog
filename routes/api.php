<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(
    [
        'prefix' => 'v1'
    ],
    function () {
        Route::group(
            [],
            function () {
                Route::post('login', 'AuthController@login');
                Route::post('register', 'AuthController@register');
                Route::post('refresh-token', 'AuthController@refreshToken');
            }
        );

        Route::group(
            [
                'prefix' => 'posts'
            ],
            function () {
                Route::get('', 'PostController@all');
                Route::get('{id}', 'PostController@show');
                Route::post('', 'PostController@create');
                Route::put('{id}', 'PostController@update');
                Route::delete('{id}', 'PostController@delete');
            }
        );
    }
);