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
		width:250px;
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

	.badge-email{
		background:#17a2b8;
		color:#fff;
		padding:8px 12px;
		border-radius:20px;
		font-size:13px;
	}

	.customer-icon{
		color:#1e3c72;
		margin-right:5px;
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
						<i class="fas fa-users"></i> Customer Details
					</h4>

				</div>

				<div class="col-md-12">

					<div class="card">

						<div class="card-header">

							<div class="header-flex">

								<!-- Add Button -->
								<div>

									<a href="customer_details_form.php" class="btn btn-light">

										<i class="fas fa-plus"></i> Add New

									</a>

								</div>

								<!-- Search Form -->
								<div class="search-box">

									<form method="GET" action="" class="d-flex">

										<input type="text"
											   name="search"
											   class="form-control search-input"
											   placeholder="Search Customer..."
											   value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">

										<button type="submit" class="btn btn-warning ml-2">

											<i class="fas fa-search"></i> Search

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

											<th>Sl No</th>
											<th>Name</th>
											<th>Address</th>
											<th>City</th>
											<th>Contact Number</th>
											<th>Email</th>
											<th>Edit</th>
											<th>Delete</th>

										</tr>

									</thead>

									<tbody>

<?php

include('database.php');

$search = "";

if(isset($_GET['search']))
{
	$search = $_GET['search'];

	$sql = "SELECT * FROM customer_details
			WHERE customer_name LIKE '%$search%'
			OR customer_city LIKE '%$search%'
			OR contact_number LIKE '%$search%'
			OR email LIKE '%$search%'";
}
else
{
	$sql = "SELECT * FROM customer_details";
}

$res = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
?>

<tr>

	<td>
		<?php echo $row['customer_id']; ?>
	</td>

	<td>
		<i class="fas fa-user customer-icon"></i>
		<b><?php echo $row['customer_name']; ?></b>
	</td>

	<td>
		<?php echo $row['customer_address']; ?>
	</td>

	<td>
		<?php echo $row['customer_city']; ?>
	</td>

	<td>
		<i class="fas fa-phone"></i>
		<?php echo $row['contact_number']; ?>
	</td>

	<td>
		<span class="badge-email">
			<?php echo $row['email']; ?>
		</span>
	</td>

	<td>

		<a href="customer_details_edit.php?c_id=<?php echo $row['customer_id']; ?>"
		   class="btn btn-info btn-sm">

			<i class="fas fa-edit"></i> Edit

		</a>

	</td>

	<td>

		<a href="customer_details_delete.php?c_id=<?php echo $row['customer_id']; ?>"
		   class="btn btn-danger btn-sm"
		   onclick="return confirm('Are you sure to delete this customer?')">

			<i class="fas fa-trash"></i> Delete

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