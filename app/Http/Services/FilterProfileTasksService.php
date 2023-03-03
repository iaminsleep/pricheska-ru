<?php

namespace App\Http\Services;

use Illuminate\Pipeline\Pipeline;

use App\Models\Task\Task;

class FilterProfileTasksService
{
    public function execute()
    {
        $query = Task::query();

        return app(Pipeline::class)
            ->send($query)
            ->through([
                \App\Filters\Profile\ByProfileTaskCompleted::class,
                \App\Filters\Profile\ByProfileTaskPerforming::class,
                \App\Filters\Profile\ByProfileTaskActive::class,
                \App\Filters\Profile\ByProfileTaskCancelled::class,
                \App\Filters\Profile\ByProfileTaskExpired::class,
            ])
            ->thenReturn();
    }
}
