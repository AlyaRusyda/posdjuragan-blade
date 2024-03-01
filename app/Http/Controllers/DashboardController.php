<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index(Request $request)
    {


        // Mendapatkan nilai status dari parameter query string (jika ada)
        $status = $request->query('status');

        // Jika status tidak diberikan atau tidak valid, maka default ke 'belum_proses'
        $validStatuses = ['semua_orderan', 'belum_proses', 'cek_pembayaran', 'dalam_proses', 'orderan_selesai'];
        $status = in_array($status, $validStatuses) ? $status : 'belum_proses';

        // Validasi status lebih lanjut
        if ($status != 'semua_orderan') {
            // Jika status bukan 'semua_orderan', filter berdasarkan status
            $orders = DB::table('orders')
            ->join('customers', 'orders.id_customer', '=', 'customers.id')
            ->join('barangs', 'orders.id_produk', '=', 'barangs.id')
            ->join('employees', 'orders.served_by', '=', 'employees.id')
            ->join('juragans', 'orders.juragan', '=', 'juragans.id')
            ->select('orders.*', 'customers.name as customer_name', 'customers.phone as customer_phone', 'barangs.kd_produk as kd_produk', 'juragans.name_juragan as juragan', 'employees.name as served_by')
            ->where('status', $status)->get();
        } else {
            // Jika status 'semua_orderan', tampilkan semua orderan
            $orders = DB::table('orders')
            ->join('customers', 'orders.id_customer', '=', 'customers.id')
            ->join('barangs', 'orders.id_produk', '=', 'barangs.id')
            ->join('employees', 'orders.served_by', '=', 'employees.id')
            ->join('juragans', 'orders.juragan', '=', 'juragans.id')
            ->select('orders.*', 'customers.name as customer_name', 'customers.phone as customer_phone', 'barangs.kd_produk as kd_produk', 'juragans.name_juragan as juragan', 'employees.name as served_by')
            ->get();
        }

        // foreach ($orders as $order) {
        //     $order->short_notes = strlen($order->notes) > 51 ? substr($order->notes, 0, 51) . '...' : $order->notes;
        // }

        return view('admin.dashboard.dashboard', [
            "title" => "Dashboard",
            "status" => $status,
            "orders" => $orders,
            // "order" => $order
        ]);
    }

    public function updateCheckPayment(Request $request, $orderId)
    {
        try {
            $order = Order::find($orderId);

            $order->status = $request->input('status');
            $order->tujuan_bayar = $request->input('tujuan_bayar');
            $order->tgl_bayar = $request->input('tgl_bayar');
            $order->jumlah_dana = $request->input('jumlah_dana');

            $order->save();

            return redirect()->route('dashboard', ['status' => $order->status])
                ->with('success', 'Order <span class="text-success">Berhasil</span> Diubah');
        } catch (\Exception $e) {
            return redirect()
                ->with('error', 'Order <span class="text-danger">Belum</span> Lengkap!' . $e->getMessage());
        }
    }

    public function updateOnProcess(Request $request, $orderId)
    {
        try {
            $order = Order::find($orderId);

            $order->status = $request->input('status');
            $order->kelengkapan = $request->input('kelengkapan');
            $order->notes = $request->input('notes');

            if ($order->kelengkapan === 'Lengkap') {
                $order->keterangan_status = $request->input('keterangan_status');
                // Perubahan 1: Tambahkan kondisi berikut untuk menyimpan data keteranganStatus
                if ($request->input('keterangan_status')) {
                    $order->keterangan_status = 'Masuk';
                } else {
                    $order->keterangan_status = 'Selesai'; // Atau sesuaikan dengan nilai default jika perlu
                }
            } else {
                $order->keterangan_status = $request->input('keterangan_status');
            }

            $order->save();

            return redirect()->route('dashboard', ['status' => $order->status])
                ->with('success', 'Order <span class="text-success">Berhasil</span> Diubah');
            // ->with('kelengkapan', $order->kelengkapan)
            // ->with('keterangan_status', $order->keterangan_status)
            // ->with('status', $order->status)
            // ->with('disableDataPesanan', $order->kelengkapan === 'Lengkap');
        } catch (\Exception $e) {
            return redirect()->route('dashboard', ['status' => $order->status])
                ->with('success', 'Order <span class="text-success">Berhasil</span> Diubah');

        }
    }
}
