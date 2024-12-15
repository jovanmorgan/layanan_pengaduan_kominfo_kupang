<?php
include '../../../koneksi.php';

// Terima data dari formulir HTML
$id_alat = $_POST['id_alat'];
$id_pengaduan = $_POST['id_pengaduan'];
$jumlah = $_POST['jumlah'];
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];
$waktu = $_POST['waktu'];

// Lakukan validasi data
if (empty($id_alat) || empty($id_pengaduan) || empty($jumlah) || empty($waktu) || empty($deskripsi) || empty($status)) {
    echo "data_tidak_lengkap";
    exit();
}

// Format waktu_pengaduan dan waktu_kunjungan ke format yang diinginkan
$waktu_formatted = date('d-M-Y H:i', strtotime($waktu));

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
        // Kurangi jumlah pada tabel alat
        $update_alat_query = "UPDATE alat SET jumlah = jumlah - $jumlah WHERE id_alat = '$id_alat'";
        $result_update_alat = mysqli_query($koneksi, $update_alat_query);

        if (!$result_update_alat) {
            echo "error_update_alat";
            exit();
        }

        // Buat query SQL untuk menambahkan data alat ke dalam database
        $query = "INSERT INTO alat_keluar (id_alat, id_pengaduan, waktu, jumlah, deskripsi, status) 
                VALUES ('$id_alat', '$id_pengaduan', '$waktu_formatted', '$jumlah', '$deskripsi', '$status')";

        // Jalankan query
        if (mysqli_query($koneksi, $query)) {
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

// Tutup koneksi ke database
mysqli_close($koneksi);
