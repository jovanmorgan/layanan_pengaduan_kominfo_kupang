<?php
session_start();

// Hapus sesi id_pemimpin jika ada
if (isset($_SESSION['id_pemimpin'])) {
    unset($_SESSION['id_pemimpin']);
}

// Redirect pengguna kembali ke halaman login
header("Location: ../login");
exit;
