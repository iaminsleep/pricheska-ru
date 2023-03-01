<?php

namespace App\Filters\Tasks;

class ByTaskName
{
    public function handle($query, $next)
    {
        if(request()->has('name')) {
            $query->where('title', 'LIKE', '%'.request()->name.'%');
        }

        return $next($query);
    }
}
