<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomRole;
use App\Models\CustomPermission;

class CustomRolePermissionSeeder extends Seeder {
    public function run() {
        // Create Default Roles
        $adminRole = CustomRole::create(['name' => 'admin']);
        $managerRole = CustomRole::create(['name' => 'manager']);
        $userRole = CustomRole::create(['name' => 'user']);

        // Create Default Permissions
        $permissions = [
            'view_suppliers',
            'create_suppliers',
            'edit_suppliers',
            'delete_suppliers',
            'view_customers',
            'create_customers',
            'edit_customers',
            'delete_customers'
        ];

        foreach ($permissions as $perm) {
            $permission = CustomPermission::create(['name' => $perm]);
            // Assign all permissions to admin
            $adminRole->permissions()->attach($permission);
        }
    }
}

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

// class CustomRolePermissionSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         //
//     }
// }
