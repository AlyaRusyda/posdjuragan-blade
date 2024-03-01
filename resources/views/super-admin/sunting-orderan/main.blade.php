@extends('layouts.mainSA')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/request.css') }}">
@endsection

@section('konten')
    <div class="container-fluid p-4">
        {{-- body req edit --}}
        <div class="body-reqEdit flex-column p-4 " style=" border: 1.5px solid black; border-radius: 10px;">

            {{-- info req --}}
            <div class="d-flex flex-row justify-content-between mb-4 gap-5" id="form-juragan">
                <div class="col">
                    <label for="opsi-juragan" class="label-order mb-0">Juragan</label>
                    <select class="form-select form-select-lg shadow" id="opsi-juragan">
                        <option selected>Pilih Juragan</option>
                        <option value="Korean Hunter">Korean Hunter</option>
                        <option value="Limited Shopping">Limited Shopping</option>
                    </select>
                </div>
                <div class="col">
                    <label for="opsi-orderan" class="label-order mb-0">Asal Orderan </label>
                    <select class="form-select form-select-lg shadow" id="opsi-orderan">
                        <option selected>Pilih asal</option>
                        <option value="1">Blibli</option>
                        <option value="2">Bukalapak</option>
                        <option value="3">Facebook</option>
                        <option value="4">Instagram</option>
                        <option value="5">Lazada</option>
                        <option value="6">Offline Store/COD</option>
                        <option value="7">OLX</option>
                        <option value="8">Shopee</option>
                        <option value="9">Tokopedia</option>
                        <option value="10">Web/App lain</option>
                        <option value="11">WhatsApp</option>
                        <option value="12">Zalora</option>
                      </select>
                </div>
                <div class="col">
                    <label for="opsi-cs" class="label-order mb-0">Dilayani Oleh</label>
                    <select class="form-select form-select-lg shadow" id="opsi-cs">
                        <option selected>Pilih CS</option>
                        <option value="1">CS ALda</option>
                        <option value="2">CS Alfa</option>
                        <option value="3">CS Beta</option>
                      </select>
                </div>
                <div class="col">
                    <label for="tanggal-order" class="label-order mb-0">Tanggal Order </label>
                    <input type="date" class="form-control form-control-lg input-custom shadow " id="tanggal-order">
                </div>
            </div>

            {{-- pelanggan --}}
            <div class="d-flex col-lg-6 flex-column mb-4">
                <label for="pelanggan" class="label-order mb-0" >Pelanggan</label>
                <div class="input-group rounded bg-white shadow rounded" id="data-pelanggan">
                    <input type="text" class="form-control border-0 rounded m-1 text-capitalize text-muted" placeholder="Cari Pelanggan" style="font-family: montserrat;" id="pelanggan">
                    <div class="d-flex align-items-center gap-1 mx-1">
                        <button class="btn btn-purple px-5 py-1 rounded" data-bs-toggle="modal" data-bs-target="#modalSearch" type="button">Cari</button>
                    </div>
                </div>
            </div>

            {{-- keterangan --}}
            <div  class="d-flex col-lg-8 flex-column mb-4" id="note-juragan">
                <label for="note" class="label-order">Note / Keterangan</label>
                <textarea class="form-control shadow rounded" name="form-keterangan" id="note" rows="10" style="resize:none; white-space:pre-line;" >
                </textarea>
            </div>

            {{-- tab order --}}
            <div class="shadow tab-order mb-4">
                <div class="border-0 d-flex align-items-center gap-1 ">
                    <div class="bg-white border-0 px-4 py-2 rounded-top label-order">Order</div>
                    <button class="btn p-0 border-0 rounded btn-add" type="button" data-bs-toggle="modal" data-bs-target="#addOrder">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path d="M20.8183 16.904H16.6754V21.0468C16.6754 21.2666 16.5882 21.4773 16.4328 21.6327C16.2774 21.7881 16.0666 21.8754 15.8469 21.8754C15.6271 21.8754 15.4164 21.7881 15.261 21.6327C15.1056 21.4773 15.0183 21.2666 15.0183 21.0468V16.904H10.8754C10.6557 16.904 10.4449 16.8167 10.2896 16.6613C10.1342 16.5059 10.0469 16.2951 10.0469 16.0754C10.0469 15.8556 10.1342 15.6449 10.2896 15.4895C10.4449 15.3341 10.6557 15.2468 10.8754 15.2468H15.0183V11.104C15.0183 10.8842 15.1056 10.6735 15.261 10.5181C15.4164 10.3627 15.6271 10.2754 15.8469 10.2754C16.0666 10.2754 16.2774 10.3627 16.4328 10.5181C16.5882 10.6735 16.6754 10.8842 16.6754 11.104V15.2468H20.8183C21.0381 15.2468 21.2488 15.3341 21.4042 15.4895C21.5596 15.6449 21.6469 15.8556 21.6469 16.0754C21.6469 16.2951 21.5596 16.5059 21.4042 16.6613C21.2488 16.8167 21.0381 16.904 20.8183 16.904Z" fill="#626262"/>
                        </svg>
                    </button>
                </div>
                <div class="bg-white">
                    <div class="card px-3 border-0 mb-3">
                        <table class="table table-borderless mb-0">
                            <thead class="text-center small border border-0 border-bottom ">
                                <tr>
                                    <td class="opsi col-lg-1"></td>
                                    <th class="col py-3">Produk</th>
                                    <th class="col py-3">Harga</th>
                                    <th class="col py-3">Qty</th>
                                    <th class="col py-3">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody id="infoOrder">
                                <tr class="text-center small border border-0  border-bottom" id="dataOrder1">
                                    <td class="col-lg-1">
                                        {{-- btn edit --}}
                                        <button class="btn px-1 py-0" data-bs-toggle="modal" data-bs-target="#editOrder">
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.92648 14.3165H1.2395C1.07652 14.3165 0.920223 14.2517 0.804982 14.1365C0.689742 14.0212 0.625 13.8649 0.625 13.702V10.2695C0.625 10.1888 0.640894 10.1089 0.671776 10.0343C0.702657 9.95978 0.747921 9.89204 0.804983 9.83498L10.0224 0.617482C10.1377 0.502241 10.294 0.4375 10.457 0.4375C10.6199 0.4375 10.7762 0.502241 10.8915 0.617482L14.3239 4.04995C14.4392 4.16519 14.5039 4.32149 14.5039 4.48446C14.5039 4.64744 14.4392 4.80374 14.3239 4.91898L4.92648 14.3165Z" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8 2.64062L12.3015 6.94212" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>

                                        {{-- btn delete --}}
                                        <button class="btn btn-dlt px-1 py-0">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.5027 3.98492H12.0602V3.57862C12.0602 3.00699 11.8805 2.59262 11.5171 2.33974C11.2604 2.17399 10.942 2.08984 10.5719 2.08984H7.83445C7.83232 2.08984 7.83063 2.09112 7.8285 2.09112C7.82638 2.09112 7.82468 2.08984 7.82255 2.08984H7.43622C6.47615 2.08984 5.94745 2.61854 5.94745 3.57862V3.98492H3.50625C3.42171 3.98492 3.34064 4.0185 3.28086 4.07828C3.22108 4.13806 3.1875 4.21913 3.1875 4.30367C3.1875 4.38821 3.22108 4.46928 3.28086 4.52906C3.34064 4.58884 3.42171 4.62242 3.50625 4.62242H3.78122L4.60827 15.581C4.60827 16.2742 5.0099 16.6716 5.71072 16.6716H12.2816C12.9663 16.6716 13.3684 16.2763 13.3832 15.6048L14.2107 4.62242H14.5023C14.5441 4.62245 14.5856 4.61423 14.6243 4.59824C14.663 4.58224 14.6981 4.55879 14.7277 4.52921C14.7573 4.49963 14.7808 4.46451 14.7969 4.42585C14.8129 4.38718 14.8212 4.34574 14.8212 4.30388C14.8213 4.26202 14.813 4.22057 14.7971 4.18188C14.7811 4.1432 14.7576 4.10805 14.728 4.07843C14.6984 4.04881 14.6633 4.02531 14.6247 4.00926C14.586 3.99322 14.5446 3.98495 14.5027 3.98492ZM13.5244 5.24972H4.46802L4.42085 4.62242H13.5715L13.5244 5.24972ZM6.58537 3.57862C6.58537 2.97384 6.83188 2.72734 7.43665 2.72734H10.5723C10.8179 2.72734 11.0198 2.77707 11.1626 2.86887C11.3381 2.99084 11.4232 3.22289 11.4232 3.57862V3.98492H6.58537V3.57862ZM12.747 15.5738C12.7389 15.9181 12.6216 16.0341 12.2816 16.0341H5.71072C5.36307 16.0341 5.24577 15.9198 5.24493 15.5568L4.51605 5.88679H13.4759L12.747 15.5738Z" fill="#333333"/>
                                                <path d="M7.89934 6.39196C7.85753 6.39344 7.81642 6.40315 7.77836 6.42053C7.74031 6.43791 7.70605 6.46262 7.67755 6.49325C7.64905 6.52388 7.62687 6.55983 7.61227 6.59904C7.59768 6.63825 7.59096 6.67995 7.59249 6.72176L7.89169 14.9472C7.89466 15.0296 7.92943 15.1076 7.98871 15.1649C8.04798 15.2222 8.12715 15.2543 8.20959 15.2545L8.22149 15.2541C8.2633 15.2526 8.30441 15.2429 8.34247 15.2255C8.38053 15.2081 8.41478 15.1834 8.44328 15.1528C8.47178 15.1221 8.49396 15.0862 8.50856 15.047C8.52315 15.0078 8.52988 14.9661 8.52834 14.9243L8.22957 6.69838C8.22319 6.52243 8.07954 6.37666 7.89934 6.39196ZM5.92352 6.39238C5.83921 6.39827 5.76069 6.43739 5.70523 6.50114C5.64976 6.5649 5.62188 6.64808 5.62772 6.73238L6.19254 14.9578C6.19803 15.0383 6.23386 15.1137 6.29279 15.1687C6.35173 15.2238 6.42936 15.2545 6.51002 15.2545L6.53254 15.2536C6.61684 15.2478 6.69536 15.2086 6.75083 15.1449C6.8063 15.0811 6.83418 14.9979 6.82834 14.9136L6.26352 6.68818C6.25698 6.60413 6.21768 6.52601 6.15407 6.47068C6.09047 6.41534 6.00766 6.38722 5.92352 6.39238ZM10.0817 6.39196C9.90364 6.37496 9.75787 6.52286 9.75192 6.69881L9.45229 14.9243C9.4507 14.9661 9.45738 15.0078 9.47196 15.047C9.48653 15.0863 9.50871 15.1222 9.53722 15.1529C9.56573 15.1835 9.60001 15.2082 9.63809 15.2256C9.67618 15.243 9.71731 15.2526 9.75914 15.2541L9.77104 15.2545C9.85348 15.2543 9.93265 15.2222 9.99192 15.1649C10.0512 15.1076 10.086 15.0296 10.0889 14.9472L10.3886 6.72176C10.3902 6.67994 10.3835 6.63821 10.3689 6.59898C10.3543 6.55974 10.3321 6.52377 10.3036 6.49313C10.2751 6.46249 10.2408 6.43778 10.2028 6.42042C10.1647 6.40305 10.1235 6.39338 10.0817 6.39196ZM12.0575 6.39238C11.9734 6.38734 11.8907 6.41549 11.8271 6.47081C11.7635 6.52612 11.7242 6.60417 11.7175 6.68818L11.1527 14.9136C11.1469 14.9979 11.1748 15.0811 11.2302 15.1449C11.2857 15.2086 11.3642 15.2478 11.4485 15.2536L11.471 15.2545C11.5517 15.2544 11.6292 15.2237 11.6882 15.1686C11.7471 15.1136 11.7829 15.0383 11.7885 14.9578L12.3533 6.73238C12.3592 6.64808 12.3313 6.5649 12.2758 6.50114C12.2204 6.43739 12.1418 6.39827 12.0575 6.39238Z" fill="#333333"/>
                                            </svg>
                                        </button>
                                    </td>
                                    <td class="col py-3">
                                        celana(34)
                                    </td>
                                    <td class="col py-3">Rp 300.000</td>
                                    <td class="col py-3">3</td>
                                    <td class="col py-3">Rp 900.000</td>
                                </tr>
                                <tr class="text-center small border border-0  border-bottom" id="dataOrder2">
                                    <td class="col-lg-1">
                                        {{-- btn edit --}}
                                        <button class="btn px-1 py-0" data-bs-toggle="modal" data-bs-target="#editOrder">
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.92648 14.3165H1.2395C1.07652 14.3165 0.920223 14.2517 0.804982 14.1365C0.689742 14.0212 0.625 13.8649 0.625 13.702V10.2695C0.625 10.1888 0.640894 10.1089 0.671776 10.0343C0.702657 9.95978 0.747921 9.89204 0.804983 9.83498L10.0224 0.617482C10.1377 0.502241 10.294 0.4375 10.457 0.4375C10.6199 0.4375 10.7762 0.502241 10.8915 0.617482L14.3239 4.04995C14.4392 4.16519 14.5039 4.32149 14.5039 4.48446C14.5039 4.64744 14.4392 4.80374 14.3239 4.91898L4.92648 14.3165Z" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8 2.64062L12.3015 6.94212" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>

                                        {{-- btn delete --}}
                                        <button class="btn px-1 py-0 btn-dlt" >
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.5027 3.98492H12.0602V3.57862C12.0602 3.00699 11.8805 2.59262 11.5171 2.33974C11.2604 2.17399 10.942 2.08984 10.5719 2.08984H7.83445C7.83232 2.08984 7.83063 2.09112 7.8285 2.09112C7.82638 2.09112 7.82468 2.08984 7.82255 2.08984H7.43622C6.47615 2.08984 5.94745 2.61854 5.94745 3.57862V3.98492H3.50625C3.42171 3.98492 3.34064 4.0185 3.28086 4.07828C3.22108 4.13806 3.1875 4.21913 3.1875 4.30367C3.1875 4.38821 3.22108 4.46928 3.28086 4.52906C3.34064 4.58884 3.42171 4.62242 3.50625 4.62242H3.78122L4.60827 15.581C4.60827 16.2742 5.0099 16.6716 5.71072 16.6716H12.2816C12.9663 16.6716 13.3684 16.2763 13.3832 15.6048L14.2107 4.62242H14.5023C14.5441 4.62245 14.5856 4.61423 14.6243 4.59824C14.663 4.58224 14.6981 4.55879 14.7277 4.52921C14.7573 4.49963 14.7808 4.46451 14.7969 4.42585C14.8129 4.38718 14.8212 4.34574 14.8212 4.30388C14.8213 4.26202 14.813 4.22057 14.7971 4.18188C14.7811 4.1432 14.7576 4.10805 14.728 4.07843C14.6984 4.04881 14.6633 4.02531 14.6247 4.00926C14.586 3.99322 14.5446 3.98495 14.5027 3.98492ZM13.5244 5.24972H4.46802L4.42085 4.62242H13.5715L13.5244 5.24972ZM6.58537 3.57862C6.58537 2.97384 6.83188 2.72734 7.43665 2.72734H10.5723C10.8179 2.72734 11.0198 2.77707 11.1626 2.86887C11.3381 2.99084 11.4232 3.22289 11.4232 3.57862V3.98492H6.58537V3.57862ZM12.747 15.5738C12.7389 15.9181 12.6216 16.0341 12.2816 16.0341H5.71072C5.36307 16.0341 5.24577 15.9198 5.24493 15.5568L4.51605 5.88679H13.4759L12.747 15.5738Z" fill="#333333"/>
                                                <path d="M7.89934 6.39196C7.85753 6.39344 7.81642 6.40315 7.77836 6.42053C7.74031 6.43791 7.70605 6.46262 7.67755 6.49325C7.64905 6.52388 7.62687 6.55983 7.61227 6.59904C7.59768 6.63825 7.59096 6.67995 7.59249 6.72176L7.89169 14.9472C7.89466 15.0296 7.92943 15.1076 7.98871 15.1649C8.04798 15.2222 8.12715 15.2543 8.20959 15.2545L8.22149 15.2541C8.2633 15.2526 8.30441 15.2429 8.34247 15.2255C8.38053 15.2081 8.41478 15.1834 8.44328 15.1528C8.47178 15.1221 8.49396 15.0862 8.50856 15.047C8.52315 15.0078 8.52988 14.9661 8.52834 14.9243L8.22957 6.69838C8.22319 6.52243 8.07954 6.37666 7.89934 6.39196ZM5.92352 6.39238C5.83921 6.39827 5.76069 6.43739 5.70523 6.50114C5.64976 6.5649 5.62188 6.64808 5.62772 6.73238L6.19254 14.9578C6.19803 15.0383 6.23386 15.1137 6.29279 15.1687C6.35173 15.2238 6.42936 15.2545 6.51002 15.2545L6.53254 15.2536C6.61684 15.2478 6.69536 15.2086 6.75083 15.1449C6.8063 15.0811 6.83418 14.9979 6.82834 14.9136L6.26352 6.68818C6.25698 6.60413 6.21768 6.52601 6.15407 6.47068C6.09047 6.41534 6.00766 6.38722 5.92352 6.39238ZM10.0817 6.39196C9.90364 6.37496 9.75787 6.52286 9.75192 6.69881L9.45229 14.9243C9.4507 14.9661 9.45738 15.0078 9.47196 15.047C9.48653 15.0863 9.50871 15.1222 9.53722 15.1529C9.56573 15.1835 9.60001 15.2082 9.63809 15.2256C9.67618 15.243 9.71731 15.2526 9.75914 15.2541L9.77104 15.2545C9.85348 15.2543 9.93265 15.2222 9.99192 15.1649C10.0512 15.1076 10.086 15.0296 10.0889 14.9472L10.3886 6.72176C10.3902 6.67994 10.3835 6.63821 10.3689 6.59898C10.3543 6.55974 10.3321 6.52377 10.3036 6.49313C10.2751 6.46249 10.2408 6.43778 10.2028 6.42042C10.1647 6.40305 10.1235 6.39338 10.0817 6.39196ZM12.0575 6.39238C11.9734 6.38734 11.8907 6.41549 11.8271 6.47081C11.7635 6.52612 11.7242 6.60417 11.7175 6.68818L11.1527 14.9136C11.1469 14.9979 11.1748 15.0811 11.2302 15.1449C11.2857 15.2086 11.3642 15.2478 11.4485 15.2536L11.471 15.2545C11.5517 15.2544 11.6292 15.2237 11.6882 15.1686C11.7471 15.1136 11.7829 15.0383 11.7885 14.9578L12.3533 6.73238C12.3592 6.64808 12.3313 6.5649 12.2758 6.50114C12.2204 6.43739 12.1418 6.39827 12.0575 6.39238Z" fill="#333333"/>
                                            </svg>
                                        </button>
                                    </td>
                                    <td class="col py-3">
                                        celana(34)
                                    </td>
                                    <td class="col py-3">Rp 300.000</td>
                                    <td class="col py-3">3</td>
                                    <td class="col py-3">Rp 900.000</td>
                                </tr>
                                <tr class="text-center  border border-0  border-bottom" id="totalongkir">
                                    <td class="col py-3">
                                        <button class="btn px-1 py-0" data-bs-toggle="modal" data-bs-target="#editOngkir">
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.92648 14.3165H1.2395C1.07652 14.3165 0.920223 14.2517 0.804982 14.1365C0.689742 14.0212 0.625 13.8649 0.625 13.702V10.2695C0.625 10.1888 0.640894 10.1089 0.671776 10.0343C0.702657 9.95978 0.747921 9.89204 0.804983 9.83498L10.0224 0.617482C10.1377 0.502241 10.294 0.4375 10.457 0.4375C10.6199 0.4375 10.7762 0.502241 10.8915 0.617482L14.3239 4.04995C14.4392 4.16519 14.5039 4.32149 14.5039 4.48446C14.5039 4.64744 14.4392 4.80374 14.3239 4.91898L4.92648 14.3165Z" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8 2.64062L12.3015 6.94212" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>

                                        {{-- btn delete --}}
                                        <button class="btn btn-dlt px-1 py-0">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.5027 3.98492H12.0602V3.57862C12.0602 3.00699 11.8805 2.59262 11.5171 2.33974C11.2604 2.17399 10.942 2.08984 10.5719 2.08984H7.83445C7.83232 2.08984 7.83063 2.09112 7.8285 2.09112C7.82638 2.09112 7.82468 2.08984 7.82255 2.08984H7.43622C6.47615 2.08984 5.94745 2.61854 5.94745 3.57862V3.98492H3.50625C3.42171 3.98492 3.34064 4.0185 3.28086 4.07828C3.22108 4.13806 3.1875 4.21913 3.1875 4.30367C3.1875 4.38821 3.22108 4.46928 3.28086 4.52906C3.34064 4.58884 3.42171 4.62242 3.50625 4.62242H3.78122L4.60827 15.581C4.60827 16.2742 5.0099 16.6716 5.71072 16.6716H12.2816C12.9663 16.6716 13.3684 16.2763 13.3832 15.6048L14.2107 4.62242H14.5023C14.5441 4.62245 14.5856 4.61423 14.6243 4.59824C14.663 4.58224 14.6981 4.55879 14.7277 4.52921C14.7573 4.49963 14.7808 4.46451 14.7969 4.42585C14.8129 4.38718 14.8212 4.34574 14.8212 4.30388C14.8213 4.26202 14.813 4.22057 14.7971 4.18188C14.7811 4.1432 14.7576 4.10805 14.728 4.07843C14.6984 4.04881 14.6633 4.02531 14.6247 4.00926C14.586 3.99322 14.5446 3.98495 14.5027 3.98492ZM13.5244 5.24972H4.46802L4.42085 4.62242H13.5715L13.5244 5.24972ZM6.58537 3.57862C6.58537 2.97384 6.83188 2.72734 7.43665 2.72734H10.5723C10.8179 2.72734 11.0198 2.77707 11.1626 2.86887C11.3381 2.99084 11.4232 3.22289 11.4232 3.57862V3.98492H6.58537V3.57862ZM12.747 15.5738C12.7389 15.9181 12.6216 16.0341 12.2816 16.0341H5.71072C5.36307 16.0341 5.24577 15.9198 5.24493 15.5568L4.51605 5.88679H13.4759L12.747 15.5738Z" fill="#333333"/>
                                                <path d="M7.89934 6.39196C7.85753 6.39344 7.81642 6.40315 7.77836 6.42053C7.74031 6.43791 7.70605 6.46262 7.67755 6.49325C7.64905 6.52388 7.62687 6.55983 7.61227 6.59904C7.59768 6.63825 7.59096 6.67995 7.59249 6.72176L7.89169 14.9472C7.89466 15.0296 7.92943 15.1076 7.98871 15.1649C8.04798 15.2222 8.12715 15.2543 8.20959 15.2545L8.22149 15.2541C8.2633 15.2526 8.30441 15.2429 8.34247 15.2255C8.38053 15.2081 8.41478 15.1834 8.44328 15.1528C8.47178 15.1221 8.49396 15.0862 8.50856 15.047C8.52315 15.0078 8.52988 14.9661 8.52834 14.9243L8.22957 6.69838C8.22319 6.52243 8.07954 6.37666 7.89934 6.39196ZM5.92352 6.39238C5.83921 6.39827 5.76069 6.43739 5.70523 6.50114C5.64976 6.5649 5.62188 6.64808 5.62772 6.73238L6.19254 14.9578C6.19803 15.0383 6.23386 15.1137 6.29279 15.1687C6.35173 15.2238 6.42936 15.2545 6.51002 15.2545L6.53254 15.2536C6.61684 15.2478 6.69536 15.2086 6.75083 15.1449C6.8063 15.0811 6.83418 14.9979 6.82834 14.9136L6.26352 6.68818C6.25698 6.60413 6.21768 6.52601 6.15407 6.47068C6.09047 6.41534 6.00766 6.38722 5.92352 6.39238ZM10.0817 6.39196C9.90364 6.37496 9.75787 6.52286 9.75192 6.69881L9.45229 14.9243C9.4507 14.9661 9.45738 15.0078 9.47196 15.047C9.48653 15.0863 9.50871 15.1222 9.53722 15.1529C9.56573 15.1835 9.60001 15.2082 9.63809 15.2256C9.67618 15.243 9.71731 15.2526 9.75914 15.2541L9.77104 15.2545C9.85348 15.2543 9.93265 15.2222 9.99192 15.1649C10.0512 15.1076 10.086 15.0296 10.0889 14.9472L10.3886 6.72176C10.3902 6.67994 10.3835 6.63821 10.3689 6.59898C10.3543 6.55974 10.3321 6.52377 10.3036 6.49313C10.2751 6.46249 10.2408 6.43778 10.2028 6.42042C10.1647 6.40305 10.1235 6.39338 10.0817 6.39196ZM12.0575 6.39238C11.9734 6.38734 11.8907 6.41549 11.8271 6.47081C11.7635 6.52612 11.7242 6.60417 11.7175 6.68818L11.1527 14.9136C11.1469 14.9979 11.1748 15.0811 11.2302 15.1449C11.2857 15.2086 11.3642 15.2478 11.4485 15.2536L11.471 15.2545C11.5517 15.2544 11.6292 15.2237 11.6882 15.1686C11.7471 15.1136 11.7829 15.0383 11.7885 14.9578L12.3533 6.73238C12.3592 6.64808 12.3313 6.5649 12.2758 6.50114C12.2204 6.43739 12.1418 6.39827 12.0575 6.39238Z" fill="#333333"/>
                                            </svg>
                                        </button>
                                    </td>
                                    <td colspan="2" class="col py-3"></td>
                                    <td class="col py-3">JNT</td>
                                    <td class="col py-3">Rp 900</td>
                                </tr>
                                <tr class="text-center small border border-0  border-bottom" id="totaladdcost">
                                    <td class="col py-3">
                                        <button class="btn px-1 py-0" data-bs-toggle="modal" data-bs-target="#editbiayalain">
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.92648 14.3165H1.2395C1.07652 14.3165 0.920223 14.2517 0.804982 14.1365C0.689742 14.0212 0.625 13.8649 0.625 13.702V10.2695C0.625 10.1888 0.640894 10.1089 0.671776 10.0343C0.702657 9.95978 0.747921 9.89204 0.804983 9.83498L10.0224 0.617482C10.1377 0.502241 10.294 0.4375 10.457 0.4375C10.6199 0.4375 10.7762 0.502241 10.8915 0.617482L14.3239 4.04995C14.4392 4.16519 14.5039 4.32149 14.5039 4.48446C14.5039 4.64744 14.4392 4.80374 14.3239 4.91898L4.92648 14.3165Z" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8 2.64062L12.3015 6.94212" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>

                                        {{-- btn delete --}}
                                        <button class="btn btn-dlt px-1 py-0">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.5027 3.98492H12.0602V3.57862C12.0602 3.00699 11.8805 2.59262 11.5171 2.33974C11.2604 2.17399 10.942 2.08984 10.5719 2.08984H7.83445C7.83232 2.08984 7.83063 2.09112 7.8285 2.09112C7.82638 2.09112 7.82468 2.08984 7.82255 2.08984H7.43622C6.47615 2.08984 5.94745 2.61854 5.94745 3.57862V3.98492H3.50625C3.42171 3.98492 3.34064 4.0185 3.28086 4.07828C3.22108 4.13806 3.1875 4.21913 3.1875 4.30367C3.1875 4.38821 3.22108 4.46928 3.28086 4.52906C3.34064 4.58884 3.42171 4.62242 3.50625 4.62242H3.78122L4.60827 15.581C4.60827 16.2742 5.0099 16.6716 5.71072 16.6716H12.2816C12.9663 16.6716 13.3684 16.2763 13.3832 15.6048L14.2107 4.62242H14.5023C14.5441 4.62245 14.5856 4.61423 14.6243 4.59824C14.663 4.58224 14.6981 4.55879 14.7277 4.52921C14.7573 4.49963 14.7808 4.46451 14.7969 4.42585C14.8129 4.38718 14.8212 4.34574 14.8212 4.30388C14.8213 4.26202 14.813 4.22057 14.7971 4.18188C14.7811 4.1432 14.7576 4.10805 14.728 4.07843C14.6984 4.04881 14.6633 4.02531 14.6247 4.00926C14.586 3.99322 14.5446 3.98495 14.5027 3.98492ZM13.5244 5.24972H4.46802L4.42085 4.62242H13.5715L13.5244 5.24972ZM6.58537 3.57862C6.58537 2.97384 6.83188 2.72734 7.43665 2.72734H10.5723C10.8179 2.72734 11.0198 2.77707 11.1626 2.86887C11.3381 2.99084 11.4232 3.22289 11.4232 3.57862V3.98492H6.58537V3.57862ZM12.747 15.5738C12.7389 15.9181 12.6216 16.0341 12.2816 16.0341H5.71072C5.36307 16.0341 5.24577 15.9198 5.24493 15.5568L4.51605 5.88679H13.4759L12.747 15.5738Z" fill="#333333"/>
                                                <path d="M7.89934 6.39196C7.85753 6.39344 7.81642 6.40315 7.77836 6.42053C7.74031 6.43791 7.70605 6.46262 7.67755 6.49325C7.64905 6.52388 7.62687 6.55983 7.61227 6.59904C7.59768 6.63825 7.59096 6.67995 7.59249 6.72176L7.89169 14.9472C7.89466 15.0296 7.92943 15.1076 7.98871 15.1649C8.04798 15.2222 8.12715 15.2543 8.20959 15.2545L8.22149 15.2541C8.2633 15.2526 8.30441 15.2429 8.34247 15.2255C8.38053 15.2081 8.41478 15.1834 8.44328 15.1528C8.47178 15.1221 8.49396 15.0862 8.50856 15.047C8.52315 15.0078 8.52988 14.9661 8.52834 14.9243L8.22957 6.69838C8.22319 6.52243 8.07954 6.37666 7.89934 6.39196ZM5.92352 6.39238C5.83921 6.39827 5.76069 6.43739 5.70523 6.50114C5.64976 6.5649 5.62188 6.64808 5.62772 6.73238L6.19254 14.9578C6.19803 15.0383 6.23386 15.1137 6.29279 15.1687C6.35173 15.2238 6.42936 15.2545 6.51002 15.2545L6.53254 15.2536C6.61684 15.2478 6.69536 15.2086 6.75083 15.1449C6.8063 15.0811 6.83418 14.9979 6.82834 14.9136L6.26352 6.68818C6.25698 6.60413 6.21768 6.52601 6.15407 6.47068C6.09047 6.41534 6.00766 6.38722 5.92352 6.39238ZM10.0817 6.39196C9.90364 6.37496 9.75787 6.52286 9.75192 6.69881L9.45229 14.9243C9.4507 14.9661 9.45738 15.0078 9.47196 15.047C9.48653 15.0863 9.50871 15.1222 9.53722 15.1529C9.56573 15.1835 9.60001 15.2082 9.63809 15.2256C9.67618 15.243 9.71731 15.2526 9.75914 15.2541L9.77104 15.2545C9.85348 15.2543 9.93265 15.2222 9.99192 15.1649C10.0512 15.1076 10.086 15.0296 10.0889 14.9472L10.3886 6.72176C10.3902 6.67994 10.3835 6.63821 10.3689 6.59898C10.3543 6.55974 10.3321 6.52377 10.3036 6.49313C10.2751 6.46249 10.2408 6.43778 10.2028 6.42042C10.1647 6.40305 10.1235 6.39338 10.0817 6.39196ZM12.0575 6.39238C11.9734 6.38734 11.8907 6.41549 11.8271 6.47081C11.7635 6.52612 11.7242 6.60417 11.7175 6.68818L11.1527 14.9136C11.1469 14.9979 11.1748 15.0811 11.2302 15.1449C11.2857 15.2086 11.3642 15.2478 11.4485 15.2536L11.471 15.2545C11.5517 15.2544 11.6292 15.2237 11.6882 15.1686C11.7471 15.1136 11.7829 15.0383 11.7885 14.9578L12.3533 6.73238C12.3592 6.64808 12.3313 6.5649 12.2758 6.50114C12.2204 6.43739 12.1418 6.39827 12.0575 6.39238Z" fill="#333333"/>
                                            </svg>
                                        </button>
                                    </td>
                                    <td colspan="2" class="col py-3"></td>
                                    <td class="col py-3">Biaya layanan</td>
                                    <td class="col py-3">Rp 900</td>
                                </tr>
                                <tr class="text-center small border border-0  border-bottom" id="subtotal">
                                    <td colspan="3" class="col py-3"></td>
                                    <td class="col py-3">Subtotal</td>
                                    <td class="col py-3">Rp 900</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="btn-OB">
                        <div class="d-flex gap-3 mx-3" >
                            <button class="btn btn-light px-4 py-2 btn-sm " data-bs-toggle="modal" data-bs-target="#ModalOngkir">Ongkir</button>
                            <button class="btn btn-light btn-sm px-3 py-2" data-bs-toggle="modal" data-bs-target="#Modalbiayalain">Biaya lain</button>
                        </div>
                    </div>
                    <div id="totalhargaOrder">
                        <div class="d-flex flex-row justify-content-between align-items-center p-3 mx-4" >
                            <p class="fw-bold small">TOTAL</p>
                            <h5 class="fw-bold " style="color: #0091ff;">Rp 900.000,00</h5>
                        </div>
                    </div>
                    <div id="dance-chart">
                        <div class="d-flex justify-content-center py-5 mb-3 " >
                            <div id="shopping" style="width: 100px; height: 100px; background: url('/assets/img/shopping.gif') lightgray 50% / cover no-repeat; background-blend-mode: luminosity;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" d-flex gap-3">
                <a href="/superAdmin/semua-orderan" class="btn btn-grey py-2 px-5" >Batal</a>
                <button type="submit" class="btn btn-blue py-2 px-5"  onclick="saveOrder()">Simpan</button>
            </div>
        </div>
    </div>

