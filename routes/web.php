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
    Route::post('/orders/simulate', 'OrderController@demoSimulate');

    Route::get('/sellers', 'SellerController@index');
    Route::get('/sellers/{id}', 'SellerController@show');
    Route::put('/sellers/{id}', 'SellerController@update');

    Route::get('/marketplaces', 'MarketplaceController@index');
    Route::get('/marketplaces/{id}', 'MarketplaceController@show');
    Route::put('/marketplaces/{id}', 'MarketplaceController@update');

    Route::post('/users', 'UserController@store');
    Route::get('/me', 'UserController@current');
    Route::post('/users/login', 'UserController@login');
    Route::post('/users/logout', 'UserController@logout');

    Route::post('/reviews', 'ReviewController@store');
    Route::get('/reviews', 'ReviewController@index');
    Route::get('/reviews/{id}', 'ReviewController@show');
    Route::post('/reviews/{id}/accept', 'ReviewController@accept');
    Route::post('/reviews/{id}/refuse', 'ReviewController@refuse');

    Route::post('/reviews/{id}/comments', 'ReviewCommentController@store');

    Route::get('/fails', 'ErrorController@jsonGetSessionError');

});

Route::get('/admin/{vue_capture?}', function () {
    return view('admin/welcome');
})->where('vue_capture', '[\/\w\.-]*');

Route::get('/{vue_capture?}', function () {
    return view('front/welcome');
})->where('vue_capture', '[\/\w\.-]*');
