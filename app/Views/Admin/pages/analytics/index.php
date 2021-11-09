<?= $this->extend('Admin/layouts/master') ?>
<?= $this->section('title') ?>
    Profile
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="row g-3 mb-3">
	<div class="col-xxl-8">
		<div class="card overflow-hidden">
			<div class="card-header audience-chart-header p-0 bg-light scrollbar-overlay">
				<ul class="nav nav-tabs border-0 chart-tab flex-nowrap" id="audience-chart-tab" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link mb-0 active" id="users-tab" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">
							<div class="audience-tab-item p-2 pe-4">
								<h6 class="text-800 fs--2 text-nowrap">Users</h6>
								<h5 class="text-800">3.9K</h5>
								<div class="d-flex align-items-center"><span class="fas fa-caret-up text-success"></span>
									<h6 class="fs--2 mb-0 ms-2 text-success">62.0%</h6>
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link mb-0" id="sessions-tab" data-bs-toggle="tab" href="#sessions" role="tab" aria-controls="sessions" aria-selected="false">
							<div class="audience-tab-item p-2 pe-4">
								<h6 class="text-800 fs--2 text-nowrap">Sessions</h6>
								<h5 class="text-800">6.3K</h5>
								<div class="d-flex align-items-center"><span class="fas fa-caret-up text-success"></span>
									<h6 class="fs--2 mb-0 ms-2 text-success">46.2%</h6>
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item" role="presentation"><a class="nav-link mb-0" id="rate-tab" data-bs-toggle="tab" href="#rate" role="tab" aria-controls="rate" aria-selected="false">
							<div class="audience-tab-item p-2 pe-4">
								<h6 class="text-800 fs--2 text-nowrap">Bounce Rate</h6>
								<h5 class="text-800">9.49%</h5>
								<div class="d-flex align-items-center"><span class="fas fa-caret-down text-warning"></span>
									<h6 class="fs--2 mb-0 ms-2 text-warning">56.1%</h6>
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link mb-0" id="duration-tab" data-bs-toggle="tab" href="#duration" role="tab" aria-controls="duration" aria-selected="false">
							<div class="audience-tab-item p-2 pe-4">
								<h6 class="text-800 fs--2 text-nowrap">Session Duration</h6>
								<h5 class="text-800">4m 03s</h5>
								<div class="d-flex align-items-center"><span class="fas fa-caret-down text-warning"></span>
									<h6 class="fs--2 mb-0 ms-2 text-warning">32.2%</h6>
								</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane active" id="users" role="tabpanel" aria-labelledby="users-tab">
						<div class="echart-audience" data-echart-responsive="true" style="height:320px;"></div>
					</div>
					<div class="tab-pane" id="sessions" role="tabpanel" aria-labelledby="sessions-tab">
						<div class="echart-audience" data-echart-responsive="true" style="height:320px;"></div>
					</div>
					<div class="tab-pane" id="rate" role="tabpanel" aria-labelledby="rate-tab">
						<div class="echart-audience" data-echart-responsive="true" style="height:320px;"></div>
					</div>
					<div class="tab-pane" id="duration" role="tabpanel" aria-labelledby="duration-tab">
						<div class="echart-audience" data-echart-responsive="true" style="height:320px;"></div>
					</div>
				</div>
			</div>
			<div class="card-footer bg-light py-2">
				<div class="row flex-between-center g-0">
					<div class="col-auto"><select class="form-select form-select-sm audience-select-menu">
							<option value="week" selected="selected">Last 7 days</option>
							<option value="month">Last month</option>
						</select></div>
					<div class="col-auto"><a class="btn btn-link btn-sm px-0 fw-medium" href="#!">Visitors overview<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xxl-4">
		<div class="card echart-session-by-browser-card h-100">
			<div class="card-header d-flex flex-between-center bg-light py-2">
				<h6 class="mb-0">Purchases per gender</h6>
				<div class="dropdown font-sans-serif btn-reveal-trigger">
					<button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-session-by-browser" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
						<span class="fas fa-ellipsis-h fs--2"></span>
					</button>
					<div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-session-by-browser">
						<a class="dropdown-item" href="#!">View</a>
						<a class="dropdown-item" href="#!">Export</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item text-danger" href="#!">Remove</a>
					</div>
				</div>
			</div>
			<div class="card-body d-flex flex-column justify-content-between py-0">
				<div class="my-auto py-5 py-md-0" style="min-height:20rem;">
					<div class="echart-purchases-per-gender h-100" data-echart-responsive="true"></div>
				</div>
				<div class="border-top">
					<table class="table table-sm mb-0">
						<tbody>
						<tr>
							<td class="py-3">
								<div class="d-flex align-items-center">
									<img src="../assets/img/icons/chrome-logo.png" alt="" width="16" />
									<h6 class="text-600 mb-0 ms-2">Male</h6>
								</div>
							</td>
							<td class="py-3">
								<div class="d-flex align-items-center">
									<span class="fas fa-circle fs--2 me-2 text-primary"></span>
									<h6 class="fw-normal text-700 mb-0"><span id="male-count-up">0</span>%</h6>
								</div>
							</td>
						</tr>
						<tr>
							<td class="py-3">
								<div class="d-flex align-items-center">
									<img src="../assets/img/icons/firefox-logo.png" alt="" width="16" />
									<h6 class="text-600 mb-0 ms-2">Female</h6>
								</div>
							</td>
							<td class="py-3">
								<div class="d-flex align-items-center">
									<span class="fas fa-circle fs--2 me-2" style="color: #ff679b"></span>
									<h6 class="fw-normal text-700 mb-0"><span id="female-count-up">0</span>%</h6>
								</div>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer bg-light py-2">
				<div class="row flex-between-center g-0">
					<div class="col-auto">
						<select class="form-select form-select-sm" data-target=".echart-purchases-per-gender" aria-label>
							<option value="week" selected="selected">Last 7 days</option>
							<option value="month">Last month</option>
							<option value="year">Last Year</option>
						</select>
					</div>
					<div class="col-auto">
						<a class="btn btn-link btn-sm px-0 fw-medium" href="#!">Browser overview
							<span class="fas fa-chevron-right ms-1 fs--2"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->section('scripts') ?>
