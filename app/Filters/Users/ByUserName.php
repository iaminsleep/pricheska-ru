<?php

namespace App\Filters\Users;

class ByUserName
{
    public function handle($query, $next)
    {
        if(request()->has('name')) {
            $query->where('name', 'LIKE', '%'.request()->name.'%');
        }

        return $next($query);
    }
}
