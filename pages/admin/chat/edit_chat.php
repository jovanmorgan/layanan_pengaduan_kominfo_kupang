<?php
include '../../../koneksi.php';

// Periksa apakah data POST telah diterima dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah id_topik_chat dan deskripsi telah diterima
    if (isset($_POST['id_topik_chat']) && isset($_POST['deskripsi'])) {
        // Tangkap data dari form
        $id_topik_chat = $_POST['id_topik_chat'];
        $deskripsi = $_POST['deskripsi'];
        $topik = $_POST['topik'];

        // Query untuk mengupdate deskripsi pada tabel topik_chat berdasarkan id_topik_chat
        $query_update_deskripsi = "UPDATE topik_chat SET topik = '$topik', deskripsi = '$deskripsi' WHERE id_topik_chat = '$id_topik_chat'";

        // Jalankan query untuk mengupdate deskripsi
        if (mysqli_query($koneksi, $query_update_deskripsi)) {
            // Jika berhasil diupdate, kirim respons ke JavaScript
            echo "success";
        } else {
            // Jika terjadi kesalahan saat mengupdate, kirim respons ke JavaScript
            echo "failed";
        }
    } else {
        // Jika id_topik_chat atau deskripsi tidak diterima, kirim respons ke JavaScript
        echo "failed";
    }
} else {
    // Jika metode permintaan bukan POST, kirim respons ke JavaScript
    echo "failed";
}
