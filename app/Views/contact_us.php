<?= $this->extend('layouts/master') ?>
<?= $this->section('links') ?>
	<style>
		.contact-visual {display: flex;justify-content: flex-end;flex: 1 1 auto;object-fit: cover}

		.contact-visual img {flex: 1 1 auto;object-fit: cover;max-width: 100%}
	</style>
<?= $this->endSection() ?>
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
					<div><h2 class="fw-bold">Contact Us</h2><h6 class="text-muted">If you have any questions please fill
							out the form</h6></div>
					<form class="">
						<div class="form-group">
							<label for="exampleEmail" class="fw-bold text-muted">Name</label>
							<input type="text" name="text" id="exampleEmail" value="" class="w-100 form-control"/>
						</div>
						<div class="d-flex form-group">
							<div class="flex-fill me-5">
								<label for="email" class="fw-bold text-muted">Email</label>
								<input type="email" name="email" value="" id="email" class="form-control"/>
							</div>
							<div class="flex-fill">
								<label for="exampleEmail" class="fw-bold text-muted">Phone</label>
								<input type="tel" name="text" id="exampleEmail" value="" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label for="subject" class="fw-bold text-muted">Subject</label>
							<input type="text" name="text" id="subject" value="<?= old('subject') ?>"
							       class="w-100 form-control"/>
						</div>
						<div class="form-group">
							<label for="exampleEmail" class="fw-bold text-muted">Your Message</label>
							<textarea name="text" id="exampleEmail" style="height:155px"
							          class="w-100 form-control"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="text-uppercase fw-bold align-self-start btn btn-primary">send
								message
							</button>
						</div>
					</form>
				</div>
				<div class="card px-0 contact-visual col-sm-12 col-lg-6">
					<img src="/images/flatlogic/pexels-artem-beliaikin-994523.jpg" alt="" class="img-fluid"/>
				</div>
			</div>
		</div>

        <?= $this->include('partials/social') ?>
	</div>

<?= $this->endSection() ?>