<?php
include '../../../koneksi.php';

// Terima data dari formulir HTML
$id_alat_keluar = $_POST['id_alat_keluar'];
$id_alat = $_POST['id_alat'];
$id_pengaduan = $_POST['id_pengaduan'];
$jumlah = $_POST['jumlah'];
$deskripsi = $_POST['deskripsi'];
$waktu = $_POST['waktu'];

// Lakukan validasi data
if (empty($id_alat_keluar) || empty($id_alat) || empty($id_pengaduan) || empty($jumlah) || empty($deskripsi) || empty($waktu)) {
    echo "data_tidak_lengkap";
    exit();
}

// Format waktu_pengaduan dan waktu_kunjuangan ke format yang diinginkan
$waktu_formatted = date('d-M-Y H:i', strtotime($waktu));

// Query SQL untuk mengambil jumlah sebelumnya dari tabel alat_tambah
$query_jumlah_sebelumnya = "SELECT jumlah FROM alat_keluar WHERE id_alat_keluar = '$id_alat_keluar'";
$result_jumlah_sebelumnya = mysqli_query($koneksi, $query_jumlah_sebelumnya);

// Periksa apakah query berhasil dieksekusi
if ($result_jumlah_sebelumnya) {
    $row_jumlah_sebelumnya = mysqli_fetch_assoc($result_jumlah_sebelumnya);
    $jumlah_sebelumnya = $row_jumlah_sebelumnya['jumlah'];

    // Bandingkan jumlah baru dengan jumlah sebelumnya
    if ($jumlah > $jumlah_sebelumnya) {
        // Jika jumlah baru lebih besar dari jumlah sebelumnya
        // Kurangi jumlah sebelumnya dari jumlah baru
        $selisih = $jumlah - $jumlah_sebelumnya;

        // Update jumlah di tabel alat
        $query_update_alat = "UPDATE alat SET jumlah = jumlah - $selisih WHERE id_alat = '$id_alat'";
        $result_update_alat = mysqli_query($koneksi, $query_update_alat);

        if (!$result_update_alat) {
            echo "error_update_alat";
            exit();
        }
    } elseif ($jumlah < $jumlah_sebelumnya) {
        // Jika jumlah baru lebih kecil dari jumlah sebelumnya
        // Kurangi jumlah dari tabel alat
        $selisih = $jumlah_sebelumnya - $jumlah;

        // Update jumlah di tabel alat
        $query_update_alat = "UPDATE alat SET jumlah = jumlah + $selisih WHERE id_alat = '$id_alat'";
        $result_update_alat = mysqli_query($koneksi, $query_update_alat);

        if (!$result_update_alat) {
            echo "error_update_alat";
            exit();
        }
    }

    // Query SQL untuk mengambil data jumlah alat dari tabel alat
    $query_stok = "SELECT jumlah FROM alat WHERE id_alat = '$id_alat'";
    $result_stok = mysqli_query($koneksi, $query_stok);

    // Check apakah query berhasil dieksekusi
    if ($result_stok) {
        $row_stok = mysqli_fetch_assoc($result_stok);
        $stok_alat = $row_stok['jumlah'];

        // Query SQL untuk mengambil nama alat dari tabel alat
        $query_alat = "SELECT nama_alat FROM alat WHERE id_alat = '$id_alat'";
        $result_alat = mysqli_query($koneksi, $query_alat);

        // Check apakah query berhasil dieksekusi
        if ($result_alat) {
            $row_alat = mysqli_fetch_assoc($result_alat);
            $nama_alat = $row_alat['nama_alat'];
        } else {
            echo "error";
            exit();
        }

        // Lakukan pengecekan stok alat
        if ($stok_alat >= $jumlah) {
            // Buat query SQL untuk menambahkan data alat ke dalam database
            $query_update_alat_keluar = "UPDATE alat_keluar SET id_alat = '$id_alat', id_pengaduan = '$id_pengaduan', jumlah = '$jumlah', deskripsi = '$deskripsi', waktu = '$waktu_formatted' WHERE id_alat_keluar = '$id_alat_keluar'";

            // Jalankan query
            if (mysqli_query($koneksi, $query_update_alat_keluar)) {
                echo "success|$nama_alat";
            } else {
                echo "error";
            }
        } else {
            echo "Stok_alat_tidak_cukup|$nama_alat|$stok_alat";
        }
    } else {
        echo "error";
    }
} else {
    echo "error_fetch_jumlah";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
