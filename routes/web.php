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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('home/category/edit','HomeController@editCategory');
Route::post('home/category/edit','HomeController@editCategoryPost');
Route::get('home/tag/edit','HomeController@editTag');
Route::post('home/tag/edit','HomeController@editTagPost');

Route::get('/new','PostController@show')->name('new');
Route::post('/new', 'PostController@store');



Route::get('/blog','PostViewController@wholeBlog');

Route::get('/category/{category}','PostViewController@singleCategory');

Route::get('/{category}/{slug}','PostViewController@singlePost');

