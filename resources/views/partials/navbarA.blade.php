<link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">

{{-- navbar Admin --}}
<nav class="navbar navbar-expand-lg p-0">
    <div class="container-fluid py-3 max-container">
        <button class="btn mx-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
            <i class="fa-solid fa-bars text-white fs-5 "></i>
        </button>

        {{-- navbar brand --}}
        <a href="#" class="navbar-brand ms-3 p-0 d-md-none d-lg-inline">
            <img src="{{ asset('assets/img/navbrand.png') }}" alt="" height="35px">
        </a>

        {{-- menu dropdown --}}
        <div class="navbar-nav d-flex  flex-row  me-auto ms-lg-4  gap-2">
            <li class="nav-item">
                <a class="nav-menu nav-link {{ $title === 'Dashboard' ? 'active' : '' }} text-decoration-none "
                    href="/admin/dashboard">Dashboard</a>
            </li>
            <li class="nav-item ">
                <a class="nav-menu nav-link {{ $title === 'Tulis Orderan' ? 'active' : '' }} text-decoration-none"
                    href="/admin/tulisOrderan">Tulis Orderan</a>
            </li>
            <li class="nav-item ">
                <a class="nav-menu nav-link {{ $title === 'Charts' ? 'active' : '' }} text-decoration-none"
                    href="/admin/charts">Charts</a>
            </li>
            <li class="nav-item ">
                <a class="nav-menu nav-link {{ $title === 'Request' ? 'active' : '' }} text-decoration-none"
                    href="/admin/request">Request</a>
            </li>
        </div>

        {{-- profile notif --}}
        <div class="d-flex align-items-center me-3 gap-3">
            <button class="btn notif " id="notifikasi" type="button" data-bs-container="body" data-bs-toggle="popover"
                data-bs-placement="bottom" data-bs-content="" data-bs-html="true">
                <i class="fa-regular fa-bell position-relative ">
                    <span id="notif-qty"
                        class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger fw-light"
                        style="font-size: 10px; font-family: 'Poppins'; ">
                        3<span class="visually-hidden">unread messages</span>
                    </span>
                </i>
            </button>
            <div>
                <a href="/admin/profile">
                    <img src="{{ asset('assets/img/Avatar-image.png') }}" alt="" width="40" height="40"
                        style="border-radius: 8px;">
                </a>
            </div>
        </div>
    </div>
</nav>

