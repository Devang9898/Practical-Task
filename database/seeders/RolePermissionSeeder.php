<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;




use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Creating Roles
        $admin = Role::create(['name' => 'Admin']);
        $manager = Role::create(['name' => 'Manager']);
        $user = Role::create(['name' => 'User']);

        // Creating Permissions
        $permissions = ['create', 'edit', 'delete', 'view'];
        foreach ($permissions as $perm) {
            Permission::create(['name' => $perm]);
        }

        // Assigning Permissions to Admin
        $admin->permissions()->sync(Permission::all());

        // Assigning View Permission to Manager and User
        $viewPermission = Permission::where('name', 'view')->first();
        $manager->permissions()->attach($viewPermission);
        $user->permissions()->attach($viewPermission);
    }
}
