<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Ensure this is the correct path to your User model

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a new user instance and save it to the database
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'), // Replace 'password' with a secure password
        ]);

        // Optionally, you can use a factory if it's defined for the User model
        // User::factory()->count(10)->create(); // This would create 10 users
    }
}
