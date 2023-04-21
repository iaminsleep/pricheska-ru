<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            [
                'user_id' => 2,
                'task_id' => 1,
                'message' => 'Привет!',
                'created_at' => now(),
                'read_at' => null,
            ],
        ];

        DB::table('messages')->insert($messages);
    }
}
