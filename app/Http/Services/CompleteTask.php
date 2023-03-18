<?php

namespace App\Http\Services;

use Carbon\Carbon;

use App\Models\User;
use App\Models\Task\Task;
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

            $user->save();
        }

        $task->status_id = $data['status'];
        $task->completed_at = Carbon::now();

        $task->save();
    }
}
