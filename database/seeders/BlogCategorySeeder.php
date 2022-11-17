<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['title' => 'Здоровье', 'slug' => 'zdorove', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Стрижки', 'slug' => 'strizhki', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Мода', 'slug' => 'moda', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Тренды', 'slug' => 'trendy', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Заработок', 'slug' => 'zarabotok', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('blog_categories')->insert($categories);
    }
}
