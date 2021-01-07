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
    return view('dashboard');
});

Route::get('dashboard', 'DashboardController@index');
Route::post('post-category-form', 'CategoryController@store');
Route::get('create-category', 'CategoryController@create');
Route::get('all-categories', 'CategoryController@index');
Route::get('edit-category/{id}', 'CategoryController@edit');
Route::post('update-category/{id}', 'CategoryController@update');
Route::get('delete-category/{id}', 'CategoryController@destroy');
Route::get('get-product-form', 'ProductController@create');
Route::post('post-product-form', 'ProductController@store');
Route::get('all-products', 'ProductController@index');
Route::get('edit-product/{id}', 'ProductController@edit');
Route::post('post-product-edit-form/{id}', 'ProductController@update');
Route::get('delete-product/{id}', 'ProductController@destroy');
Route::get('get-slider-form', 'SliderController@create');
Route::post('post-slider-form', 'SliderController@store');
Route::get('all-sliders', 'SliderController@index');
Route::get('edit-slider/{id}', 'SliderController@edit');
Route::post('post-slider-edit-form/{id}', 'SliderController@update');
Route::get('delete-slider/{id}', 'SliderController@destroy');
