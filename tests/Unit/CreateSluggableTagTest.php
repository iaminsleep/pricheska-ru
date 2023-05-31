<?php

namespace Tests\Unit;

// use Illuminate\Support\Facades\Log;

use App\Models\Tag;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\TestCase;
use Tests\CreatesApplication;

class CreateSluggableTagTest extends TestCase
{
    use RefreshDatabase;
    use CreatesApplication;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_sluggable_library_is_working()
    {
        $tag = new Tag();
        $tag->title = 'Привет мир!';
        $tag->save();

        $this->assertDatabaseHas('tags', [
            'slug' => 'privet-mir'
        ]);
    }
}
