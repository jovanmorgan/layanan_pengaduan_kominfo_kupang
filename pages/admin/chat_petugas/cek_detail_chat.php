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
if (isset($_GET['id_topik_chat_petugas'])) {
    $id_topik_chat_petugas = $_GET['id_topik_chat_petugas'];

    // Query untuk mengambil data dari tabel detail_chat_petugas berdasarkan ID topik chat yang diberikan
    $query_detail_chat_petugas = "SELECT detail_chat_petugas.*, admin.nama AS nama_admin, admin.gambar AS gambar_admin, petugas.nama_petugas AS nama_petugas, petugas.gambar AS gambar_petugas FROM detail_chat_petugas
                            LEFT JOIN admin ON detail_chat_petugas.id_pengguna = admin.id_admin
                            LEFT JOIN petugas ON detail_chat_petugas.id_pengguna = petugas.id_petugas
                            WHERE detail_chat_petugas.id_topik_chat_petugas = $id_topik_chat_petugas";
    // Balik urutan data untuk memunculkan yang paling baru di atas
    $result_detail_chat_petugas = mysqli_query($koneksi, $query_detail_chat_petugas);
    // Tampilkan data dalam format yang diinginkan
    echo '<button class="btn btn-primary font-weight-bold text-xs" onclick="tambahChat(' . $id_topik_chat_petugas . ')">';
    echo 'TAMBAH CHAT <i class="fas fa-comments text-white me-2" aria-hidden="true"></i>';
    echo '</button>';
    // Periksa apakah ada hasil
    if (mysqli_num_rows($result_detail_chat_petugas) > 0) {
        // Lakukan perulangan untuk menampilkan data
        while ($row_detail_chat_petugas = mysqli_fetch_assoc($result_detail_chat_petugas)) {
            // Ambil data dari setiap baris
            $deskripsi_chat = $row_detail_chat_petugas['deskripsi'];
            $waktu_chat = $row_detail_chat_petugas['waktu'];
            $pengguna = $row_detail_chat_petugas['pengguna'];
            $nama_pengguna = "";
            $gambar = "";

            // Jika pengguna adalah admin
            if ($pengguna == "admin") {
                $nama_pengguna = $row_detail_chat_petugas['nama_admin'];
                $gambar = $row_detail_chat_petugas['gambar_admin'];
            }
            // Jika pengguna adalah petugas
            elseif ($pengguna == "petugas") {
                $nama_pengguna = $row_detail_chat_petugas['nama_petugas'];
                $gambar = $row_detail_chat_petugas['gambar_petugas'];
            }

            // Tentukan src gambar sesuai dengan jenis pengguna
            $src_gambar = "";
            if (!empty($gambar)) {
                if ($pengguna == "admin") {
                    $src_gambar = "admin/fp/gambar/" . $gambar;
                } elseif ($pengguna == "petugas") {
                    $src_gambar = "petugas/fp/gambar/" . $gambar;
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
        echo '<br><button class="btn btn-primary font-weight-bold text-xs" onclick="tambahChat(' . $id_topik_chat_petugas . ')">';
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
    // Function untuk menambah chat dengan id_topik_chat_petugas tertentu
    function tambahChat(idTopikChatPetugas) {
        // Lakukan apa pun yang diperlukan dengan id_topik_chat_petugas, misalnya kirim ke halaman lain atau tampilkan pesan
        alert('Menambah chat untuk ID Topik Chat: ' + idTopikChatPetugas);
    }
</script>