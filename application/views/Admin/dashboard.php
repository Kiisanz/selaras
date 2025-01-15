<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Filter Produk -->
            <div class="col-14 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Alamat Pelanggan</h5>
                        <select id="productFilter" class="form-select" onchange="filterData()">
                            <option value="">Semua Produk</option>
                            <?php
                            // Menyiapkan array untuk produk dan ukuran yang unik
                            $uniqueProducts = [];

                            // Mengumpulkan nama produk dan ukuran dari data top selling
                            foreach ($top_selling as $value) {
                                $productKey = $value['nama_produk'] . ' (' . $value['size'] . ')';

                                // Cek apakah produk dan ukuran sudah ada, jika belum, tambahkan
                                if (!isset($uniqueProducts[$productKey])) {
                                    $uniqueProducts[$productKey] = true;
                                    // Menambahkan option ke dalam dropdown
                                    echo '<option value="' . htmlspecialchars($productKey) . '">' . htmlspecialchars($productKey) . '</option>';
                                }
                            }
                            ?>
                        </select>

                        <select id="addressFilter" class="form-select mt-2" onchange="filterData()">
                            <option value="">Semua Alamat</option>
                            <?php foreach (array_unique(array_column($pelanggan_list, 'alamat_customer')) as $alamat) : ?>
                                <option value="<?= $alamat ?>"><?= $alamat ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>


            <!-- Sales & Revenue Cards -->
            <div class="col-12 col-lg-8">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <!-- Sales Card -->
                        <div class="card info-card sales-card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Pelanggan <span>| Jahit</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $pelanggan->nama_customer ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->
                    </div>

                    <div class="col-12 col-lg-6">
                        <!-- Revenue Card -->
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Pemasukkan <span>| Transaksi</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <strong><small>Rp. <?= number_format($pemasukkan->pemasukkan) ?></small></strong>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Revenue Card -->
                    </div>
                </div><!-- End Inner Row -->
            </div><!-- End Sales & Revenue Cards -->
        </div><!-- End Main Row -->

        <div class="row">
            <!-- OLAP Chart -->
            <div class="col-12 col-lg-8 d-flex flex-column">
                <div class="card flex-grow-1">
                    <div id="topProductChartContainer" class="card-body">
                        <h5 class="card-title">Grafik OLAP</h5>
                        <canvas id="topProductChart"></canvas>
                    </div>
                </div>
            </div><!-- End OLAP Chart -->

            <!-- Pie Chart for Pelanggan -->
            <div class="col-8 col-lg-4 d-flex flex-column">
                <div class="card flex-grow-1">
                    <div class="card-body">
                        <h5 class="card-title">Distribusi Pelanggan <span>| Berdasarkan Alamat</span></h5>
                        <canvas id="customerPieChart" width="100" height="100"></canvas>
                    </div>
                </div>
            </div><!-- End Pie Chart -->
        </div>


        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Top Product Selling <span>| Rangking</span></h5>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Ukuran</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Total Quantity</th>
                            </tr>
                        </thead>
                        <tbody id="productTableBody">
                            <?php
                            $no = 1;
                            $combinedProducts = [];

                            foreach ($top_selling as $value) {
                                $productName = $value['nama_produk'];
                                $size = $value['size'];
                                $harga = $value['harga'];
                                $total = $value['total'];

                                if (isset($combinedProducts[$productName][$size])) {
                                    $combinedProducts[$productName][$size]['total'] += $total;
                                } else {
                                    $combinedProducts[$productName][$size] = [
                                        'nama_produk' => $productName,
                                        'size' => $size,
                                        'harga' => $harga,
                                        'total' => $total,
                                    ];
                                }
                            }

                            $allProducts = [];
                            foreach ($combinedProducts as $productName => $sizes) {
                                foreach ($sizes as $size => $product) {
                                    $allProducts[] = $product;
                                }
                            }

                            usort($allProducts, function ($a, $b) {
                                return $b['total'] - $a['total'];
                            });

                            foreach ($allProducts as $product) {
                            ?>
                                <tr data-product="<?= htmlspecialchars($product['nama_produk']) ?>">
                                    <th scope="row">
                                        <a href="detail.php?product=<?= urlencode($product['nama_produk']) ?>">#<?= $no++ ?></a>
                                    </th>
                                    <td><?= htmlspecialchars($product['nama_produk']) ?></td>
                                    <td><?= htmlspecialchars($product['size']) ?></td>
                                    <td>Rp. <?= number_format($product['harga'], 0, ',', '.') ?></td>
                                    <td><span class="badge bg-success"><?= number_format($product['total']) ?></span></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>


                    </table>
                </div>
            </div>
        </div><!-- End Recent Sales -->



        <!-- Customers Table -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Pelanggan <span>| Daftar Pelanggan</span></h5>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tgl. Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pelanggan_list as $pelanggan) {
                            ?>
                                <tr>
                                    <th scope="row">#<?= $no++ ?></th>
                                    <td><?= $pelanggan->nama_customer ?></td>
                                    <td><?= $pelanggan->alamat_customer ?></td>
                                    <td><?= $pelanggan->tgl_transaksi ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- End Customers Table -->

        </div>
</main><!-- End #main -->

<script>
    let topProductChart;
    let customerPieChart;

    function filterData() {
        const productFilterValue = document.getElementById('productFilter').value;
        const addressFilterValue = document.getElementById('addressFilter').value;

        updateChart(productFilterValue, addressFilterValue);
    }

    function updateChart(productFilterValue, addressFilterValue) {
        const allPrices = <?= json_encode(array_column($top_selling, 'harga')) ?>;
        const allProductNames = <?= json_encode(array_column($top_selling, 'nama_produk')) ?>;
        const allSizes = <?= json_encode(array_column($top_selling, 'size')) ?>;
        const allTotal = <?= json_encode(array_column($top_selling, 'total')) ?>;
        const allAddresses = <?= json_encode(array_map(function ($pelanggan) {
                                    return $pelanggan->alamat_customer;
                                }, $pelanggan_list)) ?>;

        let aggregatedData = {};
        let addressData = {};

        allProductNames.forEach((product, index) => {
            const productKey = `${product} (${allSizes[index]})`;

            const isProductMatch = (productFilterValue === "" || productKey === productFilterValue);
            const isAddressMatch = (addressFilterValue === "" || allAddresses[index] === addressFilterValue);

            if (isProductMatch && isAddressMatch) {
                if (!aggregatedData[productKey]) {
                    aggregatedData[productKey] = {
                        total: 0,
                        price: allPrices[index]
                    };
                }
                aggregatedData[productKey].total += allTotal[index];

                const address = allAddresses[index];
                if (address && address !== 'null' && address !== 'undefined') {
                    if (!addressData[address]) {
                        addressData[address] = 0;
                    }
                    addressData[address] += allTotal[index];
                }
            }
        });

        const filteredProductNames = Object.keys(aggregatedData);
        const filteredTotals = filteredProductNames.map(product => aggregatedData[product].total);

        const addressLabels = Object.keys(addressData).filter(address => address !== null && address !== undefined);
        const addressValues = addressLabels.map(address => addressData[address]);


        if (topProductChart) {
            topProductChart.destroy();
        }

        const ctxBar = document.getElementById('topProductChart').getContext('2d');
        topProductChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: filteredProductNames,
                datasets: [{
                    label: 'Total Terjual',
                    data: filteredTotals,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Terjual'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Produk (Nama & Ukuran)'
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${context.raw} unit`;
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Grafik Total Penjualan'
                    }
                }
            }
        });

        // Hancurkan pie chart lama jika ada
        if (customerPieChart) {
            customerPieChart.destroy();
        }

        const ctxPie = document.getElementById('customerPieChart').getContext('2d');
        customerPieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: addressLabels,
                datasets: [{
                    label: 'Distribusi Alamat',
                    data: addressValues,
                    backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 205, 86, 0.6)', 'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 205, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${context.raw} unit`;
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Distribusi Alamat Pelanggan'
                    }
                }
            }
        });
    }

    // Initial chart load
    updateChart("", "");
</script>