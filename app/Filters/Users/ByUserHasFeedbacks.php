<?php

namespace App\Filters\Users;

class ByUserHasFeedbacks
{
    public function handle($query, $next)
    {
        if(request()->has('has_feedbacks')) {
            $query->withCount('received_feedbacks')->having('received_feedbacks_count', '>', 0);
        }

        return $next($query);
    }
}
