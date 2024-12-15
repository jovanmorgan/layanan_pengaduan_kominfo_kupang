<?php
session_start();

// Periksa apakah sesi id_pemimpin telah ditetapkan
if (!isset($_SESSION['id_pelanggan'])) {
    // Jika tidak, redirect pengguna ke halaman login.php
    header("Location: ../../../login");
    exit; // Pastikan untuk keluar setelah melakukan redirect
}

include '../../../koneksi.php';

// Folder tempat menyimpan gambar
$target_dir = "gambar/";

// Mendapatkan nama file gambar
$image = $_POST['imageBase64'];

// Menyimpan gambar ke folder data_fp
list($type, $image) = explode(';', $image);
list(, $image)      = explode(',', $image);
$image = base64_decode($image);
$filename = uniqid() . '.png'; // Membuat nama unik untuk gambar
$file = $target_dir . $filename;
file_put_contents($file, $image);

// Mengambil nama foto profile sebelumnya
$id_pelanggan = $_SESSION['id_pelanggan'];
$select_query = "SELECT gambar FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
$select_result = mysqli_query($koneksi, $select_query);

// Jika foto profile sebelumnya ditemukan, hapus file tersebut
if (mysqli_num_rows($select_result) > 0) {
    $row = mysqli_fetch_assoc($select_result);
    $previous_image = $row['gambar'];
    $previous_file = $target_dir . $previous_image;
    if (file_exists($previous_file) && is_file($previous_file)) {
        unlink($previous_file); // Hapus file gambar sebelumnya jika ada dan merupakan file
    }
}

// Update nama gambar di tabel petugas berdasarkan id_pelanggan
$update_query = "UPDATE pelanggan SET gambar = '$filename' WHERE id_pelanggan = '$id_pelanggan'";
$update_result = mysqli_query($koneksi, $update_query);

if ($update_result) {
    // Berhasil menyimpan gambar dan update nama gambar di tabel admin
    echo "Gambar berhasil diupdate.";
} else {
    // Gagal melakukan update
    echo "Gagal mengupdate gambar.";
}

// Tutup koneksi database
mysqli_close($koneksi);
