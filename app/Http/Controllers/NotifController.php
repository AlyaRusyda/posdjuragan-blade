<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Notif;
use Illuminate\Support\Facades\Session;

class NotifController extends Controller
{

    public function index()
    {
        $search = request('search');

        // Menyimpan nilai pencarian dalam session
        Session::put('notif_search', $search);

        return view('admin.notif.list', [
            "title" => "Audio & Teks Notif",
            "search" => $search,
            "data_notif" => Notif::latest()->filter(['search' => $search])->paginate(7)->withQueryString()
        ]);
    }

    public function indexSuperadmin()
    {
        $search = request('search');

        // Menyimpan nilai pencarian dalam session
        Session::put('notif_search', $search);

        return view('super-admin.notif.list', [
            "title" => "Audio & Teks Notif",
            "search" => $search,
            "data_notif" => Notif::latest()->filter(['search' => $search])->paginate(7)->withQueryString()
        ]);
    }

    public function create()
    {
        // Tampilkan formulir pembuatan data baru
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'teks' => 'required',
            'audio' => 'required|mimes:mp3',
            'status' => 'required|in:active,non_active',
        ]);

        // Simpan data barang baru ke database
        try {
            Notif::create($validatedData);

            // Menghapus nilai pencarian dari session setelah barang ditambahkan
            Session::forget('notif_search');

            return redirect('/admin/notif')->with('success', 'Data Berhasil Ditambahkan!');
        } catch (\Exception $e) {
            return redirect('/admin/notif')->with('error', 'Data GAGAL Ditambahkan!. ' . $e->getMessage());
        }
    }

    public function edit()
    {
        // Tampilkan formulir pengeditan
        // ...
    }

    public function update(Request $request, $id)
    {
        // Validasi dan perbarui data
        // ...
    }

    public function destroy(Notif $notif)
    {
        Notif::destroy($notif->id);
        return redirect('/admin/notif')->with('success', 'Data Berhasil Dihapus!');
    }
}
