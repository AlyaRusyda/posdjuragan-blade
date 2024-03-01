@extends('layouts.mainA')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/data-pelanggan.css') }}">

@endsection

@section('konten')
    <div class="container-fluid p-4">

        {{-- header --}}
        <div class="d-flex row justify-content-between align-items-center p-0">
            <div class="col-lg-7 col-xl-4 col-md-12  d-flex header-text align-items-center mb-4">Data Pelanggan</div>
            <div class="col-lg-5 col-xl-5 col-md-12  d-flex justify-content-md-end  flex-md-row-reverse flex-lg-row justify-content-center align-items-center gap-4 mb-4">
                <button type="button" class="btn btn-blue px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalTambahPelanggan">Tambah</button>
                {{-- search --}}
                <div class="input-group  custom-shadow bg-white rounded-pill align-items-center ">
                    <input type="text" class="form-control form-control-lg input-fields ps-4" placeholder="Cari Pelanggan" name="search" id="searchInput">
                    <button class="btn bg-white btn-groups pe-4" type="button" id="searchButton"><span><i class="fa-solid fa-magnifying-glass text-muted"></i></span></button>
                </div>
            </div>
        </div>

        
        {{-- table data pelanggan --}}
        <main class="d-flex table-responsive flex-column rounded-top bg-white " >
            <table class="table table-borderless text-center mb-3" >
                <thead>
                    <tr>
                        <th class="col text-white ">ID Pelanggan</th>
                        <th class="col text-white ">Nama Pelanggan</th>
                        <th class="col text-white ">Registrasi</th>
                        <th class="col text-white ">HP</th>
                        <th class="col text-white ">Alamat</th>
                        <th class="col text-white ">Opsi</th>
                    </tr>
                </thead>
                <tbody> 
                    <tr>
                        <td class="col pb-0 pt-3">ID12345678</td>
                        <td class="col pb-0 pt-3 text-truncate text-capitalize">Uchiha D yeager</td>
                        <td class="col pb-0 pt-3">23/2/2023</td>
                        <td class="col pb-0 pt-3">087712345678</td>
                        <td class="col pb-0 pt-3 text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, dolor!</td>
                        <td class="col pb-0 pt-3"> 
                            <div class="d-flex justify-content-evenly">
                                <a href="/admin/detail" class="btn btn-sm border-0 rounded-2 px-lg-3 fw-medium  btn-detail text-center" style="font-size:12px;">
                                    <span id="icon" class="fa-solid fa-circle-info"></span>
                                    <span id="text">Detail</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
            </table>

            {{-- pagination --}}
            <div class="d-flex justify-content-between  m-4 mt-5">
                <div class="">
                    <button class="btn btn-outline-success" disabled>Halaman 1{{-- {{ $data_pelanggan->currentPage() }} --}} </button>
                </div>
                {{-- ganti block ini dengan data yang sesuai contoh : {{ $data_pelanggan->links() }} --}}
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&lsaquo;</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&rsaquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </main>  
    </div>

    {{-- modal tambah --}}
    <div class="modal fade" id="modalTambahPelanggan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" >
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0 ">
                    <h5 class="modal-title ms-auto" >Tambah Data pelanggan</h5>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 mt-0 py-0">
                    <form  id="formDataPelanggan" method="POST" class="needs-validation" novalidate>
                        <div class="mb-4 ">
                            <label for="IdPelanggan" class="form-label label-order mb-1" >ID Pelanggan</label>
                            <input type="text" class="form-control form-control-lg  input-custom shadow text-black" value="ID12345678" id="IdPelanggan"disabled  readonly>
                        </div>

                        <div class="mb-4 ">
                            <label for="tanggalRegistrasi" class="form-label label-order mb-1">Tanggal Registrasi</label>
                            <input type="text" class="form-control form-control-lg  input-custom shadow" id="tanggalRegistrasi" name="tanggalRegistrasi" value="{{ date('d/m/y') }}" required readonly>
                            <div class="invalid-feedback">
                                Masukkan tanggal registrasi
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="namaPelanggan" class="form-label label-order mb-1">Nama Pelanggan</label>
                            <input type="text" name="namaPelanggan" class="form-control form-control-lg input-custom shadow" id="namaPelanggan">
                            <div class="invalid-feedback">
                                Masukkan nama pelanggan
                            </div>
                        </div>
                        

                        <div class="d-flex row">
                            <div class="col-md-6 mb-2" id="tambah-hp-1">
                                <label for="hp" class="form-label label-order mb-1">HP 1</label>
                                <input type="telp" name="hp"  minlength="10" maxlength="13" class="form-control form-control-lg  input-custom shadow " id="hp" oninput="this.value = this.value.replace(/\D/g, '')" required>
                            </div>
                            <div class="col-md-6 mb-4 " id="tambah-hp-2">
                                <label for="hp2" class="form-label label-order mb-1">HP 2 (Optional) </label>
                                <input type="telp" name="hp2"  minlength="10" maxlength="13" class="form-control form-control-lg  input-custom shadow " id="hp2" oninput="this.value = this.value.replace(/\D/g, '')">
                            </div>
                        </div>
    
                        <div class="mb-4 ">
                            <label for="email" class="form-label label-order mb-1">Email Pelanggan</label>
                            <input type="email" name="email" class="form-control form-control-lg  input-custom shadow" id="email" required>
                            <div class="invalid-feedback">
                                Masukkan email pelanggan
                            </div>
                        </div>
                        
                        <div class="mb-4 ">
                            <label for="alamat" class="form-label label-order mb-1">Alamat</label>
                            <textarea type="text" name="alamat" class="form-control form-control-lg  input-custom shadow " id="alamat" rows="3" required></textarea>
                            <div class="invalid-feedback">
                                Masukkan alamat
                            </div>
                        </div>
                    
                        <div class="row d-flex">
                            <div class="col-md-6 mb-4">
                                <label for="provinsi" class="form-label label-order mb-1">Provinsi</label>
                                <select class="form-select form-select-lg  shadow" name="provinsi" id="provinsi" onchange="loadKabupaten()" required>
                                    <option value="">Pilih Provinsi</option>
                                </select>
                                <div class="invalid-feedback">
                                    Masukkan provinsi
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="kota" class="form-label label-order mb-1">Kab / kota</label>
                                <select class="form-select form-select-lg  shadow" id="kota" name="kota" onchange="loadKecamatan()" required>
                                    <option value="">Pilih Kab/Kota</option>
                                </select>
                                <div class="invalid-feedback">
                                    Masukkan kota
                                </div>
                            </div>
                        </div>
    
                        <div class="row d-flex mb-4">
                            <div class="col-md-6">
                                <label for="kecamatan" class="form-label label-order mb-1">Kecamatan</label>
                                <select class="form-select form-select-lg  shadow" id="kecamatan" name="kecamatan" required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                <div class="invalid-feedback">
                                    Masukkan kecamatan
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <label for="kodepos" class="form-label label-order mb-1">Kode Pos </label>
                                <input type="number" class="form-control form-control-lg  input-custom shadow " name="kodepos" maxlength="5" id="kodepos" required>
                                <div class="invalid-feedback">
                                    Masukkan kodepos
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center my-3 ">
                            <button type="button" class="btn btn-grey py-2  px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-blue px-5 py-2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="my-5">
                    <div class=" my-2 d-flex flex-column justify-content-center ">
                        <img src="{{ asset('assets/img/confirm.png') }}" alt="" width="120px" class="mx-auto mb-2">
                        <p class="fw-bolder text-center ">Yakin Hapus Data ?</p>
                    </div>
                    <div class="d-flex justify-content-center my-2 ">
                        <button class="btn btn-primary me-2" data-bs-dismiss="modal" onclick="hapusPelanggan()">Ya</button>
                        <button class="btn btn-danger " data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <section>
    @include('partials.modal')
   </section>
    
