<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the guard (replace with your desired guard, e.g., 'api', 'admin')
        $guard = 'web';

        // Define permissions structure
        $permissions = [
            'Dashboard Permission' => [
                'Dashboard' => [
                    ['name' => 'dashboard-view', 'display_name' => 'View'],
                ],
                'Tiles' => [
                    ['name' => 'tiles-view', 'display_name' => 'View'],
                ],
                'Recent Notifications' => [
                    ['name' => 'recent_notifications-view', 'display_name' => 'View'],
                ],
                'Admin Appointment' => [
                    ['name' => 'admin_appointment-view', 'display_name' => 'View'],
                ],
                'System Events' => [
                    ['name' => 'system_events-view', 'display_name' => 'View'],
                ],
            ],
            'System User Permission' => [
                'System User' => [
                    ['name' => 'system_user-add', 'display_name' => 'Add'],
                    ['name' => 'system_user-edit', 'display_name' => 'Edit'],
                ],
            ],
            'Role & Permission Module' => [
                'Role & Permission' => [
                    ['name' => 'role_permission-add', 'display_name' => 'Add'],
                    ['name' => 'role_permission-view', 'display_name' => 'View'],
                    ['name' => 'role_permission-edit', 'display_name' => 'Edit'],
                ],
            ],
            'Patient Module Permission' => [
                'Patient Module' => [
                    ['name' => 'patient-view', 'display_name' => 'View'],
                ],
            ],
            'Doctor Module Permission' => [
                'Doctor' => [
                    ['name' => 'doctor-list', 'display_name' => 'List'],
                    ['name' => 'doctor-detail', 'display_name' => 'Detail'],
                ],
            ],
            'Nurse Module Permission' => [
                'Nurse' => [
                    ['name' => 'nurse-list', 'display_name' => 'List'],
                    ['name' => 'nurse-detail', 'display_name' => 'Detail'],
                ],
            ],
            'Pharmacist Module Permission' => [
                'Pharmacist' => [
                    ['name' => 'pharmacist-view', 'display_name' => 'View'],
                    ['name' => 'pharmacist-add', 'display_name' => 'Add'],
                    ['name' => 'pharmacist-edit', 'display_name' => 'Edit'],
                ],
            ],
            'Clinic Module Permission' => [
                'Clinic' => [
                    ['name' => 'clinic-view', 'display_name' => 'View'],
                    ['name' => 'clinic-add', 'display_name' => 'Add'],
                    ['name' => 'clinic-edit', 'display_name' => 'Edit'],
                ],
            ],
        ];

        // Create permissions
        foreach ($permissions as $category => $subcategories) {
            foreach ($subcategories as $subcategory => $actions) {
                foreach ($actions as $action) {
                    Permission::updateOrCreate(
                        [
                            'name' => $action['name'],
                            'guard_name' => $guard,
                        ],
                        [
                            'name' => $action['name'],
                            'guard_name' => $guard,
                            'category' => $category,
                            'subcategory' => $subcategory,
                            'display_name' => $action['display_name'],
                        ]
                    );
                }
            }
        }
    }
}
