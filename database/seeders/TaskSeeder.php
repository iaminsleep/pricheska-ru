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
                'title' => 'Причёска как у актёра из Сумерек',
                'description' => 'Очень понравилась причёска, хочу такую же.',
                'category_id' => 1,
                'creator_id' => 3,
                'performer_id' => null,
                'address' => 'Востряковский проезд, 17 к 4',
                'budget' => 1500,
                'deadline' => now()->subSeconds(432000),
                'image' => 'task/images/8.jpg',
                'status_id' => 1,
                'completed_at' => null,
                'created_at' => now()->subSeconds(2592000),
                'updated_at' => now()->subSeconds(2592000),
            ],
            [
                'title' => 'Современная причёска',
                'description' => 'Приглянулся данный вариант.',
                'category_id' => 2,
                'creator_id' => 4,
                'performer_id' => null,
                'address' => 'Михневская улица, 8',
                'budget' => 2000,
                'deadline' => now()->subSeconds(172800),
                'image' => 'task/images/2.jpg',
                'status_id' => 1,
                'completed_at' => null,
                'created_at' => now()->subSeconds(604800),
                'updated_at' => now()->subSeconds(604800),
            ],
            [
                'title' => 'Для свадьбы',
                'description' => 'Срочно нужно оформить данную причёску к свадьбе!',
                'category_id' => 3,
                'creator_id' => 1,
                'performer_id' => 2,
                'address' => 'Угрешская улица, 3',
                'budget' => 3000,
                'deadline' => now()->subSeconds(172800),
                'image' => 'task/images/3.jpg',
                'status_id' => 2,
                'completed_at' => now()->subSeconds(86400),
                'created_at' => now()->subSeconds(604800),
                'updated_at' => now()->subSeconds(604800),
            ],
            [
                'title' => 'Единорог',
                'description' => 'Мне захотелось приобрести новый опыт, поэтому решила сделать причёску, которую можно увидеть на фотографии. Прошу не смеяться, для меня это очень важный этап в жизни.',
                'category_id' => 4,
                'creator_id' => 1,
                'performer_id' => 2,
                'address' => 'Дорожная улица, 5',
                'budget' => 3000,
                'deadline' => now()->subSeconds(172800),
                'image' => 'task/images/4.jpg',
                'status_id' => 2,
                'completed_at' => now()->subSeconds(259200),
                'created_at' => now()->subSeconds(604800),
                'updated_at' => now()->subSeconds(604800),
            ],
            [
                'title' => 'Модельная стрижка бороды',
                'description' => 'Хочу чтобы мою бороду постригли как у модели на фото',
                'category_id' => 5,
                'creator_id' => 1,
                'performer_id' => 5,
                'address' => 'Улица Генерала Белова, 4',
                'budget' => 800,
                'deadline' => now()->subSeconds(172800),
                'image' => 'task/images/9.png',
                'status_id' => 2,
                'completed_at' => now()->subSeconds(432000),
                'created_at' => now()->subSeconds(604800),
                'updated_at' => now()->subSeconds(604800),
            ],
            [
                'title' => 'Индейская стрижка',
                'description' => 'Срок - три дня на выполнение.',
                'category_id' => 6,
                'creator_id' => 2,
                'performer_id' => 5,
                'address' => 'Востряковский проезд, 17 к 4',
                'budget' => 4200,
                'deadline' => now()->subSeconds(86400),
                'image' => 'task/images/6.jpg',
                'status_id' => 2,
                'completed_at' => now()->subSeconds(172800),
                'created_at' => now()->subSeconds(432000),
                'updated_at' => now()->subSeconds(432000),
            ],
            [
                'title' => 'Индейская стрижка',
                'description' => 'Срок - три дня на выполнение.',
                'category_id' => 6,
                'creator_id' => 2,
                'performer_id' => 7,
                'address' => 'Востряковский проезд, 17 к 4',
                'budget' => 4200,
                'deadline' => now()->subSeconds(86400),
                'image' => 'task/images/6.jpg',
                'status_id' => 2,
                'completed_at' => now()->addSeconds(86400),
                'created_at' => now()->subSeconds(432000),
                'updated_at' => now()->subSeconds(432000),
            ],
            [
                'title' => 'Индейская стрижка',
                'description' => 'Срок - три дня на выполнение.',
                'category_id' => 6,
                'creator_id' => 2,
                'performer_id' => 7,
                'address' => 'Востряковский проезд, 17 к 4',
                'budget' => 4200,
                'deadline' => now()->subSeconds(86400),
                'image' => 'task/images/6.jpg',
                'status_id' => 2,
                'completed_at' => now()->addSeconds(259200), // 3 days
                'created_at' => now()->subSeconds(432000),
                'updated_at' => now()->subSeconds(432000),
            ],
            [
                'title' => 'Индейская стрижка',
                'description' => 'Срок - три дня на выполнение.',
                'category_id' => 6,
                'creator_id' => 2,
                'performer_id' => 7,
                'address' => 'Востряковский проезд, 17 к 4',
                'budget' => 4200,
                'deadline' => now()->subSeconds(86400),
                'image' => 'task/images/6.jpg',
                'status_id' => 2,
                'completed_at' => now()->addSeconds(432000), // 5 days
                'created_at' => now()->subSeconds(432000),
                'updated_at' => now()->subSeconds(432000),
            ],
            [
                'title' => 'Индейская стрижка',
                'description' => 'Срок - три дня на выполнение.',
                'category_id' => 6,
                'creator_id' => 2,
                'performer_id' => 8,
                'address' => 'Востряковский проезд, 17 к 4',
                'budget' => 4200,
                'deadline' => now()->subSeconds(86400),
                'image' => 'task/images/6.jpg',
                'status_id' => 2,
                'completed_at' => now()->subSeconds(172800),
                'created_at' => now()->subSeconds(432000),
                'updated_at' => now()->subSeconds(432000),
            ],
            [
                'title' => 'Индейская стрижка',
                'description' => 'Срок - три дня на выполнение.',
                'category_id' => 6,
                'creator_id' => 2,
                'performer_id' => 8,
                'address' => 'Востряковский проезд, 17 к 4',
                'budget' => 4200,
                'deadline' => now()->addSeconds(604800),
                'image' => 'task/images/6.jpg',
                'status_id' => 2,
                'completed_at' => now()->addSeconds(432000), // 5 days
                'created_at' => now()->subSeconds(432000),
                'updated_at' => now()->subSeconds(432000),
            ],
            [
                'title' => 'Индейская стрижка',
                'description' => 'Срок - три дня на выполнение.',
                'category_id' => 6,
                'creator_id' => 2,
                'performer_id' => 8,
                'address' => 'Востряковский проезд, 17 к 4',
                'budget' => 4200,
                'deadline' => now()->subSeconds(86400),
                'image' => 'task/images/6.jpg',
                'status_id' => 2,
                'completed_at' => now()->subSeconds(172800),
                'created_at' => now()->subSeconds(432000),
                'updated_at' => now()->subSeconds(432000),
            ],
            [
                'title' => 'Индейская стрижка',
                'description' => 'Срок - три дня на выполнение.',
                'category_id' => 6,
                'creator_id' => 2,
                'performer_id' => 6,
                'address' => 'Востряковский проезд, 17 к 4',
                'budget' => 4200,
                'deadline' => now()->subSeconds(86400),
                'image' => 'task/images/6.jpg',
                'status_id' => 2,
                'completed_at' => now()->subSeconds(172800),
                'created_at' => now()->subSeconds(432000),
                'updated_at' => now()->subSeconds(432000),
            ],
            [
                'title' => 'Индейская стрижка',
                'description' => 'Срок - три дня на выполнение.',
                'category_id' => 6,
                'creator_id' => 2,
                'performer_id' => 6,
                'address' => 'Востряковский проезд, 17 к 4',
                'budget' => 4200,
                'deadline' => now()->subSeconds(86400),
                'image' => 'task/images/6.jpg',
                'status_id' => 2,
                'completed_at' => now()->addSeconds(86400), // 1 day
                'created_at' => now()->subSeconds(432000),
                'updated_at' => now()->subSeconds(432000),
            ],
        ];
        DB::table('tasks')->insert($tasks);
    }
}
