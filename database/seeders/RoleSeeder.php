<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name'=> 'Super Admin']);
        $admin = Role::create(['name'=> 'Admin']);
        $analis = Role::create(['name'=> 'Analis']);
        $managerti = Role::create(['name'=> 'Manager TI']);

        $admin->givePermissionTo([
            'create-risk',
            'edit-risk',
            'delete-risk',
        ]);

        $analis->givePermissionTo([
            'create-mitigations',
            'edit-mitigations',
            'delete-mitigation',
        ]);

        $managerti->givePermissionTo([
            'create-status',
            'edit-status',
            'delete-status',
        ]);
    }
}
