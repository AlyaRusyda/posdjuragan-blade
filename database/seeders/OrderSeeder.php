<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Order::create([
            'order_number' => 'AZ16851313999',
            'order_date' => now(),
            'juragan' => 'Korean Hunter',
            'customer_name' => 'Ikhsan FD',
            'customer_phone' => '082-3281-96712',
            'payment_method' => 'C.O.D',
            'source' => 'OFFLINE STORE',
            'served_by' => 'CS ALDA',
            'kd_produk' => 'CK-02',
            'size' => 'L',
            'quantity' => 2,
            'total_amount' => 100000,
            'paid_amount' => 0,
            'remaining_amount' => -100000,
            'notes' => 'PESAN (PI) DEADLINE 19 FEBRUARI 2024 #JAS PREMIUM (S) PI > BAHAN CASSILERO ABU NO. 605 MODEL BK-01 BELAHAN BELAKANG 1 ADA SAMPEL UKURAN',
            'status' => 'belum_proses',
            'deadline' => now()->addDays(10),
        ]);
    }
}
