<?php
include '../../../koneksi.php';

// Terima data dari formulir HTML
$nama_dinas = $_POST['nama_dinas'];
$id_pelanggan = $_POST['id_pelanggan'];
$alamat_dinas = $_POST['alamat_dinas'];
$nomor_telpon = $_POST['nomor_telpon'];
$waktu_pengaduan = $_POST['waktu_pengaduan'];
$jenis_pengaduan = $_POST['jenis_pengaduan'];
$rincian_pengaduan = $_POST['rincian_pengaduan'];
$status = $_POST['status'];

// Lakukan validasi data
if (empty($nama_dinas) || empty($alamat_dinas) || empty($nomor_telpon) || empty($waktu_pengaduan) || empty($jenis_pengaduan) || empty($rincian_pengaduan) || empty($status)) {
    echo "data_tidak_lengkap";
    exit();
}

// Ganti "0" dengan "62" pada nomor telepon jika dimulai dengan "0"
if (substr($nomor_telpon, 0, 1) === '0') {
    $nomor_telpon = '62' . substr($nomor_telpon, 1);
}

// Lakukan validasi untuk gambar
if (empty($_FILES['gambar']['name'])) {
    echo "gambar_kosong";
    exit();
}

$kover_name = $_FILES['gambar']['name'];
$kover_tmp = $_FILES['gambar']['tmp_name'];
$kover_path = 'gambar/' . basename($kover_name); // Simpan kover di dalam folder gambar
move_uploaded_file($kover_tmp, $kover_path);

// Format waktu_pengaduan dan waktu_kunjuangan ke format yang diinginkan
$waktu_pengaduan_formatted = date('d-M-Y H:i', strtotime($waktu_pengaduan));

// Buat query SQL untuk menambahkan data pengaduan ke dalam database
$query = "INSERT INTO pengaduan (nama_dinas, id_pelanggan, alamat_dinas, nomor_telpon, waktu_pengaduan, jenis_pengaduan, rincian_pengaduan, status, gambar) 
        VALUES ('$nama_dinas', '$id_pelanggan', '$alamat_dinas', '$nomor_telpon', '$waktu_pengaduan_formatted', '$jenis_pengaduan', '$rincian_pengaduan', '$status', '$kover_path')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
