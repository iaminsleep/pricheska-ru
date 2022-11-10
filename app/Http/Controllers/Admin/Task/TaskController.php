<?php

namespace App\Http\Controllers\Admin\Task;

use App\Models\Blog\Tag;
use App\Models\Blog\Post;
use App\Models\Blog\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Blog\StorePost;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'tags')->paginate(5); // извлекаем посты с определёнными отношениями (не всеми), для оптимизации ресурсов
        return view('admin.tasks.index', ['posts' => $posts]);
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

        return view('admin.posts.create', [
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
    public function store(StorePost $request)
    {
        $data = $request->all();

        $data['thumbnail'] = Post::uploadImage($request); // логика с загрузкой изображения перенесена в модель

        $post = Post::create($data);

        $post->tags()->sync($request->tags); // синхронизируем тэги с постами, передаём в sync() массив тэгов. При этом меняется таблица post_tag с many to many отношением.

        return redirect()->route('posts.index')->with('success', 'Статья добавлена');
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
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', [
            'post' => $post,
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
    public function update(StorePost $request, $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->all();

        if ($file = Post::uploadImage($request, $post->thumbnail)) { // загрузка и удаление предыдущего изображения через модель поста
            $data['thumbnail'] = $file;
        }

        $post->update($data);
        $post->tags()->sync($request->tags);

        $request->session()->flash('success', 'Изменения сохранены');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->tags()->sync([]); // удаляем теги из таблицы связи тэгов и постов
        $post->deleteImage(); // удаление изображения через фукнцию в eloquent модели
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Статья удалена');
    }
}
