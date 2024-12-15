<?php
include '../../../koneksi.php';

// Terima ID alat yang akan dihapus dari formulir HTML
$id_alat = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_alat)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk menghapus data alat berdasarkan ID
$query_delete_alat = "DELETE FROM alat WHERE id_alat = '$id_alat'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $query_delete_alat)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
