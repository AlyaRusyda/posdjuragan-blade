@extends('layouts.mainSA')

@section('css')
    <link rel="stylesheet" href="/assets/css/profile.css">
@endsection

@section('konten')
    <section class="container-edit_profile rounded">
        {{-- Header Profile --}}
        <article class="header-edit_profile px-lg-4 px-md-4">
            <!-- <a href="/superadmin/profile" class="back-profile"><i class="fa-solid fa-arrow-left icon_back-profile"></i></a> -->
            <h1 class="text-white fs-2 fw-bold m-0 py-5">{{ $title }}</h1>
        </article>
        {{-- Akhir Header Profile --}}

        <div class="modal fade" id="actionModalTambah" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class=" my-5 d-flex flex-column justify-content-center ">
                        <img src="{{ asset('assets/img/sukses.png') }}" alt="" width="100px" class="mx-auto mb-2">
                        <small class="fw-bolder text-center ">Profile <span class="text-success ">Berhasil</span>
                            Diubah!</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="erorModalTambah" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class=" my-5 d-flex flex-column justify-content-center ">
                        <img src="{{ asset('assets/img/gagal.png') }}" alt="" width="100px" class="mx-auto mb-2">
                        <small class="fw-bolder text-center ">Profile <span class="text-danger">GAGAL</span>
                            Diubah!</small>
                        <span class="text-danger text-center">ERROR : message</span>
                    </div>
                </div>
            </div>
        </div>

        <article>
            <form class="bg-white pt-5 body-edit_profile d-flex justify-center align-items-center">
            <div
                class="mx-5 px-5 py-5 rounded-4 shadow border border-2 border-black border-opacity-25 edit-profile-container">
                <div>
                    <h4 class="text-black fw-bold m-0">Informasi Personal</h4>
                </div>
                <div class="row d-flex justify-content-between p-0 my-3">
                    <div class="col-lg-6 col-md-12 d-flex flex-column gap-1 mb-md-3">
                        <label class="text-secondary fw-semibold m-0">Nama</label>
                        <input class="text-black fs-6 fw-semibold px-3 py-3 rounded border-black border-opacity-50"
                            placeholder="{{ $profile['name'] }}">
                    </div>
                    <div class="col-lg-6 col-md-12 d-flex flex-column gap-1">
                        <label class="text-secondary fs-6 fw-semibold m-0">Nomor Handphone</label>
                        <input class="text-black fs-6 fw-semibold m-0 px-3 py-3 rounded border-black border-opacity-50"
                            placeholder="{{ $profile['no_hp'] }}">
                    </div>
                </div>
                <div class="col-lg-12 p-0">
                    <div class="d-flex flex-column gap-1">
                        <label class="text-secondary fs-6 fw-semibold col-lg-12 m-0">Email</label>
                        <input
                            class="text-black fs-6 fw-semibold col-lg-12 m-0 px-3 py-3 rounded border-black border-opacity-50"
                            placeholder="{{ $profile['email'] }}">
                    </div>

                </div>
                </div>
                <div class="d-flex gap-5 btn-edit_save my-5">
                <a href="/superadmin/profile" class="btn btn_batal-edit align-items-center">Batal</a>
                    <button class="btn btn-lg btn_simpan-edit" id="simpan" data-bs-target="#actionModalTambah"
                        data-bs-toggle="modal" data-bs-dismiss="modal">Simpan</button>
                </div>
            </form>
        </article>
    </section>
@endsection
