<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()->orderBy('id', 'desc')->paginate(5);

        return view(
            'front.blog.categories.show',
            [
                'category' => $category,
                'posts' => $posts
            ]
        );
    }
}
