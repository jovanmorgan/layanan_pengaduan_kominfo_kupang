<?php
include '../../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $id_alat = $_POST['id_alat'];
    $id_admin = $_POST['id_admin'];
    $topik = $_POST['topik'];
    $deskripsi = $_POST['deskripsi'];

    // Mendapatkan waktu sekarang
    $waktu = date('Y-m-d H:i:s');

    $query_get_alat = "SELECT id_alat FROM alat WHERE id_alat = '$id_alat'";
    $result_get_alat = mysqli_query($koneksi, $query_get_alat);
    if (!$result_get_alat) {
        die("Query Error: " . mysqli_error($koneksi));
    }

    // Memasukkan data ke dalam tabel topik_chat_petugas
    if (mysqli_num_rows($result_get_alat) > 0) {
        $row = mysqli_fetch_assoc($result_get_alat);
        $id_alat = $row['id_alat'];

        $status_admin = "baru";
        $status_petugas = "baru";

        // Masukkan data awal ke dalam tabel topik_chat_petugas tanpa id_detail_chat_petugas
        $query_insert_topik = "INSERT INTO topik_chat_petugas (id_alat, id_admin, topik, deskripsi, waktu, status_admin, status_petugas) 
                                VALUES ('$id_alat', '$id_admin', '$topik', '$deskripsi', '$waktu', '$status_admin', '$status_petugas')";
        $result_insert_topik = mysqli_query($koneksi, $query_insert_topik);
        if (!$result_insert_topik) {
            die("Query Error: " . mysqli_error($koneksi));
        }

        // Mendapatkan id_topik_chat yang baru dimasukkan
        $id_topik_chat_baru = mysqli_insert_id($koneksi);

        // Masukkan data ke dalam tabel detail_chat_petugas
        $id_pengguna = $id_admin;
        $pengguna = "admin";
        $query_insert_detail = "INSERT INTO detail_chat_petugas (id_topik_chat_petugas, id_pengguna, pengguna, deskripsi, waktu) 
                                VALUES ('$id_topik_chat_baru', '$id_pengguna', '$pengguna', '$deskripsi', '$waktu')";
        $result_insert_detail = mysqli_query($koneksi, $query_insert_detail);
        if (!$result_insert_detail) {
            die("Query Error: " . mysqli_error($koneksi));
        }

        // Mendapatkan id_detail_chat_petugas yang baru dimasukkan
        $id_detail_chat_petugas_baru = mysqli_insert_id($koneksi);

        // Update tabel topik_chat_petugas dengan id_detail_chat_petugas yang baru
        $query_update_topik = "UPDATE topik_chat_petugas 
                                SET id_detail_chat_petugas = '$id_detail_chat_petugas_baru' 
                                WHERE id_topik_chat_petugas = '$id_topik_chat_baru'";
        $result_update_topik = mysqli_query($koneksi, $query_update_topik);
        if (!$result_update_topik) {
            die("Query Error: " . mysqli_error($koneksi));
        }

        echo "success"; // Berhasil memasukkan data
    } else {
        echo "failed"; // Gagal mencari id_pelanggan
    }
}
