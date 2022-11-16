<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['title' => 'Кудри', 'slug' => 'kudri', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Жирные волосы', 'slug' => 'zhirnye-volosy', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Ломкие волосы', 'slug' => 'lomkie-volosy', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Тонкие волосы', 'slug' => 'tonkie-volosy', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Косметика', 'slug' => 'kosmetika', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Прямые волосы', 'slug' => 'pryamye-volosy', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Шампунь', 'slug' => 'shampun', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Лак для волос', 'slug' => 'lak-dlya-volos', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Мероприятие', 'slug' => 'meropriyatie', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Бизнес', 'slug' => 'biznes', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Туториал', 'slug' => 'tutorial', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Груминг', 'slug' => 'gruming', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Стиль', 'slug' => 'stil', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Укладка волос', 'slug' => 'ukladka-volos', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Учёба', 'slug' => 'ucheba', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('blog_tags')->insert($tags);
    }
}
