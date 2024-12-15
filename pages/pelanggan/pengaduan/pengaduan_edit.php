<?php
include '../../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Terima data dari formulir HTML
    $id_pengaduan = $_POST['id_pengaduan'];
    $nama_dinas = $_POST['nama_dinas'];
    $alamat_dinas = $_POST['alamat_dinas'];
    $nomor_telpon = $_POST['nomor_telpon'];
    $waktu_pengaduan = $_POST['waktu_pengaduan'];
    $jenis_pengaduan = $_POST['jenis_pengaduan'];
    $rincian_pengaduan = $_POST['rincian_pengaduan'];
    $existingKover = $_POST['existingKover'];

    // Lakukan validasi data
    if (empty($nama_dinas) || empty($alamat_dinas) || empty($nomor_telpon) || empty($waktu_pengaduan) || empty($jenis_pengaduan) || empty($rincian_pengaduan)) {
        echo "data_tidak_lengkap";
        exit();
    }

    // Ganti 0 dengan 62 pada nomor telepon
    $nomor_telpon = str_replace('0', '62', $nomor_telpon);

    // Format waktu_pengaduan  ke format yang diinginkan
    $waktu_pengaduan_formatted = date('d-M-Y H:i', strtotime($waktu_pengaduan));

    // Query SQL untuk update data video
    $query = "UPDATE pengaduan SET nama_dinas='$nama_dinas', alamat_dinas='$alamat_dinas', nomor_telpon='$nomor_telpon', waktu_pengaduan='$waktu_pengaduan_formatted', jenis_pengaduan='$jenis_pengaduan', rincian_pengaduan='$rincian_pengaduan' WHERE id_pengaduan='$id_pengaduan'";

    // Lakukan proses update data video di database
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika update berhasil, lakukan penyimpanan file kover dan video baru jika ada yang diunggah

        // Cek apakah file kover baru diunggah
        if (!empty($_FILES['gambar']['name'])) {
            $kover_name = $_FILES['gambar']['name'];
            $kover_tmp = $_FILES['gambar']['tmp_name'];
            $kover_path = 'gambar/' . basename($kover_name); // Simpan kover di dalam folder gambar
            move_uploaded_file($kover_tmp, $kover_path);

            // Update path file kover di database
            $query_update_kover = "UPDATE pengaduan SET gambar='$kover_path' WHERE id_pengaduan='$id_pengaduan'";
            mysqli_query($koneksi, $query_update_kover);
        }

        // Setelah penyimpanan file selesai, arahkan kembali pengguna ke halaman yang sesuai
        echo "success";
        exit();
    } else {
        // Jika terjadi kesalahan saat melakukan proses update, tampilkan pesan kesalahan
        echo "Gagal melakukan proses update data video: " . mysqli_error($koneksi);
    }
} else {
    // Jika metode request bukan POST, arahkan pengguna kembali ke halaman yang sesuai
    header("Location: ../../pelanggan_pengaduan.php");
    exit();
}

// Tutup koneksi ke database
mysqli_close($koneksi);
