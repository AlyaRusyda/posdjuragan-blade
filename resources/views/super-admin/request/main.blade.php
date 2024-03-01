@extends('layouts.mainSA')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/request.css') }}">
@endsection

@section('konten')
    <div class="container-fluid p-4">

        {{-- header --}}
        <header class="col-lg-5">
            <ul class="nav nav-pills mb-4 gap-4" id="pills-tab" role="tablist">
                <li class="nav-item btn-req" role="presentation">
                  <button class="btn btn-sm btn-outline-dark rounded-pill px-3 active"  data-bs-toggle="pill" data-bs-target="#Unfinished" type="button" role="tab">Belum Selesai</button>
                </li>
                <li class="nav-item btn-req" role="presentation">
                  <button class="btn btn-sm btn-outline-dark  rounded-pill px-3"  data-bs-toggle="pill" data-bs-target="#Finished" type="button" role="tab" >Selesai</button>
                </li>
                {{-- <li class="nav-item btn-req" role="presentation">
                    <button class="btn btn-sm btn-outline-dark  rounded-pill"  data-bs-toggle="pill" data-bs-target="#Denied" type="button" role="tab" >Ditolak</button>
                </li> --}}{{-- buka bila perlu --}}
            </ul>
        </header>

        <main >
            <div class="tab-content col-lg-12 " id="pills-tabContent">
                {{-- belum selesai --}}
                <div class="tab-pane fade show active" id="Unfinished" role="tabpanel">
                    <div class="card col-lg-12 " id="reqUnfinished">
                        <div class="card-header d-flex justify-content-end py-3 small" onclick="removeUnreadClass()"><p style="cursor: pointer;">Tandai sebagai sudah dibaca</p></div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item unread d-flex justify-content-between align-items-center " id="request1" >
                                <img src="{{ asset('assets/img/logo-file.png') }}" height="40px" alt="">
                                <div class="flex-column flex-fill px-3">
                                    <div>1Request Edit Orderan dengan no Pesanan #AH1693918566</div>
                                    <div class="info-req">
                                        <p>[Korean Hunter] Emery Donin</p>
                                        <p>29-09-2023 12:37</p>
                                    </div>
                                </div>
                                <button class="btn btn-detail border-0 py-1 px-4" data-bs-toggle="modal" data-bs-target="#modalRequest" id="detail">Detail</button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center " id="request2">
                                <img src="{{ asset('assets/img/logo-file.png') }}" height="40px" alt="">
                                <div class="flex-column flex-fill px-3">
                                    <div>2Request Edit Orderan dengan no Pesanan #AH1693918566</div>
                                    <div class="info-req">
                                        <p>[Korean Hunter] Emery Donin</p>
                                        <p>29-09-2023 12:37</p>
                                    </div>
                                </div>
                                <button class="btn btn-detail border-0 py-1 px-4" data-bs-toggle="modal" data-bs-target="#modalRequest" id="detail">Detail</button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center " id="request3">
                                <img src="{{ asset('assets/img/logo-file.png') }}" height="40px" alt="">
                                <div class="flex-column flex-fill px-3">
                                    <div>3Request Edit Orderan dengan no Pesanan #AH1693918566</div>
                                    <div class="info-req">
                                        <p>[Korean Hunter] Emery Donin</p>
                                        <p>29-09-2023 12:37</p>
                                    </div>
                                </div>
                                <button class="btn btn-detail border-0 py-1 px-4" data-bs-toggle="modal" data-bs-target="#modalRequest">Detail</button>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- selesai --}}
                <div class="tab-pane fade" id="Finished" role="tabpanel" >
                    <div class="card col-lg-12" >
                        <div class="card-header"></div>
                        <ul class="list-group list-group-flush"id="reqFinished">
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                <img src="{{ asset('assets/img/logo-file.png') }}" height="40px" alt="">
                                <div class="flex-column flex-fill px-3">
                                    <div class="req-title">An item</div>
                                    <div class="info-req small">
                                        <p>[Korean Hunter] Emery Donin</p>
                                        <p>29-09-2023 12:37</p>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <p class="text-center fw-bold accept"></p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                <img src="{{ asset('assets/img/logo-file.png') }}" height="40px" alt="">
                                <div class="flex-column flex-fill px-3">
                                    <div class="req-title">A second item</div>
                                    <div class="info-req small">
                                        <p>[Korean Hunter] Emery Donin</p>
                                        <p>29-09-2023 12:37</p>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <p class="text-center fw-bold accept"></p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                <img src="{{ asset('assets/img/logo-file.png') }}" height="40px" alt="">
                                <div class="flex-column flex-fill px-3">
                                    <div class="req-title">A third item</div>
                                    <div class="info-req small">
                                        <p>[Korean Hunter] Emery Donin</p>
                                        <p>29-09-2023 12:37</p>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <p class="text-center fw-bold accept"></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- denied --}}
                {{-- <div class="tab-pane fade" id="Denied" role="tabpanel" >
                    <div class="card col-lg-12" >
                        <div class="card-header"></div>
                        <ul class="list-group list-group-flush"id="reqDenied">
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                <img src="{{ asset('assets/img/logo-file.png') }}" height="40px" alt="">
                                <div class="flex-column flex-fill px-3">
                                    <div class="req-title">An item</div>
                                    <div class="info-req small">
                                        <p>[Korean Hunter] Emery Donin</p>
                                        <p>29-09-2023 12:37</p>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <p class="text-center fw-bold denied"></p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                <img src="{{ asset('assets/img/logo-file.png') }}" height="40px" alt="">
                                <div class="flex-column flex-fill px-3">
                                    <div class="req-title">A second item</div>
                                    <div class="info-req small">
                                        <p>[Korean Hunter] Emery Donin</p>
                                        <p>29-09-2023 12:37</p>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <p class="text-center fw-bold denied"></p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                <img src="{{ asset('assets/img/logo-file.png') }}" height="40px" alt="">
                                <div class="flex-column flex-fill px-3">
                                    <div class="req-title">A third item</div>
                                    <div class="info-req small">
                                        <p>[Korean Hunter] Emery Donin</p>
                                        <p>29-09-2023 12:37</p>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <p class="text-center fw-bold denied"></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </main>

        <!-- Modal request detail -->
        <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog">
            <form>
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header m-4 p-0  d-flex justify-content-between align-items-start border-bottom-0 ">
                        <div class="flex-fill  col-xl-3 d-flex justify-content-start p-0">
                            <div class="idProduct ">
                                <p class="text-uppercase px-2 py-3" >#az019210djd12</p>
                            </div>
                        </div>
                        <div class="flex-fill  col-xl-2  flex-column p-0">
                            <div class="headReq">
                                <p class="text-capitalize" style="margin-bottom:12px;">22 November 2021</p>
                                <p class="text-capitalize ">limited shoping</p>
                            </div>
                        </div>
                        <div class="flex-fill  col-xl-4  flex-column p-0 ps-5">
                            <div class="headReq">
                                <p style=" margin-bottom:12px;">Asal Orderan</p>
                                <p class="text-uppercase asal-order fw-bolder">shopee</p>
                            </div>
                        </div>
                        <div class="flex-fill  col-xl-2  flex-column p-0 ps-3">
                            <div class="headReq ">
                                <p style=" margin-bottom:12px;">Dilayani</p>
                                <p class="fw-bolder" style="font-family: Open Sans; color:#4D4D4D;">CS Alda</p>
                            </div>
                        </div>
                        <div class="d-flex flex-fill col-xl-1">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="modal-body px-0 mx-4 mb-4 p-0">
                        <div class="d-flex row">
                            <div class="col-9">
                                <div class="d-flex flex-row mb-3">
                                    <div class="col-lg-4 flex-column">
                                        <div class="titleBody">Data Pelanggan
                                        </div>
                                        <div class="content ps-2 mt-2">
                                            <p class="text-capitalize fw-bold">Stevan Eduardo</p>
                                            <p style="font-weight: 600;">087-8191-12981</p>
                                            <p style="font-weight: 600;">087-8191-12981</p>
                                        </div>
                                    </div>
                                    <div class="flex-column flex-fill ">
                                        <div class="titleBody">Biaya Ongkir
                                        </div>
                                        <div class="content ps-2 mt-2">
                                            <p class="fw-bold ">JNE Reguler</p>
                                            <p>Rp. 18.000,00</p>
                                        </div>
                                    </div>
                                    <div class="flex-column flex-fill">
                                        <div class="titleBody">Data Order
                                        </div>
                                        <div class="excontent mt-2">
                                            <div class="small mb-2">
                                                Bk-01
                                                <span class="mx-3">x1</span>
                                                <span class="fw-bold me-3">Rp. 134.000,00</span>
                                                <p>M</p>
                                            </div>
                                            <div style="width: 100%; height: 100%; border: 1px rgba(129, 130, 134, 0.40) solid"></div>
                                            <div class="small mt-2">
                                                Bk-01
                                                <span class="mx-3">x1</span>
                                                <span class="fw-bold">Rp. 134.000,00</span>
                                                <p>L</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-row mb-3">
                                    <div class="col-lg-4 flex-column">
                                        <div class="titleBody">Detail Alamat
                                        </div>
                                        <div class="content ps-2 mt-2 ">
                                            <p class="alamat">Perumahan Asri Indah No.14  RT 03/ RW 04</p>
                                            <div class="alamat-detail">
                                                <p>Sidomukti , Kab. Semarang</p>
                                                <p>Jawa Tengah</p>
                                                <p>70122</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-column">
                                        <div class="titleBody">Biaya Lainnya
                                        </div>
                                        <div class="content ps-2 mt-2">
                                            <p class="fw-bold ">Biaya packing</p>
                                            <p>Rp. 18.000,00</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="flex-column col-3" >
                                <div class="titleBody">Keterangan</div>
                                <div class="Keterangan p-0 mt-2" id="keterangan">DEADLINE 19 FEBRUARI 2023

# JAS PREMIUM (S) PI

BAHAN CASSILERO ABU NO. 605
>  MODEL BK-01
>  BELAHAN Depan 1
>  BELAHAN BELAKANG 3

# JAS PREMIUM (S) PI

BAHAN CASSILERO ABU NO. 605
>  MODEL BK-01
>  BELAHAN Depan 1
>  BELAHAN BELAKANG 3
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="flex-grow-1 overflow-hidden" style="color:#006AB7;" id="dot">......................................</span>
                                    <span class="expand" id="selengkapnya" onclick="expandKeterangan()">   Selengkapnya</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="modal-footer d-flex row  justify-content-start gap-2 border-top-0 m-4 p-0">
                        <div class="d-flex justify-content-between m-0 align-items-center p-0">
                            <p class="fw-bolder" style="font-size: 18px; ">REQUEST</p>
                            <p style="font-family: montserrat">25 November 2021 (14:20:39)</p>
                        </div>
                        <div class="ps-3 m-0" id="request-edit">1. Asal Orderan = Facebook
2. Nama Pelanggan = Stephany
3. Alamat = 01/01, Perumahan Asri Indah, 14, Desa/Kelurahan
                        </div>
                        <div class="d-flex gap-3 justify-content-end p-0 m-0">
                            <button type="button" class="btn btn-red border-0  py-2 px-5" style=" font-size:18px; " data-bs-dismiss="modal" onclick="handleDenied()">Ditolak</button>
                            <a href="/superAdmin/editRequest" class="btn btn-blue border-0  py-2 px-5" style=" font-size:18px;" onclick="handleAccept()">Diterima</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection


@section('js')
<script src="{{ asset('assets/js/request.js') }}"></script>
@endsection


