<!-- sukses Modal edit -->
<div class="modal fade" id="suksesModalEdit" tabindex="-1" role="dialog" data-bs-backdrop="false">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bg-white ">
            <div class="modal-body px-0">
                <div class="d-flex flex-row  justify-content-evenly align-items-center ">
                    <img src="{{ asset('assets/img/sukses.png') }}" alt="" width="55px" class="my-2">
                    <p class="fw-bolder text-center m-0">Data <span class="text-success ">Berhasil</span> diubah!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- gagal Modal Edit -->
<div class="modal fade" id="erorModalEdit" tabindex="-1" role="dialog" data-bs-backdrop="false">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content bg-white  ">
            <div class="modal-body px-0">
                <div class="d-flex flex-row  justify-content-evenly align-items-center  ">
                    <img src="{{ asset('assets/img/gagal.png') }}" alt="" height="55px" class="my-2">
                    <div class="d-flex flex-column ">   
                        <p class="fw-bold text-center m-0">Data <span class="text-danger">Gagal</span> diubah!</p>
                        <span class="text-danger text-center  small">Eror : message!!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- sukses Modal Tambah  -->
<div class="modal fade" id="suksesModalTambah" tabindex="-1" role="dialog" data-bs-backdrop="false">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bg-white ">
            <div class="modal-body py-4 px-0">
                <div class="d-flex flex-row  justify-content-evenly align-items-center ">
                    <img src="{{ asset('assets/img/sukses.png') }}" alt="" width="55px">
                    <p class="fw-bolder text-start m-0">Data <span class="text-success ">Berhasil</span> ditambah!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- gagal Modal Tambah  -->
<div class="modal fade" id="erorModalTambah" tabindex="-1" role="dialog" data-bs-backdrop="false">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content bg-white  ">
            <div class="modal-body px-0">
                <div class="d-flex flex-row  justify-content-evenly align-items-center  ">
                    <img src="{{ asset('assets/img/gagal.png') }}" alt="" height="55px" class="my-2">
                    <div class="d-flex flex-column ">   
                        <p class="fw-bold text-center m-0">Data <span class="text-danger">Gagal</span> ditambah!</p>
                        <span class="text-danger text-center  small">Eror : message!!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- sukses Modal Delete -->
<div class="modal fade" id="suksesModalDelete" tabindex="-1" role="dialog" data-bs-backdrop="false">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bg-white ">
            <div class="modal-body px-0">
                <div class="d-flex flex-row  justify-content-evenly align-items-center ">
                    <img src="{{ asset('assets/img/sukses.png') }}" alt="" width="55px" class="my-2">
                    <p class="fw-bolder text-center m-0">Data <span class="text-success ">Berhasil</span> dihapus!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- gagal Modal Delete -->
<div class="modal fade" id="erorModalDelete" tabindex="-1" role="dialog" data-bs-backdrop="false">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content bg-white  ">
            <div class="modal-body px-0">
                <div class="d-flex flex-row  justify-content-evenly align-items-center  ">
                    <img src="{{ asset('assets/img/gagal.png') }}" alt="" height="55px" class="my-2">
                    <div class="d-flex flex-column ">   
                        <p class="fw-bold text-start m-0">Data <span class="text-danger">Gagal</span> dihapus!</p>
                        <span class="text-danger text-center  small">Eror : message!!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal aksi vertical
<!-- sukses Modal Tambah  -->
<div class="modal fade" id="suksesModalTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content ">
            <div class=" my-4 d-flex flex-column justify-content-center ">
                <img src="{{ asset('assets/img/sukses.png') }}" alt="" width="100px" class="mx-auto mb-2">
                <small class="fw-bolder text-center ">Data <span class="text-success ">Berhasil</span> ditambah!</small>
            </div>
        </div>
    </div>
</div>

<!-- gagal Modal Tambah-->
<div class="modal fade" id="erorModalTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content ">
            <div class=" my-5 d-flex flex-column justify-content-center ">
                <img src="{{ asset('assets/img/gagal.png') }}" alt="" width="100px" class="mx-auto mb-2">
                <small class="fw-bolder text-center ">Data <span class="text-danger">Gagal</span> ditambah!</small>
                <span class="text-danger text-center  ">Eror : message!!</span>
            </div>
        </div>
    </div>
</div>

<!-- sukses Modal Edit  -->
<div class="modal fade" id="suksesModalEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content ">
            <div class=" my-4 d-flex flex-column justify-content-center ">
                <img src="{{ asset('assets/img/sukses.png') }}" alt="" width="100px" class="mx-auto mb-2">
                <small class="fw-bolder text-center ">Data <span class="text-success ">Berhasil</span> diubah!</small>
            </div>
        </div>
    </div>
</div>

<!-- gagal Modal Edit-->
<div class="modal fade" id="erorModalEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content ">
            <div class=" my-5 d-flex flex-column justify-content-center ">
                <img src="{{ asset('assets/img/gagal.png') }}" alt="" width="100px" class="mx-auto mb-2">
                <small class="fw-bolder text-center ">Data <span class="text-danger">Gagal</span> diubah!</small>
                <span class="text-danger text-center  ">Eror : message!!</span>
            </div>
        </div>
    </div>
</div>

<!-- sukses Modal delete  -->
<div class="modal fade" id="suksesModalDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content ">
            <div class=" my-4 d-flex flex-column justify-content-center ">
                <img src="{{ asset('assets/img/sukses.png') }}" alt="" width="100px" class="mx-auto mb-2">
                <small class="fw-bolder text-center ">Data <span class="text-success ">Berhasil</span> dihapus!</small>
            </div>
        </div>
    </div>
</div>

<!-- gagal Modal delete-->
<div class="modal fade" id="erorModalDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content ">
            <div class=" my-5 d-flex flex-column justify-content-center ">
                <img src="{{ asset('assets/img/gagal.png') }}" alt="" width="100px" class="mx-auto mb-2">
                <small class="fw-bolder text-center ">Data <span class="text-danger">Gagal</span> dihapus!</small>
                <span class="text-danger text-center  ">Eror : message!!</span>
            </div>
        </div>
    </div>
</div> --}}