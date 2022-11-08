<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;

use App\Models\Blog\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $posts = $tag->posts()->with('category')->orderBy('id', 'desc')->paginate(5); // жадно забираем посты с категориями для уменьшения кол-ва запросов

        return view(
            'front.blog.tags.show',
            [
                'tag' => $tag,
                'posts' => $posts
            ]
        );
    }
}
