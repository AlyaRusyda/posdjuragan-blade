<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class PelangganController extends Controller
{
    /**
     * ganti view sesuai user, yang perlu diganti fungsi index show dan route web pada transaksi
     */
    public function index(Request $request)
    {
        // Get the authenticated CS user
        \Log::info('Headers: ', request()->header()); // Log all headers
        \Log::info('Token:', [$request->bearerToken()]);
        $csUser = Auth::user();
        \Log::info('Authenticated user:', [$csUser]);

        // Check if the CS user is authenticated
        // if (!$csUser) {
        //     // Redirect to the login page or return an error response
        //     return redirect()->route('login'); // Make sure the 'login' route is defined
        // }
        $search = $request->input('search');

        // Menyimpan nilai pencarian dalam session
        Session::put('pelanggan_search', $search);

        // Fetch data associated with the authenticated CS user's ID
        $data_pelanggan = Pelanggan::where('cs_id', '1')
            ->orderBy('id', 'asc')
            ->filter(['search' => $search])
            ->paginate(10)
            ->withQueryString();
        // Pass the data to the view
        return view('customer-service.data-pelanggan.dataPelanggan', [
            "title" => "Data Pelanggan",
            "data_pelanggan" => $data_pelanggan
        ]);
    }

    public function apiIndex(Request $request)
    {
        \Log::info('Headers: ', request()->header()); // Log all headers
        \Log::info('Token:', [$request->bearerToken()]);
        $user = auth()->user();
        \Log::info('Authenticated user:', [$user]);

        // Fetch data associated with the authenticated CS user's ID
        $data_pelanggan = Pelanggan::where('cs_id', $user->id)
            ->orderBy('id', 'asc')
            ->paginate(10);

        // Return the data as a JSON response
        return response()->json([
            'data_pelanggan' => $data_pelanggan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {
        $validator = Validator::make($request->all(), [
            'namaPelanggan' => 'required|string|max:255',
            'cs_id' => 'nullable|numeric',
            'email' => 'required|string|email|max:255|unique:pelanggan,email',
            'hp' => 'required|numeric|digits_between:10,12',
            'hp2' => 'nullable|numeric|digits_between:10,12',
            'alamat' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kodepos' => 'required|string',
            'tanggalRegistrasi' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors()->first()], 422);
        }

        $provinsiName = explode('|', $request->input('provinsi'))[1] ?? null;
        $kabupatenName = explode('|', $request->input('kota'))[1] ?? null;
        $kecamatanName = explode('|', $request->input('kecamatan'))[1] ?? null;

        $pelanggan = Pelanggan::create([
            'namaPelanggan' => $request->namaPelanggan,
            'cs_id' => $request->cs_id,
            'email' => $request->email,
            'hp' => $request->hp,
            'hp2' => $request->hp2,
            'alamat' => $request->alamat,
            'provinsi' => $provinsiName,
            'kota' => $kabupatenName,
            'kecamatan' => $kecamatanName,
            'kodepos' => $request->kodepos,
            'tanggalRegistrasi' => $request->tanggalRegistrasi,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function tambahPelanggan(Request $request)
    {
        $csid = $request->input('cs_id');
        $tanggalRegistrasi = now()->format('Y-m-d H:i:s');
        $namaPelanggan = $request->input('namaPelanggan');
        $hp = $request->input('hp');
        $hp1 = $request->input('hp2');
        $email = $request->input('email');
        $alamat = $request->input('alamat');
        $provinsiName = $request->input('provinsi');
        $kabupatenName = $request->input('kota');
        $kecamatanName = $request->input('kecamatan');
        $kodepos = $request->input('kodepos');

        $pelanggan = new Pelanggan;

        $pelanggan->cs_id = $csid;
        $pelanggan->namaPelanggan = $namaPelanggan;
        $pelanggan->tanggalRegistrasi = $tanggalRegistrasi;
        $pelanggan->hp = $hp;
        $pelanggan->hp2 = $hp1;
        $pelanggan->email = $email;
        $pelanggan->alamat = $alamat;
        $pelanggan->provinsi = $provinsiName;
        $pelanggan->kabupaten = $kabupatenName;
        $pelanggan->kecamatan = $kecamatanName;
        $pelanggan->kodepos = $kodepos;

        $pelanggan->save();

        return response()->json([
            'status' => 'success',
            'data' => $pelanggan,
        ], 200);
    }

    // public function store(Request $request)
    // {
    //     $pelanggan = Pelanggan::create([
    //         'namaPelanggan' => $request->namaPelanggan,
    //         'cs_id' => $request->cs_id,
    //         'email' => $request->email,
    //         'hp' => $request->hp,
    //         'hp2' => $request->hp2,
    //         'alamat' => $request->alamat,
    //         'provinsi' => $request->provinsiName,
    //         'kota' => $request->kabupatenName,
    //         'kecamatan' => $request->kecamatanName,
    //         'kodepos' => $request->kodepos,
    //         'tanggalRegistrasi' => $request->tanggalRegistrasi,
    //     ]);


    //     $validator = Validator::make($request->all(), $pelanggan);
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => false,
    //             'modal_close' => false,
    //             'message' => 'Data gagal ditambahkan. ' . $validator->errors()->first(),
    //             'data' => $validator->errors()
    //         ]);
    //     }

    //     $pelanggan = Pelanggan::create($request->all());
    //     return response()->json([
    //         'status' => 'success',
    //         'data' => $pelanggan,
    //     ], 200);
    // }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            abort(404); // Handle jika pelanggan tidak ditemukan
        }

        return view('customer-service.data-pelanggan.detailPelanggan', ['title' => 'Detail pelanggan'], compact('pelanggan'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::where('id', $id)->first();

        if ($pelanggan) {
            $csid = $request->input('cs_id');
            $tanggalRegistrasi = now()->format('Y-m-d H:i:s');
            $namaPelanggan = $request->input('namaPelanggan');
            $hp = $request->input('hp');
            $hp1 = $request->input('hp2');
            $email = $request->input('email');
            $alamat = $request->input('alamat');
            $provinsiName = $request->input('provinsi');
            $kabupatenName = $request->input('kota');
            $kecamatanName = $request->input('kecamatan');
            $kodepos = $request->input('kodepos');

            $pelanggan->cs_id = $csid;
            $pelanggan->namaPelanggan = $namaPelanggan;
            $pelanggan->tanggalRegistrasi = $tanggalRegistrasi;
            $pelanggan->hp = $hp;
            $pelanggan->hp2 = $hp1;
            $pelanggan->email = $email;
            $pelanggan->alamat = $alamat;
            $pelanggan->provinsi = $provinsiName;
            $pelanggan->kabupaten = $kabupatenName;
            $pelanggan->kecamatan = $kecamatanName;
            $pelanggan->kodepos = $kodepos;

            $pelanggan->save();

            return response()->json([
                'status' => 'success',
                'data' => $pelanggan,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Pelanggan tidak ditemukan',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
                'data' => null
            ]);
        }

        $deleted = $pelanggan->delete();

        return response()->json([
            'status' => 'success',
            'data' => $pelanggan,
        ], 200);
    }

    // Api test isi datapelanggan
    public function addPelangganData(request $request)
    {
        $validator = Validator::make($request->all(), [
            'namaPelanggan' => 'required|string|max:255',
            'cs_id' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:pelanggan,email',
            'hp' => 'required|numeric|digits_between:10,12',
            'hp2' => 'nullable|numeric|digits_between:10,12',
            'alamat' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kodepos' => 'required|string',
            'tanggalRegistrasi' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors()->first()], 422);
        }

        $provinsiName = explode('|', $request->input('provinsi'))[1] ?? null;
        $kabupatenName = explode('|', $request->input('kabupaten'))[1] ?? null;
        $kecamatanName = explode('|', $request->input('kecamatan'))[1] ?? null;

        $pelanggan = Pelanggan::create([
            'namaPelanggan' => $request->namaPelanggan,
            'cs_id' => $request->cs_id,
            'email' => $request->email,
            'hp' => $request->hp,
            'hp2' => $request->hp2,
            'alamat' => $request->alamat,
            'provinsi' => $provinsiName,
            'kabupaten' => $kabupatenName,
            'kecamatan' => $kecamatanName,
            'kodepos' => $request->kodepos,
            'tanggalRegistrasi' => $request->tanggalRegistrasi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'data' => [
                'Pelanggan' => $pelanggan,
            ],
        ], Response::HTTP_OK);
    }
}
