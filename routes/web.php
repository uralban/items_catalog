<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ItemsController@readAll')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoriesController@readAll')->name('categories');

Route::post('/categories/form','CategoriesController@submit')->name('categories-form');

Route::get('/categories/{id}/oneCategory', 'CategoriesController@showOne')->name('showOneCategory');

Route::get('/categories/{id}/delete', 'CategoriesController@delete')->name('deleteCategory');

Route::post('/categories/{id}/oneCategory/edit', 'CategoriesController@edit')->name('editCategory');

Route::post('/item/form','ItemsController@submit')->name('items-form');

Route::get('/item/{id}/delete', 'ItemsController@delete')->name('deleteItem');

Route::get('/item/{id}/oneItem', 'ItemsController@showOne')->name('showOneItem');

Route::post('/item/{id}/oneItem/edit', 'ItemsController@edit')->name('editItem');

Route::post('/sort/form','SortController@sort')->name('sort-form');

Route::get('/sort/Category', function(){
  return view('index');
})->name('sort-complete');
