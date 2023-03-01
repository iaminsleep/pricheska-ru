<?php

namespace App\Filters\Profile;

class ByProfileTaskCompleted
{
    public function handle($query, $next)
    {
        if(request()->has('completed')) {
            $query->where('user_id', auth()->user()->id)->where('status_id', 2);
        }

        return $next($query);
    }
}
