<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['title' => 'Короткая стрижка', 'slug' => 'korotkaya-strizhka', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Средняя стрижка', 'slug' => 'srednaya-strizhka', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Длинная стрижка', 'slug' => 'dlinnaya-strizhka', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Окрашивание волос', 'slug' => 'okrashivanie-volos', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Стрижка бороды', 'slug' => 'strizhka-borodi', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Наращивание волос', 'slug' => 'narashivanie-volos', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Стрижка для животных', 'slug' => 'strizhka-dlya-zhivotnih', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
