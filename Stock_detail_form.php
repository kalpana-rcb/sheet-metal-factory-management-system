<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<style>
	body{
		background:#f4f7fb;
		font-family:'Segoe UI',sans-serif;
	}

	.page-title{
		font-weight:700;
		color:#1e3c72;
	}

	.card{
		border:none;
		border-radius:20px;
		box-shadow:0 10px 25px rgba(0,0,0,0.08);
		overflow:hidden;
	}

	.card-header{
		background:linear-gradient(135deg,#1e3c72,#2a5298);
		padding:20px;
		color:#fff;
		border:none;
	}

	.card-title{
		font-size:24px;
		font-weight:700;
		margin:0;
	}

	.form-control{
		border-radius:10px;
		height:45px;
		border:1px solid #dfe6ee;
		box-shadow:none;
	}

	.form-control:focus{
		border-color:#2a5298;
		box-shadow:0 0 8px rgba(42,82,152,0.2);
	}

	label{
		font-weight:600;
		color:#1e3c72;
	}

	.btn{
		border-radius:10px;
		padding:10px 20px;
		font-weight:600;
	}

	.btn-success{
		background:#28a745;
		border:none;
	}

	.btn-danger{
		background:#dc3545;
		border:none;
	}

	.btn-primary{
		background:#2a5298;
		border:none;
	}

	.back-btn{
		float:right;
	}

	.form-section{
		padding:20px;
	}

	.table td{
		border:none;
		padding:15px;
		vertical-align:middle;
	}

	.page-header{
		margin-bottom:25px;
	}

	.breadcrumbs{
		background:none;
		padding:0;
		margin:0;
	}

	.card-body{
		padding:35px;
	}

	.form-container{
		max-width:700px;
		margin:auto;
	}
</style>

<body>

<div class="wrapper sidebar_minimize">

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
						<i class="fas fa-boxes"></i>
						Stock Details
					</h4>

				</div>

				<div class="row">

					<div class="col-md-12">

						<div class="card">

							<div class="card-header">

								<div class="d-flex justify-content-between align-items-center">

									<div class="card-title">
										Add Stock Details
									</div>

									<a href="product_view.php"
									   class="btn btn-light back-btn">

										<i class="fas fa-arrow-left"></i>
										Back

									</a>

								</div>

							</div>

							<div class="card-body">

								<div class="form-container">

<?php include('val.php'); ?>

<form name="formID"
	  id="formID"
	  method="post"
	  action="Stock_detail_insert.php">

	<table class="table">

		<tr>

			<td width="35%">
				<label>
					Product Name
				</label>
			</td>

			<td>

<select name="product_id"
		id="product_id"
		class="form-control validate[required]">

	<option value="">
		Select Product
	</option>

<?php

include('database.php');

$sql1="SELECT * FROM product";

$res1=mysqli_query($conn,$sql1);

while($row1=mysqli_fetch_array($res1))
{
?>

<option value="<?php echo $row1['product_id'];?>">

	<?php echo $row1['product_name'];?>

</option>

<?php
}
?>

</select>

			</td>

		</tr>

		<tr>

			<td>

				<label>
					Stock Quantity
				</label>

			</td>

			<td>

<input name="stock"
	   type="text"
	   id="stock"
	   class="form-control validate[required,custom[onlyNumber]]"
	   placeholder="Enter Stock Quantity">

			</td>

		</tr>

		<tr>

			<td colspan="2" class="text-center pt-4">

				<button type="submit"
						name="Submit"
						class="btn btn-success">

					<i class="fas fa-save"></i>
					Submit

				</button>

				<button type="reset"
						name="Reset"
						class="btn btn-danger">

					<i class="fas fa-times"></i>
					Reset

				</button>

			</td>

		</tr>

	</table>

</form>

								</div>

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
<?php include('val.php'); ?>

</body>
</html>