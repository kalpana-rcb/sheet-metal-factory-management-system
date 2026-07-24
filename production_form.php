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
		color:#fff;
		padding:22px;
		border:none;
	}

	.card-title{
		font-size:24px;
		font-weight:600;
		margin:0;
	}

	.form-section{
		padding:35px;
	}

	label{
		font-weight:600;
		color:#333;
		margin-bottom:8px;
	}

	.form-control{
		height:45px;
		border-radius:10px;
		border:1px solid #dcdcdc;
		box-shadow:none;
		transition:0.3s;
	}

	.form-control:focus{
		border-color:#2a5298;
		box-shadow:0 0 8px rgba(42,82,152,0.25);
	}

	textarea.form-control{
		height:90px;
		resize:none;
	}

	.btn-custom{
		padding:10px 22px;
		border-radius:10px;
		font-weight:600;
		transition:0.3s;
	}

	.btn-custom:hover{
		transform:translateY(-2px);
	}

	.btn-success:hover{
		box-shadow:0 5px 12px rgba(40,167,69,0.3);
	}

	.btn-danger:hover{
		box-shadow:0 5px 12px rgba(220,53,69,0.3);
	}

	.btn-primary:hover{
		box-shadow:0 5px 12px rgba(0,123,255,0.3);
	}

	.form-icon{
		color:#1e3c72;
		margin-right:8px;
	}

	.breadcrumbs{
		background:none;
		padding:0;
	}

	.card-body{
		background:#fff;
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
						<i class="fas fa-industry"></i> Production Details
					</h4>

				</div>

				<div class="row justify-content-center">

					<div class="col-md-8">

						<div class="card">

							<div class="card-header">

								<h4 class="card-title">
									<i class="fas fa-plus-circle"></i> Add Production
								</h4>

							</div>

							<div class="card-body form-section">

<form name="formID" 
	  id="formID" 
	  method="post" 
	  action="production_insert.php">

<div class="form-group">

	<label>
		<i class="fas fa-box form-icon"></i>
		Product Name
	</label>

	<select name="pid" 
			id="pid" 
			class="form-control validate[required]">

		<option value="">Select Product</option>

		<?php
		include('database.php');

		$sql1 = "SELECT * FROM product";

		$res1 = mysqli_query($conn,$sql1);

		while($row1 = mysqli_fetch_array($res1))
		{
		?>

		<option value="<?php echo $row1['product_id']; ?>">
			<?php echo $row1['product_name']; ?>
		</option>

		<?php
		}
		?>

	</select>

</div>

<div class="form-group">

	<label>
		<i class="fas fa-cubes form-icon"></i>
		Raw Material
	</label>

	<select name="rid" 
			id="rid" 
			class="form-control validate[required]">

		<option value="">Select Raw Material</option>

		<?php

		$sql2 = "SELECT * FROM raw_materials";

		$res2 = mysqli_query($conn,$sql2);

		while($row2 = mysqli_fetch_array($res2))
		{
		?>

		<option value="<?php echo $row2['raw_material_id']; ?>">
			<?php echo $row2['raw_material_name']; ?>
		</option>

		<?php
		}
		?>

	</select>

</div>

<div class="form-group">

	<label>
		<i class="fas fa-weight-hanging form-icon"></i>
		Total Quantity
	</label>

	<input type="text"
		   name="qty"
		   id="qty"
		   placeholder="Enter Quantity in Kgs"
		   class="form-control validate[required,custom[onlyNumber]]">

</div>

<div class="form-group">

	<label>
		<i class="fas fa-align-left form-icon"></i>
		Description
	</label>

	<textarea name="pd"
			  id="pd"
			  class="form-control validate[]"
			  placeholder="Enter Production Description"></textarea>

</div>

<div class="form-group">

	<label>
		<i class="fas fa-calendar-alt form-icon"></i>
		Production Date
	</label>

	<input type="date"
		   name="pda"
		   id="pda"
		   class="form-control validate[required,custom[date]]">

</div>

<div class="mt-4">

	<input type="submit"
		   name="Submit"
		   value="Save Production"
		   class="btn btn-success btn-custom">

	<input type="reset"
		   name="Reset"
		   value="Reset"
		   class="btn btn-danger btn-custom">

	<a href="production_view.php" 
	   class="btn btn-primary btn-custom">

		<i class="fas fa-arrow-left"></i>
		Back to Production

	</a>

</div>

</form>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		<?php include('footer.php'); ?>

	</div>

	<?php include('setting.php'); ?>

</div>

<?php include('script.php'); ?>
<?php include('val.php'); ?>

</body>
</html>