<?php
include '../../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil ID pengaduan dari permintaan POST
    $id_pengaduan = $_POST['id_pengaduan'];

    // Kueri SQL untuk memperbarui kolom konfirmasi_pelanggan
    $update_query = "UPDATE pengaduan SET konfirmasi_pelanggan = 'Telah Dikonfirmasi' WHERE id_pengaduan = '$id_pengaduan'";

    // Jalankan kueri
    if (mysqli_query($koneksi, $update_query)) {
        echo "success|";
        // Mengembalikan nama data pengaduan untuk ditampilkan dalam pesan sukses
        $nama_pengaduan_query = mysqli_query($koneksi, "SELECT nama_dinas FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");
        $nama_pengaduan = mysqli_fetch_assoc($nama_pengaduan_query)['nama_dinas'];
        echo $nama_pengaduan;
    } else {
        echo "error";
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
}
?>
