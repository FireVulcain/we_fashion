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


Route::get('/', 'FrontController@index');

Route::get('product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

Route::get('sales', 'FrontController@sales');

Route::get('categories/{id}', 'FrontController@categories')->where(['id' => '[0-9]']);

Route::get('/home', 'HomeController@index')->name('home');


// Admin routes

Route::get('admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('admin/products', 'ProductController')->middleware('auth');
Route::resource('admin/categories', 'CategorieController')->middleware('auth');