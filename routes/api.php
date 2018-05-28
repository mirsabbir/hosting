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

Route::get('search',function(Request $request){
    return array(App\Post::search($request->q)->take(7)->get());
});
Route::get('fullurl/get',function(Request $request){

    $category = \App\Category::findOrFail($request->c);
    
    return response()->json('/'.$category->url.'/'.$request->s);
    

});

Route::get('/category','PostViewController@allCategoryApi');

Route::get('/blog','PostViewController@wholeBlogApi');

Route::get('/category/{category}','PostViewController@singleCategoryApi');

Route::get('/{category}/{slug}','PostViewController@singlePostApi');





