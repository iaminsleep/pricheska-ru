<?php

namespace App\Filters\Users;

class ByUserPopularity
{
    public function handle($query, $next)
    {
        if(request()->has('by_popularity')) {
            $query->withCount('received_feedbacks')->orderBy('received_feedbacks_count', 'DESC');
        }

        return $next($query);
    }
}
