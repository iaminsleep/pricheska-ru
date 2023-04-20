<?php

namespace Database\Factories\Blog;

use App\Models\User;
use App\Models\Blog\Like;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    protected $model = Like::class;
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
            'user_id' => $users_id->random(1)[0],
        ];
    }
}
