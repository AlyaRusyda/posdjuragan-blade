@extends('layouts.password')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/password.css') }}" />
@endsection

@section('konten')
    <main class="m-auto content-center ">
        <div class="container mt-5 ">
            <div class="row align-items-center pt-5">
                <div class="col-12 col-md-6">
                    <img src="{{ asset('assets/img/reset.png') }}" class="img-fluid mx-auto d-block">
                </div>
                <div class=" col-12 col-md-6 mt-4 mt-md-0 d-flex aligin-items-center justify-content-center ">
                    <form id="resetForm" class="w-100 d-flex flex-column align-items-center justify-content-center ">
                        <h2 class="text-capitalize mb-5 mb-md-4 mt-md-0 mb-lg-5 mt-lg-3 text-muted">reset password</h2>
                        <div class="flex-column w-100 justify-content-center align-items-center mb-5 mb-md-4 mb-lg-5 small">
                            <input type="password"
                                class="w-100 border-0 border-bottom border-black/90 bg-transparent p-1 opacity-75 mb-4"
                                placeholder="Password Baru" />
                            <input type="password"
                                class="w-100 border-0 border-bottom border-black/90 bg-transparent p-1 opacity-75"
                                placeholder="Konfirmasi Password Baru" />
                        </div>
                        {{-- <button type="submit" class="mt-4 btn btn-primary btn-md w-50 hover:btn-light">Kirim</button> --}}
                        <a href="/password/verifikasi" class="mt-2 btn btn-primary btn-md w-50 hover:btn-light"
                            id="forgotButton">Kirim</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
