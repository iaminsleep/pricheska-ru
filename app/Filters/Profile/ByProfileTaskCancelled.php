<?php

namespace App\Filters\Profile;

class ByProfileTaskCancelled
{
    public function handle($query, $next)
    {
        if(request()->has('cancelled')) {
            $query->where('user_id', auth()->user()->id)->where('status_id', 3);
        }

        return $next($query);
    }
}