{{-- offcanvas --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar">
    <div class="offcanvas-header px-4 py-3">
        <img src="{{ asset('assets/img/navbrand.png') }}" alt="" height="32px" class="ms-3">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body mx-2">
        <div class="d-flex justify-content-start">
            <div class="nav d-flex flex-column nav-pills col-12 gap-4">
                <a class="nav-link offcanvas-link {{ $title === 'Data Pelanggan' ? 'active' : '' }} d-flex align-items-center gap-3 col-12"
                    href="/admin/dataPelanggan">
                    <span>
                        <svg id="datapelanggan" width="20" height="23" viewBox="0 0 20 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 0C8.48448 0 7.03103 0.605802 5.95939 1.68414C4.88775 2.76247 4.28571 4.22501 4.28571 5.75C4.28571 7.27499 4.88775 8.73753 5.95939 9.81586C7.03103 10.8942 8.48448 11.5 10 11.5C11.5155 11.5 12.969 10.8942 14.0406 9.81586C15.1122 8.73753 15.7143 7.27499 15.7143 5.75C15.7143 4.22501 15.1122 2.76247 14.0406 1.68414C12.969 0.605802 11.5155 0 10 0ZM5.71429 5.75C5.71429 4.60625 6.16582 3.50935 6.96954 2.7006C7.77327 1.89185 8.86336 1.4375 10 1.4375C11.1366 1.4375 12.2267 1.89185 13.0305 2.7006C13.8342 3.50935 14.2857 4.60625 14.2857 5.75C14.2857 6.89375 13.8342 7.99065 13.0305 8.7994C12.2267 9.60815 11.1366 10.0625 10 10.0625C8.86336 10.0625 7.77327 9.60815 6.96954 8.7994C6.16582 7.99065 5.71429 6.89375 5.71429 5.75ZM2.87 12.9375C2.49377 12.936 2.12094 13.0092 1.77289 13.153C1.42485 13.2968 1.10843 13.5083 0.841799 13.7754C0.575163 14.0425 0.36355 14.3599 0.219095 14.7095C0.0746398 15.0591 0.000185017 15.4339 0 15.8125C0 18.2433 1.19 20.0761 3.05 21.2707C4.88143 22.4451 7.35 23 10 23C12.65 23 15.1186 22.4451 16.95 21.2707C18.81 20.0776 20 18.2419 20 15.8125C20 15.05 19.699 14.3187 19.1632 13.7796C18.6273 13.2404 17.9006 12.9375 17.1429 12.9375H2.87ZM1.42857 15.8125C1.42857 15.0176 2.06857 14.375 2.87 14.375H17.1429C17.5217 14.375 17.8851 14.5265 18.153 14.796C18.4209 15.0656 18.5714 15.4313 18.5714 15.8125C18.5714 17.6942 17.6829 19.0958 16.1814 20.0574C14.6529 21.0392 12.4786 21.5625 10 21.5625C7.52143 21.5625 5.34714 21.0392 3.81857 20.0574C2.31857 19.0943 1.42857 17.6956 1.42857 15.8125Z"
                                fill="#ADB4CB" />
                        </svg>
                    </span>
                    Data Pelanggan
                </a>
                <a class="nav-link offcanvas-link {{ $title === 'Data Barang' ? 'active' : '' }} d-flex align-items-center col-12 gap-3"
                    href="/admin/dataBarang">
                    <span>
                        <svg id="databarang" width="22" height="25" viewBox="0 0 22 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11 24L20.0344 18.6232C20.3856 18.4136 20.5611 18.3101 20.6889 18.1555C20.8021 18.0198 20.8878 17.8571 20.94 17.6789C21 17.4757 21 17.2495 21 16.7947V6.79229M11 24L1.96556 18.6232C1.61444 18.4136 1.43889 18.3101 1.31111 18.1555C1.1982 18.0196 1.11249 17.8569 1.06 17.6789C1 17.4757 1 17.2483 1 16.7921V6.79229M11 24V12.4196M21 6.79229L11 12.4196M21 6.79229L11.8111 1.32345C11.5144 1.14711 11.3667 1.05767 11.21 1.02317C11.0713 0.992276 10.9287 0.992276 10.79 1.02317C10.6344 1.05767 10.4856 1.14711 10.1878 1.32345L1 6.79229M1 6.79229L11 12.4196"
                                stroke="#ADB4CB" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    Data Barang
                </a>
                <a class="nav-link offcanvas-link {{ $title === 'Data CS' ? 'active' : '' }} d-flex align-items-center gap-3 col-12"
                    href="/admin/data-cs">
                    <span>
                        <svg id="datacs" width="20" height="23" viewBox="0 0 20 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.2164 7.31741H18.1818C18.664 7.31741 19.1265 7.53772 19.4675 7.92986C19.8084 8.322 20 8.85386 20 9.40843V13.5904C20 14.145 19.8084 14.6769 19.4675 15.069C19.1265 15.4612 18.664 15.6815 18.1818 15.6815H17.2164C16.9947 17.7027 16.1393 19.5615 14.8107 20.909C13.482 22.2564 11.7715 23 10 23V20.909C11.4466 20.909 12.834 20.2481 13.8569 19.0717C14.8799 17.8952 15.4545 16.2997 15.4545 14.636V8.36292C15.4545 6.69921 14.8799 5.10364 13.8569 3.92722C12.834 2.75079 11.4466 2.08989 10 2.08989C8.55336 2.08989 7.16598 2.75079 6.14305 3.92722C5.12013 5.10364 4.54545 6.69921 4.54545 8.36292V15.6815H1.81818C1.33597 15.6815 0.873508 15.4612 0.532533 15.069C0.191558 14.6769 0 14.145 0 13.5904V9.40843C0 8.85386 0.191558 8.322 0.532533 7.92986C0.873508 7.53772 1.33597 7.31741 1.81818 7.31741H2.78364C3.00548 5.29634 3.86098 3.43783 5.18961 2.09059C6.51824 0.743357 8.22868 0 10 0C11.7713 0 13.4818 0.743357 14.8104 2.09059C16.139 3.43783 16.9945 5.29634 17.2164 7.31741ZM1.81818 9.40843V13.5904H2.72727V9.40843H1.81818ZM17.2727 9.40843V13.5904H18.1818V9.40843H17.2727ZM6.14545 15.4567L7.10909 13.6835C7.97552 14.3077 8.97761 14.6379 10 14.636C11.0224 14.6379 12.0245 14.3077 12.8909 13.6835L13.8545 15.4567C12.6993 16.2891 11.3632 16.7294 10 16.727C8.63677 16.7294 7.30065 16.2891 6.14545 15.4567Z"
                                fill="#ADB4CB" />
                        </svg>
                    </span>
                    Data CS
                </a>
                <a class="nav-link offcanvas-link {{ $title === 'Data Juragan' ? 'active' : '' }} d-flex align-items-center gap-3 col-12"
                    href="/admin/juragan">
                    <span>
                        <svg id="datajuragan" width="20" height="23" viewBox="0 0 20 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.32066 1.53333V0H18.6782V1.53333H1.32066ZM1.40885 23V13.8H0V12.2667L1.32066 4.6H18.6782L20 12.2667V13.8H18.59V23H17.4446V13.8H11.7175V23H1.40885ZM2.55426 21.4667H10.5721V13.8H2.55426V21.4667ZM1.15686 12.2667H18.842L17.779 6.13333H2.2198L1.15686 12.2667Z"
                                fill="#ADB4CB" />
                        </svg>
                    </span>
                    Data Juragan
                </a>
                <a class="nav-link offcanvas-link {{ $title === 'Audio & Notif' ? 'active' : '' }} d-flex align-items-center gap-3 col-12"
                    href="/admin/notif">
                    <span>
                        <svg id="audionotif" width="20" height="23" viewBox="0 0 20 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.833374 13.2785V9.71924C0.833374 9.21091 1.00897 8.72339 1.32153 8.36395C1.63409 8.00451 2.05801 7.80257 2.50004 7.80257H4.91671C5.07964 7.80252 5.23899 7.74755 5.37504 7.64445L10.375 3.85328C10.5007 3.75814 10.6463 3.70387 10.7966 3.69625C10.9469 3.68862 11.0962 3.72791 11.2286 3.80995C11.361 3.89199 11.4717 4.01372 11.5488 4.16224C11.6259 4.31075 11.6667 4.4805 11.6667 4.65349V18.3442C11.6667 18.5172 11.6259 18.687 11.5488 18.8355C11.4717 18.984 11.361 19.1057 11.2286 19.1878C11.0962 19.2698 10.9469 19.3091 10.7966 19.3015C10.6463 19.2939 10.5007 19.2396 10.375 19.1444L5.37504 15.3533C5.23899 15.2502 5.07964 15.1952 4.91671 15.1952H2.50004C2.05801 15.1952 1.63409 14.9932 1.32153 14.6338C1.00897 14.2743 0.833374 13.7868 0.833374 13.2785Z"
                                stroke="#ADB4CB" stroke-width="1.5" />
                            <path
                                d="M14.5834 7.1875C14.5834 7.1875 15.8334 8.625 15.8334 11.0208C15.8334 13.4167 14.5834 14.8542 14.5834 14.8542M17.0834 4.3125C17.0834 4.3125 19.1667 6.70833 19.1667 11.0208C19.1667 15.3333 17.0834 17.7292 17.0834 17.7292"
                                stroke="#ADB4CB" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                    Audio & Notif
                </a>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer mx-2 p-3">
        <div class="d-flex justify-content-start">
            <button class="btn bg-transparent d-flex align-items-center gap-3 col-12" id="logout"
                data-bs-toggle="modal" data-bs-target="#ModalKeluar">
                <span>
                    <svg id="keluar" width="22" height="25" viewBox="0 0 22 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.2857 1H1V21.125C1 21.8875 1.30102 22.6188 1.83684 23.1579C2.37266 23.6971 3.09938 24 3.85714 24H15.2857M16.7143 16.8125L21 12.5M21 12.5L16.7143 8.1875M21 12.5H6.71429"
                            stroke="#ADB4CB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                Keluar
            </button>
        </div>
    </div>
</div>

{{-- modal keluar --}}

<div class="modal fade" id="ModalKeluar" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content ">
            <div class="my-5">
                <div class="d-flex flex-column justify-content-center ">
                    <img src="{{ asset('assets/img/confirm.png') }}" alt="" width="120px" class="mx-auto">
                    <p class="fw-bolder text-center my-3">Anda yakin ingin keluar dari akun ?</p>
                </div>
                <div class="d-flex justify-content-center gap-3 ">
                    <button class="btn btn-grey1 px-4 " data-bs-dismiss="modal">Batal</button>
                    <a href="/logout" class="btn btn-blue px-4">Keluar</a>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- isi notif pada navbar --}}
