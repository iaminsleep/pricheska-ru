<?php

namespace App\Http\Controllers\Admin\Task;

use App\Models\User;
use App\Models\Task\Task;
use Illuminate\Http\Request;
use App\Models\Task\Feedback;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreFeedback;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::paginate(5);

        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feedbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeedback $request)
    {
        $task = Task::find($request->task_id);

        if (!$task) {
            return redirect()->back()->with('error', 'Заказ не был найден!');
        }

        $user = User::find($request->receiver_id);

        if (!$user) {
            return redirect()->back()->with('error', 'Пользователь не был найден!');
        }

        if (!$user->hasRole('hairdresser')) {
            return redirect()->back()->with('error', 'Пользователь не является парикмахером!');
        }

        Feedback::create([
            'task_id' => $request->task_id,
            'author_id' => auth()->user()->id,
            'receiver_id' => $request->receiver_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return redirect()->route('feedbacks.index')->with('success', 'Отзыв отправлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);

        return view('admin.feedbacks.edit', ['feedback' => $feedback]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFeedback $request, $id)
    {
        $feedback = Feedback::find($id);
        $feedback->update($request->all());

        $request->session()->flash('success', 'Изменения сохранены');
        return redirect()->route('feedbacks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::find($id);

        $feedback->delete();

        return redirect()->route('feedbacks.index')->with('success', 'Отзыв удалён');
    }
}
