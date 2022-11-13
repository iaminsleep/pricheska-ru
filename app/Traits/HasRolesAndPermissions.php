<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;

trait HasRolesAndPermissions
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permission');
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
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    // Next, for checking the permission for a current user, we will add the below two methods in our HasRolesAndPermissions trait.
    /**
     * @param $permission
     * @return bool
     */
    protected function hasPermission($permission)
    {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    // Now, we have one method which will check if a user has the permissions directly or through a role.
    /**
     * @param $permission
     * @return bool
     */
    protected function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    // The above method will check if the user’s permissions contain the given permission, if yes then it will return true otherwise false. As we know, we have many to many relationships between roles and permissions. This enables us to check if a user has permission through its role
    /**
     * @param $permission
     * @return bool
     */
    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    // Now let’s say we want to attach some permissions to the current user. We will add a new method to accomplish this.
    /**
     * @param array $permissions
     * @return mixed
     */
    protected function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('slug', $permissions)->get();
    }

    /**
     * @param mixed ...$permissions
     * @return $this
     */
    public function givePermissionsTo(... $permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if ($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    } // The first method is to get all permissions based on an array passed. In the second function, we pass permissions as an array and get all permissions from the database based on the array. Next, we use the permissions() method to call the saveMany() method to save the permissions for the current user.

    // To delete permissions for a user, we pass permissions to our deletePermissions() method and remove all attached permissions using the detach() method.
    /**
     * @param mixed ...$permissions
     * @return $this
     */
    public function deletePermissions(... $permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    /**
     * @param mixed ...$permissions
     * @return HasRolesAndPermissions
     */
    public function refreshPermissions(... $permissions)
    {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    } // The second method actually removes all permissions for a user and then reassign the permissions provided for a user.
}
