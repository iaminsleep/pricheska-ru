<?php

namespace App\Http\Services;

use Carbon\Carbon;

use App\Models\User;
use App\Models\Task\Task;
use App\Models\Task\Message;
use App\Models\Task\Feedback;
use App\Notifications\UserNotification;

class CompleteTask
{
    public function execute(array $data, $taskId)
    {
        $task = Task::findOrFail($taskId);

        if ($task->performer_id) {
            $user = User::findOrFail($task->performer_id);

            Feedback::create([
                'task_id' => $task->id,
                'author_id' => $task->creator_id,
                'receiver_id' => $task->performer_id,
                'comment' => $data['comment'],
                'rating' => $data['rating'],
            ]);

            $notification = new UserNotification([
                "message" => 'Завершено задание',
                "task_name" => $task->title,
                'task_id' => $taskId,
                "type" => 'close',
            ]);
            $notification->notifiable_type = 'App\Models\User';

            $user->notify($notification);

            $clearMessages = new ClearMessages();
            $clearMessages->execute($taskId);

            $user->save();
        }

        $task->status_id = $data['status'];
        $task->completed_at = Carbon::now();

        $task->save();
    }
}
