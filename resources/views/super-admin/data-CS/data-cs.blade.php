@extends('layouts.mainSA')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/data-admin.css') }}">
@endsection

@section('konten')
    <div class="container-fluid p-4">

        {{-- header --}}
        <div class="d-flex justify-content-between align-items-center mb-4 p-0">
            <div class="col-lg-8 col-md-7 d-flex header-text align-items-center ">Data CS</div>
            <div class="col-lg-4 col-md-5 d-flex  justify-content-center align-items-center gap-4 ">
                <a href="/superadmin/tambah-cs" class="btn btn-lg btn-blue rounded-2 px-4 fs-6">Tambah</a>
                {{-- search --}}
                <div class="input-group  custom-shadow bg-white align-items-center ">
                    <input type="text" class="form-control form-control-lg input-fields border-0 ps-4"
                        placeholder="Cari CS" name="search" id="searchInput">
                    <button class="btn bg-white btn-groups pe-4 border-0" type="button" id="searchButton"><span><i
                                class="fa-solid fa-magnifying-glass text-muted"></i></span></button>
                </div>
            </div>
        </div>

        {{-- table data admin --}}
        <main class="d-flex flex-column  table-responsive rounded-top my-3 bg-white">
            <table class="table table-borderless text-center mb-5">
                <thead>
                    <tr>
                        <th class="col">ID CS</th>
                        <th class="col">Nama CS</th>
                        <th class="col">Toko</th>
                        <th class="col">Email</th>
                        <th class="col">No Telepon</th>
                        <th class="col">Opsi</th>
                    </tr>
                </thead>
                <tbody id="tabel-body">
                    <tr>
                        <td class="col pb-0 pt-3">CS3LS</td>
                        <td class="col pb-0 pt-3 text-capitalize">CS ALDA</td>
                        <td class="col pb-0 pt-3 text-truncate">Limited Shopping; Korean Blazer</td>
                        <td class="col pb-0 pt-3 text-truncate ">csalda@gmail.com</td>
                        <td class="col pb-0 pt-3 text-truncate ">081-4652-8941</td>
                        <td class="col pb-0 pt-3">
                            <div class="d-flex justify-content-center gap-lg-3 gap-md-1">
                                <a href="/superadmin/edit-cs"
                                    class="btn btn-sm btn-orange px-lg-4 px-md-3  text-center rounded-2 fw-medium "
                                    style="font-size:12px;">Edit</a>
                                <button class="btn btn-sm px-lg-3 px-md-2 btn-red text-center fw-medium rounded-2 "
                                    style="font-size:12px;" data-bs-target="#ModalDelete"
                                    data-bs-toggle="modal">Hapus</button>
                        </td>
    </div>
    </td>
    </tr>
    </tbody>
    </table>
    {{-- pagination --}}
    <div class="d-flex flex-row  justify-content-between mb-3">
        <div class="ms-4">
            <button class="btn btn-outline-secondary mt-5" disabled>Halaman 1 {{-- ganti dengan data CS {{ $data_admin->currentPage() }} --}}</button>
        </div>
        {{-- ganti dengan data CS{{ $data_admin->links() }} --}}

        <div class="d-flex justify-content-end me-2 mt-1">
            <div class="rounded-3" id="pagination-cs">
                {{-- {{ $data_ekspedisi->links() }} ganti sesuai data --}}
                <div class="mt-5 me-3 rounded-3 " style="font-size: 12px;">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fa-solid fa-arrow-left"></i></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item" aria-current="page">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item" aria-current="page">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fa-solid fa-arrow-right"></i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

    </div>
    </main>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm " role="document">
            <div class="modal-content ">
                <div class="my-5">
                    <div class="d-flex flex-column justify-content-center ">
                        <img src="{{ asset('assets/img/confirm.png') }}" alt="" width="120px" class="mx-auto">
                        <p class="fw-bold text-center my-3">Yakin Hapus Data ?</p>
                    </div>
                    <div class="d-flex justify-content-center gap-3">
                        <button class="btn btn-blue" id="btn-ya" data-bs-dismiss="modal" onclick="hapusCS()">Ya</button>
                        <button class="btn btn-red " data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- sukses Modal delete  -->
    <div class="modal fade" id="suksesModalDelete" tabindex="-1" role="dialog" data-bs-backdrop="false">
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

    <!-- gagal Modal delete -->
    <div class="modal fade" id="erorModalDelete" tabindex="-1" role="dialog" data-bs-backdrop="false">
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

    {{-- @else
      <p class="text-center fs-4 mt-3">Admin tidak ditemukan .</p>
    @endif --}}
@endsection

@section('js')
    <script>
        // Fungsi untuk mencari data
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

        // Fungsi pagination pada tabel data admin
        document.addEventListener("DOMContentLoaded", function() {
            const tableBody = document.getElementById("tabel-body");
            const paginationLinks = document.querySelectorAll("#pagination-cs .pagination .page-item");
            const rowsPerPage = 10;
            const btnHalaman = document.querySelector('.btn.btn-outline-secondary');

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
                    // Update teks dan kelas tombol halaman
                    btnHalaman.innerText = `Halaman ${currentPage}`;
                });
            });
        });
    </script>
    <script>
        // Fungsi untuk hapus data
        function showSuksesModalHapusCS() {
            $('#suksesModalDelete').modal('show');
            setTimeout(() => {
                $('#suksesModalDelete').modal('hide')
            }, 1200);
        }

        function showErorModalHapusCS() {
            $('#erorModalDelete').modal('show');
            setTimeout(() => {
                $('#erorModalDelete').modal('hide')
            }, 1200);
        }

        function hapusCS() {
            // Logika untuk menambah toko manual
            var berhasil = true; // Ganti dengan logika sesuai kebutuhan

            if (berhasil) {
                showSuksesModalHapusCS();
            } else {
                showErorModalHapusCS();
            }
        }
    </script>
@endsection
