{{-- Modal Search Dashboard Admin --}}
<div class="modal fade" id="inputSearchModal" tabindex="-1" aria-labelledby="inputSearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex gap-1 justify-content-between">
                        <div class="col-lg-3 my-2">
                                <label for="ukuran" class="col-form-label">Opsi Pembayaran</label>
                                <div class="dropdown">
                                    <button class="btn d-flex justify-content-between align-items-center bg-white border w-100 border-black rounded rounded-3 dropdown-toggle @error('size') is-invalid @enderror" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="tambah-ukuran" data-name="size">
                                        Pilih Pembayaran
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-value="M">Belum Bayar</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="L">Tunggu Konfirmasi Pembayaran</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="XL">Cicilan / Kredit</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="XXL">Ada kelebihan</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="XXXL">Sudah Lunas</a></li>
                                    </ul>
                                    <input type="hidden" name="size" id="hidden-tambah-ukuran" value="{{ old('size') }}">
                                </div>                      
                        </div>
                        <div class="col-lg-3 my-2">
                            <label for="ukuran" class="col-form-label">Opsi Orderan</label>
                            <div class="dropdown">
                                <button class="btn d-flex justify-content-between align-items-center bg-white border w-100 border-black rounded rounded-3 dropdown-toggle @error('size') is-invalid @enderror" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="tambah-ukuran" data-name="size">
                                    Pilih opsi order
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-value="M">Belum Bayar</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="L">Sedang/Sudah diproses</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="XL">Cicilan / Kredit</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="XXL">Ada kelebihan</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="XXXL">Sudah Lunas</a></li>
                                </ul>
                                <input type="hidden" name="size" id="hidden-tambah-ukuran" value="{{ old('size') }}">
                            </div>                      
                        </div>
                        <div class="col-lg-3 my-2">
                            <label for="ukuran" class="col-form-label">Opsi Pengiriman</label>
                            <div class="dropdown">
                                <button class="btn d-flex justify-content-between align-items-center bg-white border w-100 border-black rounded rounded-3 dropdown-toggle @error('size') is-invalid @enderror" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="tambah-ukuran" data-name="size">
                                    Pilih opsi pengiriman
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-value="M">Belum dikirim</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="L">Tunggu Konfirmasi Pembayaran</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="XL">Cicilan / Kredit</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="XXL">Ada kelebihan</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="XXXL">Sudah Lunas</a></li>
                                </ul>
                                <input type="hidden" name="size" id="hidden-tambah-ukuran" value="{{ old('size') }}">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-5">                       
                        <div class="col-lg-3 mb-2">
                            <label for="ukuran" class="col-form-label">Opsi pencarian</label>
                            <div class="dropdown">
                                <button class="btn d-flex justify-content-between align-items-center bg-white border w-100 border-black rounded rounded-3 dropdown-toggle @error('size') is-invalid @enderror" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="tambah-ukuran" data-name="size">
                                    Pilih pencarian
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-value="M">Nama Pelanggan</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="L">Tunggu Konfirmasi Pembayaran</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="XL">Cicilan / Kredit</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="XXL">Ada kelebihan</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="XXXL">Sudah Lunas</a></li>
                                </ul>
                                <input type="hidden" name="size" id="hidden-tambah-ukuran" value="{{ old('size') }}">
                            </div>                      
                        </div>   
                        <div class="mb-2 col-lg-3 mx-5">
                            <label for="ukuran" class="col-form-label text-white">date</label>
                            <input type="date" class="form-control shadow">
                        </div>                   
                    </div>
                        
                        
                        <div class="my-2 col-lg-12">
                            <input type="text" class="form-control shadow" placeholder="Cari ...">
                        </div>
                </div>
                <div class="modal-footer justify-content-start gap-2">
                    <button type="submit" class="btn btn-primary modal_btn_width">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>