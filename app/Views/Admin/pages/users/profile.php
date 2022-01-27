<?= $this->extend('Admin/layouts/master') ?>
<?= $this->section('title') ?>
	Profile
<?= $this->endSection() ?>
<?= $this->section('links') ?>
	<link href="/vendor/admin/glightbox/glightbox.min.css" rel="stylesheet">
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="card mb-3">
		<div class="card-header position-relative min-vh-25 mb-7">
			<div class="bg-holder rounded-3 rounded-bottom-0"
			     style="background-image:url(/images/dash/generic/4.jpg);"></div>
			<div class="avatar avatar-5xl avatar-profile">
                <?php if(isset($user->image)): ?>
					<img class="rounded-circle img-thumbnail shadow-sm" src="/images/users/<?= $user->image ?>"
					     width="200" alt=""/>
                <?php else: ?>
					<img class="rounded-circle img-thumbnail shadow-sm"
					     src="/images/dash/icons/spot-illustrations/falcon.png" width="200" alt=""/>
                <?php endif; ?>
			</div>
		</div>

		<div class="card-body">
			<div class="row">
				<div class="col-lg-8">
					<h4 class="mb-1">
                        <?= $user->full_name ?>
						<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified">
							<small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
						</span>
					</h4>
					<h5 class="fs-0 fw-normal"><?= $user->email ?></h5>
					<p class="text-500"><?= $user->role->name ?>, <?= isset($user->apiUser)
                            ? 'Api'
                            : '' ?></p>
					<button class="btn btn-falcon-primary btn-sm px-3" type="button">Email</button>
					<button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button>
					<div class="border-dashed-bottom my-4 d-lg-none"></div>
                    <?php if(isset($user->apiUser)): ?>
						<pre class="scrollbar mt-2 language-html py-1 fs-12"><code class=" language-html"><span
										class="token tag"><span class="token tag"><span
												class="token punctuation">&lt;</span>Api-key</span><span
											class="token attr-name"> value</span><span class="token attr-value"><span
												class="token punctuation attr-equals">=</span><span
												class="token punctuation">"</span><?= $user->apiUser->key ?><span
												class="token punctuation">"</span></span><span
											class="token punctuation">&gt;</span></span><span
										class="token script"></span><span class="token tag"><span
											class="token tag"><span
												class="token punctuation">&lt;/</span>Api-key</span><span
											class="token punctuation">&gt;</span></span></code></pre>
                    <?php endif; ?>
				</div>
				<div class="col ps-2 ps-lg-3">

                    <?= view('App\auth\_message_block') ?>

					<ul class="list-group list-group-flush">
						<li class="list-group-item d-flex align-items-center">
							<i class="bi bi-gender-<?= strtolower($user->gender) ?> me-2 text-700"></i>
							<div class="flex-1"><h6 class="mb-0"><?= $user->gender ?></h6></div>
						</li>
						<li class="list-group-item">
							<a class="d-flex align-items-center" href="javascript:void(0)">
								<i class="bi bi-bag-check me-2 text-700"></i>
								<div class="flex-1">
									<h6 class="mb-0">
										Total items ordered (<span
												data-countup='{"endValue":<?= $user->orders_count ?>,"duration":7}'>0</span>)
									</h6>
								</div>
							</a>
						</li>
						<li class="list-group-item">
							<a class="d-flex align-items-center" href="javascript:void(0)">
								<i class="bi bi-calendar2-check me-2 text-700"></i>
								<div class="flex-1">
									<h6 class="mb-0">Joined <?= differenceForHumans($user->created_at) ?></h6>
								</div>
							</a>
						</li>

                        <?php if(empty($user->apiUser)): ?>
							<li class="list-group-item">
								<a class="d-flex align-items-center" href="#authentication-modal" data-bs-toggle="modal"
								   aria-expanded="false">
									<i class="bi bi-shield-lock me-2 text-700"></i>
									<div class="flex-1"><h6 class="mb-0">Register as API user</h6></div>
								</a>
							</li>
                        <?php endif; ?>

					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="row g-0">
		<div class="col-lg-8 pe-lg-2">
			<div class="card mb-3">
				<div class="card-header bg-light d-flex justify-content-between">
					<h5 class="mb-0">Orders</h5>
					<a href="<?= route_to('admin.orders.index') ?>">All orders</a>
				</div>
				<div class="card-body fs--1 p-0">

                    <?php
                    foreach($user->orders as $order):
                        $status = match ($order->status) {
                            'paid' => [
                                'icon'  => 'check',
                                'color' => 'success'
                            ],
                            'pending' => [
                                'icon'  => 'stream',
                                'color' => 'warning'
                            ],
                            'pending payment' => [
                                'icon'  => 'redo',
                                'color' => 'primary'
                            ]
                        }
                        ?>

						<a class="border-bottom-0 notification rounded-0 border-x-0 border border-300"
						   href="<?= route_to('admin.orders.show', $order->id) ?>">
							<div class="notification-avatar">
								<div class="avatar avatar-xl me-3">
									<div class="avatar-emoji rounded-circle ">
										<span role="img" aria-label="Emoji">
											<?= random_shop_icon($user->gender) ?>
										</span>
									</div>
								</div>
							</div>
							<div class="notification-body">
								<p class="mb-1">
									Payment Method: <strong
											class="text-blue-dark"><?= $order->paymentType->name ?></strong> |
									amount: <strong class="text-danger">KSH.<?= number_format($order->amount,
                                            2) ?></strong> |
									status: <strong class="badge badge rounded-pill badge-soft-<?= $status['color'] ?>">
                                        <?= ucwords($order->status) ?>
										<strong class="ms-1 fas fa-<?= $status['icon'] ?>"
										        data-fa-transform="shrink-2"></strong>
									</strong>
								</p>
								<span class="notification-time"><?= date('F jS, Y, g:i A') ?></span>
							</div>
						</a>
                    <?php endforeach; ?>

				</div>
			</div>
			<div class="card mb-3">
				<div class="card-header bg-light d-flex justify-content-between">
					<h5 class="mb-0">Activity log</h5>
					<a href="../../app/social/activity-log.html">All logs</a>
				</div>
				<div class="card-body fs--1 p-0">

                    <?php if(count($user->logins)): ?>
                        <?php foreach($user->logins as $login): ?>
							<a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="#!">
								<div class="notification-avatar">
									<div class="avatar avatar-xl me-3">
										<div class="avatar-emoji rounded-circle ">
											<span role="img" aria-label="Emoji">🔑</span>
										</div>
									</div>
								</div>
								<div class="notification-body w-100">
									<div class="row">
										<div class="col-6">
											<p class="mb-1"><strong>Sign In</strong> time:</p>
											<span class="notification-time">
											<?= date('jS F @h:i A', strtotime($login->logged_in_at)) ?>
										</span>
										</div>
										<div class="col-6">
											<p class="mb-1"><strong>Sign Out</strong> time:</p>
											<span class="notification-time">
											<?php if($login->logged_out_at): ?>
                                                <?= date('jS F @h:i A', strtotime($login->logged_out_at)) ?>
                                            <?php else: ?>
												N / A
                                            <?php endif; ?>
										</span>
										</div>
									</div>
								</div>
							</a>
                        <?php endforeach; ?>
                    <?php else: ?>
						<h5 class="text-center my-3">🔐 * NONE * 🔐</h5>
                    <?php endif; ?>

				</div>
			</div>
			<div class="card mb-3 mb-lg-0">
				<div class="card-header bg-light">
					<h5 class="mb-0">Photos</h5>
				</div>
				<div class="card-body overflow-hidden">
					<div class="row g-0">
						<div class="col-6 p-1">
							<a class="glightbox" href="/images/dash/generic/4.jpg" data-gallery="gallery1"
							   data-glightbox="data-glightbox">
								<img class="img-fluid rounded" src="/images/dash/generic/4.jpg" alt="..."/>
							</a>
						</div>
						<div class="col-6 p-1">
							<a class="glightbox" href="/images/dash/generic/5.jpg" data-gallery="gallery1"
							   data-glightbox="data-glightbox">
								<img class="img-fluid rounded" src="/images/dash/generic/5.jpg" alt="..."/>
							</a>
						</div>
						<div class="col-4 p-1">
							<a class="glightbox" href="/images/dash/gallery/4.jpg" data-gallery="gallery1"
							   data-glightbox="data-glightbox">
								<img class="img-fluid rounded" src="/images/dash/gallery/4.jpg" alt="..."/>
							</a>
						</div>
						<div class="col-4 p-1">
							<a class="glightbox" href="/images/dash/gallery/5.jpg" data-gallery="gallery1"
							   data-glightbox="data-glightbox">
								<img class="img-fluid rounded" src="/images/dash/gallery/5.jpg" alt="..."/>
							</a>
						</div>
						<div class="col-4 p-1">
							<a class="glightbox" href="/images/dash/gallery/3.jpg" data-gallery="gallery1"
							   data-glightbox="data-glightbox">
								<img class="img-fluid rounded" src="/images/dash/gallery/3.jpg" alt="..."/>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 ps-lg-2">
			<div class="sticky-sidebar">
				<div class="card mb-3">
					<div class="card-header bg-light d-flex justify-content-between">
						<h5 class="mb-0">Weekly Purchases</h5>
						<span id="count-up">0</span>
					</div>
					<div class="card-body fs--1 p-2">
						<div class="weekly-purchases w-100 p-2"
						     data-echart-responsive="true" _echarts_instance_="ec_1634928926715"
						     style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative; min-height: 10rem">
							<div style="position: relative; width: 138px; height: 90px; padding: 0; margin: 0; border-width: 0;">
								<canvas data-zr-dom-id="zr_0" width="138" height="90"
								        style="position: absolute; left: 0; top: 0; width: 130px; height: 90px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0; margin: 0; border-width: 0;"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="card mb-3">
					<div class="card-header bg-light">
						<h5 class="mb-0">Popular Products</h5>
					</div>
					<div class="card-body fs--1">

                        <?php foreach($popularProducts as $product): ?>
							<div class="d-flex">
								<a href="#!">
									<div class="avatar avatar-3xl">
										<img class="img-fluid rounded-circle" src="/images/products/<?= $product->image ?>" alt="" width="56"/>
									</div>
								</a>
								<div class="flex-1 position-relative ps-3">
									<h6 class="fs-0 mb-0">
										<a href="#!">
											<?= $product->name ?>
											<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified">
											<small class="fa fa-check-circle text-primary"
											       data-fa-transform="shrink-4 down-2"></small>
										</span>
										</a>
									</h6>
									<p class="mb-1 text-truncate" style="max-width: 250px;"><?= $product->description ?></p>
									<p class="text-1000 mb-0">KSH.<?= number_format($product->price, 2) ?>/-</p>
									<div class="border-dashed-bottom my-3"></div>
								</div>
							</div>
                        <?php endforeach; ?>

						<hr>

						<div class="d-flex">
							<a href="#!">
								<div class="avatar avatar-3xl">
									<div class="avatar-name rounded-circle"><span>SU</span></div>
								</div>
							</a>
							<div class="flex-1 position-relative ps-3">
								<h6 class="fs-0 mb-0">
									<a href="#!">
										Strathmore University
										<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified">
											<small class="fa fa-check-circle text-primary"
											       data-fa-transform="shrink-4 down-2"></small>
										</span>
									</a>
								</h6>
								<p class="mb-1">Computer Science and Engineering</p>
								<p class="text-1000 mb-0">2010 - 2014 • 4 yrs</p>
								<p class="text-1000 mb-0">Nairobi, Kenya</p>
								<div class="border-dashed-bottom my-3"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog"
	     aria-labelledby="authentication-modal-label" aria-hidden="true">
		<div class="modal-dialog mt-6" role="document">
			<div class="modal-content border-0">
				<div class="modal-header px-5 position-relative modal-shape-header bg-shape">
					<div class="position-relative z-index-1 light">
						<h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
						<p class="fs--1 mb-0 text-white">
							Create API account for this user. <strong class="text-dark">(<?= $user->email ?>)</strong>
						</p>
					</div>
					<button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2"
					        data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body py-4 px-5">
					<form action="<?= route_to('admin.user.api.store') ?>" method="POST">
                        <?= csrf_field() ?>
						<div class="mb-3">
							<label class="form-label" for="username">Username <small><i>(optional)</i></small></label>
							<input class="form-control" type="text" placeholder="Username" name="username"
							       id="username"/>
						</div>
						<label class="form-label" for="key">Api key <small><i>(optional)</i></small></label>
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="key" id="apikey" placeholder="Api key..."
							       aria-label="key">
							<span class="input-group-text btn btn-primary" data-bs-toggle="tooltip"
							      data-bs-placement="bottom" title="Auto-generate key" id="keygen">
								<i class="fas fa-magic"></i>
							</span>
						</div>
						<div class="mb-3">
							<input type="hidden" name="user_id" value="<?= $user->id ?>">
							<button class="btn btn-primary d-block w-100 mt-3" type="submit">Register</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?= $this->section('scripts') ?>
	<script src="/vendor/admin/glightbox/glightbox.min.js"></script>
	<script src="/js/admin/dynamic.js"></script>
	<script src="/js/admin/chart.js"></script>
	<script>
        $(() => {
            $('#table_id').DataTable({});
        })

        /**
         * Function to produce UUID.
         */
        function generateUUID() {
            let d = new Date().getTime();

            if (window.performance && typeof window.performance.now === "function") {
                d += performance.now();
            }

            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
                let r = (d + Math.random() * 16) % 16 | 0;
                d = Math.floor(d / 16);
                return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
            });
        }

        /**
         * Generate new key and insert into input value
         */
        $('#keygen').on('click', function () {
            $('#apikey').val(uniqid('cf_api-', true));
        });

        $(() => {
            $.ajax({
                url: '<?= route_to('admin.users.orders.chart', $user->id) ?>',
                dataType: 'json',
                success: response => {
                    InitWeeklyOrders(response.weekly_purchases)

                    let countUp = new window.countUp.CountUp($('#count-up').get(0), response.weekly_purchases.total, {
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