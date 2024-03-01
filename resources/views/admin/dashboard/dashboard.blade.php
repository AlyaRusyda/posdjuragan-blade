@php
    $status = $status ?? 'semua_orderan';

    $filteredOrders = $orders ?? collect();
@endphp

@extends('layouts.mainA')

@section('css')
    <link rel="stylesheet" href="/assets/css/dashboard.css">
@endsection

@section('konten')
    @if ($orders && $orders->count() > 0)
        <section class="container-admin rounded overflow-hidden">
            {{-- KATEGORI ORDERAN --}}
            <div class="d-flex flex-wrap justify-content-lg-end justify-content-md-center gap-3 px-3 pb-3 pt-3">
                <div
                    class="d-flex flex-wrap justify-content-lg-end justify-content-center col-lg-5 col-md-8 col-sm-12 col-12 gap-4 align-items-center py-4">
                    <!-- Pilih Juragan Dropdown -->
                    <div class="col-lg-auto col-md-auto col-sm-auto col-12 mb-3 mb-md-0">
                        <div class="dropdown">
                            <button class="btn border border-black rounded rounded-3 dropdown-toggle btn-block" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false" id="pilihJuragan">
                                Pilih Juragan
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($orders as $order)
                                    <li><a class="dropdown-item" href="#"
                                            data-value="{{ $order->juragan }}">{{ $order->juragan }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Search Input -->
                    <div class="col-lg-auto col-md-auto col-sm-12 col-12">
                        <div class="dropdown">
                            <div class="input-group rounded m-0 col-12 align-items-center">
                                <input type="text" name="search" class="form-control px-4 py-2 input-search"
                                    id="searchInput" placeholder="Cari Orderan" data-bs-toggle="modal"
                                    data-bs-target="#inputSearchModal" value="">
                                <button class="btn bg-white btn-search" type="button" id="searchButton" disabled>
                                    <span><i class="fa-solid fa-magnifying-glass"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex status-orders row justify-content-lg-between justify-content-md-center g-3 px-lg-5">
                <div class="col-lg-2 col-md-4 col-sm-6 col-12 w-auto">
                    <a href="{{ route('dashboard', ['status' => 'semua_orderan']) }}"
                        class="d-flex align-items-center justify-content-around text-decoration-none btn border-1 rounded-5 border-black py-2 px-3 width_10 {{ $status == 'semua_orderan' ? 'status-order' : 'status-order-normal' }}">
                        Semua Orderan
                        <span class="angka_filter text-white py-1 px-custom">4</span>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12 w-auto">
                    <a href="{{ route('dashboard', ['status' => 'belum_proses']) }}"
                        class="d-flex align-items-center justify-content-around text-decoration-none btn border-1 rounded-5 border-black py-2 px-3 width_10 {{ $status == 'belum_proses' ? 'status-order' : 'status-order-normal' }}">
                        Belum Proses
                        <span class="angka_filter text-white py-1 px-custom">1</span>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12 w-auto">
                    <a href="{{ route('dashboard', ['status' => 'cek_pembayaran']) }}"
                        class="d-flex align-items-center justify-content-around text-decoration-none btn border-1 rounded-5 border-black py-2 px-3 width_10 {{ $status == 'cek_pembayaran' ? 'status-order' : 'status-order-normal' }}">
                        Cek Pembayaran
                        <span class="angka_filter text-white py-1 px-custom">1</span>
                    </a>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12 w-auto">
                    <a href="{{ route('dashboard', ['status' => 'dalam_proses']) }}"
                        class="d-flex align-items-center justify-content-around text-decoration-none btn border-1 rounded-5 border-black py-2 px-3 width_10 {{ $status == 'dalam_proses' ? 'status-order' : 'status-order-normal' }}">
                        Dalam Proses
                        <span class="angka_filter text-white py-1 px-custom">1</span>
                    </a>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12 w-auto">
                    <a href="{{ route('dashboard', ['status' => 'orderan_selesai']) }}"
                        class="d-flex align-items-center justify-content-around text-decoration-none btn border-1 rounded-5 border-black py-2 px-3 width_10 {{ $status == 'orderan_selesai' ? 'status-order' : 'status-order-normal' }}">
                        Orderan Selesai
                        <span class="angka_filter text-white py-1 px-custom">1</span>
                    </a>
                </div>
            </div>



            {{-- KATEGORI ORDERAN --}}
            <x-admin.dashboard.modal.modal-search />

            {{-- Jika status order belum_proses dll akan menampilkan card yang sesuai dengan order --}}
            {{-- folder resource/views/components/admin/dashboard --}}
            @if ($status == 'belum_proses' && $orders->where('status', 'belum_proses')->count() > 0)
                @php $filteredOrders = $orders->where('status', 'belum_proses'); @endphp
                <x-admin.dashboard.card.card-not-process :orders="$filteredOrders" class="col-md-12" />
            @elseif($status == 'cek_pembayaran' && $orders->where('status', 'cek_pembayaran')->count() > 0)
                @php $filteredOrders = $orders->where('status', 'cek_pembayaran'); @endphp
                <x-admin.dashboard.card.card-check-payment :orders="$filteredOrders" class="col-md-12" />
            @elseif($status == 'dalam_proses' && $orders->where('status', 'dalam_proses')->count() > 0)
                @php $filteredOrders = $orders->where('status', 'dalam_proses'); @endphp
                <x-admin.dashboard.card.card-on-process :orders="$filteredOrders" class="col-md-12" />
            @elseif($status == 'orderan_selesai' && $orders->where('status', 'orderan_selesai')->count() > 0)
                @php $filteredOrders = $orders->where('status', 'orderan_selesai'); @endphp
                <x-admin.dashboard.card.card-done-order :orders="$filteredOrders" class="col-md-12" />
            @else
                {{-- MENAMPILKAN SEMUA CARD JIKA STATUS TIDAK DIKENAL --}}
                @if ($orders->count() > 0)
                    <x-admin.dashboard.card.card-not-process :orders="$orders->where('status', 'belum_proses')" />
                    <x-admin.dashboard.card.card-check-payment :orders="$orders->where('status', 'cek_pembayaran')" />
                    <x-admin.dashboard.card.card-on-process :orders="$orders->where('status', 'dalam_proses')" />
                    <x-admin.dashboard.card.card-done-order :orders="$orders->where('status', 'orderan_selesai')" />
                @else
                    <p class="fs-6 fw-bold text-center mt-5">No orders available.</p>
                @endif
            @endif

        </section>
    @endif

@section('javascript')
    <script src="assets/js/admin/dashboard/dashboard-admin.js"></script>ca
@endsection
@endsection
