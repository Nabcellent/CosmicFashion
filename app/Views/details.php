<?= $this->extend('layouts/master') ?>
<?= $this->section('links') ?>
	<link rel="stylesheet" href="/css/details.css">
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div id="details">
		<div class="container">
			<div>
				<nav style="margin-top:60px;border-bottom:;margin-bottom:0" class="" aria-label="breadcrumb">
					<div class="breadcrumb"></div>
				</nav>
			</div>
		</div>

		<div class="container">
			<!--<div style="height:480px" class="d-flex justify-content-center align-items-center">
				<img src="/images/flatlogic/preloader-9a117e7790fe3298f22bddda7ae6abfc.gif" alt="fetching"/>
			</div>-->
			<div class="mb-5 row" style="margin-top: 32px;">
				<div class="d-flex col-12 col-lg-6">
					<div class="mr-3"
					     style="cursor: crosshair; width: auto; height: auto; font-size: 0px; position: relative; user-select: none;">
						<img src="/images/products/<?= $product->image ?>"
						     alt="Wristwatch by Ted Baker London"
						     style="width: 100%; height: auto; display: block; pointer-events: none;"></div>
				</div>
				<form id="add-cart-form" action="" method="POST"
				      class="d-flex flex-column justify-content-between col-12 col-lg-6">
					<div class="d-flex flex-column justify-content-between" style="height: 320px;">
						<h6 class="text-muted Product_detailCategory__2UCVT"><?= $product->subCategory->name ?></h6>
						<h4 class="fw-bold"><?= $product->name ?></h4>
						<div class="d-flex align-items-center">
							<div class="Product_star__uSePA Product_selected__2KgtD"></div>
							<div class="Product_star__uSePA Product_selected__2KgtD"></div>
							<div class="Product_star__uSePA Product_selected__2KgtD"></div>
							<div class="Product_star__uSePA Product_selected__2KgtD"></div>
							<div class="Product_star__uSePA"></div>
							<p class="text-primary ml-3 mb-0">0 reviews</p>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod
							orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
							Vestibulum ultricies aliquam.</p>
						<div class="d-flex">
							<div class="d-flex flex-column mr-5 justify-content-between">
								<h6 class="fw-bold text-muted text-uppercase">Quantity</h6>
								<div class="d-flex align-items-center">
									<button type="button"
									        class="bg-transparent border-0 p-1 fw-bold mr-3 Product_quantityBtn__2Mx6O btn btn-secondary">
										-
									</button>
									<p class="fw-bold mb-0">1</p>
									<button type="button"
									        class="bg-transparent border-0 p-1 fw-bold ml-3 Product_quantityBtn__2Mx6O btn btn-secondary">
										+
									</button>
								</div>
							</div>
							<div class="d-flex flex-column justify-content-between">
								<h6 class="fw-bold text-muted text-uppercase">Price</h6>
								<h6 class="fw-bold">KSH.<?= $product->price ?></h6>
							</div>
						</div>
					</div>
					<div class="Product_buttonsWrapper__1bay4 d-flex">
						<input type="hidden" name="product_id" value="<?= $product->id ?>">
						<button type="submit" id="add-to-cart"
						        class="flex-fill mr-4 text-uppercase fw-bold btn btn-outline-primary"
						        style="width: 50%;">Add to Cart
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
					     class="mr-5 Product_reviewImg__hJn4H" style="border-radius: 65px;">
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
			<div class="mt-5 mb-5 row">
				<div class="col-sm-12"><h5 class="fw-bold">You may also like:</h5></div>
			</div>
			<div style="position:relative" class="mb-5 row">
				<div class="carousel" style="width:100%">
					<button type="button" aria-label="previous"
					        class="buttonBack___1mlaL carousel__back-button btn bg-transparent border-0 p-0"
					        style="position:absolute;top:35%;z-index:99;left:-20px">
						<i class="fas fa-arrow-left"></i>
					</button>

					<div class="horizontalSlider___281Ls carousel__slider carousel__slider--horizontal"
					     aria-live="polite" tabindex="0" role="listbox">
						<div class="carousel__slider-tray-wrapper carousel__slider-tray-wrap--horizontal">
							<ul class="sliderTray___-vHFQ sliderAnimation___300FY carousel__slider-tray carousel__slider-tray--horizontal"
							    style="width:200%;transform:translateX(0%) translateX(0px);flex-direction:row">

                                <?php foreach($likeProducts as $product): ?>
									<li tabindex="0" aria-selected="true" role="option"
									    class="slide___3-Nqo slideHorizontal___1NzNV carousel__slide carousel__slide--visible"
									    style="width:12.5%;padding-bottom:16.666666666666668%">
										<div class="slideInner___2mfX9 carousel__inner-slide">
											<div class="Product_product__2Peg4 col">
												<a href="<?= route_to('shop.show', $product->id) ?>"><img
															src="/images/products/<?= $product->image ?>"
															class="img-fluid" style="width:100%"/></a>
												<p class="mt-3 text-muted mb-0">Category</p><a
														href="<?= route_to('shop.show', $product->id) ?>"><h6
															class="fw-bold font-size-base mt-1" style="font-size:16px">
														Awesome
														Product Name</h6></a><h6 style="font-size:16px">$70</h6></div>
										</div>
									</li>
                                <?php endforeach; ?>

							</ul>
						</div>
					</div>
					<button type="button" aria-label="next"
					        class="buttonNext___2mOCa carousel__next-button btn bg-transparent border-0 p-0"
					        style="position:absolute;top:35%;z-index:99;right:-20px">
						<i class="fas fa-arrow-right"></i>
					</button>
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
								<img src="/images/products/<?= $product->image ?>" alt="" width="100" class="mr-4">
								<div>
									<h6 class="text-muted">Lighting</h6>
									<h5 class="fw-bold"><?= $product->name ?></h5>
								</div>
							</div>
							<div class="d-flex align-items-center">
								<button type="button"
								        class="bg-transparent border-0 p-1 fw-bold mr-3 Product_quantityBtn__2Mx6O btn btn-secondary">
									-
								</button>
								<p class="fw-bold mb-0">1</p>
								<button type="button"
								        class="bg-transparent border-0 p-1 fw-bold ml-3 Product_quantityBtn__2Mx6O btn btn-secondary">
									+
								</button>
							</div>
							<h6 class="fw-bold mb-0">40$</h6>
							<button type="button" class="bg-transparent border-0 p-0 btn btn-secondary">
								<img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMy40MTQyIDEyTDE3LjcwNzIgNy43MDcwMUMxOC4wOTgyIDcuMzE2MDEgMTguMDk4MiA2LjY4NDAxIDE3LjcwNzIgNi4yOTMwMUMxNy4zMTYyIDUuOTAyMDEgMTYuNjg0MiA1LjkwMjAxIDE2LjI5MzMgNi4yOTMwMUwxMi4wMDAyIDEwLjU4Nkw3LjcwNzI1IDYuMjkzMDFDNy4zMTYyNSA1LjkwMjAxIDYuNjg0MjUgNS45MDIwMSA2LjI5MzI1IDYuMjkzMDFDNS45MDIyNSA2LjY4NDAxIDUuOTAyMjUgNy4zMTYwMSA2LjI5MzI1IDcuNzA3MDFMMTAuNTg2MiAxMkw2LjI5MzI1IDE2LjI5M0M1LjkwMjI1IDE2LjY4NCA1LjkwMjI1IDE3LjMxNiA2LjI5MzI1IDE3LjcwN0M2LjQ4ODI1IDE3LjkwMiA2Ljc0NDI1IDE4IDcuMDAwMjUgMThDNy4yNTYyNSAxOCA3LjUxMjI1IDE3LjkwMiA3LjcwNzI1IDE3LjcwN0wxMi4wMDAyIDEzLjQxNEwxNi4yOTMzIDE3LjcwN0MxNi40ODgyIDE3LjkwMiAxNi43NDQzIDE4IDE3LjAwMDIgMThDMTcuMjU2MiAxOCAxNy41MTIyIDE3LjkwMiAxNy43MDcyIDE3LjcwN0MxOC4wOTgyIDE3LjMxNiAxOC4wOTgyIDE2LjY4NCAxNy43MDcyIDE2LjI5M0wxMy40MTQyIDEyWiIgZmlsbD0iIzlEOUQ5RCIvPgo8bWFzayBpZD0ibWFzazAiIG1hc2stdHlwZT0iYWxwaGEiIG1hc2tVbml0cz0idXNlclNwYWNlT25Vc2UiIHg9IjYiIHk9IjUiIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMTMuNDE0MiAxMkwxNy43MDcyIDcuNzA3MDFDMTguMDk4MiA3LjMxNjAxIDE4LjA5ODIgNi42ODQwMSAxNy43MDcyIDYuMjkzMDFDMTcuMzE2MiA1LjkwMjAxIDE2LjY4NDIgNS45MDIwMSAxNi4yOTMzIDYuMjkzMDFMMTIuMDAwMiAxMC41ODZMNy43MDcyNSA2LjI5MzAxQzcuMzE2MjUgNS45MDIwMSA2LjY4NDI1IDUuOTAyMDEgNi4yOTMyNSA2LjI5MzAxQzUuOTAyMjUgNi42ODQwMSA1LjkwMjI1IDcuMzE2MDEgNi4yOTMyNSA3LjcwNzAxTDEwLjU4NjIgMTJMNi4yOTMyNSAxNi4yOTNDNS45MDIyNSAxNi42ODQgNS45MDIyNSAxNy4zMTYgNi4yOTMyNSAxNy43MDdDNi40ODgyNSAxNy45MDIgNi43NDQyNSAxOCA3LjAwMDI1IDE4QzcuMjU2MjUgMTggNy41MTIyNSAxNy45MDIgNy43MDcyNSAxNy43MDdMMTIuMDAwMiAxMy40MTRMMTYuMjkzMyAxNy43MDdDMTYuNDg4MiAxNy45MDIgMTYuNzQ0MyAxOCAxNy4wMDAyIDE4QzE3LjI1NjIgMTggMTcuNTEyMiAxNy45MDIgMTcuNzA3MiAxNy43MDdDMTguMDk4MiAxNy4zMTYgMTguMDk4MiAxNi42ODQgMTcuNzA3MiAxNi4yOTNMMTMuNDE0MiAxMloiIGZpbGw9IndoaXRlIi8+CjwvbWFzaz4KPGcgbWFzaz0idXJsKCNtYXNrMCkiPgo8cmVjdCB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIGZpbGw9IiM5RDlEOUQiLz4KPC9nPgo8L3N2Zz4K"
										alt="close">
							</button>
						</div>
						<div class="d-flex align-items-center my-4"><h6 class="fw-bold mr-4 mb-0">Rate Product</h6>
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
							       class="w-100 mr-4 form-control">
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
	<script>
        $('#add-cart-form').on('submit', function (e) {
            e.preventDefault()
            console.log(e, $(this).serializeArray())
        })
	</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>