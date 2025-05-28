<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClinicPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $guard = 'clinic';

       // Define permissions structure
        $permissions = [
            'Dashboard Permission' => [
                'Dashboard' => [
                    ['name' => 'clinic-dashboard-view', 'display_name' => 'View'],
                ],
                'Tiles' => [
                    ['name' => 'clinic-tiles-view', 'display_name' => 'View'],
                ],
                'Recent Notifications' => [
                    ['name' => 'clinic-recent_notifications-view', 'display_name' => 'View'],
                ],
                // 'Admin Appointment' => [
                //     ['name' => 'clinic-admin_appointment-view', 'display_name' => 'View'],
                // ],
                'System Events' => [
                    ['name' => 'clinic-system_events-view', 'display_name' => 'View'],
                ],
            ],
            'System User Permission' => [
                'System User' => [
                    ['name' => 'clinic-system_user-add', 'display_name' => 'Add'],
                    ['name' => 'clinic-system_user-edit', 'display_name' => 'Edit'],
                    ['name' => 'clinic-system_user-list', 'display_name' => 'List'],
                ],
            ],
            'Role & Permission Module' => [
                'Role & Permission' => [
                    ['name' => 'clinic-role_permission-add', 'display_name' => 'Add'],
                    ['name' => 'clinic-role_permission-list', 'display_name' => 'List'],
                    ['name' => 'clinic-role_permission-edit', 'display_name' => 'Edit'],
                ],
            ],
            'Patient Module Permission' => [
                'Patient Module' => [
                    ['name' => 'clinic-patient-detail', 'display_name' => 'Detail'],
                    ['name' => 'clinic-patient-add', 'display_name' => 'Add'],
                    ['name' => 'clinic-patient-edit', 'display_name' => 'Edit'],
                    ['name' => 'clinic-patient-view', 'display_name' => 'View'],
                ],
            ],
            'Doctor Module Permission' => [
                'Doctor' => [
                    ['name' => 'clinic-doctor-list', 'display_name' => 'List'],
                    ['name' => 'clinic-doctor-detail', 'display_name' => 'Detail'],
                    ['name' => 'clinic-doctor-add', 'display_name' => 'Add'],
                    ['name' => 'clinic-doctor-edit', 'display_name' => 'Edit'],
                ],
            ],
            'Nurse Module Permission' => [
                'Nurse' => [
                    ['name' => 'clinic-nurse-list', 'display_name' => 'List'],
                    ['name' => 'clinic-nurse-detail', 'display_name' => 'Detail'],
                    ['name' => 'clinic-nurse-add', 'display_name' => 'Add'],
                    ['name' => 'clinic-nurse-edit', 'display_name' => 'Edit'],
                ],
            ],
            'Pharmacist Module Permission' => [
                'Pharmacist' => [
                    ['name' => 'clinic-pharmacist-view', 'display_name' => 'View'],
                    ['name' => 'clinic-pharmacist-add', 'display_name' => 'Add'],
                    ['name' => 'clinic-pharmacist-edit', 'display_name' => 'Edit'],
                    ['name' => 'clinic-pharmacist-detail', 'display_name' => 'Detail'],
                ],
            ],
            'Clinic Module Permission' => [
                'Clinic' => [
                    ['name' => 'clinic-clinic-view', 'display_name' => 'View'],
                    ['name' => 'clinic-clinic-add', 'display_name' => 'Add'],
                    ['name' => 'clinic-clinic-edit', 'display_name' => 'Edit'],
                    ['name' => 'clinic-clinic-detail', 'display_name' => 'Detail'],
                ],
            ],
            'Appointment Module Permission' => [
                'Appointment' => [
                    ['name' => 'clinic-appointment-view', 'display_name' => 'View'],
                    ['name' => 'clinic-appointment-add', 'display_name' => 'Add'],
                    ['name' => 'clinic-appointment-edit', 'display_name' => 'Edit'],
                    ['name' => 'clinic-appointment-detail', 'display_name' => 'Detail'],
                ],
            ],
        ];

        // Create permissions
        foreach ($permissions as $category => $subcategories) {
            foreach ($subcategories as $subcategory => $actions) {
                foreach ($actions as $action) {
                    Permission::Create(
                        // [
                        //     'name' => $action['name'],
                        //     'guard_name' => $guard,
                        // ],
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
