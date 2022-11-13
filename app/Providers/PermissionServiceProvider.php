<?php

namespace App\Providers;

use Exception;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Here, what we’re doing is, mapping through all permissions, defining that permission slug (in our case) and finally checking if the user has permission. It combines three functions: hasPermission(), hasPermissionThroughRole() and hasPermissionTo() to finally make a function where you would be able to call ->can() function without typing ->hasPermissionTo() which is way longer. You can now check for user permission like this:
        // dd($user->can('manage-users'));
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->slug, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        } catch (Exception $e) {
            report($e);
            return false;
        }

        // Use: @permission('manage-everything') Only those who have the permission can see this string @endpermission

        Blade::directive('permission', function ($permission) {
            return "<?php if(auth()->check() && auth()->user()->can({$permission})): ?>";
        });

        Blade::directive('endpermission', function ($permission) {
            return "<?php endif; ?>";
        });
    }
}
