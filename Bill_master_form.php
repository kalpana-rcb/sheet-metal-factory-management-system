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
		box-shadow:0 10px 30px rgba(0,0,0,0.08);
		margin-bottom:25px;
	}

	.card-header{
		background:linear-gradient(135deg,#1e3c72,#2a5298);
		color:#fff;
		padding:18px 25px;
		font-size:22px;
		font-weight:600;
		display:flex;
		justify-content:space-between;
		align-items:center;
	}

	.bill-info{
		background:#fff;
		padding:20px;
		border-radius:15px;
		box-shadow:0 4px 12px rgba(0,0,0,0.05);
		margin-bottom:20px;
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
		padding:14px;
		font-weight:600;
		text-align:center;
	}

	.table td{
		padding:12px;
		vertical-align:middle;
		text-align:center;
	}

	.table tbody tr:hover{
		background:#eef4ff;
		transition:0.3s;
	}

	.form-control{
		border-radius:10px;
		border:1px solid #ced4da;
		padding:10px;
	}

	.btn{
		border-radius:10px;
		padding:10px 18px;
		font-weight:600;
	}

	.btn-primary{
		background:#1e3c72;
		border:none;
	}

	.btn-primary:hover{
		background:#16325c;
	}

	.btn-success{
		border:none;
	}

	.btn-info{
		border:none;
	}

	.total-box{
		background:#f8fbff;
		border-radius:15px;
		padding:20px;
		margin-top:20px;
		box-shadow:0 4px 10px rgba(0,0,0,0.05);
	}

	.total-box h5{
		font-weight:700;
		color:#1e3c72;
		margin-bottom:15px;
	}

	.total-row{
		display:flex;
		justify-content:space-between;
		margin-bottom:10px;
		font-size:16px;
	}

	.total-row span:last-child{
		font-weight:700;
		color:#000;
	}

	.action-buttons{
		margin-top:20px;
		display:flex;
		gap:10px;
	}

	.badge-bill{
		background:#17a2b8;
		color:#fff;
		padding:8px 15px;
		border-radius:30px;
		font-size:14px;
		font-weight:600;
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

<script>

function printDiv(divName)
{
	var printContents = document.getElementById(divName).innerHTML;

	var originalContents = document.body.innerHTML;

	document.body.innerHTML = printContents;

	window.print();

	document.body.innerHTML = originalContents;
}

function startCalc()
{
	interval = setInterval("calc()",1);
}

function calc()
{
	tot=(parseInt(document.formID.rate.value) * parseInt(document.formID.qnt.value));

	dic=(parseInt(document.formID.dic.value));

	t=(tot-dic);

	document.formID.total.value=t;
}

function stopCalc()
{
	clearInterval(interval);
}

</script>

<div class="main-panel">

<div class="content">

<div class="page-inner">

<div class="page-header">

	<h4 class="page-title">
		<i class="fas fa-file-invoice-dollar"></i>
		Bill Master
	</h4>

</div>

<div id="printableArea">

<div class="card">

<div class="card-header">

	<span>
		<i class="fas fa-receipt"></i>
		Premium Billing Panel
	</span>

	<a href="bill_master_view.php" class="btn btn-light">
		<i class="fas fa-arrow-left"></i>
		Back
	</a>

</div>

<div class="card-body">

<?php

include('database.php');

$bmid=$_REQUEST["bmid"];

$c_id=$_REQUEST["c_id"];

$bmi=0;

if($bmid=='')
{
	$sql="select max(bill_master_id) from bill_master";

	$res=mysqli_query($conn,$sql);

	$row=mysqli_fetch_array($res);

	$bmi=$row[0];

	$bmi=$bmi+1;
}
else
{
	$bmi=$bmid+0;
}

$dat=date('Y-m-d');

?>

<form name="formID" id="formID" method="post" action="bill_master_insert.php">

<!-- BILL INFO -->

<div class="bill-info">

<div class="row">

	<div class="col-md-4">

		<label>Bill Number</label>

		<input type="text"
			   name="bmid"
			   class="form-control"
			   value="<?php echo $bmi; ?>"
			   readonly>

	</div>

	<div class="col-md-4">

		<label>Bill Date</label>

		<input type="text"
			   name="date"
			   class="form-control"
			   value="<?php echo $dat; ?>"
			   readonly>

	</div>

	<div class="col-md-4">

		<label>Select Customer</label>

		<select name="c_id"
				id="c_id"
				class="form-control validate[required]">

			<option value="">Select Customer</option>

			<?php

			$sql1="select * from customer_details";

			$res1=mysqli_query($conn,$sql1);

			while($row1=mysqli_fetch_array($res1))
			{
				$cid=$row1["customer_id"];
			?>

			<option value="<?php echo $cid; ?>"
				<?php if($cid==$c_id) { ?> selected <?php } ?>>

				<?php echo $row1["customer_name"]; ?>

			</option>

			<?php
			}
			?>

		</select>

	</div>

</div>

</div>

<!-- PRODUCT ENTRY TABLE -->

<div class="table-responsive">

<table class="table table-bordered table-hover">

<thead>

<tr>

	<th>Select Product</th>
	<th>Rate</th>
	<th>Quantity</th>
	<th>Discount</th>
	<th>Total</th>
	<th>Action</th>

</tr>

</thead>

<tbody>

<tr>

<td>

<select name="prodcut_id"
		id="product_id"
		class="form-control validate[required]">

	<option value="">Select Product</option>

	<?php

	$sql2="select * from product";

	$res2=mysqli_query($conn,$sql2);

	while($row2=mysqli_fetch_array($res2))
	{
	?>

	<option value="<?php echo $row2["product_id"]; ?>">

		<?php echo $row2["product_name"]; ?>

	</option>

	<?php
	}
	?>

</select>

</td>

<td>

<input type="text"
	   name="rate"
	   id="rate"
	   class="form-control validate[required,custom[onlyNumber]]"
	   onFocus="startCalc();"
	   onBlur="stopCalc();">

</td>

<td>

<input type="text"
	   name="qnt"
	   id="qnt"
	   class="form-control validate[required,custom[onlyNumber]]"
	   onFocus="startCalc();"
	   onBlur="stopCalc();">

</td>

<td>

<input type="text"
	   name="dic"
	   id="dic"
	   value="0"
	   class="form-control validate[required,custom[onlyNumber]]"
	   onFocus="startCalc();"
	   onBlur="stopCalc();">

</td>

<td>

<input type="text"
	   name="total"
	   id="total"
	   class="form-control"
	   readonly>

</td>

<td>

<button type="submit"
		name="Submit"
		class="btn btn-success">

	<i class="fas fa-plus-circle"></i>
	Add Product

</button>

</td>

</tr>

</tbody>

</table>

</div>

<!-- PRODUCT LIST -->

<div class="table-responsive mt-4">

<table class="table table-striped table-hover">

<thead>

<tr>

	<th>Sl No</th>
	<th>Product Name</th>
	<th>Rate</th>
	<th>Quantity</th>
	<th>Total</th>

</tr>

</thead>

<tbody>

<?php

$slno=0;

$tot=0;

$vat=0;

$discount=0;

$total=0;

$gtotal=0;

$sql3="select * from bill_details bd, product p

		where bd.product_id=p.product_id

		and bd.bill_master_id='$bmid' ";

$res3=mysqli_query($conn,$sql3);

while($row3=mysqli_fetch_array($res3))
{
	$slno++;

	$qnt=$row3["quantity"];

	$rate=$row3["rate"];

	$dic=$row3["discount"];

	$pname=$row3["product_name"];

	$tot=($rate*$qnt);

	$discount=$discount+$dic;

	$total=$total+$tot;

	$vat=($total*18)/118;

	$gtotal=($total+$vat)-$discount;

?>

<tr>

	<td>
		<span class="badge-bill">
			<?php echo $slno; ?>
		</span>
	</td>

	<td><?php echo $pname; ?></td>

	<td>&#8377; <?php echo $rate; ?></td>

	<td><?php echo $qnt; ?></td>

	<td><b>&#8377; <?php echo $tot; ?></b></td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

<!-- TOTAL BOX -->

<div class="total-box">

<h5>
	<i class="fas fa-calculator"></i>
	Bill Summary
</h5>

<div class="total-row">
	<span>Total Amount</span>
	<span>&#8377; <?php echo $total; ?></span>
</div>

<div class="total-row">
	<span>Total Discount</span>
	<span>&#8377; <?php echo $discount; ?></span>
</div>

<div class="total-row">
	<span>GST 18%</span>
	<span>&#8377; <?php echo round($vat); ?></span>
</div>

<hr>

<div class="total-row" style="font-size:20px;">

	<span>Grand Total</span>
	<span style="color:#28a745;">
		&#8377; <?php echo round($gtotal); ?>
	</span>
</div>

</div>

<!-- ACTION BUTTONS -->

<div class="action-buttons">

<button type="button"
		onclick="printDiv('printableArea')"
		class="btn btn-info">

	<i class="fas fa-print"></i>
	Print Bill

</button>

<a href="bill_master_view.php"
   class="btn btn-primary">

	<i class="fas fa-arrow-left"></i>
	Back to Bill View

</a>

</div>

</form>

</div>

</div>

</div>

</div>

<?php include('footer.php'); ?>

</div>

</div>

</div>

<?php include('script.php'); ?>
<?php include('val.php'); ?>

</body>
</html>