<?php
// Include file koneksi.php
include '../../../koneksi.php';

// Ambil data yang dikirim melalui metode POST
$id_alat_keluar = $_POST['id_alat_keluar'];
$id_alat = $_POST['id_alat'];
$status = $_POST['status'];
$jumlah = $_POST['jumlah'];

// Query untuk mendapatkan jumlah stok alat dari tabel alat
$get_stok_alat_query = "SELECT jumlah FROM alat WHERE id_alat = '$id_alat'";
$result_get_stok_alat = mysqli_query($koneksi, $get_stok_alat_query);

if (!$result_get_stok_alat) {
    echo "error|Gagal mendapatkan stok alat";
    exit();
}

$row_stok_alat = mysqli_fetch_assoc($result_get_stok_alat);
$stok_alat = $row_stok_alat['jumlah'];

// Memeriksa apakah jumlah stok alat cukup
if ($stok_alat < $jumlah) {
    // Jika stok alat tidak mencukupi, kirim pesan kesalahan
    $nama_alat_query = mysqli_query($koneksi, "SELECT nama_alat FROM alat WHERE id_alat = '$id_alat'");
    $row = mysqli_fetch_assoc($nama_alat_query);
    $nama_alat = $row['nama_alat'];
    echo "Stok_alat_tidak_cukup|$nama_alat|$stok_alat";
    exit();
}

// Query untuk memperbarui data pada tabel alat_keluar
$update_query = "UPDATE alat_keluar SET status = 'Disetujui' WHERE id_alat_keluar = '$id_alat_keluar'";
$result_update = mysqli_query($koneksi, $update_query);

// Jika proses update berhasil
if ($result_update) {
    // Query untuk menambahkan jumlah ke tabel alat
    $update_alat_query = "UPDATE alat SET jumlah = jumlah - $jumlah WHERE id_alat = '$id_alat'";
    $result_update_alat = mysqli_query($koneksi, $update_alat_query);

    // Jika proses update pada tabel alat berhasil
    if ($result_update_alat) {
        echo "success|"; // Menyertakan pesan keberhasilan
        // Ambil nama alat dari tabel alat
        $nama_alat_query = mysqli_query($koneksi, "SELECT nama_alat FROM alat WHERE id_alat = '$id_alat'");
        $row = mysqli_fetch_assoc($nama_alat_query);
        echo $row['nama_alat']; // Mengirim nama alat sebagai respons
    } else {
        echo "error|Gagal menambahkan jumlah alat"; // Menyertakan pesan kesalahan
    }
} else {
    echo "error|Gagal memperbarui status alat"; // Menyertakan pesan kesalahan
}
