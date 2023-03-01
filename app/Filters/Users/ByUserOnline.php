<?php

namespace App\Filters\Users;

class ByUserOnline
{
    public function handle($query, $next)
    {
        if(request()->has('is_online')) {
            $query->where('last_seen', '>=', (new \DateTime())->modify("-1 minute")->format("Y-m-d H:i:s"));
        }

        return $next($query);
    }
}
