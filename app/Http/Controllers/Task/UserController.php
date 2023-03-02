<?php

namespace App\Http\Controllers\Task;

use App\Models\User;
use App\Models\Hairdresser;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $sorted = Hairdresser::get()
                    ->sortBy('additive_criterion') //appended attribute
                    ->pluck('id')
                    ->toArray();

        $orderedIds = implode(',', $sorted);

        $hairdressers = Hairdresser::orderByRaw(DB::raw("FIELD(users.id, ".$orderedIds." ) desc"))->paginate(5);

        $main_filters = [
            [
                'name' => 'Рейтингу',
                'alias' => 'by_rating',
            ],
            [
                'name' => 'Числу заказов',
                'alias' => 'by_tasks_count',
            ],
            [
                'name' => 'Популярности',
                'alias' => 'by_popularity',
            ]
        ];

        $optional_filters = [
            [
                'name' => 'Сейчас свободен',
                'alias' => 'is_free'
            ],
            [
                'name' => 'Сейчас онлайн',
                'alias' => 'is_online'
            ],
            [
                'name' => 'Есть отзывы',
                'alias' => 'has_feedbacks',
            ],
        ];

        return view('front.tasks.performers.index', [
            'users' => $hairdressers,
            'main_filters' => $main_filters,
            'optional_filters' => $optional_filters
        ]);
    }

    public function show($id)
    {
        $receivedFeedbacks = null;
        $completedTasksCount = null;

        $user = Hairdresser::findOrFail($id);
        if (!$user) {
            $user = User::findOrFail($id);
        } else {
            $receivedFeedbacks = $user->received_feedbacks;
            $completedTasksCount = $user->completedTasksCount();
        }

        return view('front.tasks.profile.index', [
            'user' => $user,
            'receivedFeedbacks' => $receivedFeedbacks,
            'completedTasksCount' => $completedTasksCount
        ]);
    }
}