{{-- daftar modal --}}

    {{-- Modal search pelanggan --}}
    <div class="modal fade" id="modalSearch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" >
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0 ">
                    <h5 class="modal-title ms-auto" >Edit Data Pemesanan</h5>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 py-0">
                    <div class="col-6 ms-auto mb-4" style="box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.15); border-radius: 8px;">
                        <div class="input-group rounded ">
                            <input type="text" class="form-control form-control-lg input-custom" placeholder="Cari Pelanggan" name="search" id="searchInput">
                            <button class="btn border-0  bg-white " id="searchButoon" type="button" data-bs-dismiss="modal" onclick="search()"><span><i class="fa-solid fa-magnifying-glass" style="color: #828282;"></i></span></button>
                        </div>
                    </div>
                    <form action="" id="formDataPelanggan" >
                        <div class="mb-4 ">
                            <label for="id-pelanggan" class="form-label label-order mb-1" >ID Pelanggan</label>
                            <input type="text" class="form-control form-control-lg  input-custom shadow text-black " value="ID12345678" id="id-pelanggan"disabled readonly>
                        </div>
                        <div class="mb-4 ">
                            <label for="nama-pelanggan" class="form-label label-order mb-1">Nama Pelanggan</label>
                            <input type="text" class="form-control form-control-lg  input-custom shadow" id="nama-pelanggan" required>
                            <div class="invalid-feedback">
                                Masukkan nama pelanggan
                            </div>
                        </div>
                        <div class="d-flex row">
                            <div class="col-md-6 mb-2" id="tambah-hp-1">
                                <label for="hp-1" class="form-label label-order mb-1">HP 1</label>
                                <input type="telp"  minlength="10" maxlength="13" class="form-control form-control-lg  input-custom shadow " id="hp-1" oninput="this.value = this.value.replace(/\D/g, '')" required>
                            </div>
                            <div class="col-md-6 mb-4 " id="tambah-hp-2">
                                <label for="hp-2" class="form-label label-order mb-1">HP 2 (Optional) </label>
                                <input type="telp"  minlength="10" maxlength="13" class="form-control form-control-lg  input-custom shadow " id="hp-2" oninput="this.value = this.value.replace(/\D/g, '')">
                            </div>
                        </div>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" role="switch" id="COD" checked>
                            <label class="form-check-label" for="COD">COD</label>
                        </div>

                        <div class="d-none" id="switch-COD">
                            <div class="mb-4 ">
                                <label for="alamat" class="form-label label-order mb-1">Alamat</label>
                                <textarea type="text" class="form-control form-control-lg  input-custom shadow" id="alamat" rows="3" required></textarea>
                                <div class="invalid-feedback">
                                    Masukkan alamat
                                </div>
                            </div>

                            <div class="row d-flex">
                                <div class="col-md-6 mb-4">
                                    <label for="provinsi2" class="form-label label-order mb-1">Provinsi</label>
                                    <select class="form-select form-select-lg  shadow" id="provinsi2" onchange="loadKabupaten()" required>
                                        <option value="">Pilih Provinsi</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan provinsi
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="kabupaten2" class="form-label label-order mb-1">Kab / kota</label>
                                    <select class="form-select form-select-lg  shadow" id="kabupaten2" onchange="loadKecamatan()" required>
                                        <option value="">Pilih Kab/ Kota</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan kota
                                    </div>
                                </div>
                            </div>

                            <div class="row d-flex mb-4">
                                <div class="col-md-6">
                                    <label for="kecamatan2" class="form-label label-order mb-1">Kecamatan</label>
                                    <select class="form-select form-select-lg  shadow" id="kecamatan2" required>
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan kecamatan
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <label for="kodepos2" class="form-label label-order mb-1">Kode Pos </label>
                                    <input type="number" class="form-control form-control-lg  input-custom shadow " maxlength="5" id="kodepos2" required>
                                    <div class="invalid-feedback">
                                        Masukkan kodepos
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center my-3 ">
                            <button type="button" class="btn btn-grey py-2  px-5"  data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue px-5 py-2" data-bs-dismiss="modal" onclick="editPelanggan()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal add pelanggan --}}
    <div class="modal fade" id="modaladdpelanggan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" >
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0 ">
                    <h5 class="modal-title ms-auto" >Tambah Data pelanggan</h5>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 py-0">
                    <form action="" id="formDataPelanggan" >
                        <div class="mb-4 ">
                            <label for="id-pelanggan" class="form-label label-order mb-1" >ID Pelanggan</label>
                            <input type="text" class="form-control form-control-lg  input-custom shadow text-black " value="ID12345678" id="id-pelanggan" disabled  readonly>
                        </div>
                        <div class="mb-4 ">
                            <label for="nama-pelanggan" class="form-label label-order mb-1">Nama Pelanggan</label>
                            <input type="text" class="form-control form-control-lg  input-custom shadow" id="nama-pelanggan" required>
                            <div class="invalid-feedback">
                                Masukkan nama pelanggan
                            </div>
                        </div>

                        <div class="mb-4 ">
                            <label for="email-pelanggan" class="form-label label-order mb-1">Email Pelanggan</label>
                            <input type="email" class="form-control form-control-lg  input-custom shadow" id="email-pelanggan" required>
                            <div class="invalid-feedback">
                                Masukkan email pelanggan
                            </div>
                        </div>
                        <div class="d-flex row">
                            <div class="col-md-6 mb-2" id="tambah-hp-1">
                                <label for="hp-1" class="form-label label-order mb-1">HP 1</label>
                                <input type="telp"  minlength="10" maxlength="13" class="form-control form-control-lg  input-custom shadow " id="hp-1" oninput="this.value = this.value.replace(/\D/g, '')" required>
                            </div>
                            <div class="col-md-6 mb-4 " id="tambah-hp-2">
                                <label for="hp-2" class="form-label label-order mb-1">HP 2 (Optional) </label>
                                <input type="telp"  minlength="10" maxlength="13" class="form-control form-control-lg  input-custom shadow " id="hp-2" oninput="this.value = this.value.replace(/\D/g, '')">
                            </div>
                        </div>
                        <div class="mb-4 ">
                            <label for="alamat" class="form-label label-order mb-1">Alamat</label>
                            <textarea type="text" class="form-control form-control-lg  input-custom shadow " id="alamat" rows="3" required></textarea>
                            <div class="invalid-feedback">
                                Masukkan alamat
                            </div>
                        </div>

                        <div class="row d-flex">
                            <div class="col-md-6 mb-4">
                                <label for="provinsi2" class="form-label label-order mb-1">Provinsi</label>
                                <select class="form-select form-select-lg  shadow" id="provinsi2" onchange="loadKabupaten()" required>
                                    <option value="">Pilih Provinsi</option>
                                </select>
                                <div class="invalid-feedback">
                                    Masukkan provinsi
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="kabupaten2" class="form-label label-order mb-1">Kab / kota</label>
                                <select class="form-select form-select-lg  shadow" id="kabupaten2" onchange="loadKecamatan()" required>
                                    <option value="">Pilih Kab/Kota</option>
                                </select>
                                <div class="invalid-feedback">
                                    Masukkan kota
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex mb-4">
                            <div class="col-md-6">
                                <label for="kecamatan2" class="form-label label-order mb-1">Kecamatan</label>
                                <select class="form-select form-select-lg  shadow" id="kecamatan2" required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                <div class="invalid-feedback">
                                    Masukkan kecamatan
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <label for="kodepos2" class="form-label label-order mb-1">Kode Pos </label>
                                <input type="number" class="form-control form-control-lg  input-custom shadow " maxlength="5" id="kodepos2" required>
                                <div class="invalid-feedback">
                                    Masukkan kodepos
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center my-3 ">
                            <button type="button" class="btn btn-grey py-2  px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue px-5 py-2" data-bs-dismiss="modal" onclick="addPelanggan()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal not found -->
    <div class="modal fade" id="modalNotFound" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content ">
                <div class="modal-body m-2">
                    <div class="d-flex  justify-content-end ">
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class=" my-2 d-flex flex-column justify-content-center ">
                        <img src="{{ asset('assets/img/not-found.png') }}" alt="" width="120px" class="mx-auto">
                        <p class="text-center fw-semibold py-3">Data tidak ditemukan</p>
                    </div>
                    <div class="d-flex justify-content-center my-2 ">
                        <button class="btn btn-purple px-3" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modaladdpelanggan">Tambah data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Ongkir --}}
    <div class="modal fade" id="ModalOngkir" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0">
                    <h5 class="modal-title ms-auto" >Biaya Ongkir</h5>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 py-0">
                    <form action="" id="formongkir" >
                        <div class="mb-4 ">
                            <label for="ongkir-nominal" class="form-label h6 mb-1">Nominal</label>
                            <input type="number" class="form-control form-control-lg input-custom shadow" id="ongkir-nominal" required>
                        </div>
                        <div class="mb-5 ">
                            <label for="jasa-ongkir" class="form-label h6 mb-1">Label</label>
                            <input type="text" class="form-control form-control-lg input-custom shadow" id="jasa-ongkir" placeholder="Jasa Exspedisi" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <button type="button" class="btn btn-grey py-2  px-5"  data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue px-5 py-2" data-bs-dismiss="modal" onclick="tambahongkir()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit Ongkir --}}
    <div class="modal fade" id="editOngkir" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0">
                    <h5 class="modal-title ms-auto" >Biaya Ongkir</h5>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 py-0">
                    <form action="" id="formongkir" >
                        <div class="mb-4 ">
                            <label for="ongkir-nominal" class="form-label h6 mb-1">Nominal</label>
                            <input type="number" class="form-control form-control-lg input-custom shadow" id="ongkir-nominal" required>
                        </div>
                        <div class="mb-5 ">
                            <label for="jasa-ongkir" class="form-label h6 mb-1">Label</label>
                            <input type="text" class="form-control form-control-lg input-custom shadow" id="jasa-ongkir" placeholder="Jasa Exspedisi" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <button type="button" class="btn btn-grey py-2  px-5"  data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue px-5 py-2" data-bs-dismiss="modal" onclick="tambahongkir()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Addcost --}}
    <div class="modal fade" id="Modalbiayalain" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0">
                    <h5 class="modal-title ms-auto" >Biaya Lain-Lain</h5>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 py-0">
                    <form action="" id="formbiayalain" >
                        <div class="mb-3 ">
                            <label for="costnominal" class="form-label h6 mb-1">Nominal</label>
                            <input type="number" class="form-control form-control-lg input-custom shadow mb-2" id="costnominal" required>
                            <div class="small">Gunakan tanda (-) untuk mengurangi. <br>misal untuk diskon : -20000</div>
                        </div>
                        <div class="mb-5 ">
                            <label for="addcostlabel" class="form-label h6 mb-1">Label</label>
                            <input type="text" class="form-control form-control-lg input-custom shadow" id="addcostlabel" placeholder="Label biaya - Opsional (max 20 karakter)" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3 ">
                            <button type="button" class="btn btn-grey py-2  px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue px-5 py-2" data-bs-dismiss="modal" onclick="tambahcost()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal edit Addcost --}}
    <div class="modal fade" id="editbiayalain" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 m-3 py-0">
                    <h5 class="modal-title ms-auto" >Biaya Lain-Lain</h5>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 py-0">
                    <form action="" id="formbiayalain" >
                        <div class="mb-3 ">
                            <label for="costnominal" class="form-label h6 mb-1">Nominal</label>
                            <input type="number" class="form-control form-control-lg input-custom shadow mb-2" id="costnominal" required>
                            <div class="small">Gunakan tanda (-) untuk mengurangi. <br>misal untuk diskon : -20000</div>
                        </div>
                        <div class="mb-5 ">
                            <label for="addcostlabel" class="form-label h6 mb-1">Label</label>
                            <input type="text" class="form-control form-control-lg input-custom shadow" id="addcostlabel" placeholder="Label biaya - Opsional (max 20 karakter)" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3 ">
                            <button type="button" class="btn btn-grey py-2  px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue px-5 py-2" data-bs-dismiss="modal" onclick="tambahcost()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal add order--}}
    <div class="modal fade " id="addOrder" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-add-order">
          <div class="modal-content">
            <div class="modal-header border-bottom-0 m-3 py-0">
              <h5 class="modal-title ms-auto ">Tambah Data Order</h5>
              <button type="button" class="btn-close ms-auto " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3 py-0">
                <div class="d-flex flex-row justify-content-between gap-4  mb-4">
                    <div class="col">
                        <label for="kp" class="form-label label-order mb-1">Kode produk</label>
                        <select class="form-select shadow" id="kp">
                            <option selected>Masukkan kode</option>
                            <option value="1">BK-01(celana)</option>
                            <option value="2">BK-02(blazer)</option>
                            <option value="3">BK-03(jas req)</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="hargasatuan" class="form-label label-order mb-1">Harga Satuan</label>
                        <input type="number" class="form-control input-custom shadow" id="hargasatuan">
                    </div>
                    <div class="col ">
                        <label for="ukuran" class="form-label label-order mb-1">Ukuran</label>
                        <select class="form-select shadow" id="ukuran">
                            <option selected>Pilih Ukuran</option>
                            <option value="1" class="fw-bold ">Atasan</option>
                            <option value="2">S</option>
                            <option value="3">M</option>
                            <option value="4">L</option>
                            <option value="5">XL</option>
                            <option value="6">XXL</option>
                            <option value="7">XXXL</option>
                            <option value="8">Custom</option>
                            <option value="9" class="fw-bold ">Bawahan</option>
                            <option value="10">S</option>
                            <option value="11">M</option>
                            <option value="12">L</option>
                            <option value="13">XL</option>
                            <option value="14">XXL</option>
                            <option value="15">XXXL</option>
                            <option value="16">Custom</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="qty" class="form-label label-order mb-1">QTY</label>
                        <input type="number" class="form-control input-custom shadow " id="qty">
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top-0 m-3 gap-3 py-0 ">
              <button type="button" class="btn btn-grey py-2 px-5" data-bs-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-blue px-5 py-2 " data-bs-dismiss="modal" onclick="tambahpesanan()">Simpan</button>
            </div>
          </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm " role="document">
            <div class="modal-content ">
                <div class="my-5">
                    <div class="d-flex flex-column justify-content-center ">
                        <img src="{{ asset('assets/img/confirm.png') }}" alt="" width="120px" class="mx-auto">
                        <p class="fw-bold text-center my-3">Yakin Hapus Data ?</p>
                    </div>
                    <div class="d-flex justify-content-center gap-3">
                        <button class="btn btn-blue" id="btn-ya" data-bs-dismiss="modal">Ya</button>
                        <button class="btn btn-red " data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal edit order --}}
    <div class="modal fade " id="editOrder" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header border-bottom-0 m-3 py-0">
              <h5 class="modal-title ms-auto ">Edit Data Order</h5>
              <button type="button" class="btn-close ms-auto " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3 py-0">
                <div class="d-flex flex-row justify-content-between gap-4">
                    <div class="col">
                        <label for="edit-kp" class="form-label label-order mb-1">Kode produk</label>
                        <select class="form-select shadow" id="edit-kp">
                            <option selected>Masukkan Kode</option>
                            <option value="1">BK-01(celana)</option>
                            <option value="2">BK-02(blazer)</option>
                            <option value="3">BK-03(jas req)</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="edit-hargasatuan" class="form-label label-order mb-1">Harga Satuan</label>
                        <input type="number" class="form-control input-custom shadow" id="edit-hargasatuan">
                    </div>
                    <div class="col ">
                        <label for="edit-ukuran" class="form-label label-order mb-1">Ukuran</label>
                        <select class="form-select shadow" id="edit-ukuran">
                            <option selected>Pilih Ukuran</option>
                            <option value="1" class="fw-bold ">Atasan</option>
                            <option value="2">S</option>
                            <option value="3">M</option>
                            <option value="4">L</option>
                            <option value="5">XL</option>
                            <option value="6">XXL</option>
                            <option value="7">XXXL</option>
                            <option value="8">Custom</option>
                            <option value="9" class="fw-bold ">Bawahan</option>
                            <option value="10">S</option>
                            <option value="11">M</option>
                            <option value="12">L</option>
                            <option value="13">XL</option>
                            <option value="14">XXL</option>
                            <option value="15">XXXL</option>
                            <option value="16">Custom</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="edit-qty" class="form-label label-order mb-1">QTY</label>
                        <input type="number" class="form-control input-custom shadow " id="edit-qty">
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top-0 m-3 gap-3 py-0 ">
              <button type="button" class="btn btn-grey py-2 px-5" data-bs-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-blue px-5 py-2 " data-bs-dismiss="modal" >Simpan</button>
            </div>
          </div>
        </div>
    </div>

    <section>
        @include('partials.modal')
    </section>


