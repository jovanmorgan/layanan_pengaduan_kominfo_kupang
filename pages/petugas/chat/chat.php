<?php
include '../../../koneksi.php';

// Periksa apakah data POST telah diterima dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah id_topik_chat_petugas telah diterima
    if (isset($_POST['id_topik_chat_petugas']) && isset($_POST['id_petugas']) && isset($_POST['deskripsi'])) {
        // Tangkap data dari form
        $id_petugas = $_POST['id_petugas'];
        $id_topik_chat_petugas = $_POST['id_topik_chat_petugas'];
        $deskripsi = $_POST['deskripsi'];

        // Tambahkan pesan ke dalam tabel detail_chat_petugas
        $query_tambah_chat = "INSERT INTO detail_chat_petugas (id_topik_chat_petugas, id_pengguna, pengguna, deskripsi, waktu) VALUES ('$id_topik_chat_petugas', '$id_petugas', 'petugas', '$deskripsi', NOW())";

        // Jalankan query untuk menambahkan pesan
        if (mysqli_query($koneksi, $query_tambah_chat)) {
            // Jika berhasil ditambahkan, kirim respons ke JavaScript
            echo "success";
        } else {
            // Jika terjadi kesalahan saat menambahkan pesan, kirim respons ke JavaScript
            echo "failed";
        }
    } else {
        // Jika id_topik_chat_petugas tidak diterima, kirim respons ke JavaScript
        echo "failed";
    }
} else {
    // Jika metode permintaan bukan POST, kirim respons ke JavaScript
    echo "failed";
}
