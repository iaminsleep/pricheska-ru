<?php

namespace App\Filters\Profile;

class ByProfileTaskPerforming
{
    public function handle($query, $next)
    {
        if(request()->has('performing')) {
            $query->where('performer_id', auth()->user()->id);
        }

        return $next($query);
    }
}
