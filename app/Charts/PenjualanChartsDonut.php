<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PenjualanChartsDonut
{
    protected $chart;

    public function __construct()
    {
        $this->chart = new LarapexChart;
    }

    public function build()
    {
        //  Data data dibawah ini hanyalah sebuah contoh saja, anda dapat mengganti dengan data sesungguhnya yang ada pada database
        return $this->chart->donutChart()
            ->setTitle('Data Penjualan Toko')
            ->setSubtitle('Tahun 2023.')
            ->addData([40, 60])
            ->setLabels(['Toko Online', 'Toko Offline']);
    }
}
