@extends('layouts.mainSA')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/data-ekspedisi.css') }}">
@endsection
@section('konten')
    <div class="container-fluid p-4">
        {{-- header --}}
        <div class="d-flex justify-content-end align-items-center mb-4 p-0">
            <div class="col-8 d-flex header-text align-items-center">Data Jasa Ekspedisi</div>
            <div class="col-4">
                {{-- search --}}
                <div class="input-group  custom-shadow bg-white align-items-center ">
                    <input type="text" class="form-control form-control-lg input-fields border-0 ps-2" placeholder="Cari Juragan" name="search" id="searchInput">
                    <button class="btn bg-white btn-groups pe-4 border-0" type="button" id="searchButton"><span><i
                                class="fa-solid fa-magnifying-glass text-muted"></i></span></button>
                </div>
            </div>
        </div>

            {{-- form tambah jasa ekspedisi --}}
            <form class="mb-3">
            <div class="card col-12 p-0 border-dark" style="max-height: 500px; overflow-y: auto;">
                <div class="card-body m-3">
                    {{-- display yang tampil adalah display untuk pengisian ekspedisi secara manual --}}
                    <h5 class="text-center mb-4">Tambah Jasa Ekspedisi</h5>
                    <form action="" class="form-input" id="TambahEkspedisiManual">
                        <label for="id-ekspedisi-manual" class="form-label">ID Ekspedisi</label>
                        <div class="input-group rounded  mb-4 shadow align-items-center ">
                            <input type="number" class="form-control input-fields border-0" id="id-ekspedisi-manual" required>
                            <button class="btn border-0 btn-groups py-0" type="button" id="refreshButton"
                                onclick="showTambahTokoAuto()">
                                <span><i class="fa-solid fa-arrows-rotate"></i></span>
                            </button>
                        </div>
                        <div class="mb-4">
                            <label for="nama-ekspedisi-manual" class="form-label">Nama Ekspedisi</label>
                            <input type="text" class="form-control shadow" id="nama-ekspedisi-manual" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary px-4" id="tambah-manual"
                                onclick="tambahEkspedisi()">Tambah</button>
                        </div>
                    </form>

                    {{-- display sementara none untuk tambah ekpesisi auto  --}}
                    <form action="" class="d-none form-input" id="TambahEkspedisiAuto">
                        <label for="id-ekspedisi-auto" class="form-label">ID Ekspedisi</label>
                        <div class="mb-4 shadow">
                            <input type="number" class="form-control border-end-0" id="id-ekspedisi-auto" readonly>
                        </div>
                        <label for="nama-ekspedisi-auto" class="form-label">Nama Ekspedisi</label>
                        <div class="input-group mb-4 shadow">
                            <input type="text" class="form-control border-end-0" id="nama-ekspedisi-auto" required>
                            <button class="btn border border-start-0 d-flex align-items-center disabled " type="button"
                                id="refreshButton">
                                <span><i class="fa-solid fa-pen me-2" style="font-size: 10px;"></i></span>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center gap-3">
                            <button type="button" class="btn btn-danger px-4"
                                onclick="showTambahTokoManual()">Batal</button>
                            <button type="button" class="btn btn-primary px-4" id="tambah-auto"
                                onclick="tambahToko()">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>


                <div class="bg-white custom-shadow">
                    <table class="table table-borderless  text-center mb-5 p-0 " id="tabel-ekspedisi">
                        <thead class="rounded-top-5 " style="background-color:#202B46; color:#ffffff;">
                            <tr>
                                <th class="col" style="background-color:#202B46; color:#ffffff;">No</th>
                                <th class="col" style="background-color:#202B46; color:#ffffff;">Jasa Ekspedisi</th>
                                <th class="col" style="background-color:#202B46; color:#ffffff;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-body">
                            <tr>
                                <td class="col pb-0 pt-3">1</td>
                                <td class="col text-truncate text-capitalize pb-0 pt-3">JNE</td>
                                <td class="col pb-0 pt-3">
                                    <div class="d-flex justify-content-center gap-3">
                                        <button class="btn btn-sm text-center px-4 rounded-2 btn-orange "
                                            data-bs-target="#ModalEdit" data-bs-toggle="modal">Edit</button>
                                        <button class="btn btn-sm text-center px-3 rounded-2 btn-red"
                                            style="font-size: 12px;" data-bs-target="#ModalDelete"
                                            data-bs-toggle="modal">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-1">2</td>
                                <td class="col-2 text-truncate text-capitalize">J&T</td>
                                <td class="col-2">
                                    <div class="d-flex justify-content-center gap-3">
                                        <button class="btn btn-sm text-center px-4 rounded-2 btn-orange "
                                            data-bs-target="#ModalEdit" data-bs-toggle="modal">Edit</button>
                                        <button class="btn btn-sm text-center px-3 rounded-2 btn-red"
                                            style="font-size: 12px;" data-bs-target="#ModalDelete"
                                            data-bs-toggle="modal">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-1">3</td>
                                <td class="col-2 text-truncate text-capitalize">Tiki</td>
                                <td class="col-2">
                                    <div class="d-flex justify-content-center gap-3">
                                        <button class="btn btn-sm text-center px-4 rounded-2 btn-orange "
                                            data-bs-target="#ModalEdit" data-bs-toggle="modal">Edit</button>
                                        <button class="btn btn-sm text-center px-3 rounded-2 btn-red"
                                            style="font-size: 12px;" data-bs-target="#ModalDelete"
                                            data-bs-toggle="modal">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- pagination untuk data jasa ekspedisi --}}
                    <div class="d-flex justify-content-end ">
                        <div class="rounded-3" id="pagination-ekspedisi">
                            {{-- {{ $data_ekspedisi->links() }} ganti sesuai data --}}
                            <div class="rounded-3 " style="font-size: 12px;">
                                <ul class="pagination mb-4 me-4">
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fa-solid fa-arrow-left"></i></a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item" aria-current="page">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fa-solid fa-arrow-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        {{-- modal --}}
        <!-- modal edit-->
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content ">
                    <div class="modal-body m-3">
                        <h5 class="text-center mb-4">Edit Jasa Ekspedisi</h5>
                        <form action="" class="">
                            <label for="edit-id-ekspedisi" class="form-label">ID Ekspedisi</label>
                            <div class="mb-4 shadow">
                                <input type="number" class="form-control border-end-0 " id="edit-id-ekspedisi" readonly>
                            </div>
                            <label for="edit-nama-ekspedisi" class="form-label">Nama Ekspedisi</label>
                            <div class="input-group mb-4 shadow ">
                                <input type="text" class="form-control border-end-0 " id="edit-nama-ekspedisi">
                                <button class="btn border border-start-0 d-flex align-items-center " type="button"
                                    id="refreshButton"><span><i class="fa-solid fa-pen me-2"
                                            style="font-size: 10px;"></i></span></button>
                            </div>
                            <div class="d-flex justify-content-center gap-3">
                                <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary px-4"
                                    onclick="editekspedisi()">Simpan</button>
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
                            <img src="{{ asset('assets/img/confirm.png') }}" alt="" width="120px"
                                class="mx-auto mb-2">
                            <p class="fw-bolder text-center ">Yakin Hapus Data ?</p>
                        </div>
                        <div class="d-flex justify-content-center my-2 ">
                            <button id="button-hapus" class="btn btn-primary me-2" data-bs-dismiss="modal"
                                onclick="hapusEkspedisi()">Ya</button>
                            <button class="btn btn-danger " data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal notifikasi --}}
        {{-- notifikasi berhasil --}}
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
                                <p class="fw-bold text-start m-0">Data <span class="text-danger">Gagal</span> dihapus!</p>
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
                                <p class="fw-bold text-start m-0">Data <span class="text-danger">Gagal</span> dihapus!</p>
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

    </div>
