<?php
include '../../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $id_pengaduan = $_POST['id_pengaduan'];
    $id_admin = $_POST['id_admin'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $topik = $_POST['topik'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];

    // Mendapatkan waktu sekarang
    $waktu = date('Y-m-d H:i:s');

    $status_admin = "baru";
    $status_pelanggan = "baru";

    // Masukkan data ke dalam tabel topik_chat
    $query_insert_topik = "INSERT INTO topik_chat (id_pengaduan, id_admin, id_pelanggan, topik, deskripsi, waktu, status_admin, status_pelanggan) 
                    VALUES ('$id_pengaduan', '$id_admin', '$id_pelanggan', '$topik', '$deskripsi', '$waktu', '$status_admin', '$status_pelanggan')";
    $result_insert_topik = mysqli_query($koneksi, $query_insert_topik);

    if ($result_insert_topik) {
        // Mendapatkan id_topik_chat yang baru dimasukkan
        $id_topik_chat_baru = mysqli_insert_id($koneksi);

        // Masukkan data ke dalam tabel detail_chat
        $id_pengguna = $id_admin;
        $pengguna = "admin";
        $query_insert_detail = "INSERT INTO detail_chat (id_topik_chat, id_pengguna, pengguna, deskripsi, waktu) 
                                VALUES ('$id_topik_chat_baru', '$id_pengguna', '$pengguna', '$deskripsi', '$waktu')";
        $result_insert_detail = mysqli_query($koneksi, $query_insert_detail);

        if ($result_insert_detail) {
            // Update status pengaduan
            $query_update = "UPDATE pengaduan SET status='$status' WHERE id_pengaduan='$id_pengaduan'";
            $result_update = mysqli_query($koneksi, $query_update);

            if ($result_update) {
                echo 'success';
            } else {
                echo 'error_update_status';
            }
        } else {
            echo 'error_insert_detail_chat';
        }
    } else {
        echo 'error_insert_topik_chat';
    }
} else {
    echo 'error_request_method';
}
