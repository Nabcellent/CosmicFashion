<?= $this->extend('Admin/layouts/master') ?>
<?= $this->section('title') ?>
	<?= $product->name ?>
<?= $this->endSection() ?>
<?= $this->section('links') ?>
	<link href="/vendor/admin/swiper/swiper-bundle.min.css" rel="stylesheet">
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="card mb-3">
		<div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(/images/dash/icons/spot-illustrations/corner-4.png);"></div>
		<div class="card-body position-relative">
			<div class="row">
				<div class="col-lg-8">
					<h3>Bulk Select</h3>
					<p class="mb-0">
						Bulk select allows users to check multiple checkboxes at once and toggles a UI for bulk actions to be performed
						for the selected items.
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="card mb-3">
		<div class="card-body">
			<div class="row">
				<div class="col-lg-6 mb-4 mb-lg-0">
					<div class="product-slider" id="galleryTop">
						<div class="swiper-container theme-slider position-lg-absolute all-0" data-swiper='{"autoHeight":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"thumb":{"spaceBetween":5,"slidesPerView":5,"loop":true,"freeMode":true,"grabCursor":true,"loopedSlides":5,"centeredSlides":true,"slideToClickedSlide":true,"watchSlidesVisibility":true,"watchSlidesProgress":true,"parent":"#galleryTop"},"slideToClickedSlide":true}'>
							<div class="swiper-wrapper h-100">
								<div class="swiper-slide h-100"><img class="rounded-1 fit-cover h-100 w-100" src="../../../assets/img/products/1.jpg" alt="" /></div>
								<div class="swiper-slide h-100"><img class="rounded-1 fit-cover h-100 w-100" src="../../../assets/img/products/1-2.jpg" alt="" /></div>
								<div class="swiper-slide h-100"> <img class="rounded-1 fit-cover h-100 w-100" src="../../../assets/img/products/1-3.jpg" alt="" /></div>
								<div class="swiper-slide h-100"> <img class="rounded-1 fit-cover h-100 w-100" src="../../../assets/img/products/1-4.jpg" alt="" /></div>
								<div class="swiper-slide h-100"> <img class="rounded-1 fit-cover h-100 w-100" src="../../../assets/img/products/1-5.jpg" alt="" /></div>
								<div class="swiper-slide h-100"> <img class="rounded-1 fit-cover h-100 w-100" src="../../../assets/img/products/1-6.jpg" alt="" /></div>
							</div>
							<div class="swiper-nav">
								<div class="swiper-button-next swiper-button-white"></div>
								<div class="swiper-button-prev swiper-button-white"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<h5>Apple MacBook Pro (15" Retina, Touch Bar, 2.2GHz 6-Core Intel Core i7, 16GB RAM, 256GB SSD) - Space Gray (Latest Model)</h5><a class="fs--1 mb-2 d-block" href="#!">Computer &amp; Accessories</a>
					<div class="fs--2 mb-3 d-inline-block text-decoration-none"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star-half-alt text-warning star-icon"></span><span class="ms-1 text-600">(8)</span></div>
					<p class="fs--1">Testing conducted by Apple in October 2018 using pre-production 2.9GHz 6‑core Intel Core i9‑based 15-inch MacBook Pro systems with Radeon Pro Vega 20 graphics, and shipping 2.9GHz 6‑core Intel Core i9‑based 15‑inch MacBook Pro systems with Radeon Pro 560X graphics, both configured with 32GB of RAM and 4TB SSD.</p>
					<h4 class="d-flex align-items-center"><span class="text-warning me-2">$1200</span><span class="me-1 fs--1 text-500"><del class="me-1">$2400</del><strong>-50%</strong></span></h4>
					<p class="fs--1 mb-1"> <span>Shipping Cost: </span><strong>$50</strong></p>
					<p class="fs--1">Stock: <strong class="text-success">Available</strong></p>
					<p class="fs--1 mb-3">Tags: <a class="ms-2" href="#!">Computer,</a><a class="ms-1" href="#!">Mac Book,</a><a class="ms-1" href="#!">Mac Book Pro,</a><a class="ms-1" href="#!">Laptop </a></p>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="overflow-hidden mt-4">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item"><a class="nav-link active ps-0" id="description-tab" data-bs-toggle="tab" href="#tab-description" role="tab" aria-controls="tab-description" aria-selected="true">Description</a></li>
							<li class="nav-item"><a class="nav-link px-2 px-md-3" id="reviews-tab" data-bs-toggle="tab" href="#tab-reviews" role="tab" aria-controls="tab-reviews" aria-selected="false">Reviews</a></li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="tab-description" role="tabpanel" aria-labelledby="description-tab">
								<div class="mt-3">
									<p>Over the years, Apple has built a reputation for releasing its products with a lot of fanfare – but that didn’t exactly happen for the MacBook Pro 2018. Rather, Apple’s latest pro laptop experienced a subdued launch, in spite of it offering a notable spec upgrade over the 2017 model – along with an improved keyboard. And, as with previous generations the 15-inch MacBook Pro arrives alongside a 13-inch model.</p>
									<p>Apple still loves the MacBook Pro though, despite the quiet release. This is because, while the iPhone XS and iPad, along with the 12-inch MacBook, are aimed at everyday consumers, the MacBook Pro has always aimed at the creative and professional audience. This new MacBook Pro brings a level of performance (and price) unlike its more consumer-oriented devices. </p>
									<p>Still, Apple wants mainstream users to buy the MacBook Pro, too. So, if you’re just looking for the most powerful MacBook on the market, you’ll love this new MacBook Pro. Just keep in mind that, while the keyboard has been updated, there are still some issues with it.</p>
									<p>There’s enough of a difference between the two sizes when it comes to performance to warrant two separate reviews, and here we’ll be looking at how the flagship 15-inch MacBook Pro performs in 2019.</p>
									<p>It's build quality and design is batter than elit. Numquam excepturi a debitis, sint voluptates, nam odit vel delectus id repellendus vero reprehenderit quidem totam praesentium vitae nesciunt deserunt. Sint, veniam?</p>
								</div>
							</div>
							<div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="reviews-tab">
								<div class="row mt-3">
									<div class="col-lg-6 mb-4 mb-lg-0">
										<div class="mb-1"><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star text-warning fs--1"></span><span class="ms-3 text-dark fw-semi-bold">Awesome support, great code 😍</span></div>
										<p class="fs--1 mb-2 text-600">By Drik Smith • October 14, 2019</p>
										<p class="mb-0">You shouldn't need to read a review to see how nice and polished this theme is. So I'll tell you something you won't find in the demo. After the download I had a technical question, emailed the team and got a response right from the team CEO with helpful advice.</p>
										<hr class="my-4" />
										<div class="mb-1"><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star-half-alt text-warning star-icon fs--1"></span><span class="ms-3 text-dark fw-semi-bold">Outstanding Design, Awesome Support</span></div>
										<p class="fs--1 mb-2 text-600">By Liane • December 14, 2019</p>
										<p class="mb-0">This really is an amazing template - from the style to the font - clean layout. SO worth the money! The demo pages show off what Bootstrap 4 can impressively do. Great template!! Support response is FAST and the team is amazing - communication is important.</p>
									</div>
									<div class="col-lg-6 ps-lg-5">
										<form>
											<h5 class="mb-3">Write your Review</h5>
											<div class="mb-3"><label class="form-label">Ratting: </label>
												<div class="d-block" data-rater='{"starSize":32,"step":0.5}'></div>
											</div>
											<div class="mb-3"><label class="form-label" for="formGroupNameInput">Name:</label><input class="form-control" id="formGroupNameInput" type="text" /></div>
											<div class="mb-3"><label class="form-label" for="formGroupEmailInput">Email:</label><input class="form-control" id="formGroupEmailInput" type="email" /></div>
											<div class="mb-3"><label class="form-label" for="formGrouptextareaInput">Review:</label><textarea class="form-control" id="formGrouptextareaInput" rows="3"></textarea></div><button class="btn btn-primary" type="submit">Submit</button>
										</form>
									</div>
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
	<script>
        $(() => {
            $('#table_id').DataTable({});
        })
	</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>