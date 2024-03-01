<?php

namespace App\Http\Controllers;

use App\Charts\PenjualanCharts;
use App\Charts\PenjualanChartsDonut;
use App\Http\Controllers\BEController\ChartsProcess;
use Illuminate\Http\Request;

class ChartsController extends Controller
{

    public function index(){
        $getData = new ChartsProcess;
        $getData->getTotalPenjualan();
        $getData->leaderboard();

        return view('customer-service.charts.charts');
    }

    public function filterByJuragan(Request $request){
        $getData = new ChartsProcess;
        $getData->getOrderanByJuragan($request);
        $getData->leaderboard();

        return view('customer-service.charts.charts');
    }
    
    public function filterByStatus(Request $request){
        $getData = new ChartsProcess;
        $getData->getOrderanByStatus($request);
        $getData->leaderboard();

        return view('customer-service.charts.charts');
    }

    public function indexAdmin()
    {
        $penjualanChart = new PenjualanCharts;
        $donutChart = new PenjualanChartsDonut;
        $chart = $penjualanChart->build();
        $chartdonut = $donutChart->build();

        return view('admin.charts.charts', [
            "title" => "Charts",
            "chart" => $chart,
            "chartdonut" => $chartdonut
        ]);
    }

    public function indexSA()
    {
        $penjualanChart = new PenjualanCharts;
        $donutChart = new PenjualanChartsDonut;
        $chart = $penjualanChart->build();
        $chartdonut = $donutChart->build();

        return view('super-admin.charts.charts', [
            "title" => "Charts",
            "chart" => $chart,
            "chartdonut" => $chartdonut
        ]);
    }


    // public function getChartData(Request $request)
    // {
    //     $selectedJuragan = $request->input('juragan');

    //     $data = [
    //         'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
    //         'data' => [500, 700, 300, 900, 600, 1200, 800, 1100, 950, 750, 1000, 850],
    //     ];

    //     return response()->json($data);
    // }
}