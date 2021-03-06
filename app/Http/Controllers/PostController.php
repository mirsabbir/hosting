<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function show()
    {
        return view('post.new');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'slug' => 'max:255|unique:posts|alpha_dash',
            'image' => 'required',
            'body' => 'required',
            'category' => 'required'
        ]);
        $request->session()->flash('posted', 'your post has been posted');
        // store post
        
        $image = $request->file('image'); 
        $filename = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('images/uploads/'.$filename);
        \Image::make($image)->save($location);


        $post = new \App\Post;
        $post->title = $request->title;
        $post->body = \Purifier::clean($request->body);
        $post->slug = $request->slug;
        $post->image = $filename;
        $post->count = 0;
        $cat = \App\Category::where('name',$request->category)->get()->first();
        
        $post->category()->associate($cat);
    

        $post->save();
        $post->tags()->attach($request->tags);
        


        return view('home');
    }


}
