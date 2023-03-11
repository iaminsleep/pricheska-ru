<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class HairdresserScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->select('users.*')
            ->join('user_role', 'user_role.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'user_role.role_id')
            ->where('roles.codename', 'hairdresser') //            ->orWhere('roles.codename', 'admin')

        ;
    }

    public function remove(Builder $builder, Model $model)
    {
    }
}
