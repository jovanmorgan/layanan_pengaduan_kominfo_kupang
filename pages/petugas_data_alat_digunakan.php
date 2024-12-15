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
        Alat Digunakan petugas | Layanan Pengaduan Kominfo
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
                    <a class="nav-link " href="../pages/petugas_home">
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
                    <a class="nav-link active" href="../pages/petugas_data_alat_digunakan">
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
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Alat Yang Digunakan</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Alat Yang Digunakan</h6>
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
        <!-- Modal -->
        <div class="modal fade" id="modalAlatDigunakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alat Digunakan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" border: none; background-color: #ffffff; font-size: 35px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="tambahAlatDigunakan" action="petugas/alat_keluar/alat_tambah.php">
                        <div class="modal-body">
                            <!-- Isi form untuk menambah data -->
                            <input type="text" class="d-none" name="status" id="status" value="Terkirim">
                            <div class="form-group">
                                <label for="id_alat">Nama Alat:</label>
                                <select class="form-select" name="id_alat" id="id_alat">
                                    <option value="" selected disabled>Pilih Nama Alat</option>
                                    <?php
                                    // Buat koneksi ke database
                                    include '../koneksi.php';

                                    // Query untuk mengambil data dari tabel alat
                                    $query = "SELECT id_alat, nama_alat, jumlah FROM alat";
                                    // Balik urutan data untuk memunculkan yang paling baru di atas
                                    $query .= " ORDER BY id_alat DESC";
                                    // Eksekusi query
                                    $result = mysqli_query($koneksi, $query);

                                    // Periksa apakah query berhasil dieksekusi
                                    if ($result) {
                                        // Loop untuk menampilkan opsi nama petugas
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='{$row['id_alat']}' >{$row['nama_alat']} (Stok {$row['jumlah']})</option>";
                                        }

                                        // Bebaskan memori hasil query
                                        mysqli_free_result($result);
                                    } else {
                                        echo "<option disabled>Tidak ada data petugas</option>";
                                    }

                                    // Tutup koneksi ke database
                                    mysqli_close($koneksi);
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_pengaduan">Nama Dinas Yang Menggunakan Alat :</label>
                                <select class="form-select" name="id_pengaduan" id="id_pengaduan">
                                    <option value="" selected disabled>Pilih Nama Dinas Yang Menggunakan Alat</option>
                                    <?php
                                    // Buat koneksi ke database
                                    include '../koneksi.php';

                                    // Query untuk mengambil data dari tabel pengaduan
                                    $query = "SELECT id_pengaduan, nama_dinas, jenis_pengaduan FROM pengaduan";
                                    // Balik urutan data untuk memunculkan yang paling baru di atas
                                    $query .= " ORDER BY id_pengaduan DESC";
                                    // Eksekusi query
                                    $result = mysqli_query($koneksi, $query);

                                    // Periksa apakah query berhasil dieksekusi
                                    if ($result) {
                                        // Loop untuk menampilkan opsi nama petugas
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='{$row['id_pengaduan']}' >{$row['nama_dinas']} (Kendalah : {$row['jenis_pengaduan']})</option>";
                                        }

                                        // Bebaskan memori hasil query
                                        mysqli_free_result($result);
                                    } else {
                                        echo "<option disabled>Tidak ada data petugas</option>";
                                    }

                                    // Tutup koneksi ke database
                                    mysqli_close($koneksi);
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="waktu">Waktu Pengaduan</label>
                                <input type="datetime-local" class="form-control" name="waktu" id="waktu" placeholder="Masukkan waktu meminta pengdaan alat">
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah :</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan jumlah alat">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi :</label>
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

        <!--Edit Modal -->
        <div class="modal fade" id="editModalAlatDigunakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Alat Digunakan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" border: none; background-color: #ffffff; font-size: 35px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editAlatDigunakan" action="petugas/alat_keluar/alat_edit.php">
                        <div class="modal-body">
                            <!-- Isi form untuk menambah data -->
                            <input type="text" class="d-none" name="id_alat_keluar" id="id_alat_keluar">
                            <div class="form-group">
                                <label for="id_alat">Nama Alat:</label>
                                <select class="form-select" name="id_alat" id="editid_alat">
                                    <option value="" selected disabled>Pilih Nama Alat</option>
                                    <?php
                                    // Buat koneksi ke database
                                    include '../koneksi.php';

                                    // Query untuk mengambil data dari tabel alat
                                    $query = "SELECT id_alat, nama_alat, jumlah FROM alat";
                                    // Balik urutan data untuk memunculkan yang paling baru di atas
                                    $query .= " ORDER BY id_alat DESC";
                                    // Eksekusi query
                                    $result = mysqli_query($koneksi, $query);

                                    // Periksa apakah query berhasil dieksekusi
                                    if ($result) {
                                        // Loop untuk menampilkan opsi nama petugas
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='{$row['id_alat']}' >{$row['nama_alat']} (Stok {$row['jumlah']})</option>";
                                        }

                                        // Bebaskan memori hasil query
                                        mysqli_free_result($result);
                                    } else {
                                        echo "<option disabled>Tidak ada data petugas</option>";
                                    }

                                    // Tutup koneksi ke database
                                    mysqli_close($koneksi);
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_pengaduan">Nama Dinas Yang Menggunakan Alat :</label>
                                <select class="form-select" name="id_pengaduan" id="editid_pengaduan">
                                    <option value="" selected disabled>Pilih Nama Dinas Yang Menggunakan Alat</option>
                                    <?php
                                    // Buat koneksi ke database
                                    include '../koneksi.php';

                                    // Query untuk mengambil data dari tabel pengaduan
                                    $query = "SELECT id_pengaduan, nama_dinas, jenis_pengaduan FROM pengaduan";
                                    // Balik urutan data untuk memunculkan yang paling baru di atas
                                    $query .= " ORDER BY id_pengaduan DESC";
                                    // Eksekusi query
                                    $result = mysqli_query($koneksi, $query);

                                    // Periksa apakah query berhasil dieksekusi
                                    if ($result) {
                                        // Loop untuk menampilkan opsi nama petugas
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='{$row['id_pengaduan']}' >{$row['nama_dinas']} (Kendalah : {$row['jenis_pengaduan']})</option>";
                                        }

                                        // Bebaskan memori hasil query
                                        mysqli_free_result($result);
                                    } else {
                                        echo "<option disabled>Tidak ada data petugas</option>";
                                    }

                                    // Tutup koneksi ke database
                                    mysqli_close($koneksi);
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="waktu">Waktu Pengaduan</label>
                                <input type="datetime-local" class="form-control" name="waktu" id="editwaktu" placeholder="Masukkan waktu meminta pengdaan alat">
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah :</label>
                                <input type="number" class="form-control" name="jumlah" id="editjumlah" placeholder="Masukkan jumlah alat">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi :</label>
                                <textarea class="form-control" id="editdeskripsi" name="deskripsi"></textarea>
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
                            <h3 class="text-center">Data Alat Digunakan</h3>
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
                                <!-- Tombol tambah -->
                                <button class="btn btn-primary font-weight-bold text-xs" data-toggle="modal" data-target="#modalAlatDigunakan">
                                    TAMBAH
                                </button>
                                <!-- Tombol alat_export -->
                                <a href="petugas/alat_keluar/alat_export" target="_blank" class="btn btn-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                    EXPORT
                                </a>
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
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Alat</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Dinas Yang Menggunakan Alat</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Kendala</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Waktu</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jumlah Penggunaan Alat</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Deskripsi</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Edit</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../koneksi.php';

                                        // Ambil kata kunci pencarian dari URL jika ada
                                        $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';

                                        // Tentukan jumlah data yang akan ditampilkan, default adalah semua data
                                        $limit = isset($_GET['jumlah']) ? $_GET['jumlah'] : 'semua';

                                        // Query SQL untuk mengambil data dari tabel alat_keluar, melakukan JOIN dengan tabel pengaduan untuk mendapatkan nama_dinas dan jenis_pengaduan, dan JOIN dengan tabel alat untuk mendapatkan nama alat
                                        $query = "SELECT at.*, p.nama_dinas, p.jenis_pengaduan, a.nama_alat 
                                                    FROM alat_keluar at 
                                                    LEFT JOIN pengaduan p ON at.id_pengaduan = p.id_pengaduan 
                                                    LEFT JOIN alat a ON at.id_alat = a.id_alat";


                                        // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan nama alat atau nomor telepon dengan kata kunci
                                        if (!empty($search_query)) {
                                            $query .= " WHERE a.nama_alat LIKE '%$search_query%' OR at.id_pengaduan LIKE '%$search_query%' OR at.jumlah LIKE '%$search_query%' OR at.deskripsi LIKE '%$search_query%' OR at.status LIKE '%$search_query%'";
                                        }

                                        // Balik urutan data untuk memunculkan yang paling baru di atas
                                        $query .= " ORDER BY at.id_alat_keluar DESC";
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

                                                // Misalnya $waktu adalah data waktu pengaduan dari database
                                                $waktu_database = $row['waktu'];

                                                // Ubah format tanggal dari "27-Mar-2024 00:16" menjadi "2024-03-27T00:16"
                                                $waktu_input = date('Y-m-d\TH:i', strtotime($waktu_database));

                                                echo "<tr>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'> $counter </span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['nama_alat'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['nama_dinas'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['jenis_pengaduan'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['waktu'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['jumlah'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['deskripsi'] . "</span></td>";
                                                echo "<td class='align-middle text-center'>
                                                <button class='btn btn-primary btn-sm mt-3' onclick='openEditModal(
                                                    \"" . $row['id_alat_keluar'] . "\",
                                                    \"" . $row['id_alat'] . "\",
                                                    \"" . $row['id_pengaduan'] . "\",
                                                    \"" . $waktu_input . "\",
                                                    \"" . $row['jumlah'] . "\",
                                                    \"" . $row['deskripsi'] . "\"
                                                )'>Edit</button>
                                            </td>";
                                                echo "<td class='align-middle text-center'>
                                            <button class='btn btn-danger btn-sm mt-3' onclick='hapus(
                                                \"" . $row['id_alat'] . "\",
                                                \"" . $row['id_alat_keluar'] . "\"
                                            )'>Hapus</button>
                                            </td>";
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
            document.getElementById('tambahAlatDigunakan').addEventListener('submit', function(event) {
                event.preventDefault(); // Menghentikan aksi default form submit

                var form = this;
                var formData = new FormData(form);

                // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                loding.style.display = 'flex';

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'petugas/alat_keluar/alat_tambah.php', true);
                xhr.onload = function() {
                    // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                    loding.style.display = 'none';

                    if (xhr.status === 200) {
                        // Tangani respons dari admin/alat/alat_tambah.php di sini
                        var response = xhr.responseText;
                        if (response.startsWith('success')) {
                            // Parsing respon untuk mendapatkan nama alat
                            var data = response.split('|');
                            var namaAlat = data[1];

                            $('#modalAlatDigunakan').modal('hide');
                            swal({
                                title: "Berhasil!",
                                text: "Data " + namaAlat + " berhasil ditambahkan",
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
                        } else if (response.startsWith('Stok_alat_tidak_cukup')) {
                            var data = response.split('|');
                            var namaAlat = data[1];
                            var stokAlat = data[2];
                            swal("Error", "Stok " + namaAlat + " tidak cukup, stok " + namaAlat + " tersisa: " + stokAlat, "error");
                        } else {
                            swal("Error", "Gagal menambahkan data alat", "error");
                        }
                    } else {
                        swal("Error", "Terjadi kesalahan saat mengirim data", "error");
                    }
                };
                xhr.send(formData);
            });
        });

        function openEditModal(id_alat_keluar, id_alat, id_pengaduan, waktu_input, jumlah, deskripsi) {
            // Isi data ke dalam form edit
            document.getElementById('id_alat_keluar').value = id_alat_keluar;
            document.getElementById('editid_alat').value = id_alat;
            document.getElementById('editid_pengaduan').value = id_pengaduan;
            document.getElementById('editwaktu').value = waktu_input;
            document.getElementById('editjumlah').value = jumlah;
            document.getElementById('editdeskripsi').value = deskripsi;
            $('#editModalAlatDigunakan').modal('show');
        }

        // logika untuk mengedit data data pemimpin
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('editAlatDigunakan').addEventListener('submit', function(event) {
                event.preventDefault(); // Menghentikan aksi default form submit

                var form = this;
                var formData = new FormData(form);
                // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                loding.style.display = 'flex';

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'petugas/alat_keluar/alat_edit.php', true);
                xhr.onload = function() {
                    // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                    loding.style.display = 'none';

                    if (xhr.status === 200) {
                        // Tangani respons dari admin/alat/alat_tambah.php di sini
                        var response = xhr.responseText;
                        if (response.startsWith('success')) {
                            // Parsing respon untuk mendapatkan nama alat
                            var data = response.split('|');
                            var namaAlat = data[1];

                            $('#editModalAlatDigunakan').modal('hide');
                            swal({
                                title: "Berhasil!",
                                text: "Data " + namaAlat + " berhasil diedit",
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
                        } else if (response === 'data_alat_sudah_ada') {
                            swal("Error", "Data alat sudah digunakan silakan masukan data alat lain", "error");
                        } else if (response.startsWith('Stok_alat_tidak_cukup')) {
                            var data = response.split('|');
                            var namaAlat = data[1];
                            var stokAlat = data[2];
                            swal("Error", "Stok " + namaAlat + " tidak cukup, stok " + namaAlat + " tersisa: " + stokAlat, "error");
                        } else {
                            swal("Error", "Gagal menambahkan data alat", "error");
                        }
                    } else {
                        swal("Error", "Terjadi kesalahan saat mengirim data", "error");
                    }
                };
                xhr.send(formData);
            });
        });

        function hapus(id_alat, id_alat_keluar) {
            swal({
                    title: "Apakah Anda yakin?",
                    text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ini!",
                    icon: "warning",
                    buttons: ["Batal", "Ya, hapus!"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // Jika pengguna mengonfirmasi untuk menghapus
                        var xhr = new XMLHttpRequest();

                        // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                        loding.style.display = 'flex';

                        xhr.open('POST', 'petugas/alat_keluar/alat_hapus.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onload = function() {

                            // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                            loding.style.display = 'none';

                            if (xhr.status === 200) {
                                var response = xhr.responseText;
                                if (response === 'success') {
                                    swal("Sukses!", "Data alat berhasil dihapus.", "success")
                                        .then(() => {
                                            // Refresh halaman setelah penghapusan berhasil
                                            window.location.reload();
                                        });
                                } else {
                                    swal("Error", "Gagal menghapus data alat.", "error");
                                }
                            } else {
                                swal("Error", "Terjadi kesalahan saat mengirim data.", "error");
                            }
                        };
                        xhr.send("id_alat=" + id_alat + "&id_alat_keluar=" + id_alat_keluar);
                    } else {
                        // Jika pengguna membatalkan penghapusan
                        swal("Penghapusan dibatalkan", {
                            icon: "info",
                        });
                    }
                });
        }

        function selectOption(jumlah) {
            // Redirect ke halaman dengan parameter jumlah data yang dipilih
            window.location.href = "petugas_data_alat_digunakan?jumlah=" + jumlah;
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