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
        dd($request->body);
        return view('home');
    }


}
