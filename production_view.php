<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<style>
	body{
		background:#f4f7fc;
		font-family: 'Segoe UI', sans-serif;
	}

	.page-title{
		font-weight:700;
		color:#1e3c72;
	}

	.card{
		border:none;
		border-radius:18px;
		box-shadow:0 6px 18px rgba(0,0,0,0.08);
		overflow:hidden;
	}

	.card-header{
		background:linear-gradient(135deg,#1e3c72,#2a5298);
		color:#fff;
		padding:20px;
		border:none;
	}

	.card-header .btn{
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
		border-radius:10px;
		height:42px;
		border:1px solid #ddd;
		padding-left:15px;
		width:250px;
	}

	.table{
		border-radius:10px;
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
		vertical-align:middle;
		padding:12px;
	}

	textarea{
		width:100%;
		border-radius:8px;
		border:1px solid #ddd;
		padding:8px;
		resize:none;
		background:#f9f9f9;
	}

	.btn{
		border-radius:10px;
		font-weight:600;
	}

	.total-box{
		margin-top:20px;
		font-size:18px;
		font-weight:bold;
		padding:12px 20px;
		border-radius:10px;
		background:linear-gradient(135deg,#11998e,#38ef7d);
		color:#fff;
		display:inline-block;
	}

	.date-card{
		background:#fff;
		border-radius:15px;
		padding:20px;
		box-shadow:0 3px 10px rgba(0,0,0,0.05);
		margin-bottom:25px;
	}

	label{
		font-weight:600;
		color:#333;
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
						<i class="fas fa-industry"></i> Production Details
					</h4>
				</div>

				<div class="card">

					<div class="card-header d-flex justify-content-between align-items-center flex-wrap">

						<div>
							<a href="production_form.php" class="btn btn-light">
								<i class="fas fa-plus"></i> Add New
							</a>
						</div>

						<!-- Search Product -->
						<div class="search-box">

							<form method="GET" action="" class="d-flex">

								<input type="text"
									   name="search"
									   class="form-control search-input"
									   placeholder="Search Product..."
									   value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">

								<button type="submit" class="btn btn-warning ml-2">
									<i class="fas fa-search"></i> Search
								</button>

							</form>

						</div>

					</div>

					<div class="card-body">

						<!-- Date Search -->
						<div class="date-card">

							<form name="form1"
								  method="post"
								  role="form"
								  action="date_production_view.php"
								  id="formID">

								<div class="row">

									<div class="col-md-3">
										<label>Select From Date</label>

										<input type="date"
											   name="date1"
											   class="form-control"
											   value="<?php echo date('Y-m-d'); ?>"
											   required>
									</div>

									<div class="col-md-3">
										<label>Select To Date</label>

										<input type="date"
											   name="date2"
											   class="form-control"
											   value="<?php echo date('Y-m-d'); ?>"
											   required>
									</div>

									<div class="col-md-3 mt-4">

										<button type="submit" class="btn btn-primary mt-2">
											<i class="fas fa-calendar-search"></i>
											Search Date
										</button>

									</div>

								</div>

							</form>

						</div>

						<!-- Production Table -->
						<div class="table-responsive">

							<table id="multi-filter-select"
								   class="display table table-striped table-hover">

								<thead>

									<tr>
										<th>#</th>
										<th>Product Name</th>
										<th>Raw Material</th>
										<th>Quantity</th>
										<th>Description</th>
										<th>Production Date</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>

								</thead>

								<tbody>

<?php

$tal = 0;
$sl = 1;

include('database.php');

$search = "";

if(isset($_GET['search']))
{
	$search = $_GET['search'];

	$sql = "SELECT * FROM production pn,
			product pd,
			raw_materials rm

			WHERE pn.product_id=pd.product_id
			AND pn.raw_material_id=rm.raw_material_id
			AND pd.product_name LIKE '%$search%' ";
}
else
{
	$sql = "SELECT * FROM production pn,
			product pd,
			raw_materials rm

			WHERE pn.product_id=pd.product_id
			AND pn.raw_material_id=rm.raw_material_id";
}

$res = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
	$tal = $tal + $row['quantity'];
?>

<tr>

	<td><?php echo $sl++; ?></td>

	<td>
		<b><?php echo $row['product_name']; ?></b>
	</td>

	<td>
		<?php echo $row['raw_material_name']; ?>
	</td>

	<td>
		<span class="badge badge-success p-2">
			<?php echo $row['quantity']; ?>
		</span>
	</td>

	<td>
		<textarea readonly><?php echo $row['description']; ?></textarea>
	</td>

	<td>
		<?php echo $row['production_date']; ?>
	</td>

	<td>
		<a href="production_edit.php?p_id=<?php echo $row['production_id']; ?>"
		   class="btn btn-info btn-sm">

			<i class="fas fa-edit"></i> Edit

		</a>
	</td>

	<td>
		<a href="production_delete.php?p_id=<?php echo $row['production_id']; ?>"
		   class="btn btn-danger btn-sm"
		   onclick="return confirm('Are you sure to delete this record?')">

			<i class="fas fa-trash"></i> Delete

		</a>
	</td>

</tr>

<?php
}
?>

								</tbody>

							</table>

							<div class="total-box">
								<i class="fas fa-chart-line"></i>
								Total Production = <?php echo $tal; ?>
							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		<?php include('footer.php'); ?>

	</div>

</div>

<?php include('script.php'); ?>

</body>
</html>