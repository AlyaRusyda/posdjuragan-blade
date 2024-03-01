@if (session()->has('success'))
    <div class="session-card p-4">
        <img src="/assets/icons/checklist.png" alt="checklist" style="margin-right: 10px;">
        <h3 class="mt-3">{!! session('success') !!}</h3>
    </div>
@endif

@if (session()->has('error') || $errors->any())
    <div class="session-error p-4">
        <img src="/assets/icons/gagal.png" alt="error" style="margin-right: 10px;">
        <h3 class="mt-3">
            @if (session()->has('error'))
                {!! session('error') !!}
            @else
                Terjadi Kesalahan:
            @endif
        </h3>
        @if ($errors->any())
            <ul class="mt-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endif
{{-- CARD BELUM PROSES DASHBOARD ADMIN --}}
@if (isset($orders))
    @foreach ($orders as $order)
        <article class="pt-4 d-flex justify-content-center align-items-center">
            <div class="mx-5 my-4 px-4 rounded-4 shadow border border-1 border-black bg-white w-100">
                {{-- atas --}}
                <div class="d-flex align-items-center justify-content-between py-2 header_dashboard row">
                    <div class="id_produk w-fit px-5 py-3 rounded-1 col-lg-2 flex text-center col-md-12">
                        <p class="fs-6 fw-bold m-0">
                            #{{ $order->order_number }}
                        </p>
                    </div>
                    <div class="rounded-3 d-flex date_produk flex-column col-lg-4 col-md-6 p-md-0">
                        <p class="fs-6 m-0 px-lg-3">{{ $order->order_date }}</p>
                        <p class="fs-6 m-0 px-lg-3">{{ $order->juragan }}</p>
                    </div>

                    <div class="col-md-6 d-flex justify-content-end p-md-0">
                        <div class="rounded-3 pt-2 d-flex justify-content-end align-items-center">
                            <div class="text-end d-flex flex-column align-items-center gap-1">
                                <svg width="36" height="35" viewBox="0 0 48 48" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="Icon=Plus, State=Green">
                                        <path id="Vector"
                                            d="M31.7143 25.2857H25.2857V31.7143C25.2857 32.0553 25.1503 32.3823 24.9091 32.6234C24.668 32.8645 24.341 33 24 33C23.659 33 23.332 32.8645 23.0909 32.6234C22.8497 32.3823 22.7143 32.0553 22.7143 31.7143V25.2857H16.2857C15.9447 25.2857 15.6177 25.1503 15.3766 24.9091C15.1355 24.668 15 24.341 15 24C15 23.659 15.1355 23.332 15.3766 23.0909C15.6177 22.8497 15.9447 22.7143 16.2857 22.7143H22.7143V16.2857C22.7143 15.9447 22.8497 15.6177 23.0909 15.3766C23.332 15.1355 23.659 15 24 15C24.341 15 24.668 15.1355 24.9091 15.3766C25.1503 15.6177 25.2857 15.9447 25.2857 16.2857V22.7143H31.7143C32.0553 22.7143 32.3823 22.8497 32.6234 23.0909C32.8645 23.332 33 23.659 33 24C33 24.341 32.8645 24.668 32.6234 24.9091C32.3823 25.1503 32.0553 25.2857 31.7143 25.2857Z"
                                            fill="#24A240" />
                                        <circle id="Ellipse 1851" cx="24" cy="24" r="22" stroke="#24A240"
                                            stroke-width="4" />
                                    </g>
                                </svg>
                                <svg width="48" height="9" viewBox="0 0 10 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="Line">
                                        <circle id="Ellipse 1852" cx="4.9991" cy="4.69051" r="4.30769"
                                            fill="#24A240" />
                                    </g>
                                </svg>
                                <p class="text-success d-flex justify-content-center date_text m-0 p-0">
                                    {{ date('d/n', strtotime($order->deadline)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- tengah --}}
                <div class="row  justify-content-between">
                    <div class="col-lg-3 col-md-6 row pt-4">
                        <p class="text-secondary fs-6 fw-semibold m-0 py-0">Pemesan / Kirim Kepada</p>
                        <p class="fs-6 fzt7 fw-semibold col-12 mb-0 color_text m-0 py-0">{{ $order->customer_name }}</p>
                        <p class="fs-6  fzt7 fw-semibold col-12 mb-0 color_text">{{ $order->customer_phone }}</p>
                        <p class="fs-6 fzt7  fw-semibold col-12 mb-0 color_text">{{ $order->payment_method }}</p>
                        <p class="text-secondary fzt7  fs-6 fw-semibold col-12 m-0 py-0">Asal Orderan</p>
                        <p class="fs-6 fw-semibold fzt7  col-12 mb-0 letter_spacing">{{ $order->source }}</p>
                        <p class="text-secondary fs-6  fzt7 fw-semibold col-12 m-0 py-0">Dilayani</p>
                        <p class="fs-6 fw-semibold col-12 mb-0 fzt7  letter_spacing">{{ $order->served_by }}</p>
                    </div>
                    <div class="col-lg-3 col-md-6 row pt-4">
                        <p class="text-secondary fs-6 fw-semibold fzt7  col-12 p-0">
                            Produk
                            <span class="px-0">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="Ikon Hover Detail Admin">
                                        <path id="Vector" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.28043 0.691406C4.08868 0.691406 0.69043 4.08966 0.69043 8.28141C0.69043 12.4732 4.08868 15.8714 8.28043 15.8714C12.4722 15.8714 15.8704 12.4732 15.8704 8.28141C15.8704 4.08966 12.4722 0.691406 8.28043 0.691406ZM7.93543 4.14141C7.75243 4.14141 7.57693 4.2141 7.44753 4.3435C7.31813 4.4729 7.24543 4.64841 7.24543 4.83141C7.24543 5.01441 7.31813 5.18991 7.44753 5.31931C7.57693 5.44871 7.75243 5.52141 7.93543 5.52141H8.28043C8.46343 5.52141 8.63893 5.44871 8.76833 5.31931C8.89773 5.18991 8.97043 5.01441 8.97043 4.83141C8.97043 4.64841 8.89773 4.4729 8.76833 4.3435C8.63893 4.2141 8.46343 4.14141 8.28043 4.14141H7.93543ZM6.90043 6.90141C6.71743 6.90141 6.54193 6.9741 6.41253 7.1035C6.28313 7.2329 6.21043 7.40841 6.21043 7.59141C6.21043 7.77441 6.28313 7.94991 6.41253 8.07931C6.54193 8.20871 6.71743 8.28141 6.90043 8.28141H7.59043V10.3514H6.90043C6.71743 10.3514 6.54193 10.4241 6.41253 10.5535C6.28313 10.6829 6.21043 10.8584 6.21043 11.0414C6.21043 11.2244 6.28313 11.3999 6.41253 11.5293C6.54193 11.6587 6.71743 11.7314 6.90043 11.7314H9.66043C9.84343 11.7314 10.0189 11.6587 10.1483 11.5293C10.2777 11.3999 10.3504 11.2244 10.3504 11.0414C10.3504 10.8584 10.2777 10.6829 10.1483 10.5535C10.0189 10.4241 9.84343 10.3514 9.66043 10.3514H8.97043V7.59141C8.97043 7.40841 8.89773 7.2329 8.76833 7.1035C8.63893 6.9741 8.46343 6.90141 8.28043 6.90141H6.90043Z"
                                            fill="#202B46" />
                                    </g>
                                </svg>
                            </span>
                        </p>
                        <div class="d-flex m-0 p-0 kd_produk">
                            <ul class="m-0 p-0 font_small fw-normal col-lg-4 list-unstyled">
                                <li class="color_text fzt7  m-0 p-0">{{ $order->kd_produk }}</li>
                                <li class="text-secondary fzt7  m-0 p-0">{{ $order->size }}</li>
                                <li class="color_text m-0  fzt7 p-0">{{ $order->kd_produk }}</li>
                                <li class="text-secondary fzt7  m-0 p-0">{{ $order->size }}</li>
                                <li class="color_text m-0  fzt7 p-0">{{ $order->kd_produk }}</li>
                                <li class="color_text m-0  fzt7 p-0">{{ $order->size }}</li>
                                <li class="color_text m-0 fzt7  p-0">{{ $order->kd_produk }}</li>
                                <li class="text-secondary m-0 p-0">{{ $order->size }}</li>
                                <li class="text-secondary m-0 fzt7  p-0">{{ $order->kd_produk }}</li>
                                <li class="pb-1  fzt7 text-secondary">{{ $order->size }}</li>
                            </ul>
                            <ul
                                class="px-5 py-0 m-0 d-flex font_small col-lg-9 fw-normal flex-column justify-content-between list-unstyled">
                                <li class="color_text fzt7  m-0 p-0">x {{ $order->quantity }}</li>
                                <li class="color_text m-0  fzt7 p-0">x {{ $order->quantity }}</li>
                                <li class="color_text m-0 fzt7  p-0">x {{ $order->quantity }}</li>
                                <li class="color_text m-0  fzt7 p-0">x {{ $order->quantity }}</li>
                                <li class="pb-4 fzt7  color_text">x {{ $order->quantity }}</li>
                            </ul>
                        </div>
                        <div class="d-flex m-0 p-0 pt-3 gap-4 justify-content-between">
                            <ul class="m-0 p-0 fzt7  fs-6 fw-normal col-lg-5 list-unstyled">
                                <li>Total</li>
                            </ul>

                            {{-- @php
                        $totalQuantity = array_sum($order->quantity);
                    @endphp --}}

                            <ul class="m-0 d-flex fs-6 col-lg-9 fw-normal list-unstyled">
                                <li class="fzt7">= {{ $order->quantity }} pcs</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 pt-4 h-100">
                        <div class="cost_header d-flex align-items-center justify-content-center py-md-3">
                            <h2 class="fs-5 fzt7 fw-bold">Wajib Bayar RP
                                {{ number_format($order->total_amount, 2, ',', '.') }}</h2>
                        </div>
                        <div class="cost_body px-4 py-3" style="padding: 20px;">
                            <!-- Sesuaikan nilai padding sesuai kebutuhan -->
                            <div class="cost_body_produk d-flex justify-content-between">
                                <p class=" fzt7 ">Harga Produk</p><span class="fzt7">
                                    RP{{ number_format($order->total_amount, 2, ',', '.') }}</span>
                            </div>
                            <hr>
                            <div class="cost_body_produk d-flex justify-content-between">
                                <p class="fzt7">Terbayar </p><span class="fzt6">
                                    RP{{ number_format($order->paid_amount, 2, ',', '.') }}</span>
                            </div>
                            <div class="cost_body_produk d-flex justify-content-between">
                                <p class="fzt7">Kekurangan </p><span class="fzt7">
                                    -RP{{ number_format($order->remaining_amount, 2, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 pt-4 ket_order_admin text-start">
                        <p class="text-secondary fs-6 fw-semibold  fzt7 p-0 m-0"> Keterangan
                        </p>
                        <div class="d-flex flex-column align-items-start m-0 p-0">
                            <div id="notesContainer d-lg-flex d-md-none">
                                <p class="fs-6 fzt7  fw-semibold col-12 mb-0 color_text m-0 p-0 shortNotes d-lg-flex d-md-none"
                                    id="shortNotes3" style="text-justify: justify;">
                                    {{ substr($order->notes, 0, 50) . '...' }}</p>
                                <p class="fs-6  fzt7 fw-semibold col-12 mb-0 color_text m-0 p-0 fullNotes"
                                    id="fullNotes3" style="display: none; text-align:justify;">{{ $order->notes }}
                                </p>
                            </div>
                            <div class="d-lg-none d-md-flex">
                                <p>
                                    {{ $order->notes }}
                                </p>
                            </div>

                            <span class="d-lg-flex d-md-none gap-2">
                                <span onclick="Note(3)" id="textLine3" class="fzt7"
                                    style="cursor: pointer;">Selengkapnya</span>
                            </span>
                        </div>
                    </div>

                    <div class="my-3 d-flex align-items-center gap-5 gap_btn">
                        <button type="button" disabled href="#"
                            class="d-flex fzt7 align-items-center justify-content-between btn btn-secondary text-white status-order fw-semibold m-0 tambah_pembayaran"
                            data-bs-toggle="modal" data-bs-target="#prosesOrderanModal"
                            data-order-id="{{ $order->id }}">
                            <span class="d-flex align-items-center me-3">
                                <svg width="17" height="18" viewBox="0 0 17 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="Icon">
                                        <path id="Vector"
                                            d="M11.2321 9.45536H8.95536V11.7321C8.95536 11.8529 8.90738 11.9687 8.82199 12.0541C8.73659 12.1395 8.62077 12.1875 8.5 12.1875C8.37923 12.1875 8.26341 12.1395 8.17801 12.0541C8.09262 11.9687 8.04464 11.8529 8.04464 11.7321V9.45536H5.76786C5.64709 9.45536 5.53127 9.40738 5.44587 9.32199C5.36048 9.23659 5.3125 9.12077 5.3125 9C5.3125 8.87923 5.36048 8.76341 5.44587 8.67801C5.53127 8.59262 5.64709 8.54464 5.76786 8.54464H8.04464V6.26786C8.04464 6.14709 8.09262 6.03127 8.17801 5.94587C8.26341 5.86047 8.37923 5.8125 8.5 5.8125C8.62077 5.8125 8.73659 5.86047 8.82199 5.94587C8.90738 6.03127 8.95536 6.14709 8.95536 6.26786V8.54464H11.2321C11.3529 8.54464 11.4687 8.59262 11.5541 8.67801C11.6395 8.76341 11.6875 8.87923 11.6875 9C11.6875 9.12077 11.6395 9.23659 11.5541 9.32199C11.4687 9.40738 11.3529 9.45536 11.2321 9.45536Z"
                                            fill="white" />
                                        <circle id="Ellipse 1851" cx="8.5" cy="9" r="7.79167"
                                            stroke="white" stroke-width="1.41667" />
                                    </g>
                                </svg>
                            </span>
                            <p class="m-0">
                                Proses Orderan
                            </p>
                        </button>
                        <div class="dropdown my-3">
                            <button
                                class="btn bg-white text-black fzt7  border border-black rounded rounded-3 dropdown-toggle btn_sunting"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                id="suntingPembayaran" data-name="suntingPembayaran">
                                Sunting
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item fzt7" href="#" data-bs-toggle="modal"
                                        data-bs-target="#tambahPembayaranModal">
                                        Tambah Pembayaran
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    @endforeach

    {{-- CARD BELUM PROSES --}}
@else
    <p class="fs-6 fw-bold text-center">No orders available.</p>
@endif

@php
    $status = $order->status ?? 'belum_proses';
@endphp

{{-- Modal Tambah Pembayaran Component --}}
{{-- <x-admin.dashboard.modal.modal-tambah-pembayaran /> --}}
@if (isset($order))
    <div class="modal fade" id="tambahPembayaranModal" tabindex="-1" aria-labelledby="tambahPembayaranModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('update.check.payment', ['orderId' => $order->id]) }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title w-100 text-center" id="tambahPembayaranModalLabel">Tambah Pembayaran
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p
                            class="bg-warning text-secondary rounded-1 text-center fs-6 fw-medium font-family-Montserrat m-0 px-3 py-2">
                            Detail Pembayaran tidak bisa diganti atau diubah</p>
                        <div class="d-flex gap-4 justify-content-between">
                            <div class="col-lg-5 my-2">
                                <label for="ukuran" class="col-form-label">Tujuan Pembayaran</label>
                                <div class="dropdown">
                                    <button
                                        class="btn d-flex justify-content-between align-items-center bg-white border w-100 border-black rounded rounded-3 dropdown-toggle @error('tujuan_bayar') is-invalid @enderror"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                        id="tujuan_bayar" data-name="tujuan_bayar">
                                        Pilih Tujuan
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-value="BRI (Nama CS)">BRI
                                                (Nama CS)</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Tunggu Konfirmasi Pembayaran">Tunggu Konfirmasi
                                                Pembayaran</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Cicilan / Kredit">Cicilan / Kredit</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="Ada kelebihan">Ada
                                                kelebihan</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="Sudah Lunas">Sudah
                                                Lunas</a></li>
                                    </ul>
                                    <input type="hidden" name="status" id="modalBayar"
                                        value="{{ $status }}">
                                    {{-- @error('size')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror --}}
                                </div>
                            </div>
                            <div class="my-2 col-lg-5">
                                <label for="tgl-bayar" class="col-form-label">Tanggal Bayar</label>
                                <input type="date" name="tgl_bayar" class="form-control shadow">
                            </div>
                        </div>

                        <div class="mb-3 col-lg-12">
                            <label for="jumlah-dana" class="col-form-label">Jumlah Dana</label>
                            <input type="text" name="jumlah_dana" class="form-control shadow">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start gap-2">
                        <button type="submit" class="btn btn-primary modal_btn_width"
                            id="btnSimpanBayar">Simpan</button>
                        <button type="button" class="btn btn-secondary modal_btn_width"
                            data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
{{-- Akhir Modal Tambah Pembayaran --}}

{{-- Modal Proses Orderan Component --}}
{{-- <x-modal-proses-orderan /> --}}

{{-- Modal Proses Orderan --}}
@if (isset($order))
    <div class="modal fade" id="prosesOrderanModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="prosesOrderanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{ route('update.on.process', ['orderId' => $order->id]) }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title w-100 text-center" id="prosesOrderanModalLabel">Status Proses Orderan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p
                            class="bg-warning text-secondary rounded-1 text-center fs-6 fw-medium font-family-Montserrat m-0 px-3 py-2">
                            Perlu diingat, penambahan status orderan ini tidak bisa diubah!</p>
                        <!-- Add your form or content for Tambah Pembayaran inside this div -->
                        <!-- Example Form -->
                        <div class="d-flex gap-1 justify-content-between">
                            <div class="col-lg-6 my-2">
                                <label for="ukuran" class="col-form-label">Pilih Status</label>
                                <div class="dropdown">
                                    <button
                                        class="btn d-flex justify-content-between align-items-center bg-white border w-100 border-black rounded rounded-3 dropdown-toggle @error('pilih_status') is-invalid @enderror"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                        id="pilih_status" data-name="pilih_status" name="pilih_status">
                                        Pilih Status
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item status-option" href="#"
                                                data-value="Data Pesanan">Data Pesanan</a></li>
                                        <li><a class="dropdown-item status-option" href="#"
                                                data-value="Bahan Produk">Bahan Produk</a></li>
                                        <li><a class="dropdown-item status-option" href="#"
                                                data-value="Sablon">Sablon</a></li>
                                        <li><a class="dropdown-item status-option" href="#"
                                                data-value="Bordir">Bordir</a></li>
                                        <li><a class="dropdown-item status-option" href="#"
                                                data-value="Penjahit">Penjahit</a></li>
                                        <li><a class="dropdown-item status-option" href="#"
                                                data-value="QC">QC</a></li>
                                        <li><a class="dropdown-item status-option" href="#"
                                                data-value="Packing">Packing</a></li>
                                    </ul>
                                    <input type="hidden" name="status" id="modalStatus"
                                        value="{{ $status }}">
                                    {{-- @error('size')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror --}}
                                </div>
                            </div>
                            <div class="col-lg-6 my-2">
                                <label for="pilih" class="col-form-label text-white">Pilih</label>
                                <div class="dropdown">
                                    <button
                                        class="btn d-flex justify-content-between align-items-center bg-white border w-100 border-black rounded rounded-3 dropdown-toggle @error('kelengkapan') is-invalid @enderror"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                        id="kelengkapan" data-name="kelengkapan">
                                        Pilih
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-value="Lengkap">Lengkap</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#" data-value="Belum Lengkap">Belum
                                                Lengkap</a></li>
                                    </ul>
                                    <input type="hidden" name="kelengkapan" id="checkKelengkapan"
                                        value="{{ old('kelengkapan') }}">
                                    {{-- @error('size')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror --}}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-lg-12">
                            <label for="jumlah-dana" class="col-form-label">Note / Keterangan</label>
                            <input type="text" class="form-control shadow" placeholder="Opsional" name="notes">
                        </div>

                        <!-- Add more form fields as needed -->

                        <!-- Add your form submit button or any other content here -->
                    </div>
                    <div class="modal-footer justify-content-start gap-2">
                        <button type="submit" class="btn btn-primary modal_btn_width" data-bs-toggle="modal"
                            data-bs-target="#confirmPerubahanStatusOrderModal"
                            id="btnSimpanProsesOrderan">Simpan</button>
                        <button type="button" class="btn btn-secondary modal_btn_width"
                            data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
{{-- Akhir Modal Proses Orderan --}}

{{-- Modal Confirm Perubahan Status Order Modal --}}
{{-- <x-confirm-modal-status /> --}}
<div class="modal fade" id="confirmPerubahanStatusOrderModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="confirmPerubahanStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="confirmPerubahanStatusModalLabel">Ubah Status Orderan
                </h5>
            </div>
            <div class="modal-body text-center">
                <p>Setelah data status yang diubah disimpan, data tersebut <span class="text-danger">tidak bisa diubah
                        kembali</span><br>Apakah Anda yakin menyimpan data ini?</p>
            </div>
            <div class="modal-footer justify-content-center gap-2">
                <button type="button" class="btn btn-secondary modal_btn_width"
                    data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary modal_btn_width" data-bs-toggle="modal"
                    data-bs-target="confirmPerubahanStatusOrderModal">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- Akhir Modal Confirm Perubahan Status Order Modal --}}

{{-- Akhir Modal Proses Orderan --}}

{{-- @section('javascript') --}}
<script src="/assets/js/admin/dashboard/dashboard-admin.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi Keterangan Selengkapnya

        document.querySelectorAll('.line_selengkapnya a').forEach((link, index) => {
            link.addEventListener('click', () => toggleNotes(index));
        });

        const status = "{{ $status }}";
        const dropdownItems = document.querySelectorAll('.status-option');

        // logika dropdown data-pesanan disable/enable ketika status order belum proses
        if (status === 'belum_proses') {
            dropdownItems.forEach(item => {
                if (item.getAttribute('data-value') === 'Data Pesanan') {
                    item.classList.remove('disabled');
                } else {
                    item.classList.add('disabled');
                }
            });
        }

        // logika dropdown data-pesanan disable/enable ketika status order cek pembayaran
        if (status === 'cek_pembayaran') {
            dropdownItems.forEach(item => {
                if (item.getAttribute('data-value') !== 'Data Pesanan') {
                    item.classList.remove('disabled');
                } else {
                    item.classList.add('disabled');
                }
            });
        }

        // Mengambil data-value dari button dropdown tujuan bayar yang ada di modal tambah pembayaran
        const tambahBayarDropdownMenu = document.querySelectorAll('#tujuan_bayar + .dropdown-menu a');
        tambahBayarDropdownMenu.forEach(item => {
            item.addEventListener('click', function() {
                const selectedValue = this.getAttribute('data-value');
                document.getElementById('tujuan_bayar').innerText = selectedValue;
                document.getElementById('tujuan_bayar').value = selectedValue;
            });
        });

        // ketika button simpan di modal tambah pembayaran di klik status order nya berubah dan mengarah ke card-cek-payment
        const simpanBtn = document.getElementById('btnSimpanBayar');
        simpanBtn.addEventListener('click', function() {
            document.getElementById('modalBayar').value = 'cek_pembayaran';
        })

        // Mengambil data-value dari button dropdown pilih status yang ada di modal proses orderan
        const tambahDropdownMenu = document.querySelectorAll('#pilih_status + .dropdown-menu a');
        tambahDropdownMenu.forEach(item => {
            item.addEventListener('click', function() {
                const selectedValue = this.getAttribute('data-value');
                document.getElementById('pilih_status').innerText = selectedValue;
                document.getElementById('pilih_status').value = selectedValue;
            });
        });

        // Mengambil data-value dari button dropdown kelengkapan yang ada di modal proses orderan
        const kelengkapanDropdownMenu = document.querySelectorAll('#kelengkapan + .dropdown-menu a');
        kelengkapanDropdownMenu.forEach(item => {
            item.addEventListener('click', function() {
                const selectedValue = this.getAttribute('data-value');
                document.getElementById('kelengkapan').innerText = selectedValue;
                document.getElementById('checkKelengkapan').value = selectedValue;

            });
        });

        const simpanButton = document.querySelector('#confirmPerubahanStatusOrderModal .btn-primary');
        simpanButton.addEventListener('click', handleSimpanClick);

        // Fungsi ketika button simpan yang ada di modal proses orderan akan mengarah ke modal confirm perubahan status order
        function handleSimpanClick() {
            // Check if kelengkapan is 'Lengkap'
            const kelengkapanValue = document.getElementById('kelengkapan').innerText.trim();
            if (kelengkapanValue === 'Lengkap') {
                // Show confirm-modal-status
                const confirmModal = bootstrap.Modal.getInstance(document.getElementById(
                    'confirmPerubahanStatusOrderModal'));
                confirmModal.show();

                document.getElementById('modalStatus').value = 'cek_pembayaran';

                // Close modal-proses-orderan
                const modalProsesOrderan = bootstrap.Modal.getInstance(document.getElementById(
                    'prosesOrderanModal'));
                modalProsesOrderan.hide();
            } else {
                // Proceed with the regular saving logic
                // ...

                // Close modal-proses-orderan
                const modalProsesOrderan = bootstrap.Modal.getInstance(document.getElementById(
                    'prosesOrderanModal'));
                modalProsesOrderan.hide();
            }
        }

        const successMessage = document.querySelector('.session-card');

        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 2000);
        }

        const errorMessage = document.querySelector('.session-error');

        if (errorMessage) {
            setTimeout(function() {
                errorMessage.style.display = 'none';
            }, 2000);
        }
    });
</script>
{{-- @endsection --}}
