<?php
session_start();
include 'koneksi.php';

function checkAndLogoutActiveSession($koneksi, $id_pelanggan)
{
    $query_check_active_session = "SELECT * FROM logged_in_pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $result_check_active_session = mysqli_query($koneksi, $query_check_active_session);

    if (mysqli_num_rows($result_check_active_session) > 0) {
        $query_delete_logged_in_pelanggan = "DELETE FROM logged_in_pelanggan WHERE id_pelanggan = '$id_pelanggan'";
        mysqli_query($koneksi, $query_delete_logged_in_pelanggan);
    }
}

if (isset($_SESSION['id_pelanggan'])) {
    $id_pelanggan = $_SESSION['id_pelanggan'];

    checkAndLogoutActiveSession($koneksi, $id_pelanggan);
    unset($_SESSION['id_pelanggan']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/logo.png">
    <title>Sign-in | Layanan Pengaduan kominfo</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
    <main class="main-content mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="
            background-image: url('assets/img/bg9.jpg');
            background-position: top;
        ">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Selamat Datang!</h1>
                        <p class="text-lead text-white">
                            Silakan login! Agar anda dapat mengakses layanan pengaduan kominfo
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Halaman Login</h5>
                        </div>
                        <div class="card-body">
                            <form action="proses_login.php" id="login" role="form">
                                <div class="mb-3">
                                    <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" aria-label="Email" />
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" aria-label="Password" />
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" name="rememberMe" />
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">
                                        Sign in
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        Titin Hormat.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        document.getElementById("login").addEventListener("submit", function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            var rememberMe = formData.get('rememberMe') === 'on';

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "proses_login.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = xhr.responseText;
                        var responseArray = response.split(':');
                        if (responseArray[0].trim() === "success") {
                            swal("Login berhasil!", "Selamat datang " + responseArray[1], "success");

                            setTimeout(function() {
                                switch (responseArray[2].trim()) {
                                    case "admin":
                                        window.location.href = "pages/admin_home";
                                        break;
                                    case "pelanggan":
                                        window.location.href = "pages/pelanggan_home";
                                        break;
                                    case "pemimpin":
                                        window.location.href = "pages/pemimpin_home";
                                        break;
                                    case "petugas":
                                        window.location.href = "pages/petugas_home";
                                        break;
                                    default:
                                        window.location.href = "index";
                                        break;
                                }
                            }, 2000);

                            if (rememberMe) {
                                var username = formData.get('username');
                                var password = formData.get('password');
                                document.cookie = "username=" + encodeURIComponent(username) + "; path=/";
                                document.cookie = "password=" + encodeURIComponent(password) + "; path=/";
                            }
                        } else if (responseArray[0].trim() === "error_password") {
                            swal("Error", "Password yang dimasukkan salah", "error");
                        } else if (responseArray[0].trim() === "error_username") {
                            swal("Error", "Username tidak ditemukan", "error");
                        } else if (responseArray[0].trim() === "error_max_logged_in") {
                            swal("Info", "Silakan login lagi nanti, server sudah penuh", "info");
                        } else if (responseArray[0].trim() === "akun_sedang_digunakan") {
                            swal("Info", "Akun Sedang Digunakan", "info");
                        } else {
                            swal("Error", "Terjadi kesalahan saat proses login", "error");
                        }
                    } else {
                        swal("Error", "Gagal", "error");
                    }
                }
            };
            xhr.onerror = function() {
                swal("Error", "Gagal melakukan request", "error");
            };
            xhr.send(formData);
        });
    </script>

    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf("Win") > -1;
        if (win && document.querySelector("#sidenav-scrollbar")) {
            var options = {
                damping: "0.5",
            };
            Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>