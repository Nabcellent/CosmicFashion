<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

	<div id="shop">
		<div class="container">
			<div>
				<nav style="margin-top:60px;" class="mb-0" aria-label="breadcrumb">
					<div class="breadcrumb"></div>
				</nav>
			</div>
		</div>

		<div class="container">
			<div style="margin-top:32px" class="mb-5 row">
				<div class="Toastify"></div>
				<div class="col-12 col-lg-8"><h2 class="fw-bold mt-4 mb-5">Shopping Cart</h2>
					<table class="table table-borderless">
						<thead>
						<tr style="border-bottom:1px solid #D9D9D9">
							<th class="bg-transparent text-dark px-0">Product</th>
							<th class="bg-transparent text-dark px-0">Quantity</th>
							<th class="bg-transparent text-dark px-0">Price</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td colspan="3"><h5 class="text-center fw-bold mt-3">Cart is empty.</h5></td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="col-12 col-lg-4">
					<section class="card Cart_cartTotal__2jJho"><h2 class="fw-bold mb-5">Cart Total</h2>
						<div class="d-flex"><h6 class="fw-bold mr-5 mb-0">Subtotal:</h6><h6 class="fw-bold mb-0">KSH.0</h6></div>
						<hr class="my-4"/>
						<div class="d-flex"><h6 class="fw-bold mr-5 mb-0">Shipping:</h6>
							<div><h6 class="fw-bold mb-3">Free Shipping</h6>
								<p class="mb-0">Shipping options will be updated during checkout.</p></div>
						</div>
						<hr class="my-4"/>
						<div class="d-flex"><h5 class="fw-bold" style="margin-right:63px">Total:</h5><h5 class="fw-bold">KSH.0</h5></div>
						<button type="button" class="Cart_checkOutBtn__3oMJx text-uppercase mt-auto fw-bold btn btn-primary">Check out</button>
					</section>
				</div>
			</div>
		</div>
	</div>

<?= $this->endSection() ?>