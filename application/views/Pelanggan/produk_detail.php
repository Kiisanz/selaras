<!-- Shop Detail Start -->
<div class="container-fluid py-5">
	<div class="row px-xl-5">
		<div class="col-lg-5 pb-5">
			<div id="product-carousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner border">
					<div class="carousel-item active">
						<img class="w-100 h-100" src="<?= base_url('asset/foto-produk/' . $data['produk']->gambar) ?>" alt="Image">
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-7 pb-5">
			<form action="<?= base_url('pelanggan/katalog/add') ?>" method="POST">
				<input type="hidden" name="name" value="<?= $data['produk']->nama_produk ?>">
				<input type="hidden" class="size" name="size" value="<?= $data['produk']->size ?>">
				<input type="hidden" class="stok" name="stok" value="<?= $data['produk']->stok ?>">
				<input type="hidden" class="price" name="price" value="<?= $data['produk']->harga - ($data['produk']->besar_diskon / 100 * $data['produk']->harga) ?>">
				<input type="hidden" name="netto" value="<?= $data['produk']->berat ?>">
				<h3 class="font-weight-semi-bold"><?= $data['produk']->nama_produk ?></h3>
				<div class="d-flex mb-3">
					<div class="text-warning mr-2">
						<small class="fas fa-star"></small>
						<small class="fas fa-star"></small>
						<small class="fas fa-star"></small>
						<small class="fas fa-star-half-alt"></small>
						<small class="far fa-star"></small>
					</div>
					<small class="pt-1"></small>
				</div>
				<h3 class="price-view font-weight-semi-bold mb-4">Rp. <?= number_format($data['produk']->harga - ($data['produk']->besar_diskon / 100 * $data['produk']->harga)) ?> </h3>
				<?php if ($data['produk']->besar_diskon != 0) {
				?>
					<del class="diskon">Rp. <?= number_format($data['produk']->harga, 0) ?></del><span class="disc badge bg-warning">Diskon <?= $data['produk']->besar_diskon ?>%</span>
				<?php
				} ?>
				<details>
				<summary>Deskripsi Produk</summary>
				<p><?= $data['produk']->deskripsi ?></p>
				</details>
				<p></p>
				<div class="d-flex mb-3">
					<p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
					<div class="col-lg-3">
						<select id="produk" name="id" class="form-control">
							<?php
							foreach ($data['size'] as $key => $value) {
							?>
								<option data-stok="<?= $value->stok ?>" data-size="<?= $value->size ?>" data-diskon="Rp. <?= number_format($value->harga, 0)  ?>" data-price-view="Rp. <?= number_format($value->harga - ($value->besar_diskon / 100 * $value->harga), 0) 
								?>" data-price="<?= $value->harga - ($value->besar_diskon / 100 * $value->harga) ?>" value="<?= $value->id_size ?>"><?= $value->size ?></option>
							<?php
							}
							?>

						</select>
					</div>

				</div>
				<div class="d-flex mb-3">
					<p class="text-dark font-weight-medium mb-0 mr-3">Stok:</p>
					<div class="col-lg-2">
						<p class="stok text-success"><?= $data['produk']->stok ?></p>
					</div>

				</div>
				<div class="d-flex align-items-center mb-4 pt-2">
					<div class="input-group quantity mr-3" style="width: 130px;">

						<input type="number" name="qty" class="form-control bg-secondary text-center" value="1">

					</div>
					<button type="submit" class="btn btn-dark px-3"><i class="fa fa-shopping-cart mr-1"></i> Masukan Keranjang</button>
				</div>
			</form>
			<div class="navbar-nav ml-auto py-0">
			<a href="<?= base_url('pelanggan/katalog') ?>" class="nav-item nav-link">
				<button type="submit" class="btn btn-light px-3"><i class="fa fa-home mr-1"></i> Kembali</button>
			</a>
		</div>
		</div>
	</div>

</div>
<!-- Shop Detail End -->
