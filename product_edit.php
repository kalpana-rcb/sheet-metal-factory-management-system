<!DOCTYPE html>
<html lang="en">
<?php include('metatag.php'); ?>

<style>
	body {
		background: #f4f7fb;
		font-family: 'Segoe UI', sans-serif;
	}

	.card {
		border: none;
		border-radius: 18px;
		box-shadow: 0 6px 18px rgba(0,0,0,0.08);
		overflow: hidden;
	}

	.card-header {
		background: linear-gradient(135deg, #1e3c72, #2a5298);
		color: #fff;
		padding: 20px;
		border-bottom: none;
	}

	.card-title {
		font-size: 24px;
		font-weight: 600;
		margin: 0;
	}

	.form-control {
		border-radius: 10px;
		height: 45px;
		border: 1px solid #dcdcdc;
		box-shadow: none;
		transition: 0.3s;
	}

	.form-control:focus {
		border-color: #2a5298;
		box-shadow: 0 0 8px rgba(42,82,152,0.3);
	}

	label {
		font-weight: 600;
		color: #333;
		margin-bottom: 8px;
	}

	.btn-custom {
		padding: 10px 22px;
		border-radius: 10px;
		font-weight: 600;
		transition: 0.3s;
	}

	.btn-success:hover {
		transform: translateY(-2px);
		box-shadow: 0 4px 10px rgba(40,167,69,0.3);
	}

	.btn-danger:hover {
		transform: translateY(-2px);
		box-shadow: 0 4px 10px rgba(220,53,69,0.3);
	}

	.btn-primary:hover {
		transform: translateY(-2px);
		box-shadow: 0 4px 10px rgba(0,123,255,0.3);
	}

	.page-title {
		font-weight: bold;
		color: #1e3c72;
	}

	.form-section {
		padding: 30px;
	}
</style>

<body>
	<div class="wrapper sidebar_minimize">

		<div class="main-header">
			<?php include('header.php'); ?>
		</div>

		<!-- Sidebar -->
		<?php include('sidebar.php'); ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">

					<div class="page-header">
						<h4 class="page-title">Product Details</h4>
					</div>

					<div class="row justify-content-center">
						<div class="col-md-8">

							<div class="card">

								<div class="card-header">
									<h4 class="card-title">
										<i class="fa fa-box"></i> Update Product
									</h4>
								</div>

								<div class="card-body form-section">

<?php
include('database.php');

$p_id = $_REQUEST['p_id'];

$sql = "SELECT * FROM product WHERE product_id='$p_id'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);
?>

<form name="formID" id="formID" method="post" action="product_update.php">

	<input type="hidden" value="<?php echo $row['product_id']; ?>" name="p_id">

	<div class="form-group">
		<label>Product Name</label>
		<input 
			name="pn" 
			type="text" 
			id="pn"
			value="<?php echo $row['product_name']; ?>" 
			class="form-control validate[required,custom[onlyLetter]]"
			placeholder="Enter Product Name">
	</div>

	<div class="form-group">
		<label>Rate</label>
		<input 
			name="pr" 
			type="text" 
			id="pr"
			value="<?php echo $row['rate']; ?>" 
			class="form-control validate[required,custom[onlyNumber]]"
			placeholder="Enter Product Rate">
	</div>

	<div class="mt-4">

		<input 
			type="submit" 
			name="Submit" 
			value="Update Product" 
			class="btn btn-success btn-custom">

		<input 
			type="reset" 
			name="Reset" 
			value="Reset" 
			class="btn btn-danger btn-custom">

		<a href="product_view.php" class="btn btn-primary btn-custom">
			<i class="fa fa-arrow-left"></i> Back to Products
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