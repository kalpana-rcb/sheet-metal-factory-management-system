<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<head>

<style>

	body{
		background:#eef3f9;
		font-family:'Segoe UI', sans-serif;
		padding:20px;
		color:#333;
	}

	/* ================= BUTTONS ================= */

	.no-print{
		text-align:center;
		margin-bottom:20px;
	}

	.back-btn{
		background:linear-gradient(135deg,#2563eb,#1e40af);
		color:#fff;
		padding:12px 25px;
		border-radius:8px;
		font-size:16px;
		text-decoration:none;
		display:inline-block;
		font-weight:600;
		transition:0.3s;
		box-shadow:0 5px 15px rgba(37,99,235,0.3);
	}

	.back-btn:hover{
		background:linear-gradient(135deg,#1d4ed8,#1e3a8a);
		transform:translateY(-2px);
		box-shadow:0 8px 20px rgba(37,99,235,0.4);
		color:#fff;
		text-decoration:none;
	}

	.back-arrow{
		font-size:18px;
		font-weight:bold;
		margin-right:8px;
		vertical-align:middle;
	}

	.print-btn{
		background:linear-gradient(135deg,#16a34a,#22c55e);
		color:#fff;
		border:none;
		padding:12px 25px;
		border-radius:8px;
		font-size:16px;
		cursor:pointer;
		margin-left:10px;
		font-weight:600;
		box-shadow:0 5px 15px rgba(34,197,94,0.3);
		transition:0.3s;
	}

	.print-btn:hover{
		transform:translateY(-2px);
		box-shadow:0 8px 20px rgba(34,197,94,0.4);
	}

	/* ================= RECEIPT ================= */

	.receipt-container{
		width:1000px;
		margin:auto;
		background:#fff;
		border-radius:18px;
		overflow:hidden;
		border:2px solid #0d6efd;
		box-shadow:0 10px 30px rgba(0,0,0,0.12);
	}

	.receipt-header{
		background:linear-gradient(135deg,#0d6efd,#1e3c72);
		color:#fff;
		padding:25px;
		display:flex;
		justify-content:space-between;
		align-items:center;
		border-bottom:5px solid #0ea5e9;
	}

	.shop-name{
		font-size:34px;
		font-weight:700;
		letter-spacing:1px;
	}

	.company-details{
		text-align:right;
		font-size:15px;
		line-height:1.9;
		font-weight:500;
	}

	.receipt-title{
		background:#d9f0ff;
		text-align:center;
		font-size:32px;
		font-weight:700;
		padding:15px;
		color:#1e3c72;
		border-bottom:2px solid #0d6efd;
		letter-spacing:2px;
	}

	.top-info{
		display:flex;
		justify-content:space-between;
		padding:20px;
		border-bottom:2px solid #dbeafe;
		background:#f8fbff;
	}

	.top-info div{
		font-size:16px;
		line-height:2;
		font-weight:600;
	}

	.customer-section{
		display:flex;
		border-bottom:2px solid #dbeafe;
	}

	.customer-box{
		width:50%;
		padding:25px;
		min-height:170px;
		font-size:15px;
		line-height:2;
	}

	.customer-box:first-child{
		border-right:2px solid #dbeafe;
	}

	.section-title{
		font-size:22px;
		font-weight:700;
		color:#1e3c72;
		margin-bottom:15px;
	}

	/* ================= TABLE ================= */

	table{
		width:100%;
		border-collapse:collapse;
	}

	table th{
		background:#0d6efd;
		color:#fff;
		padding:15px;
		font-size:15px;
		border:1px solid #dbeafe;
	}

	table td{
		padding:14px;
		border:1px solid #dbeafe;
		text-align:center;
		font-size:15px;
	}

	table tbody tr:nth-child(even){
		background:#f8fbff;
	}

	table tbody tr:hover{
		background:#eef6ff;
		transition:0.3s;
	}

	/* ================= TOTAL ================= */

	.total-section{
		display:flex;
		margin-top:20px;
		padding:20px;
	}

	.amount-words{
		width:60%;
		background:#f8fbff;
		padding:20px;
		border-radius:12px;
		border:1px solid #dbeafe;
		font-size:15px;
		line-height:2;
	}

	.summary-box{
		width:40%;
		padding-left:20px;
	}

	.summary-table{
		width:100%;
		border-collapse:collapse;
	}

	.summary-table td{
		padding:14px;
		font-size:16px;
		border:1px solid #dbeafe;
	}

	.summary-table tr:last-child{
		background:#0d6efd;
		color:#fff;
		font-weight:700;
		font-size:18px;
	}

	/* ================= FOOTER ================= */

	.footer-section{
		display:flex;
		margin-top:20px;
		border-top:2px solid #dbeafe;
	}

	.terms{
		width:70%;
		padding:25px;
		font-size:14px;
		line-height:2;
		border-right:2px solid #dbeafe;
	}

	.signature{
		width:30%;
		padding:20px;
		text-align:center;
		position:relative;
	}

	.signature-text{
		position:absolute;
		bottom:20px;
		width:100%;
		font-weight:700;
		color:#1e3c72;
		font-size:18px;
	}

	/* ================= PRINT ================= */

	@media print{

		.no-print{
			display:none;
		}

		body{
			background:#fff;
			padding:0;
		}

		.receipt-container{
			width:100%;
			box-shadow:none;
		}
	}

</style>

<script>

function printReceipt()
{
	window.print();
}

</script>

</head>

<body>

<!-- Buttons -->
<div class="no-print">

	<a href="bill_master_view.php" class="back-btn">

		<span class="back-arrow">&#8592;</span>
		Back to Bill Master View

	</a>

	<button onclick="printReceipt()" class="print-btn">

		Print Receipt

	</button>

</div>

<?php

include('database.php');

$bmid    = $_REQUEST["bmid"];
$dat     = $_REQUEST["dat"];
$cust_id = $_REQUEST["cust_id"];

$sql="select * from customer_details where customer_id='$cust_id'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);

?>

<div class="receipt-container">

	<!-- Header -->
	<div class="receipt-header">

		<div class="shop-name">

			SHRI SAIBABA TRADERS

		</div>

		<div class="company-details">

			<b>Mobile :</b> 9986612045 <br>

			Jamkhandi Road, No-1 School <br>

			SHIROL - 587313 <br>

			Tq: Mudhol <br>

			Dt: Bagalkot

		</div>

	</div>

	<!-- Receipt Title -->
	<div class="receipt-title">

		RECEIPT

	</div>

	<!-- Top Info -->
	<div class="top-info">

		<div>

			<b>Receipt No :</b>
			<?php echo $bmid; ?>

		</div>

		<div>

			<b>Date :</b>
			<?php echo $dat; ?>

		</div>

		<div>

			<b>Payment Type :</b>
			Cash

		</div>

	</div>

	<!-- Customer -->
	<div class="customer-section">

		<div class="customer-box">

			<div class="section-title">

				From

			</div>

			<b>SHRI SAIBABA TRADERS</b><br>

			Jamkhandi Road, No-1 School <br>

			SHIROL - 587313 <br>

			Tq: Mudhol <br>

			Dt: Bagalkot <br><br>

			<b>Phone :</b> 9986612045

		</div>

		<div class="customer-box">

			<div class="section-title">

				Bill To

			</div>

			<b>Name :</b>
			<?php echo $row["customer_name"]; ?> <br><br>

			<b>Phone :</b>
			<?php echo $row["contact_number"]; ?>

		</div>

	</div>

	<!-- Product Table -->
	<table>

		<thead>

			<tr>

				<th>Sl No</th>
				<th>Product Name</th>
				<th>Rate</th>
				<th>Quantity</th>
				<th>Discount</th>
				<th>GST</th>
				<th>Total</th>

			</tr>

		</thead>

		<tbody>

<?php

$slno=0;
$total=0;
$discount=0;
$vat=0;
$gtotal=0;

$sql3="select * from bill_details bd,
	   product p

	   where bd.product_id=p.product_id
	   and bd.bill_master_id='$bmid'";

$res3=mysqli_query($conn,$sql3);

while($row3=mysqli_fetch_array($res3))
{
	$slno++;

	$qnt  = $row3["quantity"];
	$rate = $row3["rate"];
	$dic  = $row3["discount"];

	$pname = $row3["product_name"];

	$tot = ($rate * $qnt);

	$total += $tot;
	$discount += $dic;

?>

			<tr>

				<td><?php echo $slno; ?></td>

				<td><?php echo $pname; ?></td>

				<td>Rs. <?php echo $rate; ?></td>

				<td><?php echo $qnt; ?></td>

				<td>Rs. <?php echo $dic; ?></td>

				<td>18%</td>

				<td>Rs. <?php echo $tot; ?></td>

			</tr>

<?php
}

$vat = ($total * 18) / 100;

$gtotal = ($total + $vat) - $discount;

?>

		</tbody>

	</table>

	<!-- Total Section -->
	<div class="total-section">

		<div class="amount-words">

			<b>Amount in Words :</b><br><br>

			<?php echo round($gtotal); ?> Rupees Only

		</div>

		<div class="summary-box">

			<table class="summary-table">

				<tr>

					<td><b>Total</b></td>

					<td>Rs. <?php echo $total; ?></td>

				</tr>

				<tr>

					<td><b>Discount</b></td>

					<td>Rs. <?php echo $discount; ?></td>

				</tr>

				<tr>

					<td><b>GST (18%)</b></td>

					<td>Rs. <?php echo round($vat); ?></td>

				</tr>

				<tr>

					<td><b>Grand Total</b></td>

					<td>Rs. <?php echo round($gtotal); ?></td>

				</tr>

			</table>

		</div>

	</div>

	<!-- Footer -->
	<div class="footer-section">

		<div class="terms">

			<b>Terms & Conditions :</b><br><br>

			1. Goods once sold will not be taken back.<br>

			2. Please check items before leaving the shop.<br>

			3. Thank you for your business.

		</div>

		<div class="signature">

			<div class="signature-text">

				Authorized Signature

			</div>

		</div>

	</div>

</div>

</body>
</html>