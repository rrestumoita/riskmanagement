<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Import model User

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
{
    // Hapus data sebelumnya
    User::truncate();

    // Data tambahan, dibuat menggunakan model User
    $users = [
        [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'type' => 1,
            'password' => Hash::make('monday'),
        ],
        [
            'name' => 'Analis',
            'email' => 'analis@gmail.com',
            'type' => 2,
            'password' => Hash::make('tuesday'),
        ],
        [
            'name' => 'Manager TI',
            'email' => 'managerti@gmail.com',
            'type' => 3,
            'password' => Hash::make('wednesday'),
        ],
    ];

    // Insert data menggunakan model User
    foreach ($users as $user) {
        User::create($user);
    }
}
}
