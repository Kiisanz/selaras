<main id="main" class="main">
    <div class="pagetitle">
        <h1>Laporan</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Penjualan Harian</h3>
                    </div>
                    <div class="card-body">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Laporan Harian
                                        <small class="float-right">Tanggal: <?= $tanggal ?> / <?= $bulan ?> / <?= $tahun ?></small>
                                    </h4>
                                </div>
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
                            </div>
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
                                            <?php 
                                            $no = 1;
                                            $grand_total = 0;
                                            foreach ($laporan as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $value->id_transaksi ?></td>
                                                    <td><?= $value->nama_customer ?></td>
                                                    <td><?= $value->tgl_transaksi ?></td>
                                                    <td>Rp. <?= number_format($value->total_bayar, 0) ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Bar Chart row -->
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="grafik_harian" height="100"></canvas>
                                </div>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                <?php
                                $nama_produk = [];
                                $total_pembelian = [];
                                foreach ($grafik_harian as $key => $value) {
                                    $nama_produk[] = $value->nama_produk;
                                    $total_pembelian[] = $value->total_pembelian;
                                }
                                ?>

                                var ctx = document.getElementById('grafik_harian').getContext('2d');
                                var grafikHarian = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: <?= json_encode($nama_produk) ?>,
                                        datasets: [{
                                            label: 'Total Pembelian',
                                            data: <?= json_encode($total_pembelian) ?>,
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <button class="btn btn-primary rounded-pill" onclick="window.print()">
                                        <i class="fas fa-print"></i> Print
                                    </button>
                                </div>
                            </div>
                        </div><!-- /.invoice -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.section -->
</main><!-- /.main -->
