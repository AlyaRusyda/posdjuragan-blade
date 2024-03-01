<link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">

{{-- navbar Super-admin --}}
<nav class="navbar navbar-expand-lg p-0">
    <div class="container-fluid py-3">
        <button class="btn mx-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
            <i class="fa-solid fa-bars text-white fs-5 "></i>
        </button>

        {{-- navbar brand --}}
        <a href="#" class="navbar-brand ms-3 p-0 text-white d-md-none d-lg-inline ">
            <img src="{{ asset('assets/img/navbrand.png') }}" alt="" height="35px">
        </a>

        {{-- menu dropdown --}}
        <div class="navbar-nav flex-row  me-auto ms-lg-4 gap-2">
            <li class="nav-item">
                <a class="nav-menu nav-link {{ $title === 'Dashboard' ? 'active' : '' }} text-decoration-none "
                    href="/superAdmin/semua-orderan">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-menu nav-link {{ $title === 'Tulis Orderan' ? 'active' : '' }} text-decoration-none"
                    href="/superAdmin/tulisOrderan">Tulis Orderan</a>
            </li>
            <li class="nav-item">
                <a class="nav-menu nav-link {{ $title === 'Charts' ? 'active' : '' }} text-decoration-none"
                    href="/superAdmin/charts">Charts</a>
            </li>
            <li class="nav-item">
                <a class="nav-menu nav-link {{ $title === 'Request' ? 'active' : '' }} text-decoration-none"
                    href="/superAdmin/request">Request</a>
            </li>
        </div>

        {{-- profile notif --}}
        <div class="d-flex align-items-center me-3 gap-3 ">
            <button class="btn notif" id="notifikasi" type="button" data-bs-container="body" data-bs-toggle="popover"
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
                <a href="/superadmin/profile">
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
                    href="/superAdmin/dataPelanggan">
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
                    href="/superAdmin/dataBarang">
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
                    href="/superadmin/data-cs">
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
                <a class="nav-link offcanvas-link {{ $title === 'Data Admin' ? 'active' : '' }} d-flex align-items-center col-12 gap-3"
                    href="/superAdmin/dataAdmin">
                    <span>
                        <svg id="dataadmin" width="20" height="23" viewBox="0 0 20 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.15546 9.462C7.41244 9.462 6.68612 9.20854 6.0684 8.73369C5.45069 8.25884 4.96933 7.58394 4.68525 6.7944C4.40116 6.00485 4.32711 5.13614 4.47247 4.29818C4.61783 3.46023 4.97607 2.69069 5.50185 2.08693C6.02763 1.48318 6.69732 1.07235 7.42619 0.906429C8.15507 0.740506 8.91036 0.826947 9.5965 1.15481C10.2826 1.48268 10.8688 2.03724 11.2808 2.74831C11.6928 3.45939 11.9121 4.29503 11.911 5.1495C11.9081 6.29331 11.5113 7.38922 10.8075 8.19742C10.1036 9.00562 9.15008 9.46031 8.15546 9.462ZM8.15546 2.10839C7.63243 2.10839 7.12116 2.28675 6.68628 2.62091C6.2514 2.95507 5.91246 3.43003 5.71231 3.98572C5.51216 4.54141 5.45979 5.15287 5.56182 5.74279C5.66386 6.33271 5.91572 6.87458 6.28555 7.29989C6.65538 7.7252 7.12658 8.01483 7.63955 8.13218C8.15252 8.24952 8.68423 8.18929 9.16744 7.95912C9.65065 7.72894 10.0637 7.33916 10.3542 6.83905C10.6448 6.33894 10.7999 5.75097 10.7999 5.1495C10.7999 4.34295 10.5213 3.56943 10.0254 2.99911C9.52943 2.42879 8.85681 2.10839 8.15546 2.10839Z"
                                fill="#ADB4CB" />
                            <path
                                d="M9.12219 20.241C9.00078 20.1014 8.90711 19.9331 8.84765 19.7478C8.78819 19.5625 8.76434 19.3646 8.77775 19.1677H2.2222V15.4749C3.00992 14.5083 3.96537 13.7427 5.02669 13.2276C6.08801 12.7126 7.23156 12.4595 8.38331 12.4849H8.78331C8.75781 12.2707 8.77562 12.0526 8.83536 11.8476C8.8951 11.6426 8.99516 11.4563 9.12775 11.303L9.19442 11.2327C8.93331 11.2327 8.63886 11.1944 8.38331 11.1944C7.02797 11.1574 5.68243 11.4672 4.44396 12.1014C3.20549 12.7356 2.10504 13.6784 1.2222 14.8616C1.15007 14.9722 1.11108 15.1067 1.11108 15.2449V19.1677C1.11108 19.5066 1.22815 19.8316 1.43652 20.0712C1.64489 20.3109 1.92751 20.4455 2.2222 20.4455H9.27775L9.12219 20.241Z"
                                fill="#ADB4CB" />
                            <path
                                d="M14.9279 10.4073C14.9553 10.4007 14.9837 10.4007 15.0112 10.4073C14.9836 10.4015 14.9554 10.4015 14.9279 10.4073Z"
                                fill="#ADB4CB" />
                            <path
                                d="M18.7109 14.8978L17.5998 14.5081C17.5204 14.1955 17.4124 13.8936 17.2776 13.6072L17.8332 12.4189C17.8512 12.3714 17.8556 12.3184 17.8456 12.2678C17.8356 12.2173 17.8118 12.1717 17.7776 12.1378L16.9721 11.2114C16.9416 11.1735 16.9009 11.1485 16.8566 11.1403C16.8122 11.1322 16.7668 11.1415 16.7276 11.1667L15.7054 11.8056C15.4537 11.6428 15.1873 11.5122 14.9109 11.4159L14.5721 10.1381C14.5577 10.091 14.5304 10.0507 14.4943 10.023C14.4582 9.99535 14.4153 9.98192 14.3721 9.98474H13.2332C13.1894 9.98416 13.1467 10.0001 13.1116 10.0301C13.0765 10.0601 13.0509 10.1025 13.0387 10.1509L12.6998 11.4286C12.4216 11.5217 12.1532 11.6503 11.8998 11.812L10.8887 11.1731C10.8504 11.1484 10.8059 11.1394 10.7625 11.1475C10.7191 11.1556 10.6794 11.1804 10.6498 11.2178L9.82761 12.1378C9.79712 12.1747 9.7775 12.2217 9.77152 12.2722C9.76554 12.3226 9.7735 12.374 9.79428 12.4189L10.3498 13.5817C10.2029 13.8697 10.0854 14.1762 9.99983 14.4953L8.88872 14.8786C8.84669 14.8926 8.8098 14.922 8.78371 14.9624C8.75762 15.0028 8.74377 15.0519 8.74428 15.1022V16.412C8.74756 16.4581 8.76322 16.502 8.78909 16.5374C8.81496 16.5729 8.84978 16.5983 8.88872 16.61L9.99983 16.9997C10.0819 17.3131 10.1937 17.6152 10.3332 17.9006L9.77761 19.1209C9.75641 19.1646 9.7482 19.2151 9.75421 19.2646C9.76023 19.3142 9.78015 19.3602 9.81094 19.3956L10.6165 20.322C10.648 20.3581 10.6885 20.3818 10.7324 20.3898C10.7763 20.3979 10.8213 20.3898 10.8609 20.3667L11.8998 19.7278C12.1471 19.8807 12.4078 20.0028 12.6776 20.092L13.0109 21.3697C13.0246 21.417 13.0506 21.4583 13.0854 21.4881C13.1202 21.5178 13.1621 21.5345 13.2054 21.5359H14.3443C14.3878 21.5354 14.4301 21.5191 14.465 21.4892C14.5 21.4594 14.5258 21.4175 14.5387 21.3697L14.8776 20.06C15.1438 19.9708 15.4009 19.8487 15.6443 19.6959L16.6943 20.3347C16.7329 20.3583 16.7771 20.3667 16.8203 20.3587C16.8634 20.3506 16.9031 20.3265 16.9332 20.29L17.7776 19.4211C17.8003 19.3836 17.8125 19.339 17.8125 19.2934C17.8125 19.2477 17.8003 19.2031 17.7776 19.1656L17.2221 17.9645C17.3569 17.6826 17.465 17.3849 17.5443 17.0764L18.6554 16.6867C18.6974 16.6727 18.7343 16.6433 18.7604 16.6029C18.7865 16.5625 18.8003 16.5134 18.7998 16.4631V15.1214C18.8049 15.0783 18.7993 15.0344 18.7836 14.9948C18.7678 14.9552 18.7426 14.9216 18.7109 14.8978ZM13.8054 17.8878C13.4379 17.8891 13.0784 17.7648 12.7724 17.5308C12.4664 17.2968 12.2277 16.9636 12.0866 16.5735C11.9455 16.1833 11.9082 15.7537 11.9797 15.3392C12.0511 14.9247 12.2279 14.5438 12.4878 14.245C12.7476 13.9462 13.0787 13.7429 13.4392 13.6607C13.7997 13.5786 14.1732 13.6214 14.5125 13.7837C14.8518 13.946 15.1415 14.2205 15.345 14.5724C15.5485 14.9243 15.6565 15.3377 15.6554 15.7603C15.6539 16.324 15.4585 16.8642 15.1119 17.2628C14.7653 17.6614 14.2956 17.8861 13.8054 17.8878Z"
                                fill="#ADB4CB" />
                        </svg>
                    </span>
                    Data Admin
                </a>
                <a class="nav-link offcanvas-link {{ $title === 'Data Juragan' ? 'active' : '' }} d-flex align-items-center gap-3 col-12"
                    href="/superAdmin/juragan">
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
                <a class="nav-link offcanvas-link {{ $title === 'Data Expedisi' ? 'active' : '' }} d-flex align-items-center col-12 gap-3"
                    href="/superadmin/data-ekpedisi">
                    <span>
                        <svg id="dataexpedisi" width="20" height="23" viewBox="0 0 20 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.9636 8.38224L18.7771 3.47461C18.6897 3.10954 18.5379 2.79653 18.3413 2.57642C18.1448 2.3563 17.9127 2.23931 17.6754 2.24069H14.5763V0.841309C14.5763 0.61818 14.5227 0.40419 14.4273 0.246414C14.332 0.0886376 14.2027 0 14.0678 0H1.18644C0.871777 0 0.570001 0.206821 0.3475 0.574965C0.125 0.94311 0 1.44242 0 1.96305V17.6675C0 18.1881 0.125 18.6874 0.3475 19.0556C0.570001 19.4237 0.871777 19.6305 1.18644 19.6305H2.76271C2.87941 20.5815 3.19122 21.4364 3.64529 22.0505C4.09937 22.6645 4.66779 23 5.25424 23C5.84069 23 6.40911 22.6645 6.86318 22.0505C7.31726 21.4364 7.62906 20.5815 7.74576 19.6305H12.2542C12.3709 20.5815 12.6827 21.4364 13.1368 22.0505C13.5909 22.6645 14.1593 23 14.7458 23C15.3322 23 15.9006 22.6645 16.3547 22.0505C16.8088 21.4364 17.1206 20.5815 17.2373 19.6305H18.8136C19.1282 19.6305 19.43 19.4237 19.6525 19.0556C19.875 18.6874 20 18.1881 20 17.6675V8.69353C19.9999 8.58688 19.9875 8.48125 19.9636 8.38224ZM14.5763 3.92611H17.6763C17.7102 3.92605 17.7434 3.94287 17.7715 3.97437C17.7996 4.00587 17.8213 4.0506 17.8339 4.10278L18.7407 7.85222H14.5763V3.92611ZM1.01695 1.96305C1.01695 1.88868 1.03481 1.81735 1.06659 1.76476C1.09838 1.71216 1.14149 1.68262 1.18644 1.68262H13.5593V11.2175H1.01695V1.96305ZM5.25424 21.3132C4.95254 21.3132 4.65761 21.1651 4.40676 20.8878C4.1559 20.6105 3.96039 20.2163 3.84493 19.7551C3.72947 19.2939 3.69927 18.7864 3.75812 18.2968C3.81698 17.8072 3.96227 17.3575 4.1756 17.0046C4.38893 16.6516 4.66074 16.4112 4.95664 16.3138C5.25254 16.2164 5.55926 16.2664 5.83799 16.4574C6.11673 16.6485 6.35497 16.972 6.52258 17.387C6.6902 17.8021 6.77966 18.2901 6.77966 18.7892C6.77966 19.4586 6.61895 20.1006 6.33287 20.5739C6.0468 21.0473 5.6588 21.3132 5.25424 21.3132ZM12.2542 17.9479H7.74576C7.62906 16.997 7.31726 16.1421 6.86318 15.528C6.40911 14.9139 5.84069 14.5785 5.25424 14.5785C4.66779 14.5785 4.09937 14.9139 3.64529 15.528C3.19122 16.1421 2.87941 16.997 2.76271 17.9479H1.18644C1.14149 17.9479 1.09838 17.9184 1.06659 17.8658C1.03481 17.8132 1.01695 17.7419 1.01695 17.6675V12.9001H13.5593V15.0707C13.2271 15.3615 12.9378 15.7703 12.7122 16.2677C12.4866 16.7651 12.3302 17.3389 12.2542 17.9479ZM14.7458 21.3132C14.4441 21.3132 14.1491 21.1651 13.8983 20.8878C13.6474 20.6105 13.4519 20.2163 13.3365 19.7551C13.221 19.2939 13.1908 18.7864 13.2497 18.2968C13.3085 17.8072 13.4538 17.3575 13.6671 17.0046C13.8805 16.6516 14.1523 16.4112 14.4482 16.3138C14.7441 16.2164 15.0508 16.2664 15.3295 16.4574C15.6083 16.6485 15.8465 16.972 16.0141 17.387C16.1817 17.8021 16.2712 18.2901 16.2712 18.7892C16.2712 19.4586 16.1105 20.1006 15.8244 20.5739C15.5383 21.0473 15.1503 21.3132 14.7458 21.3132ZM18.9831 17.6675C18.9831 17.7419 18.9652 17.8132 18.9334 17.8658C18.9016 17.9184 18.8585 17.9479 18.8136 17.9479H17.2373C17.1193 16.9984 16.8071 16.1452 16.3532 15.5322C15.8994 14.9191 15.3316 14.5838 14.7458 14.5827C14.689 14.5827 14.6322 14.5827 14.5763 14.5925V9.53484H18.9831V17.6675Z"
                                fill="#ADB4CB" />
                        </svg>
                    </span>
                    Data expedisi
                </a>
                <a class="nav-link offcanvas-link {{ $title === 'Audio & Teks Notif' ? 'active' : '' }} d-flex align-items-center gap-3 col-12"
                    href="/superadmin/notif">
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
                    <a href="/login" class="btn btn-blue px-4">Keluar</a>
                </div>
            </div>
        </div>
    </div>
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
