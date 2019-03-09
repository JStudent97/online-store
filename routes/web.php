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

Route::get('/', 'ProductsController@index');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/admin_page', 'PagesController@admin_page');
Route::get('/basket', 'BascketController@index');
Route::resource('products', 'ProductsController');
Route::resource('providers', 'ProvidersController');
Route::resource('bascket', 'BascketController');
Route::resource('orders', 'OrdersController');
Route::delete('/bascket/{product_id}/{user_id}', 'BascketController@destroy');
//Route::post('/orders/{user_id}/{products}', 'OrdersController@store')->name('store_orders');
