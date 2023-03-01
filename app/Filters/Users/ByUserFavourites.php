<?php

namespace App\Filters\Users;

class ByUserFavourites
{
    public function handle($query, $next)
    {
        if(request()->has('in_favourites')) {
            $query->select('users.*')->join('favourites', 'favourites.favouritable_id', '=', 'users.id')
            ->where(['favourites.user_id' => auth()->user()->id]);
        }

        return $next($query);
    }
}
