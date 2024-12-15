<?php
include '../../../koneksi.php';

// Terima ID pengaduan dan status baru dari permintaan AJAX
$id_pengaduan = $_POST['id_pengaduan'];
$status = $_POST['status'];

// Buat query SQL untuk memperbarui status pengaduan berdasarkan ID
$query = "UPDATE pengaduan SET status = '$status' WHERE id_pengaduan = '$id_pengaduan'";

// Jalankan query untuk memperbarui status
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
