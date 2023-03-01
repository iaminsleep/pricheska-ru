<?php

namespace App\Filters\Tasks;

class ByTaskNoResponses
{
    public function handle($query, $next)
    {
        if(request()->has('no_responses')) {
            $query->withCount('feedbacks')->having('feedbacks_count', '=', 0);
        };

        return $next($query);
    }
}
