<?= $this->extend('Admin/layouts/master') ?>

<?= $this->section('content') ?>

	<main class="main" id="top">
		<div class="container" data-layout="container">
			<script>
                let isFluid = JSON.parse(localStorage.getItem('isFluid'));

                if (isFluid) {
                    let container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
			</script>

            <?= $this->include('Admin/partials/navs/vertical_top') ?>

			<div class="content">

                <?= $this->include('Admin/partials/navs/combo_top') ?>
				<script>
                    let navbarPosition = localStorage.getItem('navbarPosition');
                    let navbarVertical = document.querySelector('.navbar-vertical');
                    let navbarTopVertical = document.querySelector('.content .navbar-top');
                    let navbarTop = document.querySelector('[data-layout] .navbar-top');
                    let navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');

                    if (navbarPosition === 'top') {
                        navbarTop.removeAttribute('style');
                        navbarTopVertical.remove(navbarTopVertical);
                        navbarVertical.remove(navbarVertical);
                        navbarTopCombo.remove(navbarTopCombo);
                    } else if (navbarPosition === 'combo') {
                        navbarVertical.removeAttribute('style');
                        navbarTopCombo.removeAttribute('style');
                        navbarTop.remove(navbarTop);
                        navbarTopVertical.remove(navbarTopVertical);
                    } else {
                        navbarVertical.removeAttribute('style');
                        navbarTopVertical.removeAttribute('style');
                        navbarTop.remove(navbarTop);
                        navbarTopCombo.remove(navbarTopCombo);
                    }
				</script>
				<div class="row g-0">
					<div class="col-md-6 col-xxl-3 mb-3 pe-md-2">
						<div class="card h-md-100 ecommerce-card-min-width">
							<div class="card-header pb-0">
								<h6 class="mb-0 mt-2 d-flex align-items-center">Weekly Sales<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Calculated according to last week's sales"><span class="far fa-question-circle" data-fa-transform="shrink-1"></span></span></h6>
							</div>
							<div class="card-body d-flex flex-column justify-content-end">
								<div class="row">
									<div class="col">
										<p class="font-sans-serif lh-1 mb-1 fs-4">$47K</p><span class="badge badge-soft-success rounded-pill fs--2">+3.5%</span>
									</div>
									<div class="col-auto ps-0">
										<div class="echart-bar-weekly-sales h-100"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-xxl-3 mb-3 ps-md-2 pe-xxl-2">
						<div class="card h-md-100">
							<div class="card-header pb-0">
								<h6 class="mb-0 mt-2">Total Order</h6>
							</div>
							<div class="card-body d-flex flex-column justify-content-end">
								<div class="row justify-content-between">
									<div class="col-auto align-self-end">
										<div class="fs-4 fw-normal font-sans-serif text-700 lh-1 mb-1">58.4K</div><span class="badge rounded-pill fs--2 bg-200 text-primary"><span class="fas fa-caret-up me-1"></span>13.6%</span>
									</div>
									<div class="col-auto ps-0 mt-n4">
										<div class="echart-default-total-order" data-echarts='{"tooltip":{"trigger":"axis","formatter":"{b0} : {c0}"},"xAxis":{"data":["Week 4","Week 5","week 6","week 7"]},"series":[{"type":"line","data":[20,40,100,120],"smooth":true,"lineStyle":{"width":3}}],"grid":{"bottom":"2%","top":"2%","right":"10px","left":"10px"}}' data-echart-responsive="true"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-xxl-3 mb-3 pe-md-2 ps-xxl-2">
						<div class="card h-md-100">
							<div class="card-body">
								<div class="row h-100 justify-content-between g-0">
									<div class="col-5 col-sm-6 col-xxl pe-2">
										<h6 class="mt-1">Market Share</h6>
										<div class="fs--2 mt-3">
											<div class="d-flex flex-between-center mb-1">
												<div class="d-flex align-items-center"><span class="dot bg-primary"></span><span class="fw-semi-bold">samsung</span></div>
												<div class="d-xxl-none">33%</div>
											</div>
											<div class="d-flex flex-between-center mb-1">
												<div class="d-flex align-items-center"><span class="dot bg-info"></span><span class="fw-semi-bold">Huawei</span></div>
												<div class="d-xxl-none">29%</div>
											</div>
											<div class="d-flex flex-between-center mb-1">
												<div class="d-flex align-items-center"><span class="dot bg-300"></span><span class="fw-semi-bold">Huawei</span></div>
												<div class="d-xxl-none">20%</div>
											</div>
										</div>
									</div>
									<div class="col-auto position-relative">
										<div class="echart-market-share"></div>
										<div class="position-absolute top-50 start-50 translate-middle text-dark fs-2">26M</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-xxl-3 mb-3 ps-md-2">
						<div class="card h-md-100">
							<div class="card-header d-flex flex-between-center pb-0">
								<h6 class="mb-0">Weather</h6>
								<div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-weather-update" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
									<div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-weather-update"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
										<div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
									</div>
								</div>
							</div>
							<div class="card-body pt-2">
								<div class="row g-0 h-100 align-items-center">
									<div class="col">
										<div class="d-flex align-items-center"><img class="me-3" src="assets/img/icons/weather-icon.png" alt="" height="60" />
											<div>
												<h6 class="mb-2">New York City</h6>
												<div class="fs--2 fw-semi-bold">
													<div class="text-warning">Sunny</div>Precipitation: 50%
												</div>
											</div>
										</div>
									</div>
									<div class="col-auto text-center ps-2">
										<div class="fs-4 fw-normal font-sans-serif text-primary mb-1 lh-1">31&deg;</div>
										<div class="fs--1 text-800">32&deg; / 25&deg;</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row g-0">
					<div class="col-lg-12 mb-3">
						<div class="card h-lg-100">
							<div class="card-header">
								<div class="row flex-between-center">
									<div class="col-auto">
										<h6 class="mb-0">Total Sales</h6>
									</div>
									<div class="col-auto d-flex"><select class="form-select form-select-sm select-month me-2">
											<option value="0">January</option>
											<option value="1">February</option>
											<option value="2">March</option>
											<option value="3">April</option>
											<option value="4">May</option>
											<option value="5">Jun</option>
											<option value="6">July</option>
											<option value="7">August</option>
											<option value="8">September</option>
											<option value="9">October</option>
											<option value="10">November</option>
											<option value="11">December</option>
										</select>
										<div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-total-sales" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
											<div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-total-sales"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
												<div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body h-100 pe-0">
								<div class="echart-line-total-sales h-100" data-echart-responsive="true"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row g-0">
					<div class="col-sm-5 col-xxl-4 pe-sm-2 mb-3">
						<div class="card">
							<div class="card-header d-flex flex-between-center bg-light py-2">
								<h6 class="mb-0">Active Users</h6>
								<div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-active-user" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
									<div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-active-user"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
										<div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
									</div>
								</div>
							</div>
							<div class="card-body py-2">
								<div class="d-flex align-items-center position-relative mb-3">
									<div class="avatar avatar-2xl status-online">
										<img class="rounded-circle" src="/images/dash/team/1.jpg" alt="" />
									</div>
									<div class="flex-1 ms-3">
										<h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="pages/user/profile.html">Emma Watson</a></h6>
										<p class="text-500 fs--2 mb-0">Admin</p>
									</div>
								</div>
								<div class="d-flex align-items-center position-relative mb-3">
									<div class="avatar avatar-2xl status-online">
										<img class="rounded-circle" src="/images/dash/team/2.jpg" alt="" />
									</div>
									<div class="flex-1 ms-3">
										<h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="pages/user/profile.html">Antony Hopkins</a></h6>
										<p class="text-500 fs--2 mb-0">Moderator</p>
									</div>
								</div>
								<div class="d-flex align-items-center position-relative mb-3">
									<div class="avatar avatar-2xl status-away">
										<img class="rounded-circle" src="/images/dash/team/3.jpg" alt="" />
									</div>
									<div class="flex-1 ms-3">
										<h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="pages/user/profile.html">Anna Karinina</a></h6>
										<p class="text-500 fs--2 mb-0">Editor</p>
									</div>
								</div>
								<div class="d-flex align-items-center position-relative mb-3">
									<div class="avatar avatar-2xl status-offline">
										<img class="rounded-circle" src="/images/dash/team/4.jpg" alt="" />
									</div>
									<div class="flex-1 ms-3">
										<h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="pages/user/profile.html">John Lee</a></h6>
										<p class="text-500 fs--2 mb-0">Admin</p>
									</div>
								</div>
								<div class="d-flex align-items-center position-relative false">
									<div class="avatar avatar-2xl status-offline">
										<img class="rounded-circle" src="/images/dash/team/5.jpg" alt="" />
									</div>
									<div class="flex-1 ms-3">
										<h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="pages/user/profile.html">Rowen Atkinson</a></h6>
										<p class="text-500 fs--2 mb-0">Editor</p>
									</div>
								</div>
							</div>
							<div class="card-footer bg-light p-0"><a class="btn btn-sm btn-link d-block w-100 py-2" href="app/social/followers.html">All active users<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
						</div>
					</div>
					<div class="col-sm-7 col-xxl-8 mb-3">
						<div class="card h-100">
							<div class="card-header bg-light py-2">
								<div class="row flex-between-center">
									<div class="col-auto">
										<h6 class="mb-0">Top Products</h6>
									</div>
									<div class="col-auto d-flex"><a class="btn btn-link btn-sm me-2" href="#!">View Details</a>
										<div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-top-products" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
											<div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-top-products"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
												<div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body h-100">
								<div class="echart-bar-top-products h-100" data-echart-responsive="true"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row g-0">
					<div class="col-lg-12 mb-3 mb-xxl-0">
						<div class="card h-lg-100 overflow-hidden">
							<div class="card-body p-0">
								<div class="table-responsive scrollbar">
									<table class="table table-dashboard mb-0 table-borderless fs--1 border-200">
										<thead class="bg-light">
										<tr class="text-900">
											<th>Best Selling Products</th>
											<th class="text-end">Revenue ($3333)</th>
											<th class="pe-card text-end" style="width: 8rem">Revenue (%)</th>
										</tr>
										</thead>
										<tbody>
										<tr class="border-bottom border-200">
											<td>
												<div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/12.png" width="60" alt="" />
													<div class="flex-1 ms-3">
														<h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Raven Pro</a></h6>
														<p class="fw-semi-bold mb-0 text-500">Landing</p>
													</div>
												</div>
											</td>
											<td class="align-middle text-end fw-semi-bold">$1311</td>
											<td class="align-middle pe-card">
												<div class="d-flex align-items-center">
													<div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
														<div class="progress-bar rounded-pill" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<div class="fw-semi-bold ms-2">39%</div>
												</div>
											</td>
										</tr>
										<tr class="border-bottom border-200">
											<td>
												<div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/10.png" width="60" alt="" />
													<div class="flex-1 ms-3">
														<h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Boots4</a></h6>
														<p class="fw-semi-bold mb-0 text-500">Portfolio</p>
													</div>
												</div>
											</td>
											<td class="align-middle text-end fw-semi-bold">$860</td>
											<td class="align-middle pe-card">
												<div class="d-flex align-items-center">
													<div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
														<div class="progress-bar rounded-pill" role="progressbar" style="width: 26%;" aria-valuenow="26" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<div class="fw-semi-bold ms-2">26%</div>
												</div>
											</td>
										</tr>
										<tr class="border-bottom border-200">
											<td>
												<div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/11.png" width="60" alt="" />
													<div class="flex-1 ms-3">
														<h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Falcon</a></h6>
														<p class="fw-semi-bold mb-0 text-500">Admin</p>
													</div>
												</div>
											</td>
											<td class="align-middle text-end fw-semi-bold">$539</td>
											<td class="align-middle pe-card">
												<div class="d-flex align-items-center">
													<div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
														<div class="progress-bar rounded-pill" role="progressbar" style="width: 16%;" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<div class="fw-semi-bold ms-2">16%</div>
												</div>
											</td>
										</tr>
										<tr class="border-bottom border-200">
											<td>
												<div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/14.png" width="60" alt="" />
													<div class="flex-1 ms-3">
														<h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Slick</a></h6>
														<p class="fw-semi-bold mb-0 text-500">Builder</p>
													</div>
												</div>
											</td>
											<td class="align-middle text-end fw-semi-bold">$343</td>
											<td class="align-middle pe-card">
												<div class="d-flex align-items-center">
													<div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
														<div class="progress-bar rounded-pill" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<div class="fw-semi-bold ms-2">10%</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/13.png" width="60" alt="" />
													<div class="flex-1 ms-3">
														<h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Reign Pro</a></h6>
														<p class="fw-semi-bold mb-0 text-500">Agency</p>
													</div>
												</div>
											</td>
											<td class="align-middle text-end fw-semi-bold">$280</td>
											<td class="align-middle pe-card">
												<div class="d-flex align-items-center">
													<div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
														<div class="progress-bar rounded-pill" role="progressbar" style="width: 8%;" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<div class="fw-semi-bold ms-2">8%</div>
												</div>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="card-footer bg-light py-2">
								<div class="row flex-between-center">
									<div class="col-auto"><select class="form-select form-select-sm">
											<option>Last 7 days</option>
											<option>Last Month</option>
											<option>Last Year</option>
										</select></div>
									<div class="col-auto"><a class="btn btn-sm btn-falcon-default" href="#!">View All</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>

                <?= $this->include('Admin/partials/footer') ?>

			</div>
		</div>
	</main>


<?= $this->endSection() ?>