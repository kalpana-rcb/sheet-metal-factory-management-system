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

	.form-icon{
		color:#1e3c72;
		margin-right:8px;
	}

	.breadcrumbs{
		background:none;
		padding:0;
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
						<i class="fas fa-user-edit"></i> Customer Details
					</h4>

				</div>

				<div class="row justify-content-center">

					<div class="col-md-8">

						<div class="card">

							<div class="card-header">

								<h4 class="card-title">
									<i class="fas fa-edit"></i> Update Customer
								</h4>

							</div>

							<div class="card-body form-section">

<?php

include('database.php');

$c_id = $_REQUEST['c_id'];

$sql = "SELECT * FROM customer_details WHERE customer_id='$c_id'";

$res = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($res);

?>

<form name="formID" 
	  id="formID" 
	  method="post" 
	  action="customer_details_update.php">

<input type="hidden"
	   value="<?php echo $row['customer_id']; ?>"
	   name="customer_id">

<div class="form-group">

	<label>
		<i class="fas fa-user form-icon"></i>
		Customer Name
	</label>

	<input name="cn"
		   type="text"
		   id="cn"
		   value="<?php echo $row['customer_name']; ?>"
		   class="form-control validate[required,custom[onlyLetter]]"
		   placeholder="Enter Customer Name">

</div>

<div class="form-group">

	<label>
		<i class="fas fa-map-marker-alt form-icon"></i>
		Address
	</label>

	<input name="ca"
		   type="text"
		   id="ca"
		   value="<?php echo $row['customer_address']; ?>"
		   class="form-control validate[required]"
		   placeholder="Enter Address">

</div>

<div class="form-group">

	<label>
		<i class="fas fa-city form-icon"></i>
		City
	</label>

	<input name="cc"
		   type="text"
		   id="cc"
		   value="<?php echo $row['customer_city']; ?>"
		   class="form-control validate[required,custom[onlyLetter]]"
		   placeholder="Enter City">

</div>

<div class="form-group">

	<label>
		<i class="fas fa-phone form-icon"></i>
		Contact Number
	</label>

	<input name="cnor"
		   type="text"
		   id="cnor"
		   value="<?php echo $row['contact_number']; ?>"
		   class="form-control validate[required,custom[mobile]]"
		   placeholder="Enter Contact Number">

</div>

<div class="form-group">

	<label>
		<i class="fas fa-envelope form-icon"></i>
		Email
	</label>

	<input name="em"
		   type="text"
		   id="em"
		   value="<?php echo $row['email']; ?>"
		   class="form-control validate[required,custom[email]]"
		   placeholder="Enter Email Address">

</div>

<div class="mt-4">


	<input type="submit"
		   name="Submit"
		   value="Update Customer"
		   class="btn btn-success btn-custom">

	<a href="customer_details_view.php"
	   class="btn btn-primary btn-custom">

		<i class="fas fa-arrow-left"></i>
		Back to Customers

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