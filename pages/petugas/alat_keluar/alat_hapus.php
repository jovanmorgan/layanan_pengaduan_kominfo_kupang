<?php
include '../../../koneksi.php';

// Terima ID alat yang akan dihapus dari formulir HTML
$id_alat_keluar = $_POST['id_alat_keluar'];

// Buat query SQL untuk mengambil data alat_keluar
$query_alat_keluar = "SELECT * FROM alat_keluar WHERE id_alat_keluar = '$id_alat_keluar'";
$result_alat_keluar = mysqli_query($koneksi, $query_alat_keluar);

// Periksa apakah query berhasil dieksekusi
if ($result_alat_keluar) {
    $row_alat_keluar = mysqli_fetch_assoc($result_alat_keluar);
    $id_alat = $row_alat_keluar['id_alat'];
    $jumlah = $row_alat_keluar['jumlah'];

    // Query untuk menambahkan jumlah ke tabel alat
    $update_alat_query = "UPDATE alat SET jumlah = jumlah + $jumlah WHERE ida_lat = '$id_alat'";
    $result_update_alat = mysqli_query($koneksi, $update_alat_query);

    if ($result_update_alat) {
        // Buat query SQL untuk menghapus data alat_keluar berdasarkan ID
        $query_delete_alat = "DELETE FROM alat_keluar WHERE id_alat_keluar = '$id_alat_keluar'";

        // Jalankan query untuk menghapus data
        if (mysqli_query($koneksi, $query_delete_alat)) {
            echo "success";
        } else {
            echo "error_delete_alat";
        }
    } else {
        echo "error_update_alat";
    }
} else {
    echo "error_fetch_alat_keluar";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
