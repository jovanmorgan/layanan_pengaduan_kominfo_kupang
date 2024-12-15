<?php
include '../../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah id_topik_chat telah diterima
    if (isset($_POST['id_topik_chat'])) {
        $id_topik_chat = $_POST['id_topik_chat'];

        // Hapus data pada tabel detail_chat
        $query_delete_detail = "DELETE FROM detail_chat WHERE id_topik_chat = '$id_topik_chat'";
        if (mysqli_query($koneksi, $query_delete_detail)) {
            // Hapus data pada tabel topik_chat
            $query_delete_topik = "DELETE FROM topik_chat WHERE id_topik_chat = '$id_topik_chat'";
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
