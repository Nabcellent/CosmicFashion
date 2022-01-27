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

		<div style="margin-top:32px" class="mb-5 container">
			<div class="row">
				<div class="col-12 col-lg-8 col-xl-8">
					<h3 class="fw-bold mb-4">My Account</h3>
					<div class="row">
						<div class="col-12 col-md-6 col-lg-6 col-xl-6">
							<section class="Account_promo1__1LP0S">
								<h3 class="text-muted fw-bold mb-0">Wallet</h3>
								<h1 class="text-primary fw-bold mb-3">30%</h1>
							</section>
						</div>
						<div class="col-12 col-md-6 col-lg-6 col-xl-6">
							<section class="Account_promo2__3jML5">
								<h3 class="text-muted fw-bold mb-0">Spend</h3>
								<h1 class="text-primary fw-bold mb-3">70%</h1>
							</section>
						</div>
					</div>
					<div class="mt-5 row">
						<h3 class="fw-bold mb-4">My Orders</h3>
						<div style="overflow:auto; max-height: 30rem" class="col-12 col-lg-12 col-xl-12">
							<table class="Account_accountTable__JZ5eH table table-borderless">
								<thead>
								<tr style="border-bottom:1px solid #D9D9D9">
									<th class="bg-transparent text-dark px-0">Date</th>
									<th class="bg-transparent text-dark px-0">Status</th>
									<th class="bg-transparent text-dark px-0">Pay Method</th>
									<th colspan="2" class="bg-transparent text-dark px-0">Total</th>
								</tr>
								</thead>
								<tbody id="accordion">
                                <?php foreach($user->orders as $order): ?>
									<tr style="border-bottom:1px solid #D9D9D9;">
										<td class="px-0 pt-4"><p class="text-muted"><?= date('d.m.y',
                                                    strtotime($order->created_at)) ?></p></td>
										<td class="px-0 pt-4">
											<div class="d-flex align-items-center">
												<div>
													<h6 class="text-muted"><?= ucwords($order->status) ?></h6>
													<h5 class="fw-bold">#<?= $order->id ?></h5>
												</div>
											</div>
										</td>
										<td class="px-0 pt-4">
											<h6 class="fw-bold mb-0"><?= $order->paymentType->name ?></h6>
										</td>
										<td class="px-0 pt-4">
											<h6 class="fw-bold mb-0">KSH.<?= $order->amount ?></h6>
										</td>
										<td class="px-0">
											<a href="javascript:void(0)" class="text-secondary me-2"
											   title="View items purchased" data-bs-toggle="collapse"
											   data-bs-target="#product-<?= $order->id ?>">
												<i class="bi bi-cart-check-fill"></i>
											</a>
                                            <?php if($order->is_paid): ?>
												<a href="<?= route_to('orders.receipt', $order->id) ?>" class="text-info" title="View receipt">
													<i class="bi bi-receipt-cutoff"></i>
												</a>
                                            <?php endif; ?>
										</td>
									</tr>
									<tr class="accordion-item bg-transparent border-0">
										<td colspan="6" class="p-0">
											<div class="ml-3 collapse" data-bs-parent="#accordion"
											     id="product-<?= $order->id ?>">
												<table class="table table-sm small">
													<thead>
													<tr>
														<th>product(s)</th>
														<th>Quantity</th>
														<th>Price</th>
														<th>Sub-Total</th>
													</tr>
													</thead>
													<tbody>
                                                    <?php foreach($order->ordersDetails as $item): ?>
														<tr>
															<td><?= $item->product->name ?></td>
															<td><?= $item->quantity ?></td>
															<td><?= $item->price ?></td>
															<td><?= $item->total ?></td>
														</tr>
                                                    <?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</td>
									</tr>
                                <?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4 col-xl-4">
					<section class="card Account_profile__TM8Wq">
						<button class="bg-transparent border-0 p-0 btn btn-secondary">
							<img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik00LjQwMjYyIDExLjYyMjFDNS41MTg2MiAxMi4wMDUxIDYuNDA3NjIgMTIuOTM5MSA2Ljc3OTYyIDE0LjEyMzFMNi44MTk2MiAxNC4yNDMxQzcuMjQ1NjIgMTUuNDk5MSA3LjA3MjYyIDE2Ljg1MTEgNi4zNTg2MiAxNy44NjUxQzYuMjI4NjIgMTguMDQ5MSA2LjI1NzYyIDE4LjI2OTEgNi4zOTQ2MiAxOC4zNzMxTDguNDY2NjIgMTkuOTQ3MUM4LjUzOTYyIDIwLjAwMjEgOC42MTA2MiAyMC4wMDIxIDguNjU0NjIgMTkuOTk3MUM4LjcwNDYyIDE5Ljk4OTEgOC43Nzc2MiAxOS45NjIxIDguODM2NjIgMTkuODc4MUw5LjA2NzYyIDE5LjU1MDFDOS43NTY2MiAxOC41NzMxIDEwLjg2NjYgMTcuOTcwMSAxMi4wMzg2IDE3LjkzNjFDMTMuMzU0NiAxNy45MDkxIDE0LjUzNjYgMTguNTEyMSAxNS4yNzI2IDE5LjU3NTFMMTUuMzkwNiAxOS43NDYxQzE1LjQ0OTYgMTkuODMwMSAxNS41MjE2IDE5Ljg1ODEgMTUuNTcyNiAxOS44NjYxQzE1LjYxNjYgMTkuODc1MSAxNS42ODg2IDE5Ljg3MjEgMTUuNzYwNiAxOS44MTYxTDE3LjgyMTYgMTguMjYxMUMxNy45NjU2IDE4LjE1MzEgMTcuOTk3NiAxNy45MjIxIDE3Ljg5MDYgMTcuNzY3MUwxNy42MzA2IDE3LjM5MjFDMTYuOTYwNiAxNi40MjQxIDE2Ljc2MTYgMTUuMTY4MSAxNy4wOTg2IDE0LjAzMzFDMTcuNDY0NiAxMi43OTcxIDE4LjM5NTYgMTEuODE5MSAxOS41OTA2IDExLjQxOTFMMTkuNzkxNiAxMS4zNTExQzE5Ljk1MjYgMTEuMjk4MSAyMC4wMzk2IDExLjA5ODEgMTkuOTgyNiAxMC45MTQxTDE5LjE5NTYgOC4zOTMwOUMxOS4xNTg2IDguMjc1MDkgMTkuMDgyNiA4LjIyMjA5IDE5LjA0MDYgOC4yMDAwOUMxOC45ODA2IDguMTY5MDkgMTguOTE1NiA4LjE2NDA5IDE4Ljg1MzYgOC4xODUwOUwxOC41MTM2IDguMjk4MDlDMTcuMzUwNiA4LjY4NTA5IDE2LjA2NzYgOC40NzUwOSAxNS4wODI2IDcuNzM0MDlMMTQuOTc0NiA3LjY1MzA5QzE0LjAzODYgNi45NDkwOSAxMy40ODE2IDUuODE0MDkgMTMuNDg1NiA0LjYxODA5TDEzLjQ4NzYgNC4zMzgwOUMxMy40ODc2IDQuMjA1MDkgMTMuNDI0NiA0LjEyMjA5IDEzLjM4NjYgNC4wODQwOUMxMy4zNTA2IDQuMDQ3MDkgMTMuMjg5NiA0LjAwMzA5IDEzLjIwMzYgNC4wMDMwOUwxMC42NTY2IDQuMDAwMDlDMTAuNTAwNiA0LjAwMDA5IDEwLjM3MzYgNC4xNDkwOSAxMC4zNzI2IDQuMzMzMDlMMTAuMzcxNiA0LjU3NTA5QzEwLjM2NjYgNS43OTAwOSA5Ljc5NzYyIDYuOTQ2MDkgOC44NDk2MiA3LjY2OTA5TDguNzIwNjIgNy43NjcwOUM3LjY3NzYyIDguNTYwMDkgNi4zMTc2MiA4Ljc4NDA5IDUuMDg1NjIgOC4zNjQwOUM1LjAzODYyIDguMzQ4MDkgNC45OTQ2MiA4LjM1MTA5IDQuOTUyNjIgOC4zNzMwOUM0LjkyMDYyIDguMzg5MDkgNC44NjI2MiA4LjQzMDA5IDQuODM0NjIgOC41MjEwOUw0LjAxNzYyIDExLjExNzFDMy45NTg2MiAxMS4zMDYxIDQuMDU1NjIgMTEuNTAzMSA0LjIzODYyIDExLjU2NjFMNC40MDI2MiAxMS42MjIxWk04LjYxMzYyIDIyLjAwMDFDOC4xMjc2MiAyMi4wMDAxIDcuNjU1NjIgMjEuODQyMSA3LjI1NzYyIDIxLjUzOTFMNS4xODU2MiAxOS45NjYxQzQuMTk1NjIgMTkuMjE2MSAzLjk3NjYyIDE3Ljc3MzEgNC42OTY2MiAxNi43NTAxQzUuMDcwNjIgMTYuMjIwMSA1LjE0NzYyIDE1LjUzOTEgNC45Mjc2MiAxNC44OTMxTDQuODcyNjIgMTQuNzI1MUM0LjY4OTYyIDE0LjE0MzEgNC4yNzE2MiAxMy42OTExIDMuNzU0NjIgMTMuNTE0MUgzLjc1MzYyTDMuNTkwNjIgMTMuNDU3MUMyLjM3MjYyIDEzLjA0MDEgMS43MjI2MiAxMS43NDkxIDIuMTA5NjIgMTAuNTE3MUwyLjkyNTYyIDcuOTIyMDlDMy4xMTA2MiA3LjMzNTA5IDMuNTA5NjIgNi44NjEwOSA0LjA0OTYyIDYuNTg4MDlDNC41Nzc2MiA2LjMyMjA5IDUuMTc0NjIgNi4yODEwOSA1LjczMjYyIDYuNDcyMDlDNi4zMzE2MiA2LjY3NjA5IDYuOTk2NjIgNi41NjUwOSA3LjUwOTYyIDYuMTc1MDlMNy42Mzg2MiA2LjA3NzA5QzguMDk0NjIgNS43MjkwOSA4LjM2OTYyIDUuMTY0MDkgOC4zNzE2MiA0LjU2NzA5TDguMzcyNjIgNC4zMjYwOUM4LjM3NzYyIDMuMDQyMDkgOS40MDI2MiAyLjAwMDA5IDEwLjY1NTYgMi4wMDAwOUgxMC42NTk2TDEzLjIwNjYgMi4wMDMwOUMxMy44MDg2IDIuMDA0MDkgMTQuMzc2NiAyLjI0MjA5IDE0LjgwNDYgMi42NzMwOUMxNS4yNDc2IDMuMTE4MDkgMTUuNDg5NiAzLjcxMzA5IDE1LjQ4NzYgNC4zNDgwOUwxNS40ODU2IDQuNjI3MDlDMTUuNDgzNiA1LjE5MzA5IDE1Ljc0MjYgNS43MjgwOSAxNi4xNzk2IDYuMDU2MDlMMTYuMjg2NiA2LjEzNzA5QzE2Ljc0NTYgNi40ODIwOSAxNy4zNDM2IDYuNTgxMDkgMTcuODgwNiA2LjQwMTA5TDE4LjIxOTYgNi4yODgwOUMxOC43OTY2IDYuMDk2MDkgMTkuNDEwNiA2LjE0MzA5IDE5Ljk1MTYgNi40MjAwOUMyMC41MDY2IDYuNzA0MDkgMjAuOTE2NiA3LjE5MzA5IDIxLjEwNDYgNy43OTgwOUwyMS44OTE2IDEwLjMxOTFDMjIuMjcxNiAxMS41MzcxIDIxLjYxMzYgMTIuODUxMSAyMC40MjY2IDEzLjI0ODFMMjAuMjI1NiAxMy4zMTUxQzE5LjY0OTYgMTMuNTA5MSAxOS4xOTY2IDEzLjk4OTEgMTkuMDE1NiAxNC42MDExQzE4Ljg0OTYgMTUuMTYyMSAxOC45NDU2IDE1Ljc3OTEgMTkuMjc0NiAxNi4yNTMxTDE5LjUzNDYgMTYuNjI4MUMyMC4yNDg2IDE3LjY2MDEgMjAuMDIwNiAxOS4xMDgxIDE5LjAyNjYgMTkuODU3MUwxNi45NjU2IDIxLjQxMzFDMTYuNDcwNiAyMS43ODcxIDE1Ljg2MzYgMjEuOTM4MSAxNS4yNTQ2IDIxLjg0MTFDMTQuNjQwNiAyMS43NDIxIDE0LjEwNDYgMjEuNDAyMSAxMy43NDU2IDIwLjg4NDFMMTMuNjI3NiAyMC43MTIxQzEzLjI3NzYgMjAuMjA4MSAxMi43MTc2IDE5LjkwMjEgMTIuMTMwNiAxOS45MzUxQzExLjU0MjYgMTkuOTUxMSAxMS4wMzQ2IDIwLjIzMDEgMTAuNzAyNiAyMC43MDIxTDEwLjQ3MTYgMjEuMDMwMUMxMC4xMDk2IDIxLjU0MzEgOS41NzI2MiAyMS44NzgxIDguOTYxNjIgMjEuOTc0MUM4Ljg0NDYyIDIxLjk5MjEgOC43Mjg2MiAyMi4wMDAxIDguNjEzNjIgMjIuMDAwMVpNMTEuOTk5OCAxMC41QzExLjE3MjggMTAuNSAxMC40OTk4IDExLjE3MyAxMC40OTk4IDEyQzEwLjQ5OTggMTIuODI3IDExLjE3MjggMTMuNSAxMS45OTk4IDEzLjVDMTIuODI2OCAxMy41IDEzLjQ5OTggMTIuODI3IDEzLjQ5OTggMTJDMTMuNDk5OCAxMS4xNzMgMTIuODI2OCAxMC41IDExLjk5OTggMTAuNVpNMTEuOTk5OCAxNS41QzEwLjA2OTggMTUuNSA4LjQ5OTgyIDEzLjkzIDguNDk5ODIgMTJDOC40OTk4MiAxMC4wNyAxMC4wNjk4IDguNDk5OTkgMTEuOTk5OCA4LjQ5OTk5QzEzLjkyOTggOC40OTk5OSAxNS40OTk4IDEwLjA3IDE1LjQ5OTggMTJDMTUuNDk5OCAxMy45MyAxMy45Mjk4IDE1LjUgMTEuOTk5OCAxNS41WiIgZmlsbD0iIzlEOUQ5RCIvPgo8bWFzayBpZD0ibWFzazAiIG1hc2stdHlwZT0iYWxwaGEiIG1hc2tVbml0cz0idXNlclNwYWNlT25Vc2UiIHg9IjEiIHk9IjIiIHdpZHRoPSIyMSIgaGVpZ2h0PSIyMCI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNNC40MDI2MiAxMS42MjIxQzUuNTE4NjIgMTIuMDA1MSA2LjQwNzYyIDEyLjkzOTEgNi43Nzk2MiAxNC4xMjMxTDYuODE5NjIgMTQuMjQzMUM3LjI0NTYyIDE1LjQ5OTEgNy4wNzI2MiAxNi44NTExIDYuMzU4NjIgMTcuODY1MUM2LjIyODYyIDE4LjA0OTEgNi4yNTc2MiAxOC4yNjkxIDYuMzk0NjIgMTguMzczMUw4LjQ2NjYyIDE5Ljk0NzFDOC41Mzk2MiAyMC4wMDIxIDguNjEwNjIgMjAuMDAyMSA4LjY1NDYyIDE5Ljk5NzFDOC43MDQ2MiAxOS45ODkxIDguNzc3NjIgMTkuOTYyMSA4LjgzNjYyIDE5Ljg3ODFMOS4wNjc2MiAxOS41NTAxQzkuNzU2NjIgMTguNTczMSAxMC44NjY2IDE3Ljk3MDEgMTIuMDM4NiAxNy45MzYxQzEzLjM1NDYgMTcuOTA5MSAxNC41MzY2IDE4LjUxMjEgMTUuMjcyNiAxOS41NzUxTDE1LjM5MDYgMTkuNzQ2MUMxNS40NDk2IDE5LjgzMDEgMTUuNTIxNiAxOS44NTgxIDE1LjU3MjYgMTkuODY2MUMxNS42MTY2IDE5Ljg3NTEgMTUuNjg4NiAxOS44NzIxIDE1Ljc2MDYgMTkuODE2MUwxNy44MjE2IDE4LjI2MTFDMTcuOTY1NiAxOC4xNTMxIDE3Ljk5NzYgMTcuOTIyMSAxNy44OTA2IDE3Ljc2NzFMMTcuNjMwNiAxNy4zOTIxQzE2Ljk2MDYgMTYuNDI0MSAxNi43NjE2IDE1LjE2ODEgMTcuMDk4NiAxNC4wMzMxQzE3LjQ2NDYgMTIuNzk3MSAxOC4zOTU2IDExLjgxOTEgMTkuNTkwNiAxMS40MTkxTDE5Ljc5MTYgMTEuMzUxMUMxOS45NTI2IDExLjI5ODEgMjAuMDM5NiAxMS4wOTgxIDE5Ljk4MjYgMTAuOTE0MUwxOS4xOTU2IDguMzkzMDlDMTkuMTU4NiA4LjI3NTA5IDE5LjA4MjYgOC4yMjIwOSAxOS4wNDA2IDguMjAwMDlDMTguOTgwNiA4LjE2OTA5IDE4LjkxNTYgOC4xNjQwOSAxOC44NTM2IDguMTg1MDlMMTguNTEzNiA4LjI5ODA5QzE3LjM1MDYgOC42ODUwOSAxNi4wNjc2IDguNDc1MDkgMTUuMDgyNiA3LjczNDA5TDE0Ljk3NDYgNy42NTMwOUMxNC4wMzg2IDYuOTQ5MDkgMTMuNDgxNiA1LjgxNDA5IDEzLjQ4NTYgNC42MTgwOUwxMy40ODc2IDQuMzM4MDlDMTMuNDg3NiA0LjIwNTA5IDEzLjQyNDYgNC4xMjIwOSAxMy4zODY2IDQuMDg0MDlDMTMuMzUwNiA0LjA0NzA5IDEzLjI4OTYgNC4wMDMwOSAxMy4yMDM2IDQuMDAzMDlMMTAuNjU2NiA0LjAwMDA5QzEwLjUwMDYgNC4wMDAwOSAxMC4zNzM2IDQuMTQ5MDkgMTAuMzcyNiA0LjMzMzA5TDEwLjM3MTYgNC41NzUwOUMxMC4zNjY2IDUuNzkwMDkgOS43OTc2MiA2Ljk0NjA5IDguODQ5NjIgNy42NjkwOUw4LjcyMDYyIDcuNzY3MDlDNy42Nzc2MiA4LjU2MDA5IDYuMzE3NjIgOC43ODQwOSA1LjA4NTYyIDguMzY0MDlDNS4wMzg2MiA4LjM0ODA5IDQuOTk0NjIgOC4zNTEwOSA0Ljk1MjYyIDguMzczMDlDNC45MjA2MiA4LjM4OTA5IDQuODYyNjIgOC40MzAwOSA0LjgzNDYyIDguNTIxMDlMNC4wMTc2MiAxMS4xMTcxQzMuOTU4NjIgMTEuMzA2MSA0LjA1NTYyIDExLjUwMzEgNC4yMzg2MiAxMS41NjYxTDQuNDAyNjIgMTEuNjIyMVpNOC42MTM2MiAyMi4wMDAxQzguMTI3NjIgMjIuMDAwMSA3LjY1NTYyIDIxLjg0MjEgNy4yNTc2MiAyMS41MzkxTDUuMTg1NjIgMTkuOTY2MUM0LjE5NTYyIDE5LjIxNjEgMy45NzY2MiAxNy43NzMxIDQuNjk2NjIgMTYuNzUwMUM1LjA3MDYyIDE2LjIyMDEgNS4xNDc2MiAxNS41MzkxIDQuOTI3NjIgMTQuODkzMUw0Ljg3MjYyIDE0LjcyNTFDNC42ODk2MiAxNC4xNDMxIDQuMjcxNjIgMTMuNjkxMSAzLjc1NDYyIDEzLjUxNDFIMy43NTM2MkwzLjU5MDYyIDEzLjQ1NzFDMi4zNzI2MiAxMy4wNDAxIDEuNzIyNjIgMTEuNzQ5MSAyLjEwOTYyIDEwLjUxNzFMMi45MjU2MiA3LjkyMjA5QzMuMTEwNjIgNy4zMzUwOSAzLjUwOTYyIDYuODYxMDkgNC4wNDk2MiA2LjU4ODA5QzQuNTc3NjIgNi4zMjIwOSA1LjE3NDYyIDYuMjgxMDkgNS43MzI2MiA2LjQ3MjA5QzYuMzMxNjIgNi42NzYwOSA2Ljk5NjYyIDYuNTY1MDkgNy41MDk2MiA2LjE3NTA5TDcuNjM4NjIgNi4wNzcwOUM4LjA5NDYyIDUuNzI5MDkgOC4zNjk2MiA1LjE2NDA5IDguMzcxNjIgNC41NjcwOUw4LjM3MjYyIDQuMzI2MDlDOC4zNzc2MiAzLjA0MjA5IDkuNDAyNjIgMi4wMDAwOSAxMC42NTU2IDIuMDAwMDlIMTAuNjU5NkwxMy4yMDY2IDIuMDAzMDlDMTMuODA4NiAyLjAwNDA5IDE0LjM3NjYgMi4yNDIwOSAxNC44MDQ2IDIuNjczMDlDMTUuMjQ3NiAzLjExODA5IDE1LjQ4OTYgMy43MTMwOSAxNS40ODc2IDQuMzQ4MDlMMTUuNDg1NiA0LjYyNzA5QzE1LjQ4MzYgNS4xOTMwOSAxNS43NDI2IDUuNzI4MDkgMTYuMTc5NiA2LjA1NjA5TDE2LjI4NjYgNi4xMzcwOUMxNi43NDU2IDYuNDgyMDkgMTcuMzQzNiA2LjU4MTA5IDE3Ljg4MDYgNi40MDEwOUwxOC4yMTk2IDYuMjg4MDlDMTguNzk2NiA2LjA5NjA5IDE5LjQxMDYgNi4xNDMwOSAxOS45NTE2IDYuNDIwMDlDMjAuNTA2NiA2LjcwNDA5IDIwLjkxNjYgNy4xOTMwOSAyMS4xMDQ2IDcuNzk4MDlMMjEuODkxNiAxMC4zMTkxQzIyLjI3MTYgMTEuNTM3MSAyMS42MTM2IDEyLjg1MTEgMjAuNDI2NiAxMy4yNDgxTDIwLjIyNTYgMTMuMzE1MUMxOS42NDk2IDEzLjUwOTEgMTkuMTk2NiAxMy45ODkxIDE5LjAxNTYgMTQuNjAxMUMxOC44NDk2IDE1LjE2MjEgMTguOTQ1NiAxNS43NzkxIDE5LjI3NDYgMTYuMjUzMUwxOS41MzQ2IDE2LjYyODFDMjAuMjQ4NiAxNy42NjAxIDIwLjAyMDYgMTkuMTA4MSAxOS4wMjY2IDE5Ljg1NzFMMTYuOTY1NiAyMS40MTMxQzE2LjQ3MDYgMjEuNzg3MSAxNS44NjM2IDIxLjkzODEgMTUuMjU0NiAyMS44NDExQzE0LjY0MDYgMjEuNzQyMSAxNC4xMDQ2IDIxLjQwMjEgMTMuNzQ1NiAyMC44ODQxTDEzLjYyNzYgMjAuNzEyMUMxMy4yNzc2IDIwLjIwODEgMTIuNzE3NiAxOS45MDIxIDEyLjEzMDYgMTkuOTM1MUMxMS41NDI2IDE5Ljk1MTEgMTEuMDM0NiAyMC4yMzAxIDEwLjcwMjYgMjAuNzAyMUwxMC40NzE2IDIxLjAzMDFDMTAuMTA5NiAyMS41NDMxIDkuNTcyNjIgMjEuODc4MSA4Ljk2MTYyIDIxLjk3NDFDOC44NDQ2MiAyMS45OTIxIDguNzI4NjIgMjIuMDAwMSA4LjYxMzYyIDIyLjAwMDFaTTExLjk5OTggMTAuNUMxMS4xNzI4IDEwLjUgMTAuNDk5OCAxMS4xNzMgMTAuNDk5OCAxMkMxMC40OTk4IDEyLjgyNyAxMS4xNzI4IDEzLjUgMTEuOTk5OCAxMy41QzEyLjgyNjggMTMuNSAxMy40OTk4IDEyLjgyNyAxMy40OTk4IDEyQzEzLjQ5OTggMTEuMTczIDEyLjgyNjggMTAuNSAxMS45OTk4IDEwLjVaTTExLjk5OTggMTUuNUMxMC4wNjk4IDE1LjUgOC40OTk4MiAxMy45MyA4LjQ5OTgyIDEyQzguNDk5ODIgMTAuMDcgMTAuMDY5OCA4LjQ5OTk5IDExLjk5OTggOC40OTk5OUMxMy45Mjk4IDguNDk5OTkgMTUuNDk5OCAxMC4wNyAxNS40OTk4IDEyQzE1LjQ5OTggMTMuOTMgMTMuOTI5OCAxNS41IDExLjk5OTggMTUuNVoiIGZpbGw9IndoaXRlIi8+CjwvbWFzaz4KPGcgbWFzaz0idXJsKCNtYXNrMCkiPgo8cmVjdCB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIGZpbGw9IiM5RDlEOUQiLz4KPC9nPgo8L3N2Zz4K"
							     alt="settings" class="Account_settingsIcon__3bWWi"/></button>
                        <?php if(isset($user->image)): ?>
							<img src="/images/users/<?= $user->image ?>" alt="avatar" class="img-fluid rounded-circle"
							     width="100px" height="100px"/>
                        <?php else: ?>
							<img src="/images/dash/icons/spot-illustrations/falcon.png" class="img-fluid" width="100px"
							     alt="avatar"/>
                        <?php endif; ?>
						<h5 class="text-primary fw-bold mt-4"><?= user()->first_name . " " . user()->last_name ?></h5>
						<p class="text-muted"><?= user()->email ?></p>
						<div class="d-flex justify-content-between w-100 mt-4">
							<div class="d-flex flex-column align-items-center">
								<h6 class="fw-bold text-muted text-uppercase">Orders</h6>
								<p class="fw-bold"><?= count($user->orders) ?></p></div>
							<div class="d-flex flex-column align-items-center">
								<h6 class="fw-bold text-muted text-uppercase">Cart</h6>
								<p class="fw-bold"><?= cartDetails('count') ?></p></div>
							<div class="d-flex flex-column align-items-center">
								<h6 class="fw-bold text-muted text-uppercase">Spend</h6>
								<p class="fw-bold">145</p></div>
						</div>
						<hr/>
						<div class="d-flex justify-content-between w-100 mt-4">
							<div class="d-flex flex-column align-items-center">
								<h6 class="fw-bold text-muted text-uppercase">Wallet</h6>
								<p class="fw-bold">KSH.<span
											id="wallet-balance"><?= $user->wallet->amount ?? 0 ?></span></p></div>
							<div class="d-flex flex-column align-items-center">
								<h6 class="fw-bold text-muted text-uppercase">Spend</h6>
								<p class="fw-bold">KSH.<?= $user->spend ?></p></div>
						</div>
						<a href="javascript:void(0)" id="load-wallet" class="link-success">Load wallet <i
									class="bi bi-wallet"></i></a>
						<hr/>
						<div class="w-100 mt-3">
							<div class="d-flex justify-content-between align-items-start">
								<div style="width:170px"><h6 class="fw-bold">Delivery Address</h6>
									<p class="text-muted mt-4">Mr. Robbie Williams 94 Kings Road, London SW39 6AZ</p>
								</div>
								<button class="bg-transparent border-0 p-0 btn btn-secondary">
									<img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMC42Nzg2IDcuMTE5MTRMOC44ODE5NSA1LjMyMjQ3TDEwLjE4MDYgNC4wMjMxNEwxMS45NzY2IDUuODE5MTRMMTAuNjc4NiA3LjExOTE0Wk02LjA1MjYxIDExLjc0OThMNC4wNjc5NSAxMS45MzA1TDQuMjQzOTUgOS45NTk4TDcuOTg4NjEgNi4yMTUxNEw5Ljc4NTk1IDguMDEyNDdMNi4wNTI2MSAxMS43NDk4Wk0xMi45MzUzIDQuODkxOEwxMi45MzQ2IDQuODkxMTRMMTEuMTA5MyAzLjA2NThDMTAuNjE1MyAyLjU3MzE0IDkuNzY2NjEgMi41NDk4IDkuMjk4NjEgMy4wMTk4TDMuMzAxMjggOS4wMTcxNEMzLjA4Mzk1IDkuMjMzOCAyLjk0OTI4IDkuNTIxOCAyLjkyMTI4IDkuODI2NDdMMi42Njg2MSAxMi42MDY1QzIuNjUxMjggMTIuODAzMSAyLjcyMTI4IDEyLjk5NzggMi44NjEyOCAxMy4xMzc4QzIuOTg3MjggMTMuMjYzOCAzLjE1NzI4IDEzLjMzMzEgMy4zMzI2MSAxMy4zMzMxQzMuMzUzMjggMTMuMzMzMSAzLjM3MzI4IDEzLjMzMjUgMy4zOTMyOCAxMy4zMzA1TDYuMTczMjggMTMuMDc3OEM2LjQ3ODYxIDEzLjA0OTggNi43NjU5NSAxMi45MTU4IDYuOTgyNjEgMTIuNjk5MUwxMi45ODA2IDYuNzAxMTRDMTMuNDY1OSA2LjIxNDQ3IDEzLjQ0NTMgNS40MDI0NyAxMi45MzUzIDQuODkxOFoiIGZpbGw9IiM5RDlEOUQiLz4KPG1hc2sgaWQ9Im1hc2swIiBtYXNrLXR5cGU9ImFscGhhIiBtYXNrVW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4PSIyIiB5PSIyIiB3aWR0aD0iMTIiIGhlaWdodD0iMTIiPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTEwLjY3ODYgNy4xMTkxNEw4Ljg4MTk1IDUuMzIyNDdMMTAuMTgwNiA0LjAyMzE0TDExLjk3NjYgNS44MTkxNEwxMC42Nzg2IDcuMTE5MTRaTTYuMDUyNjEgMTEuNzQ5OEw0LjA2Nzk1IDExLjkzMDVMNC4yNDM5NSA5Ljk1OThMNy45ODg2MSA2LjIxNTE0TDkuNzg1OTUgOC4wMTI0N0w2LjA1MjYxIDExLjc0OThaTTEyLjkzNTMgNC44OTE4TDEyLjkzNDYgNC44OTExNEwxMS4xMDkzIDMuMDY1OEMxMC42MTUzIDIuNTczMTQgOS43NjY2MSAyLjU0OTggOS4yOTg2MSAzLjAxOThMMy4zMDEyOCA5LjAxNzE0QzMuMDgzOTUgOS4yMzM4IDIuOTQ5MjggOS41MjE4IDIuOTIxMjggOS44MjY0N0wyLjY2ODYxIDEyLjYwNjVDMi42NTEyOCAxMi44MDMxIDIuNzIxMjggMTIuOTk3OCAyLjg2MTI4IDEzLjEzNzhDMi45ODcyOCAxMy4yNjM4IDMuMTU3MjggMTMuMzMzMSAzLjMzMjYxIDEzLjMzMzFDMy4zNTMyOCAxMy4zMzMxIDMuMzczMjggMTMuMzMyNSAzLjM5MzI4IDEzLjMzMDVMNi4xNzMyOCAxMy4wNzc4QzYuNDc4NjEgMTMuMDQ5OCA2Ljc2NTk1IDEyLjkxNTggNi45ODI2MSAxMi42OTkxTDEyLjk4MDYgNi43MDExNEMxMy40NjU5IDYuMjE0NDcgMTMuNDQ1MyA1LjQwMjQ3IDEyLjkzNTMgNC44OTE4WiIgZmlsbD0id2hpdGUiLz4KPC9tYXNrPgo8ZyBtYXNrPSJ1cmwoI21hc2swKSI+CjxyZWN0IHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iIzlEOUQ5RCIvPgo8L2c+Cjwvc3ZnPgo="
									     alt="edit"/>
								</button>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>

<?= $this->section('scripts') ?>
	<script>
        $('#load-wallet').on('click', function () {
            Swal.fire({
                input: 'tel',
                inputLabel: 'Amount (min: 100)',
                inputPlaceholder: 'Enter amount to deposit',
                showLoaderOnConfirm: true,
                preConfirm: amount => {
                    if (!(parseFloat(amount) >= 100)) {
                        Swal.showValidationMessage('Invalid amount.')
                    } else {
                        return $.ajax({
                            data: {amount: amount},
                            method: 'POST',
                            url: `<?= route_to('user.wallet') ?>`,
                            dataType: 'json',
                            beforeSend: () => showLoader('Processing payment...'),
                            statusCode: {
                                200: response => {
                                    if (response.status) {
                                        $('#wallet-balance').html(response.balance)
                                        return response.message;
                                    } else {
                                        $('loader').addClass('d-none');
                                        errorAlert(response.message)
                                    }
                                },
                            },
                            error: () => {
                                oopsError();
                                hideLoader();
                            }
                        })
                    }
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then(result => {
                if (result.isConfirmed) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Loaded!',
                        text: result.value.message,
                        timer: 3000,
                        showConfirmButton: false
                    }).then(() => hideLoader())
                }
            })
        })
	</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>