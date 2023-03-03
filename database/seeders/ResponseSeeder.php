<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $responses = [
                    //1th task
                    [
                        'task_id' => 1,
                        'user_id' => 2,
                        'comment' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                        'payment' => 300,
                        'created_at' => now(),
                    ],
                    [
                        'task_id' => 1,
                        'user_id' => 5,
                        'comment' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                        'payment' => 1000,
                        'created_at' => now(),
                    ],
                    [
                        'task_id' => 1,
                        'user_id' => 6,
                        'comment' => 'Нахожусь в 5 минутах от вас, сразу примусь за работу!',
                        'payment' => 600,
                        'created_at' => now(),
                    ],
                    //2nd task
                    [
                        'task_id' => 2,
                        'user_id' => 2,
                        'comment' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                        'payment' => 1500,
                        'created_at' => now(),
                    ],
                    [
                        'task_id' => 2,
                        'user_id' => 5,
                        'comment' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                        'payment' => 900,
                        'created_at' => now(),
                    ],
                    [
                        'task_id' => 2,
                        'user_id' => 6,
                        'comment' => 'Нахожусь в 5 минутах от вас, сразу примусь за работу!',
                        'payment' => 1200,
                        'created_at' => now(),
                    ],
                    //3rd task
                    [
                        'task_id' => 3,
                        'user_id' => 2,
                        'comment' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                        'payment' => 2000,
                        'created_at' => now(),
                    ],
                    [
                        'task_id' => 3,
                        'user_id' => 5,
                        'comment' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                        'payment' => 1700,
                        'created_at' => now(),
                    ],
                    [
                        'task_id' => 3,
                        'user_id' => 6,
                        'comment' => 'Нахожусь в 5 минутах от вас, сразу примусь за работу!',
                        'payment' => 700,
                        'created_at' => now(),
                    ],
                    //4th task
                    [
                        'task_id' => 4,
                        'user_id' => 2,
                        'comment' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                        'payment' => 600,
                        'created_at' => now(),
                    ],
                    [
                        'task_id' => 4,
                        'user_id' => 5,
                        'comment' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                        'payment' => 350,
                        'created_at' => now(),
                    ],
                    [
                        'task_id' => 4,
                        'user_id' => 6,
                        'comment' => 'Нахожусь в 5 минутах от вас, сразу примусь за работу!',
                        'payment' => 450,
                        'created_at' => now(),
                    ],
                ];

        DB::table('responses')->insert($responses);
    }
}
