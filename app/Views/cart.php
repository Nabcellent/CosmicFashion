<?= $this->extend('layouts/master') ?>
<?= $this->section('links') ?>
	<link rel="stylesheet" href="/vendor/nicenumber/nice-number.css">
	<link rel="stylesheet" href="/vendor/loadingbtn/loading.min.css">
	<link rel="stylesheet" href="/vendor/loadingbtn/ldbtn.min.css">
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

		<div class="container">
			<div style="margin-top:32px" class="mb-5 row">
				<div class="col-12 col-lg-8"><h2 class="fw-bold mt-4 mb-5">Shopping Cart</h2>
					<table class="table table-borderless">
						<thead>
						<tr style="border-bottom:1px solid #D9D9D9">
							<th class="bg-transparent text-dark px-0">Product</th>
							<th class="bg-transparent text-dark px-0">Quantity</th>
							<th class="bg-transparent text-dark px-0">Unit price</th>
							<th class="bg-transparent text-dark px-0" colspan="2">Sub total</th>
						</tr>
						</thead>
						<tbody>

                        <?php if(empty($cartItems)): ?>
							<tr>
								<td colspan="3">
									<div class=" text-center">
										<h5 class="fw-bold mt-3">Cart is empty.</h5>
										<div class="mt-5">
											<a href="<?= route_to('shop.index') ?>"
											   class="btn btn-outline-primary px-5">
												<i class="fas fa-arrow-left"></i> Go Shopping😁
											</a>
										</div>
									</div>
								</td>
							</tr>
                        <?php else: ?>
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
										<div class="d-flex align-items-center ld-ext-right w-auto">
											<input type="number" class="bg-transparent border-0 form-control quantity"
											       name="quantity" min="1" value="<?= $item['quantity'] ?>" aria-label>
											<span class="ld ld-ring ld-spin"></span>
										</div>
									</td>
									<td class="px-0">
										<h6 class="fw-bold mb-0">KSH.<?= $item['price'] ?></h6>
									</td>
									<td class="px-0">
										<h6 class="fw-bold mb-0 sub-total">
											KSH.<span><?= $item['sub_total'] ?></span>
										</h6>
									</td>
									<td class="px-0">
										<a href="javascript:void(0)" class="text-danger remove-cart-item ld-ext-right"
										   title="Remove item">
											<i class="bi bi-cart-x"></i>
										</a>
									</td>
								</tr>
                            <?php endforeach; ?>
                        <?php endif; ?>

						</tbody>
					</table>
				</div>
				<div class="col-12 col-lg-4">
					<section class="card Cart_cartTotal__2jJho"><h2 class="fw-bold mb-5">Cart Total</h2>
						<div class="d-flex">
							<h6 class="fw-bold me-5 mb-0">Subtotal:</h6>
							<h6 class="fw-bold mb-0 summary-subtotal">KSH.<?= cartDetails('total') ?>/=</h6>
						</div>
						<hr class="my-4"/>
						<div class="d-flex"><h6 class="fw-bold me-5 mb-0">Shipping:</h6>
							<div>
								<h6 class="fw-bold mb-3">Free Shipping</h6>
								<p class="mb-0">Shipping options will be updated during checkout.</p>
							</div>
						</div>
						<hr class="my-4"/>
						<div class="d-flex">
							<h5 class="fw-bold" style="margin-right:63px">Total:</h5>
							<h5 class="fw-bold summary-total">KSH.<?= cartDetails('total') ?>/=</h5>
						</div>
                        <?php if(!empty($cartItems)): ?>
							<a href="<?= route_to('orders.index') ?>"
							   class="Cart_checkOutBtn__3oMJx text-uppercase mt-auto fw-bold btn btn-primary">Check out
							</a>
                        <?php endif; ?>
					</section>
				</div>
			</div>
		</div>
	</div>


<?= $this->section('scripts') ?>
	<script src="/vendor/nicenumber/nice-number.js"></script>
	<!--    SweetAlert2     -->
	<script src="/vendor/sweetalert/sweetalert.js"></script>
	<script>
        const qtyInput = $('.quantity').niceNumber({
            onChange: (value, inputEl) => {
                const data = {
                    product_id: $(inputEl).closest('tr').data('id'),
                    quantity: value
                }

                sendRequest(data,
                    `<?= route_to('shop.update') ?>`, 'PATCH',
                    $(inputEl).closest('.ld-ext-right'))
            }
        });

        $('.remove-cart-item').on('click', function () {
            const product_id = $(this).closest('tr').data('id');
            $(this).html(`<i class="bi bi-cart-x"></i><span class="ld ld-ring ld-spin"></span>`)

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                if (result.isConfirmed) {
                    sendRequest({product_id}, `<?= route_to('shop.destroy') ?>`, 'DELETE', $(this))
                }
            })
        })

        function sendRequest(data, url, method, loadElement) {
            $.ajax({
                data: data,
                url: url,
                method: method,
                beforeSend: () => loadElement.addClass('running'),
                success: response => {
                    const result = JSON.parse(response)

                    if (result.status) {
                        if (method === 'PATCH') {
                            const subTotal = result.unitPrice * data.quantity
                            loadElement.closest('tr').find($('.sub-total')).html(`KSH.${subTotal}`)
                        } else if (method === 'DELETE') {
                            loadElement.closest('tr').hide(300)
                        }

                        $('.card .summary-subtotal').html(`KSH.${result.cartTotal}/=`)
                        $('.card .summary-total').html(`KSH.${result.cartTotal}/=`)
                        $('nav .cart-count').html(result.cartCount)
                        $('nav .cart-total').attr('title', `Total ~ KSH.${result.cartTotal}`)
                        toast({msg: result.msg, type: `success`})
                    }
                },
                error: error => {
                    toast({msg: '☹Something went wrong.', type: `danger`})
                    console.log(`Error: ${error}`)
                },
                complete: () => loadElement.removeClass('running')
            })
        }
	</script>

<?= $this->endSection() ?>
<?= $this->endSection() ?>