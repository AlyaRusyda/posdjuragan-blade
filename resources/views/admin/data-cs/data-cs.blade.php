@extends('layouts.mainA')

@section('css')
    <link rel="stylesheet" href="/assets/css/data-cs.css">
@endsection

@section('konten')
    <section class="container-data_cs rounded p-4">

        {{-- header --}}
        <div class="d-flex justify-content-between align-items-center mb-4 p-0">
            <h1 class="col-lg-8 col-md-7 d-flex header-text align-items-center ">{{ $title }}</h1>
            <div class="col-lg-4 col-md-5 d-flex  justify-content-center align-items-center gap-4 ">
                <a href="/admin/data-cs/add"  class="btn btn-lg btn-blue rounded-2 px-4 fs-6">Tambah</a>
                {{-- search --}}
                <div class="input-group  custom-shadow bg-white align-items-center ">
                    <input type="text" class="form-control form-control-lg input-fields border-0 ps-4"
                        placeholder="Cari CS" name="search" id="searchInput" value="{{ $search }}">
                    <button class="btn bg-white btn-groups pe-4 border-0" type="button" id="searchButton"><span><i
                                class="fa-solid fa-magnifying-glass text-muted"></i></span></button>
                </div>
            </div>
        </div>

        {{-- Header Profile --}}
        {{-- <article class="header-data_cs d-flex mx-5 my-4">
            <div class="align-items-center col-8">
                <h1 class="fs-2 fw-bold m-0 px-0"></h1>
            </div>
            <div class="tambah-cari-cs m-0 col-6 align-items-center d-flex">
                <a href="/admin/data-cs/add"
                    class="btn d-inline-block mx-2 me-4 rounded btn-tambah-cs text-decoration-none px-5 text-white h-48 p-2">Tambah</a>
                <input type="text" name="search" class="rounded-4 border-1 px-4 py-2" id="searchInput"
                    placeholder="Cari CS" value="{{ $search }}">
            </div>
        </article> --}}
        {{-- <article class="bg-white rounded-4 px-2 mx-5 mt-5 border-2 border-opacity-25 row mb-5">
            <table class="table-responsive">
                <thead class="text-center mb-2">
                    <tr>
                        <td scope="col" class="text-white tb-header p-2">ID CS</td>
                        <td scope="col" class="text-white tb-header">Nama CS</td>
                        <td scope="col" class="text-white tb-header">Toko</td>
                        <td scope="col" class="text-white tb-header">Email</td>
                        <td scope="col" class="text-white tb-header">No. Telepon</td>
                        <td scope="col" class="text-white tb-header">Opsi</td>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($data_cs as $cs)
                        <tr>
                            <td scope="row">{{ $cs['id'] }}</td>
                            <td>CS {{ $cs['name'] }}</td>
                            <td>{{ $cs['toko'] }}</td>
                            <td>{{ $cs['email'] }}</td>
                            <td>{{ $cs['hp'] }}</td>
                            <td>
                                <a href="/admin/data-cs/edit"
                                    class="btn d-inline-block my-2 mx-1 rounded-2 btn-edit-cs text-decoration-none px-5 text-white h-48 p-2">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="page justify-content-between">
                {{ $data_cs->links() }}
            </div>
        </article> --}}


        {{-- @if ($data_cs->count()) --}}
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
                    {{-- @foreach ($data_cs as $cs)
                            <tr>
                                <td scope="row" class="col pb-0 pt-3">{{ $cs['id'] }}</td>
                                <td class="col pb-0 pt-3">CS {{ $cs['name'] }}</td>
                                <td class="col pb-0 pt-3">{{ $cs['toko'] }}</td>
                                <td class="col pb-0 pt-3">{{ $cs['email'] }}</td>
                                <td class="col pb-0 pt-3">{{ $cs['hp'] }}</td>
                                <td class="col pb-0 pt-3">
                                    <div class="d-flex justify-content-center gap-lg-3 gap-md-1">
                                        <a href="/admin/data-cs/edit"
                                            class="btn btn-sm btn-orange px-lg-4 px-md-3  text-center rounded-2 fw-medium "
                                            style="font-size:12px;">Edit</a>
                                        <button class="btn btn-sm px-lg-3 px-md-2 btn-red text-center fw-medium rounded-2 "
                                            style="font-size:12px;" data-bs-target="#ModalDelete"
                                            data-bs-toggle="modal">Hapus</button>
                                </td>
                            </tr>
                        @endforeach --}}
                    <tr>
                        @foreach ( $data_cs as $data )


                        <td scope="row" class="col pb-0 pt-3">{{  $data->name }}</td>
                        <td class="col pb-0 pt-3">{{ $data->username }}</td>
                        <td class="col pb-0 pt-3"></td>
                        <td class="col pb-0 pt-3">{{ $data->email }}</td>
                        <td class="col pb-0 pt-3">{{  $data->phone_number }}</td>
                        <td class="col pb-0 pt-3">
                            <div class="d-flex justify-content-center gap-lg-3 gap-md-1">
                                <a href="/admin/data-cs/edit"
                                    class="btn btn-sm btn-orange px-lg-4 px-md-3  text-center rounded-2 fw-medium "
                                    style="font-size:12px;">Edit</a>
                                <button class="btn btn-sm px-lg-3 px-md-2 btn-red text-center fw-medium rounded-2 "
                                    style="font-size:12px;" data-bs-target="#ModalDelete"
                                    data-bs-toggle="modal">Hapus</button>
                        </td>
                         @endforeach
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
        {{-- @endif --}}




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


    </section>

    <script>





        function simpandata() {
            window.location.href = "/admin/data-cs/add";
        }
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const searchParam = urlParams.get('search');
            const searchInput = document.querySelector('input[name="search"]');

            // Memasukkan nilai pencarian ke dalam input
            searchInput.value = searchParam || '';

            // Menambahkan event listener pada input pencarian
            searchInput.addEventListener('input', function(event) {
                event.preventDefault();

                // Memperbarui URL dengan parameter pencarian
                const currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('search', this.value);

                // Mengarahkan pengguna ke URL yang diperbarui
                window.location.href = currentUrl.toString();
            });

            // Menghapus parameter pencarian jika input pencarian kosong
            searchInput.addEventListener('blur', function(event) {
                event.preventDefault();
                if (this.value.trim() === '') {
                    const currentUrl = new URL(window.location.href);
                    currentUrl.searchParams.delete('search');
                    window.location.href = currentUrl.toString();
                }
            })
        });
    </script>
@endsection
