<!doctype html>
<html lang="en-gb">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CF - Receipt</title>

	<!--    Bootstrap CSS    -->
	<link rel="stylesheet" href="/vendor/bootstrap5/bootstrap.min.css">

	<!--    Boxicons CSS    -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

	<!--    Font Awesome CSS    -->
	<link rel="stylesheet" href="/vendor/fontawesome/css/all.min.css">

	<!--    <link href="<? /*= asset('css/Admin/style.css') */ ?>" rel="stylesheet">-->
	<link href="/css/receipt.css" rel="stylesheet">
</head>
<body>

<div id="receipt">
	<div class="toolbar hidden-print">
		<div class="d-flex justify-content-between">
			<a href="<?= route_to('user.account') ?>" class="btn btn-sm btn-outline-info">
				<i class="bx bx-left-arrow bx-fade-left-hover"></i>Back to Orders
			</a>
			<div>
				<button id="printInvoice" class="btn btn-sm btn-info"><i class="fa fa-print"></i> Print</button>
				<a href="<?= route_to('orders.receipt.pdf', $order->id) ?>" class="btn btn-sm btn-info">
					<i class="fa fa-file-pdf-o"></i> Generate PDF <i class="bx bx-download bx-fade-down-hover"></i>
				</a>
			</div>
		</div>
		<hr>
	</div>
	<div id="print-area" class="receipt overflow-auto">
		<div style="min-width: 600px">
			<header class=" p-0 m-0">
				<div class="row p-0 m-0">
					<div class="col p-0 m-0">
						<h4 style="margin: 0">ORDER #<?= $order->id ?></h4>
						<div class="date">Order Date: <?= date('M d, Y', strtotime($order->created_at)) ?> </div>
					</div>
					<div class="col company-details">
						<h3 class="name">
							<a target="_blank" href="https://lobianijs.com" style="color: #9F1910FF;">
								CosmicFashion.
							</a>
						</h3>
						<div>+254 110-039-317</div>
						<a href="mailto:su.fashion10@gmail.com" style="color: #9F1910FF;">cosmic.fashion@gmail.com</a>
					</div>
				</div>
			</header>
			<main>
				<div class="row contacts">
					<div class="col receipt-to">
						<div class="text-gray-light">INVOICE TO:</div>
						<h3 class="to"><?= $order->user->full_name ?></h3>
						<div class="email"><a href="mailto:<?= $order->user->email ?>"><?= $order->user->email ?></a>
						</div>
					</div>
					<div class="col receipt-details">
						<h3 class="receipt-id">INVOICE 3-2-1</h3>
						<div class="date">Date of Invoice: 01/10/2018</div>
						<div class="date">Due Date: 30/10/2018</div>
					</div>
				</div>
				<table>
					<thead>
					<tr>
						<th>#</th>
						<th class="text-left">ITEM</th>
						<th class="text-right">UNIT PRICE</th>
						<th class="text-right">QUANTITY</th>
						<th class="text-right">TOTAL</th>
					</tr>
					</thead>
					<tbody>

                    <?php $total = 0; $i = 1;
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
                        <?php $total += ($item->price * $item->quantity); $i++;
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
</div>


<!--    Jquery CDN    -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--<script src="--><?//= asset('js/Admin/Main.js') ?><!--"></script>-->

<script>
    $(document).on('click', '#printInvoice', function () {
        Popup($('.receipt')[0].outerHTML);

        function Popup() {
            /*let prtContent = document.getElementById("print-area");
            let WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();*/

            window.print();
            return true;
        }
    });
</script>
</body>
</html>
