<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

	<div id="shop">
		<div class="container">
			<div>
				<nav style="margin-top:60px;border-bottom:;margin-bottom:0" aria-label="breadcrumb">
					<div class="breadcrumb"></div>
				</nav>
			</div>
		</div>

		<div class="container">
			<div style="margin-top:32px" class="mb-5 row">
				<div class="d-flex flex-column justify-content-center col-sm-12 col-lg-6">
					<div><h2 class="fw-bold">Contact Us</h2><h6 class="text-muted">If you have any questions please fill out the form</h6></div>
					<form class="">
						<div class="form-group">
							<label for="exampleEmail" class="fw-bold text-muted">Name</label>
							<input type="text" name="text" id="exampleEmail" value="" class="w-100 form-control"/></div>
						<div class="d-flex form-group">
							<div class="flex-fill mr-5">
								<label for="email" class="fw-bold text-muted">Email</label>
								<input type="email" name="email" value="" id="email" class="form-control"/>
							</div>
							<div class="flex-fill">
								<label for="exampleEmail" class="fw-bold text-muted">Phone</label>
								<input type="tel" name="text" id="exampleEmail" value="" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleEmail" class="fw-bold text-muted">Your Message</label>
							<textarea name="text" id="exampleEmail" style="height:155px" class="w-100 form-control"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="text-uppercase fw-bold align-self-start btn btn-primary">send message</button>
						</div>
					</form>
				</div>
				<div class="Contact_contactVisual__2V4Pl col-sm-12 col-lg-6">
					<img src="/images/flatlogic/img-9a7f01a08705b6e12724f69defd0235d.png" alt=""/></div>
			</div>
		</div>

        <?= $this->include('partials/social') ?>
	</div>

<?= $this->endSection() ?>