<?php

namespace App\Filters\Users;

class ByUserRating
{
    public function handle($query, $next)
    {
        if(request()->has('by_rating')) {
            $query->orderBy('rating', 'DESC');
        }

        return $next($query);
    }
}
