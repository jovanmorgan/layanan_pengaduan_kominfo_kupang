<?php
include '../../../koneksi.php';

// Terima data dari formulir HTML
$id_alat = $_POST['id_alat'];
$nama_alat = $_POST['nama_alat'];
$jumlah = $_POST['jumlah'];
$deskripsi = $_POST['deskripsi'];
$waktu = $_POST['waktu'];

// Lakukan validasi data
if (empty($nama_alat) || empty($jumlah) || empty($waktu) || empty($deskripsi)) {
    echo "data_tidak_lengkap";
    exit();
}


// Format waktu_pengaduan dan waktu_kunjuangan ke format yang diinginkan
$waktu_formatted = date('d-M-Y H:i', strtotime($waktu));

// Buat query SQL untuk mengecek apakah nama_alat sudah ada di tabel alat
$check_query_alat = "SELECT * FROM alat WHERE nama_alat = '$nama_alat' AND id_alat != '$id_alat'";
$check_result_alat = mysqli_query($koneksi, $check_query_alat);

if (mysqli_num_rows($check_result_alat) > 0) {
    // Jika nama_alat sudah ada di tabel pelanggan, kembalikan pesan error
    echo "data_alat_sudah_ada";
    exit();
}

// Buat query SQL untuk mengupdate data pemimpin
$query_update_pemimpin = "UPDATE alat SET nama_alat = '$nama_alat', jumlah = '$jumlah', waktu = '$waktu_formatted', deskripsi = '$deskripsi' WHERE id_alat = '$id_alat'";

// Jalankan query
if (mysqli_query($koneksi, $query_update_pemimpin)) {
    echo "success|$nama_alat";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