@endsection

@section('js')
    <script>
        // fungsi pagination pada tabel data jasa ekspedisi
        document.addEventListener("DOMContentLoaded", function() {
            const tableBody = document.getElementById("tabel-body");
            const paginationLinks = document.querySelectorAll("#pagination-ekspedisi .pagination .page-item");
            const rowsPerPage = 10;

            paginationLinks.forEach(function(link) {
                link.addEventListener("click", function(event) {
                    event.preventDefault();

                    // Hapus kelas active dari semua link pagination
                    paginationLinks.forEach(function(link) {
                        link.classList.remove("active");

                    });

                    // Tambahkan kelas active ke link yang diklik
                    link.classList.add("active");

                    // Hitung halaman yang sedang aktif
                    const currentPage = parseInt(link.querySelector("a").innerText);
                    const startIndex = (currentPage - 1) * rowsPerPage;
                    const endIndex = startIndex + rowsPerPage;

                    // Sembunyikan semua baris tabel
                    const rows = tableBody.querySelectorAll("tr");
                    rows.forEach(function(row) {
                        row.style.display = "none";
                    });

                    // Tampilkan baris yang sesuai dengan halaman yang dipilih
                    for (let i = startIndex; i < endIndex && i < rows.length; i++) {
                        rows[i].style.display = "";
                    }
                });
            });
        });

        // fungsi untuk mencari data ekspedisi
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[name="search"]');
            const searchButton = document.getElementById('searchButton');

            // Menambahkan event listener pada tombol pencarian
            searchButton.addEventListener('click', function(event) {
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
            searchInput.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    const currentUrl = new URL(window.location.href);
                    currentUrl.searchParams.delete('search');
                    window.location.href = currentUrl.toString();
                }
            });
        });

        // form auto / manual
        function showTambahTokoAuto() {
            document.getElementById("TambahEkspedisiManual").classList.add("d-none");
            document.getElementById("TambahEkspedisiAuto").classList.remove("d-none");
        }

        function showTambahTokoManual() {
            document.getElementById("TambahEkspedisiAuto").classList.add("d-none");
            document.getElementById("TambahEkspedisiManual").classList.remove("d-none");
        }

        // tambah data jasa eskpedisi secara manual
        function tambahEkspedisi() {
            var isSucces = false; // dapat diganti dengan logika yang sesuai

            if (isSucces) {
                showSuksesModal();
            } else {
                showErorModal();
            }
        }

        // hapus data jasa ekspedisi
        function hapusEkspedisi() {
            var isSucces = true; // dapat diganti dengan logika yang sesuai

            if (isSucces) {
                showSuksesModalHapus();
            } else {
                showErorModalHapus();
            }
        }

        // edit data jasa ekspedisi
        function editekspedisi() {
            var isSucces = true; // dapat diganti dengan logika yang sesuai

            if (isSucces) {
                $('#ModalEdit').modal('hide');
                showSuksesModalEdit();
            } else {
                $('#ModalEdit').modal('hide');
                showErorModalEdit();
            }
        }


        // Modal Alert
        // Modal alert ketika data berhasil ditambahkan
        function showSuksesModal() {
            $('#suksesModal').modal('show');
            setTimeout(() => {
                $('#suksesModal').modal('hide')
            }, 1200);
        }

        function showErorModal() {
            $('#erorModal').modal('show');
            setTimeout(() => {
                $('#erorModal').modal('hide')
            }, 1200);
        }

        function showSuksesModalHapus() {
            $('#suksesModalHapus').modal('show');
            setTimeout(() => {
                $('#suksesModalHapus').modal('hide')
            }, 1200);
        }

        function showErorModalHapus() {
            $('#erorModalHapus').modal('show');
            setTimeout(() => {
                $('#erorModalHapus').modal('hide')
            }, 1200);
        }

        function showSuksesModalEdit() {
            $('#suksesModalEdit').modal('show');
            setTimeout(() => {
                $('#suksesModalEdit').modal('hide')
            }, 1200);
        }

        function showErorModalEdit() {
            $('#erorModalEdit').modal('show');
            setTimeout(() => {
                $('#erorModalEdit').modal('hide')
            }, 1200);
        }
    </script>
@endsection
