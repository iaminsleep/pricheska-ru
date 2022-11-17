<?php

namespace App\Http\Controllers\Admin\Task;

use App\Models\Tag;
use App\Models\Task\Task;
use App\Models\Task\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Task\StoreTask;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('category', 'tags')->paginate(5); // извлекаем посты с определёнными отношениями (не всеми), для оптимизации ресурсов
        return view('admin.tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all(); // превращение в массив, где два выбранных поля для вывода превращаются в ключ => значение
        $tags = Tag::pluck('title', 'id')->all();

        return view('admin.tasks.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {
        $data = $request->all();

        $data['image'] = Task::uploadImage($request); // логика с загрузкой изображения перенесена в модель
        $data['creator_id'] = auth()->user()->id;

        $task = Task::create($data);

        $task->tags()->sync($request->tags); // синхронизируем тэги с постами, передаём в sync() массив тэгов. При этом меняется таблица task_tag с many to many отношением.

        return redirect()->route('admin.tasks.index')->with('success', 'Статья добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        $task = Task::findOrFail($id);

        return view('admin.tasks.edit', [
            'task' => $task,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTask $request, $id)
    {
        $task = Task::findOrFail($id);
        $data = $request->all();

        if ($file = Task::uploadImage($request, $taks->thumbnail)) { // загрузка и удаление предыдущего изображения через модель поста
            $data['image'] = $file;
        }

        $task->update($data);
        $task->tags()->sync($request->tags);

        $request->session()->flash('success', 'Изменения сохранены');
        return redirect()->route('admin.tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->tags()->sync([]); // удаляем теги из таблицы связи тэгов и постов
        $task->deleteImage(); // удаление изображения через фукнцию в eloquent модели
        $task->delete();

        return redirect()->route('admin.tasks.index')->with('success', 'Статья удалена');
    }
}
