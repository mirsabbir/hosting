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
    return view('welcome')->with(['posts'=>\App\Post::latest()->take(5)->get(), 'posts2'=>\App\Post::orderBy('count','desc')->take(5)->get()]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search','SearchController@index');

Route::get('home/category/edit','HomeController@editCategory');
Route::post('home/category/edit','HomeController@editCategoryPost');
Route::get('home/tag/edit','HomeController@editTag');
Route::post('home/tag/edit','HomeController@editTagPost');

Route::get('/new','PostController@show')->name('new');
Route::post('/new', 'PostController@store');

Route::get('tags','PostViewController@allTags');
Route::get('tags/{tag}','PostViewController@singleTag');

Route::get('/blog','PostViewController@wholeBlog');

Route::get('/category/{category}','PostViewController@singleCategory');

Route::get('/{category}/{slug}','PostViewController@singlePost');

Route::post('/{category}/{slug}','PostViewController@storeComment');

