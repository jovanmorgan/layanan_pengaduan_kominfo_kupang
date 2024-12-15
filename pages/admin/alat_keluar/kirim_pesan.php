<?php
include '../../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $id_pengaduan = $_POST['id_pengaduan'];
    $id_admin = $_POST['id_admin'];
    $topik = $_POST['topik'];
    $deskripsi = $_POST['deskripsi'];

    // Mendapatkan waktu sekarang
    $waktu = date('Y-m-d H:i:s');

    // Cari id_pelanggan berdasarkan id_pengaduan
    $query_get_pelanggan = "SELECT id_pelanggan FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'";
    $result_get_pelanggan = mysqli_query($koneksi, $query_get_pelanggan);
    if (!$result_get_pelanggan) {
        die("Query Error: " . mysqli_error($koneksi));
    }

    // Memasukkan data ke dalam tabel topik_chat
    if (mysqli_num_rows($result_get_pelanggan) > 0) {
        $row = mysqli_fetch_assoc($result_get_pelanggan);
        $id_pelanggan = $row['id_pelanggan'];

        $query_insert_topik = "INSERT INTO topik_chat (id_pengaduan, id_admin, id_pelanggan, topik, deskripsi, waktu) 
                        VALUES ('$id_pengaduan', '$id_admin', '$id_pelanggan', '$topik', '$deskripsi', '$waktu')";
        $result_insert_topik = mysqli_query($koneksi, $query_insert_topik);
        if (!$result_insert_topik) {
            die("Query Error: " . mysqli_error($koneksi));
        }

        // Mendapatkan id_topik_chat yang baru dimasukkan
        $id_topik_chat_baru = mysqli_insert_id($koneksi);

        // Masukkan data ke dalam tabel detail_chat
        $id_pengguna = $id_admin;
        $pengguna = "admin";
        $query_insert_detail = "INSERT INTO detail_chat (id_topik_chat, id_pengguna, pengguna, deskripsi, waktu) 
                                VALUES ('$id_topik_chat_baru', '$id_pengguna', '$pengguna', '$deskripsi', '$waktu')";
        $result_insert_detail = mysqli_query($koneksi, $query_insert_detail);
        if (!$result_insert_detail) {
            die("Query Error: " . mysqli_error($koneksi));
        }

        echo "success"; // Berhasil memasukkan data
    } else {
        echo "failed"; // Gagal mencari id_pelanggan
    }
}
