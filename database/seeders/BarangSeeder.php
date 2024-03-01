<?php

namespace Database\Seeders;
use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
namespace Database\Seeders;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            "kd_produk" => "BK-01",
            "nama" => "Blazer",
            "size" => "L",
            "harga_satuan" => "200.000",
            "stock" => 20,
            "img" => "https://drive.google.com",
            "video" => "https://drive.google.com",
            "point" => 20,
        ]);
    }
}
