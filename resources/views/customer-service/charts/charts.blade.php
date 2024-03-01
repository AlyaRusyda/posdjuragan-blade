@extends('layouts.mainCS')

@section('css')
    <link rel="stylesheet" href="/assets/css/charts.css">
    {{-- <link rel="stylesheet" href="/assets/css/apexcharts.css"> --}}
@endsection

@section('konten')
    <section class="container-cs-charts rounded">
        <article class="mx-5 my-5 py-3 rounded-4 shadow border border-2 border-black border-opacity-25 row bg-white">
            <div class="header-cs-charts d-flex flex-wrap justify-content-between gap-2 px-5 py-3">
                <div class="col-lg-5 col-md-4 col-sm-8">
                    <h1 class="title-cs-charts fs-4 fw-semibold m-0 px-3 py-2">Charts Penjualan CS</h1>
                </div>
                <div class="d-flex flex-wrap justify-content-end col-lg-5 col-md-4 col-sm-8 gap-4 align-items-center py-3">
                    <div class="dropdown">
                        <button class="btn border border-black rounded rounded-3 dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false" id="pilihJuragan">
                            Pilih Juragan
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" data-value="Korean Hunter">Korean Hunter</a></li>
                            <li><a class="dropdown-item" href="#" data-value="Limited Shoping">Limited Shoping</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn border border-black rounded rounded-3 dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false" id="belum-terkirim">
                            Belum Terkirim
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" data-value="Action">Action</a></li>
                            <li><a class="dropdown-item" href="#" data-value="Another action">Another action</a></li>
                            <li><a class="dropdown-item" href="#" data-value="Something else here">Something else
                                    here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- <div class="img-charts-cs mx-5 my-3">
                <div id="chartCS" style="width: 94%;"></div>
            </div> --}}
            {{-- <section>
                @include('customer-service.charts.isicharts.isi')
            </section> --}}
            <!---->
            <!--chart-->

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


            <!---->

        </article>

        <!--ranking-->
        <article class="mx-5 my-5 p-4 rounded-4 shadow gap-4 row " style="background: #2E3955">
            <div class="pemenang col12 rounded-4 p-4 d-flex justify-content-center flex-row gap-3">
                <h1 class="text-white">PEMENANG </h1>
                <h1 class="text-dark" style="text-shadow: 0 2px 3px black">SEPTEMBER</h1>
            </div>
            <!--leaderboard-->
            <div class="leaderboard-parent col12 p-4 rounded-4 d-flex justify-content-center flex-column gap-3">
                <h1 class="text-center text-light"style="letter-spacing:5px; text-shadow:0 2px 3px black;">
                    <b>LEADERBOARD</b>
                </h1>
                <div class="leaderboard-child col12 rounded-4 d-flex justify-content-center w-100 row p-5">
                    <div class="ranktigabesar row  col-12">
                        <div class="ranktiga col-4 justify-content-center">
                            <div class="anakabsolute d-flex justify-content-center">
                                <img src="https://cdn-icons-png.flaticon.com/128/13601/13601212.png">
                            </div>
                            <h3 class="text-white text-center">Reynold</h3>
                            <h4 class=" silver text-center">1000 Pcs.</h4>
                            <p class="text-white text-center fw-light">@Username</p>
                        </div>
                        <div class="ranksatu col-4 justify-content-center">
                            <div class="anakabsolute d-flex justify-content-center">
                                <img src="https://cdn-icons-png.flaticon.com/128/616/616430.png">
                            </div>
                            <h3 class="text-white text-center">Carolyne</h3>
                            <h4 class="gold text-center">2100 Pcs</h4>
                            <p class="text-white text-center fw-light">@Username</p>
                        </div>
                        <div class="rankdua col-4 justify-content-center">
                            <div class="anakabsolute d-flex justify-content-center">
                                <img src="https://cdn-icons-png.flaticon.com/128/2171/2171991.png">
                            </div>
                            <h3 class="text-white text-center">Kimberly</h3>
                            <h4 class="perak text-center">1200 Pcs.</h4>
                            <p class="text-white text-center fw-light">@Username</p>
                        </div>
                        <!--list-->
                        <div class="daftar d-flex flex-column col-12  justify-content-center bg-white">
                            <div class="isi-daftar-scroll bg-white">
                                <!--isi list-->
                                <div class="my-2 d-flex flex-row justify-content-between row ">
                                    <div class="ulkiri col-4   d-flex flex-row rownjustify-content-around">
                                        <div
                                            class="no col-3 justify-content-lg-center justify-content-md-start d-flex align-items-center ">
                                            <b>1</b>
                                        </div>
                                        <div
                                            class="profil-list col-9 text-center d-flex align-items-center justify-content-around ">
                                            <div class="profil-list-kiri align-items-center">
                                                <img src="https://cdn-icons-png.flaticon.com/128/10736/10736493.png">
                                            </div>
                                            <div
                                                class="profil-list-kanan d-flex flex-column justify-content-center align-items-center">
                                                <div class="nama-profil-list  text-center d-flex align-items-center">
                                                    <b>Diska</b>
                                                </div>
                                                <div
                                                    class="username-profil-list  text-center d-flex align-items-center fw-light">
                                                    @username</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ulkanan col-3  d-flex flex-row row justify-content-between">
                                        <div class="poin col-5 justify-content-center d-flex align-items-center">
                                            <b>1200</b>
                                        </div>
                                        <div class="ikon col-5 text-center d-flex align-items-center">
                                            <i class="fa-solid fa-up-long" style="color:rgb(38, 218, 38)"></i>
                                        </div>
                                    </div>

                                </div>
                                <!--isi list-->
                                <div class="my-2 p-2 d-flex flex-row justify-content-between row ">
                                    <div class="ulkiri col-4   d-flex flex-row rownjustify-content-around">
                                        <div
                                            class="no col-3 justify-content-lg-center justify-content-nd-start d-flex align-items-center ">
                                            <b>2</b>
                                        </div>
                                        <div
                                            class="profil-list col-9 text-center d-flex align-items-center justify-content-around ">
                                            <div class="profil-list-kiri align-items-center">
                                                <img src="https://cdn-icons-png.flaticon.com/128/14029/14029949.png">
                                            </div>
                                            <div
                                                class="profil-list-kanan d-flex flex-column justify-content-center align-items-center">
                                                <div class="nama-profil-list  text-center d-flex align-items-center">
                                                    <b>Siska</b>
                                                </div>
                                                <div
                                                    class="username-profil-list  text-center d-flex align-items-center fw-light">
                                                    @username</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ulkanan col-3  d-flex flex-row row justify-content-between">
                                        <div class="poin col-5 justify-content-center d-flex align-items-center">
                                            <b>200</b>
                                        </div>
                                        <div class="ikon col-5 text-center d-flex align-items-center">
                                            <i class="fa-solid fa-down-long" style="color:rgb(199, 25, 25)"></i>
                                        </div>
                                    </div>

                                </div>
                                <!--isi list-->
                                <div class="my-2 p-2 d-flex flex-row justify-content-between row active">
                                    <div class="ulkiri col-4   d-flex flex-row rownjustify-content-around">
                                        <div
                                            class="no col-3 justify-content-lg-center justify-content-md-start d-flex align-items-center ">
                                            <b>3</b>
                                        </div>
                                        <div
                                            class="profil-list col-9 text-center d-flex align-items-center justify-content-around ">
                                            <div class="profil-list-kiri align-items-center">
                                                <img src="https://cdn-icons-png.flaticon.com/128/1864/1864640.png">
                                            </div>
                                            <div
                                                class="profil-list-kanan d-flex flex-column justify-content-center align-items-center">
                                                <div class="nama-profil-list  text-center d-flex align-items-center">
                                                    <b>Dika</b>
                                                </div>
                                                <div
                                                    class="username-profil-list  text-center d-flex align-items-center fw-light">
                                                    @username</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ulkanan col-3  d-flex flex-row row justify-content-between">
                                        <div class="poin col-5 justify-content-center d-flex align-items-center">
                                            <b>1600</b>
                                        </div>
                                        <div class="ikon col-5 text-center d-flex align-items-center">
                                            <i class="fa-solid fa-up-long" style="color:rgb(38, 218, 38)"></i>
                                        </div>
                                    </div>

                                </div>
                                <!--isi list-->
                                <div class="my-2 p-2 d-flex flex-row justify-content-between row ">
                                    <div class="ulkiri col-4   d-flex flex-row rownjustify-content-around">
                                        <div
                                            class="no col-3 justify-content-lg-center justify-content-nd-start d-flex align-items-center ">
                                            <b>4</b>
                                        </div>
                                        <div
                                            class="profil-list col-9 text-center d-flex align-items-center justify-content-around ">
                                            <div class="profil-list-kiri align-items-center">
                                                <img src="https://cdn-icons-png.flaticon.com/128/14395/14395817.png">
                                            </div>
                                            <div
                                                class="profil-list-kanan d-flex flex-column justify-content-center align-items-center">
                                                <div class="nama-profil-list  text-center d-flex align-items-center">
                                                    <b>Adit</b>
                                                </div>
                                                <div
                                                    class="username-profil-list  text-center d-flex align-items-center fw-light">
                                                    @username</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ulkanan col-3  d-flex flex-row row justify-content-between">
                                        <div class="poin col-5 justify-content-center d-flex align-items-center">
                                            <b>1500</b>
                                        </div>
                                        <div class="ikon col-5 text-center d-flex align-items-center">
                                            <i class="fa-solid fa-down-long" style="color:rgb(199, 25, 25)"></i>
                                        </div>
                                    </div>

                                </div>
                                <!--isi list-->
                                <div class="my-2 p-2 d-flex flex-row justify-content-between row ">
                                    <div class="ulkiri col-4   d-flex flex-row rownjustify-content-around">
                                        <div
                                            class="no col-3 justify-content-lg-center justify-content-md-start d-flex align-items-center ">
                                            <b>5</b>
                                        </div>
                                        <div
                                            class="profil-list col-9 text-center d-flex align-items-center justify-content-around ">
                                            <div class="profil-list-kiri align-items-center">
                                                <img src="https://cdn-icons-png.flaticon.com/128/1998/1998592.png">
                                            </div>
                                            <div
                                                class="profil-list-kanan d-flex flex-column justify-content-center align-items-center">
                                                <div class="nama-profil-list  text-center d-flex align-items-center">
                                                    <b>Luna</b>
                                                </div>
                                                <div
                                                    class="username-profil-list  text-center d-flex align-items-center fw-light">
                                                    @username</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ulkanan col-3  d-flex flex-row row justify-content-between">
                                        <div class="poin col-5 justify-content-center d-flex align-items-center">
                                            <b>100</b>
                                        </div>
                                        <div class="ikon col-5 text-center d-flex align-items-center">
                                            <i class="fa-solid fa-up-long" style="color:rgb(38, 218, 38)"></i>
                                        </div>
                                    </div>

                                </div>
                                <!--isi list-->
                                <div class="my-2 p-2 d-flex flex-row justify-content-between row ">
                                    <div class="ulkiri col-4   d-flex flex-row rownjustify-content-around">
                                        <div
                                            class="no col-3 justify-content-lg-center justify-content-nd-start d-flex align-items-center ">
                                            <b>4</b>
                                        </div>
                                        <div
                                            class="profil-list col-9 text-center d-flex align-items-center justify-content-around ">
                                            <div class="profil-list-kiri align-items-center">
                                                <img src="https://cdn-icons-png.flaticon.com/128/14395/14395817.png">
                                            </div>
                                            <div
                                                class="profil-list-kanan d-flex flex-column justify-content-center align-items-center">
                                                <div class="nama-profil-list  text-center d-flex align-items-center">
                                                    <b>Adit</b>
                                                </div>
                                                <div
                                                    class="username-profil-list  text-center d-flex align-items-center fw-light">
                                                    @username</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ulkanan col-3  d-flex flex-row row justify-content-between">
                                        <div class="poin col-5 justify-content-center d-flex align-items-center">
                                            <b>1500</b>
                                        </div>
                                        <div class="ikon col-5 text-center d-flex align-items-center">
                                            <i class="fa-solid fa-down-long" style="color:rgb(199, 25, 25)"></i>
                                        </div>
                                    </div>

                                </div>
                                <!--isi list-->
                                <div class="my-2 p-2 d-flex flex-row justify-content-between row  ">
                                    <div class="ulkiri col-4   d-flex flex-row rownjustify-content-around">
                                        <div
                                            class="no col-3 justify-content-lg-center justify-content-md-start d-flex align-items-center ">
                                            <b>5</b>
                                        </div>
                                        <div
                                            class="profil-list col-9 text-center d-flex align-items-center justify-content-around ">
                                            <div class="profil-list-kiri align-items-center">
                                                <img src="https://cdn-icons-png.flaticon.com/128/1998/1998592.png">
                                            </div>
                                            <div
                                                class="profil-list-kanan d-flex flex-column justify-content-center align-items-center">
                                                <div class="nama-profil-list  text-center d-flex align-items-center">
                                                    <b>Luna</b>
                                                </div>
                                                <div
                                                    class="username-profil-list  text-center d-flex align-items-center fw-light">
                                                    @username</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ulkanan col-3  d-flex flex-row row justify-content-between">
                                        <div class="poin col-5 justify-content-center d-flex align-items-center">
                                            <b>100</b>
                                        </div>
                                        <div class="ikon col-5 text-center d-flex align-items-center">
                                            <i class="fa-solid fa-up-long" style="color:rgb(38, 218, 38)"></i>
                                        </div>
                                    </div>

                                </div>

                                <!--isi list-->
                                <div class="my-2 p-2 d-flex flex-row justify-content-between row ">
                                    <div class="ulkiri col-4   d-flex flex-row rownjustify-content-around">
                                        <div
                                            class="no col-3 justify-content-lg-center justify-content-nd-start d-flex align-items-center ">
                                            <b>4</b>
                                        </div>
                                        <div
                                            class="profil-list col-9 text-center d-flex align-items-center justify-content-around ">
                                            <div class="profil-list-kiri align-items-center">
                                                <img src="https://cdn-icons-png.flaticon.com/128/14395/14395817.png">
                                            </div>
                                            <div
                                                class="profil-list-kanan d-flex flex-column justify-content-center align-items-center">
                                                <div class="nama-profil-list  text-center d-flex align-items-center">
                                                    <b>Adit</b>
                                                </div>
                                                <div
                                                    class="username-profil-list  text-center d-flex align-items-center fw-light">
                                                    @username</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ulkanan col-3  d-flex flex-row row justify-content-between">
                                        <div class="poin col-5 justify-content-center d-flex align-items-center">
                                            <b>1500</b>
                                        </div>
                                        <div class="ikon col-5 text-center d-flex align-items-center">
                                            <i class="fa-solid fa-down-long" style="color:rgb(199, 25, 25)"></i>
                                        </div>
                                    </div>

                                </div>
                                <!--isi list-->
                                <div class="my-2 p-2 d-flex flex-row justify-content-between row ">
                                    <div class="ulkiri col-4   d-flex flex-row rownjustify-content-around">
                                        <div
                                            class="no col-3 justify-content-lg-center justify-content-md-start d-flex align-items-center ">
                                            <b>5</b>
                                        </div>
                                        <div
                                            class="profil-list col-9 text-center d-flex align-items-center justify-content-around ">
                                            <div class="profil-list-kiri align-items-center">
                                                <img src="https://cdn-icons-png.flaticon.com/128/1998/1998592.png">
                                            </div>
                                            <div
                                                class="profil-list-kanan d-flex flex-column justify-content-center align-items-center">
                                                <div class="nama-profil-list  text-center d-flex align-items-center">
                                                    <b>Luna</b>
                                                </div>
                                                <div
                                                    class="username-profil-list  text-center d-flex align-items-center fw-light">
                                                    @username</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ulkanan col-3  d-flex flex-row row justify-content-between">
                                        <div class="poin col-5 justify-content-center d-flex align-items-center">
                                            <b>100</b>
                                        </div>
                                        <div class="ikon col-5 text-center d-flex align-items-center">
                                            <i class="fa-solid fa-up-long" style="color:rgb(38, 218, 38)"></i>
                                        </div>
                                    </div>

                                </div>
                                <!--isi list-->
                                <div class="my-2 p-2 d-flex flex-row justify-content-between row ">
                                    <div class="ulkiri col-4   d-flex flex-row rownjustify-content-around">
                                        <div
                                            class="no col-3 justify-content-lg-center justify-content-nd-start d-flex align-items-center ">
                                            <b>4</b>
                                        </div>
                                        <div
                                            class="profil-list col-9 text-center d-flex align-items-center justify-content-around ">
                                            <div class="profil-list-kiri align-items-center">
                                                <img src="https://cdn-icons-png.flaticon.com/128/14395/14395817.png">
                                            </div>
                                            <div
                                                class="profil-list-kanan d-flex flex-column justify-content-center align-items-center">
                                                <div class="nama-profil-list  text-center d-flex align-items-center">
                                                    <b>Adit</b>
                                                </div>
                                                <div
                                                    class="username-profil-list  text-center d-flex align-items-center fw-light">
                                                    @username</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ulkanan col-3  d-flex flex-row row justify-content-between">
                                        <div class="poin col-5 justify-content-center d-flex align-items-center">
                                            <b>1500</b>
                                        </div>
                                        <div class="ikon col-5 text-center d-flex align-items-center">
                                            <i class="fa-solid fa-down-long" style="color:rgb(199, 25, 25)"></i>
                                        </div>
                                    </div>

                                </div>
                                <!--isi list-->
                                <div class="my-2 p-2 d-flex flex-row justify-content-between row  ">
                                    <div class="ulkiri col-4   d-flex flex-row rownjustify-content-around">
                                        <div
                                            class="no col-3 justify-content-lg-center justify-content-md-start d-flex align-items-center ">
                                            <b>5</b>
                                        </div>
                                        <div
                                            class="profil-list col-9 text-center d-flex align-items-center justify-content-around ">
                                            <div class="profil-list-kiri align-items-center">
                                                <img src="https://cdn-icons-png.flaticon.com/128/1998/1998592.png">
                                            </div>
                                            <div
                                                class="profil-list-kanan d-flex flex-column justify-content-center align-items-center">
                                                <div class="nama-profil-list  text-center d-flex align-items-center">
                                                    <b>Luna</b>
                                                </div>
                                                <div
                                                    class="username-profil-list  text-center d-flex align-items-center fw-light">
                                                    @username</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ulkanan col-3  d-flex flex-row row justify-content-between">
                                        <div class="poin col-5 justify-content-center d-flex align-items-center">
                                            <b>100</b>
                                        </div>
                                        <div class="ikon col-5 text-center d-flex align-items-center">
                                            <i class="fa-solid fa-up-long" style="color:rgb(38, 218, 38)"></i>
                                        </div>
                                    </div>

                                </div>




                                <!---->
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </article>



    </section>
    <footer class="mx-5 rounded-2">
        <div class="footer-cs-charts">
        </div>
    </footer>


    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     const chartContainer = document.getElementById('chartCS');
        //     const pilihJuragan = document.querySelectorAll('#pilihJuragan + .dropdown-menu a');

        //     let currentData = null;

        //     function fetchAndRenderChart(juragan) {
        //         fetch(`/charts/data?juragan=${juragan}`)
        //             .then(response => response.json())
        //             .then(data => {
        //                 currentData = data;

        //                 if (currentData) {
        //                     renderChart();
        //                 }
        //             });
        //     }
        // }
        // )
        document.addEventListener('DOMContentLoaded', function() {
            // const chartContainer = document.getElementById('chartCS');
            const pilihJuragan = document.querySelectorAll('#pilihJuragan + .dropdown-menu a');

            // let currentData = null;

            // function fetchAndRenderChart(juragan) {
            //     fetch(`/charts/data?juragan=${juragan}`)
            //         .then(response => response.json())
            //         .then(data => {
            //             currentData = data;

            //             if (currentData) {
            //                 renderChart();
            //             }
            //         });
            // }

            // function renderChart() {
            //     if (currentData) {
            //         var options = {
            //             series: [{
            //                 name: "Penjualan",
            //                 data: currentData.data
            //             }],
            //             chart: {
            //                 height: 350,
            //                 type: 'line',
            //                 zoom: {
            //                     enabled: false
            //                 }
            //             },
            //             dataLabels: {
            //                 enabled: false
            //             },
            //             stroke: {
            //                 curve: 'straight'
            //             },
            //             title: {
            //                 text: 'Product Trends by Month',
            //                 align: 'left'
            //             },
            //             grid: {
            //                 row: {
            //                     colors: ['#f3f3f3', 'transparent'],
            //                     opacity: 0.5
            //                 },
            //             },
            //             xaxis: {
            //                 categories: currentData.labels
            //             }
            //         };

            //         var chart = new ApexCharts(chartContainer, options);
            //         chart.render();
            //     }
            // }

            pilihJuragan.forEach(item => {
                item.addEventListener('click', function() {
                    const selectedJuragan = this.getAttribute('data-value');
                    document.getElementById('pilihJuragan').innerText = selectedJuragan;
                    fetchAndRenderChart(selectedJuragan);
                });
            });

            // Inisialisasi dengan juragan pertama saat halaman dimuat
            fetchAndRenderChart(pilihJuragan[0].getAttribute('data-value'));
        });


        //select action
        document.querySelectorAll('.dropdown-menu a').forEach(item => {
            item.addEventListener('click', function() {
                document.getElementById('belum-terkirim').innerText = this.getAttribute('data-value');
            });
        });



        // Inisialisasi dengan juragan pertama saat halaman dimuat
    </script>
@endsection
