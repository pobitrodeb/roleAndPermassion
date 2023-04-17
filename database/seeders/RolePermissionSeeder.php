<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // Create Roles
            $roleSupperAdmin = Role::create(['name' => 'superadmin']);
            $roleAdmin       = Role::create(['name' => 'admin']);
            $roleEditor      = Role::create(['name' => 'editor']);
            $user            = Role::create(['name' => 'user']);

            // Permission list as a aray
            $permissions  = [
            // Dashboard
                'dashboard.view',


            //blogs permissions
              'blog.create',
              'blog.view',
              'blog.edit',
              'blog.delete',

              // Admin Permissions
              'admin.create',
              'admin.view',
              'admin.edit',
              'admin.delete',

              // Profile Permissions
              'profile.create',
              'profile.view',
              'profile.edit',

            ];

            //Create and Assing Permission
            // $permission = Permission::create(['name' => 'edit articles']);
            for ($i=0; $i < count($permissions); $i++) {
              $permission = Permission::create(['name' => $permissions[$i]]);

              $roleSupperAdmin->givePermissionTo($permission);
              $permission->assignRole($roleSupperAdmin);
            }

    }
}
