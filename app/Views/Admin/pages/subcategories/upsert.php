<?= $this->extend('Admin/layouts/master') ?>

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
		<div class="col-7 card mb-3">
			<div class="card-header">
				<div class="row">
					<div class="col-auto">
						<h5 class="mb-0" data-anchor="data-anchor">Create Sub Category</h5>
					</div>
				</div>
			</div>

			<div class="card-body bg-light">
				<form class="row g-3 needs-validation" action="<?= route_to('admin.subcategory.store') ?>" method="POST" novalidate="">
                    <?= csrf_field() ?>
					<div class="col-md-6">
						<label class="form-label" for="title">Title *</label>
						<input class="form-control" id="title" type="text" name="name" placeholder="Category title" value="<?= old('name') ?>" required=""/>
						<div class="invalid-feedback">This title is required.</div>
					</div>
					<div class="col-md-6">
						<label class="form-label" for="category_id">Category *</label>
						<select class="form-select" id="category_id" name="category_id" required="">
							<option selected="" hidden value="">Select category...</option>
							<?php foreach($categories as $category): ?>
							<option value="<?= $category->id ?>"><?= $category->name ?></option>
							<?php endforeach; ?>
						</select>
						<div class="invalid-feedback">Please select a category.</div>
					</div>
					<div class="col-12">
						<label class="form-label" for="description">Description</label>
						<textarea class="form-control" id="description" name="description"
						          placeholder="Sub categories description..."><?= old('description') ?></textarea>
						<div class="invalid-feedback">Please provide a valid city.</div>
					</div>
					<div class="col-12 text-end">
						<button class="btn btn-sm btn-primary" type="submit">Create</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?= $this->endSection() ?>