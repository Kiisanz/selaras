<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-light w-100 overflow-hidden" style="height: 410px">
                    
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="<?= base_url('pelanggan/katalog') ?>" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">JAHIT</span>SELARAS</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <?php if ($this->session->userdata('id') == '') { ?>
                            <a href="<?= base_url('pelanggan/auth') ?>" class="nav-item nav-link"><i class="fas fa-sign-in-alt"></i> Login</a>
                        <?php } else { ?>
                            <a href="<?= base_url('pelanggan/auth/logout') ?>" class="nav-item nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        <?php } ?>
                        <a href="<?= base_url('pelanggan/Custome') ?>" class="nav-item nav-link">Custom Pakaian</a>
                        <a href="<?= base_url('pelanggan/katalog/status_order') ?>" class="nav-item nav-link">Pesanan Saya</a>     
                    </div>
                </div>
            </nav>

            <!-- Carousel Section -->
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 410px;">
                        <img class="img-fluid" src="<?= base_url('asset/eshopper/') ?>img/bt_1.png" alt="Image">
                    </div>
                    <div class="carousel-item" style="height: 410px;">
                        <img class="img-fluid" src="<?= base_url('asset/eshopper/') ?>img/bt_2.png" alt="Image">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->

<!-- Offer Start -->
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                <img src="<?= base_url('asset/eshopper/') ?>img/offer-1.png" alt="">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-success mb-3">15% off the all order</h5>
                    <h1 class="mb-4 font-weight-semi-bold">Diskon Harga</h1>
                    <a class="btn btn-outline-dark py-md-2 px-md-3">Belanja Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                <img src="<?= base_url('asset/eshopper/') ?>img/offer-2.png" alt="">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-success mb-3">15% off the all order</h5>
                    <h1 class="mb-4 font-weight-semi-bold">Promo Awal Tahun</h1>
                    <a class="btn btn-outline-dark py-md-2 px-md-3">Belanja Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->

<!-- Products Section -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Produk</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <?php
        // Display filtered or all products
        foreach ($produk as $key => $value) {
        ?>
            <div class="col-lg-3 col-md-4 col-sm-10 pb-1">
                <form action="<?= base_url('Pelanggan/Katalog/add') ?>" method="POST">
                    <input type="hidden" name="id" value="<?= $value->id_size ?>">
                    <input type="hidden" name="size" value="<?= $value->size ?>">
                    <input type="hidden" name="stok" value="<?= $value->stok ?>">
                    <input type="hidden" name="name" value="<?= $value->nama_produk ?>">
                    <input type="hidden" name="price" value="<?= $value->harga - ($value->besar_diskon / 100 * $value->harga) ?>">
                    <input type="hidden" name="qty" value="1">
                    <input type="hidden" name="netto" value="<?= $value->berat ?>">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img style="height: 320px;" class="img-fluid w-100" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?= $value->nama_produk ?> | <?= $value->size ?></h6>
                            <div class="d-flex justify-content-center"> 
                                <?php
                                if ($value->besar_diskon != 0) {
                                    $diskon = ($value->besar_diskon / 100) * $value->harga;
                                    $harga_setelah_diskon = $value->harga - $diskon;
                                ?>
                                    <span class="text ml-2 Disc badge" style="color: #E77471; text-decoration: line-through;">Rp. <?= number_format($value->harga, 0) ?></span>
                                    <h6 style="color: green;">Rp. <?= number_format($harga_setelah_diskon, 0) ?></h6>
                                <?php
                                } else {
                                ?>
                                    <h6>Rp. <?= number_format($value->harga, 0) ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="<?= base_url('pelanggan/katalog/detail_produk/' . $value->id_produk) ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-dark mr-1"></i>View Detail</a>
                            <button type="submit" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-dark mr-1"></i>Add To Cart</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<!-- Products Section End -->
