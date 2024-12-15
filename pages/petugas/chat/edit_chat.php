<?php
include '../../../koneksi.php';

// Periksa apakah data POST telah diterima dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah id_topik_chat_petugas, deskripsi, dan id_detail_chat_petugas telah diterima
    if (isset($_POST['id_detail_chat_petugas']) && isset($_POST['id_topik_chat_petugas']) && isset($_POST['deskripsi']) && isset($_POST['topik'])) {
        // Tangkap data dari form
        $id_detail_chat_petugas = $_POST['id_detail_chat_petugas'];
        $id_topik_chat_petugas = $_POST['id_topik_chat_petugas'];
        $deskripsi = $_POST['deskripsi'];
        $topik = $_POST['topik'];

        // Mulai transaksi
        mysqli_begin_transaction($koneksi);

        try {
            // Query untuk mengupdate deskripsi pada tabel topik_chat_petugas berdasarkan id_topik_chat_petugas
            $query_update_deskripsi = "UPDATE topik_chat_petugas SET topik = ?, deskripsi = ? WHERE id_topik_chat_petugas = ?";
            $stmt1 = mysqli_prepare($koneksi, $query_update_deskripsi);
            mysqli_stmt_bind_param($stmt1, 'ssi', $topik, $deskripsi, $id_topik_chat_petugas);
            mysqli_stmt_execute($stmt1);

            // Query untuk mengupdate deskripsi pada tabel detail_chat_petugas berdasarkan id_detail_chat_petugas
            $query_update = "UPDATE detail_chat_petugas SET deskripsi = ? WHERE id_detail_chat_petugas = ?";
            $stmt2 = mysqli_prepare($koneksi, $query_update);
            mysqli_stmt_bind_param($stmt2, 'si', $deskripsi, $id_detail_chat_petugas);
            mysqli_stmt_execute($stmt2);

            // Commit transaksi
            mysqli_commit($koneksi);

            // Jika berhasil diupdate, kirim respons ke JavaScript
            echo "success";
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            mysqli_rollback($koneksi);

            // Kirim respons gagal ke JavaScript
            echo "failed";
        }
    } else {
        // Jika id_topik_chat_petugas atau deskripsi tidak diterima, kirim respons ke JavaScript
        echo "failed";
    }
} else {
    // Jika metode permintaan bukan POST, kirim respons ke JavaScript
    echo "failed";
}

// Tutup koneksi
mysqli_close($koneksi);
