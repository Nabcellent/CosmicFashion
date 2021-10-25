<?= $this->extend('layouts/guest') ?>
<?= $this->section('content') ?>


	<div class="d-flex flex-column justify-content-center align-items-center h-100 col-12 col-md-6">
		<div class="container">
			<div class="d-flex justify-content-center row">
				<div class="col-auto col-xl-6">
					<h4 class="fw-bold" style="margin-bottom:100px"><a href="<?= route_to('home') ?>"><?= env('app.name', 'CosmicFashion.') ?></a></h4>
					<h5 class="fw-bold mb-5">Login</h5>

                    <?php if(session()->getFlashdata('msg')): ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Holy guacamole!</strong><hr/>
                            <?= session()->getFlashdata('msg') ?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
                    <?php endif; ?>

                    <?= view('App\auth\_message_block') ?>

					<form id="login" action="<?= route_to('login') ?>" method="POST">
                        <?= csrf_field() ?>

						<div class="form-group">
							<small class="fw-bold">Email</small>
							<input type="email" name="email" placeholder="Email" value="<?= old('email') ?>" required="" aria-label
							       class="w-100 form-control"/>
						</div>
						<small class="fw-bold">Password</small>
						<div class="input-group">
							<input type="password" name="password" placeholder="Password" required aria-label
							       class="form-control"/>
							<span class="input-group-text border-right-0 rounded-0 show-password" title="Show Password" style="cursor: pointer">
									<i class="bi bi-eye"></i></span>
						</div>
						<div class="d-flex justify-content-between align-items-center mt-5">
							<a href="<?= route_to('register') ?>">Create an account</a>
							<button type="submit" class="Login_button__28f5q fw-bold text-uppercase btn btn-primary">
								Sign In <i class="fas fa-key"></i>
							</button>
						</div>
					</form>
					<footer class="d-flex justify-content-between Login_footer__3RA6w">
						<a href="javascript:void(0)">Terms & Conditions</a>
						<a href="javascript:void(0)">Privacy Policy</a>
						<a href="javascript:void(0)">Forgot password</a>
					</footer>
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
	            }
            })
		})
	</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>