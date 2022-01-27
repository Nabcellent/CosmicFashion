<?= $this->extend('Admin/layouts/master') ?>
<?= $this->section('title') ?>
<?= $product->name ?>
<?= $this->endSection() ?>
<?= $this->section('links') ?>
	<link href="/vendor/admin/swiper/swiper-bundle.min.css" rel="stylesheet">
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="card mb-3">
		<div class="bg-holder d-none d-lg-block bg-card"
		     style="background-image:url(/images/dash/icons/spot-illustrations/corner-4.png);"></div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-5 ps-0">
					<div class="weekly-sales w-100 h-100"></div>
				</div>
				<div class="col-md-7">
					<h5>Purchases in the last seven days.</h5>
					<div class="mb-0">
						Total:
						<div class="fw-bolder text-danger" id="count-up">0</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card mb-3">
		<div class="card-body">
			<div class="row">
				<div class="col-lg-6 mb-4 mb-lg-0">
					<div class="product-slider" id="galleryTop" style="min-height:20rem">
						<div class="swiper-container theme-slider position-lg-absolute all-0"
						     data-swiper='{"autoHeight":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"thumb":{"spaceBetween":5,"slidesPerView":5,"loop":true,"freeMode":true,"grabCursor":true,"loopedSlides":5,"centeredSlides":true,"slideToClickedSlide":true,"watchSlidesVisibility":true,"watchSlidesProgress":true,"parent":"#galleryTop"},"slideToClickedSlide":true}'>
							<div class="swiper-wrapper h-100">
								<div class="swiper-slide h-100">
									<img class="rounded-1 fit-cover h-100 w-100"
									     src="/images/products/<?= $product->image ?>" alt="Product image"/>
								</div>
								<div class="swiper-slide h-100">
									<img class="rounded-1 fit-cover h-100 w-100"
									     src="../../../assets/img/products/1-2.jpg" alt=""/>
								</div>
								<div class="swiper-slide h-100">
									<img class="rounded-1 fit-cover h-100 w-100"
									     src="../../../assets/img/products/1-3.jpg" alt=""/>
								</div>
							</div>
							<div class="swiper-nav">
								<div class="swiper-button-next swiper-button-white"></div>
								<div class="swiper-button-prev swiper-button-white"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<h5><?= $product->name ?></h5>
					<a class="fs--1 mb-2 d-block" href="#!"><?= $product->subCategory->name ?></a>
					<div class="fs--2 mb-3 d-inline-block text-decoration-none">
						<span class="fa fa-star text-warning"></span>
						<span class="fa fa-star text-warning"></span>
						<span class="fa fa-star text-warning"></span>
						<span class="fa fa-star text-warning"></span>
						<span class="fa fa-star-half-alt text-warning star-icon"></span>
						<span class="ms-1 text-600">(8)</span>
					</div>
					<p class="fs--1"><?= $product->description ?></p>
					<h4 class="d-flex align-items-center mb-3">
						<span class="text-warning me-2">KSH.<?= $product->discounted_price ?>/=</span>
						<span class="me-1 fs--1 text-500 <?= !$product->discount
                            ? 'd-none'
                            : '' ?>">
							<del class="me-2">KSH.<?= $product->price ?>/-</del>
							<strong>-<?= $product->discount ?>%</strong>
						</span>
					</h4>
					<p class="fs--1">Stock: <strong class="text-success"><?= $product->stock ?></strong></p>
					<hr>
					<h6>Created: <span class="text-warning"><?= differenceForHumans($product->created_at) ?></span></h6>
					<h6>Created by: <a href="#"><?= $product->user->email ?></a></h6>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="overflow-hidden mt-4">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active ps-0" id="reviews-tab" data-bs-toggle="tab"
								   href="#tab-reviews" role="tab" aria-controls="tab-reviews"
								   aria-selected="false">Reviews</a>
							</li>
							<li class="nav-item">
								<a class="nav-link px-2 px-md-3" id="description-tab" data-bs-toggle="tab"
								   href="#tab-description" role="tab" aria-controls="tab-description"
								   aria-selected="true">Description</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="tab-reviews" role="tabpanel"
							     aria-labelledby="reviews-tab">
								<div class="row mt-3">
									<div class="col mb-4 mb-lg-0">
										<div class="mb-1">
											<span class="fa fa-star text-warning fs--1"></span>
											<span class="fa fa-star text-warning fs--1"></span>
											<span class="fa fa-star text-warning fs--1"></span>
											<span class="fa fa-star text-warning fs--1"></span>
											<span class="fa fa-star text-warning fs--1"></span>
											<span class="ms-3 text-dark fw-semi-bold">Awesome support, great code 😍</span>
										</div>
										<p class="fs--1 mb-2 text-600">By Drik Smith • October 14, 2019</p>
										<p class="mb-0">You shouldn't need to read a review to see how nice and polished
											this theme is. So I'll tell you something you won't find in the demo. After
											the download I had a technical question, emailed the team and got a response
											right from the team CEO with helpful advice.</p>
										<hr class="my-4"/>
										<div class="mb-1">
											<span class="fa fa-star text-warning fs--1"></span>
											<span class="fa fa-star text-warning fs--1"></span>
											<span class="fa fa-star text-warning fs--1"></span>
											<span class="fa fa-star text-warning fs--1"></span>
											<span class="fa fa-star-half-alt text-warning star-icon fs--1"></span>
											<span class="ms-3 text-dark fw-semi-bold">Outstanding Design, Awesome Support</span>
										</div>
										<p class="fs--1 mb-2 text-600">By Liane • December 14, 2019</p>
										<p class="mb-0">This really is an amazing template - from the style to the font
											- clean layout. SO worth the money! The demo pages show off what Bootstrap 4
											can impressively do. Great template!! Support response is FAST and the team
											is amazing - communication is important.</p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="tab-description" role="tabpanel"
							     aria-labelledby="description-tab">
								<div class="mt-3">
									<p>Over the years, Apple has built a reputation for releasing its products with a
										lot of fanfare – but that didn’t exactly happen for the MacBook Pro 2018.
										Rather, Apple’s latest pro laptop experienced a subdued launch, in spite of it
										offering a notable spec upgrade over the 2017 model – along with an improved
										keyboard. And, as with previous generations the 15-inch MacBook Pro arrives
										alongside a 13-inch model.</p>
									<p>Apple still loves the MacBook Pro though, despite the quiet release. This is
										because, while the iPhone XS and iPad, along with the 12-inch MacBook, are aimed
										at everyday consumers, the MacBook Pro has always aimed at the creative and
										professional audience. This new MacBook Pro brings a level of performance (and
										price) unlike its more consumer-oriented devices. </p>
									<p>Still, Apple wants mainstream users to buy the MacBook Pro, too. So, if you’re
										just looking for the most powerful MacBook on the market, you’ll love this new
										MacBook Pro. Just keep in mind that, while the keyboard has been updated, there
										are still some issues with it.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?= $this->section('scripts') ?>
	<script src="/js/admin/dynamic.js"></script>
	<script src="/vendor/swiper/swiper.min.js"></script>
	<script src="/vendor/admin/rater-js/index.js"></script>
	<script src="/vendor/admin/countup/countUp.umd.js"></script>
	<script src="/js/admin/chart.js"></script>
	<script>
        $(() => {
            $('#table_id').DataTable({});

            $.ajax({
                url: '<?= route_to('admin.product.purchases.chart', $product->id) ?>',
                dataType: 'json',
                success: response => {
                    InitWeeklySales(response)

                    let countUp = new window.countUp.CountUp($('#count-up').get(0), response.total, {
                        duration: 7
                    });

                    !countUp.error ? countUp.start() : console.error(countUp.error);
                },
                error: error => console.log(error)
            })
        })
	</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>