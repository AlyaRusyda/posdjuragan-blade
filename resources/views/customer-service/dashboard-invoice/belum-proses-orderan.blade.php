@section('css')
    <style>
        #btn-belum-proses {
            background-color: #202B46;
            color: white;
        }

        #navbar-dashboard {
            color: white !important;
            font-weight: 600 !important;
        }

        .wadah-jalan {
            overflow: hidden;
        }

        .jalan {
            width: 130%;
            white-space: nowrap;
            overflow: hidden;
            animation: moveLeft 10s linear infinite;
        }

        @keyframes moveLeft {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-35%);
            }
        }
    </style>
    <link rel="stylesheet" href="/assets/css/dashboard-cs.css">
@endsection

<body>
    @extends('layouts.mainCS')
    @section('konten')
        <div class="container-fluid justify-content-center p-0 ">
            {{-- running text bagi yang sudah closing  --}}
            {{-- <div class="wadah-jalan w-100 ">
                <div class="jalan">
                    <i class="fab fa-google-wallet me-2"></i> Selamat kepada Emery Donin dari Korean Hunter sudah
                    melakukan
                    closing<i class="fa-solid fa-bullhorn ms-2 me-2"></i><i class="fa-solid fa-bullhorn"></i>
                </div>
            </div> --}}
            <marquee class="w-100">
                <i class="fab fa-google-wallet me-2"></i> Selamat kepada Emery Donin dari Korean Hunter sudah
                melakukan
                closing<i class="fa-solid fa-bullhorn ms-2 me-2"></i><i class="fa-solid fa-bullhorn"></i>
            </marquee>

            <div class="w-100 justify-content-center">
                <div class="top-content mt-5 col-12 ">

                    @include('customer-service.dashboard-invoice.layouts.button')
                </div>
            </div>
            <!--card-->

            <div class="d-flex justify-content-center ">

                <div class="main-content col-lg-11 p-0 col-md-10 justify-content-center">
                    <!-- Konten utama Anda di sini -->
                    <form action="" class="form-container">




                        {{-- implementasi array menampilkan ke blade --}}
                        @foreach ($orderan as $data)
                        <div id="maincard" class="card mt-5 rounded-3 custom-input">
                            <!--atas-->
                            <div class="card-header d-flex dashed-line  flex-row justify-content-between">
                                <!--card atas kiri-->
                                <div class="card-atas-kiri d-flex flex-row" style="box-sizing: border-box;">
                                    <input style="width: 180px; height:50px; font-weight:bold; font-size:20px"
                                        class="rounded ms-3 text-center mt-3 fzt6 card-atas-satu" type="text"
                                        value="#{{ $data->order_number }}" readonly>

                    
                                    <div style="font-size:16px; margin-left:100px;" class="mt-1 card-atas-dua">
                                        <input style="width: 180px" type="text" class="form-control-plaintext  fzt6" readonly
                                            value="{{ $data->order_date }}">
                    
                                        <input style="width: 180px" type="text" class="form-control-plaintext  fzt6" readonly
                                            value="{{ $data->juragan }}">
                                    </div>
                                </div>

                                    <!--card atas kanan-->
                                    @if ($data->paid_amount == 0 || ($data->paid_amount > 0 && $data->status == 'belum_proses'))
                                        <div class="mt-3" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            data-bs-title="Pesanan ditambahkan" data-bs-custom-class="custom-tooltip">
                                            <svg class="ikon-satu" width="48" height="63" viewBox="0 0 48 63"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M28.7457 20.482H24.7896V24.4381C24.7896 24.6479 24.7063 24.8491 24.5579 24.9975C24.4095 25.1459 24.2083 25.2293 23.9984 25.2293C23.7886 25.2293 23.5873 25.1459 23.439 24.9975C23.2906 24.8491 23.2072 24.6479 23.2072 24.4381V20.482H19.2512C19.0413 20.482 18.8401 20.3987 18.6917 20.2503C18.5433 20.1019 18.46 19.9006 18.46 19.6908C18.46 19.481 18.5433 19.2797 18.6917 19.1313C18.8401 18.983 19.0413 18.8996 19.2512 18.8996H23.2072V14.9436C23.2072 14.7337 23.2906 14.5325 23.439 14.3841C23.5873 14.2357 23.7886 14.1523 23.9984 14.1523C24.2083 14.1523 24.4095 14.2357 24.5579 14.3841C24.7063 14.5325 24.7896 14.7337 24.7896 14.9436V18.8996H28.7457C28.9555 18.8996 29.1568 18.983 29.3051 19.1313C29.4535 19.2797 29.5369 19.481 29.5369 19.6908C29.5369 19.9006 29.4535 20.1019 29.3051 20.2503C29.1568 20.3987 28.9555 20.482 28.7457 20.482Z"
                                                    fill="#24A240" />
                                                <circle cx="23.9987" cy="19.6911" r="13.5385" stroke="#24A240"
                                                    stroke-width="2.46154" />
                                                <circle cx="23.9991" cy="43.6905" r="4.30769" fill="#24A240" />
                                                <path
                                                    d="M13.7012 57.3262C14.4828 56.6985 15.0951 56.1846 15.5382 55.7846C15.9812 55.3785 16.3535 54.9569 16.6551 54.52C16.9628 54.0769 17.1166 53.6431 17.1166 53.2185C17.1166 52.8185 17.0182 52.5046 16.8212 52.2769C16.6305 52.0431 16.3197 51.9262 15.8889 51.9262C15.4705 51.9262 15.1443 52.0585 14.9105 52.3231C14.6828 52.5815 14.5597 52.9292 14.5412 53.3662H13.7289C13.7535 52.6769 13.9628 52.1446 14.3566 51.7692C14.7505 51.3938 15.2582 51.2062 15.8797 51.2062C16.5135 51.2062 17.0151 51.3815 17.3843 51.7323C17.7597 52.0831 17.9474 52.5662 17.9474 53.1815C17.9474 53.6923 17.7935 54.1908 17.4859 54.6769C17.1843 55.1569 16.8397 55.5815 16.452 55.9508C16.0643 56.3138 15.5689 56.7385 14.9659 57.2246H18.1412V57.9262H13.7012V57.3262ZM19.1123 54.5938C19.1123 53.5354 19.2846 52.7108 19.6292 52.12C19.9738 51.5231 20.5769 51.2246 21.4384 51.2246C22.2938 51.2246 22.8938 51.5231 23.2384 52.12C23.583 52.7108 23.7553 53.5354 23.7553 54.5938C23.7553 55.6708 23.583 56.5077 23.2384 57.1046C22.8938 57.7015 22.2938 58 21.4384 58C20.5769 58 19.9738 57.7015 19.6292 57.1046C19.2846 56.5077 19.1123 55.6708 19.1123 54.5938ZM22.9246 54.5938C22.9246 54.0585 22.8877 53.6062 22.8138 53.2369C22.7461 52.8615 22.6015 52.56 22.38 52.3323C22.1646 52.1046 21.8507 51.9908 21.4384 51.9908C21.02 51.9908 20.7 52.1046 20.4784 52.3323C20.263 52.56 20.1184 52.8615 20.0446 53.2369C19.9769 53.6062 19.943 54.0585 19.943 54.5938C19.943 55.1477 19.9769 55.6123 20.0446 55.9877C20.1184 56.3631 20.263 56.6646 20.4784 56.8923C20.7 57.12 21.02 57.2338 21.4384 57.2338C21.8507 57.2338 22.1646 57.12 22.38 56.8923C22.6015 56.6646 22.7461 56.3631 22.8138 55.9877C22.8877 55.6123 22.9246 55.1477 22.9246 54.5938ZM28.1855 49.3046L25.6562 59.5692H24.8255L27.3455 49.3046H28.1855ZM30.3786 56.2092C30.4401 56.56 30.5816 56.8308 30.8032 57.0215C31.0309 57.2123 31.3355 57.3077 31.717 57.3077C32.2278 57.3077 32.6032 57.1077 32.8432 56.7077C33.0893 56.3077 33.2063 55.6338 33.194 54.6862C33.0647 54.9631 32.8493 55.1815 32.5478 55.3415C32.2463 55.4954 31.9109 55.5723 31.5416 55.5723C31.1293 55.5723 30.7601 55.4892 30.434 55.3231C30.114 55.1508 29.8616 54.9015 29.677 54.5754C29.4924 54.2492 29.4001 53.8554 29.4001 53.3938C29.4001 52.7354 29.5909 52.2062 29.9724 51.8062C30.354 51.4 30.8955 51.1969 31.597 51.1969C32.4586 51.1969 33.0616 51.4769 33.4063 52.0369C33.757 52.5969 33.9324 53.4308 33.9324 54.5385C33.9324 55.3138 33.8616 55.9538 33.7201 56.4585C33.5847 56.9631 33.3509 57.3477 33.0186 57.6123C32.6924 57.8769 32.2432 58.0092 31.6709 58.0092C31.0432 58.0092 30.554 57.84 30.2032 57.5015C29.8524 57.1631 29.6524 56.7323 29.6032 56.2092H30.3786ZM31.6801 54.8615C32.0924 54.8615 32.4309 54.7354 32.6955 54.4831C32.9601 54.2246 33.0924 53.8769 33.0924 53.44C33.0924 52.9785 32.9632 52.6062 32.7047 52.3231C32.4463 52.04 32.0832 51.8985 31.6155 51.8985C31.1847 51.8985 30.8401 52.0338 30.5816 52.3046C30.3293 52.5754 30.2032 52.9323 30.2032 53.3754C30.2032 53.8246 30.3293 54.1846 30.5816 54.4554C30.834 54.7262 31.2001 54.8615 31.6801 54.8615Z"
                                                    fill="#24A240" />
                                            </svg>
                                        </div>
                                    @endif


                                </div>
                                <!--bawah-->
                                <div class="card-body d-flex   row gap-0 justify-content-evenly">
                                    <!--bawah satu-->
                                    <div class="col-3 p-0 ">
                                        <div class="card-body">
                                            <div class="mb-2">

                                                <label for="pemesan" class="form-label fzt7">Pemesan / Dikirim
                                                    kepada</label>
                                                <input class="fzt7"
                                                    style="border: none;background-color:white;font-weight:bold; font-size:20px"
                                                    type="text" class="form-control mb-0 ms-0" id="pemesan" readonly
                                                    value="{{ $data->customer_name }}">
                                                <label for="nohp" class="form-label"></label>
                                                <input class="fzt7"
                                                    style="border: none; background-color:white; font-weight:bold; font-size:20px"
                                                    type="number" class="form-control mb-0 ms-0" id="nohp" readonly
                                                    value="{{ $data->customer_phone }}">
                                                <label for="metode" class="form-label"></label>

                                                <input class="fzt6"
                                                    style="border: none; background-color:white; font-weight:bold; font-size: 20px"
                                                    type="text" class="form-control" id="metode" readonly
                                                    value="{{ $data->payment_method }}">
                                            </div>
                                            <div class="mb-2">
                                                <label for="asalorderan" class="fzt6">Asal Orderan</label>
                                                <input class="fzt6"
                                                    style="border: none; background-color:white; font-weight:bold; font-size: 20px"
                                                    class="form-control" type="text" id="asalorderan" readonly
                                                    value="{{ $data->source }}">
                                            </div>
                                            <div class="mb-4 d-flex flex-column">
                                                <label for="cs" class="fzt6">Dilayani</label>
                                                <div class="p-scroll">
                                                    <p class="fzt7"><b>{{ $data->served_by }}</b></p>
                                                </div>
                                            </div>

                                            @if ($data->paid_amount >= 0 && $data->status == 'belum_proses')
                                                <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    type="button"
                                                    class="rounded p-1  justify-content-center flex-lg-row flex-md-column"
                                                    style="background-color: #202B46; color:white"
                                                    data-idpelanggan = "{{ $data->id_customer }}">
                                                    <small class="me-2 fzt6 col-12 text-center "><i
                                                            class="fa-regular fa-square-plus m-1"></i>Tambah
                                                        Pembayaran</small></button>
                                            @endif

                                        </div>
                                    </div>
                                    <!--bawah dua -->
                                    <div class=" col-2 p-0 ">
                                        <div class="card-body" style="font-size: 15px">
                                            <p class="fzt7">Produk <i class="fa-solid fa-circle-info"></i></p>
                                            <div>
                                                @foreach ($orderan as $item)
                                                    <div class="d-flex">
                                                        <label style="margin-top: 0; padding-top: 0;"
                                                            class="form-label col  fzt7"><strong>{{ $item->kd_produk }}</strong></label><span
                                                            class="col fzt6">X {{ $item->quantity }}</span>
                                                    </div>
                                                    <input class="fzt7"
                                                        style="border: none;background-color:white;font-size: 15px; margin-top: 0; padding-top: 0; width: 50px"
                                                        type="text" class="form-control text-center" readonly
                                                        value="{{ $item->size }}">
                                                @endforeach
                                                <hr style="height: 2px; border:none; color:black; background-color:black">
                                                <div class="d-flex">
                                                    <p class="fw-bold col fzt7">Total</p>
                                                    <p class="fw-bold col fzt7">= {{ $data->quantity }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--bawah tiga -->
                                    <div class=" col-4 p-0">
                                        <div class="card rounded-3">
                                            {{-- header berwarna merah apabila belum dibayar sama sekali --}}
                                            @if ($data->paid_amount == 0)
                                                <div class="card-header P-4 wajib-bayar custom-input"
                                                    style="display: absolute; z-index:1; background : linear-gradient(to bottom, #FF8E8E, #FFFFFF)">
                                                    <h5 class="text-center fs-4  fzt7" style="font-weight: bold">Wajib
                                                        Bayar RP
                                                        {{ number_format($data->total_amount, 0, ',', '.') }}</h5>
                                                </div>
                                            @endif

                                            {{-- header berwarna kuning apabila dibayar sebagian --}}
                                            @if ($data->paid_amount < $data->total_amount && $data->paid_amount > 0)
                                                <div class="card-header P-4 wajib-bayar custom-input"
                                                    style="display: absolute; z-index:1; background : linear-gradient(to bottom, #FDF771, #FFFFFF)">
                                                    <h5 class="text-center fs-4  fzt7" style="font-weight: bold">Wajib
                                                        Bayar RP
                                                        {{ number_format($data->total_amount, 0, ',', '.') }}</h5>
                                                </div>
                                            @endif

                                            {{-- header berwarna hijau apabila sudah dibayar lunas --}}
                                            @if ($data->paid_amount == $data->total_amount)
                                                <div class="card-header P-4 wajib-bayar custom-input"
                                                    style="display: absolute; z-index: 1; background: linear-gradient(to bottom, #4FDF6F, #FFFFFF);">
                                                    <h5 class="text-center fs-4 fzt7" style="font-weight: bold">Lunas
                                                        {{ number_format($data->total_amount, 0, ',', '.') }}</h5>
                                                </div>
                                            @endif

                                            {{-- isi card body --}}
                                            <div class="card-body fs-5 " style="background-color: #EDEDED">
                                                <table class="table table-borderless fw-bold fs-5 ">
                                                    <tr>
                                                        <td style="background-color: #EDEDED" class="fzt6">Harga Produk
                                                        </td>
                                                        <td id="total" style="background-color: #EDEDED"
                                                            class="fzt6">RP
                                                            {{ number_format($data->total_amount, 0, ',', '.') }}</td>
                                                    </tr>
                                                </table>
                                                <hr style="border-bottom: 3px solid black">
                                                <table class="table table-borderless fw-bold">
                                                    <tr>
                                                        <td style="background-color: #EDEDED" class="fzt6">Terbayar</td>
                                                        <td id="terbayar" style="background-color: #EDEDED"
                                                            class="fzt6">RP
                                                            {{ number_format($data->paid_amount, 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: #EDEDED" class="fzt6">Kekurangan
                                                        </td>
                                                        <td id="kekurangan" style="background-color: #EDEDED"
                                                            class="fzt6">RP
                                                            {{ number_format(max(0, $data->total_amount - $data->paid_amount), 0, ',', '.') }}
                                                        </td>
                                                    </tr>
                                                </table>

                                                {{-- status lunas akan muncul apabila sudah terbayar semua --}}
                                                @if ($data->total_amount == $data->paid_amount)
                                                    <div id="status-lunas"
                                                        class="border border-secondary p-2 ftz5 mb-2 text-center rounded-3 custom-input"
                                                        style="font-weight: bold; color:#ccc;">LUNAS</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!--bawah emoat-->
                                    {{-- note keterangan --}}
                                    <div class=" col-3 p-0 ">
                                        <div class="card-body" style="font-size: 18px">
                                            <p style="font-weight: 900; color:#ccc" class="fzt6">Keterangan</p>
                                            @php
                                                // Ubah jumlah kata yang diinginkan sesuai kebutuhan
                                                $limitedNote = Str::limit($data->notes, $limit = 50, $end = '...');
                                            @endphp
                                            <div class="note-section">
                                                <div class="limited-note">
                                                    <p class="fzt5">{{ $limitedNote }}</p>
                                                </div>
                                                <div class="full-note"
                                                    style="display: none; margin-top: 0; padding-top: 0;">
                                                    @foreach (explode("\n", $data->notes) as $noteLine)
                                                        <p class="fzt5" style="margin: 0; padding: 0;">
                                                            {{ $noteLine }}</p>
                                                    @endforeach
                                                </div>
                                                <a href="#" class="show-more fzt6"
                                                    onclick="toggleNoteVisibility(this); return false;">Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>




                                </div>



                            </div>
                        @endforeach


                        {{-- popup tambah pembayaran --}}

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="margin-left: 120px">
                                            Tambah
                                            Pembayaran</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6 class="text-center bg-warning mb-4 p-2 rounded">Detail Pembayaran tidak bisa
                                            diganti
                                            atau diubah</h6>
                                        <form>
                                            <div class="d-flex">
                                                <div class="mb-3 me-3">
                                                    <label for="tujuan-pembayaran" class="col-form-label">Tujuan
                                                        Pembayaran</label>
                                                    <select class="form-select custom-input"
                                                        aria-label="Default select example" id="tujuan-pembayaran"
                                                        style="width: 200px">
                                                        <option selected>Pilih Tujuan</option>
                                                        <option value="BRI">BRI</option>
                                                        <option value="BCA">BCA</option>
                                                        <option value="BNI">BNI</option>
                                                        <option value="Mandiri">Mandiri</option>
                                                        <option value="BSI">BSI</option>
                                                        <option value="COD">COD</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 ms-5">
                                                    <label for="tanggal-bayar" class="col-form-label">Tanggal
                                                        Bayar</label>
                                                    <input type="date" class="form-control custom-input"
                                                        id="tanggal-bayar" style="width: 200px">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jumlah-dana" class="col-form-label">Jumlah Dana</label>
                                                <input type="text" class="form-control custom-input" id="jumlah-dana"
                                                    style="width: 200px">
                                            </div>
                                    </div>
                                    <div class="modal-footer justify-content-start">
                                        <button type="button" id="liveToastBtn" class="btn btn-primary"
                                            onclick="hitungKekurangan()">Simpan</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>


        {{-- popup request edit orderan --}}
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="margin-left: 120px">Request Edit
                            Orderan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="id-pemesanan" class="col-form-label">ID Pemesanan</label>
                                <input type="text" class="form-control custom-input" id="id-pemesanan"
                                    style="width: 200px" placeholder="ID Pemesanan" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="col-form-label">Keterangan</label>
                                <textarea class="form-control custom-input" id="keterangan" style="height: 300px"
                                    placeholder="Nama masukan = keterangan
Cth
1.  Asal Orderan = Facebook
2. Nama Pelanggan = Stephany"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Kirim</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- popup cari orderan --}}
        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg"> <!-- Menambahkan class modal-lg -->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="d-flex">
                                <div class="mb-3 me-3">
                                    <label for="opsi-pembayaran" class="col-form-label">Opsi Pembayaran 1</label>
                                    <select class="form-select custom-input" aria-label="Default select example"
                                        id="opsi-pembayaran" style="width: 200px">
                                        <option selected>Pilih Pembayaran</option>
                                        <option value="BRI">BRI</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BNI">BNI</option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="BSI">BSI</option>
                                        <option value="COD">COD</option>
                                    </select>
                                </div>

                                <div class="mb-3 me-3 ms-3">
                                    <label for="opsi-orderan" class="col-form-label">Opsi Orderan</label>
                                    <select class="form-select custom-input" aria-label="Default select example"
                                        id="opsi-orderan" style="width: 200px">
                                        <option selected>Pilih opsi order</option>
                                        <option value="Sedang Diproses">Sedang Diproses</option>
                                        <option value="Belum Diproses">Belum Diproses</option>
                                        <option value="Orderan Selesai">Orderan Selesai</option>
                                    </select>
                                </div>

                                <div class="mb-3 me-3 ms-3">
                                    <label for="opsi-pengiriman" class="col-form-label">Opsi Pengiriman</label>
                                    <select class="form-select custom-input" aria-label="Default select example"
                                        id="opsi-pengiriman" style="width: 25  0px">
                                        <option selected>Pilih opsi pengiriman</option>
                                        <option value="Belum Dikirim">Belum Dikirim</option>
                                        <option value="Sudah Dikirim">Sudah Dikirim</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="mb-3 me-3">
                                    <label for="opsi-pencarian" class="col-form-label">Opsi Pencarian</label>
                                    <select class="form-select custom-input" aria-label="Default select example"
                                        id="opsi-pencarian" style="width: 200px">
                                        <option selected>Nama Pelanggan</option>
                                        <option value="Stevan">Stevan</option>
                                        <option value="Bambang">Bambang</option>
                                        <option value="Joko">Joko</option>
                                        <option value="Budi">Budi</option>
                                        <option value="Supri">Supri</option>
                                        <option value="Waluyo">Waluyo</option>
                                    </select>
                                </div>
                                <div class="mb-3 me-3 mt-4 ms-3">
                                    <label for="tanggal-pencarian" class="col-form-label"></label>
                                    <input type="date" class="form-control custom-input" id="tanggal-pencarian">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-start">
                                <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        {{-- toast pembayaran berhasil --}}
        <div class="toast-container position-absolute bottom-0 start-50 translate-middle-x">
            <div id="pembayaranberhasil" class="toast rounded-4" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="toast-body bg-white text-center p-3">
                    <img src="/assets/img/checklist.png" alt="" style="width: 80px; height:80px">
                    <h6 class="mt-3 mb-3">Pembayaran <span style="color: #58D91B">Berhasil</span> Ditambahkan</h6>
                </div>
            </div>
        </div>

        {{-- toast pembayaran gagal --}}
        <div class="toast-container position-absolute bottom-0 start-50 translate-middle-x">
            <div id="pembayarangagal" class="toast rounded-4" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body bg-white text-center p-3">
                    <img src="/assets/img/gagal.png" alt="" style="width: 180px; height:80px">
                    <h6 class="mt-3 mb-3">Pembayaran <span style="color: #F44336">GAGAL</span> Ditambahkan</h6>
                    <h6 class="text-center text-danger">ERROR: Message</h6>
                </div>
            </div>
        </div>

        {{-- toast ketika request berhasil dikirim --}}
        <div class="toast-container position-absolute bottom-0 start-50 translate-middle-x">
            <div id="requestberhasil" class="toast rounded-4" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body bg-white text-center p-3">
                    <img src="/assets/img/checklist.png" alt="" style="width: 80px; height:80px">
                    <h6 class="mt-3 mb-3">Request <span style="color: #58D91B">Berhasil</span> Dikirim</h6>
                </div>
            </div>
        </div>

        </div>
    @section('js')
        <!-- Skrip JavaScript untuk menangani perhitungan kekurangan -->
        <script>
              $.ajax({
                url:'http://127.0.0.1:8000/api/cs/belum-proses-orderan',
                type:'GET',
                dataType: 'json',
                success:function(response){
                    console.log(response);
                    // window.location.href="semua-orderanCS";
                },
                error:function(error){
                    console.error(error);
                }
                })
            //menampilkan alert pembayaran dan request berhasil
            const toastTrigger = document.getElementById('liveToastBtn');
            const toastLiveExample = document.getElementById('pembayaranberhasil');
            const toastLiveExample2 = document.getElementById('pembayarangagal');

            if (toastTrigger) {

                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample2);

                toastTrigger.addEventListener('click', () => {
                    toastBootstrap.show();
                    setTimeout(() => {
                        toastBootstrap.hide();
                    }, 1000);
                });
            }

            // menghitung kekurangan pembayaran
            // Ambil nilai total dan terbayar dari PHP ke JavaScript
            // var total = <?php echo $data->total_amount; ?>;
            // var terbayar = <?php echo $data->paid_amount; ?>;

            // var kekurangan = Math.max(0, total - terbayar);

            // Tampilkan kekurangan di elemen dengan id "kekurangan"
            document.getElementById("kekurangan").innerHTML = "RP " + kekurangan.toLocaleString();


            //melihat selengkapnya
            function toggleNoteVisibility(link) {
                var noteSection = link.closest('.note-section');
                var limitedNote = noteSection.querySelector('.limited-note');
                var fullNote = noteSection.querySelector('.full-note');
                var showMoreLink = noteSection.querySelector('.show-more');

                if (limitedNote.style.display === 'none') {
                    limitedNote.style.display = 'block';
                    fullNote.style.display = 'none';
                    showMoreLink.innerHTML = 'Selengkapnya';
                } else {
                    limitedNote.style.display = 'none';
                    fullNote.style.display = 'block';
                    showMoreLink.innerHTML = 'Tutup';
                }
            }
        </script>
    @endsection

    <div class="mt-3 d-flex sticky-bottom  justify-content-end  ">
        <button type="button" class="btn btn-primary me-2 fzt8" id="request" data-bs-toggle="modal"
            data-bs-target="#exampleModal2">Request Edit Orderan</button>
    </div>
@endsection
</body>

</html>
