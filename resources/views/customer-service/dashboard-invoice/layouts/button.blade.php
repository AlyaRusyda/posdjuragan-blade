<div class="wadah wadah-nav   d-flex justify-content-center flex-column  ">
    <div class="d-flex justify-content-between atas " style="">
        <div class="kiri "></div>
        <div class="pojok-kanan  d-flex flex-row justify-content-around ">
            <select class="form-select mr-3 fzt7 select-tablet" aria-label="Default select example" style="width: 200px; border:1px solid black">
                <option class="fzt8" selected style="text-decoration: none;">Pilih Juragan</option>
                <option class="fzt8" value="Korean Hunter">Korean Hunter</option>
                <option class="fzt8" value="Limited Shopping">Limited Shopping</option>
            </select>
            <div class="kanan flex-row d-flex justify-content-around align-items-center " style="box-sizing: border-box;">
                <a id="cari-orderan" style="border:1px solid black; width:280px; margin-left:30px; text-decoration:none; "
                    class="form-control rounded-5 fzt8" type="search" aria-label="Search" data-bs-toggle="modal"
                    data-bs-target="#exampleModal3">Cari Orderan</a><i style="margin-left:10px; margin-right:50px;" class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
    </div>
    <div id="button-orderan" class=" d-flex row justify-content-center bawah w-100">
        <a id="btn-semua-orderan" href="{{ route('semua-orderanCS') }}"
            class="btn tablet-menu fzt8 rounded-4 me-3 text-center btn-orderan py-2 col-lg-2  {{ request()->routeIs('semua-orderan') ? ' active' : '' }}"
            style="width: 220px; margin-left:50px; height:45px; font-size:18px;">Semua Orderan<span
                class="badge text-bg-danger ms-3 rounded-circle px-2 py-1 badge-qty">{{ $status['jumlah_id'] }}</span></a>
        <a id="btn-belum-proses" href="{{ route('belum-proses-orderanCS') }}"
            class="btn tablet-menu  fzt8 rounded-4 ms-3 me-4 text-center btn-orderan py-2 col-lg-2  {{ request()->routeIs('belum-proses-orderan') ? ' active' : '' }}"
            style="width: 195px; height:45px; font-size:18px">Belum proses<span
                class="badge text-bg-danger ms-3 rounded-circle px-2 py-1 badge-qty">{{ $status['belumProses'] }}</span></a>
        <a id="btn-cek-pembayaran" href="{{ route('menunggu-dicek-orderanCS') }}"
            class="btn  tablet-menu fzt8 rounded-3 ms-4 me-3 text-center btn-orderan py-2 col-lg-2  {{ request()->routeIs('menunggu-dicek-orderan') ? ' active' : '' }}"
            style="width: 230px; height:45px; font-size:18px">Cek Pembayaran<span
                class="badge text-bg-danger ms-3 rounded-circle px-2 py-1 badge-qty">{{ $status['menungguDicek'] }}</span></a>
        <a id="btn-dalam-proses" href="{{ route('dalam-proses-orderanCS') }}"
            class="btn  tablet-menu fzt8  rounded-3 ms-4 me-3 text-center btn-orderan py-2 col-lg-2 {{ request()->routeIs('dalam-proses-orderan') ? ' active' : '' }}"
            style="width: 200px; height:45px; font-size:18px">Dalam Proses<span
                class="badge text-bg-danger ms-3 rounded-circle px-2 py-1 badge-qty">{{ $status['dalamProses'] }}</span></a>
        <a id="btn-orderan-selesai" href="{{ route('orderan-selesaiCS') }}"
            class="btn  tablet-menu fzt8 rounded-3 ms-4 text-center btn-orderan py-2 col-lg-2  {{ request()->routeIs('orderan-selesai') ? ' active' : '' }}"
            style="width: 220px; height:45px; font-size:18px">Orderan Selesai<span
                class="badge text-bg-danger ms-3 rounded-circle px-2 py-1 badge-qty">{{ $status['orderanSelesai'] }}</span></a>
    </div>
</div>
