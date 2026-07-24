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
		margin-bottom:25px;
	}

	.card-header{
		background:linear-gradient(135deg,#1e3c72,#2a5298);
		color:#fff;
		padding:20px;
		font-size:22px;
		font-weight:600;
		border:none;
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
		padding:15px;
		font-weight:600;
		border:none;
	}

	.table tbody tr:hover{
		background:#eef4ff;
		transition:0.3s;
	}

	.table td{
		padding:14px;
		vertical-align:middle;
	}

	.btn{
		border-radius:10px;
		font-weight:600;
		padding:8px 15px;
		transition:0.3s;
	}

	.btn:hover{
		transform:translateY(-2px);
	}

	.order-badge{
		background:#17a2b8;
		color:#fff;
		padding:6px 14px;
		border-radius:30px;
		font-size:13px;
		font-weight:600;
	}

	.customer-name{
		font-weight:600;
		color:#1e3c72;
	}

	label{
		font-weight:600;
		color:#333;
	}

	.search-card{
		background:#fff;
		padding:25px;
		border-radius:15px;
		box-shadow:0 4px 10px rgba(0,0,0,0.05);
		margin-bottom:25px;
	}

	.search-btn{
		margin-top:32px;
	}

	.page-header{
		margin-bottom:20px;
	}

	.form-control{
		border-radius:10px;
		height:42px;
		border:1px solid #ced4da;
	}

	.form-control:focus{
		box-shadow:0 0 8px rgba(42,82,152,0.2);
		border-color:#2a5298;
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
						<i class="fas fa-shopping-cart"></i>
						Customer Order Details
					</h4>

				</div>

				<!-- Search Section -->
				<div class="search-card">

<form name="form1"
	  method="post"
	  role="form"
	  action="date_customer_order_master_view.php"
	  id="formID">

<div class="row">

	<!-- From Date -->
	<div class="col-md-4">

		<label>Select From Date</label>

		<input type="date"
			   name="date1"
			   class="form-control"
			   value="<?php echo date('Y-m-d'); ?>"
			   required>

	</div>

	<!-- To Date -->
	<div class="col-md-4">

		<label>Select To Date</label>

		<input type="date"
			   name="date2"
			   class="form-control"
			   value="<?php echo date('Y-m-d'); ?>"
			   required>

	</div>

	<!-- Search Button -->
	<div class="col-md-4 search-btn">

		<button type="submit"
				class="btn btn-primary">

			<i class="fas fa-search"></i>
			Search

		</button>

	</div>

</div>

</form>

				</div>

				<!-- Orders Table -->
				<div class="card">

					<div class="card-header">

						<i class="fas fa-list"></i>
						Customer Order Records

					</div>

					<div class="card-body">

						<div class="table-responsive">

<table id="multi-filter-select"
	   class="display table table-striped table-hover">

	<thead>

	<tr>

		<th>Order ID</th>
		<th>Order Date</th>
		<th>Customer Name</th>
		<th>More Details</th>
		<th>Delete</th>

	</tr>

	</thead>

	<tbody>

<?php

include('database.php');

$sql = "SELECT * FROM customer_order_master com,
		customer_details cd

		WHERE com.customer_id=cd.customer_id";

$res = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
?>

<tr>

	<td>

		<span class="order-badge">

			#<?php echo $row['customer_order_master_id']; ?>

		</span>

	</td>

	<td>

		<i class="fas fa-calendar-alt text-primary"></i>

		<?php echo $row['date']; ?>

	</td>

	<td>

		<span class="customer-name">

			<i class="fas fa-user"></i>

			<?php echo $row['customer_name']; ?>

		</span>

	</td>

	<td>

		<a href="customer_order_master_more.php?pmid=<?php echo $row['customer_order_master_id']; ?>&c_id=<?php echo $row['customer_id']; ?>&contact_number=<?php echo $row['contact_number']; ?>&customer_name=<?php echo $row['customer_name']; ?>"
		   class="btn btn-info btn-sm">

			<i class="fas fa-eye"></i>
			More

		</a>

	</td>

	<td>

		<a href="customer_order_master_delete.php?com_id=<?php echo $row['customer_order_master_id']; ?>"
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