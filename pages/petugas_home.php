<?php
session_start();

// Periksa apakah sesi id_petugas telah ditetapkan
if (!isset($_SESSION['id_petugas'])) {
  // Jika tidak, redirect pengguna ke halaman login.php
  header("Location: ../login");
  exit; // Pastikan untuk keluar setelah melakukan redirect
}
// Jika sesi id_petugas telah ditetapkan, lanjutkan menampilkan konten halaman admin_home.php
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <title>
    Home petugas | Layanan Pengaduan Kominfo
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="petugas_home" target="_blank">
        <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold" style="color: #1c3669;">Layanan Pengaduan</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="../pages/petugas_home">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/petugas_pengaduan">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-notification-70 text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengaduan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/petugas_penanganan">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-settings text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Penanganan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/petugas_data">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-badge text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Petugas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/petugas_data_alat">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-box-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Alat</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/petugas_data_alat_pengadaan">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-cart text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengadaan Alat</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/petugas_data_alat_digunakan">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-briefcase-24 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Alat Yang Digunakan</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Akun Anda</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/petugas_profile">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link " href="../pages/petugas_chat">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-comments text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Chat</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link " href="../pages/petugas_logout">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-user-run text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Home</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Home</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Cari Data...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="petugas_profile" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Profile</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="../pages/petugas_home" style="text-decoration: none; color: inherit;">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Home</p>
                      <h5 class="font-weight-bolder">
                        6 Data
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                      <i class="ni ni-tv-2 text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                  <p class="mb-0 text-sm">
                    <span class="text-success font-weight-bolder">Home :</span>
                    informasi awal dari fitur aplikasi web
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="../pages/pelanggan_profile" style="text-decoration: none; color: inherit;">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Profile</p>
                      <h5 class="font-weight-bolder">
                        1 Data
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                      <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                  <p class="mb-0 text-sm">
                    <span class="text-success font-weight-bolder">Profile :</span>
                    informasi detail data pengguna pada aplikasi web
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="../pages/petugas_pengaduan" style="text-decoration: none; color: inherit;">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengaduan</p>
                      <?php
                      include '../koneksi.php';

                      // Query SQL untuk menghitung jumlah data dalam tabel pengaduan
                      $query_count = "SELECT COUNT(*) AS total FROM pengaduan";
                      $result_count = mysqli_query($koneksi, $query_count);

                      if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_data = $row_count['total'];

                        echo "<h5 class='font-weight-bolder'>$total_data Data</h5>";
                      } else {
                        echo "<h5 class='font-weight-bolder'>Error</h5>";
                      }

                      mysqli_close($koneksi);
                      ?>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                      <i class="ni ni-notification-70 text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                  <p class="mb-0 text-sm">
                    <span class="text-success font-weight-bolder">Pengaduan :</span>
                    data-data yang diadukan untuk di tinjau
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6">
          <a href="../pages/petugas_data" style="text-decoration: none; color: inherit;">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Petugas</p>
                      <?php
                      include '../koneksi.php';

                      // Query SQL untuk menghitung jumlah data dalam tabel petugas
                      $query_count_petugas = "SELECT COUNT(*) AS total_petugas FROM petugas";
                      $result_count_petugas = mysqli_query($koneksi, $query_count_petugas);

                      if ($result_count_petugas) {
                        $row_count_petugas = mysqli_fetch_assoc($result_count_petugas);
                        $total_data_petugas = $row_count_petugas['total_petugas'];

                        echo "<h5 class='font-weight-bolder'>$total_data_petugas Data</h5>";
                      } else {
                        echo "<h5 class='font-weight-bolder'>Error</h5>";
                      }

                      mysqli_close($koneksi);
                      ?>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                      <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                  <p class="mb-0 text-sm">
                    <span class="text-success font-weight-bolder">Petugas :</span>
                    data-data dari setiap petugas kominfo
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="../pages/petugas_penanganan" style="text-decoration: none; color: inherit;">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Penanganan</p>
                      <?php
                      include '../koneksi.php';

                      // Query SQL untuk menghitung jumlah data dalam tabel penanganan
                      $query_count_penanganan = "SELECT COUNT(*) AS total_penanganan FROM penanganan";
                      $result_count_penanganan = mysqli_query($koneksi, $query_count_penanganan);

                      if ($result_count_penanganan) {
                        $row_count_penanganan = mysqli_fetch_assoc($result_count_penanganan);
                        $total_data_penanganan = $row_count_penanganan['total_penanganan'];

                        echo "<h5 class='font-weight-bolder'>$total_data_penanganan Data</h5>";
                      } else {
                        echo "<h5 class='font-weight-bolder'>Error</h5>";
                      }

                      mysqli_close($koneksi);
                      ?>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                      <i class="ni ni-settings text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                  <p class="mb-0 text-sm">
                    <span class="text-success font-weight-bolder">Penanganan :</span>
                    data penanganan apa saja yang dilakukan
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="../pages/admin_data_alat" style="text-decoration: none; color: inherit;">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Alat</p>
                      <?php
                      include '../koneksi.php';

                      // Query SQL untuk menghitung jumlah data dalam tabel alat
                      $query_count_alat = "SELECT COUNT(*) AS total_alat FROM alat";
                      $result_count_alat = mysqli_query($koneksi, $query_count_alat);

                      if ($result_count_alat) {
                        $row_count_alat = mysqli_fetch_assoc($result_count_alat);
                        $total_data_alat = $row_count_alat['total_alat'];

                        echo "<h5 class='font-weight-bolder'>$total_data_alat Data</h5>";
                      } else {
                        echo "<h5 class='font-weight-bolder'>Error</h5>";
                      }

                      mysqli_close($koneksi);
                      ?>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                      <i class="ni ni-box-2 text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                  <p class="mb-0 text-sm">
                    <span class="text-success font-weight-bolder">Alat :</span>
                    informasi dari data alat alat yang ada dikominfo
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="../pages/admin_data_alat_pengadaan" style="text-decoration: none; color: inherit;">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengadaan</p>
                      <?php
                      include '../koneksi.php';

                      // Query SQL untuk menghitung jumlah data dalam tabel alat_tambah
                      $query_count_tambah = "SELECT COUNT(*) AS total_tambah FROM alat_tambah";
                      $result_count_tambah = mysqli_query($koneksi, $query_count_tambah);

                      if ($result_count_tambah) {
                        $row_count_tambah = mysqli_fetch_assoc($result_count_tambah);
                        $total_data_tambah = $row_count_tambah['total_tambah'];

                        echo "<h5 class='font-weight-bolder'>$total_data_tambah Data</h5>";
                      } else {
                        echo "<h5 class='font-weight-bolder'>Error</h5>";
                      }

                      mysqli_close($koneksi);
                      ?>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                      <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                  <p class="mb-0 text-sm">
                    <span class="text-success font-weight-bolder">Pengadaan :</span>
                    informasi pengadaan alat-alat yang akan digunakan petugas
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="../pages/admin_data_alat_penggunaan" style="text-decoration: none; color: inherit;">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Penggunaan Alat</p>
                      <?php
                      include '../koneksi.php';

                      // Query SQL untuk menghitung jumlah data dalam tabel alat_keluar
                      $query_count_penggunaan = "SELECT COUNT(*) AS total_penggunaan FROM alat_keluar";
                      $result_count_penggunaan = mysqli_query($koneksi, $query_count_penggunaan);

                      if ($result_count_penggunaan) {
                        $row_count_penggunaan = mysqli_fetch_assoc($result_count_penggunaan);
                        $total_data_penggunaan = $row_count_penggunaan['total_penggunaan'];

                        echo "<h5 class='font-weight-bolder'>$total_data_penggunaan Data</h5>";
                      } else {
                        echo "<h5 class='font-weight-bolder'>Error</h5>";
                      }

                      mysqli_close($koneksi);
                      ?>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                      <i class="ni ni-briefcase-24 text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                  <p class="mb-0 text-sm">
                    <span class="text-success font-weight-bolder">Penggunaan Alat :</span>
                    informasi alat-alat yang digunakan oleh petugas
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
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
      <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Konfigurasi Layanan</h5>
          <p>Silakan Pilih fitur yang sesuai.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Warna Sidebar</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Jenis Sidenav</h6>
          <p class="text-sm">Coba 2 Tipe sidenav ini.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">Putih</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Hitam</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">Anda juga dapat memilih warna navbar.</p>
        <!-- Navbar Fixed -->
        <div class="d-flex my-3">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>