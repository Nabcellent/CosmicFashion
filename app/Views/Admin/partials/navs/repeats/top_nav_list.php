<a class="navbar-brand me-1 me-sm-3" href="<?= route_to('dashboard') ?>">
	<div class="d-flex align-items-center">
		<img class="me-2" src="/images/dash/icons/spot-illustrations/falcon.png" alt="" width="40"/>
		<span class="font-sans-serif"><?= env('app.name', 'CosmicFashion.') ?></span>
	</div>
</a>


<div class="collapse navbar-collapse scrollbar" id="navbarStandard">
	<ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">

		<!--
        ========================================================================================    TOP DASH
        -->

		<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
		                                 aria-expanded="false" id="dashboards">Dashboard</a>
			<div class="dropdown-menu dropdown-menu-card border-0 mt-0" aria-labelledby="dashboards">
				<div class="bg-white dark__bg-1000 rounded-3 py-2">
					<a class="dropdown-item link-600 fw-medium" href="index-2.html">Default</a>
					<a class="dropdown-item link-600 fw-medium" href="dashboard/analytics.html">Analytics</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item link-600 fw-medium" href="dashboard/crm.html">API</a>
					<a class="dropdown-item link-600 fw-medium" href="dashboard/e-commerce.html">E commerce</a>
				</div>
			</div>
		</li>

		<!--
        ========================================================================================    TOP APP
        -->

		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="apps">App</a>
			<div class="dropdown-menu dropdown-menu-card border-0 mt-0" aria-labelledby="apps">
				<div class="card navbar-card-app shadow-none dark__bg-1000">
					<div class="card-body scrollbar max-h-dropdown">
						<img class="img-dropdown" src="/images/dash/icons/spot-illustrations/authentication-corner.png" width="130" alt=""/>
						<div class="row">
							<div class="col-6 col-md-5">
								<div class="nav flex-column">
									<a class="nav-link py-1 link-600 fw-medium" href="app/calendar.html">Calendar</a>
									<a class="nav-link py-1 link-600 fw-medium" href="app/chat.html">Chat</a>
									<p class="nav-link text-700 mb-0 fw-bold">Email</p>
									<a class="nav-link py-1 link-600 fw-medium" href="app/email/inbox.html">Inbox</a>
									<a class="nav-link py-1 link-600 fw-medium" href="app/email/email-detail.html">Email detail</a>
									<a class="nav-link py-1 link-600 fw-medium" href="app/email/compose.html">Compose</a>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="nav flex-column">
									<p class="nav-link text-700 mb-0 fw-bold">App users</p>
									<a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/customers.html">Customers list</a>
									<a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/customer-details.html">Customer details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</li>

		<!--
        ========================================================================================    TOP PAGES
        -->

		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
			   aria-expanded="false" id="pagess">Pages</a>
			<div class="dropdown-menu dropdown-menu-card border-0 mt-0" aria-labelledby="pagess">
				<div class="card navbar-card-pages shadow-none dark__bg-1000">
					<div class="card-body scrollbar max-h-dropdown">
						<img class="img-dropdown" src="/images/dash/icons/spot-illustrations/authentication-corner.png"
						     width="130" alt=""/>
						<div class="row">
							<div class="col-6 col-xxl-3">
								<div class="nav flex-column">
									<p class="nav-link text-700 mb-0 fw-bold">User</p>
									<a class="nav-link py-1 link-600 fw-medium" href="pages/user/profile.html">Profile</a>
									<a class="nav-link py-1 link-600 fw-medium" href="pages/user/settings.html">Settings</a>
								</div>
							</div>
							<div class="col-6 col-xxl-3">
								<div class="nav flex-column">
									<p class="nav-link text-700 mb-0 fw-bold">Pricing</p>
									<a class="nav-link py-1 link-600 fw-medium" href="pages/pricing/pricing-default.html">Pricing default</a>
									<a class="nav-link py-1 link-600 fw-medium" href="pages/pricing/pricing-alt.html">Pricing alt</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</li>

		<!--
        ========================================================================================    TOP API
        -->

		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
			   aria-expanded="false" id="apps">Api</a>
			<div class="dropdown-menu dropdown-menu-card border-0 mt-0" aria-labelledby="apps">
				<div class="card navbar-card-app shadow-none dark__bg-1000">
					<div class="card-body scrollbar max-h-dropdown">
						<img class="img-dropdown" src="/images/dash/icons/spot-illustrations/authentication-corner.png"
						     width="130" alt=""/>
						<div class="row">
							<div class="col-6 col-md-5">
								<div class="nav flex-column">
									<a class="nav-link py-1 link-600 fw-medium" href="app/calendar.html">Calendar</a>
									<a class="nav-link py-1 link-600 fw-medium" href="app/chat.html">Chat</a>
									<p class="nav-link text-700 mb-0 fw-bold">Email</p>
									<a class="nav-link py-1 link-600 fw-medium" href="app/email/inbox.html">Inbox</a>
									<a class="nav-link py-1 link-600 fw-medium" href="app/email/email-detail.html">Email detail</a>
									<a class="nav-link py-1 link-600 fw-medium" href="app/email/compose.html">Compose</a>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="nav flex-column">
									<p class="nav-link text-700 mb-0 fw-bold">Api users</p>
									<a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/customers.html">Users list</a>
									<a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/customer-details.html">User details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>
<ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
	<li class="nav-item">
		<div class="theme-control-toggle fa-icon-wait px-2">
			<input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme"
			       value="dark"/>
			<label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip"
			       data-bs-placement="left" title="Switch to light theme">
				<span class="fas fa-sun fs-0"></span>
			</label>
			<label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip"
			       data-bs-placement="left" title="Switch to dark theme">
				<span class="fas fa-moon fs-0"></span>
			</label>
		</div>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" href="#"
		   role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span>
		</a>
		<div class="dropdown-menu dropdown-menu-end dropdown-menu-card dropdown-menu-notification" aria-labelledby="navbarDropdownNotification">
			<div class="card card-notification shadow-none">
				<div class="card-header">
					<div class="row justify-content-between align-items-center">
						<div class="col-auto">
							<h6 class="card-header-title mb-0">Notifications</h6>
						</div>
						<div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Mark all as read</a></div>
					</div>
				</div>
				<div class="scrollbar-overlay" style="max-height:19rem">
					<div class="list-group list-group-flush fw-normal fs--1">
						<div class="list-group-title border-bottom">NEW</div>
						<div class="list-group-item">
							<a class="notification notification-flush notification-unread" href="#!">
								<div class="notification-avatar">
									<div class="avatar avatar-2xl me-3">
										<img class="rounded-circle" src="/images/dash/team/1-thumb.png" alt=""/>
									</div>
								</div>
								<div class="notification-body">
									<p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
									<span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">💬</span>Just now</span>
								</div>
							</a>
						</div>
						<div class="list-group-item">
							<a class="notification notification-flush notification-unread" href="#!">
								<div class="notification-avatar">
									<div class="avatar avatar-2xl me-3">
										<div class="avatar-name rounded-circle"><span>AB</span></div>
									</div>
								</div>
								<div class="notification-body">
									<p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status</p>
									<span class="notification-time"><span class="me-2 fab fa-gratipay text-danger"></span>9hr</span>
								</div>
							</a>
						</div>
						<div class="list-group-title border-bottom">EARLIER</div>
						<div class="list-group-item">
							<a class="notification notification-flush" href="#!">
								<div class="notification-avatar">
									<div class="avatar avatar-2xl me-3">
										<img class="rounded-circle" src="/images/dash/icons/weather-sm.jpg" alt=""/>
									</div>
								</div>
								<div class="notification-body">
									<p class="mb-1">The forecast today shows a low of 20&#8451; in California. See today's weather.</p>
									<span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🌤️</span>1d</span>
								</div>
							</a>
						</div>
						<div class="list-group-item">
							<a class="border-bottom-0 notification-unread  notification notification-flush" href="#!">
								<div class="notification-avatar">
									<div class="avatar avatar-xl me-3">
										<img class="rounded-circle" src="/images/dash/logos/oxford.png" alt=""/>
									</div>
								</div>
								<div class="notification-body">
									<p class="mb-1"><strong>University of Oxford</strong> created an event : "Causal Inference Hilary 2019"</p>
									<span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">✌️</span>1w</span>
								</div>
							</a>
						</div>
						<div class="list-group-item">
							<a class="border-bottom-0 notification notification-flush" href="#!">
								<div class="notification-avatar">
									<div class="avatar avatar-xl me-3">
										<img class="rounded-circle" src="/images/dash/team/10.jpg" alt=""/>
									</div>
								</div>
								<div class="notification-body">
									<p class="mb-1">
										<strong>James Cameron</strong> invited to join the group: United Nations International Children's Fund
									</p>
									<span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🙋‍</span>2d</span>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="card-footer text-center border-top"><a class="card-link d-block" href="app/social/notifications.html">View all</a></div>
			</div>
		</div>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<div class="avatar avatar-xl">
                <?php if(isset(user()->image)): ?>
					<img class="rounded-circle" src="/images/users/<?= user()->image ?>" alt="" />
                <?php else: ?>
					<img class="rounded-circle" src="/images/dash/icons/spot-illustrations/falcon.png" alt="Prof Pic.">
                <?php endif; ?>
			</div>
		</a>
		<div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
			<div class="bg-white dark__bg-1000 rounded-2 py-2">
				<span class="dropdown-header fw-bold text-warning py-1">
					<span class="fas fa-crown me-1"></span>
					<span><?= env('app.name', 'CosmicFashion.') ?></span>
				</span>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#!">Set status</a>
				<a class="dropdown-item" href="pages/user/profile.html">Profile &amp; account</a>
				<a class="dropdown-item" href="#!">Feedback</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="pages/user/settings.html">Settings</a>
				<a class="dropdown-item" href="<?= route_to('logout') ?>">Sign out</a>
			</div>
		</div>
	</li>
</ul>