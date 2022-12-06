<?php

namespace Database\Factories\Blog;

use App\Models\User;
use App\Models\Blog\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users_id = User::pluck('id');

        return [
            'post_id' => rand(1, 20),
            'author_id' => $users_id->random(1)[0],
            'text' => fake()->sentence(3)
        ];
    }
}
