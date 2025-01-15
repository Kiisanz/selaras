<main id="main" class="main">
    <div class="pagetitle">
        <h1>Transaksi
            <?php
            // Tampilkan pesan sukses jika ada
            if ($this->session->userdata('success')) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    <?= $this->session->userdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>
        </h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pesanan Masuk</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Detail Produk</th>
                                    <th class="text-center" scope="col">Detail Customer</th>
                                    <th class="text-center" scope="col">Detail Pengiriman</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pesanan['pesanan_masuk'] as $key => $value) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td class="align-middle">
                                            <div class="product-info">
                                                <div class="row g-2">
                                                    <div class="col-3">
                                                        <img src="<?= base_url('asset/foto-produk/' . $value->gambar); ?>" alt="Product Image" class="img-fluid rounded border"
                                                            style="width: 100px; height: 100px; object-fit: cover;">
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="mb-1"><strong>Nama Produk:</strong> <?= $value->nama_produk ?></p>
                                                        <p class="mb-1"><strong>Ukuran:</strong> <?= $value->size ?></p>
                                                        <p class="mb-1"><strong>Harga Produk:</strong> Rp <?= number_format($value->total_bayar - $value->ongkir, 0, ',', '.') ?></p>
                                                        <h5><strong>Total Pembayaran:</strong> <strong>Rp <?= number_format($value->total_bayar, 0, ',', '.') ?></strong></h5>
                                                        <?php if ($value->metode_pembayaran == 'transfer') { ?>
                                                            <span class="badge bg-danger">Belum Bayar</span>
                                                        <?php } elseif ($value->metode_pembayaran == 'cod') { ?>
                                                            <span class="badge bg-danger">Belum Bayar</span>
                                                            <span class="badge bg-success">Cash On Delivery (COD)</span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex flex-column">
                                                <p class="mb-1"><strong>Nama:</strong> <strong><?= $value->nama_customer ?></strong></p>
                                                <p class="mb-1"><strong>No Telepon:</strong>
                                                    <span class="badge bg-warning"><?= $value->no_hp ?></span>
                                                </p>
                                                <p class="mb-1"><strong>Alamat:</strong> <?= $value->alamat ?></p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="p-3">
                                                <p class="mb-1"><strong>Expedisi:</strong> <span class="text-muted"><?= strtoupper($value->ekspedisi) ?></span></p>
                                                <p class="mb-1"><strong>Estimasi:</strong> <span class="text-muted"><?= $value->estimasi ?></span></p>
                                                <p class="mb-0"><strong>Ongkir:</strong> <span class="text-success">Rp <?= number_format($value->ongkir, 0, ',', '.') ?></span></p>
                                            </div>

                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <?php if ($value->metode_pembayaran == 'cod') { ?>
                                                    <form action="<?= base_url('Admin/Transaksi/proses_pesanan_cod/' . $value->id_transaksi) ?>" method="POST">
                                                        <button type="submit" class="btn btn-success">
                                                            Proses Pesanan
                                                        </button>
                                                    </form>

                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->