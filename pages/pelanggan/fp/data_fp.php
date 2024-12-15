<?php
include '../../../koneksi.php';

$id_pelanggan = $_POST['id_pelanggan'];
$nama_dinas = $_POST['nama_dinas'];
$username = $_POST['username'];
$nomor_telpon = $_POST['nomor_telpon'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];
$deskripsi = $_POST['deskripsi'];

if (empty($id_pelanggan) || empty($nama_dinas) || empty($nomor_telpon) || empty($alamat) || empty($deskripsi) || empty($username) || empty($password)) {
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
$check_query_pelanggan = "SELECT * FROM pelanggan WHERE username = '$username' AND id_pelanggan != '$id_pelanggan'";
$check_result_pelanggan = mysqli_query($koneksi, $check_query_pelanggan);

if (mysqli_num_rows($check_result_pelanggan) > 0) {
    // Jika username sudah ada di tabel pelanggan, kembalikan pesan error
    echo "data_username_sudah_ada";
    exit();
}

$query_update_petugas = "UPDATE pelanggan SET nama_dinas = '$nama_dinas', nomor_telpon = '$nomor_telpon', username = '$username', password = '$password', deskripsi = '$deskripsi', alamat = '$alamat' WHERE id_pelanggan = '$id_pelanggan'";

if (mysqli_query($koneksi, $query_update_petugas)) {
    echo "success";
} else {
    echo "error";
}

mysqli_close($koneksi);
