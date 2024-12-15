<?php
include '../../../koneksi.php';

// Terima data dari formulir HTML
$nama_alat = $_POST['nama_alat'];
$jumlah = $_POST['jumlah'];
$deskripsi = $_POST['deskripsi'];
$waktu = $_POST['waktu'];

// Lakukan validasi data
if (empty($nama_alat) || empty($jumlah) || empty($deskripsi) || empty($waktu)) {
    echo "data_tidak_lengkap";
    exit();
}

// Format waktu_pengaduan dan waktu_kunjuangan ke format yang diinginkan
$waktu_formatted = date('d-M-Y H:i', strtotime($waktu));

// Buat query SQL untuk mengecek apakah nama_alat sudah ada di tabel alat
$check_query_alat = "SELECT * FROM alat WHERE nama_alat = '$nama_alat'";
$check_result_alat = mysqli_query($koneksi, $check_query_alat);

if (mysqli_num_rows($check_result_alat) > 0) {
    // Jika nama_alat sudah ada di tabel pelanggan, kembalikan pesan error
    echo "data_alat_sudah_ada";
    exit();
}

// Buat query SQL untuk menambahkan data alat ke dalam database
$query = "INSERT INTO alat (nama_alat, jumlah, waktu, deskripsi) 
        VALUES ('$nama_alat', '$jumlah', '$waktu_formatted', '$deskripsi')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success|$nama_alat";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
