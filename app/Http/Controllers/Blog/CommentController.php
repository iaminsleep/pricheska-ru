<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Post;


use App\Models\Blog\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreComment;

class CommentController extends Controller
{
    public function store(StoreComment $request, $postId)
    {
        $data = $request->validated();

        $post = Post::findOrFail($postId);

        $comment = Comment::create([
            'text' => $data['text'],
            'post_id' => $postId,
            'author_id' => auth()->user()->id,
        ]);

        return redirect(route('posts.single', ['slug' => $post->slug]));
    }

    public function delete($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        if ($comment->author_id === auth()->user()->id) {
            $comment->delete();
        }
        return redirect(route('posts.single', ['slug' => $comment->post->slug]));
    }
}
