<?php

namespace App\Http\Services;

use App\Models\Task\Response;

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

        return $response;
    }
}
