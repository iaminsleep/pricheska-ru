<?php

namespace App\Http\Controllers\Task;

use App\Models\Task\Task;
use Illuminate\Http\Request;
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
            ->orderBy('created_at', 'DESC')
            ->select([
                'id',
                'title',
                'description',
                'category_id',
                'address',
                'budget',
                'created_at'
            ])->paginate(5);


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

        return view('front.tasks.browse.index', ['tasks' => $tasks, 'optional_filters' => $optional_filters, 'time_filters' => $time_filters]);
    }

    public function show($id)
    {
        $task = Task::findOrFail($id); // findOrFail() означает, что если запись не будет найдена, сайт выдаст ошибку 404, что является хорошей практикой

        return view(
            'front.tasks.task.index',
            ['task' => $task]
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
