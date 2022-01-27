<?= $this->extend('Admin/layouts/master') ?>
<?= $this->section('title') ?>
	Order #<?= $order->id ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php
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
};
?>

	<div class="card mb-3">
		<div class="bg-holder d-none d-lg-block bg-card"
		     style="background-image:url(/images/dash/icons/spot-illustrations/corner-4.png);opacity: 0.7;"></div>
		<!--/.bg-holder-->
		<div class="card-body position-relative">
			<h5>Order Details: #<?= $order->id ?></h5>
			<p class="fs--1"><?= date('F j, Y, g:i A', strtotime($order->created_at)) ?></p>
			<div><strong class="me-2">Status: </strong>
				<span class="badge badge rounded-pill badge-soft-<?= $status['color'] ?>">
					<?= ucwords($order->status) ?>
					<span class="ms-1 fas fa-<?= $status['icon'] ?>"
					      data-fa-transform="shrink-2"></span>
				</span>
			</div>
		</div>
	</div>

	<div class="card mb-3">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
					<h5 class="mb-3 fs-0">Billing Address</h5>
					<h6 class="mb-2"><?= $order->full_name ?></h6>
					<p class="mb-1 fs--1">2393 Main Avenue<br>Penasauka, New Jersey 87896</p>
					<p class="mb-0 fs--1">
						<strong>Email: </strong>
						<a href="<?= $order->user->email ?>"><?= $order->user->email ?></a>
					</p>
					<p class="mb-0 fs--1"><strong>Phone: </strong><a href="tel:123456789">+254 123456789</a></p>
				</div>
				<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
					<h5 class="mb-3 fs-0">Payment Method</h5>
					<div class="d-flex">
						<img class="me-3" src="/images/dash/icons/<?= strtolower($order->paymentType->name) ?>.png"
						     width="40" height="30" alt="">
						<div class="flex-1">
							<h6 class="mb-0"><?= $order->paymentType->name ?></h6>
							<p class="mb-0 fs--1">**** **** **** 9809</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<h5 class="mb-3 fs-0">Print / Download</h5>
					<div class="d-flex">
						<a href="<?= route_to('orders.receipt', $order->id) ?>" class="text-info me-3"
						   title="View receipt"><i class="fa fa-print"></i>
						</a>
						<a href="<?= route_to('orders.receipt.pdf', $order->id) ?>" class="text-secondary me-2"
						   title="Download Receipt">
							<i class="fas fa-download"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card mb-3">
		<div class="card-body">
			<div class="table-responsive fs--1">
				<table class="table table-striped border-bottom">
					<thead class="bg-200 text-900">
					<tr>
						<th class="border-0">Products</th>
						<th class="border-0 text-center">Quantity</th>
						<th class="border-0 text-end">Rate</th>
						<th class="border-0 text-end">Amount</th>
					</tr>
					</thead>
					<tbody>
                    <?php foreach($order->ordersDetails as $item): ?>
						<tr class="border-200">
							<td class="align-middle">
								<h6 class="mb-0 text-nowrap"><?= $item->product->name ?></h6>
								<p class="mb-0 text-truncate"
								   style="max-width: 250px;"><?= $item->product->description ?></p>
							</td>
							<td class="align-middle text-center"><?= $item->quantity ?></td>
							<td class="align-middle text-end">KSH.<?= $item->price ?></td>
							<td class="align-middle text-end">KSH.<?= $item->total ?></td>
						</tr>
                    <?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="row g-0 justify-content-end">
				<div class="col-auto">
					<table class="table table-sm table-borderless fs--1 text-end">
						<tbody>
						<tr>
							<th class="text-900">Subtotal:</th>
							<td class="fw-semi-bold">KSH.<?= $order->amount ?></td>
						</tr>
						<tr class="border-top">
							<th class="text-900">Total:</th>
							<td class="fw-semi-bold">KSH.<?= $order->amount ?></td>
						</tr>
						</tbody>
					</table>
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