<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<style>

	body{
		background:linear-gradient(135deg,#eef2ff,#f8fbff);
		font-family:'Segoe UI',sans-serif;
	}

	.page-title{
		font-size:30px;
		font-weight:700;
		color:#1e3c72;
	}

	.card{
		border:none;
		border-radius:22px;
		overflow:hidden;
		box-shadow:0 15px 35px rgba(0,0,0,0.08);
		margin-bottom:25px;
		background:#fff;
	}

	.card-header{
		background:linear-gradient(135deg,#1e3c72,#2a5298);
		color:#fff;
		padding:22px 30px;
		display:flex;
		align-items:center;
		justify-content:space-between;
		flex-wrap:wrap;
	}

	.card-title{
		font-size:26px;
		font-weight:700;
		margin:0;
		letter-spacing:0.5px;
	}

	.premium-back-btn{
		background:linear-gradient(135deg,#ffffff,#f1f5ff);
		color:#1e3c72;
		padding:12px 22px;
		border-radius:14px;
		font-weight:700;
		text-decoration:none;
		transition:0.3s ease;
		box-shadow:0 6px 18px rgba(0,0,0,0.12);
		border:1px solid #dbe4ff;
		font-size:15px;
	}

	.premium-back-btn:hover{
		background:linear-gradient(135deg,#eff6ff,#dbeafe);
		color:#1e3c72;
		text-decoration:none;
		transform:translateY(-3px);
		box-shadow:0 10px 20px rgba(30,60,114,0.15);
	}

	.form-section{
		background:#fff;
		padding:35px;
		border-radius:18px;
		box-shadow:0 6px 15px rgba(0,0,0,0.05);
		border:1px solid #edf2ff;
	}

	label{
		font-weight:600;
		color:#1e3c72;
		margin-bottom:10px;
		font-size:15px;
	}

	.form-control{
		border-radius:14px;
		height:50px;
		border:1px solid #d9e2f2;
		padding-left:15px;
		font-size:15px;
		box-shadow:none;
		transition:0.3s;
	}

	.form-control:focus{
		border-color:#2a5298;
		box-shadow:0 0 12px rgba(42,82,152,0.15);
	}

	.btn{
		padding:12px 22px;
		border-radius:12px;
		font-weight:600;
		border:none;
		transition:0.3s;
		font-size:15px;
	}

	.btn:hover{
		transform:translateY(-2px);
		box-shadow:0 8px 18px rgba(0,0,0,0.1);
	}

	.btn-success{
		background:linear-gradient(135deg,#16a34a,#22c55e);
		color:#fff;
	}

	.action-buttons{
		margin-top:25px;
		display:flex;
		gap:12px;
		flex-wrap:wrap;
	}

	.stock-icon{
		font-size:75px;
		color:#1e3c72;
		margin-bottom:18px;
	}

	.page-description{
		color:#64748b;
		font-size:15px;
		margin-bottom:30px;
	}

	.form-group{
		margin-bottom:22px;
	}

	.premium-badge{
		background:linear-gradient(135deg,#2563eb,#3b82f6);
		color:#fff;
		padding:8px 18px;
		border-radius:30px;
		font-size:13px;
		font-weight:600;
		display:inline-block;
		margin-bottom:15px;
		box-shadow:0 4px 12px rgba(37,99,235,0.2);
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

								<div class="card-title">

									<i class="fas fa-edit"></i>
									Edit Stock Details

								</div>

								<a href="Stock_detail_view.php"
								   class="premium-back-btn">

									<i class="fas fa-arrow-circle-left"></i>
									Back to Stock Details View

								</a>

							</div>

							<div class="card-body">

<?php include('val.php'); ?>

<?php

include('database.php');

$s_id = $_REQUEST['s_id'];

$sql = "SELECT * FROM stock_details WHERE stock_id='$s_id' ";

$res = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($res);

?>

<div class="row justify-content-center">

<div class="col-md-7">

<div class="form-section">

<div class="text-center">

	<div class="premium-badge">
		Premium Stock Management
	</div>

	<i class="fas fa-warehouse stock-icon"></i>

	<h3 style="font-weight:700;color:#1e3c72;">
		Update Stock Information
	</h3>

	<p class="page-description">
		Easily manage and update your product inventory details using the premium stock editor.
	</p>

</div>

<form name="formID"
	  id="formID"
	  method="post"
	  action="Stock_detail_update.php">

<input type="hidden"
	   name="s_id"
	   value="<?php echo $row['stock_id'];?>">

<div class="form-group">

	<label>
		<i class="fas fa-cube"></i>
		Select Product
	</label>

	<select name="product_id"
			id="product_id"
			class="form-control validate[required]">

		<option value="">
			Select a Product
		</option>

<?php

include('dbconnect.php');

$sql1 = "SELECT * FROM product";

$res1 = mysqli_query($conn,$sql1);

while($row1 = mysqli_fetch_array($res1))
{
?>

<option value="<?php echo $row1['product_id'];?>"

<?php if($row1['product_id']==$row['product_id']) { ?>

	selected

<?php } ?>>

	<?php echo $row1['product_name'];?>

</option>

<?php
}
?>

	</select>

</div>

<div class="form-group">

	<label>
		<i class="fas fa-layer-group"></i>
		Available Stock
	</label>

	<input name="stock"
		   type="text"
		   class="form-control validate[required,custom[onlyNumber]]"
		   id="stock"
		   value="<?php echo $row['stock'];?>"
		   placeholder="Enter Stock Quantity">

</div>

<div class="action-buttons">

	<button type="submit"
			name="Submit"
			class="btn btn-success">

		<i class="fas fa-save"></i>
		Update Stock

	</button>

</div>

</form>

</div>

</div>

</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

<?php include('footer.php'); ?>

	</div>

	<!-- Custom template -->
	<?php include('setting.php'); ?>
	<!-- End Custom template -->

</div>

<?php include('script.php'); ?>
<?php include('val.php'); ?>

</body>
</html>