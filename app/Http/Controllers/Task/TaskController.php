<?php

namespace App\Http\Controllers\Task;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\User;
use App\Models\Task\Task;
use App\Models\Hairdresser;
use Illuminate\Http\Request;
use App\Models\Task\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Services\CompleteTask;
use App\Http\Services\YaGeoService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTask;
use App\Http\Services\CreateTaskService;
use App\Http\Services\SearchTaskService;
use App\Http\Requests\Task\CompleteTaskRequest;
use App\Http\Services\FilterProfileTasksService;

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
            ])->paginate(6);


        $sorted = Hairdresser::get()
                    ->sortBy('additive_criterion') //appended attribute
                    ->pluck('id')
                    ->toArray();

        $orderedIds = implode(',', $sorted);

        $hairdressers = Hairdresser::orderByRaw(DB::raw("FIELD(users.id, ".$orderedIds." ) desc"))->get(5);

        $optional_filters = [
                    [
                        'name' => 'Без откликов',
                        'alias' => 'no_responses'
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
            return redirect('/');
        } else {
            $tasks = $service->execute();
            $tasks = $tasks->paginate(5);
        }

        return view('front.tasks.search-task.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $errors_array = [
            [
                'name' => 'Заголовок',
                'alias' => 'title'
            ],
            [
                'name' => 'Описание задания',
                'alias' => 'description'
            ],
            [
                'name' => 'Категория',
                'alias' => 'category_id'
            ],
            [
                'name' => 'Адрес',
                'alias' => 'address'
            ],
            [
                'name' => 'Бюджет',
                'alias' => 'budget'
            ],
            [
                'name' => 'Срок исполнения',
                'alias' => 'deadline'
            ],
        ];

        $tags = Tag::pluck('title', 'id')->all();

        return view('front.tasks.create.index', [ 'errors_array' => $errors_array, 'tags' => $tags ]);
    }

    public function store(StoreTask $request, CreateTaskService $service)
    {
        $data = $request->validated();
        $data['image'] = Task::uploadImage($request);

        $task = $service->execute($data);

        $task->tags()->sync($request->tags); // синхронизируем тэги с постами, передаём в sync() массив тэгов. При этом меняется таблица task_tag с many to many отношением.

        return redirect(route('tasks.single', ['id' => $task->id]));
    }

    public function personal(FilterProfileTasksService $service)
    {
        $tasks = !count(request()->all())
                    ? Task::where('creator_id', auth()->user()->id)
                    ->orWhere('performer_id', auth()->user()->id)
                    ->select([
                        'id',
                        'title',
                        'description',
                        'category_id',
                        'performer_id',
                        'status_id',
                    ])->get()
                    : $service->execute()->get();

        return view('front.tasks.mylist.index', [ 'tasks' => $tasks ]);
    }

    public function edit($id)
    {
        $tags = Tag::pluck('title', 'id')->all();
        $task = Task::findOrFail($id);

        return view('front.tasks.edit.index', [
            'task' => $task,
            'tags' => $tags,
        ]);
    }

    public function update(StoreTask $request, $id)
    {
        $task = Task::findOrFail($id);
        $data = $request->all();

        if ($file = Task::uploadImage($request, $task->image)) { // загрузка и удаление предыдущего изображения через модель поста
            $data['image'] = $file;
        }

        $task->update($data);
        $task->tags()->sync($request->tags);

        return redirect()->route('tasks.single', ['id' => $task->id]);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->tags()->sync([]); // удаляем теги из таблицы связи тэгов и постов
        // $task->deleteImage(); // удаление изображения через фукнцию в eloquent модели
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function complete($taskId, CompleteTaskRequest $request, CompleteTask $service)
    {
        $service->execute($request->validated(), $taskId);

        return redirect(route('tasks.index'));
    }
}
