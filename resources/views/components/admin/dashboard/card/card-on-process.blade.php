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
{{-- CARD DALAM PROSES DASHBOARD ADMIN --}}
@if (isset($orders))
    @foreach ($orders as $order)
        <article class="pt-4 d-flex justify-content-center align-items-center">
            <div class="mx-5 my-4 px-4 rounded-4 shadow border border-1 border-black bg-white w-100">
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
                        <div class=" rounded-3 pt-2 d-flex align-items-center">
                            <div class="d-flex flex-column align-items-center gap-1">
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

                                    @if ($order->kelengkapan === 'Lengkap')
                                        <!-- Display the SVG icon when completeness is 'Lengkap' -->
                                        <svg width="36" height="35" viewBox="0 0 22 31" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="Icon">
                                                <path id="Vector"
                                                    d="M13.6959 0.922852H2.92668C2.21264 0.922852 1.52784 1.23406 1.02293 1.78801C0.518028 2.34197 0.234375 3.09329 0.234375 3.8767V27.5075C0.234375 28.2909 0.518028 29.0422 1.02293 29.5962C1.52784 30.1501 2.21264 30.4613 2.92668 30.4613H19.0805C19.7946 30.4613 20.4794 30.1501 20.9843 29.5962C21.4892 29.0422 21.7728 28.2909 21.7728 27.5075V9.78439L13.6959 0.922852ZM19.0805 27.5075H2.92668V3.8767H12.3498V11.2613H19.0805V27.5075Z"
                                                    fill="#24A240" />
                                                <path id="Vector 1480" d="M5.77344 15.0771H15.9273" stroke="#24A240"
                                                    stroke-width="1.23077" stroke-linecap="round" />
                                                <path id="Vector 1481" d="M5.77344 18.1533H15.9273" stroke="#24A240"
                                                    stroke-width="1.23077" stroke-linecap="round" />
                                                <path id="Vector 1482" d="M5.77344 21.2305H15.9273" stroke="#24A240"
                                                    stroke-width="1.23077" stroke-linecap="round" />
                                            </g>
                                        </svg>
                                    @endif

                                    @if ($order->keterangan_status === 'Selesai')
                                        <svg width="32" height="33" viewBox="0 0 32 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path id="Vector"
                                                d="M8 12.6924C7.68483 12.6924 7.37274 12.7545 7.08156 12.8751C6.79038 12.9957 6.5258 13.1725 6.30294 13.3953C6.08008 13.6182 5.9033 13.8828 5.78269 14.1739C5.66208 14.4651 5.6 14.7772 5.6 15.0924C5.6 15.4076 5.66208 15.7196 5.78269 16.0108C5.9033 16.302 6.08008 16.5666 6.30294 16.7894C6.5258 17.0123 6.79038 17.1891 7.08156 17.3097C7.37274 17.4303 7.68483 17.4924 8 17.4924C8.63652 17.4924 9.24697 17.2395 9.69706 16.7894C10.1471 16.3394 10.4 15.7289 10.4 15.0924C10.4 14.4559 10.1471 13.8454 9.69706 13.3953C9.24697 12.9452 8.63652 12.6924 8 12.6924ZM8 15.8924C7.78783 15.8924 7.58434 15.8081 7.43431 15.6581C7.28429 15.508 7.2 15.3046 7.2 15.0924C7.2 14.8802 7.28429 14.6767 7.43431 14.5267C7.58434 14.3767 7.78783 14.2924 8 14.2924C8.21217 14.2924 8.41566 14.3767 8.56569 14.5267C8.71571 14.6767 8.8 14.8802 8.8 15.0924C8.8 15.3046 8.71571 15.508 8.56569 15.6581C8.41566 15.8081 8.21217 15.8924 8 15.8924ZM28 7.09238H25.6V1.49238C25.6 1.28021 25.5157 1.07673 25.3657 0.926698C25.2157 0.776668 25.0122 0.692383 24.8 0.692383H7.2C6.98783 0.692383 6.78434 0.776668 6.63432 0.926698C6.48429 1.07673 6.4 1.28021 6.4 1.49238V7.09238H4C2.93939 7.09323 1.92247 7.51493 1.17251 8.26489C0.422547 9.01485 0.000847468 10.0318 0 11.0924V21.4924C0.00127074 22.765 0.507392 23.9852 1.40729 24.8851C2.30719 25.785 3.52735 26.2911 4.8 26.2924H6.4V31.8924C6.4 32.1046 6.48429 32.308 6.63432 32.4581C6.78434 32.6081 6.98783 32.6924 7.2 32.6924H24.8C25.0122 32.6924 25.2157 32.6081 25.3657 32.4581C25.5157 32.308 25.6 32.1046 25.6 31.8924V26.2924H27.2C28.4727 26.2911 29.6928 25.785 30.5927 24.8851C31.4926 23.9852 31.9987 22.765 32 21.4924V11.0924C31.9992 10.0318 31.5775 9.01485 30.8275 8.26489C30.0775 7.51493 29.0606 7.09323 28 7.09238ZM8 2.29238H24V7.09238H8V2.29238ZM24 31.0924H8V21.4924H24V31.0924ZM30.4 21.4924C30.3987 22.3407 30.0612 23.1539 29.4613 23.7537C28.8615 24.3536 28.0483 24.6911 27.2 24.6924H25.6V20.6924C25.6 20.4802 25.5157 20.2767 25.3657 20.1267C25.2157 19.9767 25.0122 19.8924 24.8 19.8924H7.2C6.98783 19.8924 6.78434 19.9767 6.63432 20.1267C6.48429 20.2767 6.4 20.4802 6.4 20.6924V24.6924H4.8C3.9517 24.6911 3.1385 24.3536 2.53866 23.7537C1.93882 23.1539 1.60127 22.3407 1.6 21.4924V11.0924C1.6 10.4559 1.85286 9.84541 2.30294 9.39533C2.75303 8.94524 3.36348 8.69238 4 8.69238H28C28.6365 8.69238 29.247 8.94524 29.6971 9.39533C30.1471 9.84541 30.4 10.4559 30.4 11.0924V21.4924Z"
                                                fill="#24A240" />
                                        </svg>
                                    @elseif ($order->keterangan_status === 'Masuk')
                                        <svg width="32" height="33" viewBox="0 0 32 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path id="Vector"
                                                d="M8 12.6914C7.68483 12.6914 7.37274 12.7535 7.08156 12.8741C6.79038 12.9947 6.5258 13.1715 6.30294 13.3944C6.08008 13.6172 5.9033 13.8818 5.78269 14.173C5.66208 14.4641 5.6 14.7762 5.6 15.0914C5.6 15.4066 5.66208 15.7187 5.78269 16.0098C5.9033 16.301 6.08008 16.5656 6.30294 16.7885C6.5258 17.0113 6.79038 17.1881 7.08156 17.3087C7.37274 17.4293 7.68483 17.4914 8 17.4914C8.63652 17.4914 9.24697 17.2386 9.69706 16.7885C10.1471 16.3384 10.4 15.7279 10.4 15.0914C10.4 14.4549 10.1471 13.8444 9.69706 13.3944C9.24697 12.9443 8.63652 12.6914 8 12.6914ZM8 15.8914C7.78783 15.8914 7.58434 15.8071 7.43431 15.6571C7.28429 15.5071 7.2 15.3036 7.2 15.0914C7.2 14.8792 7.28429 14.6757 7.43431 14.5257C7.58434 14.3757 7.78783 14.2914 8 14.2914C8.21217 14.2914 8.41566 14.3757 8.56569 14.5257C8.71571 14.6757 8.8 14.8792 8.8 15.0914C8.8 15.3036 8.71571 15.5071 8.56569 15.6571C8.41566 15.8071 8.21217 15.8914 8 15.8914ZM28 7.09141H25.6V1.49141C25.6 1.27923 25.5157 1.07575 25.3657 0.925721C25.2157 0.775692 25.0122 0.691406 24.8 0.691406H7.2C6.98783 0.691406 6.78434 0.775692 6.63432 0.925721C6.48429 1.07575 6.4 1.27923 6.4 1.49141V7.09141H4C2.93939 7.09225 1.92247 7.51395 1.17251 8.26392C0.422547 9.01388 0.000847468 10.0308 0 11.0914V21.4914C0.00127074 22.7641 0.507392 23.9842 1.40729 24.8841C2.30719 25.784 3.52735 26.2901 4.8 26.2914H6.4V31.8914C6.4 32.1036 6.48429 32.3071 6.63432 32.4571C6.78434 32.6071 6.98783 32.6914 7.2 32.6914H24.8C25.0122 32.6914 25.2157 32.6071 25.3657 32.4571C25.5157 32.3071 25.6 32.1036 25.6 31.8914V26.2914H27.2C28.4727 26.2901 29.6928 25.784 30.5927 24.8841C31.4926 23.9842 31.9987 22.7641 32 21.4914V11.0914C31.9992 10.0308 31.5775 9.01388 30.8275 8.26392C30.0775 7.51395 29.0606 7.09225 28 7.09141ZM8 2.29141H24V7.09141H8V2.29141ZM24 31.0914H8V21.4914H24V31.0914ZM30.4 21.4914C30.3987 22.3397 30.0612 23.1529 29.4613 23.7527C28.8615 24.3526 28.0483 24.6901 27.2 24.6914H25.6V20.6914C25.6 20.4792 25.5157 20.2757 25.3657 20.1257C25.2157 19.9757 25.0122 19.8914 24.8 19.8914H7.2C6.98783 19.8914 6.78434 19.9757 6.63432 20.1257C6.48429 20.2757 6.4 20.4792 6.4 20.6914V24.6914H4.8C3.9517 24.6901 3.1385 24.3526 2.53866 23.7527C1.93882 23.1529 1.60127 22.3397 1.6 21.4914V11.0914C1.6 10.4549 1.85286 9.84444 2.30294 9.39435C2.75303 8.94426 3.36348 8.69141 4 8.69141H28C28.6365 8.69141 29.247 8.94426 29.6971 9.39435C30.1471 9.84444 30.4 10.4549 30.4 11.0914V21.4914Z"
                                                fill="#CFCECE" />
                                        </svg>
                                    @else
                                        <span></span>
                                    @endif
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
                                    @if ($order->kelengkapan === 'Lengkap')
                                        <!-- Display the SVG icon when completeness is 'Lengkap' -->
                                        <span class="m_t" data-bs-container="body" data-bs-toggle="popover"
                                            data-bs-placement="top" data-bs-html="true"
                                            data-bs-custom-class="custom_popover"
                                            data-bs-content='<span class="status-order">Data Orderan {{ $order->notes }}</span>'>
                                            <svg width="29" height="9" viewBox="0 0 29 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="Line">
                                                    <circle id="Ellipse 1852" cx="23.9952" cy="4.69051"
                                                        r="4.30769" fill="#24A240" />
                                                    <line id="Line 32" y1="4.69111" x2="27.6923"
                                                        y2="4.69111" stroke="#24A240" stroke-width="2.46154" />
                                                </g>
                                            </svg>
                                        </span>
                                    @endif
                                    @if ($order->keterangan_status === 'Selesai')
                                        <svg width="48" height="9" viewBox="0 0 48 9" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="Line">
                                                <circle id="Ellipse 1852" cx="23.9952" cy="4.69051" r="4.30769"
                                                    fill="#24A240" />
                                                <line id="Line 31" x1="20.3125" y1="4.69111" x2="48.0048"
                                                    y2="4.69111" stroke="#24A240" stroke-width="2.46154" />
                                                <line id="Line 32" y1="4.69111" x2="27.6923" y2="4.69111"
                                                    stroke="#24A240" stroke-width="2.46154" />
                                            </g>
                                        </svg>
                                    @elseif ($order->keterangan_status === 'Masuk')
                                        <svg width="29" height="9" viewBox="0 0 29 9" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="Line">
                                                <circle id="Ellipse 1852" cx="23.9952" cy="4.69051" r="4.30769"
                                                    fill="#CFCECE" />
                                                <line id="Line 32" y1="4.69111" x2="27.6923" y2="4.69111"
                                                    stroke="#CFCECE" stroke-width="2.46154" />
                                            </g>
                                        </svg>
                                    @else
                                        <span></span>
                                    @endif
                                </span>
                                <div class="d-flex align-items-center gap_date">
                                    <p class="text-success d-flex justify-content-center date_text m-0 p-0">
                                        {{ date('d/n', strtotime($order->deadline)) }}</p>
                                    <p class="text-warning d-flex justify-content-center date_text m-0 p-0">
                                        {{ date('d/n', strtotime($order->deadline)) }}</p>
                                    @if ($order->kelengkapan === 'Lengkap')
                                        <p class="text-success d-flex justify-content-center date_text m-0 p-0">
                                            {{ date('d/n', strtotime($order->deadline)) }}</p>
                                    @endif
                                    @if ($order->keterangan_status === 'Selesai')
                                        <p class="text-success d-flex justify-content-center date_text m-0 p-0">
                                            {{ date('d/n', strtotime($order->deadline)) }}</p>
                                    @elseif ($order->keterangan_status === 'Masuk')
                                        <p class="text-secondary d-flex justify-content-center date_text m-0 p-0">
                                            {{ date('d/n', strtotime($order->deadline)) }}</p>
                                    @else
                                        <span></span>
                                    @endif
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
                                <p class="fzt7">Kekurangan</p><span class="fzt7">-RP
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
                                    id="shortNotes2" style="text-justify: justify;">
                                    {{ substr($order->notes, 0, 50) . '...' }}</p>
                                <p class="fs-6  fzt7 fw-semibold col-12 mb-0 color_text m-0 p-0 fullNotes"
                                    id="fullNotes2" style="display: none; text-align:justify;">{{ $order->notes }}
                                </p>
                            </div>

                            <div class="d-lg-none d-md-flex">
                                <p>
                                    {{ $order->notes }}
                                </p>
                            </div>

                            <span class="d-lg-flex d-md-none gap-2">
                                <span onclick="Note(2)" id="textLine2" style="cursor: pointer;">Selengkapnya</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="my-3 d-flex align-items-center gap-5 gap_btn">
                    <a href="#"
                        class="d-flex fzt7 align-items-center justify-content-between btn text-white status-order fw-semibold m-0 tambah_pembayaran"
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
                    </a>
                    <div class="dropdown my-3">
                        <button
                            class="btn bg-white text-black fzt7  border border-black rounded rounded-3 dropdown-toggle btn_sunting"
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
                            class="d-flex justify-content-between btn text-black cek-order fs-6 fw-semibold col-lg-12 m-0 cek_pembayaran"
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
        {{-- CARD DALAM PROSES --}}
    @endforeach
