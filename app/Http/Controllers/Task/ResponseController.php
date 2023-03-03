<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreResponse;
use App\Http\Services\CreateResponseService;

class ResponseController extends Controller
{
    public function store(StoreResponse $request, CreateResponseService $service, $taskId)
    {
        $service->execute($request->validated(), $taskId);

        return redirect(route('tasks.single', ['id' => $taskId]));
    }
}
