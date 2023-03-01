<?php

namespace App\Filters\Users;

class ByUserCategory
{
    public function handle($query, $next)
    {
        if(request()->has('specialization_id')) {
            $query->where('specialization', 'LIKE', '%'.request()->specialization_id.'%');
        }

        return $next($query);
    }
}
