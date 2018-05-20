<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PostViewController extends Controller
{
    public function singlePost(Request $request,$category,$slug){
        $valid = Category::where('url',$category)->exists();
        if(!$valid){
            return view('err');
        }
        $valid = Post::where('slug',$slug)->exists();
        if(!$valid){
            return view('err');
        }
        return view('post.singlePost');
    }
    public function wholeBlog(Request $request){
        $posts = Post::with('category')->paginate(15);
        return view('post.wholeBlog')->with(['posts'=>$posts]);
    }
    public function singleCategory(Request $request,$category){
        $valid = Category::where('url',$category)->exists();
        if(!$valid){
            return view('err');
        }
        return view('post.singleCategory')->with(['cat' => Category::where('url',$category)->get()[0]]);
    }

    // api

    public function wholeBlogApi(Request $request){
        return Post::paginate(2);
    }


}
