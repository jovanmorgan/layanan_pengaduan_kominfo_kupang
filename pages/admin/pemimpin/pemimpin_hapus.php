<?php
include '../../../koneksi.php';

// Terima ID pemimpin yang akan dihapus dari formulir HTML
$id_pemimpin = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_pemimpin)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk menghapus data pemimpin berdasarkan ID
$query_delete_pemimpin = "DELETE FROM pemimpin WHERE id_pemimpin = '$id_pemimpin'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $query_delete_pemimpin)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
