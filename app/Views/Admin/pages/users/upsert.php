<?= $this->extend('Admin/layouts/master') ?>
<?= $this->section('title') ?>
	Create Product
<?= $this->endSection() ?>
<?= $this->section('links') ?>
	<link rel="stylesheet" href="/vendor/tomselect/tom-select.bootstrap5.css">
	<link href="/vendor/filepond/css/style.css" rel="stylesheet"/>
	<link href="/vendor/filepond/css/plugin-image-preview.css" rel="stylesheet"/>
	<link href="/vendor/filepond/css/image-edit.css" rel="stylesheet"/>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="card mb-3">
		<div class="bg-holder d-none d-lg-block bg-card"
		     style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);"></div>
		<!--/.bg-holder-->
		<div class="card-body position-relative">
			<div class="row">
				<div class="col-lg-8">
					<h3>Validation</h3>
					<p class="mb-0">Provide valuable, actionable feedback to your users with HTML5 form validation, via
						browser default behaviors or
						custom styles and JavaScript.</p>
					<a class="btn btn-link btn-sm ps-0 mt-2" href="https://getbootstrap.com/docs/5.1/forms/validation"
					   target="_blank">
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
							<a class="nav-link active fw-semi-bold" href="#bootstrap-wizard-validation-tab1"
							   data-bs-toggle="tab"
							   data-wizard-step="data-wizard-step">
								<span class="nav-item-circle-parent">
									<span class="nav-item-circle"><span class="fas fa-lock"></span></span>
								</span>
								<span class="d-none d-md-block mt-1 fs--1">Account</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab2"
							   data-bs-toggle="tab"
							   data-wizard-step="data-wizard-step">
								<span class="nav-item-circle-parent">
									<span class="nav-item-circle"><span class="fas fa-user"></span></span>
								</span>
								<span class="d-none d-md-block mt-1 fs--1">Personal</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab3"
							   data-bs-toggle="tab"
							   data-wizard-step="data-wizard-step">
								<span class="nav-item-circle-parent">
									<span class="nav-item-circle"><span class="fas fa-thumbs-up"></span></span>
								</span>
								<span class="d-none d-md-block mt-1 fs--1">Finish</span>
							</a>
						</li>
					</ul>
				</div>

                <?= view('App\auth\_message_block') ?>

				<div class="card-body py-4" id="wizard-controller">
					<form id="create-user" action="<?= route_to('admin.user.store') ?>" class="tab-content"
					      method="POST"
					      enctype="multipart/form-data">
                        <?= csrf_field() ?>
						<div class="tab-pane active px-sm-3 px-md-5" role="tabpanel"
						     aria-labelledby="bootstrap-wizard-validation-tab1"
						     id="bootstrap-wizard-validation-tab1">
							<div class="row g-2 mb-3">
								<div class="col">
									<label class="form-label" for="first_name">First name*</label>
									<input class="form-control" type="text" name="first_name" placeholder="John"
									       required id="first_name" value="<?= old('first_name') ?>">
								</div>
								<div class="col">
									<label class="form-label" for="last_name">Last name *</label>
									<input class="form-control" type="text" name="last_name" placeholder="Smith"
									       required value="<?= old('last_name') ?>" id="last_name">
								</div>
							</div>
							<div class="mb-3">
								<label class="form-label" for="bootstrap-wizard-validation-wizard-email">Email*</label>
								<input class="form-control" type="email" name="email" placeholder="Email address"
								       pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$"
								       required="required" value="<?= old('email') ?>"
								       id="bootstrap-wizard-validation-wizard-email" data-wizard-validate-email="true">
							</div>
							<div class="row g-2">
								<div class="col-6">
									<div class="mb-3">
										<label class="form-label" for="password">Password*</label>
										<input class="form-control" type="password" name="password"
										       placeholder="Password" required="required" id="password">
									</div>
								</div>
								<div class="col-6">
									<div class="mb-3">
										<label class="form-label" for="password_confirmation">Confirm Password*</label>
										<input class="form-control" type="password" name="password_confirmation"
										       placeholder="Confirm Password" required id="password_confirmation">
									</div>
								</div>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="terms"
								       id="use_default_pass">
								<label class="form-check-label" for="use_default_pass">
									Use the <a href="javascript:void(0)">default </a>password.</a></label>
							</div>
						</div>
						<div class="tab-pane px-sm-3 px-md-5" role="tabpanel"
						     aria-labelledby="bootstrap-wizard-validation-tab2"
						     id="bootstrap-wizard-validation-tab2">
							<div class="row mb-3 align-items-center">
								<div class="col">
									<label class="form-label" for="gender">Gender</label>
									<select class="form-select" name="gender" id="gender">
										<option selected hidden value="">Select your gender ...</option>
										<option value="male">Male</option>
										<option value="female">Female</option>
									</select>
								</div>
								<div class="col-lg-4">
									<input type="file" class="filepond" id="image" name="image">
								</div>
							</div>
							<div class="row g-2 mb-3">
								<div class="col">
									<label class="form-label" for="role">Role</label>
									<select class="form-select" name="role_id" id="role" required>
										<option selected hidden value="">Select user role ...</option>
                                        <?php foreach($roles as $role): ?>
											<option value="<?= $role->id ?>"><?= $role->name ?></option>
                                        <?php endforeach; ?>
									</select>
								</div>
								<div class="col">
									<label class="form-label" for="phone">Phone</label>
									<input class="form-control" type="text" name="phone" placeholder="Phone"
									       id="phone" value="<?= old('phone') ?>">
								</div>
							</div>
						</div>
						<div class="tab-pane text-center px-sm-3 px-md-5" role="tabpanel"
						     aria-labelledby="bootstrap-wizard-validation-tab3"
						     id="bootstrap-wizard-validation-tab3">
							<i class="fas fa-check-circle text-success fs-48 mb-3"></i>
							<h4 class="mb-1">User account is ready for creation!</h4>
							<p><i>Click create to complete.</i></p>
							<button class="btn btn-primary px-5 my-3" type="submit">Create</button>
						</div>
					</form>
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
	<script src="/vendor/admin/validator/validator.min.js"></script>
	<script src="/vendor/jquery/jqueryValidation.js"></script>
	<script src="/js/jQueryValidation.js"></script>

	<script src="/vendor/filepond/js/plugins/image-preview.js"></script>
	<script src="/vendor/filepond/js/plugins/image-resize.js"></script>
	<script src="/vendor/filepond/js/plugins/file-validate-type.js"></script>
	<script src="/vendor/filepond/js/plugins/file-rename.js"></script>
	<script src="/vendor/filepond/js/filepond.min.js"></script>

	<script src="/js/wizard.js"></script>
	<script src="/js/filepond.js"></script>

	<script>
        $(() => {
            wizardInit()
            filepondInit()

            if (<?= isset($user->image) && file_exists("images/users/" . ($user->image ?? 0)) ? : '0' ?>)
                pond.addFile(`{{ gcs_asset("images/users/$user->image") }}`)
                    .then(file => {
                        console.log(file)
                    });

            $('#use_default_pass').on('change', function() {
                $('input[type="password"]').val($(this).prop("checked") ? 'CosmoDressing!' : '')
            })
        })
	</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>