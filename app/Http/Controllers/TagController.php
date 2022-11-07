<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $posts = $tag->posts()->with('category')->orderBy('id', 'desc')->paginate(5); // жадно забираем посты с категориями для уменьшения кол-ва запросов

        return view(
            'front.tags.show',
            [
                'tag' => $tag,
                'posts' => $posts
            ]
        );
    }
}
