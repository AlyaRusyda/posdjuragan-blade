<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BEController\OrderanProcess;
use App\Models\Order;
use App\Models\Barang;
use App\Models\Orderan;
use App\Models\Customer;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreorderanRequest;
use App\Http\Requests\UpdateorderanRequest;
use App\Models\Cs;

class OrderanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "CS / Semua Orderan";

        $orderan = DB::table('orders')
            ->join('customers', 'orders.id_customer', '=', 'customers.id')
            ->join('barangs', 'orders.id_produk', '=', 'barangs.id')
            ->join('employees', 'orders.served_by', '=', 'employees.id')
            ->join('juragans', 'orders.juragan', '=', 'juragans.id')
            ->select('orders.*', 'customers.name as customer_name', 'customers.phone as customer_phone', 'barangs.kd_produk as kd_produk', 'juragans.name_juragan as juragan')
            ->get();
        $dataa = Order::latest()->first();

        $statistics = $this->orderStatus();


        // Mengirim data ke dalam bentuk json

        // return response()->json([
        //     'status' => $statistics,
        //     'orderan' => $orderan,
        //     'data' => $dataa,
        //     'title' => 'Semua Orderan'
        // ]);

        return view('customer-service.dashboard-invoice.semua-orderan', [
            'status' => $statistics,
            'orderan' => $orderan,
            'data' => $dataa,
            'title' => 'Semua Orderan'
        ]);
    }
    public function indexSA()
    {
        $title = "CS / Semua Orderan";

        $orderan = DB::table('orders')
            ->join('customers', 'orders.id_customer', '=', 'customers.id')
            ->join('barangs', 'orders.id_produk', '=', 'barangs.id')
            ->join('employees', 'orders.served_by', '=', 'employees.id')
            ->join('juragans', 'orders.juragan', '=', 'juragans.id')
            ->select('orders.*', 'customers.name as customer_name', 'customers.phone as customer_phone', 'barangs.kd_produk as kd_produk', 'juragans.name_juragan as juragan')
            ->get();
        $dataa = Order::latest()->first();

        $statistics = $this->orderStatus();


        // Mengirim data ke dalam bentuk json

        // return response()->json([
        //     'status' => $statistics,
        //     'orderan' => $orderan,
        //     'data' => $dataa,
        //     'title' => 'Semua Orderan'
        // ]);

        return view('super-admin.dashboard-invoice.semua-orderan', [
            'status' => $statistics,
            'orderan' => $orderan,
            'data' => $dataa,
            'title' => 'Semua Orderan'
        ]);
    }

    public function store(Request $request)
    {
        $addOrderan = new OrderanProcess;
        $addOrderan->addOrderan($request);

        return redirect()->route('')->with('success', 'Berhasil menambahkan data orderan');
    }

    public function update(Request $request, $id)
    {
        $updateOrderan = new OrderanProcess;
        $updateOrderan->updateOrderan($request, $id);

        return redirect()->route('')->with('success', 'Berhasil udpate data orderan');
    }

    public function search(Request $request)
    {
        $query = Order::query();

        $query->withPaymentMethod($request->input('payment_method'))
            ->withStatus($request->input('status'))
            ->withShippingOption($request->input('opsi_pengiriman'))
            ->withCustomerName($request->input('customer_name'))
            ->withOrderDate($request->input('order_date'));

        $query->join('customers', 'orders.id_customer', '=', 'customers.id')
                    ->join('barangs', 'orders.id_produk', '=', 'barangs.id');

        if ($request->has('payment_method')) {
            $query->where('payment_method', 'like', '%' . $request->input('payment_method') . '%');
        }

        if ($request->has('customer_name')) {
            $query->where('customers.name', 'like', '%' . $request->input('customer_name') . '%');
        }
        
        $query->select('orders.*', 'customers.name as customer_name', 'customers.phone as customer_phone', 'barangs.kd_produk as kd_produk');
        $orderan = $query->get();

        $statistics = $this->orderStatus();
        $dataa = Order::latest()->first();

        return view('customer-service.dashboard-invoice.semua-orderan', [
            'status' => $statistics,
            'data' => $dataa,
            'orderan' => $orderan,
            'title' => 'Semua Orderan'
        ]);
    }


    // Menggunakan data array sebagai data alert sementara
    public function dataalert(Request $request)
    {
        $segment = $request->segment(1);
        $alert = [
            [
                "kode" => "001",
                "hari" => "Kamis",
                "tanggal" => "18-01-2024",
                "jam" => "15.30",
                "info" => "Admin Mengedit 'Data Pesanan' pada invoice AH1693918567",
                "status" => "diedit"
            ]

        ];

        Session::put('alert', $alert);

        //menghitung jumlah code
        $jumlah_kode = count(array_unique(array_column($alert, 'kode')));


        return view('layouts.mainSA', compact('alert', 'jumlah_kode'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function cetakInvoiceAdmin($orderNumber)
    {
        // Mendapatkan data order dari database berdasarkan nomor pesanan
        $order = Order::where('order_number', $orderNumber)->first();

        if ($order) {
            // Informasi invoice
            $invoiceNumber = $order->order_number;
            $invoiceDate = date('Y-m-d'); // Tanggal cetak invoice, Anda bisa mengganti dengan tanggal lain sesuai kebutuhan
            $servedBy = $order->served_by; // Menggunakan data served_by dari order

            // Menyiapkan data produk pada order
            $items = $order->items;

            // Menghitung subtotal
            $subtotal = 0;

            // Memeriksa apakah $items tidak null sebelum melakukan perulangan
            if ($items) {
                foreach ($items as $item) {
                    // Mengakses data barang dari relasi barang pada setiap item pesanan
                    $barang = $item->barang;

                    // Jika barang ditemukan, tambahkan informasi barang ke dalam item
                    if ($barang) {
                        $item->kd_produk = $barang->kd_produk;
                        $item->quantity = $order->quantity; // Menggunakan quantity dari item pesanan, bukan dari pesanan itu sendiri
                        $item->harga_satuan = $barang->harga_satuan ?? 0; // Gunakan harga satuan dari barang dan handel jika tidak ada harga satuan
                        $item->subtotal = $item->quantity * $item->harga_satuan; // Menghitung subtotal per item
                        $subtotal += $item->subtotal; // Menambahkan subtotal item ke subtotal total
                    }
                }
            } else {
                $items = []; // Inisialisasi $items sebagai array kosong jika null
            }

            // Set judul halaman
            $title = "Invoice #" . $invoiceNumber;

            // Mengirim data ke tampilan invoice.blade.php
            return view('admin.data-pelanggan.invoice', [
                'title' => $title,
                'invoiceNumber' => $invoiceNumber,
                'invoiceDate' => $invoiceDate,
                'servedBy' => $servedBy,
                'items' => $items,
                'subtotal' => $subtotal,
            ]);
        } else {
            return "Order dengan nomor $orderNumber tidak ditemukan.";
            // Atau lakukan penanganan kesalahan lainnya sesuai kebutuhan
        }
    }

    // Di dalam controller Anda
public function cetakInvoiceCs($orderNumber)
{
    // Mendapatkan data order dari database berdasarkan nomor pesanan
    $order = Order::where('order_number', $orderNumber)->first();

    if ($order && $order->status == 'orderan_selesai' && $order->total_amount == $order->paid_amount) {
        // Informasi invoice
        $invoiceNumber = $order->order_number;
        $invoiceDate = date('Y-m-d'); // Tanggal cetak invoice, Anda bisa mengganti dengan tanggal lain sesuai kebutuhan
        $servedBy = $order->served_by; // Menggunakan data served_by dari order

        // Menyiapkan data produk pada order
        $items = $order->items;

        // Menghitung subtotal
        $subtotal = 0;

        // Memeriksa apakah $items tidak null sebelum melakukan perulangan
        if ($items) {
            foreach ($items as $item) {
                // Mengakses data barang dari relasi barang pada setiap item pesanan
                $barang = $item->barang;

                // Jika barang ditemukan, tambahkan informasi barang ke dalam item
                if ($barang) {
                    $item->kd_produk = $barang->kd_produk;
                    $item->quantity = $order->quantity; // Menggunakan quantity dari item pesanan, bukan dari pesanan itu sendiri
                    $item->harga_satuan = $barang->harga_satuan ?? 0; // Gunakan harga satuan dari barang dan handel jika tidak ada harga satuan
                    $item->subtotal = $item->quantity * $item->harga_satuan; // Menghitung subtotal per item
                    $subtotal += $item->subtotal; // Menambahkan subtotal item ke subtotal total
                }
            }
        } else {
            $items = []; // Inisialisasi $items sebagai array kosong jika null
        }

        // Set judul halaman
        $title = "Invoice #" . $invoiceNumber;

        // Mengirim data ke tampilan invoice.blade.php
        return view('customer-service.dashboard-invoice.invoice', [
            'title' => $title,
            'invoiceNumber' => $invoiceNumber,
            'invoiceDate' => $invoiceDate,
            'servedBy' => $servedBy,
            'items' => $items,
            'subtotal' => $subtotal,
            'order' => $order, // Mengirimkan data order ke tampilan
        ]);
    } else {
        return "Order dengan nomor $orderNumber tidak ditemukan atau belum selesai terbayar.";
        // Atau lakukan penanganan kesalahan lainnya sesuai kebutuhan
    }
}


    public function cetakinvoiceSa($orderNumber)
{
    // Mendapatkan data order dari database berdasarkan nomor pesanan
    $order = Order::where('order_number', $orderNumber)->first();

    if ($order) {
        // Informasi invoice
        $invoiceNumber = $order->order_number;
        $invoiceDate = date('Y-m-d'); // Tanggal cetak invoice, Anda bisa mengganti dengan tanggal lain sesuai kebutuhan
        $servedBy = $order->served_by; // Menggunakan data served_by dari order

        // Menyiapkan data produk pada order
        $items = $order->items;

        // Menghitung subtotal
        $subtotal = 0;

        // Memeriksa apakah $items tidak null sebelum melakukan perulangan
        if ($items) {
            foreach ($items as $item) {
                // Mengakses data barang dari relasi barang pada setiap item pesanan
                $barang = $item->barang;

                // Jika barang ditemukan, tambahkan informasi barang ke dalam item
                if ($barang) {
                    $item->kd_produk = $barang->kd_produk;
                    $item->quantity = $order->quantity; // Menggunakan quantity dari item pesanan, bukan dari pesanan itu sendiri
                    $item->harga_satuan = $barang->harga_satuan ?? 0; // Gunakan harga satuan dari barang dan handel jika tidak ada harga satuan
                    $item->subtotal = $item->quantity * $item->harga_satuan; // Menghitung subtotal per item
                    $subtotal += $item->subtotal; // Menambahkan subtotal item ke subtotal total
                }
            }
        } else {
            $items = []; // Inisialisasi $items sebagai array kosong jika null
        }

        // Set judul halaman
        $title = "Invoice #" . $invoiceNumber;

        // Mengirim data ke tampilan invoice.blade.php
        return view('customer-service.dashboard-invoice.invoice', [
            'title' => $title,
            'invoiceNumber' => $invoiceNumber,
            'invoiceDate' => $invoiceDate,
            'servedBy' => $servedBy,
            'items' => $items,
            'subtotal' => $subtotal,
        ]);
    } else {
        return "Order dengan nomor $orderNumber tidak ditemukan.";
        // Atau lakukan penanganan kesalahan lainnya sesuai kebutuhan
    }
}



    public function belumproses(Request $request)
    {
        $segment = $request->segment(1);
        // $orderan = Order::where('status', 'belum_proses')->get();

        $title = "CS / Belum Proses";

        $orderan = Order::where('status', 'belum_proses')
                    ->join('customers', 'orders.id_customer', '=', 'customers.id')
                    ->join('barangs', 'orders.id_produk', '=', 'barangs.id')
                    ->join('employees', 'orders.served_by', '=', 'employees.id')
                    ->join('juragans', 'orders.juragan', '=', 'juragans.id')
                    ->select('orders.*', 'customers.name as customer_name', 'customers.phone as customer_phone', 'barangs.kd_produk as kd_produk', 'juragans.name_juragan as juragan')
                    ->get();

        $dataa = Order::latest()->first();
        $statistics = $this->orderStatus();

        return view('customer-service.dashboard-invoice.belum-proses-orderan', [
            'status' => $statistics,
            'orderan' => $orderan,
            'data' => $dataa,
            'title' => 'Belum Proses'
        ]);
    }
    
    //sa
    public function belumprosesSA(Request $request)
    {
        $segment = $request->segment(1);
        // $orderan = Order::where('status', 'belum_proses')->get();
        $orderan = Order::where('status', 'belum_proses')
                    ->join('customers', 'orders.id_customer', '=', 'customers.id')
                    ->join('barangs', 'orders.id_produk', '=', 'barangs.id')
                    ->join('employees', 'orders.served_by', '=', 'employees.id')
                    ->join('juragans', 'orders.juragan', '=', 'juragans.id')
                    ->select('orders.*', 'customers.name as customer_name', 'customers.phone as customer_phone', 'barangs.kd_produk as kd_produk', 'juragans.name_juragan as juragan')
                    ->get();
        $statistics = $this->orderStatus();

        // Mengirim data ke view

        return view('super-admin.dashboard-invoice.belum-proses-orderan', [
            'orderan' => $orderan,
            'status' => $statistics,
            'title' => 'Orderan Belum Diproses'
        ]);
    }

    public function menunggudicek(Request $request)
    {
        $segment = $request->segment(1);
        // $orderan = Order::where('status', 'cek_pembayaran')->get();
        $orderan = Order::where('status', 'cek_pembayaran')
                    ->join('customers', 'orders.id_customer', '=', 'customers.id')
                    ->join('barangs', 'orders.id_produk', '=', 'barangs.id')
                    ->join('employees', 'orders.served_by', '=', 'employees.id')
                    ->join('juragans', 'orders.juragan', '=', 'juragans.id')
                    ->select('orders.*', 'customers.name as customer_name', 'customers.phone as customer_phone', 'barangs.kd_produk as kd_produk', 'juragans.name_juragan as juragan')
                    ->get();
        $statistics = $this->orderStatus();

            return view('customer-service.dashboard-invoice.menunggu-dicek-orderan', [
                'orderan' => $orderan,
                'status' => $statistics,
                'title' => 'Dalam proses'
            ]);

    }
    // superadmin
    public function menunggudiceksa(Request $request)
    {
        $segment = $request->segment(1);
        // $orderan = Order::where('status', 'cek_pembayaran')->get();
        $orderan = Order::where('status', 'cek_pembayaran')
                    ->join('customers', 'orders.id_customer', '=', 'customers.id')
                    ->join('barangs', 'orders.id_produk', '=', 'barangs.id')
                    ->join('employees', 'orders.served_by', '=', 'employees.id')
                    ->join('juragans', 'orders.juragan', '=', 'juragans.id')
                    ->select('orders.*', 'customers.name as customer_name', 'customers.phone as customer_phone', 'barangs.kd_produk as kd_produk', 'juragans.name_juragan as juragan')
                    ->get();
        $statistics = $this->orderStatus();

            return view('super-admin.dashboard-invoice.menunggu-dicek-orderan', [
                'orderan' => $orderan,
                'status' => $statistics,
                'title' => 'Dalam proses'
            ]);

    }

    public function dalamproses(Request $request)
    {
        // $segment = $request->segment(1);
        // $orderan = Order::where('status', 'dalam_proses')->get();
        // $statistics = $this->orderStatus();
        //     return view('customer-service.dashboard-invoice.dalam-proses-orderan', [
        //         'orderan' => $orderan,
        //         'status' => $statistics,
        //         'title' => 'Dalam proses'
        //     ]);
        
        $title = "CS / Dalam Proses";

        $orderan = Order::where('status', 'dalam_proses')
                    ->join('customers', 'orders.id_customer', '=', 'customers.id')
                    ->join('barangs', 'orders.id_produk', '=', 'barangs.id')
                    ->join('employees', 'orders.served_by', '=', 'employees.id')
                    ->join('juragans', 'orders.juragan', '=', 'juragans.id')
                    ->select('orders.*', 'customers.name as customer_name', 'customers.phone as customer_phone', 'barangs.kd_produk as kd_produk', 'juragans.name_juragan as juragan')
                    ->get();

        $dataa = Order::latest()->first();
        $statistics = $this->orderStatus();

        return view('customer-service.dashboard-invoice.dalam-proses-orderan', [
            'status' => $statistics,
            'orderan' => $orderan,
            'data' => $dataa,
            'title' => 'Belum Proses'
        ]);

    }
    // sa
    public function dalamprosesSA(Request $request)
    {
        $segment = $request->segment(1);
        // $orderan = Order::where('status', 'dalam_proses')->get();
        $orderan = Order::where('status', 'dalam_proses')
        ->join('customers', 'orders.id_customer', '=', 'customers.id')
        ->join('barangs', 'orders.id_produk', '=', 'barangs.id')
        ->join('employees', 'orders.served_by', '=', 'employees.id')
        ->join('juragans', 'orders.juragan', '=', 'juragans.id')
        ->select('orders.*', 'customers.name as customer_name', 'customers.phone as customer_phone', 'barangs.kd_produk as kd_produk', 'juragans.name_juragan as juragan')
        ->get();
        $statistics = $this->orderStatus();

            return view('super-admin.dashboard-invoice.dalam-proses-orderan', [
                'orderan' => $orderan,
                'status' => $statistics,
                'title' => 'Dalam proses'
            ]);
    }

    public function orderanselesai(Request $request)
    {
        $segment = $request->segment(1);
        // $orderan = Order::where('status', 'orderan_selesai')->get();
        // $dataa = Order::latest()->first();
        // $statistics = $this->orderStatus();
        $orderan = Order::where('status', 'orderan_selesai')
                    ->join('customers', 'orders.id_customer', '=', 'customers.id')
                    ->join('barangs', 'orders.id_produk', '=', 'barangs.id')
                    ->join('employees', 'orders.served_by', '=', 'employees.id')
                    ->join('juragans', 'orders.juragan', '=', 'juragans.id')
                    ->select('orders.*', 'customers.name as customer_name', 'customers.phone as customer_phone', 'barangs.kd_produk as kd_produk', 'juragans.name_juragan as juragan')
                    ->get();

        $dataa = Order::latest()->first();
        $statistics = $this->orderStatus();

        // Mengirim data ke view
        if ($segment === 'cs') {
            return view('customer-service.dashboard-invoice.orderan-selesai', [
                'orderan' => $orderan,
                'status' => $statistics,
                'title' => 'Orderan Selesai'
            ]);
        } elseif ($segment === 'super-admin') {
            return view('customer-service.dashboard-invoice.orderan-selesai', [
                'orderan' => $orderan,
                'status' => $statistics,
                'title' => 'Orderan Selesai'
            ]);
        }
    }
// sa
    public function orderanselesaiSA(Request $request)
    {
        $segment = $request->segment(1);
        // $orderan = Order::where('status', 'orderan_selesai')->get();
        $orderan = Order::where('status', 'orderan_selesai')
                    ->join('customers', 'orders.id_customer', '=', 'customers.id')
                    ->join('barangs', 'orders.id_produk', '=', 'barangs.id')
                    ->join('employees', 'orders.served_by', '=', 'employees.id')
                    ->join('juragans', 'orders.juragan', '=', 'juragans.id')
                    ->select('orders.*', 'customers.name as customer_name', 'customers.phone as customer_phone', 'barangs.kd_produk as kd_produk', 'juragans.name_juragan as juragan')
                    ->get();
        $dataa = Order::latest()->first();
        $statistics = $this->orderStatus();

            return view('super-admin.dashboard-invoice.orderan-selesai', [
                'orderan' => $orderan,
                'status' => $statistics,
                'title' => 'Orderan Selesai'
            ]);

    }

    public function show($id)
    {
        $data = Order::find($id); // Ganti 'Model' dengan nama model yang sesuai
        return view('customer-service.dashboard-invoice.semua-orderan', compact('data'));
    }

    public function edit(orderan $orderan)
    {
        //
    }


    //Reuseable order status
    public function orderStatus()
    {
        $statistics = [
            'jumlah_id' => Order::distinct('id')->count('id'),
            'belumProses' => Order::where('status', 'belum_proses')->count(),
            'menungguDicek' => Order::where('status', 'cek_pembayaran')->count(),
            'dalamProses' => Order::where('status', 'dalam_proses')->count(),
            'orderanSelesai' => Order::where('status', 'orderan_selesai')->count(),
        ];

        return $statistics;
    }

    public function uniqueFilter()
    {
        $orderan = Order::all();

        $uniquePaymentMethods = $orderan->pluck('payment_method')->unique();
        $uniqueStatus = $orderan->pluck('status')->unique();
        $uniqueCustomerName = $orderan->pluck('status')->unique();

        return [
            'uniquePaymentMethods' => $uniquePaymentMethods,
            'uniqueStatus' => $uniqueStatus,
            'uniqueCustomerName' => $uniqueCustomerName
        ];
    }

    public function destroy($id)
    {
        $deleteOrderan = new OrderanProcess;
        $deleteOrderan->deleteOrderan($id);

        return back()->with('success', 'Berhasil menghapus orderan');
    }
}
