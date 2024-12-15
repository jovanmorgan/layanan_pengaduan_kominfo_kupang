<?php
include '../../../koneksi.php';

// Periksa apakah data POST telah diterima dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah id_topik_chat telah diterima
    if (isset($_POST['id_topik_chat'])) {
        // Tangkap data dari form
        $id_topik_chat = $_POST['id_topik_chat'];
        $deskripsi = $_POST['deskripsi'];

        // Query untuk mengambil data id_pelanggan berdasarkan id_topik_chat dari tabel topik_chat
        $query_pelanggan = "SELECT id_pelanggan FROM topik_chat WHERE id_topik_chat = '$id_topik_chat'";
        $result_pelanggan = mysqli_query($koneksi, $query_pelanggan);

        // Periksa apakah ada hasil dari query
        if (mysqli_num_rows($result_pelanggan) > 0) {
            // Ambil data id_pelanggan
            $row_pelanggan = mysqli_fetch_assoc($result_pelanggan);
            $id_pelanggan = $row_pelanggan['id_pelanggan'];
            $pengguna = "pelanggan";
            // Tambahkan pesan ke dalam tabel detail_chat
            $query_tambah_chat = "INSERT INTO detail_chat (id_topik_chat, id_pengguna, pengguna, deskripsi, waktu) VALUES ('$id_topik_chat', '$id_pelanggan', '$pengguna', '$deskripsi', NOW())";

            // Jalankan query untuk menambahkan pesan
            if (mysqli_query($koneksi, $query_tambah_chat)) {
                // Jika berhasil ditambahkan, kirim respons ke JavaScript
                echo "success";
            } else {
                // Jika terjadi kesalahan saat menambahkan pesan, kirim respons ke JavaScript
                echo "failed";
            }
        } else {
            // Jika tidak ada data id_pelanggan yang cocok dengan id_topik_chat yang diberikan, kirim respons ke JavaScript
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
