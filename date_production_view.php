<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<style>
	body{
		background:#f4f7fc;
		font-family:'Segoe UI',sans-serif;
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
		padding:20px;
		color:#fff;
	}

	.table thead{
		background:#1e3c72;
		color:#fff;
	}

	.table th,
	.table td{
		vertical-align:middle;
		padding:12px;
	}

	.table tbody tr:hover{
		background:#f1f5ff;
		transition:0.3s;
	}

	.btn{
		border-radius:10px;
		font-weight:600;
	}

	.date-box{
		background:#fff;
		padding:20px;
		border-radius:15px;
		box-shadow:0 3px 10px rgba(0,0,0,0.05);
		margin:20px;
	}

	label{
		font-weight:600;
		color:#333;
	}

	.info-box{
		background:#eef4ff;
		padding:12px 18px;
		border-radius:10px;
		margin:15px 20px;
		font-size:16px;
		font-weight:600;
		color:#1e3c72;
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

				<div class="col-md-12">

					<div class="card">

						<div class="card-header">

							<a href="production_form.php" class="btn btn-light">
								<i class="fas fa-plus"></i> Add New
							</a>

						</div>

						<!-- Date Search -->
						<div class="date-box">

							<form name="form1"
								  method="post"
								  role="form"
								  action=""
								  id="formID">

								<div class="row">

									<div class="col-md-4">

										<label>Select From Date</label>

										<input type="date"
											   name="date1"
											   class="form-control"
											   value="<?php
											   if(isset($_POST['date1']))
											   {
												   echo $_POST['date1'];
											   }
											   else
											   {
												   echo date('Y-m-d');
											   }
											   ?>"
											   required>

									</div>

									<div class="col-md-4">

										<label>Select To Date</label>

										<input type="date"
											   name="date2"
											   class="form-control"
											   value="<?php
											   if(isset($_POST['date2']))
											   {
												   echo $_POST['date2'];
											   }
											   else
											   {
												   echo date('Y-m-d');
											   }
											   ?>"
											   required>

									</div>

									<div class="col-md-4 mt-4">

										<button type="submit"
												class="btn btn-primary mt-2">

											<i class="fas fa-search"></i>
											Search

										</button>

									</div>

								</div>

							</form>

						</div>

<?php

$date1 = "";
$date2 = "";

if(isset($_POST['date1']) && isset($_POST['date2']))
{
	$date1 = $_POST['date1'];
	$date2 = $_POST['date2'];
}
else
{
	$date1 = date('Y-m-d');
	$date2 = date('Y-m-d');
}

?>

						<div class="info-box">

							From Date :
							<font color="blue">
								<?php echo $date1; ?>
							</font>

							&nbsp;&nbsp;&nbsp;&nbsp;

							To Date :
							<font color="blue">
								<?php echo $date2; ?>
							</font>

						</div>

						<div class="card-body">

							<div class="table-responsive">

								<table id="multi-filter-select"
									   class="display table table-striped table-hover">

									<thead>

										<tr>
											<th>Production ID</th>
											<th>Product Name</th>
											<th>Raw Material</th>
											<th>Quantity</th>
											<th>Description</th>
											<th>Production Date</th>
											<th>Total Production</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>

									</thead>

									<tbody>

<?php

include('database.php');

$sql = "SELECT * FROM production pn,
		product pd,
		raw_materials rm

		WHERE pn.product_id = pd.product_id
		AND pn.raw_material_id = rm.raw_material_id
		AND production_date BETWEEN '$date1' AND '$date2' ";

$res = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
?>

<tr>

	<td><?php echo $row['production_id']; ?></td>

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
		<?php echo $row['description']; ?>
	</td>

	<td>
		<?php echo $row['production_date']; ?>
	</td>

	<td>
		<?php echo $row['total_production']; ?>
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