@else
    <p class="fs-6 fw-bold text-center">No orders available.</p>
@endif

@php
    $status = $order->status ?? 'dalam_proses';
    $currentKelengkapan = $order->kelengkapan ?? 'Belum Lengkap';
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

{{-- Modal Proses Orderan Component --}}
{{-- <x-admin.dashboard.modal.modal-proses-orderan /> --}}
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
                                        id="kelengkapan" data-name="kelengkapan" data-type="kelengkapan">
                                        Pilih
                                    </button>
                                    <ul class="dropdown-menu">
                                        @if ($order->kelengkapan === 'Lengkap')
                                            <li><a class="dropdown-item" href="#"
                                                    data-value="Selesai">Selesai</a></li>
                                            <li><a class="dropdown-item" href="#" data-value="Masuk">Masuk</a>
                                            </li>
                                            <input type="hidden" name="keterangan_status" id="checkKeteranganStatus"
                                                value="{{ old('keteranganStatus') }}">
                                        @else
                                            <li><a class="dropdown-item" href="#"
                                                    data-value="Lengkap">Lengkap</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    data-value="Belum Lengkap">Belum Lengkap</a></li>
                                            <input type="hidden" name="kelengkapan" id="checkKelengkapan"
                                                value="{{ old('kelengkapan') }}">
                                        @endif
                                    </ul>
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
        // Fungsi untuk Keterangan Selengkapnya 

        // Mengambil data-value button dropdown tujuan bayar dari modal tambah pembayaran 
        const tambahBayarDropdownMenu = document.querySelectorAll('#tujuan_bayar + .dropdown-menu a');
        tambahBayarDropdownMenu.forEach(item => {
            item.addEventListener('click', function() {
                const selectedValue = this.getAttribute('data-value');
                document.getElementById('tujuan_bayar').innerText = selectedValue;
                document.getElementById('tujuan_bayar').value = selectedValue;
            });
        });

        // Nonaktifkan / disable dropdown li Data Pesanan
        const disableDataPesanan = @json(session('disableDataPesanan', false));

        if (disableDataPesanan) {
            // Disable "Data Pesanan" jika disableDataPesanan true
            const pilihStatusDataPesanan = document.querySelector(
                '#pilih_status + .dropdown-menu a[data-value="Data Pesanan"]');
            pilihStatusDataPesanan.classList.add('disabled');
        }

        const status = "{{ $status }}";
        const dropdownItems = document.querySelectorAll('.status-option');

        // Popover / Hover ketika selesai button proses orderan dengan keterangan
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        });

        const pilihStatusDropdown = document.getElementById('pilih_status');
        const kelengkapanDropdown = document.getElementById('kelengkapan');
        const checkKelengkapan = document.getElementById('checkKelengkapan');
        const checkKeteranganStatus = document.getElementById('checkKeteranganStatus');

        // Fungsi untuk agar selalu mengupdate perubahan saat kejadian button dropdown saat di klik
        const updateDropdowns = () => {
            const selectedStatus = pilihStatusDropdown.innerText.trim();
            const selectedKelengkapan = kelengkapanDropdown.innerText.trim();

            const dropdownItems = document.querySelectorAll('#kelengkapan + .dropdown-menu a');

            // Button dropdown kelengkapan pada modal proses orderan ketika data-value nya Data Pesanan 
            dropdownItems.forEach(item => {
                const isDataPesanan = item.getAttribute('data-value') === 'Data Pesanan';
                if ((isDataPesanan && selectedKelengkapan === 'Selesai') || (!isDataPesanan &&
                        selectedKelengkapan !== 'Selesai')) {
                    item.classList.remove('disabled');
                } else {
                    item.classList.add('disabled');
                }
            });
        };

        // Button dropdown pilih status yang ada pada modal proses orderan. Mengambil data-value saat di klik dan memakai fungsi updateDropdown() agar selalu update 
        const pilihDropdownMenu = document.querySelectorAll('#pilih_status + .dropdown-menu a');
        pilihDropdownMenu.forEach(item => {
            item.addEventListener('click', function() {
                const selectedValue = this.getAttribute('data-value');
                pilihStatusDropdown.innerText = selectedValue;
                pilihStatusDropdown.value = selectedValue;
                updateDropdowns();
            });
        });

        // Button dropdown kelengkapan yang ada pada modal proses orderan. Mengambil data-value saat di klik dan memakai fungsi updateDropdown() agar selalu update 
        const kelengkapanDropdownMenu = document.querySelectorAll('#kelengkapan + .dropdown-menu a');
        kelengkapanDropdownMenu.forEach(item => {
            item.addEventListener('click', function() {
                const selectedValue = this.getAttribute('data-value');
                kelengkapanDropdown.innerText = selectedValue;
                checkKelengkapan.value = selectedValue;
                checkKeteranganStatus.value = selectedValue;

                // Update dropdowns based on the selected value
                updateDropdowns();
                setDropdownAvailabilityAfterSave();
            });
        });

        // Fungsi set button dropdown kelengkapan dan pilih status yang ada pada modal proses orderan ketika Lengkap dan tidak lengkap akan mendisabled Data Pesanan
        function setDropdownAvailabilityAfterSave() {
            const kelengkapanValue = document.getElementById('kelengkapan').innerText.trim();
            const dropdownItems = document.querySelectorAll('#pilih_status + .dropdown-menu a');

            dropdownItems.forEach(item => {
                const isDataPesanan = item.getAttribute('data-value') === 'Data Pesanan';

                if ((isDataPesanan && kelengkapanValue === 'Lengkap') || (!isDataPesanan &&
                        kelengkapanValue !== 'Lengkap')) {
                    item.classList.add('disabled');
                } else {
                    item.classList.remove('disabled');
                }
            });
        }

        setDropdownAvailabilityAfterSave();

        const simpanButton = document.querySelector('#confirmPerubahanStatusOrderModal .btn-primary');
        simpanButton.addEventListener('click', handleSimpanClick);

        // Fungsi ketika button yg ada didalam modal proses orderan di klik
        function handleSimpanClick() {
            const kelengkapanValue = document.getElementById('kelengkapan').innerText.trim();

            if (kelengkapanValue === 'Lengkap') {
                // Show confirm-modal-status
                const confirmModal = bootstrap.Modal.getInstance(document.getElementById(
                    'confirmPerubahanStatusOrderModal'));
                confirmModal.show();

                // Set status dan kelengkapan dropdown menjadi disabled
                document.getElementById('checkKelengkapan').value = 'Lengkap';
                document.getElementById('pilih_status').innerText = 'Data Pesanan';
                document.getElementById('pilih_status').value = 'Data Pesanan';

                // Update dropdown status                
                updateDropdowns();
                setDropdownAvailabilityAfterSave();
                // Close modal-proses-orderan
                const modalProsesOrderan = bootstrap.Modal.getInstance(document.getElementById(
                    'prosesOrderanModal'));
                modalProsesOrderan.hide();
            } else {
                // Proceed with the regular saving logic
                // ...
                updateDropdowns();
                setDropdownAvailabilityAfterSave();
                // Close modal-proses-orderan
                const modalProsesOrderan = bootstrap.Modal.getInstance(document.getElementById(
                    'prosesOrderanModal'));
                modalProsesOrderan.hide();
            }

            if (kelengkapanValue === 'Masuk') {
                document.getElementById('checkKeteranganStatus').value = 'Masuk';
                document.getElementById('pilih_status').innerText = 'Data Pesanan';
                document.getElementById('pilih_status').value = 'Data Pesanan';

                // Update dropdown status                
                updateDropdowns();
                setDropdownAvailabilityAfterSave();
            }
            if (kelengkapanValue === 'Selesai') {
                document.getElementById('checkKeteranganStatus').value = 'Selesai';

                updateDropdowns();
                setDropdownAvailabilityAfterSave();
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

        const statusDropdown = document.getElementById('statusDropdown');
        const statusDropdownSpan = document.querySelector('#statusDropdown span');
        const statusText = document.getElementById('statusText');
        const inputLink = document.querySelector('.py-2 input');

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

        const simpanTambahBayarButton = document.querySelector('#infoPembayaranModal .btn-primary');
        simpanTambahBayarButton.addEventListener('click', function() {
            document.getElementById('modalTambahBayar').value = 'dalam_proses';
        });
    });
</script>
{{-- @endsection --}}
