<?php
session_start();

// Periksa apakah sesi id_admin telah ditetapkan
if (!isset($_SESSION['id_admin'])) {
    // Jika tidak, redirect pengguna ke halaman login.php
    header("Location: ../login");
    exit; // Pastikan untuk keluar setelah melakukan redirect
}
// Jika sesi id_admin telah ditetapkan, lanjutkan menampilkan konten halaman admin_home.php
$id_admin = $_SESSION['id_admin'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <title>
        Pengaduan Admin | Layanan Pengaduan Kominfo
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
            <a class="navbar-brand m-0" href="../pages/admin_home" target="_blank">
                <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold" style="color: #1c3669;">Layanan Pengaduan</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../pages/admin_home">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../pages/admin_pengaduan">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-notification-70 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengaduan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/admin_data_pemimpin">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-badge text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Pemimpin</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/admin_data_petugas">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-badge text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Petugas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/admin_data_pelanggan">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-badge text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Pelanggan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/admin_data_penanganan">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-settings text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Penanganan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/admin_data_alat">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-box-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Alat</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="../pages/admin_data_alat_digunakan">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-briefcase-24 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Alat Yang Digunakan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/admin_laporan">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-chart-bar-32 text-danger text-lg opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan</span>
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
                    <a class="nav-link " href="../pages/admin_profile">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link " href="../pages/admin_chat">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-comments text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Chat</span>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link " href="../pages/admin_logout">
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
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Pengaduan</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Pengaduan</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <form action="" method="GET">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                <input type="text" name="search_query" class="form-control" placeholder="Cari Data...">
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="admin_profile" class="nav-link text-white font-weight-bold px-0">
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

                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <script>
            function openEditStatus(id_admin, id_pelanggan, id_pengaduan) {
                // Isi data ke dalam form edit
                document.getElementById('ediid_pengaduan').value = id_pengaduan;
                document.getElementById('ediid_pengaduan2').value = id_pengaduan;
                document.getElementById('id_admin').value = id_admin;
                document.getElementById('id_pelanggan').value = id_pelanggan;
                $('#statusModal').modal('show');
            }

            function openKirimPesan() {
                // Isi data ke dalam form edit
                $('#statusModal').modal('hide');
                $('#ModalKirimPesan').modal('show');
            }
        </script>
        <!-- Modal -->
        <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="statusModalLabel">Pilih Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; background-color: #ffffff; font-size: 35px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <form method="POST">
                            <input type="text" class="d-none" name="id_pengaduan" id="ediid_pengaduan">
                            <button class="btn btn-info" onclick="updateStatus('Disetujui')">Setujui</button>
                            <button class="btn btn-danger" onclick="updateStatus('Dibatalkan')">Batalkan</button>
                        </form>
                        <button class="btn btn-secondary" onclick="openKirimPesan()">Tunda & Beritau Pelanggan <i class="fas fa-comments text-white text-sm opacity-10"></i> </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal kirim pesan -->
        <div class="modal fade" id="ModalKirimPesan" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalKirimPesanLabel">Kirim Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; background-color: #ffffff; font-size: 35px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="KirimPesan" action="admin/pengaduan/kirim_pesan.php" method="POST">
                        <div class="modal-body">
                            <input type="text" class="d-none" name="id_pengaduan" id="ediid_pengaduan2">
                            <input type="text" class="d-none" name="id_admin" id="id_admin">
                            <input type="text" class="d-none" name="id_pelanggan" id="id_pelanggan">
                            <input type="text" class="d-none" name="status" id="status" value="Ditunda">
                            <div class="form-group">
                                <label for="topik">Topik</label>
                                <input type="text" class="form-control" name="topik" id="topik" placeholder="Masukkan nama dinas">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Pesan Kepada Pelanggan</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h3 class="text-center">Data Pengaduan Pelanggan</h3>
                            <hr class="horizontal dark">
                            <div class="dropdown">
                                <script>
                                    function toggleDropdown() {
                                        var dropdown = document.getElementById("jumlahDropdown");
                                        dropdown.classList.toggle("show");
                                    }

                                    // Tutup dropdown saat mengklik di luar dropdown
                                    window.onclick = function(event) {
                                        if (!event.target.matches('.btn')) {
                                            var dropdowns = document.getElementsByClassName("dropdown-menu");
                                            for (var i = 0; i < dropdowns.length; i++) {
                                                var openDropdown = dropdowns[i];
                                                if (openDropdown.classList.contains('show')) {
                                                    openDropdown.classList.remove('show');
                                                }
                                            }
                                        }
                                    }
                                </script>

                                <!-- Tombol jumlah -->
                                <button class="btn btn-success dropdown-toggle font-weight-bold text-xs" type="button" onclick="toggleDropdown()">
                                    JUMLAH
                                </button>
                                <ul class="dropdown-menu" id="jumlahDropdown">
                                    <li><a class="dropdown-item" href="#" onclick="selectOption(10)">Lihat 10 Data</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectOption(50)">Lihat 50 Data</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectOption(100)">Lihat 100 Data</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectOption('semua')">Lihat Semua Data</a></li>
                                </ul>
                                <!-- Tombol pengaduan_export -->
                                <a href="admin/pengaduan/pengaduan_export" target="_blank" class="btn btn-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                    EXPORT
                                </a>
                                <style>
                                    .btn-with-badge {
                                        position: relative;
                                        display: inline-block;
                                    }

                                    .btn-with-badge .badge {
                                        position: absolute;
                                        top: -10px;
                                        right: -10px;
                                        background-color: red;
                                        color: white;
                                        border-radius: 50%;
                                        padding: 5px 8px;
                                        font-size: 12px;
                                    }
                                </style>
                                <!-- Hidden input for status -->
                                <input type="hidden" id="dataStatus" name="status" value="dilihat">
                                <?php
                                // Include file koneksi
                                include '../koneksi.php';

                                // Query untuk mengambil jumlah data dengan status_admin "baru"
                                $sql = "SELECT COUNT(*) as jumlah_baru FROM topik_chat WHERE status_admin = 'baru'";
                                $result = $koneksi->query($sql);

                                // Ambil hasil query
                                $jumlah_baru = 0;
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $jumlah_baru = $row['jumlah_baru'];
                                }

                                $koneksi->close();
                                ?>
                                <div class="btn-with-badge">
                                    <?php if ($jumlah_baru > 0) : ?>
                                        <button onclick="kirimDataStatus()" class="btn btn-info font-weight-bold text-xs">
                                            LIHAT CHAT KE PELANGGAN <i class="fas fa-comments text-white text-sm opacity-10"></i>
                                        </button>
                                        <span class="badge"><?php echo $jumlah_baru; ?></span>
                                    <?php else : ?>
                                        <a href="admin_chat" class="btn btn-info font-weight-bold text-xs">
                                            LIHAT CHAT KE PELANGGAN <i class="fas fa-comments text-white text-sm opacity-10"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nomor</th>
                                            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Dinas</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Alamat Dinas</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nomor Telpon</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Waktu Pengaduan</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jenis Pengaduan</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Rincian Pengaduan</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Waktu Kunjungan</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Gambar</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Konfirmasi Pelanggan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../koneksi.php';

                                        // Ambil kata kunci pencarian dari URL jika ada
                                        $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';

                                        // Tentukan jumlah data yang akan ditampilkan, default adalah semua data
                                        $limit = isset($_GET['jumlah']) ? $_GET['jumlah'] : 'semua';

                                        $query = "SELECT p.*, wk.waktu_kunjungan AS waktu_kunjungan
                                        FROM pengaduan p
                                        LEFT JOIN penanganan wk ON p.id_pengaduan = wk.id_pengaduan";

                                        // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan nama pemimpin atau nomor telepon dengan kata kunci
                                        if (!empty($search_query)) {
                                            $query .= " WHERE (nama_dinas LIKE '%$search_query%' OR alamat_dinas LIKE '%$search_query%' OR nomor_telpon LIKE '%$search_query%' OR waktu_pengaduan LIKE '%$search_query%' OR jenis_pengaduan LIKE '%$search_query%' OR rincian_pengaduan LIKE '%$search_query%')";
                                        }

                                        // Balik urutan data untuk memunculkan yang paling baru di atas
                                        $query .= " ORDER BY id_pengaduan DESC";

                                        // Jika jumlah data yang dipilih adalah bukan semua, tambahkan limit ke query
                                        if ($limit != 'semua') {
                                            $query .= " LIMIT $limit";
                                        }

                                        $result = mysqli_query($koneksi, $query);

                                        // Cek apakah query berhasil dieksekusi
                                        if (!$result) {
                                            // Jika query gagal, tampilkan pesan kesalahan
                                            echo "Gagal mengeksekusi query: " . mysqli_error($koneksi);
                                            exit();
                                        }

                                        // Cek apakah ada hasil dari query
                                        if (mysqli_num_rows($result) > 0) {
                                            // Variabel untuk menyimpan nomor urut
                                            $counter = 1;

                                            // Lakukan iterasi untuk menampilkan setiap baris data dalam tabel
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $status = $row['status'];

                                                if ($status == 'Selesai') {
                                                    $status_class = 'btn-success disabled';
                                                } elseif ($status == 'Disetujui') {
                                                    $status_class = 'btn-info';
                                                } elseif ($status == 'Dibatalkan') {
                                                    $status_class = 'btn-danger';
                                                } elseif ($status == 'Terkirim') {
                                                    $status_class = 'btn-success';
                                                    // Mengubah status menjadi "Baru" jika status sebelumnya adalah "Terkirim"
                                                    $status = 'Baru';
                                                } elseif ($status == 'Dikerjakan') {
                                                    $status_class = 'btn-warning disabled';
                                                } else {
                                                    $status_class = 'btn-secondary';
                                                }

                                                $konfirmasi_pelanggan = $row['konfirmasi_pelanggan'];

                                                if ($konfirmasi_pelanggan == 'Telah Dikonfirmasi') {
                                                    $konfirmasi_class = 'bg-gradient-success';
                                                } else {
                                                    $konfirmasi_class = 'bg-gradient-danger';
                                                }

                                                $waktu_kunjungan = $row['waktu_kunjungan'];
                                                // Menampilkan data ke dalam tabel HTML
                                                echo "<tr>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'> $counter </span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['nama_dinas'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['alamat_dinas'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['nomor_telpon'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['waktu_pengaduan'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['jenis_pengaduan'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['rincian_pengaduan'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . ($waktu_kunjungan ?: 'Belum Ada Kunjungan!') . "</span></td>";
                                                echo "<td><img src='pelanggan/pengaduan/" . $row['gambar'] . "' alt='Kover Image' style='max-width: 100px;'></td>";
                                                echo "<td class='align-middle text-center'>
                                            <button class='btn $status_class btn-sm mt-3' onclick='openEditStatus(
                                                \"" . $id_admin . "\",
                                                \"" . $row['id_pelanggan'] . "\",
                                                \"" . $row['id_pengaduan'] . "\"
                                            )'>" . ($status ?: 'Dikerjakan') . "</button>
                                            </td>";
                                                echo "<td class='align-middle text-center text-sm text-bold'><span class='$konfirmasi_class' style='padding: 2px 10px 5px 10px; color: white; border-radius: 7px; font-size: 13px;'>" . ($konfirmasi_pelanggan ?: 'Belum Dikonfirmasi') . "</span></td>";
                                                echo "</tr>";

                                                // Increment nomor urut
                                                $counter++;
                                            }
                                        } else {
                                            // Jika tidak ada hasil dari query, tampilkan pesan bahwa tidak ada data yang tersedia
                                            echo '<br><tr><td colspan="12" style="text-align: center;">Tidak ada data yang tersedia. Cobalah memasukkan kata kunci yang benar atau tambahkan data.</td></tr>';
                                        }

                                        // Tutup koneksi ke database
                                        mysqli_close($koneksi);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
    <!--=============== LOADING ===============-->
    <div class="loading">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <style>
        .loading {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            /* Mula-mula, loading disembunyikan */
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* Menempatkan loading di atas elemen lain */
            height: 100vh;
            width: 100vw;
            background-color: rgba(255, 255, 255, 0.932);
            /* Menambahkan latar belakang semi transparan */
        }

        .circle {
            width: 20px;
            height: 20px;
            background-color: #0650a5;
            border-radius: 50%;
            margin: 0 10px;
            animation: bounce 0.5s infinite alternate;
        }

        .circle:nth-child(2) {
            animation-delay: 0.2s;
        }

        .circle:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes bounce {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-20px);
            }
        }
    </style>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Tambahkan kode JavaScript untuk mengirim data form tanpa mengarahkan ke halaman lain -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-Km4P/A4C3CfpzPnqGk3sD4cxsMkSCGS2U5x8bC+v6j8=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        const loding = document.querySelector('.loading');

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('KirimPesan').addEventListener('submit', function(event) {
                event.preventDefault(); // Menghentikan aksi default form submit

                var form = this;
                var formData = new FormData(form);

                // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                loding.style.display = 'flex';

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'admin/pengaduan/kirim_pesan.php', true);
                xhr.onload = function() {
                    // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                    loding.style.display = 'none';

                    if (xhr.status === 200) {
                        // Tangani respons dari admin/pengaduan/kirim_pesan.php di sini
                        var response = xhr.responseText;
                        if (response === 'success') {
                            $('#ModalKirimPesan').modal('hide');
                            swal({
                                title: "Berhasil!",
                                text: "Data berhasil terkirim kepelanggan",
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        text: "OK",
                                        value: true,
                                        visible: true,
                                        className: "",
                                        closeModal: true
                                    }
                                }
                            }).then((value) => {
                                if (value) {
                                    // Reload halaman setelah menekan tombol OK
                                    window.location.reload();
                                }
                            });

                            // Jika pengguna tidak menekan tombol OK dalam beberapa detik, halaman akan tetap diperbarui
                            setTimeout(function() {
                                window.location.reload();
                            }, 5000); // Waktu dalam milidetik sebelum pembaruan otomatis
                        } else if (response === 'data_tidak_lengkap') {
                            swal("Error", "Data yang anda masukan belum lengkap", "error");
                        } else {
                            swal("Error", "Gagal menambahkan data Pengaduan", "error");
                        }
                    } else {
                        swal("Error", "Terjadi kesalahan saat mengirim data", "error");
                    }
                };
                xhr.send(formData);
            });
        });

        function updateStatus(status) {
            var id_pengaduan = document.getElementById('ediid_pengaduan').value;
            var formData = new FormData();
            formData.append('id_pengaduan', id_pengaduan);
            formData.append('status', status);

            // Menampilkan loading sebelum mengirimkan permintaan AJAX
            loding.style.display = 'flex';

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'admin/pengaduan/pengaduan_status.php', true);
            xhr.onload = function() {
                // Menyembunyikan loading setelah permintaan AJAX selesai
                loding.style.display = 'none';

                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response === 'success') {
                        $('#statusModal').modal('hide');
                        swal({
                            title: "Berhasil!",
                            text: "Status pengaduan berhasil diperbarui",
                            icon: "success",
                            buttons: {
                                confirm: {
                                    text: "OK",
                                    value: true,
                                    visible: true,
                                    className: "",
                                    closeModal: true
                                }
                            }
                        });
                    }
                    if (responseStatus === 'success') {
                        $('#statusModal').modal('hide');
                        swal({
                            title: "Berhasil!",
                            text: "Status pengaduan berhasil diperbarui",
                            icon: "success",
                            buttons: {
                                confirm: {
                                    text: "OK",
                                    value: true,
                                    visible: true,
                                    className: "",
                                    closeModal: true
                                }
                            }
                        }).then((value) => {
                            if (value) {
                                // Reload halaman setelah menekan tombol OK
                                window.location.reload();
                            }
                        });

                        // Jika pengguna tidak menekan tombol OK dalam beberapa detik, halaman akan tetap diperbarui
                        setTimeout(function() {
                            window.location.reload();
                        }, 3000); // Waktu dalam milidetik sebelum pembaruan otomatis
                    } else {
                        swal("Error", "Gagal mengedit status pengaduan", "error");
                    }
                } else {
                    swal("Error", "Terjadi kesalahan saat mengirim data", "error");
                }
            };
            xhr.send(formData);
        }

        function kirimDataStatus() {
            const statusValue = document.getElementById('dataStatus').value;
            const data = new FormData();
            data.append('dataStatus', statusValue);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'admin/chat/update_status.php', true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);

                    if (response.message === 'Status updated successfully') {
                        window.location.href = 'admin_chat.php';
                    } else {
                        swal("Error", "Gagal memperbarui status", "error");
                    }
                } else {
                    swal("Error", "Terjadi kesalahan saat mengirim data", "error");
                }
            };

            xhr.send(data);
        }


        // Tutup dropdown saat mengklik di luar dropdown
        window.onclick = function(event) {
            if (!event.target.matches('.btn')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        function selectOption(jumlah) {
            // Redirect ke halaman dengan parameter jumlah data yang dipilih
            window.location.href = "admin_pengaduan?jumlah=" + jumlah;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-Km4P/A4C3CfpzPnqGk3sD4cxsMkSCGS2U5x8bC+v6j8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-Km4P/A4C3CfpzPnqGk3sD4cxsMkSCGS2U5x8bC+v6j8=" crossorigin="anonymous"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>