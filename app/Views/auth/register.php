<?= $this->extend('layouts/guest') ?>
<?= $this->section('links') ?>
<link rel="stylesheet" href="/vendor/loadingbtn/loading.min.css">
<link rel="stylesheet" href="/vendor/loadingbtn/ldbtn.min.css">
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="d-flex flex-column justify-content-center align-items-center h-100 col-12 col-md-6">
	<div class="container">
		<div class="d-flex justify-content-center row">
			<div class="col-auto col-lg-8">
				<h4 class="fw-bold" style="margin-bottom:100px"><a
							href="<?= route_to('home') ?>"><?= env('app.name', 'CosmicFashion.') ?></a></h4>
				<h5 class="fw-bold mb-5">Sign Up</h5>

                <?php if(session()->getFlashdata('msg')): ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Holy guacamole!</strong>
						<hr/>
						<ul>
                            <?php foreach(session()->getFlashdata('msg') as $msg): ?>
								<li><?= $msg ?></li>
                            <?php endforeach; ?>
						</ul>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
                <?php endif; ?>

                <?= view('App\auth\_message_block') ?>

				<form id="register" action="" method="POST" class="w-100">
                    <?= csrf_field() ?>

					<div class="row mb-2">
						<div class="col form-group">
							<small class="fw-bold">First name</small>
							<input type="text" name="first_name" placeholder="John" value="<?= old('first_name') ?>"
							       required aria-label
							       class="w-100 form-control"/>
						</div>
						<div class="col form-group">
							<small class="fw-bold">Last name</small>
							<input type="text" name="last_name" placeholder="Doe" value="<?= old('last_name') ?>"
							       required aria-label
							       class="w-100 form-control"/>
						</div>
					</div>
					<div class="form-group">
						<small class="fw-bold">Email</small>
						<input type="email" name="email" placeholder="Email address" value="<?= old('email') ?>"
						       required aria-label
						       class="w-100 form-control"/>
					</div>
					<div class="row justify-content-center mb-2">
						<div class="col-12 text-center"><small class="fw-bold">Gender</small></div>
						<div class="col-auto form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="male" value="male">
							<label class="form-check-label" for="male">Male</label>
						</div>
						<div class="col-auto form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="female" value="female">
							<label class="form-check-label" for="female">Female</label>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col">
							<small class="fw-bold">Password</small>
							<div class="input-group">
								<input type="password" name="password" placeholder="Password" id="password" required
								       aria-label
								       class="form-control"/>
								<span class="input-group-text border-right-0 rounded-0 show-password"
								      title="Show Password" style="cursor: pointer">
									<i class="bi bi-eye"></i></span>
							</div>
						</div>
						<div class="col">
							<small class="fw-bold">Confirm Password</small>
							<div class="input-group">
								<input type="password" name="password_confirmation" placeholder="Password" required
								       aria-label
								       class="form-control"/>
								<span class="input-group-text border-right-0 rounded-0 show-password"
								      title="Show Password" style="cursor: pointer">
									<i class="bi bi-eye"></i></span>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-between align-items-center mt-5">
						<a href="<?= route_to('login') ?>">Sign In to your account</a>
						<button type="submit"
						        class="fw-bold text-uppercase Register_button__1hHYm btn btn-primary ld-ext-right">
							SIGN UP <i class="fas fa-user-plus"></i><span class="ld ld-ring ld-spin"></span>
						</button>
					</div>
				</form>
				<footer style="margin-top:100px" class="d-flex justify-content-between Register_footer__3THtR">
					<a href="javascript:void(0)">Terms & Conditions</a>
					<a href="javascript:void(0)">Privacy Policy</a><a href="register.html#">Help</a>
				</footer>

			</div>
		</div>
	</div>
</div>

<div class="d-none d-md-inline-block h-100 Register_backgroundImage__3ZLed col-sm-6"></div>

<?= $this->section('scripts') ?>
<script src="/vendor/jquery/jqueryValidation.js"></script>
<script>
    $(() => {
        $('#register').validate({
            rules: {
                first_name: 'required',
                last_name: 'required',
                email: {
                    required: true,
                    email: true,
                    remote: '/check-email',
                },
                gender: 'required',
                password: {minlength: 8},
                password_confirmation: {equalTo: '#password'}
            },
            messages: {
                email: {
                    remote: 'Email address already in use.',
                },
                gender: 'Gender is required.',
                password_confirmation: {
                    equalTo: 'Passwords do not match.'
                }
            },
            submitHandler: form => {
                const data = {};
                $(form).serializeArray().map(input => data[input.name] = input.value)

                const submitButton = $(form).find($('button[type="submit"]'))

                $.ajax({
                    data: data,
                    url: `<?= route_to('register') ?>`,
                    method: 'POST',
                    beforeSend: () => submitButton.prop('disabled', true).addClass('running'),
                    success: response => {
                        const result = JSON.parse(response)

                        if (result.status) {
                            location.href = result.url
                        } else if (result.message) {
                            toast({msg: result.message, type: 'warning', duration: 10, position: 'left'})
                        } else {
                            toast({
                                msg: `Error: unable to log you in. Kindly contact admin.`,
                                type: 'warning',
                                position: 'left'
                            })
                        }
                    },
                    complete: (xhr) => {
                        let err = eval("(" + xhr.responseText + ")");

                        if(err.status !== true) submitButton.prop('disabled', false).removeClass('running')
                    }
                })
            }
        })
    })
</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>
