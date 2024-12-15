<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Kendala Terbanyak</title>
    <!--     Fonts and icons     -->
    <link rel="icon" type="image/png" href="../../../assets/img/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <!-- Tautan ke file CSS DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">
</head>

<body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h3 class="text-center">Laporan Kendala Terbanyak</h3>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="example" class="table align-items-center mb-0 display nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nomor</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Dinas</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Alamat Dinas</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nomor Telpon</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Waktu Pengaduan</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jenis Pengaduan</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Rincian Pengaduan</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Waktu Kunjungan</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../../../koneksi.php';

                                    // Ambil kata kunci pencarian dari URL jika ada
                                    $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';

                                    // Tentukan jumlah data yang akan ditampilkan, default adalah semua data
                                    $limit = isset($_GET['jumlah']) ? $_GET['jumlah'] : 'semua';

                                    // Ambil jenis_pengaduan dari URL jika ada
                                    $jenis_pengaduan = isset($_GET['jenis_pengaduan']) ? $_GET['jenis_pengaduan'] : '';

                                    // Query SQL untuk mengambil data dari tabel pengaduan sesuai dengan jumlah yang dipilih
                                    $query = "SELECT p.*, wk.waktu_kunjungan AS waktu_kunjungan
        FROM pengaduan p
        LEFT JOIN penanganan wk ON p.id_pengaduan = wk.id_pengaduan";

                                    // Tambahkan klausa WHERE untuk memfilter berdasarkan jenis_pengaduan jika jenis_pengaduan telah diterima melalui URL
                                    if (!empty($jenis_pengaduan)) {
                                        $query .= " WHERE jenis_pengaduan = '$jenis_pengaduan'";
                                    }

                                    // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan nama pemimpin atau nomor telepon dengan kata kunci
                                    if (!empty($search_query)) {
                                        // Gunakan AND atau OR sesuai dengan kebutuhan Anda
                                        $query .= " AND (nama_dinas LIKE '%$search_query%' OR alamat_dinas LIKE '%$search_query%' OR nomor_telpon LIKE '%$search_query%' OR waktu_pengaduan LIKE '%$search_query%')";
                                    }

                                    // Jika jumlah data yang dipilih adalah bukan semua, tambahkan limit ke query
                                    if ($limit != 'semua') {
                                        $query .= " LIMIT $limit";
                                    }

                                    $result = mysqli_query($koneksi, $query);

                                    // Cek apakah query berhasil dieksekusi
                                    if (!$result) {
                                        // Jika query gagal, tampilkan pesan kesalahan
                                        echo "Gagal mengeksekusi query: " . mysqli_error($koneksi);
                                        exit();
                                    }

                                    // Cek apakah ada hasil dari query
                                    if (mysqli_num_rows($result) > 0) {
                                        // Variabel untuk menyimpan nomor urut
                                        $counter = 1;

                                        // Lakukan iterasi untuk menampilkan setiap baris data dalam tabel
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $status = $row['status'];

                                            if ($status == 'Selesai') {
                                                $status_class = 'bg-gradient-success';
                                            } elseif ($status == 'Disetujui') {
                                                $status_class = 'bg-gradient-info';
                                            } elseif ($status == 'Dibatalkan') {
                                                $status_class = 'bg-gradient-danger';
                                            } elseif ($status == 'Terkirim') {
                                                $status_class = 'bg-gradient-primary';
                                            } elseif ($status == 'Dikerjakan') {
                                                $status_class = 'bg-gradient-warning';
                                            } else {
                                                $status_class = 'bg-gradient-secondary';
                                            }

                                            $waktu_kunjungan = $row['waktu_kunjungan'];
                                            // Menampilkan data ke dalam tabel HTML
                                            echo "<tr>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'> $counter </span></td>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['nama_dinas'] . "</span></td>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['alamat_dinas'] . "</span></td>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['nomor_telpon'] . "</span></td>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['waktu_pengaduan'] . "</span></td>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['jenis_pengaduan'] . "</span></td>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['rincian_pengaduan'] . "</span></td>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . ($waktu_kunjungan ?: 'Belum Ada Kunjungan!') . "</span></td>";
                                            echo "<td class='align-middle text-center'>
        <button class='btn $status_class btn-sm mt-3' onclick='openEditStatus(
            \"" . $row['id_pengaduan'] . "\"
        )'>" . ($status ?: 'Dikerjakan') . "</button>
        </td>";
                                            echo "</tr>";

                                            // Increment nomor urut
                                            $counter++;
                                        }
                                    } else {
                                        // Jika tidak ada hasil dari query, tampilkan pesan bahwa tidak ada data yang tersedia
                                        echo '<br><tr><td colspan="12" style="text-align: center;">Tidak ada data yang tersedia. Cobalah memasukkan kata kunci yang benar atau tambahkan data.</td></tr>';
                                    }

                                    // Tutup koneksi ke database
                                    mysqli_close($koneksi);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tautan ke file jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <!-- Tautan ke file JavaScript DataTables -->
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
        <!-- Tautan ke file JavaScript untuk ekspor -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
        <script>
            new DataTable('#example', {
                layout: {
                    topStart: {
                        buttons: [{
                            extend: 'pdfHtml5',
                            text: 'PDF A3',
                            customize: function(doc) {
                                // Mengatur ukuran kertas PDF menjadi A3
                                doc.pageSize = 'A3';
                                // Menyesuaikan warna latar belakang header
                                doc.content[1].table.headerRows = 1;
                                doc.content[1].table.body[0].forEach(function(col) {
                                    col.fillColor = '#cccccc'; // Warna abu-abu
                                });

                            }
                        }, {
                            extend: 'pdfHtml5',
                            text: 'PDF A4',
                            customize: function(doc) {
                                // Mengatur ukuran kertas PDF menjadi A3
                                doc.pageSize = 'A4';
                                // Menyesuaikan warna latar belakang header
                                doc.content[1].table.headerRows = 1;
                                doc.content[1].table.body[0].forEach(function(col) {
                                    col.fillColor = '#cccccc'; // Warna abu-abu
                                });
                            }
                        }, 'copy', 'csv', 'excel', 'print']
                    }
                }
            });
        </script>

        <!--   Core JS Files   -->
        <script src="../../../assets/js/core/popper.min.js"></script>
        <script src="../../../assets/js/core/bootstrap.min.js"></script>
        <script src="../../../assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="../../../assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../../../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>