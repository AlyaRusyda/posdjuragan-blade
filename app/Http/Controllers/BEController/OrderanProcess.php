<?php

namespace App\Http\Controllers\BEController;

use App\Models\Order;
use App\Models\Barang;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Juragan;

class OrderanProcess extends Controller
{

    public function addOrderan(Request $request)
    {
        // Validasi input
        $this->validate($request, [
            'order_date' => 'required',
            'nama_pelanggan' => 'required',
            'served_by' => 'required',
            'size' => 'required',
            'quantity' => 'required',
            'total_amount' => 'required',
            'notes' => 'required',
        ]);

        $pelanggan = Customer::where('name', $request->nama_pelanggan)->first();
        if (!$pelanggan) {
            return response()->json(['error' => 'Pelanggan tidak ditemukan'], 404);
        }

        $produk = Barang::whereRaw('LOWER(kd_produk) = ?', [strtolower($request->kd_produk)])->first();
        if (!$produk) {
            return response()->json(['error' => 'Produk tidak ditemukan'], 404);
        }

        $cs = Employee::where('name', $request->served_by)->first();
        if (!$cs) {
            return response()->json(['error' => 'CS tidak ditemukan'], 404);
        }

        $juragan = Juragan::where('name_juragan', $request->juragan)->first();
        if (!$juragan) {
            return response()->json(['error' => 'Juragan tidak ditemukan'], 404);
        }

        $inisialJuragan = implode('', array_map(function ($item) {
            return $item[0];
        }, explode(' ', strtoupper($request->juragan))));

        $orderNumber = $this->generateOrderNumber($inisialJuragan);

        $order = new Order([
            'order_date' => $request->order_date,
            'served_by' => $cs->id,
            'size' => $request->size,
            'quantity' => $request->quantity,
            'total_amount' => $request->total_amount,
            'notes' => $request->notes,
            'payment_method' => 'COD',
            'source' => '-',
            'tgl_bayar' => now(),
            'paid_amount' => 0,
            'remaining_amount' => 0,
            'status' => 'belum_proses',
            'keterangan_status' => 'orderan baru',
            'deadline' => now()->addDays(7),
            'order_number' => $orderNumber,
            'id_customer' => $pelanggan->id,
            'juragan' => $juragan->id, // Asumsi ini adalah string dan kolom di DB bertipe teks
            'id_produk' => $produk->id, // Pastikan ini dimasukkan
        ]);
        

        $order->save();

        return response()->json([
            'success' => true,
            'message' => 'Orderan berhasil ditambahkan',
            'data' => $order,
        ], 200);
    }

    private function generateOrderNumber($inisialJuragan)
    {
        do {
            $randomNumber = rand(10000000, 99999999);
            $orderNumber = $inisialJuragan . $randomNumber;
        } while (Order::where('order_number', $orderNumber)->exists());

        return $orderNumber;
    }


    public function updateOrderan(Request $request, $id)
    {
        //
        $this->validate($request, [
            'juragan' => 'required',
            'nama_pelanggan' => 'required',
            'payment_method' => 'required',
            'source' => 'required',
            'served_by' => 'required',
            'tgl_bayar' => 'required',
            'kd_produk' => 'required',
            'size' => 'required',
            'quantity' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
            'remaining_amount' => 'required',
            'notes' => 'required',
            'status' => 'required',
            'keterangan_status' => 'required',
            'deadline' => 'required'
        ]);

        // Cari pelanggan berdasarkan nama
        $pelanggan = Customer::where('name', $request->nama_pelanggan)->first();
        if (!$pelanggan) {
            return response()->json(['error' => 'Pelanggan tidak ditemukan'], 404);
        }

        // Cari produk berdasarkan kode
        $produk = Barang::where('kd_produk', $request->kd_produk)->first();
        if (!$produk) {
            return response()->json(['error' => 'Produk tidak ditemukan'], 404);
        }

        $cs = Employee::where('name', $request->served_by)->first();
        if (!$cs) {
            return response()->json(['error' => 'Cs tidak ditemukan'], 404);
        }

        $juragan = Juragan::where('name_juragan', $request->juragan)->first();
        if (!$juragan) {
            return response()->json(['error' => 'Juragan tidak ditemukan'], 404);
        }

        $data = Order::findOrFail($id);
        $data->fill([
            'juragan' => $juragan->id,
            'id_pelanggan' => $pelanggan->id,
            'payment_method' => $request->payment_method,
            'source' => $request->source,
            'served_by' => $cs->id,
            'tgl_bayar' => $request->tgl_bayar,
            'id_produk' => $produk->id,
            'size' => $request->size,
            'quantity' => $request->quantity,
            'total_amount' => $request->total_amount,
            'paid_amount' => $request->paid_amount,
            'remaining_amount' => $request->remaining_amount,
            'notes' => $request->notes,
            'status' => $request->status,
            'keterangan_status' => $request->keterangan_status,
            'deadline' => $request->deadline
        ]);
        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Orderan berhasil diupdate',
            'data' => $data
        ], 200);
    }

    public function deleteOrderan($id)
    {
        //
        $data = Order::find($id);

        if ($data) {
            // Menghapus data jika ditemukan
            $data->delete();
            // Mengembalikan response JSON untuk kasus sukses
            return redirect()->route('semua-orderanCS')->with('success', 'Data successfully deleted.');
        } else {
            // Mengembalikan response JSON untuk kasus data tidak ditemukan
            return response()->json([
                'success' => false,
                'message' => 'Data not found.'
            ], 404); // HTTP status code 404 Not Found
        }
    }
}
