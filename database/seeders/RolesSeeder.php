<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'talent', 'display_name' => 'Talent', 'guard_name'   => 'web'
            ],
            [
                'name' => 'admin',  'display_name' => 'Administrateur', 'guard_name'   => 'web'
            ],
            [
                'name' => 'super_admin',  'display_name' => 'Super Admin', 'guard_name'   => 'web'
            ]
        ];

        Role::upsert($roles, ['name']);
    }
}
