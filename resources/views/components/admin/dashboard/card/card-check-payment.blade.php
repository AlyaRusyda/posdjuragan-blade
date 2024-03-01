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
{{-- CARD CEK PEMBAYARAN DASHBOARD ADMIN --}}
@if (isset($orders))
    @foreach ($orders as $order)
        <article class="pt-4 d-flex justify-content-center align-items-center">
            <div class="mx-5 my-4 px-4 rounded-4 shadow border border-1 border-black bg-white w-100">
                <div class="d-flex align-items-center justify-content-between py-2 header_dashboard row">
                    <div class="id_produk w-fit px-5 py-3 rounded-1 col-lg-2 flex text-center col-md-12">
                        <p class="fs-6 fw-bold  m-0">
                            #{{ $order->order_number }}
                        </p>
                    </div>
                    <div class="rounded-3 d-flex date_produk flex-column col-lg-4 col-md-6 p-md-0">
                        <p class="fs-6 m-0 px-lg-3">{{ $order->order_date }}</p>
                        <p class="fs-6 m-0 px-lg-3">{{ $order->juragan }}</p>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end p-md-0">
                        <div class=" rounded-3 pt-2 d-flex align-items-center">
                            <div class=" d-flex flex-column align-items-center gap-1">
                                <span class="d-flex align-items-center gap_custom">
                                    <svg width="36" height="35" viewBox="0 0 48 48" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="Icon=Plus, State=Green">
                                            <path id="Vector"
                                                d="M31.7143 25.2857H25.2857V31.7143C25.2857 32.0553 25.1503 32.3823 24.9091 32.6234C24.668 32.8645 24.341 33 24 33C23.659 33 23.332 32.8645 23.0909 32.6234C22.8497 32.3823 22.7143 32.0553 22.7143 31.7143V25.2857H16.2857C15.9447 25.2857 15.6177 25.1503 15.3766 24.9091C15.1355 24.668 15 24.341 15 24C15 23.659 15.1355 23.332 15.3766 23.0909C15.6177 22.8497 15.9447 22.7143 16.2857 22.7143H22.7143V16.2857C22.7143 15.9447 22.8497 15.6177 23.0909 15.3766C23.332 15.1355 23.659 15 24 15C24.341 15 24.668 15.1355 24.9091 15.3766C25.1503 15.6177 25.2857 15.9447 25.2857 16.2857V22.7143H31.7143C32.0553 22.7143 32.3823 22.8497 32.6234 23.0909C32.8645 23.332 33 23.659 33 24C33 24.341 32.8645 24.668 32.6234 24.9091C32.3823 25.1503 32.0553 25.2857 31.7143 25.2857Z"
                                                fill="#24A240" />
                                            <circle id="Ellipse 1851" cx="24" cy="24" r="22"
                                                stroke="#24A240" stroke-width="4" />
                                        </g>
                                    </svg>
                                    <svg width="36" height="35" viewBox="0 0 32 31" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="Icon">
                                            <path id="Vector"
                                                d="M27.3646 8.77246H4.64266C2.76032 8.77246 1.23438 10.299 1.23438 12.1821V25.8209C1.23438 27.704 2.76032 29.2306 4.64266 29.2306H27.3646C29.2469 29.2306 30.7728 27.704 30.7728 25.8209V12.1821C30.7728 10.299 29.2469 8.77246 27.3646 8.77246Z"
                                                stroke="#D8CF06" stroke-width="2.46154" stroke-linejoin="round" />
                                            <path id="Vector_2"
                                                d="M27.0351 9.00276V6.43407C27.0349 5.80406 26.9194 5.18186 26.6969 4.61186C26.4744 4.04187 26.1502 3.53813 25.7476 3.13658C25.3451 2.73503 24.8739 2.44557 24.3679 2.28886C23.8619 2.13215 23.3334 2.11204 22.8202 2.22998L4.12006 6.07873C3.30798 6.26535 2.57536 6.78784 2.04856 7.5561C1.52177 8.32437 1.23382 9.29023 1.23438 10.2871V14.4826"
                                                stroke="#D8CF06" stroke-width="2.46154" stroke-linejoin="round" />
                                            <path id="Vector_3"
                                                d="M23.9597 24.0726C23.5103 24.0726 23.071 23.9119 22.6973 23.6109C22.3237 23.3098 22.0324 22.8819 21.8605 22.3812C21.6885 21.8806 21.6435 21.3297 21.7312 20.7982C21.8188 20.2667 22.0352 19.7785 22.353 19.3953C22.6708 19.0121 23.0756 18.7511 23.5164 18.6454C23.9572 18.5397 24.414 18.594 24.8292 18.8013C25.2444 19.0087 25.5993 19.3599 25.8489 19.8105C26.0986 20.2611 26.2319 20.7908 26.2319 21.3327C26.2319 22.0594 25.9925 22.7563 25.5664 23.2701C25.1403 23.784 24.5623 24.0726 23.9597 24.0726Z"
                                                fill="#D8CF06" />
                                        </g>
                                    </svg>
                                </span>
                                <span class="d-flex align-items-center">
                                    <span class="d-flex align-items-center line_bayar">
                                        <svg width="52" height="9" viewBox="0 0 29 9" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="Line">
                                                <circle id="Ellipse 1852" cx="4.99519" cy="4.69051" r="4.30769"
                                                    fill="#24A240" />
                                                <line id="Line 31" x1="1.3125" y1="4.69111" x2="29.0048"
                                                    y2="4.69111" stroke="#24A240" stroke-width="2.46154" />
                                            </g>
                                        </svg>
                                    </span>
                                    <svg width="48" height="9" viewBox="0 0 48 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="Line">
                                            <circle id="Ellipse 1852" cx="23.9952" cy="4.69051" r="4.30769"
                                                fill="#D8CF06" />
                                            <line id="Line 31" x1="20.3125" y1="4.69111" x2="48.0048"
                                                y2="4.69111" stroke="#D8CF06" stroke-width="2.46154" />
                                            <line id="Line 32" y1="4.69111" x2="27.6923" y2="4.69111"
                                                stroke="#D8CF06" stroke-width="2.46154" />
                                        </g>
                                    </svg>
                                </span>
                                <div class="d-flex align-items-center gap_date">
                                    <p class="text-success d-flex justify-content-center date_text m-0 p-0">
                                        {{ date('d/n', strtotime($order->deadline)) }}</p>
                                    <p class="text-warning d-flex justify-content-center date_text m-0 p-0">
                                        {{ date('d/n', strtotime($order->deadline)) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-3 col-md-6 row pt-4">
                        <p class="text-secondary fs-6 fw-semibold m-0 py-0">Pemesan / Kirim Kepada</p>
                        <p class="fs-6 fzt7 fw-semibold col-12 mb-0 color_text m-0 py-0">{{ $order->customer_name }}
                        </p>
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
                        <div class="cost_header_warning d-flex align-items-center justify-content-center py-md-3">
                            <h2 class="fs-5 fzt7 fw-bold">Wajib Bayar RP
                                {{ number_format($order->total_amount, 2, ',', '.') }}</h2>
                        </div>
                        <div class="cost_body_warning px-4 py-3" style="padding: 20px;">
                            <div class="cost_body_produk d-flex justify-content-between">
                                <p class="fzt7">Harga Produk</p><span class="fzt7">RP
                                    {{ number_format($order->total_amount, 2, ',', '.') }}</span>
                            </div>
                            <hr>
                            <div class="cost_body_produk d-flex justify-content-between">
                                <p class="fzt7">Terbayar</p><span class="fzt7">RP
                                    {{ number_format($order->paid_amount, 2, ',', '.') }}</span>
                            </div>
                            <div class="cost_body_produk d-flex justify-content-between">
                                <p class="fzt7">Kekurangan</p><span class="fzt7">RP
                                    {{ number_format($order->remaining_amount, 2, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 pt-4 ket_order_admin text-start">
                        <p class="text-secondary fs-6 fw-semibold  fzt7 p-0 m-0">
                            Keterangan
                        </p>
                        <div class="d-flex flex-column align-items-start m-0 p-0">
                            <div id="notesContainer d-lg-flex d-md-none">
                                <p class="fs-6 fzt7  fw-semibold col-12 mb-0 color_text m-0 p-0 shortNotes d-lg-flex d-md-none"
                                    id="shortNotes1" style="text-align: justify;">
                                    {{ substr($order->notes, 0, 50) . '...' }}</p>
                                <p class="fs-6  fzt7 fw-semibold col-12 mb-0 color_text m-0 p-0 fullNotes"
                                    id="fullNotes1" style="display: none; text-align:justify;">{{ $order->notes }}
                                </p>
                            </div>

                            <div class="d-lg-none d-md-flex">
                                <p>
                                    {{ $order->notes }}
                                </p>
                            </div>

                            <span class="d-lg-flex d-md-none gap-2">
                                <span onclick="Note(1)" id="textLine1" style="cursor: pointer;">Selengkapnya</span>
                            </span>
                        </div>

                    </div>
                </div>
                <div class="my-3 d-flex align-items-center gap-5 gap_btn">
                    <button type="button" disabled href="#"
                        class="d-flex align-items-center justify-content-between btn btn-secondary text-white status-order fs-6 fw-semibold m-0 tambah_pembayaran"
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
                            class="fzt7 btn bg-white text-black border border-black rounded rounded-3 dropdown-toggle btn_sunting"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false" id="suntingPembayaran"
                            data-name="suntingPembayaran">
                            Sunting
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#tambahPembayaranModal">
                                    Tambah Pembayaran
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="row my-3 d-flex align-items-center gap_btn">
                        <a href="#"
                            class="d-flex justify-content-between btn text-black cek-order text-1xl fw-semibold col-lg-12 m-0 cek_pembayaran"
                            data-bs-toggle="modal" data-bs-target="#infoPembayaranModal">
                            <span class="d-flex align-items-center text-black">
                                <svg width="17" height="18" viewBox="0 0 32 31" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="Icon">
                                        <path id="Vector"
                                            d="M27.3646 8.77246H4.64266C2.76032 8.77246 1.23438 10.299 1.23438 12.1821V25.8209C1.23438 27.704 2.76032 29.2306 4.64266 29.2306H27.3646C29.2469 29.2306 30.7728 27.704 30.7728 25.8209V12.1821C30.7728 10.299 29.2469 8.77246 27.3646 8.77246Z"
                                            stroke="#000" stroke-width="2.46154" stroke-linejoin="round" />
                                        <path id="Vector_2"
                                            d="M27.0351 9.00276V6.43407C27.0349 5.80406 26.9194 5.18186 26.6969 4.61186C26.4744 4.04187 26.1502 3.53813 25.7476 3.13658C25.3451 2.73503 24.8739 2.44557 24.3679 2.28886C23.8619 2.13215 23.3334 2.11204 22.8202 2.22998L4.12006 6.07873C3.30798 6.26535 2.57536 6.78784 2.04856 7.5561C1.52177 8.32437 1.23382 9.29023 1.23438 10.2871V14.4826"
                                            stroke="#000" stroke-width="2.46154" stroke-linejoin="round" />
                                        <path id="Vector_3"
                                            d="M23.9597 24.0726C23.5103 24.0726 23.071 23.9119 22.6973 23.6109C22.3237 23.3098 22.0324 22.8819 21.8605 22.3812C21.6885 21.8806 21.6435 21.3297 21.7312 20.7982C21.8188 20.2667 22.0352 19.7785 22.353 19.3953C22.6708 19.0121 23.0756 18.7511 23.5164 18.6454C23.9572 18.5397 24.414 18.594 24.8292 18.8013C25.2444 19.0087 25.5993 19.3599 25.8489 19.8105C26.0986 20.2611 26.2319 20.7908 26.2319 21.3327C26.2319 22.0594 25.9925 22.7563 25.5664 23.2701C25.1403 23.784 24.5623 24.0726 23.9597 24.0726Z"
                                            fill="#000" />
                                    </g>
                                </svg>
                            </span>
                            Cek Pembayaran
                        </a>
                    </div>
                </div>
            </div>
        </article>
        {{-- CARD CEK PEMBAYARAN --}}
    @endforeach
@else
    <p class="fs-6 fw-bold text-center">No orders available.</p>
@endif

@php
    $status = $order->status ?? 'cek_pembayaran';
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
                        <!-- Add your form or content for Tambah Pembayaran inside this div -->
                        <!-- Example Form -->
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

                        <!-- Add more form fields as needed -->

                        <!-- Add your form submit button or any other content here -->
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


{{-- Modal Info Pembayaran Component --}}
{{-- <x-admin.dashboard.modal.modal-info-pembayaran /> --}}
@if (isset($order))
    <div class="modal fade" id="infoPembayaranModal" tabindex="-1" aria-labelledby="infoPembayaranModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{ route('update.check.payment', ['orderId' => $order->id]) }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title w-100 text-center" id="infoPembayaranModalLabel">Info Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p
                            class="bg-warning text-secondary rounded-1 text-center fs-6 fw-medium font-family-Montserrat m-0 px-3 py-2">
                            Detail Pembayaran tidak bisa diganti atau dirubah</p>
                        <div
                            class="d-flex gap-4 align-items-center justify-content-between border border-1 my-2 px-3 rounded-1 border-secondary shadow">
                            <div class="col-lg-2 d-flex align-items-center">
                                <p class="fw-bold gap-1 d-flex align-items-center my-1">
                                    <span>
                                        <svg width="35" height="31" viewBox="0 0 35 31" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="Icon">
                                                <path id="Vector"
                                                    d="M29.4231 8.23779H5.57692C3.60144 8.23779 2 9.83989 2 11.8162V26.1298C2 28.1061 3.60144 29.7082 5.57692 29.7082H29.4231C31.3986 29.7082 33 28.1061 33 26.1298V11.8162C33 9.83989 31.3986 8.23779 29.4231 8.23779Z"
                                                    stroke="#0091FF" stroke-width="2.58333"
                                                    stroke-linejoin="round" />
                                                <path id="Vector_2"
                                                    d="M29.0773 8.47931V5.78352C29.0771 5.12234 28.9559 4.46936 28.7224 3.87116C28.4888 3.27296 28.1487 2.74429 27.7262 2.32287C27.3037 1.90146 26.8092 1.59768 26.2782 1.43321C25.7471 1.26875 25.1925 1.24765 24.6538 1.37142L5.02846 5.4106C4.1762 5.60645 3.40734 6.1548 2.85447 6.96108C2.30161 7.76735 1.99941 8.781 2 9.8272V14.2303"
                                                    stroke="#0091FF" stroke-width="2.58333"
                                                    stroke-linejoin="round" />
                                                <path id="Vector_3"
                                                    d="M25.8456 24.295C25.3739 24.295 24.9129 24.1263 24.5207 23.8103C24.1286 23.4944 23.8229 23.0453 23.6425 22.5199C23.462 21.9944 23.4147 21.4163 23.5068 20.8585C23.5988 20.3007 23.8259 19.7883 24.1594 19.3862C24.4929 18.984 24.9178 18.7102 25.3803 18.5992C25.8429 18.4882 26.3224 18.5452 26.7581 18.7628C27.1938 18.9805 27.5663 19.349 27.8283 19.8219C28.0903 20.2948 28.2302 20.8507 28.2302 21.4195C28.2302 22.1821 27.9789 22.9135 27.5317 23.4527C27.0845 23.992 26.478 24.295 25.8456 24.295Z"
                                                    fill="#0091FF" />
                                            </g>
                                        </svg>
                                    </span>
                                    {{ $order->payment_method }}
                                </p>
                            </div>
                            <div class="col-lg-4 my-2">
                                <p class="text-black fs-6 fw-medium font-family-Poppins ml-2 my-0">RP
                                    {{ number_format($order->total_amount, 2, ',', '.') }}</p>
                            </div>
                            <div class="col-lg-3 my-2">
                                <p class="text-black fs-6 fw-medium font-family-Poppins m-0">
                                    {{ date('d/n/Y', strtotime($order->deadline)) }}</p>
                            </div>
                            <div class="col-lg-3 my-2">
                                {{-- <p class="text-black fs-6 fw-medium font-family-Poppins m-0">
                                    @if ($order->remaining_amount > 0)
                                        Dana Ada
                                    @else
                                        Dana Tidak Ada
                                    @endif
                                </p> --}}
                                <div class="btn-group dropend">
                                    <button type="button" class="btn border border-black dropdown rounded-2"
                                        data-bs-toggle="dropdown" aria-expanded="false" id="statusDropdown">
                                        <span>
                                            <svg width="11" height="3" viewBox="0 0 11 3" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path id="Vector 1489" d="M1.5 1.5H9.5" stroke="black"
                                                    stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                        </span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item status-option" href="#"
                                                data-value="Ada">Ada</a></li>
                                        <li><a class="dropdown-item status-option" href="#"
                                                data-value="Tidak Ada">Tidak Ada</a></li>
                                    </ul>
                                    <input type="hidden" name="status" id="modalTambahBayar"
                                        value="{{ $status }}">
                                </div>
                            </div>
                        </div>
                        <div class="py-2" id="statusContainer">
                            <p class="fw-bold" id="statusText"></p>
                            <input type="text" class="form-control" id="paymentProof"
                                placeholder="Inputan link gambar bukti pembayaran disini!" style="display: none">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start gap-2">
                        <button type="submit" class="btn btn-primary modal_btn_width">Simpan</button>
                        <button type="button" class="btn btn-secondary modal_btn_width"
                            data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
{{-- Akhir Modal Info Pembayaran Component --}}

<script src="/assets/js/admin/dashboard/dashboard-admin.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk melihat keterangan selengkapnya


        const status = "{{ $status }}";

        // Mengambil data value tujuan bayar button dropdown pada modal tambah pembayaran
        const tambahBayarDropdownMenu = document.querySelectorAll('#tujuan_bayar + .dropdown-menu a');
        tambahBayarDropdownMenu.forEach(item => {
            item.addEventListener('click', function() {
                const selectedValue = this.getAttribute('data-value');
                document.getElementById('tujuan_bayar').innerText = selectedValue;
                document.getElementById('tujuan_bayar').value = selectedValue;
            });
        });

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

        const statusDropdown = document.getElementById('statusDropdown');
        const statusDropdownSpan = document.querySelector('#statusDropdown span');
        const statusText = document.getElementById('statusText');
        const inputLink = document.querySelector('.py-2 input');

        // Kejadian saat modal cek pembayaran ketika dana ada dan tidak ada
        statusDropdown.addEventListener('click', function() {
            const dropdownItems = this.nextElementSibling.querySelectorAll('.dropdown-item');
            dropdownItems.forEach(item => {
                item.addEventListener('click', function() {
                    const selectedValue = this.getAttribute('data-value');
                    if (selectedValue === 'Ada') {
                        statusDropdownSpan.innerHTML =
                            '<i class="fa-solid fa-check text-success"></i>';
                        statusText.innerHTML =
                            '<p class="fw-bold text-success">Status: Dana Ada</p>';
                        inputLink.style.display = 'block';
                    } else {
                        statusDropdownSpan.innerHTML =
                            '<i class="fa-solid fa-check text-danger"></i>';
                        statusText.innerHTML =
                            '<p class="fw-bold text-danger">Status: Dana Tidak Ada</p>';
                        inputLink.style.display = 'none';
                    }
                });
            });
        });

        // Kejadian saat button simpan di klik yang ada di modal cek pembayaran akan mengubah status order menjadi dalam proses (mengarah ke card-on-process)
        const simpanTambahBayarButton = document.querySelector('#infoPembayaranModal .btn-primary');
        simpanTambahBayarButton.addEventListener('click', function() {
            document.getElementById('modalTambahBayar').value = 'dalam_proses';
        })
    });
</script>
