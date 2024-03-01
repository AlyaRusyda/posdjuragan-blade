<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    {{-- bootsrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- font open sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- font montserat & poopins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Open+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    {{-- kit --}}

    <script src="https://kit.fontawesome.com/f2a54a3122.js" crossorigin="anonymous"></script>

    {{-- link online font awesome version 6.4.2 --}}
    <script src="https://kit.fontawesome.com/3aff193c83.js" crossorigin="anonymous"></script>

    {{-- jquery --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    {{-- Apex Charts Js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.1/apexcharts.min.js"
        integrity="sha512-mDe5mwqn4f61Fafj3rll7+89g6qu7/1fURxsWbbEkTmOuMebO9jf1C3Esw95oDfBLUycDza2uxAiPa4gdw/hfg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.1/apexcharts.min.css"
        integrity="sha512-qc0GepkUB5ugt8LevOF/K2h2lLGIloDBcWX8yawu/5V8FXSxZLn3NVMZskeEyOhlc6RxKiEj6QpSrlAoL1D3TA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('css')

</head>

<body>
    @foreach ($alert as $index => $info)
        @if ($info['status'] == 'diedit' || $info['status'] == 'diterima' || $info['status'] == 'ditolak')
            <div style="position: fixed; z-index: 2; top: 10%; left: 50%; width: 50%; transform: translate(-50%, 50%);"
                class="toast-info rounded-3 bg-white mx-auto h-auto" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="toast-body d-flex position-relative d-flex align-items-center">
                    <!-- Menambahkan class position-relative -->
                    @if ($info['status'] == 'diedit')
                        <div class="rounded-3 p-2" style="background-color: #0091FF"><i style="color: white"
                                class="fa-solid fa-file-pen fs-4 mt-1"></i></div>
                    @elseif ($info['status'] == 'diterima')
                        <div class="rounded-3 p-2" style="background-color: #ccc"><i style="color: white"
                                class="fa-solid fa-circle-info fs-4 mt-1"></i></div>
                    @elseif ($info['status'] == 'ditolak')
                        <div class="rounded-3 p-2" style="background-color: red"><i style="color: white"
                                class="fa-solid fa-circle-xmark fs-4 mt-1"></i></i></div>
                    @endif
                    <div class="ms-3">[{{ $info['hari'] }} {{ $info['tanggal'] }} ({{ $info['jam'] }})]
                        {{ $info['info'] }}
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    {{-- section navbar --}}

    <section>
        {{-- navbar --}}
        @include('partials.navbarCS')
    </section>

    {{-- section untuk semua konten --}}
    <section>
        @yield('konten')
    </section>
    <script>
        //memunculkan tooltip
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>


    @yield('js')

</body>

</html>
