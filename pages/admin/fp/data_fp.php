<?php
include '../../../koneksi.php';

$id_admin = $_POST['id_admin'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$deskripsi = $_POST['deskripsi'];

if (empty($id_admin) || empty($nama) || empty($username) || empty($password)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk mengecek apakah username sudah ada di tabel admin
$check_query = "SELECT * FROM admin WHERE username = '$username' AND id_admin != '$id_admin'";
$check_result = mysqli_query($koneksi, $check_query);

// Tambahkan logika untuk mengecek username di tabel pemimpin, pelanggan, dan petugas
if (mysqli_num_rows($check_result) > 0) {
    // Jika username sudah ada di tabel admin, kembalikan pesan error
    echo "data_username_sudah_ada";
    exit();
}

// Buat query SQL untuk mengecek apakah username sudah ada di tabel pemimpin kecuali $id_pemimpin
$check_query_pemimpin = "SELECT * FROM pemimpin WHERE username = '$username'";
$check_result_pemimpin = mysqli_query($koneksi, $check_query_pemimpin);

if (mysqli_num_rows($check_result_pemimpin) > 0) {
    // Jika username sudah ada di tabel pemimpin selain $id_pemimpin, kembalikan pesan error
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

$query_update_admin = "UPDATE admin SET nama = '$nama', username = '$username', password = '$password', deskripsi = '$deskripsi' WHERE id_admin = '$id_admin'";

if (mysqli_query($koneksi, $query_update_admin)) {
    echo "success";
} else {
    echo "error";
}

mysqli_close($koneksi);
