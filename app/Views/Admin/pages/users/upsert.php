<?= $this->extend('Admin/layouts/master') ?>
<?= $this->section('title') ?>
	Create Product
<?= $this->endSection() ?>
<?= $this->section('links') ?>
	<link href="/vendor/admin/flatpickr/flatpickr.min.css" rel="stylesheet">
	<link href="/vendor/admin/dropzone/dropzone.min.css" rel="stylesheet">
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="card mb-3">
		<div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);"></div>
		<!--/.bg-holder-->
		<div class="card-body position-relative">
			<div class="row">
				<div class="col-lg-8">
					<h3>Validation</h3>
					<p class="mb-0">Provide valuable, actionable feedback to your users with HTML5 form validation, via browser default behaviors or
						custom styles and JavaScript.</p>
					<a class="btn btn-link btn-sm ps-0 mt-2" href="https://getbootstrap.com/docs/5.1/forms/validation" target="_blank">
						Validation on Bootstrap<span class="fas fa-chevron-right ms-1 fs--2"></span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-lg-8 col-xl-12 col-xxl-8 h-100">
			<div class="d-flex mb-4">
				<span class="fa-stack me-2 ms-n1">
					<i class="fas fa-circle fa-stack-2x text-300"></i>
					<i class="fa-inverse fa-stack-1x text-primary fas fa-check-double"></i>
				</span>
				<div class="col">
					<h5 class="mb-0 text-primary position-relative">
						<span class="bg-200 dark__bg-1100 pe-3">User creation</span>
						<span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span>
					</h5>
					<p class="mb-0">You can easily show your stats content by using these cards.</p>
				</div>
			</div>
			<div class="card theme-wizard h-100">
				<div class="card-header bg-light pt-3 pb-2">
					<ul class="nav justify-content-between nav-wizard">
						<li class="nav-item">
							<a class="nav-link active fw-semi-bold" href="#bootstrap-wizard-validation-tab1" data-bs-toggle="tab"
							   data-wizard-step="data-wizard-step">
								<span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-lock"></span></span></span>
								<span class="d-none d-md-block mt-1 fs--1">Account</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab2" data-bs-toggle="tab"
							   data-wizard-step="data-wizard-step">
								<span class="nav-item-circle-parent">
									<span class="nav-item-circle"><span class="fas fa-user"></span></span>
								</span>
								<span class="d-none d-md-block mt-1 fs--1">Personal</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab3" data-bs-toggle="tab"
							   data-wizard-step="data-wizard-step">
								<span class="nav-item-circle-parent">
									<span class="nav-item-circle"><span class="fas fa-thumbs-up"></span></span>
								</span>
								<span class="d-none d-md-block mt-1 fs--1">Finish</span>
							</a>
						</li>
					</ul>
				</div>
				<div class="card-body py-4" id="wizard-controller">
					<div class="tab-content">
						<div class="tab-pane active px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab1"
						     id="bootstrap-wizard-validation-tab1">
							<form class="needs-validation" novalidate="novalidate">
								<div class="row g-2 mb-3">
									<div class="col">
										<label class="form-label" for="bootstrap-wizard-validation-wizard-name">First name*</label>
										<input class="form-control" type="text" name="first_name" placeholder="John" required
										       id="bootstrap-wizard-validation-wizard-name">
									</div>
									<div class="col">
										<label class="form-label" for="bootstrap-wizard-validation-wizard-name">Last name *</label>
										<input class="form-control" type="text" name="last_name" placeholder="Smith" required
										       id="bootstrap-wizard-validation-wizard-name">
									</div>
								</div>
								<div class="mb-3">
									<label class="form-label" for="bootstrap-wizard-validation-wizard-email">Email*</label>
									<input class="form-control" type="email" name="email" placeholder="Email address"
											pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required="required"
											id="bootstrap-wizard-validation-wizard-email" data-wizard-validate-email="true">
									<div class="invalid-feedback">You must add email</div>
								</div>
								<div class="row g-2">
									<div class="col-6">
										<div class="mb-3">
											<label class="form-label" for="bootstrap-wizard-validation-wizard-password">Password*</label>
											<input class="form-control" type="password" name="password" placeholder="Password" required="required"
											       id="bootstrap-wizard-validation-wizard-password" data-wizard-validate-password="true">
											<div class="invalid-feedback">Please enter password</div>
										</div>
									</div>
									<div class="col-6">
										<div class="mb-3">
											<label class="form-label" for="bootstrap-wizard-validation-wizard-confirm-password">Confirm
												Password*</label>
											<input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password"
											       required id="bootstrap-wizard-validation-wizard-confirm-password"
											       data-wizard-validate-confirm-password="true">
											<div class="invalid-feedback">Passwords need to match</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab2"
						     id="bootstrap-wizard-validation-tab2">
							<form>
								<div class="mb-3">
									<div class="row" data-dropzone="data-dropzone"
									     data-options='{"maxFiles":1,"data":[{"name":"avatar.png","size":"54kb","url":"/images/dash/team"}]}'>
										<div class="fallback"><input type="file" name="image"/></div>
										<div class="col-md-auto">
											<div class="dz-preview dz-preview-single">
												<div class="dz-preview-cover d-flex align-items-center justify-content-center mb-3 mb-md-0 dz-image-preview">
													<div class="avatar avatar-4xl">
														<img class="rounded-circle" src="../../assets/img/team/avatar.png" alt="avatar.png"
														     data-dz-thumbnail="data-dz-thumbnail">
													</div>
													<div class="dz-progress">
														<span class="dz-upload" data-dz-uploadprogress=""></span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md">
											<div class="dz-message dropzone-area px-2 py-3" data-dz-message="data-dz-message">
												<div class="text-center">
													<img class="me-2" src="../../assets/img/icons/cloud-upload.svg" width="25" alt="">
													Upload profile picture
													<p class="mb-0 fs--1 text-400">Upload a 300x300 jpg image with <br>a maximum size of 400KB</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row g-2 mb-3">
									<div class="col">
										<label class="form-label" for="bootstrap-wizard-validation-gender">Gender</label>
										<select class="form-select" name="gender" id="bootstrap-wizard-validation-gender">
											<option value="">Select your gender ...</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
									<div class="col">
										<label class="form-label" for="role">Role</label>
										<select class="form-select" name="role" id="role" required>
											<option value="">Select user role ...</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Other">Other</option>
										</select>
									</div>
								</div>
								<div class="mb-3">
									<label class="form-label" for="bootstrap-wizard-validation-wizard-phone">Phone</label>
									<input class="form-control" type="text" name="phone" placeholder="Phone"
									       id="bootstrap-wizard-validation-wizard-phone">
								</div>
							</form>
						</div>
						<div class="tab-pane text-center px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab3"
						     id="bootstrap-wizard-validation-tab3">
							<i class="fas fa-check-circle text-success fs-24"></i>
							<h4 class="mb-1">Your product is all set!</h4>
							<p>Click create to complete.</p><a class="btn btn-primary px-5 my-3" href="javascript:void(0)">Create</a>
						</div>
					</div>
				</div>
				<div class="card-footer bg-light">
					<div class="px-sm-3 px-md-5">
						<ul class="pager wizard list-inline mb-0">
							<li class="previous">
								<button class="btn btn-link ps-0" type="button">
									<span class="fas fa-chevron-left me-2" data-fa-transform="shrink-3"></span>Prev
								</button>
							</li>
							<li class="next">
								<button class="btn btn-primary px-5 px-sm-6" type="submit">
									Next<span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"></span>
								</button>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

<?= $this->section('scripts') ?>
	<script src="/js/admin/flatpickr.js"></script>
	<script src="/vendor/admin/dropzone/dropzone.min.js"></script>
	<script src="/vendor/admin/lottie/lottie.min.js"></script>
	<script src="/vendor/admin/validator/validator.min.js"></script>

	<script>

	</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>