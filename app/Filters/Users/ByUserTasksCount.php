<?php

namespace App\Filters\Users;

class ByUserTasksCount
{
    public function handle($query, $next)
    {
        if(request()->has('by_tasks_count')) {
            $query->withCount('performing_tasks')->orderBy('performing_tasks_count', 'DESC');
        }

        return $next($query);
    }
}
