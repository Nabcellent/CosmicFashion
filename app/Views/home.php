<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

	<div id="home">
		<div id="banner" class="carousel slide" data-bs-ride="carousel">
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
											class="text-uppercase text-primary fw-bold mb-2">chair</p>
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
											class="text-uppercase text-primary fw-bold mb-2">chair</p>
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
											class="text-uppercase text-primary fw-bold mb-2">chair</p>
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
							<a href="products/afaf98d5-4060-4408-967b-c4f4af3d1863.html">
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
									<h6 class="fw-bold font-size-base mt-1" style="font-size:16px"><?= $product->title ?></h6>
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
		<hr/>
		<div class="InfoBlock_info__2a42M">
			<div class="h-100 container">
				<div class="h-100 justify-content-between flex-column flex-md-row align-items-center row">
					<div class="h-100 d-flex align-items-center InfoBlock_info__item__LaugH justify-content-center col-12 col-md-4">
						<section class="d-flex align-items-center">
							<img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgMCA0OCA0OCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0zOCAzNkMzOCAzNy4xMDQgMzcuMTA0IDM4IDM2IDM4QzM0Ljg5NiAzOCAzNCAzNy4xMDQgMzQgMzZDMzQgMzQuODk2IDM0Ljg5NiAzNCAzNiAzNEMzNy4xMDQgMzQgMzggMzQuODk2IDM4IDM2Wk0yNCAzMEg4TDguMDMyIDEwSDMwTDI5Ljk2OCAzMEgyNFpNMTQgMzZDMTQgMzcuMTA0IDEzLjEwNCAzOCAxMiAzOEMxMC44OTYgMzggMTAgMzcuMTA0IDEwIDM2QzEwIDM0Ljg5NiAxMC44OTYgMzQgMTIgMzRDMTMuMTA0IDM0IDE0IDM0Ljg5NiAxNCAzNlpNNDAgMjQuOTZWMzBIMzRWMjAuMTYyTDQwIDI0Ljk2Wk00My4yNSAyMi40MzhMMzQgMTUuMDM4VjEwQzM0IDcuNzk0IDMyLjM3NCA2IDMwLjM3NCA2SDcuNjI0QzUuNjI2IDYgNCA3Ljc5NCA0IDEwVjMwQzQgMzEuNzQ2IDUuMDI2IDMzLjIxOCA2LjQ0MiAzMy43NjRDNi4xNjIgMzQuNDU2IDYgMzUuMjA4IDYgMzZDNiAzOS4zMDggOC42OTIgNDIgMTIgNDJDMTUuMzA4IDQyIDE4IDM5LjMwOCAxOCAzNkMxOCAzNS4yOTQgMTcuODU2IDM0LjYyOCAxNy42MyAzNEgyNEgzMC4zN0MzMC4xNDQgMzQuNjI4IDMwIDM1LjI5NCAzMCAzNkMzMCAzOS4zMDggMzIuNjkyIDQyIDM2IDQyQzM5LjMwOCA0MiA0MiAzOS4zMDggNDIgMzZDNDIgMzUuMjk0IDQxLjg1NiAzNC42MjggNDEuNjMgMzRINDJDNDMuMTA2IDM0IDQ0IDMzLjEwNiA0NCAzMlYyNEM0NCAyMy4zOTIgNDMuNzI0IDIyLjgxOCA0My4yNSAyMi40MzhaIiBmaWxsPSIjQkQ3NDRDIi8+CjxtYXNrIGlkPSJtYXNrMCIgbWFzay10eXBlPSJhbHBoYSIgbWFza1VuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeD0iNCIgeT0iNiIgd2lkdGg9IjQwIiBoZWlnaHQ9IjM2Ij4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0zOCAzNkMzOCAzNy4xMDQgMzcuMTA0IDM4IDM2IDM4QzM0Ljg5NiAzOCAzNCAzNy4xMDQgMzQgMzZDMzQgMzQuODk2IDM0Ljg5NiAzNCAzNiAzNEMzNy4xMDQgMzQgMzggMzQuODk2IDM4IDM2Wk0yNCAzMEg4TDguMDMyIDEwSDMwTDI5Ljk2OCAzMEgyNFpNMTQgMzZDMTQgMzcuMTA0IDEzLjEwNCAzOCAxMiAzOEMxMC44OTYgMzggMTAgMzcuMTA0IDEwIDM2QzEwIDM0Ljg5NiAxMC44OTYgMzQgMTIgMzRDMTMuMTA0IDM0IDE0IDM0Ljg5NiAxNCAzNlpNNDAgMjQuOTZWMzBIMzRWMjAuMTYyTDQwIDI0Ljk2Wk00My4yNSAyMi40MzhMMzQgMTUuMDM4VjEwQzM0IDcuNzk0IDMyLjM3NCA2IDMwLjM3NCA2SDcuNjI0QzUuNjI2IDYgNCA3Ljc5NCA0IDEwVjMwQzQgMzEuNzQ2IDUuMDI2IDMzLjIxOCA2LjQ0MiAzMy43NjRDNi4xNjIgMzQuNDU2IDYgMzUuMjA4IDYgMzZDNiAzOS4zMDggOC42OTIgNDIgMTIgNDJDMTUuMzA4IDQyIDE4IDM5LjMwOCAxOCAzNkMxOCAzNS4yOTQgMTcuODU2IDM0LjYyOCAxNy42MyAzNEgyNEgzMC4zN0MzMC4xNDQgMzQuNjI4IDMwIDM1LjI5NCAzMCAzNkMzMCAzOS4zMDggMzIuNjkyIDQyIDM2IDQyQzM5LjMwOCA0MiA0MiAzOS4zMDggNDIgMzZDNDIgMzUuMjk0IDQxLjg1NiAzNC42MjggNDEuNjMgMzRINDJDNDMuMTA2IDM0IDQ0IDMzLjEwNiA0NCAzMlYyNEM0NCAyMy4zOTIgNDMuNzI0IDIyLjgxOCA0My4yNSAyMi40MzhaIiBmaWxsPSJ3aGl0ZSIvPgo8L21hc2s+CjxnIG1hc2s9InVybCgjbWFzazApIj4KPHJlY3Qgd2lkdGg9IjQ4IiBoZWlnaHQ9IjQ4IiBmaWxsPSIjQkQ3NDRDIi8+CjwvZz4KPC9zdmc+Cg=="
							     class="mr-3"/>
							<div><h5 class="fw-bold text-uppercase">free shipping</h5>
								<p class="text-muted mb-0">On all orders of KSH.150</p></div>
						</section>
					</div>
					<div class="h-100 d-flex align-items-center InfoBlock_info__item__LaugH justify-content-center col-12 col-md-4">
						<section class="d-flex align-items-center">
							<img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgMCA0OCA0OCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0zNiAzOEMzMy43OTQgMzggMzIgMzYuMjA2IDMyIDM0QzMyIDMxLjc5NCAzMy43OTQgMzAgMzYgMzBDMzguMjA2IDMwIDQwIDMxLjc5NCA0MCAzNEM0MCAzNi4yMDYgMzguMjA2IDM4IDM2IDM4Wk0xMiAzMEMxNC4yMDYgMzAgMTYgMzEuNzk0IDE2IDM0QzE2IDM2LjIwNiAxNC4yMDYgMzggMTIgMzhDOS43OTQgMzggOCAzNi4yMDYgOCAzNEM4IDMxLjc5NCA5Ljc5NCAzMCAxMiAzMFpNMjQgNEMxMi45NzIgNCA0IDEzLjMgNCAyNC43MzJWMzRDNCAzOC40MTIgNy41ODggNDIgMTIgNDJDMTYuNDEyIDQyIDIwIDM4LjQxMiAyMCAzNEMyMCAyOS41ODggMTYuNDEyIDI2IDEyIDI2QzEwLjUzNiAyNiA5LjE4MiAyNi40MjQgOCAyNy4xMTRWMjQuNzMyQzggMTUuNTA2IDE1LjE3OCA4IDI0IDhDMzIuODIyIDggNDAgMTUuNTA2IDQwIDI0LjczMlYyNy4xMTRDMzguODE4IDI2LjQyNCAzNy40NjQgMjYgMzYgMjZDMzEuNTg4IDI2IDI4IDI5LjU4OCAyOCAzNEMyOCAzOC40MTIgMzEuNTg4IDQyIDM2IDQyQzQwLjQxMiA0MiA0NCAzOC40MTIgNDQgMzRWMjQuNzMyQzQ0IDEzLjMgMzUuMDI4IDQgMjQgNFoiIGZpbGw9IiNCRDc0NEMiLz4KPG1hc2sgaWQ9Im1hc2swIiBtYXNrLXR5cGU9ImFscGhhIiBtYXNrVW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4PSI0IiB5PSI0IiB3aWR0aD0iNDAiIGhlaWdodD0iMzgiPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTM2IDM4QzMzLjc5NCAzOCAzMiAzNi4yMDYgMzIgMzRDMzIgMzEuNzk0IDMzLjc5NCAzMCAzNiAzMEMzOC4yMDYgMzAgNDAgMzEuNzk0IDQwIDM0QzQwIDM2LjIwNiAzOC4yMDYgMzggMzYgMzhaTTEyIDMwQzE0LjIwNiAzMCAxNiAzMS43OTQgMTYgMzRDMTYgMzYuMjA2IDE0LjIwNiAzOCAxMiAzOEM5Ljc5NCAzOCA4IDM2LjIwNiA4IDM0QzggMzEuNzk0IDkuNzk0IDMwIDEyIDMwWk0yNCA0QzEyLjk3MiA0IDQgMTMuMyA0IDI0LjczMlYzNEM0IDM4LjQxMiA3LjU4OCA0MiAxMiA0MkMxNi40MTIgNDIgMjAgMzguNDEyIDIwIDM0QzIwIDI5LjU4OCAxNi40MTIgMjYgMTIgMjZDMTAuNTM2IDI2IDkuMTgyIDI2LjQyNCA4IDI3LjExNFYyNC43MzJDOCAxNS41MDYgMTUuMTc4IDggMjQgOEMzMi44MjIgOCA0MCAxNS41MDYgNDAgMjQuNzMyVjI3LjExNEMzOC44MTggMjYuNDI0IDM3LjQ2NCAyNiAzNiAyNkMzMS41ODggMjYgMjggMjkuNTg4IDI4IDM0QzI4IDM4LjQxMiAzMS41ODggNDIgMzYgNDJDNDAuNDEyIDQyIDQ0IDM4LjQxMiA0NCAzNFYyNC43MzJDNDQgMTMuMyAzNS4wMjggNCAyNCA0WiIgZmlsbD0id2hpdGUiLz4KPC9tYXNrPgo8ZyBtYXNrPSJ1cmwoI21hc2swKSI+CjxyZWN0IHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgZmlsbD0iI0JENzQ0QyIvPgo8L2c+Cjwvc3ZnPgo="
							     class="mr-3"/>
							<div><h5 class="fw-bold text-uppercase">24/7 support</h5>
								<p class="text-muted mb-0">Get help when you need it</p></div>
						</section>
					</div>
					<div class="h-100 d-flex align-items-center InfoBlock_info__item__LaugH justify-content-center col-12 col-md-4">
						<section class="d-flex align-items-center">
							<img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgMCA0OCA0OCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik00My4zNjU3IDIwLjY1MjFDNDMuMzUxMiAyMC42ODM5IDQzLjMzNjcgMjAuNzE1NyA0My4zMjMyIDIwLjc0OEM0My4zMDk1IDIwLjc4MTUgNDMuMjk4NyAyMC44MTY1IDQzLjI4NzkgMjAuODUxM0M0My4yNzA0IDIwLjkwOCA0My4yNTI5IDIwLjk2NDUgNDMuMjIzMiAyMS4wMTRDNDMuMTY0IDIxLjExMiA0My4wODY3IDIxLjE5NDQgNDMuMDA5MiAyMS4yNzY5QzQyLjk4NyAyMS4zMDA1IDQyLjk2NDkgMjEuMzI0IDQyLjk0MzIgMjEuMzQ4QzQyLjkxOSAyMS4zNzMgNDIuODk3NiAyMS40MDA1IDQyLjg3NjIgMjEuNDI3OUM0Mi44NDYzIDIxLjQ2NjMgNDIuODE2NSAyMS41MDQ1IDQyLjc3OTIgMjEuNTM2QzQyLjY2NzIgMjEuNjI3NSA0Mi41Mzc3IDIxLjY5MTEgNDIuNDA4NyAyMS43NTQ0QzQyLjM5OTYgMjEuNzU5IDQyLjM5MDQgMjEuNzYzNSA0Mi4zODEyIDIxLjc2OEM0Mi4zNTM5IDIxLjc4MTIgNDIuMzI4IDIxLjc5NzkgNDIuMzAyMSAyMS44MTQ1QzQyLjI2NTIgMjEuODM4MiA0Mi4yMjgzIDIxLjg2MTkgNDIuMTg3MiAyMS44NzZDNDEuOTcxMiAyMS45NTYgNDEuNzQxMiAyMiA0MS41MDMyIDIyQzQxLjM5NTIgMjIgNDEuMjgzMiAyMS45OTIgNDEuMTczMiAyMS45NzJMMzIuNjczMiAyMC41NjJDMzEuNTgzMiAyMC4zODIgMzAuODQ3MiAxOS4zNTIgMzEuMDI3MiAxOC4yNjJDMzEuMjA3MiAxNy4xNzQgMzIuMjM1MiAxNi40MjggMzMuMzI3MiAxNi42MThMMzYuNjE1MiAxNy4xNjJDMzQuMTI1MiAxMi43OSAyOS4zNzEyIDEwIDI0LjEzOTIgMTBDMTguMjIxMiAxMCAxMy4wMDcyIDEzLjQzNiAxMC44NTMyIDE4Ljc1QzEwLjUzOTIgMTkuNTMgOS43ODkxNyAyMCA4Ljk5OTE3IDIwQzguNzQ5MTcgMjAgOC40OTUxNyAxOS45NTQgOC4yNDkxNyAxOS44NTRDNy4yMjUxNyAxOS40NCA2LjczMTE3IDE4LjI3NCA3LjE0NzE3IDE3LjI1QzkuOTE1MTcgMTAuNDE2IDE2LjU4NTIgNiAyNC4xMzkyIDZDMzAuOTYzMiA2IDM3LjE2NTIgOS43NCA0MC4yOTUyIDE1LjU3Nkw0MS4wMzMyIDExLjYzQzQxLjIzNzIgMTAuNTQ2IDQyLjI4NTIgOS44MjggNDMuMzY3MiAxMC4wMzZDNDQuNDUzMiAxMC4yMzggNDUuMTY5MiAxMS4yODQgNDQuOTY1MiAxMi4zN0w0My40NjcyIDIwLjM3QzQzLjQ0OCAyMC40NzIgNDMuNDA2OSAyMC41NjIgNDMuMzY1NyAyMC42NTIxWk0zNy4xNDcgMjkuMjUwNEMzNy41NjEgMjguMjI0NCAzOC43MjkgMjcuNzMyNCAzOS43NTEgMjguMTQ2NEM0MC43NzUgMjguNTYwNCA0MS4yNjkgMjkuNzI2NCA0MC44NTMgMzAuNzUwNEMzOC4wODUgMzcuNTg0NCAzMS40MTUgNDIuMDAwNCAyMy44NjEgNDIuMDAwNEMxNy4wMzcgNDIuMDAwNCAxMC44MzUgMzguMjYwNCA3LjcwNDk3IDMyLjQyNDRMNi45NjQ5NyAzNi4zNjg0QzYuNzg2OTcgMzcuMzMwNCA1Ljk0Njk3IDM4LjAwMDQgNS4wMDA5NyAzOC4wMDA0QzQuODc4OTcgMzguMDAwNCA0Ljc1NDk3IDM3Ljk4ODQgNC42MzA5NyAzNy45NjQ0QzMuNTQ0OTcgMzcuNzYyNCAyLjgzMDk3IDM2LjcxNjQgMy4wMzQ5NyAzNS42MzA0TDQuNTMyOTcgMjcuNjMwNEM0LjU0ODE4IDI3LjU1MTggNC41ODE4NCAyNy40ODIxIDQuNjE1NjYgMjcuNDEyMUM0LjYzNTIzIDI3LjM3MTUgNC42NTQ4NSAyNy4zMzA5IDQuNjcwOTcgMjcuMjg4NEM0LjY4Njc4IDI3LjI0ODYgNC43MDA2IDI3LjIwNzMgNC43MTQ0MyAyNy4xNjZDNC43NDQzNSAyNy4wNzY3IDQuNzc0MzcgMjYuOTg3IDQuODI0OTcgMjYuOTEwNEM0Ljg1NDQ5IDI2Ljg2NDkgNC44OTMwOCAyNi44Mjg1IDQuOTMxOTEgMjYuNzkxOEM0Ljk1NjIzIDI2Ljc2ODkgNC45ODA2NCAyNi43NDU4IDUuMDAyOTcgMjYuNzIwNEM1LjAyMDU5IDI2LjcgNS4wMzgwMSAyNi42Nzk1IDUuMDU1NCAyNi42NTlDNS4xNTA1OSAyNi41NDY4IDUuMjQ0OTEgMjYuNDM1NiA1LjM2NDk3IDI2LjM1NDRDNS4zNzY3NiAyNi4zNDU4IDUuMzkwODUgMjYuMzQwNyA1LjQwNDc4IDI2LjMzNTZDNS40MTY4MyAyNi4zMzEyIDUuNDI4NzYgMjYuMzI2OSA1LjQzODk3IDI2LjMyMDRDNS42MzI5NyAyNi4xOTQ0IDUuODQwOTcgMjYuMDk2NCA2LjA3MDk3IDI2LjA0NjRDNi4wODQ5OCAyNi4wNDMyIDYuMDk5NTcgMjYuMDQ0IDYuMTE0MTEgMjYuMDQ0OEM2LjEyNjU2IDI2LjA0NTUgNi4xMzg5OCAyNi4wNDYyIDYuMTUwOTcgMjYuMDQ0NEM2LjM3MDk3IDI2LjAwODQgNi41OTI5NyAyNS45ODY0IDYuODI2OTcgMjYuMDI2NEwxNS4zMjcgMjcuNDM4NEMxNi40MTcgMjcuNjE2NCAxNy4xNTMgMjguNjQ4NCAxNi45NzMgMjkuNzM4NEMxNi44MTEgMzAuNzE2NCAxNS45NjMgMzEuNDEwNCAxNS4wMDEgMzEuNDEwNEMxNC44OTMgMzEuNDEwNCAxNC43ODMgMzEuNDAyNCAxNC42NzMgMzEuMzgyNEwxMS4zODUgMzAuODM4NEMxMy44NzUgMzUuMjEwNCAxOC42MjkgMzguMDAwNCAyMy44NjEgMzguMDAwNEMyOS43NzkgMzguMDAwNCAzNC45OTMgMzQuNTY0NCAzNy4xNDcgMjkuMjUwNFoiIGZpbGw9IiNCRDc0NEMiLz4KPG1hc2sgaWQ9Im1hc2swIiBtYXNrLXR5cGU9ImFscGhhIiBtYXNrVW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4PSIzIiB5PSI2IiB3aWR0aD0iNDIiIGhlaWdodD0iMzciPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTQzLjM2NTcgMjAuNjUyMUM0My4zNTEyIDIwLjY4MzkgNDMuMzM2NyAyMC43MTU3IDQzLjMyMzIgMjAuNzQ4QzQzLjMwOTUgMjAuNzgxNSA0My4yOTg3IDIwLjgxNjUgNDMuMjg3OSAyMC44NTEzQzQzLjI3MDQgMjAuOTA4IDQzLjI1MjkgMjAuOTY0NSA0My4yMjMyIDIxLjAxNEM0My4xNjQgMjEuMTEyIDQzLjA4NjcgMjEuMTk0NCA0My4wMDkyIDIxLjI3NjlDNDIuOTg3IDIxLjMwMDUgNDIuOTY0OSAyMS4zMjQgNDIuOTQzMiAyMS4zNDhDNDIuOTE5IDIxLjM3MyA0Mi44OTc2IDIxLjQwMDUgNDIuODc2MiAyMS40Mjc5QzQyLjg0NjMgMjEuNDY2MyA0Mi44MTY1IDIxLjUwNDUgNDIuNzc5MiAyMS41MzZDNDIuNjY3MiAyMS42Mjc1IDQyLjUzNzcgMjEuNjkxMSA0Mi40MDg3IDIxLjc1NDRDNDIuMzk5NiAyMS43NTkgNDIuMzkwNCAyMS43NjM1IDQyLjM4MTIgMjEuNzY4QzQyLjM1MzkgMjEuNzgxMiA0Mi4zMjggMjEuNzk3OSA0Mi4zMDIxIDIxLjgxNDVDNDIuMjY1MiAyMS44MzgyIDQyLjIyODMgMjEuODYxOSA0Mi4xODcyIDIxLjg3NkM0MS45NzEyIDIxLjk1NiA0MS43NDEyIDIyIDQxLjUwMzIgMjJDNDEuMzk1MiAyMiA0MS4yODMyIDIxLjk5MiA0MS4xNzMyIDIxLjk3MkwzMi42NzMyIDIwLjU2MkMzMS41ODMyIDIwLjM4MiAzMC44NDcyIDE5LjM1MiAzMS4wMjcyIDE4LjI2MkMzMS4yMDcyIDE3LjE3NCAzMi4yMzUyIDE2LjQyOCAzMy4zMjcyIDE2LjYxOEwzNi42MTUyIDE3LjE2MkMzNC4xMjUyIDEyLjc5IDI5LjM3MTIgMTAgMjQuMTM5MiAxMEMxOC4yMjEyIDEwIDEzLjAwNzIgMTMuNDM2IDEwLjg1MzIgMTguNzVDMTAuNTM5MiAxOS41MyA5Ljc4OTE3IDIwIDguOTk5MTcgMjBDOC43NDkxNyAyMCA4LjQ5NTE3IDE5Ljk1NCA4LjI0OTE3IDE5Ljg1NEM3LjIyNTE3IDE5LjQ0IDYuNzMxMTcgMTguMjc0IDcuMTQ3MTcgMTcuMjVDOS45MTUxNyAxMC40MTYgMTYuNTg1MiA2IDI0LjEzOTIgNkMzMC45NjMyIDYgMzcuMTY1MiA5Ljc0IDQwLjI5NTIgMTUuNTc2TDQxLjAzMzIgMTEuNjNDNDEuMjM3MiAxMC41NDYgNDIuMjg1MiA5LjgyOCA0My4zNjcyIDEwLjAzNkM0NC40NTMyIDEwLjIzOCA0NS4xNjkyIDExLjI4NCA0NC45NjUyIDEyLjM3TDQzLjQ2NzIgMjAuMzdDNDMuNDQ4IDIwLjQ3MiA0My40MDY5IDIwLjU2MiA0My4zNjU3IDIwLjY1MjFaTTM3LjE0NyAyOS4yNTA0QzM3LjU2MSAyOC4yMjQ0IDM4LjcyOSAyNy43MzI0IDM5Ljc1MSAyOC4xNDY0QzQwLjc3NSAyOC41NjA0IDQxLjI2OSAyOS43MjY0IDQwLjg1MyAzMC43NTA0QzM4LjA4NSAzNy41ODQ0IDMxLjQxNSA0Mi4wMDA0IDIzLjg2MSA0Mi4wMDA0QzE3LjAzNyA0Mi4wMDA0IDEwLjgzNSAzOC4yNjA0IDcuNzA0OTcgMzIuNDI0NEw2Ljk2NDk3IDM2LjM2ODRDNi43ODY5NyAzNy4zMzA0IDUuOTQ2OTcgMzguMDAwNCA1LjAwMDk3IDM4LjAwMDRDNC44Nzg5NyAzOC4wMDA0IDQuNzU0OTcgMzcuOTg4NCA0LjYzMDk3IDM3Ljk2NDRDMy41NDQ5NyAzNy43NjI0IDIuODMwOTcgMzYuNzE2NCAzLjAzNDk3IDM1LjYzMDRMNC41MzI5NyAyNy42MzA0QzQuNTQ4MTggMjcuNTUxOCA0LjU4MTg0IDI3LjQ4MjEgNC42MTU2NiAyNy40MTIxQzQuNjM1MjMgMjcuMzcxNSA0LjY1NDg1IDI3LjMzMDkgNC42NzA5NyAyNy4yODg0QzQuNjg2NzggMjcuMjQ4NiA0LjcwMDYgMjcuMjA3MyA0LjcxNDQzIDI3LjE2NkM0Ljc0NDM1IDI3LjA3NjcgNC43NzQzNyAyNi45ODcgNC44MjQ5NyAyNi45MTA0QzQuODU0NDkgMjYuODY0OSA0Ljg5MzA4IDI2LjgyODUgNC45MzE5MSAyNi43OTE4QzQuOTU2MjMgMjYuNzY4OSA0Ljk4MDY0IDI2Ljc0NTggNS4wMDI5NyAyNi43MjA0QzUuMDIwNTkgMjYuNyA1LjAzODAxIDI2LjY3OTUgNS4wNTU0IDI2LjY1OUM1LjE1MDU5IDI2LjU0NjggNS4yNDQ5MSAyNi40MzU2IDUuMzY0OTcgMjYuMzU0NEM1LjM3Njc2IDI2LjM0NTggNS4zOTA4NSAyNi4zNDA3IDUuNDA0NzggMjYuMzM1NkM1LjQxNjgzIDI2LjMzMTIgNS40Mjg3NiAyNi4zMjY5IDUuNDM4OTcgMjYuMzIwNEM1LjYzMjk3IDI2LjE5NDQgNS44NDA5NyAyNi4wOTY0IDYuMDcwOTcgMjYuMDQ2NEM2LjA4NDk4IDI2LjA0MzIgNi4wOTk1NyAyNi4wNDQgNi4xMTQxMSAyNi4wNDQ4QzYuMTI2NTYgMjYuMDQ1NSA2LjEzODk4IDI2LjA0NjIgNi4xNTA5NyAyNi4wNDQ0QzYuMzcwOTcgMjYuMDA4NCA2LjU5Mjk3IDI1Ljk4NjQgNi44MjY5NyAyNi4wMjY0TDE1LjMyNyAyNy40Mzg0QzE2LjQxNyAyNy42MTY0IDE3LjE1MyAyOC42NDg0IDE2Ljk3MyAyOS43Mzg0QzE2LjgxMSAzMC43MTY0IDE1Ljk2MyAzMS40MTA0IDE1LjAwMSAzMS40MTA0QzE0Ljg5MyAzMS40MTA0IDE0Ljc4MyAzMS40MDI0IDE0LjY3MyAzMS4zODI0TDExLjM4NSAzMC44Mzg0QzEzLjg3NSAzNS4yMTA0IDE4LjYyOSAzOC4wMDA0IDIzLjg2MSAzOC4wMDA0QzI5Ljc3OSAzOC4wMDA0IDM0Ljk5MyAzNC41NjQ0IDM3LjE0NyAyOS4yNTA0WiIgZmlsbD0id2hpdGUiLz4KPC9tYXNrPgo8ZyBtYXNrPSJ1cmwoI21hc2swKSI+CjxyZWN0IHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgZmlsbD0iI0JENzQ0QyIvPgo8L2c+Cjwvc3ZnPgo="
							     class="mr-3"/>
							<div><h5 class="fw-bold text-uppercase">100% money back</h5>
								<p class="text-muted mb-0">30 day money back guarantee</p></div>
						</section>
					</div>
				</div>
			</div>
		</div>
		<hr/>

		<section style="margin-top:80px;margin-bottom:80px"><h3 class="text-center fw-bold mb-4">Follow us on Instagram</h3>
			<div class="no-gutters row">
				<div class="col-6 col-sm-4 col-md-3"><img src="/images/flatlogic/insta1-3d219150c134448fa2bcc6c58b3787b7.jpg" class="w-100"/></div>
				<div class="col-6 col-sm-4 col-md-3"><img src="/images/flatlogic/insta2-1afd744185c6e18a1260482a5aad5302.jpg" class="w-100"/></div>
				<div class="col-6 col-sm-4 col-md-3"><img src="/images/flatlogic/insta3-b7184ed4a1dbc0ea6c72c90cf58871bf.jpg" class="w-100"/></div>
				<div class="col-6 col-sm-4 col-md-3"><img src="/images/flatlogic/insta6-59464e63c8610a45a2d7a01fc4691335.jpg" class="w-100"/></div>
			</div>
		</section>
	</div>

	<script>
        let countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();
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