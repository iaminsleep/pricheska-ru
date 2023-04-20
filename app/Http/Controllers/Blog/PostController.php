<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Like;

use App\Models\Blog\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->orderBy('id', 'desc')->paginate(5);
        return view(
            'front.blog.posts.index',
            ['posts' => $posts]
        );
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail(); // не используется findOrFail() потому что он ищет по id, в этом случае пост ищется по slug-у. orFail в методах findOrFail() и firstOrFail() означает, что если запись не будет найдена, сайт выдаст ошибку 404, что является хорошей практикой, т.к может быть битая ссылка

        $recommendedPosts = Post::inRandomOrder()->where('category_id', $post->category_id)->whereNot('id', $post->id)->limit(2)->get();
        $post->views += 1; // обновляем счётчик постов
        $post->update();

        return view(
            'front.blog.posts.show',
            ['post' => $post, 'recommendedPosts' => $recommendedPosts]
        );
    }

    public function like($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        if(!Auth::user()) {
            return redirect(route('login.create'));
        }

        if(!$post->isAuthUserLiked()) {
            Like::create([
                'post_id' => $post->id,
                'user_id' => auth()->user()->id,
            ]);
        } else {
            Like::where('post_id', $post->id)->where('user_id', auth()->user()->id)->delete();
        }

        return redirect(route('posts.single', ['slug' => $post->slug]));
    }
}
