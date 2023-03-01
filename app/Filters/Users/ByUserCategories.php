<?php

namespace App\Filters\Users;

class ByUserCategories
{
    public function handle($query, $next)
    {
        if(request()->has('specialization')) {
            foreach(request()->specialization as $specializationId){
                $query->orWhere('specialization', 'LIKE', '%'.$specializationId.'%');
            }
        }

        return $next($query);
    }
}
