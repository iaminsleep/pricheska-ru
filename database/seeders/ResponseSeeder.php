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
                    // 1st task
                    [
                        'task_id' => 1,
                        'user_id' => 3,
                        'comment' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                        'payment' => 3000,
                        'created_at' => now(),
                    ],
                    [
                        'task_id' => 1,
                        'user_id' => 4,
                        'comment' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                        'payment' => 3200,
                        'created_at' => now(),
                    ],
                    // 2nd task
                    [
                        'task_id' => 2,
                        'user_id' => 3,
                        'comment' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                        'payment' => 2000,
                        'created_at' => now(),
                    ],
                    [
                        'task_id' => 2,
                        'user_id' => 4,
                        'comment' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                        'payment' => 3700,
                        'created_at' => now(),
                    ],
                    // 3rd task
                    [
                        'task_id' => 3,
                        'user_id' => 3,
                        'comment' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                        'payment' => 3800,
                        'created_at' => now(),
                    ],
                    [
                        'task_id' => 3,
                        'user_id' => 4,
                        'comment' => 'Нахожусь в 5 минутах от вас, сразу примусь за работу!',
                        'payment' => 4200,
                        'created_at' => now(),
                    ],
                ];

        DB::table('responses')->insert($responses);
    }
}
