<?= $this->extend('Admin/layouts/master') ?>
<?= $this->section('title') ?>
	Dashboard
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="row g-0">
		<div class="col-md-6 col-xxl-3 mb-3 pe-md-2">
			<div class="card h-md-100 ecommerce-card-min-width">
				<div class="card-header pb-0">
					<h6 class="mb-0 mt-2 d-flex align-items-center">Weekly Sales
						<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top"
						      title="Calculated according to last 4 week's sales">
							<span class="far fa-question-circle" data-fa-transform="shrink-1"></span>
						</span>
					</h6>
				</div>
				<div class="card-body d-flex flex-column justify-content-end">
					<div class="row">
						<div class="col">
							<p class="lh-1 mb-1 fs-2"><span id="weekly-sales-cu">KSH.0K</span></p>
							<span class="badge badge-soft-success rounded-pill fs--2">+3.5%</span>
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
					<h6 class="mb-0 mt-2">Total Orders</h6>
				</div>
				<div class="card-body d-flex flex-column justify-content-end">
					<div class="row justify-content-between">
						<div class="col-auto align-self-end">
							<div class="fs-2 fw-normal text-700 lh-1 mb-1">
								<span id="total-orders-cu">0</span>
							</div>
							<span class="badge rounded-pill fs--2 bg-200 text-primary">
								<span class="fas fa-caret-up me-1"></span>13.6%
							</span>
						</div>
						<div class="col-auto ps-0 mt-n4">
							<div class="echart-default-total-order"
							     data-echarts="{&quot;tooltip&quot;:{&quot;trigger&quot;:&quot;axis&quot;,&quot;formatter&quot;:&quot;{b0} : {c0}&quot;},&quot;xAxis&quot;:{&quot;data&quot;:[&quot;Week 4&quot;,&quot;Week 5&quot;,&quot;week 6&quot;,&quot;week 7&quot;]},&quot;series&quot;:[{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:[20,40,100,120],&quot;smooth&quot;:true,&quot;lineStyle&quot;:{&quot;width&quot;:3}}],&quot;grid&quot;:{&quot;bottom&quot;:&quot;2%&quot;,&quot;top&quot;:&quot;2%&quot;,&quot;right&quot;:&quot;10px&quot;,&quot;left&quot;:&quot;10px&quot;}}"
							     data-echart-responsive="true" _echarts_instance_="ec_1634928926715"
							     style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative;">
								<div style="position: relative; width: 138px; height: 90px; padding: 0; margin: 0; border-width: 0;">
									<canvas data-zr-dom-id="zr_0" width="138" height="90"
									        style="position: absolute; left: 0; top: 0; width: 130px; height: 90px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0; margin: 0; border-width: 0;"></canvas>
								</div>
								<div class=""></div>
							</div>
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
							<h6 class="mt-1">Popular products</h6>
							<div class="fs--2 mt-3" id="popular-product-names" data-aos="fade-left" data-aos-delay="50"
							     data-aos-duration="1700">
							</div>
						</div>
						<div class="col-auto position-relative">
							<div class="echart-popular-products"></div>
							<div class="position-absolute top-50 start-50 translate-middle text-dark fs-2">
								<span id="popular-products-cu">0</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xxl-3 mb-3 ps-md-2">
			<div class="card h-md-100">
				<div class="card-header d-flex flex-between-center pb-0">
					<h6 class="mb-0">Weather</h6>
					<div class="dropdown btn-reveal-trigger">
						<button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
						        type="button" id="dropdown-weather-update" data-bs-toggle="dropdown"
						        data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
							<span class="fas fa-ellipsis-h fs--2"></span>
						</button>
						<div class="dropdown-menu dropdown-menu-end border py-2"
						     aria-labelledby="dropdown-weather-update">
							<a class="dropdown-item" href="#!">View</a>
							<a class="dropdown-item" href="#!">Export</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item text-danger" href="#!">Remove</a>
						</div>
					</div>
				</div>
				<div class="card-body pt-2">
					<div class="row g-0 h-100 align-items-center">
						<div class="col">
							<div class="d-flex align-items-center">
								<img class="me-3" src="/images/dash/icons/weather-icon.png" alt="" height="60"/>
								<div>
									<h6 class="mb-2">New York City</h6>
									<div class="fs--2 fw-semi-bold">
										<div class="text-warning">Sunny</div>
										Precipitation: 50%
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto text-center ps-2">
							<div class="fs-4 fw-normal text-primary mb-1 lh-1">31&deg;</div>
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
							<div class="dropdown btn-reveal-trigger">
								<button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
								        type="button"
								        id="dropdown-total-sales" data-bs-toggle="dropdown" data-boundary="viewport"
								        aria-haspopup="true"
								        aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
								<div class="dropdown-menu dropdown-menu-end border py-2"
								     aria-labelledby="dropdown-total-sales"><a
											class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item text-danger" href="#!">Remove</a>
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
					<div class="dropdown btn-reveal-trigger">
						<button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
						        type="button"
						        id="dropdown-active-user" data-bs-toggle="dropdown" data-boundary="viewport"
						        aria-haspopup="true"
						        aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
						<div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-active-user">
							<a class="dropdown-item"
							   href="#!">View</a><a
									class="dropdown-item" href="#!">Export</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item text-danger" href="#!">Remove</a>
						</div>
					</div>
				</div>
				<div class="card-body py-2">
					<div class="d-flex align-items-center position-relative mb-3">
						<div class="avatar avatar-2xl status-online">
							<img class="rounded-circle" src="/images/dash/team/1.jpg" alt=""/>
						</div>
						<div class="flex-1 ms-3">
							<h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900"
							                                 href="pages/user/profile.html">Emma Watson</a></h6>
							<p class="text-500 fs--2 mb-0">Admin</p>
						</div>
					</div>
					<div class="d-flex align-items-center position-relative mb-3">
						<div class="avatar avatar-2xl status-online">
							<img class="rounded-circle" src="/images/dash/team/2.jpg" alt=""/>
						</div>
						<div class="flex-1 ms-3">
							<h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900"
							                                 href="pages/user/profile.html">Antony Hopkins</a></h6>
							<p class="text-500 fs--2 mb-0">Moderator</p>
						</div>
					</div>
					<div class="d-flex align-items-center position-relative mb-3">
						<div class="avatar avatar-2xl status-away">
							<img class="rounded-circle" src="/images/dash/team/3.jpg" alt=""/>
						</div>
						<div class="flex-1 ms-3">
							<h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900"
							                                 href="pages/user/profile.html">Anna Karinina</a></h6>
							<p class="text-500 fs--2 mb-0">Editor</p>
						</div>
					</div>
					<div class="d-flex align-items-center position-relative mb-3">
						<div class="avatar avatar-2xl status-offline">
							<img class="rounded-circle" src="/images/dash/team/4.jpg" alt=""/>
						</div>
						<div class="flex-1 ms-3">
							<h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900"
							                                 href="pages/user/profile.html">John Lee</a></h6>
							<p class="text-500 fs--2 mb-0">Admin</p>
						</div>
					</div>
					<div class="d-flex align-items-center position-relative false">
						<div class="avatar avatar-2xl status-offline">
							<img class="rounded-circle" src="/images/dash/team/5.jpg" alt=""/>
						</div>
						<div class="flex-1 ms-3">
							<h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900"
							                                 href="pages/user/profile.html">Rowen Atkinson</a></h6>
							<p class="text-500 fs--2 mb-0">Editor</p>
						</div>
					</div>
				</div>
				<div class="card-footer bg-light p-0"><a class="btn btn-sm btn-link d-block w-100 py-2"
				                                         href="app/social/followers.html">All active
						users<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
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
							<div class="dropdown btn-reveal-trigger">
								<button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
								        type="button"
								        id="dropdown-top-products" data-bs-toggle="dropdown" data-boundary="viewport"
								        aria-haspopup="true"
								        aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
								<div class="dropdown-menu dropdown-menu-end border py-2"
								     aria-labelledby="dropdown-top-products"><a
											class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item text-danger" href="#!">Remove</a>
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
									<div class="d-flex align-items-center position-relative"><img
												class="rounded-1 border border-200"
												src="assets/img/products/12.png" width="60" alt=""/>
										<div class="flex-1 ms-3">
											<h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Raven
													Pro</a></h6>
											<p class="fw-semi-bold mb-0 text-500">Landing</p>
										</div>
									</div>
								</td>
								<td class="align-middle text-end fw-semi-bold">$1311</td>
								<td class="align-middle pe-card">
									<div class="d-flex align-items-center">
										<div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
											<div class="progress-bar rounded-pill" role="progressbar"
											     style="width: 39%;" aria-valuenow="39"
											     aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="fw-semi-bold ms-2">39%</div>
									</div>
								</td>
							</tr>
							<tr class="border-bottom border-200">
								<td>
									<div class="d-flex align-items-center position-relative"><img
												class="rounded-1 border border-200"
												src="assets/img/products/10.png" width="60" alt=""/>
										<div class="flex-1 ms-3">
											<h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Boots4</a>
											</h6>
											<p class="fw-semi-bold mb-0 text-500">Portfolio</p>
										</div>
									</div>
								</td>
								<td class="align-middle text-end fw-semi-bold">$860</td>
								<td class="align-middle pe-card">
									<div class="d-flex align-items-center">
										<div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
											<div class="progress-bar rounded-pill" role="progressbar"
											     style="width: 26%;" aria-valuenow="26"
											     aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="fw-semi-bold ms-2">26%</div>
									</div>
								</td>
							</tr>
							<tr class="border-bottom border-200">
								<td>
									<div class="d-flex align-items-center position-relative"><img
												class="rounded-1 border border-200"
												src="assets/img/products/11.png" width="60" alt=""/>
										<div class="flex-1 ms-3">
											<h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Falcon</a>
											</h6>
											<p class="fw-semi-bold mb-0 text-500">Admin</p>
										</div>
									</div>
								</td>
								<td class="align-middle text-end fw-semi-bold">$539</td>
								<td class="align-middle pe-card">
									<div class="d-flex align-items-center">
										<div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
											<div class="progress-bar rounded-pill" role="progressbar"
											     style="width: 16%;" aria-valuenow="16"
											     aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="fw-semi-bold ms-2">16%</div>
									</div>
								</td>
							</tr>
							<tr class="border-bottom border-200">
								<td>
									<div class="d-flex align-items-center position-relative"><img
												class="rounded-1 border border-200"
												src="assets/img/products/14.png" width="60" alt=""/>
										<div class="flex-1 ms-3">
											<h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Slick</a>
											</h6>
											<p class="fw-semi-bold mb-0 text-500">Builder</p>
										</div>
									</div>
								</td>
								<td class="align-middle text-end fw-semi-bold">$343</td>
								<td class="align-middle pe-card">
									<div class="d-flex align-items-center">
										<div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
											<div class="progress-bar rounded-pill" role="progressbar"
											     style="width: 10%;" aria-valuenow="10"
											     aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="fw-semi-bold ms-2">10%</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center position-relative"><img
												class="rounded-1 border border-200"
												src="assets/img/products/13.png" width="60" alt=""/>
										<div class="flex-1 ms-3">
											<h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Reign
													Pro</a></h6>
											<p class="fw-semi-bold mb-0 text-500">Agency</p>
										</div>
									</div>
								</td>
								<td class="align-middle text-end fw-semi-bold">$280</td>
								<td class="align-middle pe-card">
									<div class="d-flex align-items-center">
										<div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
											<div class="progress-bar rounded-pill" role="progressbar" style="width: 8%;"
											     aria-valuenow="8"
											     aria-valuemin="0" aria-valuemax="100"></div>
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
						<div class="col-auto">
							<select class="form-select form-select-sm">
								<option>Last 7 days</option>
								<option>Last Month</option>
								<option>Last Year</option>
							</select>
						</div>
						<div class="col-auto"><a class="btn btn-sm btn-falcon-default" href="#!">View All</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?= $this->section('scripts') ?>
	<script src="/vendor/admin/countup/countUp.umd.js"></script>
	<script src="/js/admin/dashboard.js"></script>
	<script src="/js/admin/chart.js"></script>
	<script>
        $.ajax({
            url: '<?= route_to('dashboard.stats') ?>',
            dataType: 'json',
            success: response => {
                initCountUp($('#weekly-sales-cu').get(0), response.weekly_sales, {prefix: 'KSH.'})
                initCountUp($('#total-orders-cu').get(0), response.total_orders)

                InitPopularProducts(response.popular_products)
            },
            error: error => console.log(error)
        })
	</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>