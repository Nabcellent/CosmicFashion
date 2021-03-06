<?= $this->extend('Admin/layouts/master') ?>
<?= $this->section('title') ?>
	Categories
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="card mb-3">
		<div class="card-header">
			<div class="row flex-between-end">
				<div class="col-auto align-self-center">
					<h5 class="mb-0">Categories</h5>
				</div>
			</div>
		</div>
		<div class="card-body py-0 border-top">
			<div class="card shadow-none">
				<div class="card-body p-0 pb-3">
					<div class="d-flex align-items-center justify-content-end my-3">
						<div id="bulk-select-replace-element">
							<a href="<?= route_to('admin.category.create') ?>" class="btn btn-falcon-success btn-sm"
							   type="button">
								<i class="fas fa-plus"></i>
								<span class="ms-1">New</span>
							</a>
						</div>
						<div class="d-none ms-3" id="bulk-select-actions">
							<div class="d-flex"><select class="form-select form-select-sm" aria-label="Bulk actions">
									<option hidden selected value="">Bulk actions</option>
									<option value="Delete">Delete</option>
									<option value="Archive">Archive</option>
								</select>
								<button class="btn btn-falcon-danger btn-sm ms-2" type="button">Apply</button>
							</div>
						</div>
					</div>
					<div class="table-responsive scrollbar">
						<table class="table mb-0 display" id="table_id">
							<thead class="text-black bg-200">
							<tr>
								<th class="align-middle white-space-nowrap">
									<div class="form-check mb-0">
										<input class="form-check-input" type="checkbox" aria-label
										       data-bulk-select='{"body":"bulk-select-body","actions":"bulk-select-actions","replacedElement":"bulk-select-replace-element"}'>
									</div>
								</th>
								<th class="align-middle">Id</th>
								<th class="align-middle">Name</th>
								<th class="align-middle">No. sub categories</th>
								<th class="align-middle">No. products</th>
								<th class="align-middle">Actions</th>
							</tr>
							</thead>
							<tbody id="bulk-select-body">

                            <?php foreach($categories as $category): ?>
								<tr>
									<td class="align-middle white-space-nowrap">
										<div class="form-check mb-0">
											<input class="form-check-input" type="checkbox"
											       id="checkbox-<?= $category->id ?>" aria-label
											       data-bulk-select-row="data-bulk-select-row">
										</div>
									</td>
									<th class="align-middle"><?= $category->id ?></th>
									<td class="align-middle"><?= $category->name ?></td>
									<td class="align-middle"><?= $category->sub_categories_count ?></td>
									<td class="align-middle"><?= $category->products_count ?></td>
									<td class="align-middle actions">
										<div class="d-flex justify-content-evenly align-items-center">
											<a href="<?= route_to('admin.categories.show', $category->id) ?>"
											   class="btn btn-sm btn-secondary rounded-circle shadow"
											   title="View category">
												<i class="bi bi-eye-fill"></i>
											</a>
											<a href="<?= route_to('admin.category.edit', $category->id) ?>"
											   class="btn btn-sm btn-primary rounded-circle shadow">
												<i class="fas fa-pen"></i></a>
											<a href="javascript:void(0);" data-id="<?= $category->id ?>"
											   class="delete-resource btn btn-sm btn-danger rounded-circle shadow"
											   data-model="category" data-bs-toggle="tooltip" data-bs-placement="right"
											   title="Delete Category"><i class="fas fa-trash text-danger"></i>
											</a>
										</div>
									</td>
								</tr>
                            <?php endforeach; ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card">
		<div class="bg-holder d-none d-lg-block bg-card"
		     style="background-image:url(/images/dash/icons/spot-illustrations/corner-4.png);"></div>
		<div class="card-body position-relative">
			<div class="row text-center">
				<h6 class="fw-bolder">PURCHASES PER CATEGORY</h6>
				<hr>
                <?php $i = 0; foreach($categories as $category): ?>
					<div class="col-lg <?= $i !== 0 ? 'border-start' : '' ?>">
						<div class="mb-0 small bg-dark bg-gradient p-2" style="box-shadow: var(--falcon-box-shadow-inset);">
							<h6 class="m-0 text-light"><?= $category->name ?></h6>
							<div class="fw-bolder text-danger" data-countup='{"endValue":<?= $category->purchases ?>,"duration":7}'>0</div>
						</div>
					</div>
                    <?php $i++; endforeach; ?>
			</div>
		</div>
	</div>

<?= $this->section('scripts') ?>
	<script src="/js/admin/dynamic.js"></script>
	<script>
        $(() => {
            $('#table_id').DataTable({});
        })
	</script>
	<script src="/vendor/admin/countup/countUp.umd.js"></script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>