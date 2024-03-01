<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BEController\DataBarangProcess;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BarangController extends Controller
{
    public function indexCs()
    {
        $search = request('search');

        // Menyimpan nilai pencarian dalam session
        Session::put('barang_search', $search);

        return view('customer-service.data-barang.dataBarang', [
            "title" => "Data Barang",
            "data_barang" => Barang::latest()->filter(['search' => $search])->paginate(10)->withQueryString()
        ]);
    }

    public function indexAdmin()
    {
        $search = request('search');

        // Menyimpan nilai pencarian dalam session
        Session::put('barang_search', $search);

        return view('admin.data-barang.dataBarang', [
            "title" => "Data Barang",
            "data_barang" => Barang::latest()->filter(['search' => $search])->paginate(10)->withQueryString()
        ]);
    }

    public function indexSuperadmin()
    {
        $search = request('search');

        // Menyimpan nilai pencarian dalam session
        Session::put('barang_search', $search);

        return view('super-admin.data-barang.dataBarang', [
            "title" => "Data Barang",
            "data_barang" => Barang::latest()->filter(['search' => $search])->paginate(10)->withQueryString()
        ]);
    }

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // Mengambil nilai pencarian dari session dan melewatkan ke view
            view()->share('search', Session::get('barang_search'));

            return $next($request);
        });
    }

    public function store(Request $request){
        $createDataBarang = new DataBarangProcess;
        $hasil = $createDataBarang->addBarang($request);

        if($hasil){
            return redirect('cs/dataBarang');
        }else{
            return redirect('cs/dataBarang');
        }
    }
    public function createA(Request $request){
        $createDataBarang = new DataBarangProcess;
        $hasil = $createDataBarang->addBarang($request);

        if($hasil){
            return redirect('admin/dataBarang');
        }else{
            return redirect('admin/dataBarang');
        }
    }

    public function update(Request $request, $id){
        $udpateBarang = new DataBarangProcess;
        $udpateBarang->updateBarang($request, $id);

        return back()->with('success', 'Berhasil mengupdate Data Barang');
    }

    public function destroy(Request $request, $id){
        $deleteBarang = new DataBarangProcess;
        $deleteBarang->addBarang($request, $id);

        return back()->with('success', 'Berhasil menghapus Data Barang');
    }
}
