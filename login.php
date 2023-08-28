<?php
//session_start();
if (!empty($_SESSION['username_kuliner'])) {
    header("Location: home");
}
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.115.4">
    <title>Sistem Informasi Kuliner</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />



    <!-- <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }
    </style>
 -->

    <!-- Custom styles for this template -->
    <link href="asset-css/login.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4" style="background-color:#fef2e7">
    
    <main class="form-signin w-100 m-auto">
        <div class="d-flex justify-content-center">
        <img class="rounded-circle" src="asset/img/logo_sim_kuliner.png" alt="Logo Sim Kuliner" width="150" height="150">
        </div>
    
        <form class="needs-validation" novalidate action="proses/proses_login.php" method="POST">
            <h1 class="h3 mb-3 fw-normal text-center"><b>Login</b></h1>

            <div class="form-floating">
                <input name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required style="background-color:#e3c9b4">
                <label for="floatingInput">Email address</label>
                <div class="invalid-feedback">
                    Masukan email yang benar.
                </div>
            </div>
            <div class="form-floating my-1">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required style="background-color:#e3c9b4">
                <label for="floatingPassword">Password</label>
                <div class="invalid-feedback">
                    Masukan password yang benar.
                </div>
            </div>

            <div class="form-check my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <button class="btn w-100 py-2" type="submit" name="submit_validate" value="abc" style="background-color:#e3c9b4; color:black ">Login</button>
        </form>
    </main>
    <svg class="bg-cover position-absolute bottom-0 start-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#e3c9b4" fill-opacity="0.9" d="M0,96L30,122.7C60,149,120,203,180,202.7C240,203,300,149,360,154.7C420,160,480,224,540,240C600,256,660,224,720,224C780,224,840,256,900,229.3C960,203,1020,117,1080,117.3C1140,117,1200,203,1260,202.7C1320,203,1380,117,1410,74.7L1440,32L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
            </svg>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>