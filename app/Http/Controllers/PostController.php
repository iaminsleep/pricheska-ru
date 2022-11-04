<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->orderBy('id', 'desc')->paginate(3);
        return view(
            'front.posts.index',
            ['posts' => $posts]
        );
    }

    public function show($slug)
    {
        return view('front.posts.show');
    }
}
