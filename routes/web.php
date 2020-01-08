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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'DashboardController@index')->name('home');
Route::get('/sales', 'DashboardController@sales')->name('sales');

Route::get('/beginners_guide', 'HomeController@beginners')->name('beg');


Route::get('/{token}/tickets', 'HomeController@products')->name('products');
Route::get('/{token}/ticket/{product}', 'HomeController@get_product');
Route::post('/{token}/ticket/{product}', 'HomeController@get_product');
