<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Create default superadmin user
        $superadmin = User::firstOrCreate([
            'email' => 'superadmin@example.com',
        ], [
            'name' => 'Super Admin',
            'password' => Hash::make('password'),
        ]);

        // Create Superadmin role
        $role = Role::firstOrCreate(['name' => 'Superadmin', 'guard_name' => 'web']);

        // Assign all permissions (existing ones)
        $permissions = Permission::all();
        $role->syncPermissions($permissions);

        // Assign role to user
        $superadmin->assignRole($role);
    }
}
