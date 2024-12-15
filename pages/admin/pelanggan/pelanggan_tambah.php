<?php
include '../../../koneksi.php';

// Terima data dari formulir HTML
$nama_dinas = $_POST['nama_dinas'];
$alamat = $_POST['alamat'];
$nomor_telpon = $_POST['nomor_telpon'];
$username = $_POST['username'];
$password = $_POST['password'];

// Lakukan validasi data
if (empty($nama_dinas) || empty($alamat) || empty($nomor_telpon) || empty($username) || empty($password)) {
    echo "data_tidak_lengkap";
    exit();
}

// Ganti "0" dengan "62" pada nomor telepon jika dimulai dengan "0"
if (substr($nomor_telpon, 0, 1) === '0') {
    $nomor_telpon = '62' . substr($nomor_telpon, 1);
}

// Buat query SQL untuk mengecek apakah username sudah ada di tabel admin
$check_query = "SELECT * FROM admin WHERE username = '$username'";
$check_result = mysqli_query($koneksi, $check_query);

// Tambahkan logika untuk mengecek username di tabel pemimpin, pelanggan, dan petugas
if (mysqli_num_rows($check_result) > 0) {
    // Jika username sudah ada di tabel admin, kembalikan pesan error
    echo "data_username_sudah_ada";
    exit();
}

// Buat query SQL untuk mengecek apakah username sudah ada di tabel pemimpin
$check_query_pemimpin = "SELECT * FROM pemimpin WHERE username = '$username'";
$check_result_pemimpin = mysqli_query($koneksi, $check_query_pemimpin);

if (mysqli_num_rows($check_result_pemimpin) > 0) {
    // Jika username sudah ada di tabel pemimpin, kembalikan pesan error
    echo "data_username_sudah_ada";
    exit();
}

// Buat query SQL untuk mengecek apakah username sudah ada di tabel petugas
$check_query_petugas = "SELECT * FROM petugas WHERE username = '$username'";
$check_result_petugas = mysqli_query($koneksi, $check_query_petugas);

if (mysqli_num_rows($check_result_petugas) > 0) {
    // Jika username sudah ada di tabel petugas, kembalikan pesan error
    echo "data_username_sudah_ada";
    exit();
}

// Buat query SQL untuk mengecek apakah username sudah ada di tabel pelanggan
$check_query_pelanggan = "SELECT * FROM pelanggan WHERE username = '$username'";
$check_result_pelanggan = mysqli_query($koneksi, $check_query_pelanggan);

if (mysqli_num_rows($check_result_pelanggan) > 0) {
    // Jika username sudah ada di tabel pelanggan, kembalikan pesan error
    echo "data_username_sudah_ada";
    exit();
}

// Buat query SQL untuk menambahkan data pemimpin ke dalam database
$query = "INSERT INTO pelanggan (nama_dinas, alamat, nomor_telpon, username, password) 
        VALUES ('$nama_dinas', '$alamat', '$nomor_telpon', '$username', '$password')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