@endsection


@section('js')
<script>
    // Function to load provinces
    function loadProvinsi() {
        var provinsiSelect = document.getElementById("provinsi2");
        provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';

        fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi')
            .then(response => response.json())
            .then(data => {
                data.provinsi.forEach(provinsi => {
                    var option = document.createElement('option');
                    option.value = provinsi.id;
                    option.text = provinsi.nama;
                    provinsiSelect.add(option);
                });
            });
    }

    // Function to load cities (kota/kabupaten)
    function loadKabupaten() {
        var kabupatenSelect = document.getElementById("kabupaten2");
        kabupatenSelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';

        var selectedProvinsi = document.getElementById("provinsi2").value;
        if (selectedProvinsi) {
            fetch(`https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${selectedProvinsi}`)
                .then(response => response.json())
                .then(data => {
                    data.kota_kabupaten.forEach(kabupaten => {
                        var option = document.createElement('option');
                        option.value = kabupaten.id;
                        option.text = kabupaten.nama;
                        kabupatenSelect.add(option);
                    });
                });
        }
    }

    // Function to load districts (kecamatan)
    function loadKecamatan() {
        var kecamatanSelect = document.getElementById("kecamatan2");
        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

        var selectedKota = document.getElementById("kabupaten2").value;
        if (selectedKota) {
            fetch(`https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=${selectedKota}`)
                .then(response => response.json())
                .then(data => {
                    data.kecamatan.forEach(kecamatan => {
                        var option = document.createElement('option');
                        option.value = kecamatan.id;
                        option.text = kecamatan.nama;
                        kecamatanSelect.add(option);
                    });
                });
        }
    }

    // Initial load of provinces
    loadProvinsi();
