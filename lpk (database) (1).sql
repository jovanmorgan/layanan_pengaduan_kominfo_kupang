-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 08:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lpk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `deskripsi`, `gambar`) VALUES
(1, 'Yohanes Ayub Hermanus. SH', 'admin', '1', 'Akun Admin Untuk Kominfo', '661af1574be1c.png');

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(25) NOT NULL,
  `nama_alat` varchar(250) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id_alat`, `nama_alat`, `waktu`, `jumlah`, `deskripsi`) VALUES
(14, 'Tang Crimping', '28-May-2024 20:09', '10', 'Barang baru dan tidak untuk digunakan untuk sekali pakai.'),
(15, 'LAN Tester', '28-May-2024 20:11', '10', 'Alat tidak digunakan untuk sekali pakai'),
(16, 'Router', '28-May-2024 20:13', '100', 'perangkat jaringan yang berfungsi untuk mengirimkan paket data dari jaringan internet ke perangkat lain'),
(17, 'Switch', '28-May-2024 20:14', '50', 'alat yang digunakan untuk menghubungkan perangkat-perangkat dalam jaringan lokal (Local Area Network atau LAN).'),
(18, 'Kabel Internet', '29-May-2024 12:47', '1000', ' kabel yang digunakan untuk menghubungkan perangkat komputer ke jaringan internet\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `alat_keluar`
--

CREATE TABLE `alat_keluar` (
  `id_alat_keluar` int(25) NOT NULL,
  `id_alat` varchar(25) NOT NULL,
  `id_pengaduan` varchar(25) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat_keluar`
--

INSERT INTO `alat_keluar` (`id_alat_keluar`, `id_alat`, `id_pengaduan`, `waktu`, `jumlah`, `deskripsi`, `status`) VALUES
(28, '16', '39', '30-May-2024 13:13', '10', 'pemasangan baru di dinas lingkungan', 'Terkirim');

-- --------------------------------------------------------

--
-- Table structure for table `alat_tambah`
--

