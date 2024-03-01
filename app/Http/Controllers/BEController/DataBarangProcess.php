<?php

namespace App\Http\Controllers\BEController;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DataBarangProcess extends Controller
{

    public function addBarang(Request $request) {
        // Validasi input form
        $this->validate($request, [
            'kd_produk' => 'required|unique:barangs,kd_produk',
            'nama' => 'required',
            'size' => 'required|in:S,M,L,XL,XXL',
            'harga_satuan' => 'required',
            'stock' => 'required',
            'img' => 'required',
            'video' => 'required',
            'point' => 'required',
        ]);

        $data = "";

        try {
            $data = $request->all();
            Barang::create($data);
            Session::forget('barang_search');

            // return response()->json(['success' => true, 'message' => 'Barang berhasil ditambahkan', 'data' => $data], 201);
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Error menambahkan barang: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan barang'
            ], 500);
        }

        return $data;
    }


    public function updateBarang(Request $request, $id)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'nama' => 'required',
            'size' => 'required|in:S,M,L,XL,XXL',
            'harga_satuan' => 'required',
            'stock' => 'required',
            'img' => 'required',
            'video' => 'required',
            'point' => 'required',
        ]);
        $data = "";
        $data = Barang::findOrFail($id);

        try {
            // Update data barang ke database
            $data->update($validatedData);

            return response()->json(['success' => true, 'message' => 'Barang berhasil diupdate', 'data' => $data], 201);
        } catch (\Exception $e) {
            // Log error untuk debugging
            \Log::error('Error menambahkan barang: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Barang gagal dirubah!!'
            ], 500);
        }
    }

    public function deleteBarang($id)
    {
        $data = Barang::find($id);

        if ($data) {
            // Menghapus data jika ditemukan
            $data->delete();
            // Mengembalikan response JSON untuk kasus sukses
            return response()->json([
                'success' => true,
                'message' => 'Data barang berhasil dihapus'
            ]);
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
