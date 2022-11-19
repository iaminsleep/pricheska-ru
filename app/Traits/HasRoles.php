<?php

namespace App\Traits;

use App\Models\Role;

trait HasRoles
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role')->withTimestamps();
    }

    // Now to check if a current logged in user has a role, we will add a new function in HasRolesAndPermissions trait
    /**
     * @param mixed ...$roles
     * @return bool
     */
    public function hasRole(... $roles)
    {
        // we are passing $roles array and running a for each loop on each role to check if the current user’s roles contain the given role.
        foreach ($roles as $role) {
            if ($this->roles->contains('codename', $role)) {
                return true;
            }
        }
        return false;
    }
}
