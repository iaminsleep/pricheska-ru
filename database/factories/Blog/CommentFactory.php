<?php

namespace Database\Factories\Blog;

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
        return [
            'post_id' => rand(1, 100),
            'author_id' => rand(1, 4),
            'text' => fake()->sentence(3)
        ];
    }
}
