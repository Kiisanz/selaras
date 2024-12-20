<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <?php echo form_open('pelanggan/katalog/update_cart'); ?>
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Pilih</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Kuantitas</th>
                        <th>Stok</th>
                        <th>Total</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    $i = 1;
                    foreach ($this->cart->contents() as $key => $value) {
                    ?>
                        <tr>
                            <td class="align-middle">
                                <input type="checkbox" name="selected_products[]" class="product-checkbox" value="<?= $value['rowid'] ?>" data-price="<?= $value['price'] ?>">
                            </td>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> <?= $value['name'] ?> | <?= $value['size'] ?></td>
                            <td class="align-middle">Rp. <?= number_format($value['price'], 0) ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 150px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="number" name="<?= $i . '[qty]' ?>" min="1" max="<?= $value['stok'] ?>" class="form-control form-control-sm bg-secondary text-center product-quantity" value="<?= $value['qty'] ?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td><?= $value['stok'] ?></td>
                            <td class="align-middle">Rp. <span class="product-total"><?= number_format($value['price'] * $value["qty"]) ?></span></td>
                            <td class="align-middle"><a href="<?= base_url('pelanggan/katalog/delete/' . $value['rowid']) ?>" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
            <?php echo form_close(); ?>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Keranjang</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 id="cart-total" class="font-weight-bold">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></h5>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <a href="<?= base_url('pelanggan/katalog/checkout') ?>" class="btn btn-block btn-dark my-3 py-3">Lanjutkan ke pembayaran</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
<script>
    // Ambil elemen-elemen yang diperlukan
    const checkboxes = document.querySelectorAll('.product-checkbox');
    const quantityInputs = document.querySelectorAll('.product-quantity');
    const totalElement = document.getElementById('cart-total');

    // Tambahkan event listener untuk setiap checkbox dan input quantity
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateTotal);
    });

    quantityInputs.forEach(input => {
        input.addEventListener('input', updateTotal);
    });

    // Fungsi untuk menghitung ulang total berdasarkan barang yang dipilih
    function updateTotal() {
        let total = 0;
        checkboxes.forEach((checkbox, index) => {
            if (checkbox.checked) {
                const price = parseFloat(checkbox.dataset.price);
                const quantity = parseInt(quantityInputs[index].value);
                total += price * quantity;
            }
        });
        totalElement.textContent = 'Rp. ' + total.toLocaleString();
    }
</script>
