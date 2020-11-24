<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>UBold - Responsive Admin Dashboard Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
	<meta content="Coderthemes" name="author"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

	<?php include('header_link.php'); ?>

</head>

<body class="boxed-layout">
<?php include('header.php'); ?>
<?php if ($this->session->flashdata('errors') != '') {
	?>
	<div id="snackbar"><?= $this->session->flashdata('errors') ?></div>
	<?php
} ?>

<div class="wrapper">
	<div class="">
		<div class="row mt-4">
			<div class="col-12">
				<div class="card-box">
					<h3 style="text-align: center">Order Details : <?= ucwords($this->input->get('shop_name')); ?></h3>
					<hr>
					<div class="mb-2">
						<div class="row">
							<div class="col-9 text-sm-center form-inline">
								<div class="form-group mr-2">
									<select id="demo-foo-filter-status" class="custom-select custom-select-sm">
										<option value="">Show all</option>
										<option
											value="Delivered">Delivered
										</option>
										<option
											value="Cancel">Cancel
										</option>
									</select>
								</div>
								<div class="form-group">
									<input id="demo-foo-search" type="text" placeholder="Search"
										   class="form-control form-control-sm" autocomplete="on">
								</div>
							</div>
						</div>
					</div>

					<div class="table-responsive">
						<table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0"
							   data-page-size="10">
							<thead>
							<tr>
								<th>Sr No.</th>
								<th>Order Id</th>
								<th>User Name/ Phone</th>
								<th>Order Status</th>
								<th>Items</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$i = 0;
							foreach ($orders as $item) {
								$i = $i + 1;
								$id = encrypt($item['user_id']);
								?>
								<tr>
									<td><?= $i ?></td>
									<td><?= $item['order_id'] ?></td>
									<td><?= $item['user_name'] ?><br><?= $item['user_phone'] ?></td>
									<td>
										<?php if ($item['booking_status'] == '4') {
											?>
											<div class="badge font-14 bg-soft-success text-success p-1">Delivered</div>
											<?php
										} else {
											?>
											<div class="badge font-14 bg-soft-danger text-danger p-1">Cancel</div>
											<?php
										} ?>
									</td>
									<td>
										<button type="button" class="btn btn-info waves-effect waves-light btn-rounded"
												data-toggle="modal"
												data-target=".bs-example-modal-lg<?= $i ?>">View
										</button>
										<div class="modal fade bs-example-modal-lg<?= $i ?>" tabindex="-1" role="dialog"
											 aria-labelledby="myLargeModalLabel" aria-hidden="true"
											 style="display: none;">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="myLargeModalLabel">Order
															Details</h4>
														<button type="button" class="close" data-dismiss="modal"
																aria-hidden="true">×
														</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<div class="col-md-6">
																<h5>User Name : <?= ucwords($item['user_name']) ?></h5>
																<h5>user Delivery Address
																	: <?= ucwords($item['user_address']) ?></h5>
																<h5>User Phone No.
																	: <?= ucwords($item['user_phone']) ?></h5>
															</div>
															<div class="col-md-6">
																<h5>Order : <?php if ($item['booking_status'] == '4') {
																		?>
																		<span
																			class="badge badge-success">Delivered</span>
																		<h5>Delivered Time
																			: <?= $item['estimated_time'] ?></h5>
																		<?php
																	} else {
																		?>
																		<span class="badge badge-danger">Cancel</span>
																		<h5>Reason : <?= $item['cancel_msg'] ?></h5>
																		<?php
																	} ?></h5>
															</div>
														</div>

														<table class="table table-centered">
															<thead>
															<tr>
																<th>Product Name</th>
																<th>Product Price</th>
																<th>Product Quantity</th>
															</tr>
															</thead>
															<tbody>
															<tr>
																<?php
																$total = 0;
																foreach (getAllProduct('tbl_book_item', 'product_order_id', $item['order_id']) as $prod) {
																$p = array();
																$prod2 = array();
																$prod2['order_id'] = $prod['product_order_id'];
																$prod2['booking_price'] = $prod['booking_price'];
																$prod2['quantity'] = $prod['quantity'];
																$prod2['product_id'] = $prod['product_id'];
																$prod2['product_name'] = $prod['product_name'];
																array_push($p, $prod2);
																?>
																<?php
																foreach ($p as $e) {
																	$total = $total + $e['booking_price'];
																	?>
																	<td><?= $e['product_name'] ?></td>
																	<td><?= $e['quantity'] ?></td>
																	<td><?= $e['booking_price'] ?></td>
																	<?php
																}
																?>
															</tr>
															<?php
															}
															?>
															<tr>
																<td colspan="2"></td>
																<td>Total Amount : <?= $total ?></td>
															</tr>
															</tbody>
														</table>

													</div>
												</div>
											</div>
										</div>
									</td>

								</tr>
								<?php
							} ?>
							</tbody>
							<tfoot>
							<tr class="active">
								<td colspan="8">
									<div class="text-right">
										<ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
									</div>
								</td>
							</tr>
							</tfoot>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


<div class="rightbar-overlay"></div>
<?php include('footer_link.php'); ?>
</body>
<script>
	$(document).ready(function () {
		var x = document.getElementById("snackbar");
		x.className = "show";
		setTimeout(function () {
			x.className = x.className.replace("show", "");
		}, 3000);
	});
</script>
</html>
