<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusArray = [
            [
                'id' => 1,
                'name' => 'Активно',
                'codename' => 'active',
            ],
            [
                'id' => 2,
                'name' => 'Завершено',
                'codename' => 'completed',
            ],
            [
                'id' => 3,
                'name' => 'Отменено',
                'codename' => 'cancelled',
            ],
            [
                'id' => 4,
                'name' => 'Просрочено',
                'codename' => 'expired',
            ],
        ];

        DB::table('statuses')->insert($statusArray);
    }
}
