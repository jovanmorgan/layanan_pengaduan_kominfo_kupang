<?php
include '../../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Terima data dari formulir HTML
    $id_penanganan = $_POST['id_penanganan'];
    $id_pengaduan = $_POST['id_pengaduan'];
    $id_petugas = $_POST['id_petugas'];
    $waktu_kunjungan = $_POST['waktu_kunjungan'];
    $hasil_pengujian = $_POST['hasil_pengujian'];
    $tindakan = $_POST['tindakan'];

    // Lakukan validasi data
    if (empty($id_penanganan) || empty($id_pengaduan) || empty($id_petugas) || empty($waktu_kunjungan) || empty($hasil_pengujian) || empty($tindakan)) {
        echo "data_tidak_lengkap";
        exit();
    }

    // Buat query SQL untuk mengecek apakah id_pengaduan sudah ada di tabel pelanggan
    $check_query_penanganan = "SELECT * FROM penanganan WHERE id_pengaduan = '$id_pengaduan' AND id_penanganan != '$id_penanganan'";
    $check_result_penanganan = mysqli_query($koneksi, $check_query_penanganan);

    if (mysqli_num_rows($check_result_penanganan) > 0) {
        // Jika pengaduan sudah ada di tabel pelanggan, kembalikan pesan error
        echo "data_pengaduan_sudah_ada";
        exit();
    }

    $waktu_kunjungan_formatted = date('d-M-Y H:i', strtotime($waktu_kunjungan));

    // Query SQL untuk update data video
    $query = "UPDATE penanganan SET id_pengaduan='$id_pengaduan', id_petugas='$id_petugas', waktu_kunjungan='$waktu_kunjungan_formatted', hasil_pengujian='$hasil_pengujian', tindakan='$tindakan' WHERE id_penanganan='$id_penanganan'";

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
            $query_update_kover = "UPDATE penanganan SET gambar='$kover_path' WHERE id_penanganan='$id_penanganan'";
            mysqli_query($koneksi, $query_update_kover);
        }

        // Setelah penyimpanan file selesai, arahkan kembali pengguna ke halaman yang sesuai
        echo "success";
        exit();
    } else {
        // Jika terjadi kesalahan saat melakukan proses update, tampilkan pesan kesalahan
        echo "Gagal melakukan proses update data penanganan : " . mysqli_error($koneksi);
    }
} else {
    // Jika metode request bukan POST, arahkan pengguna kembali ke halaman yang sesuai
    header("Location: ../../petugas_penanganan.php");
    exit();
}

// Tutup koneksi ke database
mysqli_close($koneksi);
