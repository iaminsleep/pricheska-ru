<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Blog\Post;
use App\Models\Blog\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('uploads').'/blog';
        delete_folder($path);

        $tags_id = Tag::pluck('id');
        $posts = Post::factory(20)->create();

        $posts->each(function ($post) use ($tags_id) {
            $post->tags()->attach($tags_id->random(3));

            Comment::factory(3)->create([
                'post_id' => $post->id,
                'author_id' => rand(1, 4),
            ]);
        });
    }
}
