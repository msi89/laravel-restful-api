<?php

use Illuminate\Http\Request;

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
Route::get('/', function(){
    return view('api');
});
Route::prefix('auth')->group(function () {
    Route::post('login', 'Api\AuthController@login')->name('login');
    Route::post('register', 'Api\AuthController@register')->name('register');
});
Route::middleware('auth:api')->group( function () {
    Route::prefix('auth')->group(function() {
        Route::get('user', 'Api\AuthController@user');
        Route::get('logout', 'Api\AuthController@logout');
    });
    Route::resource('products', 'Api\ProductController');
	Route::resource('articles', 'Api\ArticleController');
});