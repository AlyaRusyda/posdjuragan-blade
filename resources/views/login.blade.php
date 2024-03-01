<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- font sojomaru --}}
    <link href='https://fonts.googleapis.com/css?family=Shojumaru' rel='stylesheet'>

    {{-- font suez one --}}
    <link href='https://fonts.googleapis.com/css?family=Suez One' rel='stylesheet'>

    {{-- font poopins --}}
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>


    {{-- link online font awesome version 6.4.2 --}}
    <script src="https://kit.fontawesome.com/3aff193c83.js" crossorigin="anonymous"></script>

    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <style>
        body,hr{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .input-with-underline {
            border: none;
            border-bottom: 1px solid #ced4da; /* Warna dan ketebalan sesuaikan dengan kebutuhan Anda */
            outline: none; /* Hilangkan border tambahan saat input aktif (focus) */
            box-shadow: none; /* Hilangkan shadow tambahan saat input aktif (focus) */
        }

        .icon{
            border: none;
            outline: none; /* Hilangkan border tambahan saat input aktif (focus) */
            box-shadow: none;

        }

        #main-content p  {
            font-size: 44px; /* Ukuran font standar untuk desktop */
        }

        .max-container {
            max-width: 1440px;
            margin: 0 auto;
        }

        .kata-pertama {
            font-size: 108.89px
        }

        .kata-kedua {
            font-size: 88.15px
        }

        /* CSS untuk ukuran layar sedang (tablet) (lg) */
        @media only screen and (max-width: 992px) {
            #main-content p {
                font-size: 36px; /* Ukuran font sedang untuk tablet */
            }

            .kata-pertama {
                font-size: 4rem;
            }

            .kata-kedua {
                font-size: .6rem;
            }
        }
        /* @media only screen and (max-width: 768px) and (max-width: 890px) {
            .kata-pertama {
               weight:250;
            }

            .kata-kedua {
                weight:250;
            }
        } */

        /* CSS untuk ukuran layar kecil (mobile) (md) */
        @media only screen and (max-width: 768px) {
            #main-content p {
                font-size: 32px; /* Ukuran font kecil untuk mobile */
            }
        }

        /* ukuran (sm) */
        @media only screen and (max-width: 576px) {
            .kata-pertama {
                font-size: 5rem;
            }

            .kata-kedua {
                font-size: .82rem;
            }
        }

    </style>
</head>

<body>
<div id="main-content" style="min-height: 100vh;" class="d-flex flex-column align-items-center justify-content-center position-relative">
    <div class="top position-absolute top-0" style="width: 100%; height: 30px; background-color: #0091FF;"></div>
    <div class="row d-flex justify-content-center align-items-center text-center max-container mt-4">
        <div class="col-md-6">
            <span style="font-family: 'Shojumaru'; weight:400; color:#0091FF;" class="kata-pertama">
            J<span style="font-family: 'Suez One'; weight:400; color:#0091FF;" class="kata-pertama">uragan</span></span>
            <img src="assets/img/gambar_perempuan_kerja.png"  alt="..." class="img-fluid" style="width: 510px">
        </div>

        <div class="col-md-6" style="font-family: 'Poppins';">
            <div class="m-4 p-4 text-start">
                <h1 class="pt-3" style="color:#454B4D; font-size: 44px;"><b>Selamat Datang!</b></h1>
                <p style="color:#5C6672; font-size: 20px; ">Silahkan masuk dan memulai harimu disini jangan lupa untuk berdoa dan semoga sukses</p>
                <form id="loginForm" action="/api/login" class="needs-validation" method="POST" novalidate>
                <form id="loginForm" action="/api/login" class="needs-validation" method="POST" novalidate>
                    @csrf
                    <div class="row d-flex justify-content-center py-3">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text bg-white icon" id="basic-addon1">@</span>
                                <input type="email" name="email" class="form-control input-with-underline py-2"
                                    id="email" placeholder="Masukkan email" required>
                                <div class="invalid-feedback ps-5">
                                    Masukkan email dengan benar!
                                </div>
                            </div>
                            <div class="input-group rounded my-3">
                                <span class="input-group-text bg-white icon" id="basic-addon2"><i
                                        class="fa-solid fa-lock"></i></span>
                                <input type="password" name="password"
                                    class="form-control input-with-underline py-2" id="password"
                                    placeholder="Masukkan password" required>
                                <button class="input-group-text bg-white input-with-underline"><i
                                    id="showPassword" class="fa-regular fa-eye"></i></button>
                                <div class="invalid-feedback ps-5">
                                    Masukkan password dengan benar!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check d-flex justify-content-between pb-3" style="font-size: 13px;">
                        <div>
                            <label class="form-check-label" for="flexCheckDefault">Ingat Aku</label>
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                        <a href="/password/reset">Lupa Password</a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary col-12">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <script>
        // Show Password
        const password = document.getElementById("password");
        const btn_show = document.getElementById("showPassword");
        btn_show.addEventListener("click", function() {
                if (password.type === "password") {
                    password.type = "text";
                    btn_show.classList.remove("fa-eye");
                    btn_show.classList.add("fa-eye-slash");
                } else {
                    password.type = "password";
                    btn_show.classList.remove("fa-eye-slash");
                    btn_show.classList.add("fa-eye");
                }
        });

        // Assuming you have a form with an ID of 'loginForm'
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Get the email and password from the form
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Send the login request to the server
            fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json', // Expect a JSON response
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password,
                    }),
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.access_token) {
                        // Store the token in localStorage or another secure place
                        localStorage.setItem('auth_token', data.access_token);
                        localStorage.setItem('user_id', data.user_id);
                        // Redirect to the indicated path
                        window.location.href = data.redirect_to;
                    } else {
                        // Handle errors, such as displaying a login failure message
                        console.error('Login failed:', data.message);
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>
