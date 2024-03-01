@extends('layouts.mainA')

@section('css')
    <link rel="stylesheet" href="/assets/css/profile.css">
@endsection

@section('konten')
    <section class="container-edit_profile rounded">
        {{-- Header Profile --}}
        <article class="header-edit_profile">
            <a href="/admin/data-cs" class="back-profile"><i class="fa-solid fa-arrow-left icon_back-profile"></i></a>
            <h1 class="text-white fs-2 fw-bold m-0 px-5 py-5">Ubah Password Cs</h1>
        </article>
        {{-- Akhir Header Profile --}}

        <div class="modal fade" id="actionModalTambah" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class=" my-5 d-flex flex-column justify-content-center ">
                        <img src="{{ asset('assets/img/sukses.png') }}" alt="" width="100px" class="mx-auto mb-2">
                        <small class="fw-bolder text-center ">Password <span class="text-success ">Berhasil</span>
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
                        <small class="fw-bolder text-center ">Password <span class="text-danger">GAGAL</span>
                            Diubah!</small>
                        <span class="text-danger text-center">ERROR : message</span>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('ubahPassword', $data->id) }}" method="POST">
            @csrf
            <article class="bg-white pt-5 body-edit_profile d-flex justify-center align-items-center">
                <div class="mx-5 px-5 py-1 rounded-4 border border-2 border-black border-opacity-25 row w-75">
                    <div class="col-lg-12 row mt-5">
                        <div class="col-lg-12 row py-4">
                            <label class="fs-4 fw-bold col-12 m-0 px-3 py-2">Password Lama <span
                                    class="text-danger">*</span></label>
                            <input class="fs-6 col-12 m-0 mx-3 px-3 py-3 rounded" type="password"
                                placeholder="Masukkan Password Lama" name="current_password">
                        </div>
                        <div class="col-lg-12 row py-3 mt-2">
                            <label class="fs-4 fw-bold col-12 m-0 px-3 py-2">Password Baru <span
                                    class="text-danger">*</span></label>
                            <input id="passwordInput" class="fs-6 col-12 m-0 mx-3 px-3 py-3 rounded" type="password"
                                placeholder="Masukkan Password Baru" name="new_password">
                            {{-- <div class="slider">
                                <div id="progressBar" class="progress-bar"></div>
                            </div> --}}
                            <p id="strengthText" class="strength-text">Gunakan minimal 8 karakter dengan kombinasi huruf dan
                                angka</p>
                        </div>
                        <div class="col-lg-12 row py-4 mb-5">
                            <label class="fs-4 fw-bold col-12 m-0 px-3 py-2">Konfirmasi Password Baru <span
                                    class="text-danger">*</span></label>
                            <input class="fs-6 col-12 m-0 mx-3 px-3 py-3 rounded" type="password"
                                placeholder="Ulangi Password Baru" name="new_password_confirmation">
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-5 btn-edit_save my-5">
                    <button class="btn btn_batal-edit">Batal</button>
                    <button class="btn btn_simpan-edit" id="simpan" data-bs-target="#actionModalTambah" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Simpan</button>
                </div>
            </article>
        </form>
    </section>
    {{-- <script>
        document.getElementById("passwordInput").addEventListener("input", function() {
            var passwordInput = document.getElementById("passwordInput").value;
            var progressBar = document.getElementById("progressBar");
            var strengthText = document.getElementById("strengthText");

            // Pemeriksaan kekuatan password
            var weakRegex = /^(?=.*[a-zA-Z])(?=.*\d).{8,}$/;
            var mediumRegex = /^(?=.*[a-z])(?=.*\d).{8,}$/;
            var strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

            if (passwordInput.length < 8) {
                progressBar.style.width = "8%";
                progressBar.className = "progress-bar weak";
                strengthText.innerText = "Password Tidak Aman. Gunakan minimal 8 karakter.";
            } else if (strongRegex.test(passwordInput)) {
                progressBar.style.width = "102%";
                progressBar.className = "progress-bar strong";
                strengthText.innerText = "Password Kuat";
            } else if (mediumRegex.test(passwordInput)) {
                progressBar.style.width = "66%";
                progressBar.className = "progress-bar medium";
                strengthText.innerText = "Password Sedang";
            } else if (weakRegex.test(passwordInput)) {
                progressBar.style.width = "33%";
                progressBar.className = "progress-bar weak";
                strengthText.innerText = "Lemah, kombinasikan huruf (a-z, A-z) dan angka (0-9)";
            } else {
                progressBar.style.width = "0%";
                strengthText.innerText = "Gunakan minimal 8 karakter dengan kombinasi huruf dan angka";
            }
        });
    </script> --}}
@endsection
