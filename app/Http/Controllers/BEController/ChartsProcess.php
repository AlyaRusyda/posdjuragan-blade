<?php

namespace App\Http\Controllers\BEController;

use App\Models\Order;
use App\Models\Juragan;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ChartsProcess extends Controller
{
    public function indexChartsAdmin()
    {
        $totalPendapatan = Order::orderanSelesai()->excludeStatusGagal()->sum('paid_amount');
        $totalBarangTerjual = Order::orderanSelesai()->excludeStatusGagal()->sum('quantity');
        $hargaTertinggi = Order::orderanSelesai()->excludeStatusGagal()->max('paid_amount');
    
        $totalOrderan = Order::selectRaw('DATE_FORMAT(order_date, "%m") as bulan, COUNT(*) as total_orderan')
            ->orderanSelesai()
            ->excludeStatusGagal()
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();
    
        $produkTerlaris = Order::orderanSelesai()->excludeStatusGagal()
            ->select('id_produk', DB::raw('sum(quantity) as total_terjual'))
            ->groupBy('id_produk')
            ->orderBy('total_terjual', 'desc')
            ->take(5) // Misalnya mengambil 5 produk terlaris
            ->get();
    
        $tokoTerlaris = Order::orderanSelesai()->excludeStatusGagal()
            ->select('juragan', DB::raw('sum(paid_amount) as total_penjualan'))
            ->groupBy('juragan')
            ->orderBy('total_penjualan', 'desc')
            ->take(5) // Misalnya mengambil 5 toko terlaris
            ->get();
    
        $dataDonatChart = Order::orderanSelesai()->excludeStatusGagal()
            ->select('juragan', DB::raw('sum(paid_amount) as total_penjualan'))
            ->groupBy('juragan')
            ->get()
            ->map(function ($item) {
                return ['label' => $item->juragan, 'value' => $item->total_penjualan];
            });
    
        // Membuat response JSON
        $response = [
            'totalPendapatan' => $totalPendapatan,
            'totalBarangTerjual' => $totalBarangTerjual,
            'hargaTertinggi' => $hargaTertinggi,
            'totalOrderan' => $totalOrderan,
            'produkTerlaris' => $produkTerlaris,
            'tokoTerlaris' => $tokoTerlaris,
            'dataDonatChart' => $dataDonatChart,
        ];
    
        return response()->json($response);
    }

    public function indexChartsSA(){
        $data = $this->indexChartsAdmin();

        return response()->json($data);
    }
    
    public function getTotalPenjualan()
    {
        $totalOrderan = Order::selectRaw('DATE_FORMAT(order_date, "%m") as bulan, COUNT(*) as total_orderan')
            ->orderanSelesai()
            ->excludeStatusGagal()
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        if ($totalOrderan->isNotEmpty()) {
            return response()->json([
                'success' => $totalOrderan->isNotEmpty(),
                'data' => $totalOrderan,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada data orderan.',
            ]);
        }
    }

    public function getOrderanByJuragan(Request $request)
    {
        // Mengambil juragan berdasarkan nama yang diinput oleh user
        $juragan = Juragan::where('name_juragan', $request->input('juragan'))->first();

        // Memeriksa apakah juragan ditemukan
        if (!$juragan) {
            return response()->json(['error' => 'Juragan tidak ditemukan'], 404);
        }

        // Mengambil total orderan berdasarkan id juragan
        $totalOrderan = Order::selectRaw('DATE_FORMAT(order_date, "%m") as bulan, COUNT(*) as total_orderan')
            ->where('juragan', $juragan->id)
            ->orderanSelesai()
            ->excludeStatusGagal()
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        if ($totalOrderan) {
            return response()->json([
                'success' => $totalOrderan->isNotEmpty(),
                'total_order' => $totalOrderan
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada data orderan untuk juragan ini.'
            ]);
        }
    }

    public function getOrderanByStatus(Request $request)
    {
        $status = $request->input('status');

        $totalOrderan = Order::selectRaw('DATE_FORMAT(order_date, "%m") as bulan, COUNT(*) as total_orderan')
            ->where('status', $status)
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        if ($totalOrderan) {
            return response()->json([
                'success' => $totalOrderan->isNotEmpty(),
                'total_order' => $totalOrderan
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada data orderan dengan status ini.'
            ]);
        }
    }

    public function leaderboard()
    {
        $leaderboard = Employee::where('role', 'cs')
            ->join('orders', 'employees.id', '=', 'orders.served_by')
            ->select('employees.name', DB::raw('SUM(orders.quantity) as total_barang_terjual'))
            ->groupBy('employees.id', 'employees.name')
            ->orderByDesc('total_barang_terjual')
            ->get();

        if ($leaderboard !== null) {
            return response()->json($leaderboard);
        } else {
            return response()->json(['success' => false, 'message' => 'CS tidak ditemukan.']);
        }
    }
}
