<?php

namespace App\Http\Controllers\Task;

use App\Models\Task\Task;
use App\Models\Task\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\UserNotification;
use App\Http\Requests\Task\SendMessageRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MessageController extends Controller
{
    public function fetch($taskId)
    {
        $task = Task::findOrFail($taskId);

        if($task->creator_id === auth()->user()->id || $task->performer_id === auth()->user()->id) {
            return Message::where('task_id', $taskId)->get();
        } else {
            return back();
        }
    }

    /**
     * Persist message to database
     *
     * @param SendMessageRequest $request
     * @return Response
     */

    public function send(SendMessageRequest $request, $taskId)
    {
        try {
            $task = Task::findOrFail($taskId);

            if($task->creator_id === auth()->user()->id || $task->performer_id === auth()->user()->id) {
                $message = Message::create([
                    'message' => $request['message'],
                    'task_id' => $taskId,
                    'user_id' => auth()->user()->id,
                    'created_at' => now(),
                ]);

                $interlocutorId = auth()->user()->id === $task->user_id
                    ? $task->performer_id
                    : $task->user_id;

                $interlocutor = User::find($interlocutorId);
                if(in_array(1, json_decode($interlocutor->notification_settings, true))) {
                    $interlocutor->notify(new UserNotification([
                        'message' => 'Новое сообщение в чате',
                        'task_name' => $task->title,
                        'task_id' => $task->id,
                        'type' => 'message',
                    ]));
                }

                return response($message, 201);
            } else {
                return response(null, 401);
            }
        } catch(ModelNotFoundException $exception) {
            return response(null, 404);
        }
    }
}
