<?= $this->extend('layouts/master') ?>
<?= $this->section('links') ?>
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div id="details">
		<div class="container">
			<nav style="margin-top:60px;border-bottom:;margin-bottom:0" class="" aria-label="breadcrumb">
				<div class="breadcrumb"></div>
			</nav>
		</div>

		<div class="card mb-3 py-5" style="background-color: #121e2d">
			<div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(/images/dash/icons/spot-illustrations/corner-4.png);"></div>
			<div class="card-body position-relative">
				<div class="row">
					<div class="col text-light text-center">
						<h1><i class="fas fa-check-circle text-success"></i></h1>
						<p>Congratulations, your order has been place successfully.</p>
						<h3>Thank you!</h3>
					</div>
				</div>
			</div>
		</div>

		<hr/>

		<div class="container">
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


<?= $this->section('scripts') ?>
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