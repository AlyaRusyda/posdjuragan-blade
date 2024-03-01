@extends('layouts.password')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/password.css') }}">
@endsection

@section('konten')
    <main class="p-5 p-md-0">
        <div class="container mt-5 ">
            <div class="row content-center align-items-start align-items-md-center ">
                <div class="col-12 col-md-6">
                    <img src="{{ asset('assets/img/verif.png') }}" class="img-fluid mx-auto d-block">
                </div>
                <div class="col-12 col-md-6">
                    <form class="text-center ">
                        <h2 class="text-capitalize mb-3 text-muted">Kode Verifikasi</h2>
                        <p class="text-muted mb-0">4 digit kode telah dikirimkan ke email</p>
                        <p class="mb-5">{{ $email }}</p>

                        <div class="otp-container justify-content-center">
                            <!-- OTP Input 1 -->
                            <input type="text" maxlength="1" class="form-control text-center square-input shadow-sm"
                                id="otp1" oninput="moveToNext(this)" />
                            <!-- OTP Input 2 -->
                            <input type="text" maxlength="1" class="form-control text-center square-input shadow-sm"
                                id="otp2" oninput="moveToNext(this)" />
                            <!-- OTP Input 3 -->
                            <input type="text" maxlength="1" class="form-control text-center square-input shadow-sm"
                                id="otp3" oninput="moveToNext(this)" />
                            <!-- OTP Input 4 -->
                            <input type="text" maxlength="1" class="form-control text-center square-input shadow-sm"
                                id="otp4" />
                        </div>
                        <div class="center-content mt-5">
                            {{-- <button type="submit" class="mt-4 btn btn-primary btn-md w-50 hover:btn-light">Kirim</button> --}}
                            <a href="/password/reset" class="btn btn-primary btn-md hover:btn-light" id="verifButton">Kirim</a>
                            <div class="d-flex mt-2">
                                <button href="/password" id="resendLink"
                                    class="border-0 text-black text-decoration-underline bg-transparent" disabled>Kirim Ulang
                                </button>
                                <div id="countdown" class="countdown">01:00</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        var countdown = 60;

        function startCountdown() {
            var timer = setInterval(function() {
                countdown--;
                var minutes = Math.floor(countdown / 60);
                var seconds = countdown % 60;

                var formattedTime =
                    (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

                document.getElementById('countdown').innerText = formattedTime;

                // Disable "Kirim Ulang" link when countdown reaches 0
                if (countdown <= 0) {
                    clearInterval(timer);
                    document.getElementById('resendLink').disabled = false;
                }
            }, 1000);
        }

        function moveToNext(input) {
            // Get the current input's length
            const length = input.value.length;

            // If the input is filled, move focus to the next input
            if (length === 1) {
                const nextId = input.id.substring(0, input.id.length - 1) + (parseInt(input.id.slice(-1)) + 1);
                const nextInput = document.getElementById(nextId);

                if (nextInput) {
                    nextInput.focus();
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            startCountdown();
        });
    </script>
@endsection