CREATE TABLE `alat_tambah` (
  `id_alat_tambah` int(25) NOT NULL,
  `id_alat` varchar(25) NOT NULL,
  `id_pengaduan` varchar(25) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat_tambah`
--

INSERT INTO `alat_tambah` (`id_alat_tambah`, `id_alat`, `id_pengaduan`, `waktu`, `jumlah`, `deskripsi`, `status`) VALUES
(50, '16', '', '30-May-2024 13:10', '10', 'penambahan alat baru', 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `detail_chat`
--

CREATE TABLE `detail_chat` (
  `id_detail_chat` int(25) NOT NULL,
  `id_topik_chat` varchar(25) NOT NULL,
  `id_pengguna` varchar(25) NOT NULL,
  `pengguna` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `waktu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_chat`
--

INSERT INTO `detail_chat` (`id_detail_chat`, `id_topik_chat`, `id_pengguna`, `pengguna`, `deskripsi`, `waktu`) VALUES
(66, '36', '1', 'admin', 'mohon maaf atas keterlambatan dikarenakan stok alat yang dibutuhkan belum ada, mohon pantau terus status pengaduan anda.', '2024-05-29 07:07:38'),
(67, '36', '27', 'pelanggan', 'oke baik.', '2024-05-29 13:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `detail_chat_petugas`
--

CREATE TABLE `detail_chat_petugas` (
  `id_detail_chat_petugas` int(25) NOT NULL,
  `id_topik_chat_petugas` int(25) NOT NULL,
  `id_pengguna` int(25) NOT NULL,
  `pengguna` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `waktu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_chat_petugas`
--

INSERT INTO `detail_chat_petugas` (`id_detail_chat_petugas`, `id_topik_chat_petugas`, `id_pengguna`, `pengguna`, `deskripsi`, `waktu`) VALUES
(34, 18, 1, 'admin', 'kekurangan router untuk pemasangan perangkat baru.\r\n', '2024-05-29 07:09:33'),
(35, 18, 8, 'petugas', '', '2024-05-29 13:09:58'),
(36, 18, 8, 'petugas', 'oke baik alatnya akan segera ditambahkan\r\n', '2024-05-29 13:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(25) NOT NULL,
  `id_pengaduan` varchar(25) NOT NULL,
  `id_pelanggan` varchar(25) NOT NULL,
  `id_petugas` varchar(25) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logged_in_pelanggan`
--

CREATE TABLE `logged_in_pelanggan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` varchar(25) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logged_in_pelanggan`
--

INSERT INTO `logged_in_pelanggan` (`id`, `id_pelanggan`, `login_time`) VALUES
(182, '18', '2024-05-25 12:16:35'),
(186, '19', '2024-05-26 09:12:27'),
(202, '26', '2024-05-28 11:52:24'),
(204, '27', '2024-05-29 05:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(20) NOT NULL,
  `nama_dinas` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telpon` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_dinas`, `alamat`, `nomor_telpon`, `username`, `password`, `deskripsi`, `gambar`) VALUES
(19, 'Dinas Pendidikan dan Kebudayaan', 'Jl. s.k.Lerik No.3, Klp. Lima, Kec.Klp Lima, Kota Kupang, NTT.', '68594', 'dispen', '1', '', ''),
(20, 'Dinas Pekerjaan Umum dan Perumahan Rakyat', 'Jl. Basuki Rahmat, Bakunase II, Kec.Kota Raja, Kota Kupang, NTT', '87645', 'dispekum', '1', '', ''),
(21, 'Badan Pengembangan SDM', 'Oepura, Kec.Maukafa, Kota Kupang, NTT', '85142', 'bapeng', '1', '', ''),
(22, 'Inspektorat Daerah', 'Jl. Terusan Timor Raya No.124, Pasir Panjang, Kec. Kota Lama, Kota Kupang, NTT', '38493', 'inspektorat', '1', '', ''),
(23, 'Dinas Koperasi dan NAKERTRANS', 'Jl. Teratai No.11, Naikolan, Kec. Maulafa, Kota Kupang, NTT', '85134', 'dinkop', '1', '', ''),
(24, 'BAPPELITBANGDA', 'Oebobo, Kelapa Lima, Kota Kupang', '85773', 'bappelitbangda', '1', '', ''),
(25, 'Dinas Penanaman Modal dan PTSP', 'Oebobo, Kota Kupang', '439409', 'dispenmo', '1', '', ''),
(26, 'Dinas Komunikasi dan Informatika', 'Oebobo, Kelapa Lima, Kota Kupang', '87554', 'diskominfo', '1', '', ''),
(27, 'Dinas Lingkungan Hidup dan Kehutanan', 'Kelapa Lima, Kota Kupang', '58493', 'disling', '1', '', ''),
(28, 'Dinas Arsip dan Perpustakaan Daerah', 'Oebobo, Kelapa Lima Kota Kupang', '57439', 'dinar', '1', '', ''),
(29, 'Dinas Pariwisata dan Ekonomi Kreatif', 'Oebobo, Kelapa Lima ,Kota Kupang', '39593', 'dispar', '1', '', ''),
(30, 'Sekretariat DPRDn', 'Naikoten, Kota Kupang', '548593', 'sekretariat', '1', '', ''),
(31, 'Dinas Perhubungan', 'Oebobo, Kelapa Lima, Kota Kupang', '54439', 'disperhub', '1', '', ''),
(32, 'Dinas Peternakan', 'Oebobo, Kelapa Lima, Kota Kupang', '57439', 'dispeternakan', '1', '', ''),
(33, 'Dinas Sosial', 'Oebobo, Kelapa Lima, Kota Kupang', '5489', 'dinsos', '1', '', ''),
(34, 'Dinas Energi dan Sumber Daya Mineral', 'Oebobo, Kelapa Lima, Kota Kupang', '45890', 'disenergi', '1', '', ''),
(35, 'Badan Penanggulangan Bencana Daerah', 'Oebobo, Kelapa Lima, Kota Kupang', '58690', 'badan.penangulangan', '1', '', ''),
(36, 'Biro Umum', 'Oebobo, Kelapa Lima, Kota Kupang', '58729', 'biro.umum', '1', '', ''),
(37, 'Dinas Pemberdayaan Masyarakat Desa', 'Oebobo, Kelapa Lima, Kota Kupang', '784503', 'dinas.pemberdayaan', '1', '', ''),
(38, 'Dinas Kelautan dan Perikanan', 'Oebobo, Kelapa Lima, Kota Kupang', '487983', 'dinas.kelautan', '1', '', ''),
(39, 'Badan Pengelola Perbatasan', 'Oebobo, Kelapa Lima, Kota Kupang', '58030', 'dinas.pengelola', '1', '', ''),
(40, 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'Oebobo, Kelapa Lima, Kota Kupang', '87584', 'dinpem.perempuan', '1', '', ''),
(41, 'Dinas Pertanian dan Ketahanan Pangan', 'Oebobo, Kelapa Lima, Kota Kupang', '65063', 'dinas.pertanian', '1', '', ''),
(42, 'Biro Administrasi Pimpinan', 'Oebobo, Kelapa Lima, Kota Kupang', '34975', 'biro.adm', '1', '', ''),
(43, 'Biro Hukum', 'Oebobo, Kelapa Lima, Kota Kupang', '87593', 'biro.hukum', '1', '', ''),
(44, 'Biro Ekonomi', 'Oebobo, Kelapa Lima, Kota Kupang', '47540', 'biro.ekonomi', '1', '', ''),
(45, 'Biro Organisasi', 'Oebobo, Kelapa Lima, Kota Kupang', '45798', 'bito.organisasi', '1', '', ''),
(46, 'Dinas Perindustrian dan Perdagangan', 'Oebobo, Kelapa Lima, Kota Kupang', '98403', 'din.industri', '1', '', ''),
(47, 'Satuan Polisi Pamong Praja', 'Oebobo, Kelapa Lima, Kota Kupang', '945090', 'satuan.polisi', '1', '', ''),
(48, 'Dinas Pemuda dan OlahRaga', 'Oebobo, Kelapa Lima, Kota Kupang', '94398', 'din.olahraga', '1', '', ''),
(49, 'Biro Tata Pemerintahan', 'Oebobo, Kelapa Lima, Kota Kupang', '458739', 'tata.pemerintah', '1', '', ''),
(50, 'Badan KESBANGPOL', 'Oebobo, Kelapa Lima, Kota Kupang', '13984', 'kesbangpol', '1', '', ''),
(51, 'RSUD Prof.W.Z.Johannes', 'Oebobo, Kelapa Lima, Kota Kupang', '985495', 'RSUD.Johanes', '1', '', ''),
(52, 'Dinas Kesehatan DUKCAPI', 'Oebobo, Kelapa Lima, Kota Kupang', '784598', 'dinkes', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pemimpin`
--

CREATE TABLE `pemimpin` (
  `id_pemimpin` int(20) NOT NULL,
  `nama_pemimpin` varchar(150) NOT NULL,
  `nomor_telpon` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemimpin`
--

INSERT INTO `pemimpin` (`id_pemimpin`, `nama_pemimpin`, `nomor_telpon`, `username`, `password`, `deskripsi`, `gambar`) VALUES
(23, 'Maria F.K.M Gelo Ledo, ST', '628233957346291', 'pimpinan', '1', 'ini adalah data pemimpin', '660c94da04893.png');

-- --------------------------------------------------------

--
-- Table structure for table `penanganan`
--

CREATE TABLE `penanganan` (
  `id_penanganan` int(20) NOT NULL,
  `id_pengaduan` varchar(20) NOT NULL,
  `id_petugas` varchar(20) NOT NULL,
  `id_pelanggan` varchar(25) NOT NULL,
  `waktu_kunjungan` varchar(150) NOT NULL,
  `hasil_pengujian` varchar(200) NOT NULL,
  `tindakan` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penanganan`
--

INSERT INTO `penanganan` (`id_penanganan`, `id_pengaduan`, `id_petugas`, `id_pelanggan`, `waktu_kunjungan`, `hasil_pengujian`, `tindakan`, `gambar`) VALUES
(38, '38', '8', '', '30-May-2024 13:00', 'sinyal internet sudah terbaca dan sudah bisa digunakan', 'mereser router dan melakukan setting ulang', 'gambar/pengaduan.png'),
(39, '39', '7', '', '30-May-2024 13:12', 'semua router bisa digunakan dan semuanya jadi', 'memansang seluruh perangkat baru', 'gambar/data alat.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(20) NOT NULL,
  `id_pelanggan` varchar(25) NOT NULL,
  `nama_dinas` varchar(200) NOT NULL,
  `alamat_dinas` text NOT NULL,
  `nomor_telpon` varchar(40) NOT NULL,
  `waktu_pengaduan` varchar(200) NOT NULL,
  `jenis_pengaduan` varchar(200) NOT NULL,
  `rincian_pengaduan` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `konfirmasi_pelanggan` varchar(50) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_pelanggan`, `nama_dinas`, `alamat_dinas`, `nomor_telpon`, `waktu_pengaduan`, `jenis_pengaduan`, `rincian_pengaduan`, `status`, `konfirmasi_pelanggan`, `gambar`) VALUES
(38, '52', 'Dinas Kesehatan DUKCAPI', 'Oebobo, Kelapa Lima, Kota Kupang', '784598', '29-May-2024 12:45', 'Sinyal internet tidak terbaca', 'router menyala dan sinyal wifi-nya tidak terbaca\r\n', 'Selesai', 'Telah Dikonfirmasi', 'gambar/data alat.png'),
(39, '27', 'Dinas Lingkungan Hidup dan Kehutanan', 'Kelapa Lima, Kota Kupang', '58493', '29-May-2024 13:04', 'Pemasangan baru', 'pemasangan di 2 gedung baru sebanyak 10 perangkat', 'Disetujui', '', 'gambar/data alat.png');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(20) NOT NULL,
  `nama_petugas` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telpon` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `alamat`, `nomor_telpon`, `username`, `password`, `deskripsi`, `gambar`) VALUES
(1, 'Jefta A. Amabilehi', 'oesapa', '6281235436783', 'jefta', '1', 'saya seorang petugas', '660c9a5b1a1e8.png'),
(4, 'Revaldy M. Koroh', 'Oebobo', '6282246573283', 'refaldy', '1', '', ''),
(5, 'Elia Nomate', 'Kelapa Lima', '6282145763456', 'elia', '1', '', ''),
(6, 'Dicky W. Koroh', 'Sikumana', '6282134527463', 'dicky', '1', '', ''),
(7, 'Dance Boru', 'Sikumana', '6282145682736', 'dance', '1', '', ''),
(8, 'Yandri Mandala', 'oebobo', '6281236453827', 'yandri', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `topik_chat`
--

CREATE TABLE `topik_chat` (
  `id_topik_chat` int(25) NOT NULL,
  `topik` text NOT NULL,
  `id_admin` varchar(25) NOT NULL,
  `id_pelanggan` varchar(25) NOT NULL,
  `id_pengaduan` varchar(25) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status_admin` varchar(25) NOT NULL,
  `status_pelanggan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topik_chat`
--

INSERT INTO `topik_chat` (`id_topik_chat`, `topik`, `id_admin`, `id_pelanggan`, `id_pengaduan`, `waktu`, `deskripsi`, `status_admin`, `status_pelanggan`) VALUES
(36, 'alat belum mencukup', '1', '27', '39', '2024-05-29 07:07:38', 'mohon maaf atas keterlambatan dikarenakan stok alat yang dibutuhkan belum ada, mohon pantau terus status pengaduan anda.', 'dilihat', 'dilihat');

-- --------------------------------------------------------

--
-- Table structure for table `topik_chat_petugas`
--

CREATE TABLE `topik_chat_petugas` (
  `id_topik_chat_petugas` int(25) NOT NULL,
  `id_detail_chat_petugas` int(25) NOT NULL,
  `id_alat` int(25) NOT NULL,
  `id_admin` int(25) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `topik` text NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status_admin` varchar(25) NOT NULL,
  `status_petugas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topik_chat_petugas`
--

INSERT INTO `topik_chat_petugas` (`id_topik_chat_petugas`, `id_detail_chat_petugas`, `id_alat`, `id_admin`, `id_petugas`, `topik`, `waktu`, `deskripsi`, `status_admin`, `status_petugas`) VALUES
(18, 34, 16, 1, 0, 'tambahakan router 10 buah', '2024-05-29 07:09:33', 'kekurangan router untuk pemasangan perangkat baru.\r\n', 'dilihat', 'dilihat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `alat_keluar`
--
ALTER TABLE `alat_keluar`
  ADD PRIMARY KEY (`id_alat_keluar`);

--
-- Indexes for table `alat_tambah`
--
ALTER TABLE `alat_tambah`
  ADD PRIMARY KEY (`id_alat_tambah`);

--
-- Indexes for table `detail_chat`
--
ALTER TABLE `detail_chat`
  ADD PRIMARY KEY (`id_detail_chat`);

--
-- Indexes for table `detail_chat_petugas`
--
ALTER TABLE `detail_chat_petugas`
  ADD PRIMARY KEY (`id_detail_chat_petugas`);

--
-- Indexes for table `logged_in_pelanggan`
--
ALTER TABLE `logged_in_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemimpin`
--
ALTER TABLE `pemimpin`
  ADD PRIMARY KEY (`id_pemimpin`);

--
-- Indexes for table `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`id_penanganan`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `topik_chat`
--
ALTER TABLE `topik_chat`
  ADD PRIMARY KEY (`id_topik_chat`);

--
-- Indexes for table `topik_chat_petugas`
--
ALTER TABLE `topik_chat_petugas`
  ADD PRIMARY KEY (`id_topik_chat_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `alat_keluar`
--
ALTER TABLE `alat_keluar`
  MODIFY `id_alat_keluar` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `alat_tambah`
--
ALTER TABLE `alat_tambah`
  MODIFY `id_alat_tambah` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `detail_chat`
--
ALTER TABLE `detail_chat`
  MODIFY `id_detail_chat` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `detail_chat_petugas`
--
ALTER TABLE `detail_chat_petugas`
  MODIFY `id_detail_chat_petugas` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `logged_in_pelanggan`
--
ALTER TABLE `logged_in_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `pemimpin`
--
ALTER TABLE `pemimpin`
  MODIFY `id_pemimpin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `id_penanganan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `topik_chat`
--
ALTER TABLE `topik_chat`
  MODIFY `id_topik_chat` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `topik_chat_petugas`
--
ALTER TABLE `topik_chat_petugas`
  MODIFY `id_topik_chat_petugas` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
