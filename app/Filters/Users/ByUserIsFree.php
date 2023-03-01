<?php

namespace App\Filters\Users;

class ByUserIsFree
{
    public function handle($query, $next)
    {
        if(request()->has('is_free')) {
            $query->withCount('performing_tasks')->having('performing_tasks_count', '=', 0);
        }

        return $next($query);
    }
}
