<?php

namespace App\Http\Controllers\Admin\Task;

use App\Models\Task\Task;
use Illuminate\Http\Request;
use App\Models\Task\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreResponse;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responses = Response::paginate(5);

        return view('admin.responses.index', compact('responses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.responses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResponse $request)
    {
        $task = Task::find($request->task_id);

        if (!$task) {
            return redirect()->back()->with('error', 'Заказ не был найден!');
        }

        Response::create([
            'task_id' => $request->task_id,
            'user_id' => auth()->user()->id,
            'comment' => $request->comment,
            'payment' => $request->payment,
        ]);

        return redirect()->route('responses.index')->with('success', 'Отклик отправлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Response::findOrFail($id);

        return view('admin.responses.edit', ['response' => $response]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreResponse $request, $id)
    {
        $response = Response::find($id);
        $response->update($request->all());

        $request->session()->flash('success', 'Изменения сохранены');
        return redirect()->route('responses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Response::find($id);

        $response->delete();

        return redirect()->route('responses.index')->with('success', 'Отклик удалён');
    }
}
