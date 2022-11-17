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
        $tasks = Task::with('category')->orderBy('id', 'desc')->paginate(5);

        return view('front.tasks.index');
    }

    public function show($id)
    {
        $task = Post::findOrFail($id); // findOrFail() означает, что если запись не будет найдена, сайт выдаст ошибку 404, что является хорошей практикой

        return view(
            'front.tasks.task.show',
            ['task' => $task]
        );
    }
}
