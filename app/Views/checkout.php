<?= $this->extend('layouts/master') ?>
<?= $this->section('links') ?>
	<link rel="stylesheet" href="/vendor/loadingbtn/loading.min.css">
	<link rel="stylesheet" href="/vendor/loadingbtn/ldbtn.min.css">
	<link rel="stylesheet" href="/css/checkout.css">
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

		<form action="<?= route_to('orders.store') ?>" id="checkout-form" method="POST" class="container">
            <?= csrf_field() ?>
			<div class="my-5 row">
				<div class="col-sm-12">
					<h3 class="fw-bold">Checkout</h3>
					<p>Choose a payment option below</p>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 btn-group d-flex" role="group" aria-label="Basic radio toggle button group">
                    <?php foreach($paymentTypes as $type) { ?>
						<input type="radio" class="btn-check" name="payment_method"
						       id="method<?= str_replace(' ', '', $type->name) ?>"
						       autocomplete="off" <?= strtolower($type->name) === 'mpesa'
                            ? ' checked'
                            : '' ?> value="<?= $type->id ?>">
						<label class="btn btn-outline-<?= $type->description ?>"
						       for="method<?= str_replace(' ', '', $type->name) ?>"><?= $type->name ?></label>
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
						<div id="submit-button" class="mt-auto d-grid">
							<button class="text-uppercase fw-bold btn btn-primary" style="border-radius:18px">
								Lipa na Mpesa
							</button>
							<div id="paypal_payment_button"
							     style="position:relative;z-index:1;height:2.2rem;display:none"></div>
						</div>
					</section>
				</div>
			</div>
		</form>
	</div>


<?= $this->section('scripts') ?>
	<script
			src="https://www.paypal.com/sdk/js?client-id=AfzK9bEaxQ_TP4LIXl0Pp-akLxoKvaReVchEVlTfiRWdseaa1l1o-iXQ92FlhBla_M73KSLf4Y6NBWOG&disable-funding=credit,card&buyer-country=KE&components=buttons"></script>
	<script src="/js/payment.js"></script>
	<script>
        const checkoutForm = $('#checkout-form'),
            submitButton = $('#submit-button button'),
            paymentOptions = {
                Mpesa: {
                    text: 'Lipa na Mpesa',
                },
                PayPal: {
                    text: 'paypal payment'
                },
                Cash: {
                    text: 'Place order <i class="fas fa-truck"></i>'
                },
                Wallet: {
                    text: 'Place order <i class="fas fa-truck"></i>'
                }
            }

        let selectedMethod = $('.btn-group input:checked').prop('id').slice(6),
            paymentMethod = paymentOptions[selectedMethod]

        $('.btn-group input').on('change', function () {
            selectedMethod = $(this).prop('id').slice(6);
            paymentMethod = paymentOptions[selectedMethod]

            if (selectedMethod === 'PayPal') {
                submitButton.hide(300);
                $('#paypal_payment_button').show(300)
            } else {
                submitButton.html(paymentMethod.text)
                submitButton.show(300);
                $('#paypal_payment_button').hide(300)
            }
        })

        checkoutForm.on('submit', function (e) {
            if (selectedMethod === 'Mpesa') {
                e.preventDefault()

                const formData = {}

                checkoutForm.serializeArray().map(input => {
                    formData[input.name] = input.value;
                })

                payWithMpesa('<?= cartDetails('total') ?>', formData)
            }
        })
	</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>