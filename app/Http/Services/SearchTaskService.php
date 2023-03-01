<?php

namespace App\Http\Services;

use App\Models\Task\Task;
use Illuminate\Pipeline\Pipeline;

class SearchTaskService
{
    public function execute()
    {
        $query = Task::query();

        return app(Pipeline::class)
            ->send($query)
            ->through([
                \App\Filters\Tasks\ByTaskCategories::class,
                \App\Filters\Tasks\ByTaskNoResponses::class,
                \App\Filters\Tasks\ByTaskTimePeriod::class,
                \App\Filters\Tasks\ByTaskName::class,
                \App\Filters\Tasks\ByTaskCategory::class,
            ])
            ->thenReturn();
    }
}
