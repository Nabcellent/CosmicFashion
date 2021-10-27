<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

	<div id="home">
		<div id="banner" class="carousel slide mt-5" data-bs-ride="carousel">
			<ol class="carousel-indicators">
				<li data-bs-target="#banner" data-bs-slide-to="0" aria-current="true"></li>
				<li data-bs-target="#banner" data-bs-slide-to="1" class="active" aria-current="true"></li>
				<li data-bs-target="#banner" data-bs-slide-to="2" aria-current="true"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item">
					<section class="index_carousel__ZHIA6 index_firstImg__1dHS_">
						<div class="h-100 container">
							<div class="h-100 row px-5">
								<div class="h-100 d-flex flex-column justify-content-center align-items-center align-items-md-start col-sm-12"><p
											class="text-uppercase text-primary fw-bold mb-2">Dress</p>
									<h3 class="mb-2">get all</h3>
									<h2 class="text-uppercase fw-bold mt-1">the good stuff</h2>
									<button type="button"
									        class="text-uppercase mt-4 mr-auto fw-bold d-flex align-items-center index_viewMoreBtn__JTu_3 btn btn-outline-primary">
										View More
										<i class="ml-2 index_arrowRight__2oGnW"></i>
									</button>
								</div>
							</div>
						</div>
					</section>
				</div>
				<div class="active carousel-item">
					<section class="index_carousel__ZHIA6 index_secondImg__2MiAO">
						<div class="h-100 container">
							<div class="h-100 row px-5">
								<div class="h-100 d-flex flex-column justify-content-center align-items-center align-items-md-start col-sm-12"><p
											class="text-uppercase text-primary fw-bold mb-2">Dress</p>
									<h3 class="mb-2">get all</h3>
									<h2 class="text-uppercase fw-bold mt-1">the good stuff</h2>
									<button type="button"
									        class="text-uppercase mt-4 mr-auto fw-bold d-flex align-items-center index_viewMoreBtn__JTu_3 btn btn-outline-primary">
										View More
										<i class="ml-2 index_arrowRight__2oGnW"></i>
									</button>
								</div>
							</div>
						</div>
					</section>
				</div>
				<div class="carousel-item">
					<section class="index_carousel__ZHIA6 index_thirdImg__3Z_FV">
						<div class="h-100 container">
							<div class="h-100 row px-5">
								<div class="h-100 d-flex flex-column justify-content-center align-items-center align-items-md-start col-sm-12"><p
											class="text-uppercase text-primary fw-bold mb-2">Dress</p>
									<h2 class="mb-2">get all</h2>
									<h1 class="text-uppercase fw-bold mt-1">the good stuff</h1>
									<button type="button"
									        class="text-uppercase mt-4 mr-auto fw-bold d-flex align-items-center index_viewMoreBtn__JTu_3 btn btn-outline-primary">
										View More
										<i class="ml-2 index_arrowRight__2oGnW"></i>
									</button>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<a class="carousel-control-prev" role="button" href="#" data-bs-target="#banner" data-bs-slide="prev">
				<span aria-hidden="true" class="carousel-control-prev-icon"></span>
				<span class="sr-only">prev</span>
			</a>
			<a class="carousel-control-next" role="button" href="#" data-bs-target="#banner" data-bs-slide="next">
				<span aria-hidden="true" class="carousel-control-next-icon"></span>
				<span class="sr-only">next</span>
			</a>
		</div>
		<div style="margin-top:80px;margin-bottom:80px" class="container"><h3 class="text-center fw-bold mb-4">New Arrivals</h3>
			<div class="justify-content-center mb-2 row">
				<div class="col-sm-8">
					<p class="text-center text-muted mb-4">Check out our new furniture collection! Cozy sofa, fancy chair, wooden
						casket, and many more. The new collection brings an informal elegance to your home.</p>
				</div>
			</div>
			<div class="row">
                <?php foreach($newArrivals as $product): ?>
					<div class="mb-4 index_product__2R5IL col-12 col-sm-6 col-md-3">
						<div style="position:relative">
							<a href="<?= route_to('shop.show', $product->id) ?>">
								<div style="background:url(/images/products/<?= $product->image ?>) no-repeat center;background-size:contain;transition:all .65s ease"
								     class="index_productImage__3VSiQ"></div>
							</a>
							<div class="d-flex flex-column justify-content-center index_product__actions__3kChI"
							     style="position:absolute;height:100%;top:0;right:15px">
								<button type="button" class="p-0 bg-transparent border-0 btn btn-secondary">
									<div class="mb-4 index_product__actions__heart__iF5CZ"></div>
								</button>
								<button type="button" class="p-0 bg-transparent border-0 btn btn-secondary">
									<div class="mb-4 index_product__actions__max__3rnIa"></div>
								</button>
								<button type="button" class="p-0 bg-transparent border-0 btn btn-secondary">
									<div class="mb-4 index_product__actions__cart__2Y30W"></div>
								</button>
							</div>
						</div>
						<div class="index_productInfo__2hSIT">
							<div>
								<a class="mt-3 text-muted mb-0 d-inline-block" href="category/1fcb7ece-6373-405d-92ef-3f3c4e7dc711.html">Furniture</a>
								<a href="products/afaf98d5-4060-4408-967b-c4f4af3d1863.html">
									<h6 class="fw-bold font-size-base mt-1" style="font-size:16px"><?= $product->name ?></h6>
								</a>
								<h6 style="font-size:16px">KSH.<?= $product->price ?></h6>
							</div>
						</div>
					</div>
                <?php endforeach; ?>
			</div>
			<div class="d-flex justify-content-center row">
				<button type="button" class="text-uppercase mx-auto mt-5 fw-bold btn btn-outline-primary">view more</button>
			</div>
		</div>
		<section class="index_promo__gOmpU">
			<div class="h-100 container">
				<div class="h-100 row">
					<div class="h-100 d-flex flex-column justify-content-center align-items-center align-items-md-start col-12 col-md-6"><h5
								class="text-uppercase fw-bold mb-3">news and inspiration</h5>
						<h1 class="text-uppercase fw-bold mb-0 index_newArrivals__3EhqC" style="font-size:50px">new arrivals</h1>
						<div class="index_stroke__2BGza mt-4" style="margin-bottom:30px"></div>
						<div class="index_promo__indication__3B7OO">
							<section class="index_promo__indication__block__3Vblf"><h5 id="promo_days" class="mb-0">0</h5>
								<p class="mb-0">days</p></section>
							<section class="index_promo__indication__block__3Vblf"><h5 id="promo_hours" class="mb-0">0</h5>
								<p class="mb-0">hours</p></section>
							<section class="index_promo__indication__block__3Vblf"><h5 id="promo_mins" class="mb-0">0</h5>
								<p class="mb-0">mins</p></section>
							<section class="index_promo__indication__block__3Vblf"><h5 id="promo_secs" class="mb-0">0</h5>
								<p class="mb-0">secs</p></section>
						</div>
						<section class="d-flex mt-5 align-itens-center">
							<h2 class="text-muted mr-3 mb-0 d-flex align-items-center">
								<del>KSH.140,56</del>
							</h2>
							<h1 class="text-primary fw-bold mb-0">KSH.70</h1></section>
					</div>
				</div>
			</div>
		</section>
		<div style="margin-top:80px;margin-bottom:80px" class="container"><h3 class="text-center fw-bold mb-4">Top Selling Products</h3>
			<div class="justify-content-center mb-2 row">
				<div class="col-sm-8"><p class="text-center text-muted mb-4">These furniture sets will become an essential part of an ecosystem of
						elements in your home. Your domestic space will easily embrace these tables, chairs, and bookshelves.</p></div>
			</div>
			<div class="row">
				<div class="col-12 col-md-6">
					<section class="index_top_first__31BMD img-fluid"><h6 class="text-uppercase text-primary fw-bold">All new</h6>
						<h2 class="fw-bold">SPRING THINGS</h2>
						<div class="index_stroke__2BGza"></div>
						<h6 class="text-muted mt-4">Save up to 30%</h6></section>
				</div>
				<div class="col-12 col-md-6">
					<div class="row">
						<div class="index_topMargin__3WKar col-12 col-md-6">
							<div class="index_top2__3roD5 img-fluid">
								<div><h6 class="text-primary fw-bold">Online Exclusive</h6>
									<p><u>shop now</u></p></div>
							</div>
							<div class="index_top4__1fHFJ img-fluid">
								<div class="index_label__2nfPo"><h6 class="fw-bold text-uppercase mb-0 text-white">spring sale</h6></div>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="index_top3__3tocY img-fluid">
								<div class="index_label__2nfPo"><h6 class="fw-bold text-uppercase mb-0 text-white">70% SALE</h6></div>
							</div>
							<div class="index_top5__3bzPr img-fluid">
								<div>
									<div class="index_stroke__2BGza"></div>
									<div><p class="mb-0">collection</p><h5 class="fw-bold text-primary text-uppercase">summer</h5></div>
									<div class="index_stroke__2BGza"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <?= $this->include('partials/info_block') ?>
        <?= $this->include('partials/social') ?>
	</div>

	<script>
        let countDownDate = new Date("Jan 5, 2022 17:30:25").getTime();
        let x = setInterval(function () {
            let now = new Date().getTime(); // Get today's date and time
            let distance = countDownDate - now; // Find the distance between now and the count down date

            // Time calculations for days, hours, minutes and seconds
            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            //  What to do when time expires
	        // if(distance < 0)//  Do something

            $('#promo_days').html(days)
            $('#promo_hours').html(hours)
            $('#promo_mins').html(minutes)
            $('#promo_secs').html(seconds)
        }, 1000);
	</script>

<?= $this->endSection() ?>