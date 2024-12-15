<?php
include '../../../koneksi.php';

// Periksa apakah metode permintaan adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Terima status baru dari permintaan AJAX
    $status = mysqli_real_escape_string($koneksi, $_POST['dataStatus']);

    // Buat query SQL untuk memperbarui semua status di tabel topik_chat
    $query = "UPDATE topik_chat SET status_admin = '$status'";

    // Jalankan query untuk memperbarui status
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil, kembalikan respons sukses
        echo json_encode(['message' => 'Status updated successfully']);
    } else {
        // Jika gagal, kembalikan pesan error
        http_response_code(500);
        echo json_encode(['message' => 'Failed to update status']);
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
} else {
    // Jika metode permintaan bukan POST, kembalikan pesan error
    http_response_code(405);
    echo json_encode(['message' => 'Method Not Allowed']);
}
