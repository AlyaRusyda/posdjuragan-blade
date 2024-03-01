<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin; // Make sure to import your Admin model
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
       Admin::create([
           'name' => 'Administrator',
           'email' => 'admin@example.com',
           'username' => 'admin',
           'password' => Hash::make('password'),
           'profile_image' => null,
           'place_of_birth' => 'Place of Birth',
           'date_of_birth' => now(),
           'gender' => 'male',
           'phone_number' => 'Phone Number',
           'address' => 'Address',
       ]);
   }
}
