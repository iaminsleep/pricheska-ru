<?php

namespace App\Filters\Tasks;

class ByTaskCategory
{
    public function handle($query, $next)
    {
        if(request()->has('category_id')) {
            $query->where('category_id', request()->category_id);
        }

        return $next($query);
    }
}
