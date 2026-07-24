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

	.select2-container--default .select2-selection--single{
		height:45px;
		border-radius:10px;
		border:1px solid #dcdcdc;
		padding-top:6px;
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
						<i class="fas fa-money-check-alt"></i>
						Customer Payments
					</h4>

				</div>

				<div class="row justify-content-center">

					<div class="col-md-7">

						<div class="card">

							<div class="card-header">

								<h4 class="card-title">
									<i class="fas fa-user-check"></i>
									Select Customer
								</h4>

							</div>

							<div class="card-body form-section">

<form name="formID"
	  id="formID"
	  method="post"
	  action="customer_payments_form.php">

<div class="form-group">

	<label>
		<i class="fas fa-users form-icon"></i>
		Customer Name
	</label>

	<select name="cid"
			id="cid"
			class="form-control validate[required]">

		<option value="">Select Customer</option>

		<?php

		include('database.php');

		$sql1 = "SELECT * FROM customer_details";

		$res1 = mysqli_query($conn,$sql1);

		while($row1 = mysqli_fetch_array($res1))
		{
		?>

		<option value="<?php echo $row1['customer_id']; ?>">

			<?php echo $row1['customer_name']; ?>

		</option>

		<?php
		}
		?>

	</select>

</div>

<div class="mt-4">

	<input type="submit"
		   name="Submit"
		   value="Continue"
		   class="btn btn-success btn-custom">

	<input type="reset"
		   name="Reset"
		   value="Reset"
		   class="btn btn-danger btn-custom">

	<a href="customer_payments_view.php"
	   class="btn btn-primary btn-custom">

		<i class="fas fa-arrow-left"></i>
		Back to Payments

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