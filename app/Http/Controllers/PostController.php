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
        $post = Post::where('slug', $slug)->firstOrFail(); // не используется findOrFail() потому что он ищет по id, в этом случае пост ищется по slug-у. orFail в методах findOrFail() и firstOrFail() означает, что если запись не будет найдена, сайт выдаст ошибку 404, что является хорошей практикой, т.к может быть битая ссылка

        $post->views += 1; // обновляем счётчик постов
        $post->update();

        return view('front.posts.show',
            ['post' => $post]
        );
    }
}
