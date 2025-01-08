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
            'email' => 'info@raviinstitute.com',
            'password' => Hash::make('Rav!#$2023$#'), // Ganti 'your_password_here' dengan password yang diinginkan
        ]);
    }
}
