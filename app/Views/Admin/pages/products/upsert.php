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

	<div class="row justify-content-center">
		<div class="col-lg-8 col-xl-12 col-xxl-8 h-100">
			<div class="d-flex mb-4">
				<span class="fa-stack me-2 ms-n1">
					<i class="fas fa-circle fa-stack-2x text-300"></i>
					<i class="fa-inverse fa-stack-1x text-primary fas fa-check-double"></i>
				</span>
				<div class="col">
					<h5 class="mb-0 text-primary position-relative">
						<span class="bg-200 dark__bg-1100 pe-3">Product creation</span>
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
								<span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-tag"></span></span></span>
								<span class="d-none d-md-block mt-1 fs--1">Basic information</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab2" data-bs-toggle="tab"
							   data-wizard-step="data-wizard-step">
								<span class="nav-item-circle-parent"><span class="nav-item-circle">
										<span class="fas fa-shopping-bag"></span></span>
								</span>
								<span class="d-none d-md-block mt-1 fs--1">Secondary information</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab3" data-bs-toggle="tab"
							   data-wizard-step="data-wizard-step">
								<span class="nav-item-circle-parent"><span class="nav-item-circle">
										<span class="fas fa-thumbs-up"></span></span>
								</span>
								<span class="d-none d-md-block mt-1 fs--1">Finish</span>
							</a>
						</li>
					</ul>
				</div>

                <?= view('App\auth\_message_block') ?>

				<div class="card-body py-4" id="wizard-controller">
					<form id="create-product" action="<?= route_to('admin.product.store') ?>" class="tab-content" method="POST"
					      enctype="multipart/form-data">
                        <?= csrf_field() ?>
						<div class="tab-pane active px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab1"
						     id="bootstrap-wizard-validation-tab1">
							<div class="row g-2 mb-3">
								<div class="col">
									<label class="form-label" for="name">Title *</label>
									<input class="form-control" type="text" name="name" placeholder="Product title" required aria-label
									       value="<?= old('name') ?>"/>
								</div>
								<div class="col">
									<div class="mb-3">
										<label class="form-label" for="sub_category_id">Category *</label>
										<select name="sub_category_id" id="sub_category_id" required>
											<option selected hidden value="">Select a category ...</option>
                                            <?php foreach($categories as $category): ?>
											<optgroup label="<?= $category->name ?>">
                                                <?php foreach($category->subCategories as $subCategory): ?>
													<option value="<?= $subCategory->id ?>"><?= $subCategory->name ?></option>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row g-2 mb-3">
								<div class="col-6">
									<label class="form-label" for="price">Price *</label>
									<input class="form-control" type="number" min="1" name="price" placeholder="Price" required
									       id="price" <?= old('price') ?>/>
								</div>
								<div class="col-6">
									<label class="form-label" for="stock">Stock *</label>
									<input class="form-control" type="number" min="1" name="stock" placeholder="Stock" required id="stock"
									       value="<?= old('stock') ?>"/>
								</div>
							</div>
						</div>
						<div class="tab-pane px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab2"
						     id="bootstrap-wizard-validation-tab2">
							<div id="upload-form">
								<div class="row g-2 mb-3 align-items-center">
									<div class="col-lg-4">
										<input type="file" class="filepond" id="image" name="image">
									</div>
									<div class="col">
										<label class="form-label" for="discount">Discount</label>
										<input class="form-control" type="number" name="discount" placeholder="discount" id="discount"
										       value="<?= old('discount') ?>"/>
									</div>
								</div>
								<div class="mb-3">
									<label class="form-label" for="description">Descriptions</label>
									<textarea class="form-control" rows="4" id="description" name="description"
									          placeholder="Product descriptions..."><?= old('description') ?></textarea>
								</div>
							</div>
						</div>
						<div class="tab-pane text-center px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab3"
						     id="bootstrap-wizard-validation-tab3">
							<i class="fas fa-check-circle text-success fs-24"></i>
							<h4 class="mb-1">Your product is all set!</h4>
							<p>Click create to complete.</p>
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
	<script src="/js/wizard.js"></script>

	<script src="/vendor/tomselect/tom-select.complete.min.js"></script>

	<script src="/vendor/filepond/js/plugins/image-preview.js"></script>
	<script src="/vendor/filepond/js/plugins/image-resize.js"></script>
	<script src="/vendor/filepond/js/plugins/file-validate-type.js"></script>
	<script src="/vendor/filepond/js/plugins/file-rename.js"></script>
	<script src="/vendor/filepond/js/filepond.min.js"></script>

	<script>
        $(() => {
            wizardInit()

            new TomSelect("#sub_category_id");

            FilePond.registerPlugin(
                FilePondPluginImagePreview,
                FilePondPluginImageResize,
                FilePondPluginFileValidateType,
                FilePondPluginFileRename,
            );

            const inputElement = document.getElementById('image');
            const pond = FilePond.create(inputElement, {
                labelIdle: `Drag & Drop or <span class="filepond--label-action"> Browse </span> your product image`,
                acceptedFileTypes: ['image/jpg', 'image/png', 'image/jpeg'],
                dropOnPage: true,
                allowDrop: true,
                storeAsFile: true,
                instantUpload: false,

                imageCropAspectRatio: '1:1',
                imageResizeMode: 'cover',
                imageResizeTargetWidth: 200,
                imageResizeTargetHeight: 200,

                stylePanelLayout: 'compact circle',
                styleLoadIndicatorPosition: 'center bottom',
                styleProgressIndicatorPosition: 'right bottom',
                styleButtonRemoveItemPosition: 'left bottom',
                styleButtonProcessItemPosition: 'right bottom',
            });

            if (<?= isset($user->image) && file_exists("images/users/" . ($user->image ?? 0)) ? : '0' ?>)
                pond.addFile(`{{ gcs_asset("images/users/$user->image") }}`)
                    .then(file => {
                        console.log(file)
                    });
        })
	</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>