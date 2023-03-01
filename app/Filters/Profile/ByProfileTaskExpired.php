<?php

namespace App\Filters\Profile;

class ByProfileTaskExpired
{
    public function handle($query, $next)
    {
        if(request()->has('expired')) {
            $query->where('user_id', auth()->user()->id)->where('status_id', 4);
        }

        return $next($query);
    }
}
