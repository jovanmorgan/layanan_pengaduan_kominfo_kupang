<?php
include '../../../koneksi.php';

// Periksa apakah parameter ID topik chat telah diterima dari permintaan GET
if (isset($_GET['id_topik_chat'])) {
    $id_topik_chat = $_GET['id_topik_chat'];

    // Query untuk mengambil data dari tabel topik_chat berdasarkan ID topik chat yang diberikan
    $query_topik_chat = "SELECT * FROM topik_chat WHERE id_topik_chat = $id_topik_chat";
    $result_topik_chat = mysqli_query($koneksi, $query_topik_chat);

    // Periksa apakah query berhasil dan apakah ada hasil
    if ($result_topik_chat && mysqli_num_rows($result_topik_chat) > 0) {
        $row_topik_chat = mysqli_fetch_assoc($result_topik_chat);
        $waktu_topik_chat = $row_topik_chat['waktu']; // Ambil tanggal dari topik_chat

        // Tampilkan waktu dalam format yang diinginkan
        echo '<small>' . date('d-m-Y', strtotime($waktu_topik_chat)) . '</small>';
    } else {
        echo "Data waktu tidak ditemukan";
    }
} else {
    // Jika parameter ID topik chat tidak diterima
    echo "ID topik chat tidak ditemukan";
}
