<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('api')->group(function () {

    Route::get('/orders/{id}', 'OrderController@show');
    Route::get('/sellers', 'SellerController@index');
    Route::get('/sellers/{id}', 'SellerController@show');
    Route::post('/users', 'UserController@store');
    Route::post('/me', 'UserController@current');
    Route::post('/users/login', 'UserController@login');
    Route::post('/reviews', 'ReviewController@store');
    Route::get('/fails', 'ErrorController@jsonGetSessionError');

});

Route::get('/admin/{vue_capture?}', function () {
    return view('admin/welcome');
})->where('vue_capture', '[\/\w\.-]*');

Route::get('/{vue_capture?}', function () {
    return view('front/welcome');
})->where('vue_capture', '[\/\w\.-]*');