</script>

<script>

    // Mendapatkan elemen tombol switch
    var switchButton = document.getElementById('COD');

    // Mendapatkan elemen yang akan disembunyikan
    var hiddenComponents = document.getElementById('switch-COD');

    // Menambahkan event listener untuk merespons perubahan pada tombol switch
    switchButton.addEventListener('change', function() {
    // Jika tombol switch aktif, sembunyikan elemen yang diberi ID 'hiddenComponents'
        if (this.checked) {
            hiddenComponents.classList.add('d-none');
        } else {
            hiddenComponents.classList.remove('d-none');
        }
    });

    (function () {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault();
                }

                form.classList.add('was-validated');
            }, false);
        });
    })();

    function showSuksesModalEdit() {
        $('#suksesModalEdit').modal('show');
        setTimeout(function () {
            $('#suksesModalEdit').modal('hide');
        }, 1200);
    }

    function showErorModalEdit() {
        $('#erorModalEdit').modal('show');
        setTimeout(function () {
            $('#erorModalEdit').modal('hide');
        }, 1200);
    }

    function search(){
        var gagal = true;

        if (gagal){
            $('#modalNotFound').modal('show');
        }else{
            // isi dengan data sesuai pencarian
        }

    }

    function saveOrder() {
        // Logika untuk Save
        var berhasil = true; // Ganti dengan logika sesuai kebutuhan

        if (berhasil) {
            showSuksesModalEdit();
            setTimeout(function () {
                window.location.href = '/admin/dashboard';
            }, 1200);
        } else {
            showErorModalEdit();
            setTimeout(function () {
                window.location.href = '/admin/dashboard';
            }, 1200);
        }
    }

    function editPelanggan() {
        var berhasil = true;

        if (berhasil) {
            showSuksesModalEdit();
        } else {
            showErorModalEdit();
        }
    }

    function showSuksesModalAdd() {
        $('#suksesModalTambah').modal('show');
        setTimeout(function () {
            $('#suksesModalTambah').modal('hide');
        }, 1200);
    }

    function showErorModalAdd() {
        $('#erorModalTambah').modal('show');
        setTimeout(function () {
            $('#erorModalTambah').modal('hide');
        }, 1200);
    }

    function addPelanggan() {
        // Logika untuk menambah Save
        var berhasil = true; // Ganti dengan logika sesuai kebutuhan

        if (berhasil) {
            showSuksesModalAdd();
        } else {
            showErorModalAdd();
        }
    }
