<?php
session_start();

// Hapus sesi id_petugas jika ada
if (isset($_SESSION['id_petugas'])) {
    unset($_SESSION['id_petugas']);
}

// Redirect pengguna kembali ke halaman login
header("Location: ../login");
exit;
