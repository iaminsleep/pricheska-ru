<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\Task\Task;
use App\Models\Task\Response;
use App\Notifications\UserNotification;

class CreateResponseService
{
    public function execute(array $data, $taskId): Response
    {
        $response = Response::create([
            'user_id' => auth()->user()->id,
            'task_id' => $taskId,
            'payment' => $data['payment'],
            'comment' => $data['comment'],
        ]);

        $task = Task::findOrFail($taskId);
        $creator = User::find($task->creator_id);

        $notification = new UserNotification([
            'message' => 'Вам оставили новый отклик в заказе',
            'task_name' => $task->title,
            'task_id' => $task->id,
            'type' => 'message',
        ]);

        $notification->notifiable_type = 'App\Models\User';

        $creator->notify($notification);

        return $response;
    }
}
