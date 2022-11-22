<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// now()->addSeconds(86400), // 1 day
// now()->addSeconds(172800), // 2 days
// now()->addSeconds(259200), // 3 days
// now()->addSeconds(432000), // 5 days
// now()->addSeconds(604800), // 7 days
// now()->addSeconds(2592000), //30 days

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $tasks = [
            [
                'title' => 'Причёска как у актёра из "Сумерек"',
                'description' => 'Очень понравилась причёска, хочу такую же.',
                'category_id' => 1,
                'creator_id' => 1,
                'address' => 'Востряковский проезд, 17 к 4',
                'budget' => 35000,
                'deadline' => now()->addSeconds(259200), // 3 days
                'image' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Причёска ',
                'description' => 'Перевести книгу, срок - месяц.',
                'category_id' => 1,
                'creator_id' => 1,
                'address' => 'Михневская улица, 8',
                'budget' => 35000,
                'deadline' => now()->addSeconds(259200), // 3 days
                'image' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Перевести войну и мир на клингонский',
                'description' => 'Перевести книгу, срок - месяц.',
                'category_id' => 1,
                'creator_id' => 1,
                'address' => 'Востряковский проезд, 17 к 4',
                'budget' => 35000,
                'deadline' => now()->addSeconds(259200), // 3 days
                'image' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('tasks')->insert($tasks);
    }
}
