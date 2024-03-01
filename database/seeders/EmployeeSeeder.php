<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'username' => 'johndoe',
            'password' => Hash::make('password'), // Replace 'password' with a secure password
            'gender' => 'male',
            'phone_number' => '086789726876',
            'address' => 'Mana aja',
            'role' => 'superAdmin'
        ]);
    }
}
