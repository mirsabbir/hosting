<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){

        return view('search')->with(['posts'=>\App\Post::search($request->search)->paginate(15)]);
    }
}
