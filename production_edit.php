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

	.btn-primary:hover{
		box-shadow:0 5px 12px rgba(0,123,255,0.3);
	}

	.breadcrumbs{
		background:none;
		padding:0;
	}

	.form-icon{
		color:#1e3c72;
		margin-right:8px;
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
						<i class="fas fa-industry"></i>
						Production Details
					</h4>

				</div>

				<div class="row justify-content-center">

					<div class="col-md-8">

						<div class="card">

							<div class="card-header">

								<h4 class="card-title">
									<i class="fas fa-edit"></i>
									Update Production
								</h4>

							</div>

							<div class="card-body form-section">

<?php

include('database.php');

$p_id = $_REQUEST['p_id'];

$sql = "SELECT * FROM production WHERE production_id='$p_id'";

$res = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($res);

?>

<form name="formID"
	  id="formID"
	  method="post"
	  action="production_update.php">

<input type="hidden"
	   value="<?php echo $row['production_id']; ?>"
	   name="p_id">

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

		$sql1 = "SELECT * FROM product";

		$res1 = mysqli_query($conn,$sql1);

		while($row1 = mysqli_fetch_array($res1))
		{
		?>

		<option value="<?php echo $row1['product_id']; ?>"

		<?php if($row1['product_id']==$row['product_id']) { ?>

		selected

		<?php } ?>>

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

		<option value="<?php echo $row2['raw_material_id']; ?>"

		<?php if($row2['raw_material_id']==$row['raw_material_id']) { ?>

		selected

		<?php } ?>>

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
		Quantity
	</label>

	<input type="text"
		   name="qty"
		   id="qty"
		   placeholder="Enter Quantity in Kgs"
		   value="<?php echo $row['quantity']; ?>"
		   class="form-control validate[required,custom[onlyNumber]]">

</div>

<div class="form-group">

	<label>
		<i class="fas fa-align-left form-icon"></i>
		Description
	</label>

	<textarea name="pd"
			  id="pd"
			  class="form-control validate[required]"><?php echo $row['description']; ?></textarea>

</div>

<div class="form-group">

	<label>
		<i class="fas fa-calendar-alt form-icon"></i>
		Production Date
	</label>

	<input type="date"
		   name="pda"
		   id="pda"
		   value="<?php echo $row['production_date']; ?>"
		   class="form-control validate[required,custom[date]]">

</div>

<!-- Buttons -->

<div class="mt-4">

	<input type="submit"
		   name="Submit"
		   value="Update Production"
		   class="btn btn-success btn-custom">

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