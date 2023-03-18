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
                'task_id' => 1,
                'author_id' => 1,
                'receiver_id' => 2,
                'comment' => 'Сделал работу быстро и качественно, благодарю его за помощь!',
                'rating' => 5,
                'created_at' => today(),
            ],
            [
                'task_id' => 2,
                'author_id' => 3,
                'receiver_id' => 2,
                'comment' => 'Выполнил работу ужасно, теперь страшно выходить из дома!',
                'rating' => 2,
                'created_at' => today(),
            ],
            [
                'task_id' => 3,
                'author_id' => 3,
                'receiver_id' => 5,
                'comment' => 'Сделал работу быстро и качественно, благодарю его за помощь!',
                'rating' => 5,
                'created_at' => today(),
            ],
            [
                'task_id' => 4,
                'author_id' => 4,
                'receiver_id' => 5,
                'comment' => 'Выполнил работу ужасно, теперь страшно выходить из дома!',
                'rating' => 5,
                'created_at' => today(),
            ],
            [
                'task_id' => 5,
                'author_id' => 4,
                'receiver_id' => 6,
                'comment' => 'Сделал работу быстро и качественно, благодарю его за помощь!',
                'rating' => 4,
                'created_at' => today(),
            ],
            [
                'task_id' => 6,
                'author_id' => 1,
                'receiver_id' => 6,
                'comment' => 'Выполнил работу ужасно, теперь страшно выходить из дома!',
                'rating' => 5,
                'created_at' => today(),
            ],
            [
                'task_id' => 7,
                'author_id' => 4,
                'receiver_id' => 7,
                'comment' => 'Сделал работу быстро и качественно, благодарю его за помощь!',
                'rating' => 3,
                'created_at' => today(),
            ],
            [
                'task_id' => 8,
                'author_id' => 1,
                'receiver_id' => 7,
                'comment' => 'Выполнил работу ужасно, теперь страшно выходить из дома!',
                'rating' => 2,
                'created_at' => today(),
            ],
            [
                'task_id' => 9,
                'author_id' => 1,
                'receiver_id' => 7,
                'comment' => 'Выполнил работу ужасно, теперь страшно выходить из дома!',
                'rating' => 4,
                'created_at' => today(),
            ],
            [
                'task_id' => 10,
                'author_id' => 4,
                'receiver_id' => 8,
                'comment' => 'Сделал работу быстро и качественно, благодарю его за помощь!',
                'rating' => 5,
                'created_at' => today(),
            ],
            [
                'task_id' => 11,
                'author_id' => 1,
                'receiver_id' => 8,
                'comment' => 'Выполнил работу ужасно, теперь страшно выходить из дома!',
                'rating' => 5,
                'created_at' => today(),
            ],
            [
                'task_id' => 12,
                'author_id' => 1,
                'receiver_id' => 8,
                'comment' => 'Выполнил работу ужасно, теперь страшно выходить из дома!',
                'rating' => 3,
                'created_at' => today(),
            ],
        ];
        DB::table('feedbacks')->insert($feedbacks);
    }
}
