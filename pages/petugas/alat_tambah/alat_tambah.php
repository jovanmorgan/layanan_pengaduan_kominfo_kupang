<?php
include '../../../koneksi.php';

// Terima data dari formulir HTML
$id_alat = $_POST['id_alat'];
$jumlah = $_POST['jumlah'];
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];
$waktu = $_POST['waktu'];

// Lakukan validasi data
if (empty($id_alat) || empty($jumlah) || empty($waktu) || empty($deskripsi) || empty($status)) {
    echo "data_tidak_lengkap";
    exit();
}

// Format waktu_pengaduan dan waktu_kunjuangan ke format yang diinginkan
$waktu_formatted = date('d-M-Y H:i', strtotime($waktu));

// Query SQL untuk mengambil nama_alat dari tabel alat berdasarkan id_alat
$query_nama_alat = "SELECT nama_alat FROM alat WHERE id_alat = '$id_alat'";
$result_nama_alat = mysqli_query($koneksi, $query_nama_alat);

// Check apakah query berhasil dieksekusi dan apakah nama alat ditemukan
if ($result_nama_alat && mysqli_num_rows($result_nama_alat) > 0) {
    $row_nama_alat = mysqli_fetch_assoc($result_nama_alat);
    $nama_alat = $row_nama_alat['nama_alat'];

    // Buat query SQL untuk menambahkan data alat ke dalam database
    $query = "INSERT INTO alat_tambah (id_alat, waktu, jumlah, deskripsi, status) 
            VALUES ('$id_alat', '$waktu_formatted', '$jumlah', '$deskripsi', '$status')";

    // Jalankan query
    if (mysqli_query($koneksi, $query)) {
        // Kirim pesan sukses bersama dengan nama alatnya
        echo "success|$nama_alat";
    } else {
        echo "error";
    }
} else {
    // Jika nama alat tidak ditemukan, kirim pesan error
    echo "Nama_alat_tidak_ditemukan";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
