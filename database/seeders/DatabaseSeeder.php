<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Barang::create([
            "kd_produk" => "RJ-05",
            "nama" => "Blazer",
            "size" => "L",
            "harga_satuan" => 200.000,
            "stock" => 20,
            "img" => "https://drive.google.com",
            "video" => "https://drive.google.com",
            "point" => 20,
        ]);

        Barang::create([
            "kd_produk" => "KM-08",
            "nama" => "King",
            "size" => "M",
            "harga_satuan" => 250.000,
            "stock" => 20,
            "img" => "https://drive.google.com",
            "video" => "https://drive.google.com",
            "point" => 20,
        ]);

        // Barang::create([
        //     "kd_produk" => "FD-12",
        //     "nama" => "Zhack",
        //     "size" => "XL",
        //     "harga_satuan" => 150.000,
        //     "stock" => 20,
        //     "img" => "https://drive.google.com",
        //     "video" => "https://drive.google.com",
        //     "point" => 20,
        // ]);

        // Barang::create([
        //     "kd_produk" => "WT-16",
        //     "nama" => "Kai",
        //     "size" => "XXL",
        //     "harga_satuan" => 350.000,
        //     "stock" => 30,
        //     "img" => "https://drive.google.com",
        //     "video" => "https://drive.google.com",
        //     "point" => 25,
        // ]);

        // Barang::create([
        //     "kd_produk" => "IF-20",
        //     "nama" => "Benedetta",
        //     "size" => "L",
        //     "harga_satuan" => 550.000,
        //     "stock" => 20,
        //     "img" => "https://drive.google.com",
        //     "video" => "https://drive.google.com",
        //     "point" => 20,
        // ]);
    }
}
