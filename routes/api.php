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
    [],
    function () {
        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');

        Route::post('refresh-token', 'AuthController@refreshToken');

        Route::post('password-reset', 'AuthController@sendResetPasswordToken');
        Route::put('password-reset', 'AuthController@resetPassword');
    }
);

Route::group(
    [
        'middleware' => ['auth'],
        'prefix' => 'v1'
    ],
    function () {
        Route::group(
            [
                'prefix' => 'posts'
            ],
            function () {
                Route::get('', 'PostController@all');
            }
        );
    }
);