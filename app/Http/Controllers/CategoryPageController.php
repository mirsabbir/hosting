<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class CategoryPageController extends Controller
{
    public function show(Request $request, $category){
        $valid = Category::where('name',$category)->exists();
        if(!$valid){
            return view('err');
        }
        $posts = Category::where('name',$category)->posts()->paginate(15);
        return view('post.all')->with(['posts' => $posts]);

    }

    public function api(Request $request, $category){
        $valid = Category::where('name',$category)->exists();
        if(!$valid){
            return [];
        }
        $posts = Category::where('name',$category)->posts()->paginate(15);
        return response()->json($posts);

    }
}
