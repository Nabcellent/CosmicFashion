<?= $this->extend('layouts/master') ?>
<?= $this->section('links') ?>
	<link rel="stylesheet" href="/css/details.css">
	<link rel="stylesheet" href="/vendor/nicenumber/nice-number.css">
	<link rel="stylesheet" href="/vendor/loadingbtn/loading.min.css">
	<link rel="stylesheet" href="/vendor/loadingbtn/ldbtn.min.css">
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div id="details">
		<div class="container">
			<nav style="margin-top:60px;border-bottom:;margin-bottom:0" class="" aria-label="breadcrumb">
				<div class="breadcrumb"></div>
			</nav>
		</div>

		<div class="container">
			<div class="mb-5 row" style="margin-top: 32px;">
				<div class="d-flex col-12 col-lg-6 col-xl">
					<div class="me-3 main-image"
					     style="cursor: crosshair; width: auto; height: auto; font-size: 0; position: relative; user-select: none;">
						<img src="/images/products/<?= $product->image ?>" alt="Wristwatch by Ted Baker London"
						     style="width: 100%; height: auto; display: block; pointer-events: none;">
					</div>
				</div>
				<form id="add-cart-form" action="" method="POST"
				      class="d-flex flex-column justify-content-between col-12 col-lg-6">
                    <?= csrf_field() ?>
					<div class="d-flex flex-column justify-content-between" style="height: 320px;">
						<h6 class="text-muted Product_detailCategory__2UCVT"><?= $product->subCategory->name ?></h6>
						<h4 class="fw-bold"><?= $product->name ?></h4>
						<div class="d-flex align-items-center">
							<div class="Product_star__uSePA Product_selected__2KgtD"></div>
							<div class="Product_star__uSePA Product_selected__2KgtD"></div>
							<div class="Product_star__uSePA Product_selected__2KgtD"></div>
							<div class="Product_star__uSePA Product_selected__2KgtD"></div>
							<div class="Product_star__uSePA"></div>
							<p class="text-primary ms-3 mb-0">0 reviews</p>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod
							orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
							Vestibulum ultricies aliquam.</p>
						<div class="d-flex">
							<div class="d-flex flex-column me-5 justify-content-between">
								<h6 class="fw-bold text-muted text-uppercase">Quantity</h6>
								<div class="d-flex align-items-center">
									<input type="number" class="bg-transparent border-0 form-control" id="quantity"
									       name="quantity" min="1" value="1" aria-label>
								</div>
							</div>
							<div class="d-flex flex-column justify-content-between">
								<h6 class="fw-bold text-muted text-uppercase">Price</h6>
								<h6 class="fw-bold">KSH.<span id="unit-price"><?= $product->price ?></span></h6>
							</div>
						</div>
					</div>
					<div class="Product_buttonsWrapper__1bay4 d-flex">
						<input type="hidden" name="product_id" value="<?= $product->id ?>">
						<input type="hidden" name="price" value="<?= $product->price ?>">
						<button type="submit"
						        class="flex-fill me-4 text-uppercase fw-bold btn btn-outline-primary ld-ext-right"
						        id="add-to-cart-btn" style="width: 50%;">Add to Cart
							<span class="ld ld-ring ld-spin"></span>
						</button>
						<button type="submit" class="text-uppercase fw-bold btn btn-primary ld-ext-right buy-now" style="width: 50%;">
							Buy now
							<span class="ld ld-ring ld-spin"></span>
						</button>
					</div>
				</form>
			</div>
			<hr/>

			<div class="mt-5 mb-5 row">
				<div class="d-flex justify-content-between col-sm-12">
					<h4 class="fw-bold">Reviews:</h4>
					<button type="button" data-bs-toggle="modal" data-bs-target="#feedback-modal"
					        class="bg-transparent border-0 fw-bold text-primary p-0 Product_leaveFeedbackBtn__1mYGU btn btn-secondary">
						+ Leave Feedback
					</button>
				</div>
				<div class="d-flex mt-5 col-sm-12">
					<img src="/images/users/2.jpg"
					     class="me-5 Product_reviewImg__hJn4H" style="border-radius: 65px;">
					<div class="d-flex flex-column justify-content-between align-items-start">
						<div class="d-flex justify-content-between w-100 undefined">
							<h6 class="fw-bold mb-0">Lil Nabz</h6>
							<p class="text-muted mb-0">2021-07-06</p>
						</div>
						<div>
							<div class="Product_star__uSePA Product_selected__2KgtD"></div>
							<div class="Product_star__uSePA Product_selected__2KgtD"></div>
							<div class="Product_star__uSePA Product_selected__2KgtD"></div>
							<div class="Product_star__uSePA Product_selected__2KgtD"></div>
							<div class="Product_star__uSePA Product_selected__2KgtD"></div>
						</div>
						<p class="mb-0">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo,
							eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
							ridiculus mus. Vestibulum ultricies aliquam.
						</p>
					</div>
				</div>
			</div>
			<hr/>
			<div class="mt-5 mb-3 row">
				<div class="col-sm-12"><h5 class="fw-bold">You may also like:</h5></div>
			</div>

			<div class="row mb-4">
				<div class="col">
					<!-- Slider main container -->
					<div class="carousel" style="width:100%">
						<button type="button" aria-label="previous" style="position:absolute;top:35%;z-index:99;left:-20px"
						        class="buttonBack___1mlaL carousel__back-button btn bg-transparent border-0 p-0">
							<i class="fas fa-arrow-left"></i>
						</button>
						<div class="swiper">
							<div class="swiper-wrapper">
								<!-- Slides -->

                                <?php foreach($likeProducts as $likeProduct): ?>
									<div class="swiper-slide">
										<div class="slideInner___2mfX9 carousel__inner-slide">
											<div class="Product_product__2Peg4 col">
												<a href="<?= route_to('shop.show', $likeProduct->id) ?>">
													<img src="/images/products/<?= $likeProduct->image ?>" class="img-fluid"
													     style="width:100%" alt="Product image"/>
												</a>
												<p class="mt-3 text-muted mb-0"><?= $likeProduct->subCategory->name ?></p>
												<a href="<?= route_to('shop.show', $likeProduct->id) ?>">
													<h6 class="fw-bold font-size-base mt-1" style="font-size:16px">
                                                        <?= $likeProduct->name ?>
													</h6>
												</a>
												<h6 style="font-size:16px">KSH.<?= $likeProduct->price ?></h6>
											</div>
										</div>
									</div>
                                <?php endforeach; ?>

							</div>
						</div>
						<button type="button" aria-label="next" style="position:absolute;top:35%;z-index:99;right:-20px"
						        class="buttonNext___2mOCa btn bg-transparent border-0 p-0">
							<i class="fas fa-arrow-right"></i>
						</button>
					</div>
				</div>
			</div>
		</div>

        <?= $this->include('partials/info_block') ?>
        <?= $this->include('partials/social') ?>
	</div>

	<!--    ================================    MODAL   ==================================    -->
	<div class="modal fade" id="feedback-modal" role="dialog" tabindex="-1">
		<div class="modal-dialog" role="document" style="width: 920px;">
			<div class="modal-content">
				<div class="p-5">
					<div style="position: absolute; top: 0; right: 0;">
						<button type="button" class="btn-close border-0 bg-transparent btn btn-secondary"
						        data-bs-dismiss="modal" aria-label="Close" style="padding: 15px;"></button>
					</div>
					<div class="modal-body"><h3 class="fw-bold mb-5">Leave Your Feedback</h3>
						<div class=" Product_modalProduct__3MuUp d-flex justify-content-between align-items-center">
							<div class="d-flex align-items-center">
								<img src="/images/products/<?= $product->image ?>" alt="" width="100" class="me-4">
								<div>
									<h6 class="text-muted">Lighting</h6>
									<h5 class="fw-bold"><?= $product->name ?></h5>
								</div>
							</div>
							<h6 class="fw-bold mb-0">KSH.<?= $product->price ?></h6>
						</div>
						<div class="d-flex align-items-center my-4">
							<h6 class="fw-bold me-4 mb-0">Rate Product</h6>
							<div>
								<div class="Product_star__uSePA"></div>
								<div class="Product_star__uSePA"></div>
								<div class="Product_star__uSePA"></div>
								<div class="Product_star__uSePA"></div>
								<div class="Product_star__uSePA"></div>
							</div>
						</div>
						<div class="d-flex mb-4">
							<input name="text" id="exampleEmail" placeholder="First Name" type="text" aria-label=""
							       class="w-100 me-4 form-control">
							<input name="text" id="exampleEmail" placeholder="Last Name" type="text" aria-label=""
							       class="w-100 form-control">
						</div>
						<textarea name="text" id="exampleEmail" placeholder="Add your comment" aria-label=""
						          class="w-100 form-control" style="height: 155px;"></textarea>
						<div class="d-flex justify-content-center">
							<button type="button" class="btn btn-primary fw-bold text-uppercase"
							        style="margin-top: 48px;">LEAVE FEEDBACK
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?= $this->section('scripts') ?>
	<script src="/vendor/nicenumber/nice-number.js"></script>
	<script>
        const quantityEl = $('#quantity'), unitPrice = parseInt(`<?= $product->price ?>`)
        const qtyInput = quantityEl.niceNumber({
            onChange: (input) => {
                $('#unit-price').html(`${input * unitPrice}`)
            }
        })

        quantityEl.on('keyup', () => {$('#unit-price').html(`${quantityEl.val() * unitPrice}`)})

        $('#add-cart-form').on('submit', function (e) {
            e.preventDefault()

            const submitButton = $(e.originalEvent.submitter),
	            isBuyNow = submitButton.hasClass('buy-now');

            submitButton.prop('disabled', true)
            submitButton.html(`${isBuyNow ? 'Processing' : 'Adding'}...<span class="ld ld-ring ld-spin"></span>`)

            const data = {}
            $(this).serializeArray().forEach(input => data[input.name] = input.value)
            data.csrf_test_name = `<?= csrf_hash() ?>`

            $.ajax({
                data,
                url: `<?= route_to('shop.store') ?>`,
                method: 'POST',
                beforeSend: () => submitButton.addClass('running'),
                success: response => {
                    const result = JSON.parse(response)

                    if (result.status) {
                        $('nav .cart-count').html(result.cartCount)
                        $('nav .cart-total').attr('title', `Total ~ KSH.${result.cartTotal}`)
                        toast({msg: result.msg, type: `success`})

                        if(isBuyNow) {
                            location.href = `<?= route_to('orders.index') ?>`
                        }
                    } else {
                        toast({msg: '☹Unable to add item to cart.', type: `danger`})
                    }
                },
                error: error => {
                    toast({msg: '☹Unable to add item to cart.', type: `danger`})
                    console.log(`Error: ${error}`)
                },
                complete: xhr => {
                    let res = eval("(" + xhr.responseText + ")");

                    if(!isBuyNow && res.status) {
                        submitButton.removeClass('running')
                        submitButton.html(`Add to cart`)
                        submitButton.prop('disabled', false)
                    }
                }
            })
        })
	</script>
	<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
	<script>
        const swiper = new Swiper('.swiper', {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
            },

            // Navigation arrows
            navigation: {
                nextEl: '.buttonNext___2mOCa',
                prevEl: '.buttonBack___1mlaL',
            },
        });
	</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>