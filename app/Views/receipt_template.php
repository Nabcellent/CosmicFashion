<!doctype html>
<html lang="en-gb">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CosmicFashion - Receipt</title>
	<style>
		* {font-family: 'Varela Round', cursive}

		body{
			font-size: 7pt;
		}

		a {text-decoration: none}

		td p.detail {margin: 0;padding: 0}

		.receipt {position: relative;background-color: #fff;min-height: 680px;padding: 10px}

		.receipt header {padding: 10px 0;margin-bottom: 20px;border-bottom: 1px solid #9f1910FF}

		.receipt .company-details {text-align: right}

		.receipt .company-details .name {margin-top: 0;margin-bottom: 0}

		.receipt .contacts {margin-bottom: 20px}

		.receipt .receipt-to {text-align: left}

		.receipt .receipt-to .to {margin-top: 0;margin-bottom: 0}

		.receipt .receipt-details {text-align: right}

		.receipt .receipt-details .receipt-id {margin: 0;color: #0000d0}

		.receipt main {padding-bottom: 50px}

		.receipt main .thanks {margin-top: -30px;font-size: 10pt;margin-bottom: 50px}

		.receipt main .notices {padding-left: 6px;border-left: 6px solid #3989c6}

		.receipt table {width: 100%;border-collapse: collapse;border-spacing: 0;margin-bottom: 20px}

		.receipt table td, .receipt table th {padding: 5px;background: #eee;border-bottom: 1px solid #fff}

		.receipt table th {white-space: nowrap;font-weight: 400;font-size:7pt}

		.receipt table td h3 {margin: 0;font-weight: 400;color: #3989c6;font-size: 7pt}

		.receipt table .qty, .receipt table .total, .receipt table .unit {text-align: right;font-size: 7pt}

		.receipt table .no {color: #fff; background: #900}

		.receipt table .unit {background: #ddd}

		.receipt table .total {background: #b8860b;color: #fff}

		.receipt table tbody tr:last-child td {border: none}

		.receipt table tfoot td {background: 0 0;border-bottom: none;white-space: nowrap;text-align: right;padding: 5px;font-size: 7pt;border-top: 1px solid #aaa}

		.receipt table tfoot tr:first-child td {border-top: none}

		.receipt table tfoot tr:last-child td {color: #900;font-size: 7pt;border-top: 1px solid #b8860b}

		.receipt table tfoot tr td:first-child {border: none}

		.receipt-footer {position: relative;width: 100%;text-align: center;color: #777;border-top: 1px solid #b8860b;padding: 8px 0}

		@media print {
			.receipt {font-size: 11px !important;overflow: hidden !important}

			.receipt footer {position: absolute;bottom: 10px;page-break-after: always}

			.receipt > div:last-child {page-break-before: always}

			@page {
				size: landscape
			}
		}
	</style>
</head>
<body>
<div class="receipt overflow-auto">
	<div style="min-width: 400px">
		<header class=" p-0 m-0">
			<div class="row p-0 m-0">
				<div class="col p-0 m-0">
					<h4 style="margin: 0">ORDER #<?= $order->id ?></h4>
					<div class="date">Order Date: <?= date('M d, Y', strtotime($order->created_at)) ?> </div>
				</div>
				<div class="col company-details">
					<h5 class="name">
						<a target="_blank" href="https://lobianijs.com" style="color: #9F1910FF;">
							CosmicFashion.
						</a>
					</h5>
					<div>+254 110-039-317</div>
					<a href="mailto:su.fashion10@gmail.com" style="color: #9F1910FF;">cosmic.fashion@gmail.com</a>
				</div>
			</div>
		</header>
		<main>
			<div class="row contacts">
				<div class="col receipt-to">
					<div class="text-gray-light">INVOICE TO:</div>
					<h5 class="to"><?= $order->user->full_name ?></h5>
					<div class="email"><a href="mailto:<?= $order->user->email ?>"><?= $order->user->email ?></a>
					</div>
				</div>
				<div class="col receipt-details">
					<h5 class="receipt-id">INVOICE 3-2-1</h5>
					<div class="date">Date of Invoice: 01/10/2018</div>
					<div class="date">Due Date: 30/10/2018</div>
				</div>
			</div>
			<table>
				<thead>
				<tr>
					<th>#</th>
					<th class="text-left">Item</th>
					<th class="text-right">Unit price</th>
					<th class="text-right">Quantity</th>
					<th class="text-right">Total</th>
				</tr>
				</thead>
				<tbody>

                <?php $total = 0;
                $i = 1;
                foreach($order->ordersDetails as $item): ?>
					<tr>
						<td class="no"><?= sprintf("%02d", $i) ?></td>
						<td class="text-left">
							<h3>
								<a href="<?= route_to('admin.product.show',
                                    ['id' => $item->product_id]) ?>"><?= $item->product->name ?></a>
							</h3>
						</td>
						<td class="unit"><?= number_format($item->price, "2") ?>/-</td>
						<td class="qty"><?= $item->quantity ?></td>
						<td class="total">KES <?= number_format($item->total, "2") ?>/-</td>
					</tr>
                    <?php $total += ($item->price * $item->quantity);
                    $i++;
                endforeach; ?>

				</tbody>
				<tfoot>
				<tr>
					<td colspan="2"></td>
					<td colspan="2">GRAND TOTAL</td>
					<td>KSH.<?= number_format($total, "2") ?>/=</td>
				</tr>
				</tfoot>
			</table>
			<div class="thanks">Thank you!</div>
			<div class="notices">
				<div><h5>Payment Method: <?= ucfirst($order->payment_method) ?></h5></div>
				<div>
					<div>NOTICE:</div>
					<div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.
					</div>
				</div>
			</div>
		</main>
		<footer class="receipt-footer">
			Invoice was created on a computer and is valid without the signature and seal.
		</footer>
	</div>
	<!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
	<div></div>
</div>
</body>
</html>
