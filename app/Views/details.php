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
						<button type="button" class="text-uppercase fw-bold btn btn-primary" style="width: 50%;">
							Buy now
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
							<div class="d-flex align-items-center">
								<button type="button"
								        class="bg-transparent border-0 p-1 fw-bold me-3 Product_quantityBtn__2Mx6O btn btn-secondary">
									-
								</button>
								<p class="fw-bold mb-0">1</p>
								<button type="button"
								        class="bg-transparent border-0 p-1 fw-bold ms-3 Product_quantityBtn__2Mx6O btn btn-secondary">
									+
								</button>
							</div>
							<h6 class="fw-bold mb-0">40$</h6>
							<button type="button" class="bg-transparent border-0 p-0 btn btn-secondary">
								<img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMy40MTQyIDEyTDE3LjcwNzIgNy43MDcwMUMxOC4wOTgyIDcuMzE2MDEgMTguMDk4MiA2LjY4NDAxIDE3LjcwNzIgNi4yOTMwMUMxNy4zMTYyIDUuOTAyMDEgMTYuNjg0MiA1LjkwMjAxIDE2LjI5MzMgNi4yOTMwMUwxMi4wMDAyIDEwLjU4Nkw3LjcwNzI1IDYuMjkzMDFDNy4zMTYyNSA1LjkwMjAxIDYuNjg0MjUgNS45MDIwMSA2LjI5MzI1IDYuMjkzMDFDNS45MDIyNSA2LjY4NDAxIDUuOTAyMjUgNy4zMTYwMSA2LjI5MzI1IDcuNzA3MDFMMTAuNTg2MiAxMkw2LjI5MzI1IDE2LjI5M0M1LjkwMjI1IDE2LjY4NCA1LjkwMjI1IDE3LjMxNiA2LjI5MzI1IDE3LjcwN0M2LjQ4ODI1IDE3LjkwMiA2Ljc0NDI1IDE4IDcuMDAwMjUgMThDNy4yNTYyNSAxOCA3LjUxMjI1IDE3LjkwMiA3LjcwNzI1IDE3LjcwN0wxMi4wMDAyIDEzLjQxNEwxNi4yOTMzIDE3LjcwN0MxNi40ODgyIDE3LjkwMiAxNi43NDQzIDE4IDE3LjAwMDIgMThDMTcuMjU2MiAxOCAxNy41MTIyIDE3LjkwMiAxNy43MDcyIDE3LjcwN0MxOC4wOTgyIDE3LjMxNiAxOC4wOTgyIDE2LjY4NCAxNy43MDcyIDE2LjI5M0wxMy40MTQyIDEyWiIgZmlsbD0iIzlEOUQ5RCIvPgo8bWFzayBpZD0ibWFzazAiIG1hc2stdHlwZT0iYWxwaGEiIG1hc2tVbml0cz0idXNlclNwYWNlT25Vc2UiIHg9IjYiIHk9IjUiIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMTMuNDE0MiAxMkwxNy43MDcyIDcuNzA3MDFDMTguMDk4MiA3LjMxNjAxIDE4LjA5ODIgNi42ODQwMSAxNy43MDcyIDYuMjkzMDFDMTcuMzE2MiA1LjkwMjAxIDE2LjY4NDIgNS45MDIwMSAxNi4yOTMzIDYuMjkzMDFMMTIuMDAwMiAxMC41ODZMNy43MDcyNSA2LjI5MzAxQzcuMzE2MjUgNS45MDIwMSA2LjY4NDI1IDUuOTAyMDEgNi4yOTMyNSA2LjI5MzAxQzUuOTAyMjUgNi42ODQwMSA1LjkwMjI1IDcuMzE2MDEgNi4yOTMyNSA3LjcwNzAxTDEwLjU4NjIgMTJMNi4yOTMyNSAxNi4yOTNDNS45MDIyNSAxNi42ODQgNS45MDIyNSAxNy4zMTYgNi4yOTMyNSAxNy43MDdDNi40ODgyNSAxNy45MDIgNi43NDQyNSAxOCA3LjAwMDI1IDE4QzcuMjU2MjUgMTggNy41MTIyNSAxNy45MDIgNy43MDcyNSAxNy43MDdMMTIuMDAwMiAxMy40MTRMMTYuMjkzMyAxNy43MDdDMTYuNDg4MiAxNy45MDIgMTYuNzQ0MyAxOCAxNy4wMDAyIDE4QzE3LjI1NjIgMTggMTcuNTEyMiAxNy45MDIgMTcuNzA3MiAxNy43MDdDMTguMDk4MiAxNy4zMTYgMTguMDk4MiAxNi42ODQgMTcuNzA3MiAxNi4yOTNMMTMuNDE0MiAxMloiIGZpbGw9IndoaXRlIi8+CjwvbWFzaz4KPGcgbWFzaz0idXJsKCNtYXNrMCkiPgo8cmVjdCB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIGZpbGw9IiM5RDlEOUQiLz4KPC9nPgo8L3N2Zz4K"
								     alt="close">
							</button>
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
						<form>
							<div class="form-group">
								<label class="col-form-label null" for="image">Image</label><br>
								<div class="sc-bdnylx jMhaxE">
									<label class="btn btn-outline-secondary px-4 mb-2" style="cursor: pointer;">
										Upload an image
										<input accept="image/*" type="file" style="display: none;">
									</label>
								</div>
								<div class="invalid-feedback"></div>
							</div>
							<div class="d-flex justify-content-center">
								<button type="button" class="btn btn-primary fw-bold text-uppercase"
								        style="margin-top: 48px;">LEAVE FEEDBACK
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?= $this->section('scripts') ?>
	<script src="/vendor/nicenumber/nice-number.js"></script>
	<script>
        const qtyInput = $('#quantity').niceNumber({
            onChange: (input) => {
                const unitPrice = `<?= $product->price ?>`

                $('#unit-price').html(`${input * parseInt(unitPrice)}`)
            }
        })

        $('#add-cart-form').on('submit', function (e) {
            e.preventDefault()

            const addToCartBtn = $('#add-to-cart-btn');
            addToCartBtn.prop('disabled', true)
            addToCartBtn.html(`Adding...<span class="ld ld-ring ld-spin"></span>`)

            const data = {}
            $(this).serializeArray().forEach(input => data[input.name] = input.value)
            data.csrf_test_name = `<?= csrf_hash() ?>`

            $.ajax({
                data,
                url: `<?= route_to('shop.store') ?>`,
                method: 'POST',
                beforeSend: () => addToCartBtn.addClass('running'),
                success: response => {
                    const result = JSON.parse(response)

                    if (result.status) {
                        $('nav .cart-count').html(result.cartCount)
                        $('nav .cart-total').attr('title', `Total ~ KSH.${result.cartTotal}`)
                        toast({msg: result.msg, type: `success`})
                    } else {
                        toast({msg: '☹Unable to add item to cart.', type: `danger`})
                    }
                },
                error: error => {
                    toast({msg: '☹Unable to add item to cart.', type: `danger`})
                    console.log(`Error: ${error}`)
                },
                complete: () => {
                    addToCartBtn.removeClass('running')
                    addToCartBtn.html(`Add to cart`)
                    addToCartBtn.prop('disabled', false)
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