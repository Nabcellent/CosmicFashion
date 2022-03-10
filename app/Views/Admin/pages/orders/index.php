<?= $this->extend('Admin/layouts/master') ?>
<?= $this->section('title') ?>
	Orders
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="card mb-3">
		<div class="bg-holder d-none d-lg-block bg-card"
		     style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);"></div>
		<div class="card-body position-relative">
			<div class="row"></div>
		</div>
	</div>

	<div class="card">
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
						<div class="d-none ms-3" id="bulk-select-actions">
							<div class="d-flex"><select class="form-select form-select-sm" aria-label="Bulk actions">
									<option selected="selected">Bulk actions</option>
									<option value="Delete">Delete</option>
									<option value="Archive">Archive</option>
								</select>
								<button class="btn btn-falcon-danger btn-sm ms-2" type="button">Apply</button>
							</div>
						</div>
					</div>
					<div class="table-responsive scrollbar">
						<table class="table table-sm table-striped fs--1 mb-0 overflow-hidden" id="table_id">
							<thead class="bg-200 text-900">
							<tr>
								<th class="align-middle white-space-nowrap">
									<div class="form-check mb-0">
										<input class="form-check-input" type="checkbox" aria-label
										       data-bulk-select='{"body":"bulk-select-body","actions":"bulk-select-actions","replacedElement":"bulk-select-replace-element"}'>
									</div>
								</th>
								<th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">Order</th>
								<th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Date</th>
								<th class="sort pe-1 align-middle white-space-nowrap">Pay Method</th>
								<th class="sort pe-1 align-middle white-space-nowrap text-center" data-sort="status">
									Status
								</th>
								<th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="amount">
									Amount <i class="small">(ksh)</i>
								</th>
								<th class="no-sort"></th>
							</tr>
							</thead>
							<tbody id="bulk-select-body">

                            <?php
                            foreach($orders as $order):
                                $status = match ($order->status) {
                                    'paid' => [
                                        'icon'  => 'check',
                                        'color' => 'success'
                                    ],
                                    'pending' => [
                                        'icon'  => 'stream',
                                        'color' => 'warning'
                                    ],
                                    'pending payment' => [
                                        'icon'  => 'redo',
                                        'color' => 'primary'
                                    ]
                                }
                                ?>
								<tr class="btn-reveal-trigger">
									<td class="align-middle white-space-nowrap">
										<div class="form-check mb-0">
											<input class="form-check-input" type="checkbox"
											       id="checkbox-<?= $order->id ?>"
											       data-bulk-select-row="data-bulk-select-row" aria-label>
										</div>
									</td>
									<td class="order py-2 align-middle white-space-nowrap">
										<a href="<?= route_to('admin.orders.show', $order->id) ?>">
											<strong>#<?= $order->id ?></strong></a>
										by <strong><?= $order->user->full_name ?></strong><br/>
										<a href="<?= $order->user->email ?>"><?= $order->user->email ?></a>
									</td>
									<td class="date py-2 align-middle white-space-nowrap">
                                        <?= date('F j, Y, g:i a', strtotime($order->created_at)) ?>
										<p class="mb-0 text-500"><?= differenceForHumans($order->created_at) ?></p>
									</td>
									<td class="py-2 align-middle fw-bold text-<?= $order->paymentType->description ?>">
                                        <?= $order->paymentType->name ?>
									</td>
									<td class="status py-2 align-middle text-center fs-0 white-space-nowrap">
									<span class="badge badge rounded-pill d-block badge-soft-<?= $status['color'] ?>">
										<?= ucwords($order->status) ?>
										<span class="ms-1 fas fa-<?= $status['icon'] ?>"
										      data-fa-transform="shrink-2"></span>
									</span>
									</td>
									<td class="amount py-2 align-middle text-end fw-medium">
                                        <?= number_format($order->amount, 2) ?></td>
									<td class="py-2 align-middle white-space-nowrap text-end">
										<div class="dropdown font-sans-serif position-static">
											<button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal"
											        type="button" id="order-dropdown-0" data-bs-toggle="dropdown"
											        data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
												<span class="fas fa-ellipsis-h fs--1"></span>
											</button>
											<div class="dropdown-menu dropdown-menu-end border py-0"
											     aria-labelledby="order-dropdown-0">
												<div class="bg-white py-2">
													<a class="dropdown-item" href="#!">Completed</a>
													<a class="dropdown-item" href="#!">Paid</a>
													<a class="dropdown-item" href="#!">Pending payment</a>
													<a class="dropdown-item" href="#!">Pending</a>
													<div class="dropdown-divider"></div>
													<div class="dropdown-item" href="#!">
														<div class="d-flex justify-content-evenly align-items-center">
															<a href="<?= route_to('admin.orders.show', $order->id) ?>"
															   class="btn btn-sm btn-secondary" title="View Order">
																<i class="bi bi-eye-fill"></i>
															</a>
															<a href="javascript:void(0);" data-id="<?= $order->id ?>"
															   class="delete-resource btn btn-sm btn-danger"
															   data-model="product" data-bs-toggle="tooltip"
															   data-bs-placement="right" title="Delete Order">
																<i class="fas fa-trash text-danger"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
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

	<script>
        $(() => {
            $('#table_id').DataTable({
                columnDefs: [
                    {orderable: false, targets: 0},
                    {orderable: false, targets: 6}
                ],
            });
        })
	</script>

<?= $this->endSection() ?>