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

Route::get('/reviews/new', function () {
    return view('welcome');
});

Route::get('/orders/{id}', 'OrderController@show')->where('id', '[0-9]+');

Route::post('/reviews', 'ReviewController@store');
