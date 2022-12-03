<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Post;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Post::class;

    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));

        $title = fake()->sentence(2, true);
        // $slug = Str::substr(Str::lower(preg_replace('/\s+/', '-', $title)), 0, -1);
        $description = fake()->sentence(5, true);
        $content = fake()->paragraph(100, true);
        $category_id = fake()->numberBetween($min = 1, $max = 5);
        $creator_id = fake()->numberBetween($min = 3, $max = 4);
        $views = fake()->numberBetween($min = 0, $max = 10000);

        $folderName = date('Y-m-d');
        Storage::makeDirectory('blog/thumbnails/'.$folderName);
        $thumbnail = fake()->image(public_path("uploads")."/blog/thumbnails/$folderName/", 800, 460, 'pricheska-ru', false);

        $created_at = fake()->dateTimeBetween('-1 years');

        return [
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'category_id' => $category_id,
            'creator_id' => $creator_id,
            'views' => $views,
            'thumbnail' => $folderName.'/'.$thumbnail,
            'created_at' => $created_at
        ];
    }
}
