<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // pelanggan::create([
        //     'namaPelanggan' => 'Pelanggan1',
        //     'email' => 'Pelanggan@gmail.com',
        //     'hp' => '085421323',
        //     'alamat' => 'Yogyakarta',
        //     'tanggalRegistrasi' => now(),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        Pelanggan::factory()->count(50)->create();
    }
}
