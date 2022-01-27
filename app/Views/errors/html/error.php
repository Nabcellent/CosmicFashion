<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

	<div id="error">
		<div class="container">
			<div>
				<nav style="margin-top:60px;" class="mb-0" aria-label="breadcrumb">
					<div class="breadcrumb"></div>
				</nav>
			</div>
		</div>

		<div class="container">
			<div style="margin-top:32px" class="mb-5 row">
				<section class="Error_error__2OVwf">
					<div class="h-100 container">
						<div class="h-100 row">
							<div class="col-sm-6"></div>
							<div class="d-flex flex-column justify-content-center align-items-start col-sm-6"><h3 class="fw-bold text-primary mb-3">
									OOPS!</h3>
								<h2 class="fw-bold mb-4">Something’s Missing</h2>
								<p style="width:300px" class="mb-5">Unfortunately, we cannot find the page you are looking for. Though, we tried...👻</p>
								<a href="<?= route_to('home') ?>" class="fw-bold btn btn-outline-primary">TAKE ME AWAY</a>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>

        <?= $this->include('partials/social') ?>
	</div>

<?= $this->endSection() ?>