<?php
include '../../../koneksi.php';

// Terima ID alat yang akan dihapus dari formulir HTML
$id_alat = $_POST['id_alat'];
$id_alat_tambah = $_POST['id_alat_tambah'];

// Buat query SQL untuk mengambil status alat_tambah
$query_status_alat_tambah = "SELECT status, jumlah FROM alat_tambah WHERE id_alat_tambah = '$id_alat_tambah'";
$result_status_alat_tambah = mysqli_query($koneksi, $query_status_alat_tambah);

// Periksa apakah query berhasil dieksekusi
if ($result_status_alat_tambah) {
    $row_status_alat_tambah = mysqli_fetch_assoc($result_status_alat_tambah);
    $status_alat_tambah = $row_status_alat_tambah['status'];

    // Periksa apakah status alat_tambah sama dengan "Disetujui"
    if ($status_alat_tambah === "Disetujui") {
        // Ambil jumlah alat_tambah
        $jumlah_alat_tambah = $row_status_alat_tambah['jumlah'];

        // Query untuk menambahkan jumlah ke tabel alat
        $update_alat_query = "UPDATE alat SET jumlah = jumlah - $jumlah_alat_tambah WHERE id_alat = '$id_alat'";
        $result_update_alat = mysqli_query($koneksi, $update_alat_query);
        if (!$result_update_alat) {
            echo "error_update_alat";
            exit();
        }

        // Lakukan validasi data
        if (empty($id_alat_tambah)) {
            echo "data_tidak_lengkap";
            exit();
        }

        // Buat query SQL untuk menghapus data alat_tambah berdasarkan ID
        $query_delete_alat = "DELETE FROM alat_tambah WHERE id_alat_tambah = '$id_alat_tambah'";

        // Jalankan query untuk menghapus data
        if (mysqli_query($koneksi, $query_delete_alat)) {
            echo "success";
        } else {
            echo "error_delete_alat";
        }

        // Tutup koneksi ke database
        mysqli_close($koneksi);
        exit();
    } else {
        // Lakukan validasi data
        if (empty($id_alat_tambah)) {
            echo "data_tidak_lengkap";
            exit();
        }

        // Buat query SQL untuk menghapus data alat_tambah berdasarkan ID
        $query_delete_alat = "DELETE FROM alat_tambah WHERE id_alat_tambah = '$id_alat_tambah'";

        // Jalankan query untuk menghapus data
        if (mysqli_query($koneksi, $query_delete_alat)) {
            echo "success";
        } else {
            echo "error_delete_alat";
        }

        // Tutup koneksi ke database
        mysqli_close($koneksi);
        exit();
    }
} else {
    echo "error_fetch_status";
    exit();
}
