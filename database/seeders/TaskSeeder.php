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
                'creator_id' => 2,
                'performer_id' => 3,
                'address' => 'Востряковский проезд, 17 к 4',
                'budget' => 3000,
                'deadline' => now()->subSeconds(432000),
                'image' => '',
                'status_id' => 2,
                'completed_at' => now()->subSeconds(604800),
                'created_at' => now()->subSeconds(2592000),
                'updated_at' => now()->subSeconds(2592000),
            ],
            [
                'title' => 'Причёска ',
                'description' => 'Перевести книгу, срок - месяц.',
                'category_id' => 1,
                'creator_id' => 1,
                'performer_id' => 3,
                'address' => 'Михневская улица, 8',
                'budget' => 2000,
                'deadline' => now()->subSeconds(172800),
                'image' => '',
                'status_id' => 2,
                'completed_at' => now()->subSeconds(259200),
                'created_at' => now()->subSeconds(604800),
                'updated_at' => now()->subSeconds(604800),
            ],
            [
                'title' => 'Причёска ',
                'description' => 'Перевести книгу, срок - месяц.',
                'category_id' => 1,
                'creator_id' => 1,
                'performer_id' => 3,
                'address' => 'Михневская улица, 8',
                'budget' => 2000,
                'deadline' => now()->subSeconds(172800),
                'image' => '',
                'status_id' => 2,
                'completed_at' => now()->subSeconds(86400),
                'created_at' => now()->subSeconds(604800),
                'updated_at' => now()->subSeconds(604800),
            ],
            [
                'title' => 'Причёска ',
                'description' => 'Перевести книгу, срок - месяц.',
                'category_id' => 1,
                'creator_id' => 1,
                'performer_id' => 4,
                'address' => 'Михневская улица, 8',
                'budget' => 2000,
                'deadline' => now()->subSeconds(172800),
                'image' => '',
                'status_id' => 2,
                'completed_at' => now()->subSeconds(259200),
                'created_at' => now()->subSeconds(604800),
                'updated_at' => now()->subSeconds(604800),
            ],
            [
                'title' => 'Причёска ',
                'description' => 'Перевести книгу, срок - месяц.',
                'category_id' => 1,
                'creator_id' => 1,
                'performer_id' => 4,
                'address' => 'Михневская улица, 8',
                'budget' => 2000,
                'deadline' => now()->subSeconds(172800),
                'image' => '',
                'status_id' => 2,
                'completed_at' => now()->subSeconds(432000),
                'created_at' => now()->subSeconds(604800),
                'updated_at' => now()->subSeconds(604800),
            ],
            [
                'title' => 'Перевести войну и мир на клингонский',
                'description' => 'Перевести книгу, срок - месяц.',
                'category_id' => 1,
                'creator_id' => 2,
                'performer_id' => 4,
                'address' => 'Востряковский проезд, 17 к 4',
                'budget' => 4200,
                'deadline' => now()->subSeconds(86400),
                'image' => '',
                'status_id' => 2,
                'completed_at' => now()->subSeconds(172800),
                'created_at' => now()->subSeconds(432000),
                'updated_at' => now()->subSeconds(432000),
            ],
        ];
        DB::table('tasks')->insert($tasks);
    }
}
