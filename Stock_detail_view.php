```php
<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<style>

	body{
		background:#f4f7fc;
		font-family:'Segoe UI',sans-serif;
	}

	.page-title{
		font-size:28px;
		font-weight:700;
		color:#1e3c72;
	}

	.card{
		border:none;
		border-radius:20px;
		overflow:hidden;
		box-shadow:0 10px 25px rgba(0,0,0,0.08);
		margin-bottom:25px;
	}

	.card-header{
		background:linear-gradient(135deg,#1e3c72,#2a5298);
		padding:18px 25px;
		color:#fff;
		display:flex;
		align-items:center;
		justify-content:space-between;
		flex-wrap:wrap;
	}

	.card-header h4{
		margin:0;
		font-size:24px;
		font-weight:600;
	}

	.action-bar{
		display:flex;
		gap:10px;
		flex-wrap:wrap;
	}

	.search-box{
		position:relative;
	}

	.search-box input{
		padding-left:40px;
		border-radius:10px;
		border:none;
		height:42px;
		width:250px;
	}

	.search-box i{
		position:absolute;
		top:12px;
		left:14px;
		color:#888;
	}

	.btn{
		border-radius:10px;
		font-weight:600;
		padding:10px 18px;
		border:none;
	}

	.btn-info{
		background:#0984e3;
	}

	.btn-info:hover{
		background:#086dc0;
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
		padding:15px;
		font-weight:600;
		text-align:center;
	}

	.table tbody tr:hover{
		background:#eef5ff;
		transition:0.3s;
	}

	.table td{
		padding:14px;
		text-align:center;
		vertical-align:middle;
	}

	.stock-badge{
		background:#28a745;
		color:#fff;
		padding:6px 14px;
		border-radius:20px;
		font-size:14px;
		font-weight:600;
	}

	.total-stock-card{
		background:#fff;
		border-radius:15px;
		padding:20px;
		margin-bottom:20px;
		box-shadow:0 5px 15px rgba(0,0,0,0.05);
	}

	.total-stock-card h5{
		color:#1e3c72;
		font-weight:700;
		margin:0;
	}

	.total-stock{
		font-size:30px;
		font-weight:700;
		color:#28a745;
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
						<i class="fas fa-boxes"></i>
						Stock Details
					</h4>

				</div>

<?php

include('database.php');

$search = "";

if(isset($_GET['search']))
{
	$search = $_GET['search'];
}

?>

				<!-- Total Stock Summary -->
				<div class="total-stock-card">

					<div class="row">

						<div class="col-md-6">

							<h5>
								<i class="fas fa-warehouse"></i>
								Total Available Stock
							</h5>

						</div>

						<div class="col-md-6 text-right">

<?php

$tot_stock = 0;

$sql_total = "SELECT SUM(stock) as total_stock FROM stock_details";

$res_total = mysqli_query($conn,$sql_total);

$row_total = mysqli_fetch_array($res_total);

$tot_stock = $row_total['total_stock'];

?>

							<div class="total-stock">

								<?php echo $tot_stock; ?>

							</div>

						</div>

					</div>

				</div>

				<!-- Main Card -->
				<div class="card">

					<div class="card-header">

						<h4>
							<i class="fas fa-box-open"></i>
							Stock Management
						</h4>

						<div class="action-bar">

							<!-- Search Form -->
							<form method="GET" action=""
								  class="d-flex">

								<div class="search-box">

									<i class="fas fa-search"></i>

									<input type="text"
										   name="search"
										   placeholder="Search Products..."
										   value="<?php echo $search; ?>">

								</div>

								<button type="submit"
										class="btn btn-info ml-2">

									Search

								</button>

							</form>

						</div>

					</div>

					<div class="card-body">

						<div class="table-responsive">

<table id="multi-filter-select"
	   class="display table table-striped table-hover">

	<thead>

	<tr>

		<th>ID</th>
		<th>Product Name</th>
		<th>Available Stock</th>
		<th>Edit</th>

	</tr>

	</thead>

	<tbody>

<?php

$sql = "SELECT * FROM stock_details sd,
		product pd

		WHERE sd.product_id=pd.product_id";

if($search != "")
{
	$sql .= " AND pd.product_name LIKE '%$search%'";
}

$res = mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($res))
{
?>

<tr>

	<td>

		<b>#<?php echo $row['stock_id']; ?></b>

	</td>

	<td>

		<i class="fas fa-cube"></i>

		<b><?php echo $row['product_name']; ?></b>

	</td>

	<td>

		<span class="stock-badge">

			<?php echo $row['stock']; ?>

		</span>

	</td>

	<td>

		<a href="stock_details_edit.php?s_id=<?php echo $row['stock_id'];?>"
		   class="btn btn-info">

			<i class="fas fa-edit"></i>
			Edit

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

			<?php include('footer.php'); ?>

		</div>

	</div>

</div>

<?php include('script.php'); ?>

</body>
</html>
```
