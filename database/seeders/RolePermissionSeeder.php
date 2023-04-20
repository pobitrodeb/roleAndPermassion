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

            //Dashbaord

            [
                'group_name'        => 'dashboard',
                'permissions'       =>  [
                    'dashboard.view',
                    'dashboard.edit',
                ],
            ],

            [
                'group_name'        => 'blog',
                'permissions'      => [
                    //blogs permissions
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',
                ],
            ],

            [
                'group_name'        => 'admin',
                'permissions'       => [
                    // Admin Permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                ],
            ],

            [
                'group_name'        => 'profile',
                'permissions'       => [
                    // Profile Permissions
                    'profile.create',
                    'profile.view',
                    'profile.edit',
                ],
            ],

        ];

        //Create and Assing Permission
            for ($i = 0; $i < count($permissions); $i++) {
                $permissionGroup = $permissions[$i]['group_name'];
                for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                    // Create Permission
                    $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                    $roleSupperAdmin->givePermissionTo($permission);
                    $permission->assignRole($roleSupperAdmin);
                }
            }

    }
}
