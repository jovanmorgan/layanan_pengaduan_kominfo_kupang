<?php
include '../../../koneksi.php';

// Terima data dari formulir HTML
$id_pengaduan = $_POST['id_pengaduan'];
$id_petugas = $_POST['id_petugas'];
$waktu_kunjungan = $_POST['waktu_kunjungan'];
$hasil_pengujian = $_POST['hasil_pengujian'];
$tindakan = $_POST['tindakan'];

// Lakukan validasi data
if (empty($id_pengaduan) || empty($id_petugas) || empty($waktu_kunjungan) || empty($hasil_pengujian) || empty($tindakan)) {
    echo "data_tidak_lengkap";
    exit();
}

// Lakukan validasi untuk gambar
if (empty($_FILES['gambar']['name'])) {
    echo "gambar_kosong";
    exit();
}

// Buat query SQL untuk mengecek apakah id_pengaduan sudah ada di tabel pelanggan
$check_query_penanganan = "SELECT * FROM penanganan WHERE id_pengaduan = '$id_pengaduan'";
$check_result_penanganan = mysqli_query($koneksi, $check_query_penanganan);

if (mysqli_num_rows($check_result_penanganan) > 0) {
    // Jika pengaduan sudah ada di tabel pelanggan, kembalikan pesan error
    echo "data_pengaduan_sudah_ada";
    exit();
}

$kover_name = $_FILES['gambar']['name'];
$kover_tmp = $_FILES['gambar']['tmp_name'];
$kover_path = 'gambar/' . basename($kover_name); // Simpan kover di dalam folder gambar
move_uploaded_file($kover_tmp, $kover_path);

// Format waktu_kunjungan ke format yang diinginkan
$waktu_kunjungan_formatted = date('d-M-Y H:i', strtotime($waktu_kunjungan));
// Buat query SQL untuk menambahkan data penanganan ke dalam database
$query = "INSERT INTO penanganan (id_pengaduan, id_petugas, waktu_kunjungan, hasil_pengujian, tindakan, gambar) 
        VALUES ('$id_pengaduan', '$id_petugas', '$waktu_kunjungan_formatted', '$hasil_pengujian', '$tindakan', '$kover_path')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
