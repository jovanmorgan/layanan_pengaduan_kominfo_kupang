<?php
session_start();

// Periksa apakah sesi id_pelanggan telah ditetapkan
if (!isset($_SESSION['id_pelanggan'])) {
    // Jika tidak, redirect pengguna ke halaman login.php
    header("Location: ../login");
    exit; // Pastikan untuk keluar setelah melakukan redirect
}

$id_pelanggan = $_SESSION['id_pelanggan'];

// Jika sesi id_pelanggan telah ditetapkan, lanjutkan menampilkan konten halaman admin_home.php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <title>
        Pengaduan Pelanggan | Layanan Pengaduan Kominfo
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
            <a class="navbar-brand m-0" href="pelanggan_home" target="_blank">
                <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold" style="color: #1c3669;">Layanan Pengaduan</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="../pages/pelanggan_home">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../pages/pelanggan_pengaduan">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-notification-70 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengaduan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/pelanggan_profile">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link " href="../pages/pelanggan_chat">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-comments text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Chat</span>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link " href="../pages/pelanggan_logout">
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
                            <a href="pelanggan_profile" class="nav-link text-white font-weight-bold px-0">
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
        <div class="modal fade" id="ModalPengaduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengaduan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" border: none; background-color: #ffffff; font-size: 35px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="tambahPengaduan" action="pelanggan/pengaduan/pengaduan_tambah.php">
                        <div class="modal-body">
                            <!-- Isi form untuk menambah data -->
                            <input type="text" class="d-none" name="id_pelanggan" id="id_pelanggan" value="<?php echo $id_pelanggan; ?>">
                            <input type="text" class="d-none" name="status" id="status" value="Terkirim">
                            <?php
                            // Buat koneksi ke database
                            include '../koneksi.php';

                            // Query untuk mengambil nama_dinas berdasarkan id_pelanggan dari sesi
                            $query = "SELECT nama_dinas, alamat, nomor_telpon FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";

                            // Eksekusi query
                            $result = mysqli_query($koneksi, $query);

                            // Periksa apakah query berhasil dieksekusi dan mengembalikan hasil
                            if ($result && mysqli_num_rows($result) > 0) {
                                // Ambil data nama_dinas dari hasil query
                                $row = mysqli_fetch_assoc($result);
                                $datanama_dinas = $row['nama_dinas'];
                                $dataalamat_dinas = $row['alamat'];
                                $datanomor_telpon = $row['nomor_telpon'];
                            } else {
                                // Jika query tidak mengembalikan hasil, set nilai $datanama_dinas menjadi string kosong
                                $datanama_dinas = '';
                                $dataalamat_dinas = '';
                                $datanomor_telpon = '';
                            }

                            // Tutup koneksi ke database
                            mysqli_close($koneksi);
                            ?>

                            <div class="form-group">
                                <label for="nama_dinas">Nama Dinas</label>
                                <input type="text" class="form-control" name="nama_dinas" id="nama_dinas" placeholder="Masukkan nama dinas" value="<?php echo $datanama_dinas; ?>">
                            </div>

                            <div class="form-group">
                                <label for="alamat_dinas">Alamat Dinas:</label>
                                <textarea class="form-control" id="alamat_dinas" name="alamat_dinas"><?php echo $dataalamat_dinas; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nomor_telpon">Nomor Telepon</label>
                                <input type="number" class="form-control" name="nomor_telpon" id="nomor_telpon" value="<?php echo $datanomor_telpon; ?>" placeholder="Masukkan nomor telepon">
                            </div>
                            <div class="form-group">
                                <label for="waktu_pengaduan">Waktu Pengaduan</label>
                                <input type="datetime-local" class="form-control" name="waktu_pengaduan" id="waktu_pengaduan" placeholder="Masukkan waktu pengaduan">
                            </div>
                            <div class="form-group">
                                <label for="jenis_pengaduan">Jenis Pengaduan</label>
                                <select class="form-select" name="jenis_pengaduan" id="jenis_pengaduan">
                                    <option selected disabled>Pilih Jenis Pengaduan</option>
                                    <option value="Sinyal internet tidak terbaca">Sinyal internet tidak terbaca</option>
                                    <option value="Koneksi internet lambat">Koneksi internet lambat</option>
                                    <option value="Router/GPON tidak menyala">Router/GPON tidak menyala</option>
                                    <option value="Koneksi internet terputus">Koneksi internet terputus</option>
                                    <option value="Kabel internet putus">Kabel internet putus</option>
                                    <option value="Pemasangan baru">Pemasangan baru</option>
                                    <option value="Penambahan bandwith internet">Penambahan bandwith internet</option>
                                    <option value="Pindah perangkat Router/GPON">Pindah perangkat Router/GPON</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="rincian_pengaduan">Rincian Pengaduan</label>
                                <textarea class="form-control" id="rincian_pengaduan" name="rincian_pengaduan"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kover">Data Gambar :</label>
                                <input type="file" class="form-control-file d-none" id="kover" name="gambar" onchange="previewImage(this, 'koverPreview')" accept="image/*">
                                <label class="btn btn-primary" for="kover">Pilih Gambar</label>
                            </div>

                            <div class="card" id="koverPreview" style="display: none;">
                                <img class="card-img-top" id="koverImage" src="#" alt="Kover Image">
                            </div>
                            <script>
                                function previewImage(input, previewId) {
                                    var preview = document.getElementById(previewId);
                                    var image = document.getElementById('koverImage');
                                    var file = input.files[0];
                                    var fileType = file.type;

                                    if (fileType.match('image.*')) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function(e) {
                                                image.src = e.target.result;
                                                preview.style.display = 'block';
                                            }

                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            image.src = '#';
                                            preview.style.display = 'none';
                                        }
                                    }
                                }
                            </script>
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
        <div class="modal fade" id="EditModalPengaduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pengaduan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" border: none; background-color: #ffffff; font-size: 35px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editPengaduan" action="admin/pengaduan/pengaduan_edit.php">
                        <div class="modal-body">
                            <!-- Isi form untuk menambah data -->
                            <input type="text" class="d-none" name="id_pengaduan" id="ediid_pengaduan">
                            <input type="text" class="d-none" name="id_pelanggan" id="editid_pelanggan" value="<?php echo $id_pelanggan; ?>">

                            <div class="form-group">
                                <label for="nama_dinas">Nama Dinas</label>
                                <input type="text" class="form-control" name="nama_dinas" id="editnama_dinas" placeholder="Masukkan nama dinas">
                            </div>
                            <div class="form-group">
                                <label for="alamat_dinas">Alamat Dinas:</label>
                                <textarea class="form-control" id="editalamat_dinas" name="alamat_dinas"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nomor_telpon">Nomor Telepon</label>
                                <input type="number" class="form-control" name="nomor_telpon" id="editnomor_telpon" placeholder="Masukkan nomor telepon">
                            </div>
                            <div class="form-group">
                                <label for="waktu_pengaduan">Waktu Pengaduan</label>
                                <input type="datetime-local" class="form-control" name="waktu_pengaduan" id="editwaktu_pengaduan" placeholder="Masukkan waktu pengaduan">
                            </div>
                            <div class="form-group">
                                <label for="jenis_pengaduan">Jenis Pengaduan</label>
                                <select class="form-select" name="jenis_pengaduan" id="editjenis_pengaduan">
                                    <option selected disabled>Pilih Jenis Pengaduan</option>
                                    <option value="Sinyal internet tidak terbaca">Sinyal internet tidak terbaca</option>
                                    <option value="Koneksi internet lambat">Koneksi internet lambat</option>
                                    <option value="Router/GPON tidak menyala">Router/GPON tidak menyala</option>
                                    <option value="Koneksi internet terputus">Koneksi internet terputus</option>
                                    <option value="Kabel internet putus">Kabel internet putus</option>
                                    <option value="Pemasangan baru">Pemasangan baru</option>
                                    <option value="Penambahan bandwith internet">Penambahan bandwith internet</option>
                                    <option value="Pindah perangkat Router/GPON">Pindah perangkat Router/GPON</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="rincian_pengaduan">Rincian Pengaduan</label>
                                <textarea class="form-control" id="editrincian_pengaduan" name="rincian_pengaduan"></textarea>
                            </div>
                            <!-- Hidden input untuk menyimpan nama file kover dan video yang ada di server -->
                            <input type="hidden" id="existingKover" name="existingKover">

                            <!-- Data Kover -->
                            <div class="form-group">
                                <label for="kover">Data Kover:</label>
                                <input type="file" class="form-control-file d-none" id="editKover" name="gambar" onchange="previewImageAndSetExisting(this, 'koverPreview')" accept="image/*">
                                <label class="btn btn-primary" for="editKover">Pilih Gambar</label>
                            </div>

                            <!-- Preview Kover -->
                            <div class="card" id="editkoverPreview" style="display: none;">
                                <img class="card-img-top" id="editkoverImage" src="#" alt="Kover Image">
                            </div>
                            <script>
                                function openEditModal(id_pengaduan, nama_dinas, alamat_dinas, nomor_telpon, waktu_pengaduan, jenis_pengaduan, rincian_pengaduan, gambar) {
                                    // Isi data ke dalam form edit

                                    document.getElementById('ediid_pengaduan').value = id_pengaduan;
                                    document.getElementById('editnama_dinas').value = nama_dinas;
                                    document.getElementById('editalamat_dinas').value = alamat_dinas;
                                    document.getElementById('editnomor_telpon').value = nomor_telpon;
                                    document.getElementById('editwaktu_pengaduan').value = waktu_pengaduan;
                                    document.getElementById('editjenis_pengaduan').value = jenis_pengaduan;
                                    document.getElementById('editrincian_pengaduan').value = rincian_pengaduan;
                                    document.getElementById('existingKover').value = gambar;

                                    // Menampilkan preview gambar jika ada
                                    if (gambar !== '') {
                                        var koverPreview = document.getElementById('editkoverPreview');
                                        var koverImage = document.getElementById('editkoverImage');
                                        koverImage.src = 'pelanggan/pengaduan/' + gambar;
                                        koverPreview.style.display = 'block';
                                    }

                                    $('#EditModalPengaduan').modal('show');
                                }

                                function previewImageAndSetExisting(input, previewId) {
                                    var preview = document.getElementById(previewId);
                                    var image = document.getElementById('editkoverImage');
                                    var file = input.files[0];
                                    var fileType = file.type;

                                    // Set nilai dari hidden input dengan nama file kover yang baru dipilih
                                    document.getElementById('existingKover').value = file.name;

                                    if (fileType.match('image.*')) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function(e) {
                                                image.src = e.target.result;
                                                preview.style.display = 'block';
                                            }

                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            image.src = '#';
                                            preview.style.display = 'none';
                                        }
                                    } else {
                                        $.notify({
                                            icon: "tim-icons icon-bell-55",
                                            message: "Mohon pilih file gambar.",
                                        }, {
                                            type: 'danger',
                                            timer: 3000,
                                            placement: {
                                                from: 'top',
                                                align: 'center'
                                            }
                                        });
                                        input.value = '';
                                    }
                                }
                            </script>
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
                                <!-- Tombol tambah -->
                                <button class="btn btn-primary font-weight-bold text-xs" data-toggle="modal" data-target="#ModalPengaduan">
                                    TAMBAH
                                </button>
                                <!-- Tombol pengaduan_export -->
                                <a href="pelanggan/pengaduan/pengaduan_export" target="_blank" class="btn btn-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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

                                // Query untuk mengambil jumlah data dengan status_pelanggan "baru"
                                $sql = "SELECT COUNT(*) as jumlah_baru FROM topik_chat WHERE status_pelanggan = 'baru' AND id_pelanggan = ?";
                                $stmt = $koneksi->prepare($sql);
                                $stmt->bind_param("i", $id_pelanggan);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                // Ambil hasil query
                                $jumlah_baru = 0;
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $jumlah_baru = $row['jumlah_baru'];
                                }

                                $stmt->close();
                                $koneksi->close();
                                ?>
                                <div class="btn-with-badge">
                                    <?php if ($jumlah_baru > 0) : ?>
                                        <button onclick="kirimDataStatus()" class="btn btn-info font-weight-bold text-xs">
                                            LIHAT CHAT KE ADMIN <i class="fas fa-comments text-white text-sm opacity-10"></i>
                                        </button>
                                        <span class="badge"><?php echo $jumlah_baru; ?></span>
                                    <?php else : ?>
                                        <a href="pelanggan_chat" class="btn btn-info font-weight-bold text-xs">
                                            LIHAT CHAT KE ADMIN <i class="fas fa-comments text-white text-sm opacity-10"></i>
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
                                                Status</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Konfirmasi Pelanggan</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Gambar</th>
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

                                        // Query SQL untuk mengambil data dari tabel pengaduan sesuai dengan jumlah yang dipilih
                                        $query = "SELECT p.*, wk.waktu_kunjungan AS waktu_kunjungan
            FROM pengaduan p
            LEFT JOIN penanganan wk ON p.id_pengaduan = wk.id_pengaduan
            WHERE p.id_pelanggan = $id_pelanggan"; // Klausa WHERE tetap disimpan di sini

                                        // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan nama pemimpin atau nomor telepon dengan kata kunci
                                        if (!empty($search_query)) {
                                            // Jika ada kata kunci pencarian, tambahkan klausa WHERE
                                            $query .= " AND (nama_dinas LIKE '%$search_query%' OR alamat_dinas LIKE '%$search_query%' OR nomor_telpon LIKE '%$search_query%' OR waktu_pengaduan LIKE '%$search_query%' OR jenis_pengaduan LIKE '%$search_query%' OR rincian_pengaduan LIKE '%$search_query%')";
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
                                                    $status_class = 'bg-gradient-success';
                                                } elseif ($status == 'Disetujui') {
                                                    $status_class = 'bg-gradient-info';
                                                } elseif ($status == 'Dibatalkan') {
                                                    $status_class = 'bg-gradient-danger';
                                                } elseif ($status == 'Terkirim') {
                                                    $status_class = 'bg-gradient-primary';
                                                } elseif ($status == 'Dikerjakan') {
                                                    $status_class = 'bg-gradient-warning';
                                                } else {
                                                    $status_class = 'bg-gradient-secondary';
                                                }

                                                // Misalnya $waktu_pengaduan adalah data waktu pengaduan dari database
                                                $waktu_pengaduan_database = $row['waktu_pengaduan'];

                                                // Ubah format tanggal dari "27-Mar-2024 00:16" menjadi "2024-03-27T00:16"
                                                $waktu_pengaduan_input = date('Y-m-d\TH:i', strtotime($waktu_pengaduan_database));

                                                $waktu_kunjungan = $row['waktu_kunjungan'];

                                                // Tambahkan kondisi untuk menampilkan status "Telah Dikerjakan" jika status adalah "Dikerjakan" atau "Selesai"
                                                echo "<tr>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'> $counter </span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['nama_dinas'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['alamat_dinas'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['nomor_telpon'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['waktu_pengaduan'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['jenis_pengaduan'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['rincian_pengaduan'] . "</span></td>";
                                                echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . ($waktu_kunjungan ?: 'Belum Ada Kunjungan!') . "</span></td>";
                                                echo "<td class='align-middle text-center text-sm text-bold'><span class='$status_class' style='padding: 2px 10px 5px 10px; color: white; border-radius: 7px; font-size: 13px;'>" . ($status ?: 'Terkirim') . "</span></td>";
                                                // Tampilkan status "Telah Dikerjakan" jika status adalah "Dikerjakan" atau "Selesai"
                                                echo "<td class='align-middle text-center'>";
                                                if ($row['konfirmasi_pelanggan'] == 'Telah Dikonfirmasi') {
                                                    // Jika konfirmasi_pelanggan = 'Telah Dikonfirmasi', atur tombol menjadi btn-success dan teksnya menjadi 'Telah Dikonfirmasi'
                                                    echo "<button class='btn btn-success btn-sm mt-3' disabled>Telah Dikonfirmasi</button>";
                                                } else {
                                                    // Jika konfirmasi_pelanggan bukan 'Telah Dikonfirmasi', tampilkan tombol untuk melakukan konfirmasi
                                                    echo "<button class='btn " . (($status == 'Dikerjakan' || $status == 'Selesai') ? 'btn-info' : 'btn-danger disabled') . " btn-sm mt-3' onclick='KonfirmasiPelanggan(
                                                        \"" . $row['id_pengaduan'] . "\"
                                                    )'>" . (($status == 'Dikerjakan' || $status == 'Selesai') ? 'Konfirmasi Telah Dikerjakan' : ($row['konfirmasi_pelanggan'] ?: 'Kegiatan Belum Dikerjakan')) . "</button>";
                                                }
                                                echo "</td>";
                                                echo "<td><img src='pelanggan/pengaduan/" . $row['gambar'] . "' alt='Kover Image' style='max-width: 100px;'></td>";
                                                echo "<td class='align-middle text-center'>
            <button class='btn btn-primary btn-sm mt-3' onclick='openEditModal(
                \"" . $row['id_pengaduan'] . "\",
                \"" . $row['nama_dinas'] . "\",
                \"" . $row['alamat_dinas'] . "\",
                \"" . $row['nomor_telpon'] . "\",
                \"" . $waktu_pengaduan_input . "\",
                \"" . $row['jenis_pengaduan'] . "\",
                \"" . $row['rincian_pengaduan'] . "\",
                \"" . $row['gambar'] . "\"
            )'>Edit</button>
        </td>";
                                                echo "<td class='align-middle text-center'>
            <button class='btn btn-danger btn-sm mt-3' onclick='deleteVideo(\"" . $row['id_pengaduan'] . "\")'>Hapus</button>
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
            document.getElementById('tambahPengaduan').addEventListener('submit', function(event) {
                event.preventDefault(); // Menghentikan aksi default form submit

                var form = this;
                var formData = new FormData(form);

                // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                loding.style.display = 'flex';

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'pelanggan/pengaduan/pengaduan_tambah.php', true);
                xhr.onload = function() {
                    // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                    loding.style.display = 'none';

                    if (xhr.status === 200) {
                        // Tangani respons dari admin/pengaduan/pengaduan_tambah.php di sini
                        var response = xhr.responseText;
                        if (response === 'success') {
                            $('#ModalPengaduan').modal('hide');
                            swal({
                                title: "Berhasil!",
                                text: "Data pengaduan berhasil ditambahkan",
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
                        } else if (response === 'gambar_kosong') {
                            swal("Error", "Data gambar tidak ada silakan menambah data gambar", "error");
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

        // logika untuk mengedit data data pemimpin
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('editPengaduan').addEventListener('submit', function(event) {
                event.preventDefault(); // Menghentikan aksi default form submit

                var form = this;
                var formData = new FormData(form);
                // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                loding.style.display = 'flex';

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'pelanggan/pengaduan/pengaduan_edit.php', true);
                xhr.onload = function() {

                    // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                    loding.style.display = 'none';

                    if (xhr.status === 200) {
                        // Tangani respons dari admin/pengaduan/pengaduan_tambah.php di sini
                        var response = xhr.responseText;
                        if (response === 'success') {
                            $('#EditModalPengaduan').modal('hide');
                            swal({
                                title: "Berhasil!",
                                text: "Data pengaduan berhasil diedit",
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
                            swal("Error", "Gagal mengedit data pengaduan", "error");
                        }
                    } else {
                        swal("Error", "Terjadi kesalahan saat mengirim data", "error");
                    }
                };
                xhr.send(formData);
            });
        });

        function deleteVideo(id) {
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

                        xhr.open('POST', 'pelanggan/pengaduan/pengaduan_hapus.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onload = function() {

                            // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                            loding.style.display = 'none';

                            if (xhr.status === 200) {
                                var response = xhr.responseText;
                                if (response === 'success') {
                                    swal("Sukses!", "Data pengaduan berhasil dihapus.", "success")
                                        .then(() => {
                                            // Refresh halaman setelah penghapusan berhasil
                                            window.location.reload();
                                        });
                                } else {
                                    swal("Error", "Gagal menghapus data pengaduan.", "error");
                                }
                            } else {
                                swal("Error", "Terjadi kesalahan saat mengirim data.", "error");
                            }
                        };
                        xhr.send("id=" + id);
                    } else {
                        // Jika pengguna membatalkan penghapusan
                        swal("Penghapusan dibatalkan", {
                            icon: "info",
                        });
                    }
                });
        }

        function KonfirmasiPelanggan(id_pengaduan) {
            swal({
                title: "Konfirmasi Pekerjaan?",
                text: "Setelah dikonfirmasi, Data tidak dapat dikembalikan!",
                icon: "info",
                buttons: ["Batal", "Ya, Konfirmasi!"],
                dangerMode: false,
            }).then((willStatus) => {
                if (willStatus) {
                    // Jika pengguna mengonfirmasi
                    var xhr = new XMLHttpRequest();
                    var loding = document.querySelector('.loading'); // Mendapatkan elemen loading

                    // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                    loding.style.display = 'flex';

                    xhr.open('POST', 'admin/konfirmasi/konfirmasi.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                        loding.style.display = 'none';

                        if (xhr.status === 200) {
                            var response = xhr.responseText;
                            if (response.startsWith('success')) {
                                var responseData = response.split('|');
                                var namaDataPengaduan = responseData[1];
                                swal({
                                    title: "Berhasil!",
                                    text: "Data " + namaDataPengaduan + " berhasil dikonfirmasi",
                                    icon: "success"
                                }).then((value) => {
                                    if (value) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                swal("Error", "Gagal mengonfirmasi data ini.", "error");
                            }
                        } else {
                            swal("Error", "Terjadi kesalahan saat mengonfirmasi data.", "error");
                        }
                    };
                    xhr.send("id_pengaduan=" + id_pengaduan);
                } else {
                    // Jika pengguna membatalkan
                    swal("Konfirmasi dibatalkan", "", "info");
                }
            });
        }

        function kirimDataStatus() {
            const statusValue = document.getElementById('dataStatus').value;
            const data = new FormData();
            data.append('dataStatus', statusValue);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'pelanggan/chat/update_status.php', true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);

                    if (response.message === 'Status updated successfully') {
                        window.location.href = 'pelanggan_chat.php';
                    } else {
                        swal("Error", "Gagal memperbarui status", "error");
                    }
                } else {
                    swal("Error", "Terjadi kesalahan saat mengirim data", "error");
                }
            };

            xhr.send(data);
        }

        function selectOption(jumlah) {
            // Redirect ke halaman dengan parameter jumlah data yang dipilih
            window.location.href = "pelanggan_pengaduan?jumlah=" + jumlah;
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