</script>

<script>
    $(document).ready(function(){
        $('#dance-chart').hide();
        $('.opsi').show();
        $('#infoOrder').show();
        $('#btn-OB').show();
        $('#totalhargaOrder').show();
        $('#totalongkir').hide();
        $('#totaladdcost').hide();

    });

    function tambahpesanan(){
        $('#dance-chart').hide();
        $('.opsi').show();
        $('#infoOrder').show();
        $('#btn-OB').show();
        $('#totalhargaOrder').show();
        $('#totalongkir').hide();
        $('#totaladdcost').hide();
    }

    function tambahongkir(){
        $('#dance-chart').hide();
        $('.opsi').show();
        $('#infoOrder').show();
        $('#btn-OB').show();
        $('#totalhargaOrder').show();
        if ($('#totaladdcost').is(':hidden')) { // Cek apakah #totalongkir disembunyikan
            $('#totalongkir').show();
        }else{
            $('#totaladdcost').show();
            $('#totalongkir').show();
        }
    }

    function tambahcost(){
        $('#dance-chart').hide();
        $('.opsi').show();
        $('#infoOrder').show();
        $('#btn-OB').show();
        $('#totalhargaOrder').show();
        if ($('#totalongkir').is(':hidden')) { // Cek apakah #totaladdcost disembunyikan
            $('#totaladdcost').show();
        }else{
            $('#totaladdcost').show();
            $('#totalongkir').show();
        }
    }

    // Ambil semua tombol delete
    var deleteButtons = document.querySelectorAll('.btn-dlt');

    // Tambahkan event listener pada setiap tombol delete
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Ambil ID dari parent <tr> tombol delete yang diklik
            var id = this.closest('tr').id;

            // Panggil fungsi untuk menampilkan modalDelete
            $('#ModalDelete').modal('show');

            // Atur event listener untuk tombol "Ya" di dalam modalDelete
            $('#btn-ya').click(function() {
                var berhasil = true; // Ganti dengan logika sesuai kebutuhan

                if (berhasil) {
                    showSuksesModalDelete();// Jalankan fungsi showmodaldelete()
                    hapusTRById(id);
                } else {
                    showErorModalDelete();
                }

            });
        });
    });

    // Fungsi untuk menampilkan modal Sukses Delete
    function showSuksesModalDelete() {
        $('#suksesModalDelete').modal('show');
        setTimeout(function () {
            $('#suksesModalDelete').modal('hide');
        }, 1200);
    }

    // Fungsi untuk menampilkan modal Error Delete
    function showErorModalDelete() {
        $('#erorModalDelete').modal('show');
        setTimeout(function () {
            $('#erorModalDelete').modal('hide');
        }, 1200);
    }


    // Fungsi untuk menghapus elemen <tr> berdasarkan ID
    function hapusTRById(id) {
        var element = document.getElementById(id);
        if (element) {
            element.parentNode.removeChild(element);
        }

        // Setelah menghapus, cek apakah masih ada elemen <tr> di dalam tabel
        var remainingRows = document.querySelectorAll('.btn-dlt');
        if (remainingRows.length === 0) {
            $('.opsi').hide();
            $('#infoOrder').hide();
            $('#btn-OB').hide();
            $('#totalhargaOrder').hide();
            $('#totalongkir').hide();
            $('#totaladdcost').hide();
            $('#dance-chart').show();
        }
    }
</script>
@endsection
