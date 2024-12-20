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
                            // Create an associative array to hold unique products with their sizes
                            $uniqueProducts = [];

                            // Loop through the top-selling products to gather unique names and sizes
                            foreach ($top_selling as $value) {
                                // Use the product name as the key and store its size
                                if (!isset($uniqueProducts[$value->nama_produk])) {
                                    $uniqueProducts[$value->nama_produk] = $value->size;
                                }
                            }

                            // Now render the product filter
                            foreach ($uniqueProducts as $productName => $size) : ?>
                                <option value="<?= $productName ?>"><?= $productName ?> </option>
                            <?php endforeach; ?>
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
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Grafik OLAP</h5>
                        <canvas id="topProductChart"></canvas>
                    </div>
                </div>
            </div><!-- End OLAP Chart -->

            <!-- Pie Chart for Pelanggan -->
            <div class="col-8 col-lg-4">
                <div class="card">
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
                                <th scope="col">Ukuran</th> <!-- New column for ID Size -->
                                <th scope="col">Harga</th>
                                <th scope="col">Total Quantity</th>
                            </tr>
                        </thead>
                        <tbody id="productTableBody">
                            <?php
                            $no = 1;
                            foreach ($top_selling as $value) {
                            ?>
                                <tr data-product="<?= $value->nama_produk ?>">
                                    <th scope="row"><a href="detail.php?product=<?= $value->nama_produk ?>">#<?= $no++ ?></a></th>
                                    <td><?= $value->nama_produk ?></td>
                                    <td><?= $value->size ?></td> <!-- Displaying ID Size -->
                                    <td>Rp. <?= number_format($value->harga) ?></td>
                                    <td><span class="badge bg-success"><?= $value->total ?></span></td>
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
        
        // Update the chart based on selected product
        updateChart(productFilterValue, addressFilterValue);
    }

    function updateChart(productFilterValue, addressFilterValue) {
    // Prepare data
    const allPrices = <?= json_encode(array_column($top_selling, 'harga')) ?>;
    const allProductNames = <?= json_encode(array_column($top_selling, 'nama_produk')) ?>;
    const allSizes = <?= json_encode(array_column($top_selling, 'size')) ?>; // Add sizes to the data
    const allTotal = <?= json_encode(array_column($top_selling, 'total')) ?>;
    const allAddresses = <?= json_encode(array_map(function($pelanggan) { return $pelanggan->alamat_customer; }, $pelanggan_list)) ?>;

    let aggregatedData = {};
    
    // Aggregate data based on filters
    allProductNames.forEach((product, index) => {
        if ((productFilterValue === "" || product === productFilterValue) &&
            (addressFilterValue === "" || allAddresses[index] === addressFilterValue)) {
            
            const productKey = `${product} (${allSizes[index]})`; // Combine product name and size
            
            if (!aggregatedData[productKey]) {
                aggregatedData[productKey] = {
                    total: 0,
                    price: allPrices[index] // Price may not be needed if only total quantity is of interest
                };
            }
            aggregatedData[productKey].total += allTotal[index]; // Aggregate total quantity
        }
    });

    // Create arrays for filtered chart data
    const filteredProductNames = Object.keys(aggregatedData);
    const filteredTotals = filteredProductNames.map(product => aggregatedData[product].total);
    
    // Create the chart
    if (topProductChart) {
        topProductChart.destroy();
    }

    const ctx = document.getElementById('topProductChart').getContext('2d');
    topProductChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: filteredProductNames,
            datasets: [{
                label: 'Total Terjual',
                data: filteredTotals,
                backgroundColor: 'rgba(54, 162, 235, 0.6)', // Brighter color
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
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
                        text: 'Produk dan Size didalam bar'
                    },
                    ticks:{
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                },
                title: {
                    display: true,
                    text: 'Grafik Total Terjual'
                }
            }
        }
    });

    // Update Pie Chart
    if (customerPieChart) {
        customerPieChart.destroy();
    }

    // Prepare data for pie chart based on customer addresses
    const addressCount = {};
    allAddresses.forEach((address, index) => {
        if (addressFilterValue === "" || address === addressFilterValue) {
            addressCount[address] = (addressCount[address] || 0) + 1;
        }
    });

    const pieLabels = Object.keys(addressCount);
    const pieData = pieLabels.map(label => addressCount[label]);

    const pieCtx = document.getElementById('customerPieChart').getContext('2d');
    customerPieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: pieLabels,
            datasets: [{
                label: 'Pelanggan',
                data: pieData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Distribusi Pelanggan'
                }
            }
        }
    });
}

    // Initial chart load
    updateChart("", "");
</script>

