<?php

namespace App\Http\Services;

use App\Models\Task\Message;

class ClearMessages
{
    public function execute($taskId)
    {
        return Message::where('task_id', $taskId)->delete();
    }
}
