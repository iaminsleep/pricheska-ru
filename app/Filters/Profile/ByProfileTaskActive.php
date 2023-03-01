<?php

namespace App\Filters\Profile;

class ByProfileTaskActive
{
    public function handle($query, $next)
    {
        if(request()->has('active')) {
            $query->where('user_id', auth()->user()->id)->where('status_id', 1);
        }

        return $next($query);
    }
}
