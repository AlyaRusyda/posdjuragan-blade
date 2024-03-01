@extends('layouts.mainSA')

@section('css')
    <link rel="stylesheet" href="/assets/css/charts.css">
    <link rel="stylesheet" href="/assets/css/chartsbs5.css">
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
        <article class="d-flex mx-auto flex-wrap gap-3 mx-1 row justify-content-between card-sa-t col-lg-11 ">
            <div class="card-charts card col-lg-3 py-2 px-2 rounded-4 child-card-sa-t">
                <div class="card-body">
                    <h1 class="card-title fs-4 pb-4">
                        Total Penjualan
                    </h1>
                    <p class="fs-5 text-end fw-bold text-primary">274.000K</p>
                </div>
            </div>
            <div class="card-charts card col-lg-3 py-2 px-2 rounded-4 child-card-sa-t">
                <div class="card-body">
                    <h1 class="card-title fs-4 pb-4">
                        Total Order
                    </h1>
                    <p class="fs-5 text-end fw-bold text-primary">1000 pcs</p>
                </div>
            </div>
            <div class="card-charts card col-lg-3 py-2 px-2 rounded-4 child-card-sa-t">
                <div class="card-body">
                    <h1 class="card-title fs-4 pb-4">
                        Penjualan Tertinggi
                    </h1>
                    <p class="fs-5 text-end fw-bold text-primary">45.000K</p>
                </div>
            </div>
        </article>

        {{-- Chart Penjualan --}}
        <div class="chart w-100">
            <div class="wadah-chart ">
                <div class="chart-kiri ">
                    <div class="tinggi"></div>
                    <div class="tinggi">0</div>
                    <div class="tinggi">50</div>
                    <div class="tinggi">100</div>
                    <div class="tinggi">150</div>
                    <div class="tinggi">200</div>
                    <div class="tinggi">250</div>
                    <div class="tinggi">300</div>
                    <div class="tinggi">350</div>
                    <div class="tinggi">400</div>
                    <div class="tinggi">450</div>
                    <div class="tinggi">500</div>


                </div>
                <div class="chart-kanan ">
                    <div class="kanan-atas">
                        <div class="background-garis-nilai">
                            <div class="background-garis">
                                <div class="garis-garis"></div>
                                <div class="garis-garis"></div>
                                <div class="garis-garis"></div>
                                <div class="garis-garis"></div>
                                <div class="garis-garis"></div>
                                <div class="garis-garis"></div>
                                <div class="garis-garis"></div>
                                <div class="garis-garis"></div>
                                <div class="garis-garis"></div>
                                <div class="garis-garis"></div>
                                <div class="garis-garis"></div>

                            </div>
                            <div class="nilai-chart row ">
                                <div class="row col12">
                                    <!--jan-->
                                    <div id="januari" class="nilainya justify-content-center col-1"
                                        style="height: 70px">
                                        <div class="bg-primary"></div>
                                    </div>
                                    <!--feb-->
                                    <div id="febuari" class="nilainya justify-content-center col-1"
                                        style="height: 150px">
                                        <div class="bg-primary"></div>
                                    </div>
                                    <!--mart-->
                                    <div id="maret" class="nilainya justify-content-center col-1"
                                        style="height: 300px">
                                        <div class="bg-primary"></div>
                                    </div>
                                    <!--april-->
                                    <div id="april" class="nilainya justify-content-center col-1"
                                        style="height: 100px">
                                        <div class="bg-primary"></div>
                                    </div>
                                    <!--mei-->
                                    <div id="mei" class="nilainya justify-content-center col-1"
                                        style="height: 120px">
                                        <div class="bg-primary"></div>
                                    </div>
                                    <!--juni-->
                                    <div id="juni" class="nilainya justify-content-center col-1"
                                        style="height: 80px">
                                        <div class="bg-primary"></div>
                                    </div>
                                    <!--juli-->
                                    <div id="juli" class="nilainya justify-content-center col-1"
                                        style="height: 80px">
                                        <div class="bg-primary"></div>
                                    </div>
                                    <!--agus-->
                                    <div id="agustus" class="nilainya justify-content-center col-1"
                                        style="height: 240px">
                                        <div class="bg-primary"></div>
                                    </div>
                                    <!--sep-->
                                    <div id="september" class="nilainya justify-content-center col-1"
                                        style="height: 230px">
                                        <div class="bg-primary"></div>
                                    </div>
                                    <!--okt-->
                                    <div id="oktober" class="nilainya justify-content-center col-1"
                                        style="height: 130px">
                                        <div class="bg-primary"></div>
                                    </div>
                                    <!--nov-->
                                    <div id="november" class="nilainya justify-content-center col-1"
                                        style="height: 90px">
                                        <div class="bg-primary"></div>
                                    </div>
                                    <!--dec-->
                                    <div id="desember" class="nilainya justify-content-center col-1"
                                        style="height: 170px">
                                        <div class="bg-primary"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="kanan-bulan row w-100 ">
                        <div class="bulan col-1 d-flex justify-content-center">Jan</div>
                        <div class="bulan col-1 d-flex justify-content-center">Feb</div>
                        <div class="bulan col-1 d-flex justify-content-center">Mar</div>
                        <div class="bulan col-1 d-flex justify-content-center">Apr</div>
                        <div class="bulan col-1 d-flex justify-content-center">Mei</div>
                        <div class="bulan col-1 d-flex justify-content-center">Jun</div>
                        <div class="bulan col-1 d-flex justify-content-center">Jul</div>
                        <div class="bulan col-1 d-flex justify-content-center">Ags</div>
                        <div class="bulan col-1 d-flex justify-content-center">Sep</div>
                        <div class="bulan col-1 d-flex justify-content-center">Okt</div>
                        <div class="bulan col-1 d-flex justify-content-center">Nov</div>
                        <div class="bulan col-1 d-flex justify-content-center">Des</div>

                    </div>

                </div>
            </div>
        </div>


        </article>
        {{-- <div class="card"> 
                  
            <div id="earning"></div>
          </div> --}}

        </article>

        <article class="d-flex flex-wrap gap-2 mt-3 justify-content-evenly mb-5">
            <div class="card col-lg-4 col-md-10 col-sm-10 py-2 px-2 rounded-4 child-card-sa-t">
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
            <div class="card col-lg-3 col-md-10 col-sm-10 py-2 px-2 rounded-4 child-card-sa-t">
                <div class="card-body">
                    <h1 class="card-title fs-4">
                        Toko Terlaris
                    </h1>
                    <p class="fs-6 date-charts">26 Sep - 25 Okt 2023</p>
                    <div class="d-flex justify-content-around fw-semibold">
                        <p>Nama Toko</p>
                        <p>Total</p>
                    </div>
                </div>
            </div>
            <div class="card col-sm-6 col-lg-3 py-2 px-2 rounded-4 child-card-sa-t-delapan">
                <div class="card-body ">
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
@section('javascript')
<script src="/super-admin/chart.js"></script>

@endsection
