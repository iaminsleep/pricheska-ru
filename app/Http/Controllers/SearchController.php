<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\SearchPost;

class SearchController extends Controller
{
    public function index(SearchPost $request)
    {
        $searchQuery = $request->search;

        $posts = Post::like($searchQuery, 'title')->with('category')->paginate(5); // два процента означает что мы можем искать не только по всему слову, но и по вхождению строки, в этом случае можно искать в середине строки какую-то введённую часть в запросе.

        return view(
            'front.posts.search',
            [
                'posts' => $posts,
                'searchQuery' => $searchQuery
            ]
        );
    }
}
