<main id="main" class="main">
    <div class="pagetitle">
        <h1>Laporan</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Penjualan Bulanan</h3>
                    </div>
                    <div class="card-body">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Laporan Bulanan
                                        <small class="float-right">Bulan: <?= $bulan ?> / <?= $tahun ?></small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        <strong>Laporan Jahit Selaras</strong><br>
                                        Laporan Penjualan Jahit Selaras
                                    </address>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id Transaksi</th>
                                                <th>Atas Nama</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Total Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            $grand_total = 0;
                                            foreach ($laporan as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $value->id_transaksi ?></td>
                                                    <td><?= $value->nama_customer ?></td>
                                                    <td><?= $value->tgl_transaksi ?></td>
                                                    <td>Rp. <?= number_format($value->total_bayar, 0)  ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <canvas id="grafik_bulanan" height="100"></canvas>
                                </div>
                                <!-- /.col -->
                            </div>

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <button class="btn btn-primary rounded-pill" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('grafik_bulanan').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar', // Tipe chart yang akan digunakan
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'], // Label untuk setiap bulan
            datasets: [{
                label: 'Grafik Analisis Penjualan Per Bulan',
                data: [<?= $data_jan ?>, <?= $data_feb ?>, <?= $data_mar ?>, <?= $data_apr ?>, <?= $data_mei ?>, <?= $data_jun ?>, <?= $data_jul ?>, <?= $data_agu ?>, <?= $data_sep ?>, <?= $data_okt ?>, <?= $data_nov ?>, <?= $data_des ?>], // Data penjualan per bulan
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
