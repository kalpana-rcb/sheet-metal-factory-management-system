<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<style>

	body{
		background:linear-gradient(135deg,#eef2ff,#f8fbff);
		font-family:'Segoe UI', sans-serif;
		color:#2d3748;
	}

	.page-title{
		font-weight:700;
		color:#1e3c72;
	}

	.card{
		border:none;
		border-radius:20px;
		box-shadow:0 10px 30px rgba(0,0,0,0.08);
		overflow:hidden;
		margin-bottom:25px;
		background:#fff;
	}

	.card-header{
		background:linear-gradient(135deg,#1e3c72,#2a5298);
		color:#fff;
		padding:22px;
		font-size:22px;
		font-weight:700;
		border:none;
		letter-spacing:0.5px;
	}

	.table{
		border-radius:12px;
		overflow:hidden;
	}

	.table thead{
		background:linear-gradient(135deg,#1e3c72,#2a5298);
		color:#fff;
	}

	.table thead th{
		padding:16px;
		font-weight:600;
		border:none;
		text-align:center;
		font-size:15px;
	}

	.table tbody tr{
		transition:0.3s ease;
	}

	.table tbody tr:hover{
		background:#eef4ff;
		transform:scale(1.001);
	}

	.table td{
		padding:15px;
		vertical-align:middle;
		text-align:center;
		font-size:14px;
	}

	.btn{
		border-radius:12px;
		font-weight:600;
		padding:10px 18px;
		transition:0.3s;
		border:none;
	}

	.btn:hover{
		transform:translateY(-2px);
		box-shadow:0 8px 20px rgba(0,0,0,0.12);
	}

	.btn-primary{
		background:linear-gradient(135deg,#2563eb,#1d4ed8);
		color:#fff;
	}

	.btn-success{
		background:linear-gradient(135deg,#16a34a,#22c55e);
		color:#fff;
	}

	.btn-info{
		background:linear-gradient(135deg,#06b6d4,#0891b2);
		color:#fff;
	}

	.btn-danger{
		background:linear-gradient(135deg,#dc2626,#ef4444);
		color:#fff;
	}

	.top-buttons{
		display:flex;
		gap:12px;
		flex-wrap:wrap;
		margin-bottom:25px;
	}

	.bill-badge{
		background:linear-gradient(135deg,#0ea5e9,#2563eb);
		color:#fff;
		padding:6px 15px;
		border-radius:30px;
		font-size:13px;
		font-weight:700;
		box-shadow:0 4px 10px rgba(37,99,235,0.2);
	}

	.customer-name{
		font-weight:600;
		color:#1e3c72;
		font-size:15px;
	}

	.status-paid{
		background:#16a34a;
		color:#fff;
		padding:6px 14px;
		border-radius:20px;
		font-size:12px;
		font-weight:600;
	}

	.status-pending{
		background:#facc15;
		color:#000;
		padding:6px 14px;
		border-radius:20px;
		font-size:12px;
		font-weight:600;
	}

	.search-box{
		background:#fff;
		padding:25px;
		border-radius:18px;
		box-shadow:0 8px 25px rgba(0,0,0,0.06);
		margin-bottom:25px;
	}

	.search-title{
		font-size:20px;
		font-weight:700;
		color:#1e3c72;
		margin-bottom:20px;
	}

	.form-control{
		height:50px;
		border-radius:12px;
		border:1px solid #dbe4ff;
		padding-left:15px;
		font-size:15px;
		box-shadow:none !important;
	}

	.form-control:focus{
		border-color:#2563eb;
		box-shadow:0 0 10px rgba(37,99,235,0.15) !important;
	}

	.search-btn{
		height:50px;
		width:100%;
		font-size:15px;
		font-weight:700;
		border-radius:12px;
		background:linear-gradient(135deg,#1e3c72,#2563eb);
		color:#fff;
		border:none;
		transition:0.3s;
	}

	.search-btn:hover{
		transform:translateY(-2px);
		box-shadow:0 8px 20px rgba(37,99,235,0.25);
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
						<i class="fas fa-file-invoice-dollar"></i>
						Customer Order / Billing Details
					</h4>

				</div>

				<!-- Top Buttons -->
				<div class="top-buttons">

					<a href="Bill_master_form.php"
					   class="btn btn-primary">

						<i class="fas fa-plus"></i>
						Add New Details

					</a>

				</div>

				<!-- Premium Search Box -->
				<div class="search-box">

					<div class="search-title">
						<i class="fas fa-search"></i>
						Search Customer Bills
					</div>

					<form method="POST">

						<div class="row">

							<div class="col-md-10">

								<input type="text"
									   name="search"
									   class="form-control"
									   placeholder="Enter customer name">

							</div>

							<div class="col-md-2">

								<button type="submit"
										class="search-btn">

									<i class="fas fa-search"></i>
									Search

								</button>

							</div>

						</div>

					</form>

				</div>

				<!-- Table Card -->
				<div class="card">

					<div class="card-header">

						<i class="fas fa-list"></i>
						Customer Billing Records

					</div>

					<div class="card-body">

						<div class="table-responsive">

<table id="multi-filter-select"
	   class="display table table-striped table-hover">

	<thead>

	<tr>

		<th>Bill ID</th>
		<th>Bill Date</th>
		<th>Customer Name</th>
		<th>Other Charges</th>
		<th>Payment Status</th>
		<th>Payment ID</th>
		<th>More</th>
		<th>Delete</th>

	</tr>

	</thead>

	<tbody>

<?php

include('database.php');

if(isset($_POST['search']))
{
	$search = $_POST['search'];

	$sql = "SELECT * FROM bill_master bm,
			customer_details cd

			WHERE bm.customer_id=cd.customer_id
			AND cd.customer_name LIKE '%$search%'";
}
else
{
	$sql = "SELECT * FROM bill_master bm,
			customer_details cd

			WHERE bm.customer_id=cd.customer_id";
}

$res = mysqli_query($conn,$sql);

$sl=1;

while($row=mysqli_fetch_array($res))
{
	$bmid = $row["bill_master_id"];
	$dat = $row["bill_date"];
	$cust_id = $row["customer_id"];
?>

<tr>

	<td>

		<span class="bill-badge">
			#<?php echo $sl++; ?>
		</span>

	</td>

	<td>

		<i class="fas fa-calendar-alt text-primary"></i>

		<?php echo $row['bill_date']; ?>

	</td>

	<td>

		<span class="customer-name">

			<i class="fas fa-user"></i>

			<?php echo $row['customer_name']; ?>

		</span>

	</td>

	<td>

		Rs. <?php echo $row['other_charges']; ?>

	</td>

	<td>

<?php
if($row['payment_status']=="Paid")
{
?>

	<span class="status-paid">
		<?php echo $row['payment_status']; ?>
	</span>

<?php
}
else
{
?>

	<span class="status-pending">
		<?php echo $row['payment_status']; ?>
	</span>

<?php
}
?>

	</td>

	<td>

		<?php echo $row['payment_id']; ?>

	</td>

	<td>

		<a href="bill_details_more.php?bmid=<?php echo $bmid; ?>&dat=<?php echo $dat; ?>&cust_id=<?php echo $cust_id; ?>"
		   class="btn btn-info btn-sm">

			<i class="fas fa-eye"></i>
			Bill More

		</a>

	</td>

	<td>

		<a href="bill_master_delete.php?bm_id=<?php echo $row['bill_master_id'];?>"
		   onclick="return confirm('Are you sure want to delete?')"
		   class="btn btn-danger btn-sm">

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

			<?php include('footer.php'); ?>

		</div>

	</div>

</div>

<?php include('script.php'); ?>

</body>
</html>