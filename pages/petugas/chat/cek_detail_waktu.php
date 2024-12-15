<?php
include '../../../koneksi.php';

// Periksa apakah parameter ID topik chat telah diterima dari permintaan GET
if (isset($_GET['id_topik_chat_petugas'])) {
    $id_topik_chat_petugas = $_GET['id_topik_chat_petugas'];

    // Query untuk mengambil data dari tabel topik_chat_petugas berdasarkan ID topik chat yang diberikan
    $query_topik_chat_petugas = "SELECT * FROM topik_chat_petugas WHERE id_topik_chat_petugas = $id_topik_chat_petugas";
    $result_topik_chat_petugas = mysqli_query($koneksi, $query_topik_chat_petugas);

    // Periksa apakah query berhasil dan apakah ada hasil
    if ($result_topik_chat_petugas && mysqli_num_rows($result_topik_chat_petugas) > 0) {
        $row_topik_chat_petugas = mysqli_fetch_assoc($result_topik_chat_petugas);
        $waktu_topik_chat_petugas = $row_topik_chat_petugas['waktu']; // Ambil tanggal dari topik_chat_petugas

        // Tampilkan waktu dalam format yang diinginkan
        echo '<small>' . date('d-m-Y', strtotime($waktu_topik_chat_petugas)) . '</small>';
    } else {
        echo "Data waktu tidak ditemukan";
    }
} else {
    // Jika parameter ID topik chat tidak diterima
    echo "ID topik chat tidak ditemukan";
}
