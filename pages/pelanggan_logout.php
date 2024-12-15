<?php
session_start();
include '../koneksi.php';

function checkAndLogoutActiveSession($koneksi, $id_pelanggan)
{
    $query_check_active_session = "SELECT * FROM logged_in_pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $result_check_active_session = mysqli_query($koneksi, $query_check_active_session);

    if (mysqli_num_rows($result_check_active_session) > 0) {
        $query_delete_logged_in_pelanggan = "DELETE FROM logged_in_pelanggan WHERE id_pelanggan = '$id_pelanggan'";
        mysqli_query($koneksi, $query_delete_logged_in_pelanggan);
    }
}

if (isset($_SESSION['id_pelanggan'])) {
    $id_pelanggan = $_SESSION['id_pelanggan'];

    checkAndLogoutActiveSession($koneksi, $id_pelanggan);
    unset($_SESSION['id_pelanggan']);
}

header("Location: ../login");
exit;
