<nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
	<script>
        let navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
	</script>
	<div class="d-flex align-items-center">
		<div class="toggle-icon-wrapper">
			<button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
			        data-bs-placement="left" title="Toggle Navigation">
				<span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
			</button>
		</div>
		<a class="navbar-brand" href="<?= route_to('dashboard') ?>">
			<div class="d-flex align-items-center py-3">
				<img class="me-2" src="/images/dash/icons/spot-illustrations/falcon.png" alt="" width="30"/>
				<span class="font-varela"><?= env('app.name', 'CosmicFashion.') ?></span>
			</div>
		</a>
	</div>

	<div class="collapse navbar-collapse" id="navbarVerticalCollapse">
		<div class="navbar-vertical-content scrollbar">
			<ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
				<!--
            ========================================================================================    VERTICAL DASH
            -->

				<li class="nav-item">
					<!-- parent pages-->
					<a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse"
					   aria-expanded="true" aria-controls="dashboard">
						<div class="d-flex align-items-center">
							<span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span>
							<span class="nav-link-text ps-1">Dashboard</span>
						</div>
					</a>
					<ul class="nav collapse show" id="dashboard">
						<li class="nav-item">
							<a class="nav-link active" href="<?= route_to('dashboard') ?>">
								<div class="d-flex align-items-center">
									<span class="nav-link-text ps-1">Default</span>
								</div>
							</a><!-- more inner pages-->
						</li>
						<li class="nav-item">
							<a class="nav-link" href="dashboard/e-commerce.html">
								<div class="d-flex align-items-center">
									<span class="nav-link-text ps-1">E-commerce</span>
								</div>
							</a><!-- more inner pages-->
						</li>
						<li class="dropdown-divider"></li>
						<li class="nav-item">
							<a class="nav-link" href="dashboard/project-management.html">
								<div class="d-flex align-items-center">
									<span class="nav-link-text ps-1">API</span>
								</div>
							</a><!-- more inner pages-->
						</li>
					</ul>
				</li>

				<!--
            ========================================================================================    VERTICAL APP
            -->

				<li class="nav-item">
					<!-- label-->
					<div class="row navbar-vertical-label-wrapper mt-3 mb-2">
						<div class="col-auto navbar-vertical-label">App</div>
						<div class="col ps-0">
							<hr class="mb-0 navbar-vertical-divider"/>
						</div>
					</div>
					<!-- parent pages-->
					<a class="nav-link dropdown-indicator" href="#e-commerce" role="button" data-bs-toggle="collapse"
					   aria-controls="e-commerce">
						<div class="d-flex align-items-center">
							<span class="nav-link-icon"><span class="fas fa-shopping-cart"></span></span>
							<span class="nav-link-text ps-1">E commerce</span>
						</div>
					</a>
					<ul class="nav collapse false" id="e-commerce">
						<li class="nav-item">
							<a class="nav-link dropdown-indicator" href="#product" data-bs-toggle="collapse"
							   aria-controls="e-commerce">
								<div class="d-flex align-items-center">
									<span class="nav-link-text ps-1">Product</span>
								</div>
							</a><!-- more inner pages-->
							<ul class="nav collapse false" id="product">
								<li class="nav-item">
									<a class="nav-link" href="<?= route_to('admin.product.index') ?>">
										<div class="d-flex align-items-center"><span
													class="nav-link-text ps-1">List</span></div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= route_to('admin.product.create') ?>">
										<div class="d-flex align-items-center"><span
													class="nav-link-text ps-1">Create</span></div>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link dropdown-indicator" href="#categories" data-bs-toggle="collapse"
							   aria-controls="e-commerce">
								<div class="d-flex align-items-center"><span
											class="nav-link-text ps-1">Categories</span></div>
							</a>
							<!-- more inner pages-->
							<ul class="nav collapse false" id="categories">
								<li class="nav-item">
									<a class="nav-link" href="<?= route_to('admin.category.index') ?>">
										<div class="d-flex align-items-center"><span class="nav-link-text ps-1">List categories</span>
										</div>
									</a>
								</li>
								<li class="nav-item"><a class="nav-link"
								                        href="<?= route_to('admin.category.create') ?>">
										<div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create category</span>
										</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= route_to('admin.subcategory.index') ?>">
										<div class="d-flex align-items-center"><span class="nav-link-text ps-1">List sub categories</span>
										</div>
									</a>
								</li>
								<li class="nav-item"><a class="nav-link"
								                        href="<?= route_to('admin.subcategory.create') ?>">
										<div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create sub category</span>
										</div>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link dropdown-indicator" href="#orders" data-bs-toggle="collapse"
							   aria-controls="e-commerce">
								<div class="d-flex align-items-center"><span class="nav-link-text ps-1">Orders</span>
								</div>
							</a><!-- more inner pages-->
							<ul class="nav collapse false" id="orders">
								<li class="nav-item">
									<a class="nav-link" href="<?= route_to('admin.orders.index') ?>">
										<div class="d-flex align-items-center">
											<span class="nav-link-text ps-1">List</span>
										</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="app/e-commerce/orders/order-details.html">
										<div class="d-flex align-items-center">
											<span class="nav-link-text ps-1">Details</span>
										</div>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item"><a class="nav-link" href="app/e-commerce/checkout.html">
								<div class="d-flex align-items-center"><span class="nav-link-text ps-1">Checkout</span>
								</div>
							</a><!-- more inner pages-->
						</li>
						<li class="nav-item"><a class="nav-link" href="app/e-commerce/billing.html">
								<div class="d-flex align-items-center"><span class="nav-link-text ps-1">Billing</span>
								</div>
							</a><!-- more inner pages-->
						</li>
						<li class="nav-item"><a class="nav-link" href="app/e-commerce/invoice.html">
								<div class="d-flex align-items-center"><span class="nav-link-text ps-1">Invoice</span>
								</div>
							</a><!-- more inner pages-->
						</li>
					</ul>

					<!-- parent pages-->
					<a class="nav-link dropdown-indicator" href="#user" role="button" data-bs-toggle="collapse"
					   aria-controls="user">
						<div class="d-flex align-items-center">
							<span class="nav-link-icon"><span class="fas fa-user"></span></span>
							<span class="nav-link-text ps-1">Users</span>
						</div>
					</a>
					<ul class="nav collapse false" id="user">
						<li class="nav-item">
							<a class="nav-link" href="<?= route_to('admin.user.index') ?>">
								<div class="d-flex align-items-center"><span class="nav-link-text ps-1">List</span>
								</div>
							</a><!-- more inner pages-->
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= route_to('admin.user.create') ?>">
								<div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create</span>
								</div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= route_to('admin.user.show') ?>">
								<div class="d-flex align-items-center"><span class="nav-link-text ps-1">Details</span>
								</div>
							</a>
						</li>
					</ul>

					<!-- parent pages-->
					<a class="nav-link" href="app/calendar.html" role="button">
						<div class="d-flex align-items-center">
							<span class="nav-link-icon"><span class="fas fa-calendar-alt"></span></span>
							<span class="nav-link-text ps-1">Calendar</span>
						</div>
					</a>
					<!-- parent pages-->
					<a class="nav-link" href="app/chat.html" role="button">
						<div class="d-flex align-items-center">
							<span class="nav-link-icon"><span class="fas fa-comments"></span></span>
							<span class="nav-link-text ps-1">Chat</span>
						</div>
					</a>
					<!-- parent pages-->
					<a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse"
					   aria-controls="email">
						<div class="d-flex align-items-center">
							<span class="nav-link-icon"><span class="fas fa-envelope-open"></span></span>
							<span class="nav-link-text ps-1">Email</span>
						</div>
					</a>
					<ul class="nav collapse false" id="email">
						<li class="nav-item">
							<a class="nav-link" href="app/email/inbox.html">
								<div class="d-flex align-items-center">
									<span class="nav-link-text ps-1">Inbox</span>
								</div>
							</a><!-- more inner pages-->
						</li>
						<li class="nav-item"><a class="nav-link" href="app/email/email-detail.html">
								<div class="d-flex align-items-center"><span
											class="nav-link-text ps-1">Email detail</span></div>
							</a><!-- more inner pages-->
						</li>
						<li class="nav-item"><a class="nav-link" href="app/email/compose.html">
								<div class="d-flex align-items-center"><span class="nav-link-text ps-1">Compose</span>
								</div>
							</a><!-- more inner pages-->
						</li>
					</ul>
				</li>

				<!--
            ========================================================================================    VERTICAL API
            -->

				<li class="nav-item">
					<!-- label-->
					<div class="row navbar-vertical-label-wrapper mt-3 mb-2">
						<div class="col-auto navbar-vertical-label">Api</div>
						<div class="col ps-0">
							<hr class="mb-0 navbar-vertical-divider"/>
						</div>
					</div>
					<!-- parent pages-->
					<a class="nav-link" href="app/chat.html" role="button">
						<div class="d-flex align-items-center">
							<span class="nav-link-icon"><span class="fab fa-audible"></span></span>
							<span class="nav-link-text ps-1">Overview</span>
						</div>
					</a>
					<!-- parent pages-->
					<a class="nav-link dropdown-indicator" href="#users" role="button" data-bs-toggle="collapse"
					   aria-controls="users">
						<div class="d-flex align-items-center">
							<span class="nav-link-icon"><span class="fas fa-users"></span></span>
							<span class="nav-link-text ps-1">Users</span>
						</div>
					</a>
					<ul class="nav collapse false" id="users">
						<li class="nav-item">
							<a class="nav-link" href="app/e-commerce/customers.html">
								<div class="d-flex align-items-center"><span class="nav-link-text ps-1">User list</span>
								</div>
							</a><!-- more inner pages-->
						</li>
						<li class="nav-item">
							<a class="nav-link" href="app/e-commerce/customer-details.html">
								<div class="d-flex align-items-center"><span
											class="nav-link-text ps-1">User details</span></div>
							</a>
						</li>
					</ul>
					<!-- parent pages-->
					<a class="nav-link dropdown-indicator" href="#secrets" role="button" data-bs-toggle="collapse"
					   aria-controls="secrets">
						<div class="d-flex align-items-center">
							<span class="nav-link-icon"><span class="fas fa-user-secret"></span></span>
							<span class="nav-link-text ps-1">Secrets</span>
						</div>
					</a>
					<ul class="nav collapse false" id="secrets">
						<li class="nav-item">
							<a class="nav-link" href="app/e-commerce/customers.html">
								<div class="d-flex align-items-center"><span class="nav-link-text ps-1">Api Keys</span>
								</div>
							</a><!-- more inner pages-->
						</li>
						<li class="nav-item">
							<a class="nav-link" href="app/e-commerce/customers.html">
								<div class="d-flex align-items-center"><span
											class="nav-link-text ps-1">Generate Key</span></div>
							</a>
						</li>
					</ul>
				</li>

				<!--
            ========================================================================================    VERTICAL ADMIN
            -->

				<li class="nav-item">
					<!-- label-->
					<div class="row navbar-vertical-label-wrapper mt-3 mb-2">
						<div class="col-auto navbar-vertical-label">Admin</div>
						<div class="col ps-0">
							<hr class="mb-0 navbar-vertical-divider"/>
						</div>
					</div>

					<!-- parent pages-->
					<a class="nav-link" href="<?= route_to('admin.user.profile', user()->id) ?>" role="button">
						<div class="d-flex align-items-center">
							<span class="nav-link-icon">
								<span class="fas fa-user"></span>
							</span>
							<span class="nav-link-text ps-1">Profile</span>
						</div>
					</a>
					<a class="nav-link" href="<?= route_to('admin.stats.index') ?>" role="button">
						<div class="d-flex align-items-center">
							<span class="nav-link-icon">
								<span class="fas fa-chart-pie"></span>
							</span>
							<span class="nav-link-text ps-1">Analytics</span>
						</div>
					</a>
					<!-- parent pages-->
					<a class="nav-link dropdown-indicator" href="#miscellaneous" role="button"
					   data-bs-toggle="collapse" aria-controls="miscellaneous">
						<div class="d-flex align-items-center">
							<span class="nav-link-icon">
								<span class="fas fa-thumbtack"></span></span>
							<span class="nav-link-text ps-1">Miscellaneous</span>
						</div>
					</a>
					<ul class="nav collapse false" id="miscellaneous">
						<li class="nav-item">
							<a class="nav-link" href="pages/miscellaneous/associations.html">
								<div class="d-flex align-items-center">
									<span class="nav-link-text ps-1">Associations</span>
								</div>
							</a><!-- more inner pages-->
						</li>
						<li class="nav-item">
							<a class="nav-link" href="pages/miscellaneous/invite-people.html">
								<div class="d-flex align-items-center">
									<span class="nav-link-text ps-1">Invite people</span>
								</div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="pages/miscellaneous/privacy-policy.html">
								<div class="d-flex align-items-center">
									<span class="nav-link-text ps-1">Privacy policy</span>
								</div>
							</a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="settings mb-3">
				<div class="card alert p-0 shadow-none" role="alert">
					<div class="btn-close-falcon-container">
						<div class="btn-close-falcon" aria-label="Close" data-bs-dismiss="alert"></div>
					</div>
					<div class="card-body text-center"><img
								src="/images/dash/icons/spot-illustrations/navbar-vertical.png" alt="" width="80"/>
						<p class="fs--2 mt-2">Loving what you see?</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>

<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-xl" style="display: none;">
	<button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
	        data-bs-toggle="collapse"
	        data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-label="Toggle Navigation">
		<span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
	</button>

    <?= $this->include('Admin/partials/navs/repeats/top_nav_list') ?>

</nav>