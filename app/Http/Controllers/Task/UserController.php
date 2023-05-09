<?php

namespace App\Http\Controllers\Task;

use App\Models\User;
use App\Models\Hairdresser;
use App\Models\Task\Favourite;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Services\SearchUserService;

class UserController extends Controller
{
    public function index()
    {
        $sorted = Hairdresser::get()
                    ->sortBy('normalization_additive_criterion') //appended attribute
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
        $services = null;

        $user = Hairdresser::find($id);
        if (!$user) {
            $user = User::findOrFail($id);
        } else {
            $receivedFeedbacks = $user->received_feedbacks;
            $completedTasksCount = $user->completedTasksCount();
            $services = $user->services;
        }

        return view('front.tasks.profile.index', [
            'user' => $user,
            'receivedFeedbacks' => $receivedFeedbacks,
            'completedTasksCount' => $completedTasksCount,
            'services' => $services,
        ]);
    }

    public function add_fav($id)
    {
        Favourite::create([
            'user_id' => auth()->user()->id,
            'favourite_id' => $id,
        ]);

        return back();
    }

    public function delete_fav($id)
    {
        Favourite::findOrFail($id)->delete();

        return back();
    }

    public function search(SearchUserService $service)
    {
        $searchParameters = request()->all();

        if (empty(array_filter($searchParameters, function ($searchParam) {
            return $searchParam !== null; //check if search parameters are empty
        }))) {
            return redirect('/users');
        } else {
            $users = $service->execute();
            $users = $users->paginate(4);
        }

        return view('front.tasks.search-user.index', ['users' => $users]);
    }

    public function account()
    {
        $user = auth()->user();

        return view('front.tasks.account.index', [
            'user' => $user,
        ]);
    }

    public function save(ChangeSettingsRequest $request, ChangeSettings $service)
    {
        $service->execute($request->validated());

        return redirect('/settings');
    }
}
