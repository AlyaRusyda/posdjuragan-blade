@extends('layouts.mainCS')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/request.css') }}">
@endsection

@section('konten')
    <div class="container-fluid p-4">
        {{-- body req edit --}}
        <div class="body-reqEdit flex-column p-4 " style=" border: 1.5px solid black; border-radius: 10px;">
            <form>
            {{-- info req --}}
            <div class="d-flex flex-row justify-content-between mb-4 gap-5" id="form-juragan">
                <div class="col">
                    <label for="opsi-juragan" class="label-order mb-0">Juragan</label>
                    <select class="form-select form-select-lg shadow" id="opsi-juragan">
                        <option selected>Pilih Juragan</option>
                        <option value="Korean Hunter">Korean Hunter</option>
                        <option value="Limited Shopping">Limited Shopping</option>
                    </select>
                </div>
                <div class="col">
                    <label for="opsi-orderan" class="label-order mb-0">Asal Orderan </label>
                    <select class="form-select form-select-lg shadow" id="opsi-orderan">
                        <option selected>Pilih asal</option>
                        <option value="1">Blibli</option>
                        <option value="2">Bukalapak</option>
                        <option value="3">Facebook</option>
                        <option value="4">Instagram</option>
                        <option value="5">Lazada</option>
                        <option value="6">Offline Store/COD</option>
                        <option value="7">OLX</option>
                        <option value="8">Shopee</option>
                        <option value="9">Tokopedia</option>
                        <option value="10">Web/App lain</option>
                        <option value="11">WhatsApp</option>
                        <option value="12">Zalora</option>
                    </select>
                </div>
                <div class="col">
                    <label for="opsi-cs" class="label-order mb-0">Dilayani Oleh</label>
                    <input type="text" class="form-control  rounded  shadow"
                    placeholder="Pilih CS" style="font-family: montserrat;" id="nama-cs">
                    {{-- <select class="form-select form-select-lg shadow" id="opsi-cs">
                        <option selected>CS ssf</option>
                    </select> --}}
                </div>
                <div class="col">
                    <label for="tanggal-order" class="label-order mb-0">Tanggal Order </label>
                    <input type="date" class="form-control form-control-lg input-custom shadow" id="tanggal-order" min="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>

            {{-- pelanggan --}}
            <div class="d-flex col-lg-6 flex-column mb-4">
                <label for="pelanggan" class="label-order mb-0">Pelanggan</label>
                <div class="input-group rounded bg-white shadow rounded" id="data-pelanggan">
                    <input type="text" class="form-control border-0 rounded m-1 text-capitalize text-muted"
                        placeholder="Cari Pelanggan" style="font-family: montserrat;" id="pelanggan">
                    <div class="d-flex align-items-center gap-1 mx-1">
                        <button class="btn btn-purple px-5 py-1 rounded" data-bs-toggle="modal"
                            data-bs-target="#modalSearch" type="button">Cari</button>
                    </div>
                </div>
            </div>

            {{-- keterangan --}}
            <div class="d-flex col-lg-8 flex-column mb-4" id="note-juragan">
                <label for="note" class="label-order">Note / Keterangan</label>
                <textarea class="form-control shadow rounded" name="form-keterangan" id="note" rows="10"
                    style="resize:none; white-space:pre-line;">
                </textarea>
            </div>

            {{-- tab order --}}
            <div class="shadow tab-order mb-4">
                <div class="border-0 d-flex align-items-center gap-1 ">
                    <div class="bg-white border-0 px-4 py-2 rounded-top label-order">Order</div>
                    <button class="btn p-0 border-0 rounded btn-add" type="button" data-bs-toggle="modal"
                        data-bs-target="#addOrder">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                            fill="none">
                            <path
                                d="M20.8183 16.904H16.6754V21.0468C16.6754 21.2666 16.5882 21.4773 16.4328 21.6327C16.2774 21.7881 16.0666 21.8754 15.8469 21.8754C15.6271 21.8754 15.4164 21.7881 15.261 21.6327C15.1056 21.4773 15.0183 21.2666 15.0183 21.0468V16.904H10.8754C10.6557 16.904 10.4449 16.8167 10.2896 16.6613C10.1342 16.5059 10.0469 16.2951 10.0469 16.0754C10.0469 15.8556 10.1342 15.6449 10.2896 15.4895C10.4449 15.3341 10.6557 15.2468 10.8754 15.2468H15.0183V11.104C15.0183 10.8842 15.1056 10.6735 15.261 10.5181C15.4164 10.3627 15.6271 10.2754 15.8469 10.2754C16.0666 10.2754 16.2774 10.3627 16.4328 10.5181C16.5882 10.6735 16.6754 10.8842 16.6754 11.104V15.2468H20.8183C21.0381 15.2468 21.2488 15.3341 21.4042 15.4895C21.5596 15.6449 21.6469 15.8556 21.6469 16.0754C21.6469 16.2951 21.5596 16.5059 21.4042 16.6613C21.2488 16.8167 21.0381 16.904 20.8183 16.904Z"
                                fill="#626262" />
                        </svg>
                    </button>
                </div>
                <div class="bg-white">
                    <div class="card px-3 border-0 mb-3">
                        <table class="table table-borderless mb-0" id="tabel-produk">
                            <thead class="text-center small border border-0 border-bottom ">
                                <tr>
                                    <th class="col py-3"></th>
                                    <th class="col py-3">Produk</th>
                                    <th class="col py-3">Harga</th>
                                    <th class="col py-3">Qty</th>
                                    <th class="col py-3">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody id="infoOrder">

                            </tbody>
                        </table>
                    </div>
                    <div id="btn-OB">
                        <div class="d-flex gap-3 mx-3">
                            <button class="btn btn-light px-4 py-2 btn-sm " data-bs-toggle="modal"
                                data-bs-target="#ModalOngkir">Ongkir</button>
                            <button class="btn btn-light btn-sm px-3 py-2" data-bs-toggle="modal"
                                data-bs-target="#Modalbiayalain">Biaya lain</button>
                        </div>
                    </div>
                    <div id="totalhargaOrder">
                        <div class="d-flex flex-row justify-content-between align-items-center p-3 mx-4">
                            <p class="fw-bold small">TOTAL</p>
                            <h5 class="fw-bold " style="color: #0091ff;" id="total-keseluruhan"></h5>
                        </div>
                    </div>
                    <div id="dance-chart">
                        <div class="d-flex justify-content-center py-5 mb-3 ">
                            <div id="shopping"
                                style="width: 100px; height: 100px; background: url('/assets/img/shopping.gif') lightgray 50% / cover no-repeat; background-blend-mode: luminosity;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div><button type="submit" class="btn btn-blue py-2 px-5" onclick="saveOrder()">Simpan</button></div>
            </form>
        </div>
    </div>

    {{-- daftar modal --}}

    {{-- Modal search pelanggan --}}
    <div class="modal fade" id="modalSearch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0 ">
                    <h5 class="modal-title ms-auto">Tambah Data Pemesanan</h5>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 py-0">
                    <div class="col-6 ms-auto mb-4"
                        style="box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.15); border-radius: 8px;">
                        <div class="input-group rounded border-0  ">
                            <input type="text" class="form-control form-control-lg input-custom border-0 "
                                placeholder="Cari Pelanggan" name="search" id="searchInput">
                            <button class="btn bg-white border-0 border" type="button" data-bs-dismiss="modal"
                                onclick="search()"><span><i class="fa-solid fa-magnifying-glass"
                                        style="color: #828282;"></i></span></button>
                        </div>
                    </div>
                    <form action="" id="formDataPelanggan">
                        <div class="mb-4 ">
                            <label for="nama-pelanggan" class="form-label label-order mb-1">Nama Pelanggan</label>
                            <input type="text" class="form-control form-control-lg  input-custom shadow"
                                id="nama-pelanggan" required>
                            <div class="invalid-feedback">
                                Masukkan nama pelanggan
                            </div>
                        </div>
                        <div class="d-flex row">
                            <div class="col-md-6 mb-2" id="tambah-hp-1">
                                <label for="hp-1" class="form-label label-order mb-1">HP 1</label>
                                <input type="telp" minlength="10" maxlength="13"
                                    class="form-control form-control-lg  input-custom shadow " id="hp-1"
                                    oninput="this.value = this.value.replace(/\D/g, '')" required>
                            </div>
                            <div class="col-md-6 mb-4 " id="tambah-hp-2">
                                <label for="hp-2" class="form-label label-order mb-1">HP 2 (Optional) </label>
                                <input type="telp" minlength="10" maxlength="13"
                                    class="form-control form-control-lg  input-custom shadow " id="hp-2"
                                    oninput="this.value = this.value.replace(/\D/g, '')">
                            </div>
                        </div>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" role="switch" id="COD" checked>
                            <label class="form-check-label" for="COD">COD</label>
                        </div>

                        <div class="d-none" id="switch-COD">
                            <div class="mb-4 ">
                                <label for="alamat" class="form-label label-order mb-1">Alamat</label>
                                <textarea type="text" class="form-control form-control-lg  input-custom shadow" id="alamat" rows="3"
                                    required></textarea>
                                <div class="invalid-feedback">
                                    Masukkan alamat
                                </div>
                            </div>

                            <div class="row d-flex">
                                <div class="col-md-6 mb-4">
                                    <label for="provinsi2" class="form-label label-order mb-1">Provinsi</label>
                                    <select class="form-select form-select-lg  shadow" id="provinsi1"
                                        onchange="loadKabupaten('kabupaten1', 'provinsi1')" required>
                                        <option value="">Pilih Provinsi</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan provinsi
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="kabupaten2" class="form-label label-order mb-1">Kab / kota</label>
                                    <select class="form-select form-select-lg  shadow" id="kabupaten1"
                                        onchange="loadKecamatan('kecamatan1', 'kabupaten1')" required>
                                        <option value="">Pilih Kab/ Kota</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan kota
                                    </div>
                                </div>
                            </div>

                            <div class="row d-flex mb-4">
                                <div class="col-md-6">
                                    <label for="kecamatan2" class="form-label label-order mb-1">Kecamatan</label>
                                    <select class="form-select form-select-lg  shadow" id="kecamatan1" required>
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan kecamatan
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <label for="kodepos2" class="form-label label-order mb-1">Kode Pos </label>
                                    <input type="number" class="form-control form-control-lg  input-custom shadow "
                                        maxlength="5" id="kodepos2" required>
                                    <div class="invalid-feedback">
                                        Masukkan kodepos
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center my-3 ">
                            <button type="button" class="btn btn-grey py-2  px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue py-2 px-5" data-bs-dismiss="modal">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal add pelanggan --}}
    <div class="modal fade" id="modaladdpelanggan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0 ">
                    <h5 class="modal-title ms-auto">Tambah Data pelanggan</h5>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 py-0">
                    <form action="" id="formDataPelanggan">
                        <div class="mb-4 ">
                            <label for="id-pelanggan" class="form-label label-order mb-1">ID Pelanggan</label>
                            <input type="text" class="form-control form-control-lg  input-custom shadow text-black "
                                value="ID12345678" id="id-pelanggan" readonly>
                        </div>
                        <div class="mb-4 ">
                            <label for="nama-pelanggan" class="form-label label-order mb-1">Nama Pelanggan</label>
                            <input type="text" class="form-control form-control-lg  input-custom shadow"
                                id="nama-pelanggan" required>
                            <div class="invalid-feedback">
                                Masukkan nama pelanggan
                            </div>
                        </div>

                        <div class="mb-4 ">
                            <label for="email-pelanggan" class="form-label label-order mb-1">Email Pelanggan</label>
                            <input type="email" class="form-control form-control-lg  input-custom shadow"
                                id="email-pelanggan" required>
                            <div class="invalid-feedback">
                                Masukkan email pelanggan
                            </div>
                        </div>
                        <div class="d-flex row">
                            <div class="col-md-6 mb-2" id="tambah-hp-1">
                                <label for="hp-1" class="form-label label-order mb-1">HP 1</label>
                                <input type="telp" minlength="10" maxlength="13"
                                    class="form-control form-control-lg  input-custom shadow " id="hp-1"
                                    oninput="this.value = this.value.replace(/\D/g, '')" required>
                            </div>
                            <div class="col-md-6 mb-4 " id="tambah-hp-2">
                                <label for="hp-2" class="form-label label-order mb-1">HP 2 (Optional) </label>
                                <input type="telp" minlength="10" maxlength="13"
                                    class="form-control form-control-lg  input-custom shadow " id="hp-2"
                                    oninput="this.value = this.value.replace(/\D/g, '')">
                            </div>
                        </div>
                        <div class="mb-4 ">
                            <label for="alamat" class="form-label label-order mb-1">Alamat</label>
                            <textarea type="text" class="form-control form-control-lg  input-custom shadow " id="alamat" rows="3"
                                required></textarea>
                            <div class="invalid-feedback">
                                Masukkan alamat
                            </div>
                        </div>

                        <div class="row d-flex">
                            <div class="col-md-6 mb-4">
                                <label for="provinsi2" class="form-label label-order mb-1">Provinsi</label>
                                <select class="form-select form-select-lg  shadow" id="provinsi2"
                                    onchange="loadKabupaten('kabupaten2', 'provinsi2')" required>
                                    <option value="">Pilih Provinsi</option>
                                </select>
                                <div class="invalid-feedback">
                                    Masukkan provinsi
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="kabupaten2" class="form-label label-order mb-1">Kab / kota</label>
                                <select class="form-select form-select-lg  shadow" id="kabupaten2"
                                    onchange="loadKecamatan('kecamatan2', 'kabupaten2')" required>
                                    <option value="">Pilih Kab/Kota</option>
                                </select>
                                <div class="invalid-feedback">
                                    Masukkan kota
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex mb-4">
                            <div class="col-md-6">
                                <label for="kecamatan2" class="form-label label-order mb-1">Kecamatan</label>
                                <select class="form-select form-select-lg  shadow" id="kecamatan2" required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                <div class="invalid-feedback">
                                    Masukkan kecamatan
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <label for="kodepos2" class="form-label label-order mb-1">Kode Pos </label>
                                <input type="number" class="form-control form-control-lg  input-custom shadow "
                                    maxlength="5" id="kodepos2" required>
                                <div class="invalid-feedback">
                                    Masukkan kodepos
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center my-3 ">
                            <button type="button" class="btn btn-grey py-2 px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue  py-2 px-5"
                                data-bs-dismiss="modal">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal not found -->
    <div class="modal fade" id="modalNotFound" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content ">
                <div class="modal-body m-2">
                    <div class="d-flex  justify-content-end ">
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class=" my-2 d-flex flex-column justify-content-center ">
                        <img src="{{ asset('assets/img/not-found.png') }}" alt="" width="120px"
                            class="mx-auto">
                        <p class="text-center fw-semibold py-3">Data tidak ditemukan</p>
                    </div>
                    <div class="d-flex justify-content-center my-2 ">
                        <button class="btn btn-purple px-3" data-bs-dismiss="modal" data-bs-toggle="modal"
                            data-bs-target="#modaladdpelanggan">Tambah data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Ongkir --}}
    <div class="modal fade" id="ModalOngkir" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0">
                    <h5 class="modal-title ms-auto">Biaya Ongkir</h5>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 py-0">
                    <form action="" id="formongkir">
                        <div class="mb-4 ">
                            <label for="ongkir-nominal" class="form-label h6 mb-1">Nominal</label>
                            <input type="number" class="form-control form-control-lg input-custom shadow"
                                id="ongkir-nominal" required>
                        </div>
                        <div class="mb-5 ">
                            <label for="jasa-ongkir" class="form-label h6 mb-1">Label</label>
                            <input type="text" class="form-control form-control-lg input-custom shadow"
                                id="jasa-ongkir" placeholder="Jasa Exspedisi" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <button type="button" class="btn btn-grey py-2  px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue py-2 px-5" data-bs-dismiss="modal"
                                onclick="tambahongkir()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit Ongkir --}}
    <div class="modal fade" id="ModalEditOngkir" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0">
                    <h5 class="modal-title ms-auto">Edit Biaya Ongkir</h5>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 py-0">
                    <form action="" id="formongkir">
                        <div class="mb-4 ">
                            <label for="edit-ongkir-nominal" class="form-label h6 mb-1">Nominal</label>
                            <input type="number" class="form-control form-control-lg input-custom shadow"
                                id="edit-ongkir-nominal" required>
                        </div>
                        <div class="mb-5 ">
                            <label for="edit-jasa-ongkir" class="form-label h6 mb-1">Label</label>
                            <input type="text" class="form-control form-control-lg input-custom shadow"
                                id="edit-jasa-ongkir" placeholder="Jasa Exspedisi" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <button type="button" class="btn btn-grey py-2  px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue py-2 px-5" data-bs-dismiss="modal"
                                onclick="editongkir()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Addcost --}}
    <div class="modal fade" id="Modalbiayalain" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0">
                    <h5 class="modal-title ms-auto">Biaya Lain-Lain</h5>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 py-0">
                    <form action="" id="formbiayalain">
                        <div class="mb-3 ">
                            <label for="costnominal" class="form-label h6 mb-1">Nominal</label>
                            <input type="number" class="form-control form-control-lg input-custom shadow mb-2"
                                id="costnominal" required>
                            <div class="small">Gunakan tanda (-) untuk mengurangi. <br>misal untuk diskon : -20000</div>
                        </div>
                        <div class="mb-5 ">
                            <label for="addcostlabel" class="form-label h6 mb-1">Label</label>
                            <input type="text" class="form-control form-control-lg input-custom shadow"
                                id="addcostlabel" placeholder="Label biaya - Opsional (max 20 karakter)" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3 ">
                            <button type="button" class="btn btn-grey py-2 px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue px-5 py=2" data-bs-dismiss="modal"
                                onclick="tambahcost()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit Cost --}}
    <div class="modal fade" id="ModalEditbiayalain" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0">
                    <h5 class="modal-title ms-auto">Edit Biaya Lain-Lain</h5>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 py-0">
                    <form action="" id="formbiayalain">
                        <div class="mb-3 ">
                            <label for="edit-costnominal" class="form-label h6 mb-1">Nominal</label>
                            <input type="number" class="form-control form-control-lg input-custom shadow mb-2"
                                id="edit-costnominal" required>
                            <div class="small">Gunakan tanda (-) untuk mengurangi. <br>misal untuk diskon : -20000</div>
                        </div>
                        <div class="mb-5 ">
                            <label for="edit-costlabel" class="form-label h6 mb-1">Label</label>
                            <input type="text" class="form-control form-control-lg input-custom shadow"
                                id="edit-costlabel" placeholder="Label biaya - Opsional (max 20 karakter)" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3 ">
                            <button type="button" class="btn btn-grey py-2 px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue px-5 py=2" data-bs-dismiss="modal"
                                onclick="editcost()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal add order --}}
    <div class="modal fade " id="addOrder" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0">
                    <h5 class="modal-title ms-auto ">Tambah Data Order</h5>
                    <button type="button" class="btn-close ms-auto " data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 py-0">
                    <div class="d-flex flex-row justify-content-between gap-4  mb-4">
                        <div class="col">
                            <label for="kp" class="form-label label-order mb-1">Kode produk</label>
                            <select class="form-select shadow" id="kp">
                                <option selected>Masukkan kode</option>
                                <option value="BK-01">BK-01(celana)</option>
                                <option value="BK-02">BK-02(blazer)</option>
                                <option value="BK-03">BK-03(jas req)</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="hargasatuan" class="form-label label-order mb-1">Harga Satuan</label>
                            <input type="number" class="form-control input-custom shadow" id="hargasatuan">
                        </div>
                        <div class="col ">
                            <label for="ukuran" class="form-label label-order mb-1">Ukuran</label>
                            <select class="form-select shadow" id="ukuran">
                                <option selected disabled>Pilih Ukuran</option>
                                <option value="1" class="fw-bold" disabled>Atasan</option>
                                <option value="2">S</option>
                                <option value="3">M</option>
                                <option value="4">L</option>
                                <option value="5">XL</option>
                                <option value="6">XXL</option>
                                <option value="7">XXXL</option>
                                <option value="8">Custom</option>
                          
                            
                                <option value="9" class="fw-bold" disabled>Bawahan</option>
                                <option value="10">S</option>
                                <option value="11">M</option>
                                <option value="12">L</option>
                                <option value="13">XL</option>
                                <option value="14">XXL</option>
                                <option value="15">XXXL</option>
                                <option value="16">Custom</option>
                           
                            </select>
                        </div>
                        <div class="col">
                            <label for="qty" class="form-label label-order mb-1">QTY</label>
                            <input type="number" class="form-control input-custom shadow " id="qty">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 m-3 gap-3 py-0 ">
                    <button type="button" class="btn btn-grey py-2 px-5" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-blue py-2 px-5 " data-bs-dismiss="modal"
                        onclick="tambahpesanan()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL edit order --}}
    <div class="modal fade " id="editOrder" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0">
                    <h5 class="modal-title ms-auto ">Edit Data Order</h5>
                    <button type="button" class="btn-close ms-auto " data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 py-0">
                    <div class="d-flex flex-row justify-content-between gap-4">
                        <div class="col">
                            <label for="edit-kp" class="form-label label-order mb-1">Kode produk</label>
                            <select class="form-select shadow" id="edit-kp">
                                <option selected>Masukkan Kode</option>
                                <option value="BK-01">BK-01(celana)</option>
                                <option value="BK-02">BK-02(blazer)</option>
                                <option value="BK-03">BK-03(jas req)</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="edit-hargasatuan" class="form-label label-order mb-1">Harga Satuan</label>
                            <input type="number" class="form-control input-custom shadow" id="edit-hargasatuan">
                        </div>
                        <div class="col ">
                            <label for="edit-ukuran" class="form-label label-order mb-1">Ukuran</label>
                            <select class="form-select shadow" id="edit-ukuran">
                                <option selected>Pilih Ukuran</option>
                                <option value="1" class="fw-bold ">Atasan</option>
                                <option value="2">S</option>
                                <option value="3">M</option>
                                <option value="4">L</option>
                                <option value="5">XL</option>
                                <option value="6">XXL</option>
                                <option value="7">XXXL</option>
                                <option value="8">Custom</option>
                                <option value="9" class="fw-bold ">Bawahan</option>
                                <option value="10">S</option>
                                <option value="11">M</option>
                                <option value="12">L</option>
                                <option value="13">XL</option>
                                <option value="14">XXL</option>
                                <option value="15">XXXL</option>
                                <option value="16">Custom</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="edit-qty" class="form-label label-order mb-1">QTY</label>
                            <input type="number" class="form-control input-custom shadow " id="edit-qty">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 m-3 gap-3 py-0 ">
                    <button type="button" class="btn btn-grey py-2 px-5"data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-blue px-5 " data-bs-dismiss="modal"
                        onclick="editpesanan()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete Order-->
    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm " role="document">
            <div class="modal-content ">
                <div class="my-5">
                    <div class="d-flex flex-column justify-content-center ">
                        <img src="{{ asset('assets/img/confirm.png') }}" alt="" width="120px" class="mx-auto">
                        <p class="fw-bold text-center my-3">Yakin Hapus Data ?</p>
                    </div>
                    <div class="d-flex justify-content-center gap-3">
                        <button class="btn btn-blue" id="btn-ya" data-bs-dismiss="modal"
                            onclick="hapusToko()">Ya</button>
                        <button class="btn btn-red " data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Delete Ongkir --}}
    <div class="modal fade" id="ModalDeleteOngkir" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm " role="document">
            <div class="modal-content ">
                <div class="my-5">
                    <div class="d-flex flex-column justify-content-center ">
                        <img src="{{ asset('assets/img/confirm.png') }}" alt="" width="120px" class="mx-auto">
                        <p class="fw-bold text-center my-3">Yakin Hapus Data ?</p>
                    </div>
                    <div class="d-flex justify-content-center gap-3">
                        <button class="btn btn-blue" id="btn-ya-ongkir" data-bs-dismiss="modal"
                            onclick="hapusongkir()">Ya</button>
                        <button class="btn btn-red " data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Delete Biaya lain --}}
    <div class="modal fade" id="ModalDeleteBiayalain" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm " role="document">
            <div class="modal-content ">
                <div class="my-5">
                    <div class="d-flex flex-column justify-content-center ">
                        <img src="{{ asset('assets/img/confirm.png') }}" alt="" width="120px" class="mx-auto">
                        <p class="fw-bold text-center my-3">Yakin Hapus Data ?</p>
                    </div>
                    <div class="d-flex justify-content-center gap-3">
                        <button class="btn btn-blue" id="btn-ya-biayalain" data-bs-dismiss="modal"
                            onclick="hapusbiayalain()">Ya</button>
                        <button class="btn btn-red " data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- modal modal notifikasi --}}
    {{-- berhasil tambah data --}}
    <div class="modal fade" id="suksesModal" tabindex="-1" role="dialog" data-bs-backdrop="false">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body py-4">
                    <div class="d-flex flex-row  justify-content-evenly align-items-center ">
                        <img src="{{ asset('assets/img/sukses.png') }}" alt="" width="55px">
                        <p class="fw-bolder text-center m-0">Data <span class="text-success ">Berhasil</span>
                            ditambahkan!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- berhasil edit data --}}
    <div class="modal fade" id="suksesModalEdit" tabindex="-1" role="dialog" data-bs-backdrop="false">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body py-4">
                    <div class="d-flex flex-row  justify-content-evenly align-items-center ">
                        <img src="{{ asset('assets/img/sukses.png') }}" alt="" width="55px">
                        <p class="fw-bolder text-center m-0">Data <span class="text-success ">Berhasil</span> diedit!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- berhasil hapus data --}}
    <div class="modal fade" id="suksesModalHapus" tabindex="-1" role="dialog" data-bs-backdrop="false">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body py-4">
                    <div class="d-flex flex-row  justify-content-evenly align-items-center ">
                        <img src="{{ asset('assets/img/sukses.png') }}" alt="" width="55px">
                        <p class="fw-bolder text-center m-0">Data <span class="text-success ">Berhasil</span> dihapus!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- gagal Modal -->
    {{-- gagal modal tambah --}}
    <div class="modal fade" id="erorModal" tabindex="-1" role="dialog" data-bs-backdrop="false">
        <div class="modal-dialog modal-sm " role="document">
            <div class="modal-content ">
                <div class="modal-body px-0">
                    <div class="d-flex flex-row  justify-content-evenly align-items-center  ">
                        <img src="{{ asset('assets/img/gagal.png') }}" alt="" height="55px" class="my-2">
                        <div class="d-flex flex-column ">
                            <p class="fw-bold text-start m-0">Data <span class="text-danger">Gagal</span> ditambah!</p>
                            <span class="text-danger text-center  small">Eror : message!!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- gagal modal edit --}}
    <div class="modal fade" id="erorModalEdit" tabindex="-1" role="dialog" data-bs-backdrop="false">
        <div class="modal-dialog modal-sm " role="document">
            <div class="modal-content ">
                <div class="modal-body px-0">
                    <div class="d-flex flex-row  justify-content-evenly align-items-center  ">
                        <img src="{{ asset('assets/img/gagal.png') }}" alt="" height="55px" class="my-2">
                        <div class="d-flex flex-column ">
                            <p class="fw-bold text-start m-0">Data <span class="text-danger">Gagal</span> diedit!</p>
                            <span class="text-danger text-center  small">Eror : message!!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- gagal modal hapus --}}
    <div class="modal fade" id="erorModalHapus" tabindex="-1" role="dialog" data-bs-backdrop="false">
        <div class="modal-dialog modal-sm " role="document">
            <div class="modal-content ">
                <div class="modal-body px-0">
                    <div class="d-flex flex-row  justify-content-evenly align-items-center  ">
                        <img src="{{ asset('assets/img/gagal.png') }}" alt="" height="55px" class="my-2">
                        <div class="d-flex flex-column ">
                            <p class="fw-bold text-start m-0">Data <span class="text-danger">Gagal</span> dihapus!</p>
                            <span class="text-danger text-center  small">Eror : message!!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        // Fungsi untuk menambahkan alamat Provinsi, Kabupaten dan Kecamatan
        loadProvinsi('provinsi1');
        loadProvinsi('provinsi2');

        // Fungsi untuk memuat data provinsi
        function loadProvinsi(selectId) {
            var provinsiSelect = document.getElementById(selectId);
            fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi')
                .then(response => response.json())
                .then(data => {
                    data.provinsi.forEach(provinsi => {
                        var option = document.createElement('option');
                        option.value = provinsi.id;
                        option.text = provinsi.nama;
                        provinsiSelect.add(option);
                    });
                });
        }


        // Fungsi untuk memuat data kabupaten/kota
        function loadKabupaten(selectId, provinsiSelectId) {
            var kabupatenSelect = document.getElementById(selectId);
            kabupatenSelect.innerHTML = '<option value="">Pilih Kab/Kota</option>';

            var selectedProvinsi = document.getElementById(provinsiSelectId).value;
            if (selectedProvinsi) {
                fetch(`https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${selectedProvinsi}`)
                    .then(response => response.json())
                    .then(data => {
                        data.kota_kabupaten.forEach(kabupaten => {
                            var option = document.createElement('option');
                            option.value = kabupaten.id;
                            option.text = kabupaten.nama;
                            kabupatenSelect.add(option);
                        });
                    });
            }
        }


        // Fungsi untuk memuat data kecamatan
        function loadKecamatan(selectId, kabupatenSelectId) {
            var kecamatanSelect = document.getElementById(selectId);
            kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

            var selectedKabupaten = document.getElementById(kabupatenSelectId).value;
            if (selectedKabupaten) {
                fetch(`https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=${selectedKabupaten}`)
                    .then(response => response.json())
                    .then(data => {
                        data.kecamatan.forEach(kecamatan => {
                            var option = document.createElement('option');
                            option.value = kecamatan.id;
                            option.text = kecamatan.nama;
                            kecamatanSelect.add(option);
                        });
                    });
            }
        }
    </script>

    <script>
        // Fungsi pada switch button COD
        // Mendapatkan elemen tombol switch
        var switchButton = document.getElementById('COD');

        // Mendapatkan elemen yang akan disembunyikan
        var hiddenComponents = document.getElementById('switch-COD');

        // Menambahkan event listener untuk merespons perubahan pada tombol switch
        switchButton.addEventListener('change', function() {
            // Jika tombol switch aktif, sembunyikan elemen yang diberi ID 'hiddenComponents'
            if (this.checked) {
                hiddenComponents.classList.add('d-none');
            } else {
                hiddenComponents.classList.remove('d-none');
            }
        });

        (function() {
            'use strict';

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        event.preventDefault();
                        tambahAdmin();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        })();


        // Fungsi untuk memunculkan notifikasi modal
        // fungsi untuk menampilkan modal Sukses Delete
        function showSuksesModalDelete() {
            $('#suksesModalHapus').modal('show');
            setTimeout(function() {
                $('#suksesModalHapus').modal('hide');
            }, 1200);
        }
        // fungsi untuk menampilkan modal Error Delete
        function showErorModalDelete() {
            $('#erorModalHapus').modal('show');
            setTimeout(function() {
                $('#erorModalHapus').modal('hide');
            }, 1200);
        }
        // fungsi untuk menampilkan notif sukses menyimpan data
        function showSuksesModalSave() {
            $('#suksesModal').modal('show');
            setTimeout(function() {
                $('#suksesModal').modal('hide');
            }, 1200);
        }
        // fungsi untuk menampilkan notif gagal menyimpan data
        function showErorModalSave() {
            $('#erorModal').modal('show');
            setTimeout(function() {
                $('#erorModal').modal('hide');
            }, 1200);
        }
        // fungsi untuk menampilkan jika data berhasil diedit
        function showSuksesModalEdit() {
            $('#suksesModalEdit').modal('show');
            setTimeout(() => {
                $('#suksesModalEdit').modal('hide')
            }, 1200);
        }
        // fungsi untuk menampilkan jika data gagal diedit
        function showErorModalEdit() {
            $('#erorModalEdit').modal('show');
            setTimeout(() => {
                $('#erorModalEdit').modal('hide')
            }, 1200);
        }

        // fungsi cari data
        function search() {
            var gagal = true; // ganti dengan logika yang sesuai

            if (gagal) {
                $('#modalNotFound').modal('show');
            } else {
                // isi dengan data sesuai pencarian
            }

        }

        // fungsi untuk menyimpan data
        function saveOrder() {
            // Logika untuk menambah Save
            var berhasil = true; // Ganti dengan logika sesuai kebutuhan

            if (berhasil) {
                showSuksesModalSave();
            } else {
                showErorModalSave();
            }
        }
    </script>

    <script>
        // Fungsi fungsi untuk tambah, edit dan hapus orderan
        // Fungsi fungsi pada tabel tambah orderan
        $(document).ready(function() {
            $('.opsi').hide();
            $('#infoOrder').hide();
            $('#btn-OB').hide();
            $('#totalhargaOrder').hide();
            $('#totalongkir').hide();
            $('#totaladdcost').hide();

        });

        // Fungsi tombol tambah orderan
        var editedRows = [];

        function tambahpesanan() {
            var kodeProduk = document.getElementById('kp').value;
            var hargaSatuan = document.getElementById('hargasatuan').value;
            var ukuran = document.getElementById('ukuran').value;
            var qty = document.getElementById('qty').value;
            let subtotal = hargaSatuan * qty;

            if (kodeProduk && hargaSatuan && qty && subtotal && ukuran) {
                var table = document.getElementById('tabel-produk');
                var newRow = table.insertRow(-1);

                // Menambahkan ikon pada cell index ke-0
                var cell0 = newRow.insertCell(0);
                var iconContainer = document.createElement('div');
                iconContainer.innerHTML = '<a class="me-3" data-bs-toggle="modal" data-bs-target="#editOrder">' +
                    '<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                    '<path d="M4.92648 14.3165H1.2395C1.07652 14.3165 0.920223 14.2517 0.804982 14.1365C0.689742 14.0212 0.625 13.8649 0.625 13.702V10.2695C0.625 10.1888 0.640894 10.1089 0.671776 10.0343C0.702657 9.95978 0.747921 9.89204 0.804983 9.83498L10.0224 0.617482C10.1377 0.502241 10.294 0.4375 10.457 0.4375C10.6199 0.4375 10.7762 0.502241 10.8915 0.617482L14.3239 4.04995C14.4392 4.16519 14.5039 4.32149 14.5039 4.48446C14.5039 4.64744 14.4392 4.80374 14.3239 4.91898L4.92648 14.3165Z" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>' +
                    '<path d="M8 2.64062L12.3015 6.94212" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>' +
                    '</svg>' +
                    '</a>' +
                    '<a class="ms-1" data-bs-toggle="modal" data-bs-target="#ModalDelete">' +
                    '<svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                    '<path d="M14.5457 3.10601H12.1032V2.69971C12.1032 2.12809 11.9234 1.71371 11.56 1.46084C11.3033 1.29509 10.985 1.21094 10.6148 1.21094H7.87742C7.87529 1.21094 7.87359 1.21221 7.87147 1.21221C7.86934 1.21221 7.86764 1.21094 7.86552 1.21094H7.47919C6.51912 1.21094 5.99042 1.73964 5.99042 2.69971V3.10601H3.54922C3.46468 3.10601 3.38361 3.1396 3.32383 3.19937C3.26405 3.25915 3.23047 3.34022 3.23047 3.42476C3.23047 3.5093 3.26405 3.59038 3.32383 3.65015C3.38361 3.70993 3.46468 3.74351 3.54922 3.74351H3.82419L4.65124 14.7021C4.65124 15.3953 5.05287 15.7927 5.75369 15.7927H12.3246C13.0093 15.7927 13.4113 15.3974 13.4262 14.7259L14.2537 3.74351H14.5452C14.5871 3.74354 14.6286 3.73532 14.6672 3.71933C14.7059 3.70334 14.7411 3.67988 14.7707 3.6503C14.8003 3.62072 14.8238 3.5856 14.8399 3.54694C14.8559 3.50828 14.8642 3.46683 14.8642 3.42497C14.8642 3.38312 14.856 3.34166 14.84 3.30298C14.824 3.2643 14.8006 3.22914 14.771 3.19952C14.7414 3.1699 14.7063 3.1464 14.6676 3.13036C14.629 3.11431 14.5875 3.10604 14.5457 3.10601ZM13.5673 4.37081H4.51099L4.46382 3.74351H13.6145L13.5673 4.37081ZM6.62834 2.69971C6.62834 2.09494 6.87484 1.84844 7.47962 1.84844H10.6153C10.8609 1.84844 11.0628 1.89816 11.2056 1.98996C11.3811 2.11194 11.4661 2.34399 11.4661 2.69971V3.10601H6.62834V2.69971ZM12.79 14.6949C12.7819 15.0392 12.6646 15.1552 12.3246 15.1552H5.75369C5.40604 15.1552 5.28874 15.0409 5.28789 14.6779L4.55902 5.00789H13.5189L12.79 14.6949Z" fill="#333333"/>' +
                    '<path d="M7.94426 5.51305C7.90245 5.51453 7.86134 5.52424 7.82328 5.54162C7.78523 5.559 7.75097 5.58371 7.72247 5.61434C7.69397 5.64497 7.67179 5.68092 7.65720 5.72013C7.64260 5.75934 7.63588 5.80104 7.63741 5.84285L7.93661 14.0683C7.93958 14.1507 7.97435 14.2287 8.03363 14.286C8.09290 14.3433 8.17207 14.3754 8.25451 14.3756L8.26641 14.3752C8.30822 14.3737 8.34933 14.3640 8.38739 14.3466C8.42545 14.3292 8.45971 14.3045 8.48820 14.2739C8.51670 14.2432 8.53888 14.2073 8.55348 14.1681C8.56807 14.1289 8.57480 14.0872 8.57326 14.0454L8.27449 5.81948C8.26811 5.64353 8.12446 5.49775 7.94426 5.51305ZM5.96844 5.51348C5.88413 5.51936 5.80562 5.55848 5.75015 5.62224C5.69468 5.68600 5.66680 5.76917 5.67264 5.85348L6.23746 14.0789C6.24295 14.1594 6.27879 14.2348 6.33772 14.2898C6.39665 14.3449 6.47428 14.3755 6.55494 14.3756L6.57746 14.3747C6.66177 14.3688 6.74028 14.3297 6.79575 14.2660C6.85122 14.2022 6.87910 14.1190 6.87326 14.0347L6.30844 5.80928C6.30190 5.72523 6.26260 5.64711 6.19899 5.59177C6.13539 5.53644 6.05259 5.50832 5.96844 5.51348ZM10.12660 5.51305C9.94856 5.49605 9.80279 5.64395 9.79684 5.81990L9.49721 14.0454C9.49562 14.0872 9.50230 14.1289 9.51688 14.1681C9.53145 14.2074 9.55363 14.2433 9.58214 14.2740C9.61065 14.3046 9.64493 14.3293 9.68301 14.3467C9.72110 14.3641 9.76223 14.3737 9.80406 14.3752L9.81596 14.3756C9.89840 14.3754 9.97757 14.3433 10.03680 14.2860C10.09610 14.2287 10.13090 14.1507 10.13390 14.0683L10.43350 5.84285C10.43510 5.80103 10.42840 5.75930 10.41380 5.72007C10.39920 5.68083 10.37710 5.64487 10.34860 5.61422C10.32000 5.58358 10.28580 5.55887 10.24770 5.54151C10.20960 5.52415 10.16850 5.51448 10.12660 5.51305ZM12.10250 5.51348C12.01830 5.50843 11.93560 5.53659 11.87200 5.59190C11.80840 5.64722 11.76910 5.72527 11.76250 5.80928L11.19760 14.0347C11.19180 14.1190 11.21970 14.2022 11.27510 14.2660C11.33060 14.3297 11.40910 14.3688 11.49340 14.3747L11.51600 14.3756C11.59660 14.3754 11.67420 14.3448 11.73310 14.2897C11.79200 14.2347 11.82780 14.1594 11.83340 14.0789L12.39830 5.85348C12.40410 5.76917 12.37620 5.68600 12.32080 5.62224C12.26530 5.55848 12.18680 5.51936 12.10250 5.51348Z" fill="#333333"/>' +
                    '</svg></a>'; // menambahkan icon trash dan edit untuk edit data order

                cell0.appendChild(iconContainer);

                var cell1 = newRow.insertCell(1);
                var cell2 = newRow.insertCell(2);
                var cell3 = newRow.insertCell(3);
                var cell4 = newRow.insertCell(4);

                cell1.innerHTML = kodeProduk;
                cell2.innerHTML = hargaSatuan;
                cell3.innerHTML = qty;
                cell4.innerHTML = subtotal;

                $('#dance-chart').hide();
                $('#btn-OB').show();
                $('#totalhargaOrder').show();

                editedRows.push(newRow);
                showSuksesModalSave();
                hitungTotal();
            } else {
                showErorModalSave();
            }
        }

        // Fungsi untuk menghapus data orderan
        var yaButton = document.getElementById('btn-ya');
        yaButton.addEventListener('click', function() {
            if (editedRows.length > 0) {
                var lastEditedRow = editedRows.pop()
                lastEditedRow.remove();
                hitungTotal();
                showSuksesModalDelete();
            } else {
                showErorModalDelete();
            }

        });

        // Fungsi untuk mengedit data orderan
        function editpesanan() {
            var kodeProdukBaru = document.getElementById('edit-kp').value;
            var hargaSatuanBaru = document.getElementById('edit-hargasatuan').value;
            var ukuranBaru = document.getElementById('edit-ukuran').value;
            var qtyBaru = document.getElementById('edit-qty').value;
            let subtotal = hargaSatuanBaru * qtyBaru;

            var lastEditedRow = editedRows[editedRows.length - 1];

            if (lastEditedRow && lastEditedRow.cells && lastEditedRow.cells.length >= 5) {
                lastEditedRow.cells[1].innerHTML = kodeProdukBaru;
                lastEditedRow.cells[2].innerHTML = hargaSatuanBaru;
                lastEditedRow.cells[3].innerHTML = qtyBaru;
                lastEditedRow.cells[4].innerHTML = subtotal;

                hitungTotal();
                $('#editOrder').modal('hide');
                showSuksesModalEdit();
            } else {
                showErorModalEdit();
            }

        }

        // Fungsi untuk menambah ongkir
        var editedrowsongkir = [];

        function tambahongkir() {
            var nominal = document.getElementById('ongkir-nominal').value;
            var ongkir = document.getElementById('jasa-ongkir').value;
            var table = document.getElementById('tabel-produk');

            if (nominal && ongkir) {
                var newRow = table.insertRow(-1);
                var cell0 = newRow.insertCell(0);
                var iconContainer = document.createElement('div');
                iconContainer.innerHTML = '<a class="me-3" data-bs-toggle="modal" data-bs-target="#ModalEditOngkir">' +
                    '<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                    '<path d="M4.92648 14.3165H1.2395C1.07652 14.3165 0.920223 14.2517 0.804982 14.1365C0.689742 14.0212 0.625 13.8649 0.625 13.702V10.2695C0.625 10.1888 0.640894 10.1089 0.671776 10.0343C0.702657 9.95978 0.747921 9.89204 0.804983 9.83498L10.0224 0.617482C10.1377 0.502241 10.294 0.4375 10.457 0.4375C10.6199 0.4375 10.7762 0.502241 10.8915 0.617482L14.3239 4.04995C14.4392 4.16519 14.5039 4.32149 14.5039 4.48446C14.5039 4.64744 14.4392 4.80374 14.3239 4.91898L4.92648 14.3165Z" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>' +
                    '<path d="M8 2.64062L12.3015 6.94212" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>' +
                    '</svg>' +
                    '</a>' +
                    '<a  class="ms-1" data-bs-toggle="modal" data-bs-target="#ModalDeleteOngkir">' +
                    '<svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                    '<path d="M14.5457 3.10601H12.1032V2.69971C12.1032 2.12809 11.9234 1.71371 11.56 1.46084C11.3033 1.29509 10.985 1.21094 10.6148 1.21094H7.87742C7.87529 1.21094 7.87359 1.21221 7.87147 1.21221C7.86934 1.21221 7.86764 1.21094 7.86552 1.21094H7.47919C6.51912 1.21094 5.99042 1.73964 5.99042 2.69971V3.10601H3.54922C3.46468 3.10601 3.38361 3.1396 3.32383 3.19937C3.26405 3.25915 3.23047 3.34022 3.23047 3.42476C3.23047 3.5093 3.26405 3.59038 3.32383 3.65015C3.38361 3.70993 3.46468 3.74351 3.54922 3.74351H3.82419L4.65124 14.7021C4.65124 15.3953 5.05287 15.7927 5.75369 15.7927H12.3246C13.0093 15.7927 13.4113 15.3974 13.4262 14.7259L14.2537 3.74351H14.5452C14.5871 3.74354 14.6286 3.73532 14.6672 3.71933C14.7059 3.70334 14.7411 3.67988 14.7707 3.6503C14.8003 3.62072 14.8238 3.5856 14.8399 3.54694C14.8559 3.50828 14.8642 3.46683 14.8642 3.42497C14.8642 3.38312 14.856 3.34166 14.84 3.30298C14.824 3.2643 14.8006 3.22914 14.771 3.19952C14.7414 3.1699 14.7063 3.1464 14.6676 3.13036C14.629 3.11431 14.5875 3.10604 14.5457 3.10601ZM13.5673 4.37081H4.51099L4.46382 3.74351H13.6145L13.5673 4.37081ZM6.62834 2.69971C6.62834 2.09494 6.87484 1.84844 7.47962 1.84844H10.6153C10.8609 1.84844 11.0628 1.89816 11.2056 1.98996C11.3811 2.11194 11.4661 2.34399 11.4661 2.69971V3.10601H6.62834V2.69971ZM12.79 14.6949C12.7819 15.0392 12.6646 15.1552 12.3246 15.1552H5.75369C5.40604 15.1552 5.28874 15.0409 5.28789 14.6779L4.55902 5.00789H13.5189L12.79 14.6949Z" fill="#333333"/>' +
                    '<path d="M7.94426 5.51305C7.90245 5.51453 7.86134 5.52424 7.82328 5.54162C7.78523 5.559 7.75097 5.58371 7.72247 5.61434C7.69397 5.64497 7.67179 5.68092 7.65720 5.72013C7.64260 5.75934 7.63588 5.80104 7.63741 5.84285L7.93661 14.0683C7.93958 14.1507 7.97435 14.2287 8.03363 14.286C8.09290 14.3433 8.17207 14.3754 8.25451 14.3756L8.26641 14.3752C8.30822 14.3737 8.34933 14.3640 8.38739 14.3466C8.42545 14.3292 8.45971 14.3045 8.48820 14.2739C8.51670 14.2432 8.53888 14.2073 8.55348 14.1681C8.56807 14.1289 8.57480 14.0872 8.57326 14.0454L8.27449 5.81948C8.26811 5.64353 8.12446 5.49775 7.94426 5.51305ZM5.96844 5.51348C5.88413 5.51936 5.80562 5.55848 5.75015 5.62224C5.69468 5.68600 5.66680 5.76917 5.67264 5.85348L6.23746 14.0789C6.24295 14.1594 6.27879 14.2348 6.33772 14.2898C6.39665 14.3449 6.47428 14.3755 6.55494 14.3756L6.57746 14.3747C6.66177 14.3688 6.74028 14.3297 6.79575 14.2660C6.85122 14.2022 6.87910 14.1190 6.87326 14.0347L6.30844 5.80928C6.30190 5.72523 6.26260 5.64711 6.19899 5.59177C6.13539 5.53644 6.05259 5.50832 5.96844 5.51348ZM10.12660 5.51305C9.94856 5.49605 9.80279 5.64395 9.79684 5.81990L9.49721 14.0454C9.49562 14.0872 9.50230 14.1289 9.51688 14.1681C9.53145 14.2074 9.55363 14.2433 9.58214 14.2740C9.61065 14.3046 9.64493 14.3293 9.68301 14.3467C9.72110 14.3641 9.76223 14.3737 9.80406 14.3752L9.81596 14.3756C9.89840 14.3754 9.97757 14.3433 10.03680 14.2860C10.09610 14.2287 10.13090 14.1507 10.13390 14.0683L10.43350 5.84285C10.43510 5.80103 10.42840 5.75930 10.41380 5.72007C10.39920 5.68083 10.37710 5.64487 10.34860 5.61422C10.32000 5.58358 10.28580 5.55887 10.24770 5.54151C10.20960 5.52415 10.16850 5.51448 10.12660 5.51305ZM12.10250 5.51348C12.01830 5.50843 11.93560 5.53659 11.87200 5.59190C11.80840 5.64722 11.76910 5.72527 11.76250 5.80928L11.19760 14.0347C11.19180 14.1190 11.21970 14.2022 11.27510 14.2660C11.33060 14.3297 11.40910 14.3688 11.49340 14.3747L11.51600 14.3756C11.59660 14.3754 11.67420 14.3448 11.73310 14.2897C11.79200 14.2347 11.82780 14.1594 11.83340 14.0789L12.39830 5.85348C12.40410 5.76917 12.37620 5.68600 12.32080 5.62224C12.26530 5.55848 12.18680 5.51936 12.10250 5.51348Z" fill="#333333"/>' +
                    '</svg></a>'; // menambahkan icon trash dan edit untuk edit data order
                cell0.appendChild(iconContainer);

                // Menambahkan data pada sel-sel berikutnya
                var cell1 = newRow.insertCell(1);
                var cell2 = newRow.insertCell(2);
                var cell3 = newRow.insertCell(3);
                var cell4 = newRow.insertCell(4);

                cell3.innerHTML = 'Ongkir' + ' ' + '(' + ongkir + ')';
                cell4.innerHTML = nominal;

                editedrowsongkir.push(newRow);
                showSuksesModalSave();
                hitungTotal();
            } else {
                showErorModalSave();
            }
        }
        // Fungsi untuk menghapus biaya ongkir
        var yaButton = document.getElementById('btn-ya-ongkir');
        yaButton.addEventListener('click', function() {
            if (editedrowsongkir.length > 0) {
                var lastEditedRow = editedrowsongkir.pop()
                lastEditedRow.remove();
                hitungTotal();
                showSuksesModalDelete();
            } else {
                showSuksesModalDelete();
            }

        });

        // Fungsi untuk mengedit biaya ongkir
        function editongkir() {
            var nominalBaru = document.getElementById('edit-ongkir-nominal').value;
            var ongkirBaru = document.getElementById('edit-jasa-ongkir').value;

            var lastEditedRowOngkir = editedrowsongkir[editedrowsongkir.length - 1];
            if (lastEditedRowOngkir && lastEditedRowOngkir.cells && lastEditedRowOngkir.cells.length >= 5) {
                lastEditedRowOngkir.cells[3].innerHTML = 'Ongkir' + ' ' + '(' + ongkirBaru + ')';
                lastEditedRowOngkir.cells[4].innerHTML = nominalBaru;

                hitungTotal();
                $('#ModalEditOngkir').modal('hide');
                showSuksesModalEdit();
            } else {
                showErorModalEdit();
            }

        }

        // Fungsi untuk menambahkan biaya lain lain
        var editedrowslain = [];

        function tambahcost() {
            var nominal = document.getElementById('costnominal').value;
            var label = document.getElementById('addcostlabel').value;
            var table = document.getElementById('tabel-produk');

            if (nominal && label) {
                var newRow = table.insertRow(-1);
                var cell0 = newRow.insertCell(0);
                var iconContainer = document.createElement('div');
                iconContainer.innerHTML = '<a class="me-3" data-bs-toggle="modal" data-bs-target="#ModalEditbiayalain">' +
                    '<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                    '<path d="M4.92648 14.3165H1.2395C1.07652 14.3165 0.920223 14.2517 0.804982 14.1365C0.689742 14.0212 0.625 13.8649 0.625 13.702V10.2695C0.625 10.1888 0.640894 10.1089 0.671776 10.0343C0.702657 9.95978 0.747921 9.89204 0.804983 9.83498L10.0224 0.617482C10.1377 0.502241 10.294 0.4375 10.457 0.4375C10.6199 0.4375 10.7762 0.502241 10.8915 0.617482L14.3239 4.04995C14.4392 4.16519 14.5039 4.32149 14.5039 4.48446C14.5039 4.64744 14.4392 4.80374 14.3239 4.91898L4.92648 14.3165Z" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>' +
                    '<path d="M8 2.64062L12.3015 6.94212" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>' +
                    '</svg>' +
                    '</a>' +
                    '<a  class="ms-1" data-bs-toggle="modal" data-bs-target="#ModalDeleteBiayalain">' +
                    '<svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                    '<path d="M14.5457 3.10601H12.1032V2.69971C12.1032 2.12809 11.9234 1.71371 11.56 1.46084C11.3033 1.29509 10.985 1.21094 10.6148 1.21094H7.87742C7.87529 1.21094 7.87359 1.21221 7.87147 1.21221C7.86934 1.21221 7.86764 1.21094 7.86552 1.21094H7.47919C6.51912 1.21094 5.99042 1.73964 5.99042 2.69971V3.10601H3.54922C3.46468 3.10601 3.38361 3.1396 3.32383 3.19937C3.26405 3.25915 3.23047 3.34022 3.23047 3.42476C3.23047 3.5093 3.26405 3.59038 3.32383 3.65015C3.38361 3.70993 3.46468 3.74351 3.54922 3.74351H3.82419L4.65124 14.7021C4.65124 15.3953 5.05287 15.7927 5.75369 15.7927H12.3246C13.0093 15.7927 13.4113 15.3974 13.4262 14.7259L14.2537 3.74351H14.5452C14.5871 3.74354 14.6286 3.73532 14.6672 3.71933C14.7059 3.70334 14.7411 3.67988 14.7707 3.6503C14.8003 3.62072 14.8238 3.5856 14.8399 3.54694C14.8559 3.50828 14.8642 3.46683 14.8642 3.42497C14.8642 3.38312 14.856 3.34166 14.84 3.30298C14.824 3.2643 14.8006 3.22914 14.771 3.19952C14.7414 3.1699 14.7063 3.1464 14.6676 3.13036C14.629 3.11431 14.5875 3.10604 14.5457 3.10601ZM13.5673 4.37081H4.51099L4.46382 3.74351H13.6145L13.5673 4.37081ZM6.62834 2.69971C6.62834 2.09494 6.87484 1.84844 7.47962 1.84844H10.6153C10.8609 1.84844 11.0628 1.89816 11.2056 1.98996C11.3811 2.11194 11.4661 2.34399 11.4661 2.69971V3.10601H6.62834V2.69971ZM12.79 14.6949C12.7819 15.0392 12.6646 15.1552 12.3246 15.1552H5.75369C5.40604 15.1552 5.28874 15.0409 5.28789 14.6779L4.55902 5.00789H13.5189L12.79 14.6949Z" fill="#333333"/>' +
                    '<path d="M7.94426 5.51305C7.90245 5.51453 7.86134 5.52424 7.82328 5.54162C7.78523 5.559 7.75097 5.58371 7.72247 5.61434C7.69397 5.64497 7.67179 5.68092 7.65720 5.72013C7.64260 5.75934 7.63588 5.80104 7.63741 5.84285L7.93661 14.0683C7.93958 14.1507 7.97435 14.2287 8.03363 14.286C8.09290 14.3433 8.17207 14.3754 8.25451 14.3756L8.26641 14.3752C8.30822 14.3737 8.34933 14.3640 8.38739 14.3466C8.42545 14.3292 8.45971 14.3045 8.48820 14.2739C8.51670 14.2432 8.53888 14.2073 8.55348 14.1681C8.56807 14.1289 8.57480 14.0872 8.57326 14.0454L8.27449 5.81948C8.26811 5.64353 8.12446 5.49775 7.94426 5.51305ZM5.96844 5.51348C5.88413 5.51936 5.80562 5.55848 5.75015 5.62224C5.69468 5.68600 5.66680 5.76917 5.67264 5.85348L6.23746 14.0789C6.24295 14.1594 6.27879 14.2348 6.33772 14.2898C6.39665 14.3449 6.47428 14.3755 6.55494 14.3756L6.57746 14.3747C6.66177 14.3688 6.74028 14.3297 6.79575 14.2660C6.85122 14.2022 6.87910 14.1190 6.87326 14.0347L6.30844 5.80928C6.30190 5.72523 6.26260 5.64711 6.19899 5.59177C6.13539 5.53644 6.05259 5.50832 5.96844 5.51348ZM10.12660 5.51305C9.94856 5.49605 9.80279 5.64395 9.79684 5.81990L9.49721 14.0454C9.49562 14.0872 9.50230 14.1289 9.51688 14.1681C9.53145 14.2074 9.55363 14.2433 9.58214 14.2740C9.61065 14.3046 9.64493 14.3293 9.68301 14.3467C9.72110 14.3641 9.76223 14.3737 9.80406 14.3752L9.81596 14.3756C9.89840 14.3754 9.97757 14.3433 10.03680 14.2860C10.09610 14.2287 10.13090 14.1507 10.13390 14.0683L10.43350 5.84285C10.43510 5.80103 10.42840 5.75930 10.41380 5.72007C10.39920 5.68083 10.37710 5.64487 10.34860 5.61422C10.32000 5.58358 10.28580 5.55887 10.24770 5.54151C10.20960 5.52415 10.16850 5.51448 10.12660 5.51305ZM12.10250 5.51348C12.01830 5.50843 11.93560 5.53659 11.87200 5.59190C11.80840 5.64722 11.76910 5.72527 11.76250 5.80928L11.19760 14.0347C11.19180 14.1190 11.21970 14.2022 11.27510 14.2660C11.33060 14.3297 11.40910 14.3688 11.49340 14.3747L11.51600 14.3756C11.59660 14.3754 11.67420 14.3448 11.73310 14.2897C11.79200 14.2347 11.82780 14.1594 11.83340 14.0789L12.39830 5.85348C12.40410 5.76917 12.37620 5.68600 12.32080 5.62224C12.26530 5.55848 12.18680 5.51936 12.10250 5.51348Z" fill="#333333"/>' +
                    '</svg></a>'; // menambahkan icon trash dan edit untuk edit data order
                cell0.appendChild(iconContainer);

                // Menambahkan data pada sel-sel berikutnya
                var cell1 = newRow.insertCell(1);
                var cell2 = newRow.insertCell(2);
                var cell3 = newRow.insertCell(3);
                var cell4 = newRow.insertCell(4);

                cell3.innerHTML = label;
                cell4.innerHTML = nominal;

                editedrowslain.push(newRow);
                showSuksesModalSave();
                hitungTotal();
            } else {
                showErorModalSave();
            }

        }

        // Fungsi untuk menghapus data Biaya lain lain
        var yaButton = document.getElementById('btn-ya-biayalain');
        yaButton.addEventListener('click', function() {
            if (editedrowslain.length > 0) {
                var lastEditedRow = editedrowslain.pop()
                lastEditedRow.remove();
                showSuksesModalDelete();
                hitungTotal();
            } else {
                showErorModalDelete();
            }

        });

        // Fungsi untuk mengedit data Biaya lain lain
        function editcost() {
            var nominalBaru = document.getElementById('edit-costnominal').value;
            var labelBaru = document.getElementById('edit-costlabel').value;

            var lastEditedRowCost = editedrowslain[editedrowslain.length - 1];

            if (lastEditedRowCost && lastEditedRowCost.cells && lastEditedRowCost.cells.length >= 5) {
                lastEditedRowCost.cells[3].innerHTML = labelBaru;
                lastEditedRowCost.cells[4].innerHTML = nominalBaru;

                hitungTotal();
                $('#ModalEditbiayalain').modal('hide');
                showSuksesModalEdit();
            } else {
                showErorModalEdit();
            }
        }


        // Fungsi untuk menghitung total keseluruhan biaya dengan menghitung jumlah nilai dari kolom 4
        function hitungTotalKolom(namaKolom) {
            var table = document.getElementById('tabel-produk');
            var total = 0;

            for (var i = 1; i < table.rows.length; i++) {
                var row = table.rows[i];
                var cell = row.cells[namaKolom];

                var nilai = parseFloat(cell.innerHTML.replace(/[^\d.-]/g, ''));

                if (!isNaN(nilai)) {
                    total += nilai;
                }
            }

            return total;
        }
        // Fungsi untuk menampilkan total ke elemen HTML dengan ID 'total-subtotal'
        function hitungTotal() {
            var totalSubtotal = hitungTotalKolom(4); // Kolom Subtotal (indeks ke 4 atau kolom ke 4)
            document.getElementById('total-keseluruhan').innerHTML = 'Rp ' + totalSubtotal.toLocaleString('id-ID', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        // Fungsi untuk menghapus elemen <tr> berdasarkan ID
        function hapusTRById(id) {
            var element = document.getElementById(id);
            if (element) {
                element.parentNode.removeChild(element);
            }

            // Setelah menghapus, cek apakah masih ada elemen <tr> di dalam tabel
            var remainingRows = document.querySelectorAll('.btn-dlt');
            if (remainingRows.length === 0) {
                $('.opsi').hide();
                $('#infoOrder').hide();
                $('#btn-OB').hide();
                $('#totalhargaOrder').hide();
                $('#totalongkir').hide();
                $('#totaladdcost').hide();
                $('#dance-chart').show();
            }
        }
    </script>
@endsection
