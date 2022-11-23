<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'access admin'
        ];

        $roles = [
            'Admin',
            'Super Admin',
            'Developer'
        ];

        $rolesHasPermissions = [
            'Developer' => [
                'access admin'
            ],
            'Admin' => [
                'access admin'
            ]
        ];

        foreach ($permissions as $permission)
        {
            Permission::updateOrCreate(['name' => $permission]);
        }

        foreach ($roles as $role)
        {
            Role::updateOrCreate(['name' => $role]);
        }

        foreach ($rolesHasPermissions as $role => $permissions)
        {
            Role::where(['name' => $role])->first()->syncPermissions($permissions);
        }
    }
}
