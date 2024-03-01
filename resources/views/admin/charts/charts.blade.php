@extends('layouts.mainA')

@section('css')
    <link rel="stylesheet" href="/assets/css/charts.css">
@endsection

@section('konten')
    <section class="container-charts rounded mx-4">
        <div class="row justify-content-end mb-4 mt-4 mx-auto"> <!-- Tambahkan div sebagai wadah -->
            <div class="col-lg-2 col-md-10 me-5"> <!-- Tambahkan class col-lg-2 -->
                <select class="form-select justify-content-end rounded-4 border" id="tahun">
                    <option selected>Tahun</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
            </div>
        </div>

        {{-- Container Card --}}
        <article class="d-flex flex-wrap gap-3 mx-1 justify-content-evenly">
            <div class="card-charts card col-lg-12 col-md-10 col-sm-8 py-2 px-2 rounded-4">
                <div class="card-body">
                    <h1 class="card-title fs-4 pb-4">
                        Total Penjualan
                    </h1>
                    <p class="fs-5 text-end fw-bold text-primary">274.000K</p>
                </div>
            </div>
            <div class="card-charts card col-lg-12 col-md-10 col-sm-8 py-2 px-2 rounded-4">
                <div class="card-body">
                    <h1 class="card-title fs-4 pb-4">
                        Total Order
                    </h1>
                    <p class="fs-5 text-end fw-bold text-primary">1000 pcs</p>
                </div>
            </div>
            <div class="card-charts card col-lg-12 col-md-10 col-sm-8 py-2 px-2 rounded-4">
                <div class="card-body">
                    <h1 class="card-title fs-4 pb-4">
                        Penjualan Tertinggi
                    </h1>
                    <p class="fs-5 text-end fw-bold text-primary">45.000K</p>
                </div>
            </div>
        </article>

        {{-- Chart Penjualan --}}
        <article class="mt-5 mx-auto border p-5 bg-white col-lg-11 rounded-4 mb-5">
            {!! $chart->container() !!}
        </article>

        <article class="d-flex row flex-wrap gap-1 mb-5 mt-3 justify-content-evenly">
            <div class="card col-lg-4 col-md-10 col-sm-8 py-2 px-2 rounded-4">
                <div class="card-body">
                    <h1 class="card-title fs-4">
                        Produk Terlaris
                    </h1>
                    <p class="fs-6 date-charts">26 Sep - 25 Okt 2023</p>
                    <div class="d-flex justify-content-between fw-semibold gap-2">
                        <p>Kode Produk</p>
                        <p>Nama Produk</p>
                        <p>Total</p>
                    </div>
                </div>
            </div>
            <div class="card col-lg-3 col-md-10 col-sm-8 py-2 px-2 rounded-4">
                <div class="card-body">
                    <h1 class="card-title fs-4">
                        Toko Terlaris
                    </h1>
                    <p class="fs-6 date-charts">26 Sep - 25 Okt 2023</p>
                    <div class="d-flex justify-content-between fw-semibold">
                        <p>Nama Toko</p>
                        <p>Total</p>
                    </div>
                </div>
            </div>
            <div class="card col-sm-6 col-lg-3 py-2 px-2 rounded-4">
                <div class="card-body">
                    {!! $chartdonut->container() !!}
                </div>
            </div>
        </article>
    </section>
@endsection

@section('js')
    <script src="{{ $chart->cdn() }}"></script>
    <script src="{{ $chartdonut->cdn() }}"></script>
    {{ $chart->script() }}
    {{ $chartdonut->script() }}
@endsection
