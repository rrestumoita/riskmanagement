<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin=User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make ('12345678')
        ]);
        $superAdmin->assignRole ('Super Admin');
        
        $admin=User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'type' => 1,
            'password' => Hash::make ('12345678')
        ]);
        $admin->assignRole('Admin');

        $analis=User::create([
            'name' => 'Analis',
            'email' => 'analis@gmail.com',
            'type' => 2,
            'password' => Hash::make ('12345678')
        ]);
        $analis->assignRole('Analis');

        $managerti=User::create([
            'name' => 'Manager TI',
            'email' => 'managerti@gmail.com',
            'type' => 3,
            'password' => Hash::make ('12345678')
        ]);
        $managerti->assignRole('Manager TI');
    }
}
