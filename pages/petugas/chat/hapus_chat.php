<?php
include '../../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah id_topik_chat_petugas telah diterima
    if (isset($_POST['id_topik_chat_petugas'])) {
        $id_topik_chat_petugas = $_POST['id_topik_chat_petugas'];

        // Hapus data pada tabel detail_chat_petugas
        $query_delete_detail = "DELETE FROM detail_chat_petugas WHERE id_topik_chat_petugas = '$id_topik_chat_petugas'";
        if (mysqli_query($koneksi, $query_delete_detail)) {
            // Hapus data pada tabel topik_chat_petugas
            $query_delete_topik = "DELETE FROM topik_chat_petugas WHERE id_topik_chat_petugas = '$id_topik_chat_petugas'";
            if (mysqli_query($koneksi, $query_delete_topik)) {
                // Kirim respons bahwa penghapusan berhasil
                echo json_encode(array("status" => "success"));
            } else {
                echo json_encode(array("status" => "error"));
            }
        } else {
            echo json_encode(array("status" => "error"));
        }
    } else {
        echo json_encode(array("status" => "error"));
    }
} else {
    echo json_encode(array("status" => "error"));
}
