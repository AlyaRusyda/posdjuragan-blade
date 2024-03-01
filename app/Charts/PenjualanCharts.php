<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PenjualanCharts
{
    protected $chart;

    public function __construct()
    {
        $this->chart = new LarapexChart;
    }

    public function build()
    {
        //  Data data dibawah ini hanyalah sebuah contoh saja, anda dapat mengganti dengan data sesungguhnya yang ada pada database
        return $this->chart->areaChart()
            ->setTitle('Chart Penjualan Tahun 2023')
            ->addData('Jumlah Terjual', [40, 93, 35, 42, 18, 82, 13, 43, 44, 65, 12, 90])
            ->setXAxis(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
    }
}
