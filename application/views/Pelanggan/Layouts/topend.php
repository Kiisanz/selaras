<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="<?= base_url('pelanggan/katalog') ?>" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-light bg-dark font-weight-bold border px-3 mr-1">JAHIT</span>SELARAS</h1>
                </a>
            </div>

            <div class="col-lg-9 col-6 text-right">
               
                <?php
                $cart = $this->cart->contents();
                $qty = 0;
                foreach ($cart as $key => $value) {
                    $qty = $value['qty'] + $qty;
                }
                ?>
                
                <?php if ($this->session->userdata('id') != '') { ?>
                    <a href="<?= base_url('Pelanggan/Katalog/cart') ?>" class="btn border">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge"><?= $qty ?></span>
                    </a>
                <?php }
                ?>

                <?php?>
                    <a href="<?= base_url('Pelanggan/Katalog') ?>" class="btn border">
                        <i class="fas fa-home text-dark"></i>
                    </a>
                <?php?>

            </div>
            
        </div>
    </div>
    <!-- Topbar End -->