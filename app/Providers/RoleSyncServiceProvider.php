<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSyncServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        // Permission::created(function ($permission) {
        //     $superadminRole = Role::where('name', 'Superadmin')->first();
        //     if ($superadminRole) {
        //         $superadminRole->givePermissionTo($permission);
        //     }
        // });

    }
}
