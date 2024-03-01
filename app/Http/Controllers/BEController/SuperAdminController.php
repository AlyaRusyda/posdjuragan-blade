<?php

namespace App\Http\Controllers\BEController;

use App\Models\Barang;
use App\Models\data_jasa_ekspedisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class SuperAdminController extends Controller
{
    public function APIsearch ($search)
    {
        $employes = Barang::where("nama", "like", "%".$search."%")->get();
        return response()->json($employes);
    }

    public function show_data_jasa_ekspedisi($search)
    {
        $data = data_jasa_ekspedisi::where("id_ekspedisi", "like", "%".$search."%")->get();
        return response()->json($data);
    }

    public function tambah_data_jasa_ekspedisi (Request $request) {
        $data = data_jasa_ekspedisi::create($request->all());
        if ($request->is('api/*') || $request->wantsJson())
        {
            return response()->json($data);
        } else {
            return redirect()->route('superadmin/data-ekpedisi');
        };
    }

    

}
