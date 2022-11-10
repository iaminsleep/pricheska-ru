<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreTag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(5);

        return view('admin.blog-tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog-tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTag $request)
    {
        Tag::create($request->all());

        return redirect()->route('tags.index')->with('success', 'Тэг добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('admin.blog-tags.edit', ['tag' => $tag]); // another way instead of "compact()"
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTag $request, $id)
    {
        $tag = Tag::find($id);

        $tag->update($request->all());

        $request->session()->flash('success', 'Изменения сохранены');
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        if ($tag->posts->count()) {
            return redirect()->route('categories.index')->with('error', 'Ошибка! У тэга есть записи');
        } // предотвращает удаление тэга, у которого есть посты

        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Тэг удалён');
    }
}