<div id="popoverContent" style="display: none;">
    <p class="text-secondary text-start fs-6">Notifikasi</p>
    <hr>
    <div>
        <small>Kam, 16 Nov 2023 (14:46:26)</small>

        <p class="text-primary">[Emery Donin | Korean Hunter] merequest edit “Data Pesanan” pada invoice AH1693918566
        </p>
    </div>
    <hr>
</div>

<script>
    // Ambil konten dari elemen dengan ID popoverContent
    var popoverContent = document.getElementById('popoverContent').innerHTML;

    // Inisialisasi Popover dengan konten dinamis
    var popover = new bootstrap.Popover(document.getElementById('notifikasi'), {
        container: 'body',
        placement: 'bottom',
        content: popoverContent
    });
    // Tambahkan event listener untuk menyesuaikan tampilan saat popover terbuka
    document.getElementById('notifikasi').addEventListener('shown.bs.popover', function() {
        // Hapus kelas 'fa-regular' dan tambahkan kelas 'fa-solid'
        document.querySelector('#notifikasi i.fa-regular').classList.remove('fa-regular');
        document.querySelector('#notifikasi i').classList.add('fa-solid');
        // Tambahkan warna biru
        document.getElementById('notifikasi').style.color = '#0091ff';
        document.getElementById('notifikasi').style.backgroundColor = 'white';
        document.getElementById('notif-qty').style.display = 'none';
    });

    // Tambahkan event listener untuk menyesuaikan tampilan saat popover tertutup
    document.getElementById('notifikasi').addEventListener('hidden.bs.popover', function() {
        // Hapus kelas 'fa-solid' dan tambahkan kelas 'fa-regular'
        document.querySelector('#notifikasi i.fa-solid').classList.remove('fa-solid');
        document.querySelector('#notifikasi i').classList.add('fa-regular');
        // Hapus warna biru
        document.getElementById('notifikasi').style.color = '#828282';
        document.getElementById('notifikasi').style.backgroundColor = '';

    });
</script>
