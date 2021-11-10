<?= $this->extend('layouts/guest') ?>
<?= $this->section('links') ?>
	<link rel="stylesheet" href="/vendor/loadingbtn/loading.min.css">
	<link rel="stylesheet" href="/vendor/loadingbtn/ldbtn.min.css">
<?= $this->endSection() ?>
<?= $this->section('content') ?>


	<div class="d-flex flex-column justify-content-center align-items-center h-100 col-12 col-md-6">
		<div class="container">
			<div class="d-flex justify-content-center row">
				<div class="col-auto col-xl-6">
					<div class="card rounded-7">
						<div class="card-header bg-circle-shape bg-shape text-center p-3 rounded-7">
							<a class="fw-bolder fs-4 z-index-1 position-relative link-light light"
							   href="<?= route_to('home') ?>"><?= env('app.name', 'CosmicFashion.') ?></a>
						</div>
						<div class="card-body p-3 p-md-4">
							<div class="d-flex justify-content-between align-items-center mb-5">
								<h5 class="fw-bold">Sign In</h5>
								<small>New user? <a href="<?= route_to('register') ?>">Create account</a></small>
							</div>

                            <?php if(session()->getFlashdata('msg')): ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Holy guacamole!</strong>
									<hr/>
                                    <?= session()->getFlashdata('msg') ?>
									<button type="button" class="btn-close" data-bs-dismiss="alert"
									        aria-label="Close"></button>
								</div>
                            <?php endif; ?>

                            <?= view('App\auth\_message_block') ?>

							<form id="login" action="" method="POST">
                                <?= csrf_field() ?>

								<div class="form-group">
									<small class="fw-bold">Email</small>
									<input type="email" name="email" placeholder="Email" value="<?= old('email') ?>"
									       required="" aria-label autofocus class="w-100 form-control"/>
								</div>
								<small class="fw-bold">Password</small>
								<div class="input-group">
									<input type="password" name="password" placeholder="Password" required aria-label
									       class="form-control"/>
									<span class="input-group-text border-right-0 rounded-0 show-password"
									      title="Show Password" style="cursor: pointer">
									<i class="bi bi-eye"></i></span>
								</div>
								<div class="row justify-content-between small my-3">
									<div class="col-auto">
										<div class="form-check mb-0"><input class="form-check-input" type="checkbox"
										                                    id="split-checkbox"><label
													class="form-check-label mb-0" for="split-checkbox">Remember
												me</label></div>
									</div>
									<div class="col-auto"><a class="fs--1" href="forgot-password.html">Forgot
											Password?</a></div>
								</div>
								<div class="d-grid">
									<button type="submit"
									        class="Login_button__28f5q fw-bold text-uppercase btn btn-primary ld-ext-right">
										Sign In <i class="fas fa-key"></i>
										<span class="ld ld-ring ld-spin"></span>
									</button>
								</div>
							</form>
							<footer class="d-flex justify-content-center small auth_footer">
								<a href="javascript:void(0)">Terms & Conditions</a>
							</footer>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="d-none d-md-inline-block h-100 Login_backgroundImage__2j-eI col-sm-6"></div>

<?= $this->section('scripts') ?>
	<script src="/vendor/jquery/jqueryValidation.js"></script>
	<script>
        $(() => {
            $('#login').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: 'required'
                },
                submitHandler: form => {
                    const data = {};
                    $(form).serializeArray().map(input => data[input.name] = input.value)

                    const submitButton = $(form).find($('button[type="submit"]'))

                    $.ajax({
                        data: data,
                        url: `<?= route_to('login') ?>`,
                        method: 'POST',
                       /* beforeSend: () => submitButton.prop('disabled', true).html(`Signing In...
										<span class="ld ld-ring ld-spin"></span>`).addClass('running'),*/
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
                            let res = eval("(" + xhr.responseText + ")");

                            if (res.status !== true) submitButton.prop('disabled', false).html(`Sign In
										<span class="ld ld-ring ld-spin"></span>`).removeClass('running')
                        }
                    })
                }
            })
        })
	</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>