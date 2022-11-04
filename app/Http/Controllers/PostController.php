<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('front.posts.index');
    }

    public function show()
    {
        return view('front.posts.show');
    }
}
