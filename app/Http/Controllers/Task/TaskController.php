<?php

namespace App\Http\Controllers\Task;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Task\Task;
use App\Models\Hairdresser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Services\YaGeoService;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('status_id', 'ASC')
            ->orderBy('id', 'ASC')
            ->select([
                'id',
                'title',
                'description',
                'category_id',
                'address',
                'budget',
                'created_at',
                'image'
            ])->paginate(5);

        $sorted = Hairdresser::get()
                    ->sortBy('additive_criterion') //appended attribute
                    ->pluck('id')
                    ->toArray();

        $orderedIds = implode(',', $sorted);

        $hairdressers = Hairdresser::orderByRaw(DB::raw("FIELD(users.id, ".$orderedIds." ) desc"));

        $optional_filters = [
                    [
                        'name' => 'Без откликов',
                        'alias' => 'no_responses'
                    ],
                    [
                        'name' => 'Удалённая работа',
                        'alias' => 'remote_job',
                    ],
                ];

        $time_filters = [
            [
                'name' => 'В течении дня',
                'alias' => 'in_a_day'
            ],
            [
                'name' => 'В течении недели',
                'alias' => 'in_a_week',
            ],
            [
                'name' => 'В течении месяца',
                'alias' => 'in_a_month',
            ],
        ];

        return view('front.tasks.browse.index', [
            'tasks' => $tasks,
            'optional_filters' => $optional_filters,
            'time_filters' => $time_filters,
            'hairdressers' => $hairdressers,
        ]);
    }

    public function show($id, YaGeoService $service)
    {
        $task = Task::findOrFail($id);

        $deadline = Carbon::parse($task->deadline)->format('d.m.Y');

        $coordinates = $task->address ?
            $service->getCoordinates('Moscow', $task->address)
            : null;

        $task_amount = $task->creator->tasks()->count();

        $performer = Hairdresser::where('users.id', $task->performer_id)->select([
            'id',
            'name',
            'avatar',
        ])->first() ?? null;

        return view(
            'front.tasks.task.index',
            [
                'task' => $task,
                'deadline' => $deadline,
                'task_amount' => $task_amount,
                'coordinates' => $coordinates,
                'performer' => $performer,
            ]
        );
    }

    public function search(SearchTaskService $service)
    {
        $searchParameters = request()->all();

        if (empty(array_filter($searchParameters, function ($searchParam) {
            return $searchParam !== null; //check if search parameters are empty
        }))) {
            return redirect('/browse');
        } else {
            $tasks = $service->execute();
            $tasks = $tasks->paginate(4);
        }

        return view('search-task.index', ['tasks' => $tasks]);
    }
}
