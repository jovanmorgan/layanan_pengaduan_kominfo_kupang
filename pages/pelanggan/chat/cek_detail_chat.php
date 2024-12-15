<?php
include '../../../koneksi.php';

// Deklarasikan fungsi waktuRelatif di luar loop
function waktuRelatif($waktu)
{
    $sekarang = time();
    $timestamp_waktu = strtotime($waktu);
    $selisih = $sekarang - $timestamp_waktu;

    // Hitung selisih waktu dalam detik
    $detik = $selisih;
    $menit = round($detik / 60);
    $jam = round($menit / 60);
    $hari = round($jam / 24);

    // Tampilkan waktu relatif sesuai dengan selisih waktu
    if ($detik < 60) {
        return 'baru saja';
    } elseif ($menit < 60) {
        return $menit . ' menit..';
    } elseif ($jam < 24) {
        return $jam . ' jam yang lalu';
    } elseif ($hari == 1) {
        return 'kemarin';
    } elseif ($hari <= 7) {
        return $hari . ' hari yang lalu';
    } else {
        return date('d-M-Y', $timestamp_waktu);
    }
}

// Periksa apakah parameter ID topik chat telah diterima dari permintaan GET
if (isset($_GET['id_topik_chat'])) {
    $id_topik_chat = $_GET['id_topik_chat'];

    // Query untuk mengambil data dari tabel detail_chat berdasarkan ID topik chat yang diberikan
    $query_detail_chat = "SELECT detail_chat.*, admin.nama AS nama_admin, admin.gambar AS gambar_admin, pelanggan.nama_dinas AS nama_pelanggan, pelanggan.gambar AS gambar_pelanggan FROM detail_chat
                            LEFT JOIN admin ON detail_chat.id_pengguna = admin.id_admin
                            LEFT JOIN pelanggan ON detail_chat.id_pengguna = pelanggan.id_pelanggan
                            WHERE detail_chat.id_topik_chat = $id_topik_chat";
    // Balik urutan data untuk memunculkan yang paling baru di atas
    $result_detail_chat = mysqli_query($koneksi, $query_detail_chat);
    // Tampilkan data dalam format yang diinginkan
    echo '<button class="btn btn-primary font-weight-bold text-xs" onclick="tambahChat(' . $id_topik_chat . ')">';
    echo 'TAMBAH CHAT <i class="fas fa-comments text-white me-2" aria-hidden="true"></i>';
    echo '</button>';
    // Periksa apakah ada hasil
    if (mysqli_num_rows($result_detail_chat) > 0) {
        // Lakukan perulangan untuk menampilkan data
        while ($row_detail_chat = mysqli_fetch_assoc($result_detail_chat)) {
            // Ambil data dari setiap baris
            $deskripsi_chat = $row_detail_chat['deskripsi'];
            $waktu_chat = $row_detail_chat['waktu'];
            $pengguna = $row_detail_chat['pengguna'];
            $nama_pengguna = "";
            $gambar = "";

            // Jika pengguna adalah admin
            if ($pengguna == "admin") {
                $nama_pengguna = $row_detail_chat['nama_admin'];
                $gambar = $row_detail_chat['gambar_admin'];
            }
            // Jika pengguna adalah pelanggan
            elseif ($pengguna == "pelanggan") {
                $nama_pengguna = $row_detail_chat['nama_pelanggan'];
                $gambar = $row_detail_chat['gambar_pelanggan'];
            }

            // Tentukan src gambar sesuai dengan jenis pengguna
            $src_gambar = "";
            if (!empty($gambar)) {
                if ($pengguna == "admin") {
                    $src_gambar = "admin/fp/gambar/" . $gambar;
                } elseif ($pengguna == "pelanggan") {
                    $src_gambar = "pelanggan/fp/gambar/" . $gambar;
                }
            } else {
                // Jika tidak ada data gambar, gunakan gambar default
                $src_gambar = "../assets/img/profile.jpg";
            }

            // Tampilkan waktu relatif menggunakan fungsi waktuRelatif()
            $waktu_relatif = waktuRelatif($waktu_chat);


            echo '<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">';
            echo '<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">';
            echo '<div class="d-flex align-items-center">';
            echo '<img src="' . $src_gambar . '" alt="Foto Profil" class="rounded-circle me-3" style="width: 30px; height: 30px;">';
            echo '<div class="d-flex flex-column">';
            echo '<h6 class="mb-1 text-dark text-sm">' . $nama_pengguna . '</h6>';
            echo '<span class="text-xs">' . $deskripsi_chat . '</span>';
            echo '<h6 class="waktu text-dark text-xs">' . $waktu_relatif . '</h6>';
            echo '</div>';
            echo '</div>';
            echo '</li>';
        }

        // Tampilkan data dalam format yang diinginkan
        echo '<br><button class="btn btn-primary font-weight-bold text-xs" onclick="tambahChat(' . $id_topik_chat . ')">';
        echo 'TAMBAH CHAT <i class="fas fa-comments text-white me-2" aria-hidden="true"></i>';
        echo '</button>';
    } else {
        echo "Tidak ada data yang ditemukan";
    }
} else {
    // Jika parameter ID topik chat tidak diterima
    echo "ID topik chat tidak ditemukan";
}
?>
<script>
    // Function untuk menambah chat dengan id_topik_chat tertentu
    function tambahChat(idTopikChat) {
        // Lakukan apa pun yang diperlukan dengan id_topik_chat, misalnya kirim ke halaman lain atau tampilkan pesan
        alert('Menambah chat untuk ID Topik Chat: ' + idTopikChat);
    }
</script>