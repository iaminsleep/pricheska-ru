<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feedbacks = [
            [
                'id' => 1,
                'task_id' => 1,
                'author_id' => 2,
                'receiver_id' => 3,
                'comment' => 'Сделал работу быстро и качественно, благодарю его за помощь!',
                'rating' => 5,
                'created_at' => today(),
            ],
            [
                'id' => 2,
                'task_id' => 2,
                'author_id' => 2,
                'receiver_id' => 3,
                'comment' => 'Выполнил работу ужасно, теперь страшно выходить из дома!',
                'rating' => 2,
                'created_at' => today(),
            ],
            [
                'id' => 3,
                'task_id' => 3,
                'author_id' => 2,
                'receiver_id' => 4,
                'comment' => 'Работа была выполнена, но процесс затянулся надолго.',
                'rating' => 4,
                'created_at' => today(),
            ],
            [
                'id' => 4,
                'task_id' => 3,
                'author_id' => 1,
                'receiver_id' => 4,
                'comment' => 'Забыл взять с собой инструменты, и ему пришлось ехать к себе домой за ними. Сама работа была выполнена посредственно.',
                'rating' => 3,
                'created_at' => today(),
            ],
        ];
        DB::table('feedbacks')->insert($feedbacks);
    }
}
