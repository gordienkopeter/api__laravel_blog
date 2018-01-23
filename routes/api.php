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
                Route::post('', 'PostController@create');

                Route::group(
                    [
                        'prefix' => '{id}'
                    ],
                    function () {
                        Route::get('', 'PostController@show');
                        Route::put('', 'PostController@update');
                        Route::delete('', 'PostController@delete');
                    }
                );
            }
        );

        Route::group(
            [
                'prefix' => 'categories'
            ],
            function () {
                Route::get('', 'CategoryController@all');
                Route::post('', 'CategoryController@create');

                Route::get('tree', 'CategoryController@showNestedTree');
                Route::get('search', 'CategoryController@searchByName');

                Route::group(
                    [
                        'prefix' => '{id}'
                    ],
                    function () {
                        Route::get('', 'CategoryController@show');
                        Route::post('', 'CategoryController@update');
                        Route::delete('', 'CategoryController@delete');

                        Route::get('tree', 'CategoryController@showNestedTreeById');
                    }
                );
            }
        );
    }
);