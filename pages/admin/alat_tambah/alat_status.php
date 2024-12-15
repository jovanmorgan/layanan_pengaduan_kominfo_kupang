<?php
// Include file koneksi.php
include '../../../koneksi.php';

// Ambil data yang dikirim melalui metode POST
$id_alat_tambah = $_POST['id_alat_tambah'];
$id_alat = $_POST['id_alat'];
$status = $_POST['status'];
$jumlah = $_POST['jumlah'];

// Query untuk memperbarui data pada tabel alat_tambah
$update_query = "UPDATE alat_tambah SET status = 'Disetujui' WHERE id_alat_tambah = '$id_alat_tambah'";
$result_update = mysqli_query($koneksi, $update_query);

// Jika proses update berhasil
if ($result_update) {
    // Query untuk menambahkan jumlah ke tabel alat
    $update_alat_query = "UPDATE alat SET jumlah = jumlah + $jumlah WHERE id_alat = '$id_alat'";
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
