<body>

    <style>
        /* Styling untuk ikon bel */
        .nav-link.nav-icon {
            position: relative;
            display: inline-block;
            font-size: 1.4em;
        }

        /* Styling untuk badge indikator */
        .badge-number {
            position: absolute;
            top: 0px;
            right: 0px;
            padding: 0.25em 0.45em;
            font-size: 0.7rem;
            border-radius: 50%;
        }

        /* Styling tambahan untuk badge jika diperlukan */
        .badge-number {
            background-color: #007bff;
            /* Menentukan warna latar belakang badge */
            color: white;
        }

        .notifications {
            inset: 8px -15px auto auto !important;
        }

        .notifications .notification-item {
            display: flex;
            align-items: center;
            padding: 15px 10px;
            transition: 0.3s;
        }

        .notifications .notification-item i {
            margin: 0 20px 0 10px;
            font-size: 24px;
        }

        .notifications .notification-item h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .notifications .notification-item p {
            font-size: 13px;
            margin-bottom: 3px;
            color: #919191;
        }

        .notifications .notification-item:hover {
            background-color: #f6f9ff;
        }
    </style>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex w-100 align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="assets/img/logo.png" alt="">
                    <span class="d-none d-lg-block">ADMIN</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->
            <div class="notifications px-5">
                <div class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell-fill"></i>
                        <span id="indicator-badge" class="badge bg-primary badge-number"></span>
                    </a><!-- End Notification Icon -->

                    <ul id="notification-list" class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    </ul>

                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                function updatePesanan() {
                    $.ajax({
                        url: '<?= base_url('Admin/Transaksi/check_new_orders') ?>', // URL untuk mengambil jumlah pesanan
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            const notificationList = $('#notification-list');
                            if (response.jumlah_pesanan === 0) {
                                $('#indicator-badge').addClass("d-none");
                            } else {
                                $('#indicator-badge').removeClass('d-none').addClass('d-flex').text(response.jumlah_pesanan);
                                notificationList.empty();
                                let headerItem = `
                        <li class="dropdown-header">
                            Ada ${response.jumlah_pesanan} pesanan baru
                            <a href="<?= base_url('Admin/Transaksi/pembayaran') ?>"><span class="badge rounded-pill bg-primary p-2 ms-2">Lihat semua</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    `;
                                notificationList.append(headerItem);

                                // Hanya menambahkan notifikasi baru jika ada
                                if (response?.notifikasi?.length > 0) {
                                    response.notifikasi.forEach(function(notif, idx) {
                                        let listItem = `
          <li class="notification-item">
    <a href="<?= base_url('Admin/Transaksi/pembayaran') ?>" class="text-decoration-none">
        <div class="d-flex align-items-center px-3">

            <div>
                <!-- Judul notifikasi yang lebih kecil dan bold -->
                <h6 class="mb-1 fw-bold">Pesanan Baru</h6> <!-- Bold hanya pada judul -->

                <!-- Deskripsi dengan font yang lebih tipis -->
                <p class="text-muted mb-1">${notif}</p> <!-- Deskripsi dengan margin bawah lebih kecil -->

                <!-- Waktu dalam format lokal -->
                <p class="text-muted small mb-0">${new Date(response?.date[idx]).toLocaleString("en-CA",{
    day: '2-digit',
    month: 'long',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit',
    hour12: false,
})}</p>
            </div>
        </div>
    </a>
</li>
<li><hr class="dropdown-divider"></li>



                            `;
                                        notificationList.append(listItem);
                                    });
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Terjadi kesalahan: ' + error);
                        }
                    });
                }

                updatePesanan();
                setInterval(updatePesanan, 5000);
            });
        </script>
    </header><!-- End Header -->