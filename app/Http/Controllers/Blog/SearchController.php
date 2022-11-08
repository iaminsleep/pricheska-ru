<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;

use App\Models\Blog\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Blog\SearchPost;

class SearchController extends Controller
{
    public function index(SearchPost $request)
    {
        $searchQuery = $request->search;

        $posts = Post::like('title', $searchQuery)->with('category')->paginate(5); // два процента означает что мы можем искать не только по всему слову, но и по вхождению строки, то есть можно искать в середине строки какую-то введённую часть в запросе

        return view(
            'front.blog.posts.search',
            [
                'posts' => $posts,
                'searchQuery' => $searchQuery
            ]
        );
    }
}
