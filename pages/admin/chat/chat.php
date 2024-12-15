<?php
include '../../../koneksi.php';

// Periksa apakah data POST telah diterima dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah id_topik_chat telah diterima
    if (isset($_POST['id_topik_chat'])) {
        // Tangkap data dari form
        $id_topik_chat = $_POST['id_topik_chat'];
        $deskripsi = $_POST['deskripsi'];

        // Query untuk mengambil data id_admin berdasarkan id_topik_chat dari tabel topik_chat
        $query_admin = "SELECT id_admin FROM topik_chat WHERE id_topik_chat = '$id_topik_chat'";
        $result_admin = mysqli_query($koneksi, $query_admin);

        // Periksa apakah ada hasil dari query
        if (mysqli_num_rows($result_admin) > 0) {
            // Ambil data id_admin
            $row_admin = mysqli_fetch_assoc($result_admin);
            $id_admin = $row_admin['id_admin'];
            $pengguna = "admin";
            // Tambahkan pesan ke dalam tabel detail_chat
            $query_tambah_chat = "INSERT INTO detail_chat (id_topik_chat, id_pengguna, pengguna, deskripsi, waktu) VALUES ('$id_topik_chat', '$id_admin', '$pengguna', '$deskripsi', NOW())";

            // Jalankan query untuk menambahkan pesan
            if (mysqli_query($koneksi, $query_tambah_chat)) {
                // Jika berhasil ditambahkan, kirim respons ke JavaScript
                echo "success";
            } else {
                // Jika terjadi kesalahan saat menambahkan pesan, kirim respons ke JavaScript
                echo "failed";
            }
        } else {
            // Jika tidak ada data id_admin yang cocok dengan id_topik_chat yang diberikan, kirim respons ke JavaScript
            echo "failed";
        }
    } else {
        // Jika id_topik_chat tidak diterima, kirim respons ke JavaScript
        echo "failed";
    }
} else {
    // Jika metode permintaan bukan POST, kirim respons ke JavaScript
    echo "failed";
}
