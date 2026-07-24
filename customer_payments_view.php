<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<style>
	body{
		background:#f4f7fc;
		font-family:'Segoe UI', sans-serif;
	}

	.page-title{
		font-weight:700;
		color:#1e3c72;
	}

	.card{
		border:none;
		border-radius:18px;
		box-shadow:0 8px 20px rgba(0,0,0,0.08);
		overflow:hidden;
	}

	.card-header{
		background:linear-gradient(135deg,#1e3c72,#2a5298);
		padding:20px;
		border:none;
		color:#fff;
	}

	.header-flex{
		display:flex;
		justify-content:space-between;
		align-items:center;
		flex-wrap:wrap;
		gap:10px;
	}

	.btn{
		border-radius:10px;
		font-weight:600;
		padding:10px 18px;
	}

	.search-box{
		display:flex;
		gap:10px;
		align-items:center;
	}

	.search-input{
		height:42px;
		border-radius:10px;
		border:none;
		padding-left:15px;
		width:260px;
	}

	.table{
		border-radius:12px;
		overflow:hidden;
	}

	.table thead{
		background:#1e3c72;
		color:#fff;
	}

	.table thead th{
		font-weight:600;
		padding:14px;
	}

	.table tbody tr:hover{
		background:#f1f5ff;
		transition:0.3s;
	}

	.table td{
		padding:12px;
		vertical-align:middle;
	}

	.amount-badge{
		background:#28a745;
		color:#fff;
		padding:8px 14px;
		border-radius:20px;
		font-size:14px;
		font-weight:600;
	}

	.customer-icon{
		color:#1e3c72;
		margin-right:5px;
	}

	.date-badge{
		background:#17a2b8;
		color:#fff;
		padding:7px 12px;
		border-radius:20px;
		font-size:13px;
	}
</style>

<body>

<div class="wrapper">

	<div class="main-header">

		<?php include('header.php'); ?>

	</div>

	<!-- Sidebar -->
	<?php include('sidebar.php'); ?>
	<!-- Sidebar End -->

	<div class="main-panel">

		<div class="content">

			<div class="page-inner">

				<div class="page-header">

					<h4 class="page-title">
						<i class="fas fa-money-check-alt"></i>
						Customer Payments Details
					</h4>

				</div>

				<div class="col-md-12">

					<div class="card">

						<div class="card-header">

							<div class="header-flex">

								<!-- Add New Button -->
								<div>

									<a href="payments_form.php" class="btn btn-light">

										<i class="fas fa-plus"></i>
										Add New

									</a>

								</div>

								<!-- Search Box -->
								<div class="search-box">

									<form method="GET" action="" class="d-flex">

										<input type="text"
											   name="search"
											   class="form-control search-input"
											   placeholder="Search Customer..."
											   value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">

										<button type="submit"
												class="btn btn-warning ml-2">

											<i class="fas fa-search"></i>
											Search

										</button>

									</form>

								</div>

							</div>

						</div>

						<div class="card-body">

							<div class="table-responsive">

								<table id="multi-filter-select"
									   class="display table table-striped table-hover">

									<thead>

										<tr>

											<th>S.No</th>
											<th>Customer</th>
											<th>Payment Amount</th>
											<th>Description</th>
											<th>Payment Date</th>
											<th>Edit</th>
											<th>Delete</th>

										</tr>

									</thead>

									<tbody>

<?php

$sn = 1;

include('database.php');

$search = "";

if(isset($_GET['search']))
{
	$search = $_GET['search'];

	$sql = "SELECT * FROM customer_payments cp,
			customer_details cd

			WHERE cp.customer_id=cd.customer_id

			AND (
				cd.customer_name LIKE '%$search%'
				OR cp.payment_amount LIKE '%$search%'
				OR cp.payment_date LIKE '%$search%'
			)";
}
else
{
	$sql = "SELECT * FROM customer_payments cp,
			customer_details cd

			WHERE cp.customer_id=cd.customer_id";
}

$res = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
?>

<tr>

	<td>
		<?php echo $sn++; ?>
	</td>

	<td>
		<i class="fas fa-user customer-icon"></i>
		<b><?php echo $row['customer_name']; ?></b>
	</td>

	<td>
		<span class="amount-badge">
			Rs <?php echo $row['payment_amount']; ?>
		</span>
	</td>

	<td>
		<?php echo $row['description']; ?>
	</td>

	<td>
		<span class="date-badge">
			<?php echo $row['payment_date']; ?>
		</span>
	</td>

	<td>

		<a href="customer_payments_edit.php?c_id=<?php echo $row['customer_payment_id']; ?>"
		   class="btn btn-info btn-sm">

			<i class="fas fa-edit"></i>
			Edit

		</a>

	</td>

	<td>

		<a href="customer_payments_delete.php?c_id=<?php echo $row['customer_payment_id']; ?>"
		   class="btn btn-danger btn-sm"
		   onclick="return confirm('Are you sure to delete this payment record?')">

			<i class="fas fa-trash"></i>
			Delete

		</a>

	</td>

</tr>

<?php
}
?>

									</tbody>

								</table>

							</div>

						</div>

					</div>

				</div>

			</div>

			<?php include('footer.php'); ?>

		</div>

	</div>

</div>

<?php include('script.php'); ?>

</body>
</html>