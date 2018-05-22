<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    // public function store(Request $request)
    // {
    //     return view('home');
    // }
    
    public function editCategory(){
        return view('post.editCategory');
    }
    public function editCategoryPost(Request $request){
        if(Input::has('delete'))
        \App\Category::findOrFail($request->delete)->delete();
        else {
            if(Input::has('name')){
                $validatedData = $request->validate([
                    'name' => 'required|unique:categories|max:50',
                    'url' => 'required|alpha_dash',
                ]);
                $c = new \App\Category;
                $c->name = $request->name;
                $c->url = $request->url;
                $c->save();
            }
        }
        return view('post.editCategory');
    }

    public function  editTag(){
        return view('post.editTag');
    }
    public function  editTagPost(){
        return view('post.editTag');
    }


}
