<?= $this->extend('layouts/master') ?>
<?= $this->section('links') ?>
	<link rel="stylesheet" href="/vendor/admin/flatpickr/flatpickr.min.css">
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div id="shop">
		<div class="container">
			<div>
				<nav style="margin-top:60px;border-bottom:;margin-bottom:0" aria-label="breadcrumb">
					<div class="breadcrumb"></div>
				</nav>
			</div>
		</div>

		<div style="margin-top:32px" class="mb-5 container">
			<div class="row">

				<div class="Shop-filter-column  col-sm-3">
                    <?= $this->include('partials/filters') ?>
				</div>

				<div class="col-sm-9">
					<div class="d-flex justify-content-between align-items-center" style="margin-bottom:50px">
						<h6>Showing<!-- -->
							<span class="fw-bold text-primary"><?= $products->count() ?></span> <!-- -->of
							<span class="fw-bold text-primary"><?= $products->total() ?></span> Products
						</h6>
						<div class="d-flex align-items-center">
							<h6 class="text-nowrap mr-3 mb-0">Sort by:</h6>
							<select style="width:180px" class="form-control" aria-label="">
								<option>Most Popular</option>
								<option>Newest</option>
								<option>Price: low to high</option>
								<option>Price: high to low</option>
							</select>
						</div>
					</div>
					<div class="row">
                        <?php foreach($products as $product): ?>
							<div class="mb-4 Shop_product__1cFbR col-12 col-md-6 col-lg-4">
								<div class="position-relative">
									<a href="<?= route_to('shop.show', $product->id) ?>">
										<div class="Shop_productImage__1ILty"
										     style="background-image: url(/images/products/<?= $product->image ?>)"></div>
									</a>
									<div class="d-flex flex-column justify-content-center position-absolute h-100 top-0 Shop_product__actions__1VOlb"
									     style="right:15px">
										<button type="button" class="p-0 bg-transparent border-0 btn btn-secondary">
											<div class="mb-4 Shop_product__actions__heart__sBlRs"></div>
										</button>
										<button type="button" class="p-0 bg-transparent border-0 btn btn-secondary">
											<div class="mb-4 Shop_product__actions__max__gkHwK"></div>
										</button>
										<button type="button" class="p-0 bg-transparent border-0 btn btn-secondary">
											<div class="mb-4 Shop_product__actions__cart__2rrU7"></div>
										</button>
									</div>
								</div>
								<div class="Shop_productInfo__2QXeb">
									<div>
										<a class="mt-3 text-muted mb-0 d-inline-block"
										   href="/category/1fcb7ece-6373-405d-92ef-3f3c4e7dc711">Furniture</a>
										<a href="<?= route_to('shop.show', $product->id) ?>">
											<h6 class="fw-bold font-size-base mt-1 fs-16"><?= $product->name ?></h6>
										</a>
										<h6 class="fs-16">KSH.<?= $product->price ?></h6>
									</div>
								</div>
							</div>
                        <?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>

        <?= $this->include('partials/info_block') ?>
        <?= $this->include('partials/social') ?>
	</div>

<?= $this->section('scripts') ?>
	<script src="/js/admin/flatpickr.js"></script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>