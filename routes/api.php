<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->post('/slug', function (Request $request) {
    $can = \App\Post::where('slug',$request->slug)->exists();
    if($can){
        return ['can' => 0];
    } else return ['can' => 1];

});

Route::get('/category/{category}','CategoryPageController@api');