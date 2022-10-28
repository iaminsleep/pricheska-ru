<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(2);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        Category::create($request->all());

        // Сообщение об успешно добавленной категории
        // $request->session()->flash('success', 'Категория добавлена.');
        return redirect()->route('categories.index')->with('success', 'Категория добавлена.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', ['category' => $category]); // another way instead of "compact()"
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategory $request, $id)
    {
        $category = Category::find($id);
        // $category->slug = null; // если всё-таки нужно сгенерировать новый slug
        $category->update($request->all()); // slug при этом не изменится, его даже не желательно редактировать, так как он уже проиндексирован, и если изменить slug, то все ссылки, связанные с этим slug, будут битыми (недействительными).

        // Сообщение об успешно добавленной категории
        $request->session()->flash('success', 'Категория отредактирована.');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $category = Category::find($id);
        // $category->delete();
        Category::destroy($id); // удаление одной строчкой кода
        return redirect()->route('categories.index')->with('success', 'Категория удалена.');
    }
}
