<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'adminraviinstitute@gmail.com',
            'password' => Hash::make('Adminraviinstitute1234'), // Ganti 'your_password_here' dengan password yang diinginkan
        ]);
    }
}
