@extends('layouts.mainSA')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/data-juragan.css') }}">
@endsection

@section('konten')
<div class="container-fluid p-4">

{{-- header --}}
<div class="d-flex row justify-content-between align-items-center p-0">
    <div class="col-lg-7 col-md-7  d-flex header-text align-items-center mb-4 ">Data Toko (Juragan)</div>
    <div
        class="col-lg-5 col-md-5  d-flex justify-content-md-end flex-md-row-reverse flex-lg-row  justify-content-center align-items-center mb-4">
        {{-- search --}}
        <div class="input-group  custom-shadow bg-white align-items-center ">
            <input type="text" class="form-control form-control input-fields border-0 ps-4 "
                placeholder="Cari Juragan" name="search" id="searchInput">
            <button class="btn bg-white btn-groups pe-4 border-0" type="button" id="searchButton"><span><i
                        class="fa-solid fa-magnifying-glass text-muted"></i></span></button>
        </div>
    </div>
</div>

{{-- <main class="d-flex justify-content-between"> --}}

    <form class="mb-3">
        <div class="card col-12 p-0 border-dark" style="max-height: 500px; overflow-y: auto;">
            <div class="card-body m-3">
            <h5 class="text-center mb-4 " style="font-family: Montserrat; font-weight:600;">Tambah Toko</h5>
            <form action="" class="" id="TambahTokoManual">
                <label for="idToko" class="form-label">ID Toko</label>
                <div class="input-group rounded  mb-4 shadow align-items-center ">
                    <input type="number" class="form-control input-fields border-0" id="idToko" required>
                    <button class="btn border-0 btn-groups py-0" type="button" id="refreshButton"
                        onclick="showTambahTokoAuto()">
                        <span><i class="fa-solid fa-arrows-rotate"></i></span>
                    </button>
                </div>
                <label for="namaToko" class="form-label">Nama Toko</label>
                <div class="mb-4 rounded  shadow">
                    <input type="text" class="form-control" id="namaToko" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary px-4" id="tambah"
                        onclick="tambahToko()">Tambah</button>
                </div>
            </form>

            <form action="" class="d-none" id="TambahTokoAuto">
                <label for="idToko" class="form-label">ID Toko</label>
                <div class="mb-4 shadow">
                    <input type="number" class="form-control" id="idToko" value="1" disabled>
                </div>
                <label for="namaToko" class="form-label">Nama Toko</label>
                <div class="input-group rounded mb-4 shadow align-items-center">
                    <input type="text" class="form-control text-capitalize input-fields border-0" id="namaToko"
                        required>
                    <span class="p-0"><i class="fa-solid fa-pen mx-3" style="font-size: 10px;"></i></span>
                </div>
                <div class="d-flex justify-content-center gap-3">
                    <button type="button" class="btn btn-danger px-4"
                        onclick="showTambahTokoManual()">Batal</button>
                    <button type="button" class="btn btn-primary px-4" id="tambah"
                        onclick="tambahToko()">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</main>



    <!-- <div class="col-md-5 flex-column col-lg-5 p-0 rounded-top overflow-hidden"> -->
                <div class="bg-white custom-shadow pb-4">
                    <table class="table table-borderless   text-center p-0">
                        <thead style="background-color:#202B46; color:#ffffff;">
                            <tr>
                                <th class="col table-darks">No</th>
                                <th class="col table-darks">Nama Toko</th>
                                <th class="col table-darks">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr>
                                <td class="col pb-0 pt-3">1</td>
                                <td class="col text-truncate text-capitalize pb-0 pt-3">toko aneka jaya</td>
                                <td class="col pb-0 pt-3">
                                    <div class="d-flex justify-content-evenly">
                                        <button class="btn btn-sm text-center px-lg-4 rounded-2 btn-orange "
                                            data-bs-target="#ModalEdit" data-bs-toggle="modal">
                                            <span id="icon" class="fa-solid fa-pen"></span>
                                            <span id="text">Edit</span>
                                        </button>
                                        <button class="btn btn-sm text-center px-lg-3 rounded-2 btn-red"
                                            style="font-size: 12px;" data-bs-target="#ModalDelete" data-bs-toggle="modal">
                                            <span id="icon" class="fa-solid fa-trash"></span>
                                            <span id="text">Hapus</span>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col pb-0 pt-3">2</td>
                                <td class="col pb-0 pt-3 text-truncate text-capitalize">toko aneka jaya abadi</td>
                                <td class="col pb-0 pt-3">
                                    <div class="d-flex justify-content-evenly">
                                        <button class="btn btn-sm text-center px-lg-4 rounded-2 btn-orange"
                                            data-bs-target="#ModalEdit" data-bs-toggle="modal">
                                            <span id="icon" class="fa-solid fa-pen"></span>
                                            <span id="text">Edit</span>
                                        </button>
                                        <button class="btn btn-sm text-center px-lg-3 rounded-2 btn-red"
                                            style="font-size: 12px;" data-bs-target="#ModalDelete" data-bs-toggle="modal">
                                            <span id="icon" class="fa-solid fa-trash"></span>
                                            <span id="text">Hapus</span>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- pagination --}}
                    <div class="d-flex justify-content-end mx-4 mt-4">
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
                </div>
            </div>


    {{-- modal --}}
    <!-- modal edit-->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-body m-3">
                    <h5 class="text-center mb-4">Tambah Toko</h5>
                    <form action="" class="">
                        <label for="idToko" class="form-label" id="idTokoLabel">ID Toko</label>
                        <div class="mb-4 shadow">
                            <input type="number" class="form-control border-0 " id="idToko" disabled>
                        </div>
                        <label for="namaToko" class="form-label" id="namaTokoLabel">Nama Toko</label>
                        <div class="input-group rounded mb-4 shadow align-items-center">
                            <input type="text" class="form-control input-fields  border-0" id="namaToko">
                            <span><i class="fa-solid fa-pen mx-3" style="font-size: 10px;"></i></span>
                        </div>
                        <div class="d-flex justify-content-center gap-3">
                            <button type="button" class="btn btn-red px-4" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue px-4" onclick="editToko()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                        <button class="btn btn-blue" id="btn-ya" data-bs-dismiss="modal"
                            onclick="hapusToko()">Ya</button>
                        <button class="btn btn-red " data-bs-dismiss="modal">Batal</button>
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
    <script>
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
    </script>
    <script>
        function showSuksesModal() {
            $('#suksesModalTambah').modal('show');
            setTimeout(function() {
                $('#suksesModalTambah').modal('hide');
            }, 1500);
        }

        function showErorModal() {
            $('#erorModalTambah').modal('show');
            setTimeout(function() {
                $('#erorModalTambah').modal('hide');
            }, 1500);
        }

        function showSuksesModalEdit() {
            $('#ModalEdit').modal('hide');
            $('#suksesModalEdit').modal('show');
            setTimeout(function() {
                $('#suksesModalEdit').modal('hide');
            }, 1500);

        }

        function showErorModalEdit() {
            $('#ModalEdit').modal('hide');
            $('#erorModalEdit').modal('show');
            setTimeout(function() {
                $('#erorModalEdit').modal('hide');
            }, 1500);
        }

        function showSuksesModalDelete() {
            $('#suksesModalDelete').modal('show');
            setTimeout(function() {
                $('#suksesModalDelete').modal('hide');
            }, 1500);
        }

        function showErorModalDelete() {
            $('#erorModalDelete').modal('show');
            setTimeout(function() {
                $('#erorModalDelete').modal('hide');
            }, 1500);
        }

        // form auto / manual
        function showTambahTokoAuto() {
            document.getElementById("TambahTokoManual").classList.add("d-none");
            document.getElementById("TambahTokoAuto").classList.remove("d-none");
        }

        function showTambahTokoManual() {
            document.getElementById("TambahTokoAuto").classList.add("d-none");
            document.getElementById("TambahTokoManual").classList.remove("d-none");
        }

        function tambahToko() {
            // Logika untuk menambah toko manual
            var berhasil = true; // Ganti dengan logika sesuai kebutuhan

            if (berhasil) {
                showSuksesModal();
                showTambahTokoManual();
            } else {
                showErorModal();
                showTambahTokoManual();
            }
        }

        function editToko() {
            // Logika untuk menambah toko manual
            var berhasil = true; // Ganti dengan logika sesuai kebutuhan

            if (berhasil) {
                showSuksesModalEdit();
            } else {
                showErorModalEdit();
            }
        }

        function hapusToko() {
            // Logika untuk menambah toko manual
            var berhasil = false; // Ganti dengan logika sesuai kebutuhan

            if (berhasil) {
                showSuksesModalDelete();
            } else {
                showErorModalDelete();
            }
        }
    </script>
@endsection
