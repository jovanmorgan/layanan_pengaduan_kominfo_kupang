<?php
include '../../../koneksi.php';

// Terima ID penanganan yang akan dihapus dari formulir HTML
$id_penanganan = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_penanganan)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk mendapatkan path gambar yang akan dihapus
$query_get_gambar = "SELECT gambar FROM penanganan WHERE id_penanganan = '$id_penanganan'";
$result = mysqli_query($koneksi, $query_get_gambar);
$row = mysqli_fetch_assoc($result);
$gambar_to_delete = $row['gambar'];

// Buat query SQL untuk memeriksa apakah ada data lain yang menggunakan file gambar yang akan dihapus
$query_check_gambar = "SELECT COUNT(*) AS total FROM penanganan WHERE gambar = '$gambar_to_delete'";
$result_check = mysqli_query($koneksi, $query_check_gambar);
$row_check = mysqli_fetch_assoc($result_check);
$total_pengguna_gambar = $row_check['total'];

// Jika tidak ada data lain yang menggunakan file gambar, hapus gambar
if ($total_pengguna_gambar <= 1) {
    // Hapus file gambar dari folder
    unlink($gambar_to_delete);
}

// Buat query SQL untuk menghapus data penanganan berdasarkan ID
$query_delete_penanganan = "DELETE FROM penanganan WHERE id_penanganan = '$id_penanganan'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $query_delete_penanganan)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
