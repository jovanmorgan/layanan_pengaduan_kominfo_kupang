<?php
include '../../../koneksi.php';

// Terima ID pemimpin yang akan dihapus dari formulir HTML
$id_pelanggan = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_pelanggan)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk menghapus data pelanggan berdasarkan ID
$query_delete_pelanggan = "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $query_delete_pelanggan)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
