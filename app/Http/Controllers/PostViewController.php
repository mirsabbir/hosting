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
        $p = Post::where('slug',$slug)->get()[0];
        $p->count++;
        $p->save();
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
    protected $tag_id;
    public function singleTag(\App\Tag $tag, Request $request){
        $this->tag_id = $tag->id;
        $posts = Post::whereHas('tags',function($query){
            $query->where('tags.id',$this->tag_id);
        })->paginate(15);
        return view('post.singleTag')->with(['posts'=>$posts,'tag'=>$tag]);
    }

    public function allTags(){
        return view('post.allTags')->with(['tags'=>\App\Tag::all()]);
    }

    public function storeComment(Request $request,$category,$slug){

        $valid = Category::where('url',$category)->exists();
        if(!$valid){
            abort(404);
        }
        $valid = Post::where('slug',$slug)->exists();
        if(!$valid){
            abort(404);
        }
        $p = Post::where('slug',$slug)->get()[0];
        $p->count++;
        $p->save();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ]);

        $request->session()->flash('commented','your comment saved successfully');

        $post = Post::find($p->id);
        $comment = new \App\Comment;
        $comment->body = $request->comment;
        $comment->email = $request->email;
        $comment->name =$request->name;
        $post->comments()->save($comment);


        return redirect()->back();
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