@endsection
        

@section('js')
    {{-- script form daerah --}}
    <script>
        // Function to load provinces
        function loadProvinsi() {
            var provinsiSelect = document.getElementById("provinsi");
            provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
    
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
    
        // Function to load cities (kota/kabupaten)
        function loadKabupaten() {
            var kabupatenSelect = document.getElementById("kota");
            kabupatenSelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
    
            var selectedProvinsi = document.getElementById("provinsi").value;
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
    
        // Function to load districts (kecamatan)
        function loadKecamatan() {
            var kecamatanSelect = document.getElementById("kecamatan");
            kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
    
            var selectedKota = document.getElementById("kota").value;
            if (selectedKota) {
                fetch(`https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=${selectedKota}`)
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
    
        // Initial load of provinces
        loadProvinsi();
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.querySelector('input[name="search"]');
            const searchButton = document.getElementById('searchButton');

            // Menambahkan event listener pada tombol pencarian
            searchButton.addEventListener('click', function (event) {
                event.preventDefault();

                // Memeriksa apakah nilai pencarian tidak kosong
                if (searchInput.value.trim() !== '') {
                    // Memperbarui URL dengan parameter pencarian
                    const currentUrl = new URL(window.location.href);
                    currentUrl.searchParams.set('search', searchInput.value);

                    // Mengarahkan pengguna ke URL yang diperbarui
                    window.location.href = currentUrl.toString();
                }
            });

            // Menghapus parameter pencarian jika input pencarian kosong saat blur
            searchInput.addEventListener('blur', function () {
                if (this.value.trim() === '') {
                    const currentUrl = new URL(window.location.href);
                    currentUrl.searchParams.delete('search');
                    window.location.href = currentUrl.toString();
                }
            });
        });
    </script>

    <script>
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }else {
                event.preventDefault();
                tambahPelanggan();
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
   
        function showSuksesModalPelanggan() {
            $('#modalTambahPelanggan').modal('hide');
            $('#suksesModalTambah').modal('show');
            setTimeout(function () {
                $('#suksesModalTambah').modal('hide');
            }, 1200);
            
        }
    
        function showErorModalPelanggan() {
            $('#modalTambahPelanggan').modal('hide');
            $('#erorModalTambah').modal('show');
            setTimeout(function () {
                $('#erorModalTambah').modal('hide');
            }, 1200);
        }

        function showSuksesModalHapusPelanggan() {
            $('#suksesModalDelete').modal('show');
            setTimeout(function () {
                $('#suksesModalDelete').modal('hide');
            }, 1200);
            
        }
    
        function showErorModalHapusPelanggan() {
            $('#erorModalDelete').modal('show');
            setTimeout(function () {
                $('#erorModalDelete').modal('hide');
            }, 1200);
        }
    
        function tambahPelanggan() {
            // Logika untuk menambah toko manual
            var berhasil = false; // Ganti dengan logika sesuai kebutuhan
    
            if (berhasil) {
                showSuksesModalPelanggan();
            } else {
                showErorModalPelanggan();
            }
        }
        function hapusPelanggan() {
            // Logika untuk menambah toko manual
            var berhasil = false; // Ganti dengan logika sesuai kebutuhan
    
            if (berhasil) {
                showSuksesModalHapusPelanggan();
            } else {
                showErorModalHapusPelanggan();
            }
        }
    </script>
@endsection


