<div class="modal-content">
    <div class="modal-header border-bottom-0 m-3 py-0 ">
        <h5 class="modal-title ms-auto">Edit Data Barang</h5>
        {{-- <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
            aria-label="Close"></button> --}}
    </div>
    <div class="modal-body m-3 mt-0 pt-0 pb-3">
        <form id="updateForm" action="{{ route('barangs.update', $data_brg->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" id="edit-id">
            <div class="mb-4">
                <label for="kd-produk" class="form-label label-order mb-1">Kode Produk</label>
                <input type="text"
                    class="form-control form-control-lg  shadow @error('kd_produk') is-invalid @enderror"
                    id="edit-kd-produk" name="kd_produk" placeholder="Kode Produk"
                    value="{{ $data->kd_produk }}" readonly>
                @error('kd_produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="nama-produk" class="form-label label-order mb-1">Nama Produk</label>
                <input type="text"
                    class="form-control form-control-lg  shadow @error('nama') is-invalid @enderror"
                    id="edit-nama-produk" name="nama" placeholder="Nama Produk"
                    value="{{ old('nama') }}" autofocus>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex row gap-4 justify-content-between mb-4">
                <div class=" col-lg-3 col-md-12 ">
                    <label for="ukuran" class="form-label label-order mb-1">Ukuran</label>
                    <select class="form-select form-select-lg  shadow" id="ukuran">
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
                <div class=" col-lg-3 col-md-12 ">
                    <label for="harga" class="form-label label-order mb-1">Harga</label>
                    <input type="number"
                        class="form-control form-control-lg  shadow @error('harga_satuan') is-invalid @enderror"
                        id="edit-harga" name="harga_satuan" value="{{ old('harga_satuan') }}">
                    @error('harga_satuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class=" col-lg-3 col-md-12 ">
                    <label for="stok" class="form-label label-order mb-1">Stok</label>
                    <input type="number"
                        class="form-control form-control-lg  shadow @error('stock') is-invalid @enderror"
                        id="edit-stok" name="stock" value="{{ old('stock') }}">
                    @error('stock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4">
                <label for="gambar" class="form-label label-order mb-1">Gambar</label>
                <input type="text" class="form-control form-control-lg  shadow" id="edit-gambar"
                    placeholder="Link Google Drive" name="img">
            </div>
            <div class="mb-4">
                <label for="video" class="form-label label-order mb-1">Video</label>
                <input type="text" class="form-control form-control-lg  shadow" id="edit-video"
                    placeholder="Link Google Drive" name="video">
            </div>
            <div class="mb-5 col-lg-3">
                <label for="point_produk" class="form-label label-order mb-1">Point Produk</label>
                <input type="number"
                    class="form-control form-control-lg  shadow @error('point') is-invalid @enderror"
                    id="edit-point_produk" name="point" value="{{ old('point') }}">
                @error('point')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex gap-4 justify-content-md-between ">
                <button type="button" class="btn btn-grey py-2  px-5" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-blue px-5 py-2" onclick="editBarang({{ $data->id }})">Simpan</button>
            </div>
        </form>
    </div>
</div>