<script src="/vendor/admin/chart/chart.min.js"></script>
<script src="/vendor/admin/dayjs/dayjs.min.js"></script>
<script>
	$(() => {
		function purchasesPerGender(dataset) {
            let $purchasesPerGender = document.querySelector('.echart-purchases-per-gender');

            if ($purchasesPerGender) {
                let userOptions = utils.getData($purchasesPerGender, 'options');
                let chart = window.echarts.init($purchasesPerGender);

                let getDefaultOptions = function getDefaultOptions() {
                    return {
                        color: [utils.getColors().primary, `#ff679b`],
                        tooltip: {
                            trigger: 'item',
                            padding: [7, 10],
                            backgroundColor: utils.getGrays()['100'],
                            borderColor: utils.getGrays()['300'],
                            textStyle: {
                                color: utils.getColors().dark
                            },
                            borderWidth: 1,
                            transitionDuration: 0,
                            formatter: function formatter(params) {
                                return "<strong>".concat(params.data.name, ":</strong> ").concat(params.data.value, "%");
                            },
                            position: function position(pos, params, dom, rect, size) {
                                return getPosition(pos, params, dom, rect, size);
                            }
                        },
                        legend: {
                            show: false
                        },
                        series: [{
                            type: 'pie',
                            radius: ['100%', '65%'],
                            avoidLabelOverlap: false,
                            hoverAnimation: false,
                            itemStyle: {
                                borderWidth: 2,
                                borderColor: utils.getColor('card-bg')
                            },
                            label: {
                                normal: {
                                    show: false
                                },
                                emphasis: {
                                    show: false
                                }
                            },
                            labelLine: {
                                normal: {
                                    show: false
                                }
                            },
                            data: dataset
                        }]
                    };
                };

                echartSetOption(chart, userOptions, getDefaultOptions);
            }
        }

        $.ajax({
            url: '<?= route_to('admin.stats.init') ?>',
            dataType: 'json',
            success: ({ordersPerGender}) => {
	            //  ------------------------------------    CHARTS
                purchasesPerGender(ordersPerGender.datasets)



                //  ------------------------------------    COUNT UPS
                initCountUp($('#male-count-up').get(0), ordersPerGender.percent.male)
                initCountUp($('#female-count-up').get(0), ordersPerGender.percent.female)
            },
            error: error => console.log(error)
        })
	})
</script>
<script src="/vendor/admin/countup/countUp.umd.js"></script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>

