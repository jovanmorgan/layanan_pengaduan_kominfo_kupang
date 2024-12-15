<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Data Penanganan</title>
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
                        <h3 class="text-center">Data Pemimpin</h3>
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
                                            Nama Teknisi</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            waktu Kunjungan</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Hasil Pegujian</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kendalah</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tindakan</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../../../koneksi.php';

                                    // Ambil kata kunci pencarian dari URL jika ada
                                    $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';

                                    // Tentukan jumlah data yang akan ditampilkan, default adalah semua data
                                    $limit = isset($_GET['jumlah']) ? $_GET['jumlah'] : 'semua';

                                    $query = "SELECT p.*, pd.nama_dinas AS nama_dinas_pengaduan, pd.status AS status_pengaduan, pd.jenis_pengaduan AS jenis_pengaduan, pt.nama_petugas AS nama_petugas_penanganan
                                                    FROM penanganan p
                                                    LEFT JOIN pengaduan pd ON p.id_pengaduan = pd.id_pengaduan
                                                    LEFT JOIN petugas pt ON p.id_petugas = pt.id_petugas";

                                    // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan nama pemimpin atau nomor telepon dengan kata kunci
                                    if (!empty($search_query)) {
                                        $query .= " WHERE pd.nama_dinas LIKE '%$search_query%' OR pd.status LIKE '%$search_query%' OR pd.jenis_pengaduan LIKE '%$search_query%' OR pt.nama_petugas LIKE '%$search_query%' OR hasil_pengujian LIKE '%$search_query%' OR tindakan LIKE '%$search_query%' OR waktu_kunjungan LIKE '%$search_query%'";
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
                                            $status = $row['status_pengaduan'];

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

                                            // Misalnya $waktu_pengaduan adalah data waktu pengaduan dari database
                                            $waktu_kunjungan_database = $row['waktu_kunjungan'];

                                            // Ubah format tanggal dari "27-Mar-2024 00:16" menjadi "2024-03-27T00:16"
                                            $waktu_kunjungan_input = date('Y-m-d\TH:i', strtotime($waktu_kunjungan_database));

                                            // Menampilkan data ke dalam tabel HTML
                                            echo "<tr>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'> $counter </span></td>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['nama_dinas_pengaduan'] . "</span></td>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['nama_petugas_penanganan'] . "</span></td>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['waktu_kunjungan'] . "</span></td>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['hasil_pengujian'] . "</span></td>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['jenis_pengaduan'] . "</span></td>";
                                            echo "<td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row['tindakan'] . "</span></td>";
                                            echo "<td class='align-middle text-center text-sm text-bold'><span class='$status_class' style='padding: 2px 10px 5px 10px; color: white; border-radius: 7px; font-size: 13px;'>" . ($status ?: 'Terkirim') . "</span></td>";
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