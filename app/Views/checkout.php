<?= $this->extend('layouts/master') ?>
<?= $this->section('links') ?>
	<link rel="stylesheet" href="/vendor/loadingbtn/loading.min.css">
	<link rel="stylesheet" href="/vendor/loadingbtn/ldbtn.min.css">
	<style>
		.btn.btn-outline-success,
		.btn.btn-outline-danger,
		.btn.btn-outline-warning {
			position: relative;
			transition: all .3s ease;
		}

		.btn.btn-outline-success {
			color: #21ae8c;
			border: 1px solid #21ae8c;
		}

		.btn.btn-outline-danger {
			color: #fd5f00;
			border: 1px solid #fd5f00;
		}

		.btn.btn-outline-warning {
			color: #fda700;
			border: 1px solid #fda700;
		}

		.btn.btn-outline-success:focus:after,
		.btn.btn-outline-success:hover:after,
		.btn.btn-outline-warning:focus:after,
		.btn.btn-outline-warning:hover:after,
		.btn.btn-outline-danger:focus:after,
		.btn.btn-outline-danger:hover:after {
			width: 100%;
			transition: all .3s ease
		}

		.btn.btn-outline-success:focus,
		.btn.btn-outline-success:hover,
		.btn.btn-outline-danger:focus,
		.btn.btn-outline-danger:hover,
		.btn.btn-outline-warning:focus,
		.btn.btn-outline-warning:hover {
			color: #fff !important
		}

		.btn.btn-outline-success:after,
		.btn.btn-outline-warning:after,
		.btn.btn-outline-danger:after {
			content: '';
			position: absolute;
			transition: all .3s ease;
			z-index: -1;
			width: 0;
			height: 100%;
			top: 0;
			left: 0;
		}

		.btn.btn-outline-success:after {
			background: #21ae8c
		}

		.btn.btn-outline-danger:after {
			background: #fd5f00
		}

		.btn.btn-outline-warning:after {
			background: #fda700
		}
	</style>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div id="shop">
		<div class="container">
			<div>
				<nav style="margin-top:60px;" class="mb-0" aria-label="breadcrumb">
					<div class="breadcrumb"></div>
				</nav>
			</div>
		</div>

		<form action="<?= route_to('orders.store') ?>" method="POST" class="container">
            <?= csrf_field() ?>
			<div class="my-5 row">
				<div class="col-sm-12">
					<h3 class="fw-bold">Checkout</h3>
					<p>Choose a payment option below and fill out the approriate infomation</p>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 btn-group d-flex" role="group" aria-label="Basic radio toggle button group">
                    <?php foreach($paymentTypes as $type) { ?>
						<input type="radio" class="btn-check" name="payment_method" id="method<?= $type->id ?>"
						       autocomplete="off" <?= strtolower($type->name) === 'mpesa'
                            ? ' checked'
                            : '' ?> value="<?= $type->id ?>">
						<label class="btn btn-outline-<?= $type->description ?>"
						       for="method<?= $type->id ?>"><?= $type->name ?></label>
                    <?php } ?>
				</div>
			</div>

			<div style="margin-top:32px" class="mb-5 row">
				<div class="col-12 col-lg-8">
					<h2 class="fw-bold mt-4 mb-5">Shopping bag</h2>
					<table class="table table-borderless">
						<thead>
						<tr style="border-bottom:1px solid #D9D9D9">
							<th class="bg-transparent text-dark px-0">Product</th>
							<th class="bg-transparent text-dark px-0">Quantity</th>
							<th class="bg-transparent text-dark px-0">Unit price</th>
							<th class="bg-transparent text-dark px-0">Sub total</th>
						</tr>
						</thead>
						<tbody>

                        <?php foreach($cartItems as $key => $item): ?>
							<tr data-id="<?= $key ?>">
								<td class="px-0">
									<a href="<?= route_to('shop.show', $key) ?>"
									   class="d-flex link-primary align-items-center">
										<img src="/images/products/<?= $item['image'] ?>" width="100"
										     class="me-4 p-1 bg-light shadow" alt="Product image"
										     style="width:3rem; height:3rem; object-fit:cover; border-radius:50%;">
										<div>
											<small class="text-muted"><?= $item['sub_category'] ?></small>
											<h6 class="fw-bold"><?= $item['name'] ?></h6>
										</div>
									</a>
								</td>
								<td class="px-0">
                                    <?= $item['quantity'] ?>
								</td>
								<td class="px-0"><h6 class="fw-bold mb-0">KSH.<?= $item['price'] ?></h6></td>
								<td class="px-0">
									<h6 class="fw-bold mb-0 sub-total">
										KSH.<span><?= $item['sub_total'] ?></span>
									</h6>
								</td>
							</tr>
                        <?php endforeach; ?>

						</tbody>
					</table>

					<hr class=" mt-5">
				</div>
				<div class="col-12 col-lg-4">
					<section class="card Cart_cartTotal__2jJho"><h2 class="fw-bold mb-5">Billing summary</h2>
						<div class="d-flex">
							<h6 class="fw-bold me-5 mb-0">Subtotal:</h6>
							<h6 class="fw-bold mb-0 summary-subtotal">KSH.<?= cartDetails('total') ?>/=</h6>
						</div>
						<hr class="my-4"/>
						<div class="d-flex"><h6 class="fw-bold me-5 mb-0">Shipping:</h6>
							<div>
								<h6 class="fw-bold mb-3">Free Shipping 😁</h6>
							</div>
						</div>
						<hr class="my-4"/>
						<div class="d-flex">
							<h5 class="fw-bold" style="margin-right:63px">Total:</h5>
							<h5 class="fw-bold summary-total">KSH.<?= cartDetails('total') ?>/=</h5>
						</div>
						<button type="submit"
						        class="text-uppercase mt-auto fw-bold btn btn-primary">
							Place Order
							<i class="fas fa-truck"></i>
						</button>
					</section>
				</div>
			</div>
		</form>
	</div>


<?= $this->section('scripts') ?>
	<!--    SweetAlert2     -->
	<script src="/vendor/sweetalert/sweetalert.js"></script>
	<?= $this->endSection() ?>
<?= $this->endSection() ?>