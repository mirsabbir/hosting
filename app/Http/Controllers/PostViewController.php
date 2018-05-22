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
            abort(404);
        }
        $valid = Post::where('slug',$slug)->exists();
        if(!$valid){
            abort(404);
        }
        // dd(Post::where('slug',$slug)->with(['comments.replies'])->get()[0]);
        return view('post.singlePost')->with([
            'cat' => Category::where('url',$category)->get()[0],
            'post' => Post::where('slug',$slug)->with(['comments.replies','tags'])->get()->first(),
            
        ]);
    }
    public function wholeBlog(Request $request){
        $posts = Post::with('category')->paginate(15);
        return view('post.wholeBlog')->with(['posts'=>$posts]);
    }
    public function singleCategory(Request $request,$category){
        $valid = Category::where('url',$category)->exists();
        if(!$valid){
            abort(404);
        }
        $posts = Post::where('category_id', Category::where('url',$category)->get()[0]['id'])->paginate(4);
        return view('post.singleCategory')->with(['cat' => Category::where('url',$category)->get()[0],
            'posts' => $posts,
        ]);
    }

    // api

    public function wholeBlogApi(Request $request){
        return Post::paginate(4);
    }
    public function singleCategoryApi(request $request,$category){
        $valid = Category::where('url',$category)->exists();
        if(!$valid){
            abort(404);
        }
        $posts = Post::where('category_id', Category::where('url',$category)->get()[0]['id'])->paginate(4);
        return response()->json(['cat' => Category::where('url',$category)->get()[0],
            'posts' => $posts,
        ]);
    }


    public function singlePostApi(Request $request,$category,$slug){
        $valid = Category::where('url',$category)->exists();
        if(!$valid){
            abort(404);
        }
        $valid = Post::where('slug',$slug)->exists();
        if(!$valid){
            abort(404);
        }
        // dd(Post::where('slug',$slug)->with(['comments.replies'])->get()[0]);
        return response()->json([
            'current_category' => Category::where('url',$category)->get()[0],
            'post' => Post::where('slug',$slug)->with(['comments.replies','tags'])->get()->first(),
            
        ]);
    }

    public function allCategoryApi(){
        return response()->json([
            'category' => Category::all()
        ]);
    }


}
