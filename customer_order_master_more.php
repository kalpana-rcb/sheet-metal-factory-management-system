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
		box-shadow:0 8px 20px rgba(0,0,0,0.08);
		overflow:hidden;
		margin-bottom:25px;
	}

	.card-header{
		background:linear-gradient(135deg,#1e3c72,#2a5298);
		color:#fff;
		padding:18px 25px;
		font-size:22px;
		font-weight:600;
	}

	.customer-box{
		background:#fff;
		padding:20px;
		border-radius:15px;
		box-shadow:0 3px 10px rgba(0,0,0,0.05);
		margin-bottom:20px;
	}

	.table thead{
		background:#1e3c72;
		color:#fff;
	}

	.table th{
		padding:14px;
		font-size:15px;
	}

	.table td{
		padding:12px;
		vertical-align:middle;
	}

	.table tbody tr:hover{
		background:#f1f5ff;
		transition:0.3s;
	}

	.btn{
		border-radius:10px;
		font-weight:600;
		padding:8px 15px;
	}

	.badge-status{
		padding:8px 14px;
		border-radius:20px;
		font-size:13px;
		font-weight:600;
		color:#fff;
		display:inline-block;
	}

	.pending{
		background:#f0ad4e;
	}

	.confirmed{
		background:#28a745;
	}

	.nostock{
		background:#dc3545;
	}

	.info-title{
		font-weight:600;
		color:#1e3c72;
	}

	.bill-box{
		background:#f8f9fa;
		padding:15px;
		border-radius:12px;
		margin-bottom:15px;
		border-left:5px solid #1e3c72;
	}

	.action-btns .btn{
		margin:2px;
	}

	.back-btn{
		float:right;
	}

	.form-control{
		border-radius:10px;
		height:42px;
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
						<i class="fas fa-shopping-cart"></i>
						Customer Order Details
					</h4>

					<a href="customer_order_master_view.php"
					   class="btn btn-primary back-btn">

						<i class="fas fa-arrow-left"></i>
						Back to Orders

					</a>

				</div>

<?php

include('database.php');

$pmid=$_REQUEST["pmid"];
$cust_id=$_REQUEST["c_id"];

$contact_number=$_REQUEST['contact_number'];

$customer_name=$_REQUEST['customer_name'];

$pmi=0;

if($pmid=='')
{
	$sql="select max(customer_order_master_id) from customer_order_master";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($res);

	$pmi=$row[0]+1;
}
else
{
	$pmi=$pmid+0;
}

$dat=date('Y-m-d');

?>

<!-- Customer Info Card -->
<div class="card">

	<div class="card-header">

		<i class="fas fa-user"></i>
		Order Information

	</div>

	<div class="card-body">

<form name="formID"
	  id="formID"
	  method="post"
	  action="customer_order_master_insert.php">

<div class="row">

	<div class="col-md-6">

		<div class="bill-box">

			<div class="info-title">
				<i class="fas fa-file-invoice"></i>
				Bill Number
			</div>

			<input name="pmid"
				   type="text"
				   class="form-control mt-2"
				   value="<?php echo $pmi; ?>"
				   readonly>

		</div>

	</div>

	<div class="col-md-6">

		<div class="bill-box">

			<div class="info-title">
				<i class="fas fa-calendar"></i>
				Order Date
			</div>

			<input name="date"
				   type="text"
				   class="form-control mt-2"
				   value="<?php echo $dat; ?>">

		</div>

	</div>

	<div class="col-md-6">

		<div class="bill-box">

			<div class="info-title">
				<i class="fas fa-user-circle"></i>
				Customer Name
			</div>

			<select name="customer_id"
					id="customer_id"
					class="form-control mt-2">

<?php

$sql1="select * from customer_details where customer_id='$cust_id'";

$res1=mysqli_query($conn,$sql1);

while($row1=mysqli_fetch_array($res1))
{
?>

<option value="<?php echo $row1["customer_id"]; ?>">

	<?php echo $row1["customer_name"]; ?>

</option>

<?php
}
?>

			</select>

		</div>

	</div>

	<div class="col-md-6">

		<div class="bill-box">

			<div class="info-title">
				<i class="fas fa-phone"></i>
				Contact Number
			</div>

			<input type="text"
				   class="form-control mt-2"
				   value="<?php echo $contact_number; ?>"
				   readonly>

		</div>

	</div>

</div>

</form>

	</div>

</div>

<!-- Order Table -->
<div class="card">

	<div class="card-header">

		<i class="fas fa-box"></i>
		Order Product Details

	</div>

	<div class="card-body">

<div class="table-responsive">

<table class="table table-bordered table-hover">

	<thead>

	<tr>

		<th>Sl No</th>
		<th>Product Name</th>
		<th>Quantity</th>
		<th>Status</th>
		<th>No Stock</th>
		<th>Confirm</th>
		<th>Delete</th>

	</tr>

	</thead>

	<tbody>

<?php

$slno=0;

$sql3="select * from customer_order_details pd,
		product p

		where pd.product_id=p.product_id
		and pd.customer_order_master_id='$pmid'";

$res3=mysqli_query($conn,$sql3);

while($row3=mysqli_fetch_array($res3))
{

	$slno++;

	$pur_id=$row3["customer_order_master_id"];

	$pid=$row3["product_id"];

	$qnt=$row3["quantity"];

	$pname=$row3["product_name"];

?>

<tr>

	<td><?php echo $slno; ?></td>

	<td>

		<i class="fas fa-cube"></i>
		<?php echo $pname; ?>

	</td>

	<td>

		<span class="badge badge-info">
			<?php echo $qnt; ?>
		</span>

	</td>

	<td>

<?php
$status = $row3["cust_order_status"];

if($status=='Pending')
{
	echo '<span class="badge-status pending">Pending</span>';
}
elseif($status=='Confirmed')
{
	echo '<span class="badge-status confirmed">Confirmed</span>';
}
else
{
	echo '<span class="badge-status nostock">No Stock</span>';
}
?>

	</td>

	<td class="action-btns">

		<a href="order_not_confirm.php?cod_id=<?php echo $row3["customer_order_details_id"]; ?>&pmid=<?php echo $pmid; ?>&cust_id=<?php echo $cust_id; ?>&contact_number=<?php echo $contact_number; ?>&customer_name=<?php echo $customer_name; ?>"
		   class="btn btn-warning btn-sm">

			<i class="fas fa-times-circle"></i>
			No Stock

		</a>

	</td>

	<td class="action-btns">

		<a href="order_confirm.php?cod_id=<?php echo $row3["customer_order_details_id"]; ?>&pmid=<?php echo $pmid; ?>&cust_id=<?php echo $cust_id; ?>"
		   class="btn btn-success btn-sm">

			<i class="fas fa-check-circle"></i>
			Confirm

		</a>

	</td>

	<td class="action-btns">

		<a href="customer_order_details_delete.php?pur_id=<?php echo $pur_id; ?>&pmid=<?php echo $pmid; ?>&cust_id=<?php echo $cust_id; ?>&p_id=<?php echo $pid; ?>&qnt=<?php echo $qnt; ?>"
		   class="btn btn-danger btn-sm"
		   onclick="return confirm('Are you sure want to delete?')">

			<i class="fas fa-trash"></i>
			Delete

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