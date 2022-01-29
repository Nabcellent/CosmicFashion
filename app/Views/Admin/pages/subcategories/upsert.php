<?php
if(isset($subCategory)) {
    $actionText = 'Update';
    $formAction = route_to('admin.subcategory.update', $subCategory->id);
} else {
    $actionText = 'Create';
    $formAction = route_to('admin.subcategory.store');
}
?>

<?= $this->extend('Admin/layouts/master') ?>
<?= $this->section('title') ?>
<?= $actionText ?> Sub Category
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="card mb-3">
		<div class="bg-holder d-none d-lg-block bg-card"
		     style="background-image:url(/images/dash/icons/spot-illustrations/corner-4.png);"></div>
		<!--/.bg-holder-->
	</div>

	<div class="row justify-content-center">
		<div class="col-7 mb-3">
			<div class="d-flex mb-4">
				<span class="fa-stack me-2 ms-n1">
					<i class="fas fa-circle fa-stack-2x text-300"></i>
					<i class="fa-inverse fa-stack-1x text-primary fas fa-check-double"></i>
				</span>
				<div class="col">
					<h5 class="mb-0 text-primary position-relative">
						<span class="bg-200 dark__bg-1100 pe-3"><?= $actionText ?> Sub Category</span>
						<span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span>
					</h5>
					<p class="mb-0">You can easily show your stats content by using these cards.</p>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-auto">
							<h5 class="mb-0" data-anchor="data-anchor"><?= $actionText ?>  Sub Category</h5>
						</div>
					</div>
				</div>

				<div class="card-body bg-light">
					<form class="row g-3 needs-validation" action="<?= $formAction ?>" method="POST" novalidate="">
                        <?= csrf_field() ?><?= isset($subCategory) ? form_method('PUT') : ''; ?>
						<div class="col-md-6">
							<label class="form-label" for="title">Title *</label>
							<input class="form-control" id="title" type="text" name="name" placeholder="Category title"
							       value="<?= old('name', $subCategory->name ?? '') ?>" required=""/>
							<div class="invalid-feedback">This title is required.</div>
						</div>
						<div class="col-md-6">
							<label class="form-label" for="category_id">Category *</label>
							<select class="form-select" id="category_id" name="category_id" required="">
								<option selected="" hidden value="">Select category...</option>
                                <?php foreach($categories as $category): ?>
                                    <?php $selected = isset($subCategory) && $subCategory->category_id == $category->id ? 'selected' : '' ?>
									<option <?= $selected ?> value="<?= $category->id ?>"><?= $category->name ?></option>
                                <?php endforeach; ?>
							</select>
							<div class="invalid-feedback">Please select a category.</div>
						</div>
						<div class="col-12">
							<label class="form-label" for="description">Description</label>
							<textarea class="form-control" id="description" name="description"
							          placeholder="Sub categories description..."><?= old('description', $subCategory->description ?? '') ?></textarea>
							<div class="invalid-feedback">Please provide a valid city.</div>
						</div>
						<div class="col-12 text-end">
							<button class="btn btn-sm btn-primary" type="submit"><?= $actionText ?> </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?= $this->endSection() ?>