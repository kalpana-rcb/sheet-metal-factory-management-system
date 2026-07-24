<!DOCTYPE html>
<html lang="en">
<?php include('metatag.php'); ?>
<body>
	<div class="wrapper sidebar_minimize">
		<div class="main-header">
			<!-- Logo Header -->
			
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<?php include('header.php'); ?>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<?php include('sidebar.php');  ?>
<!-- Sidebar End -->
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Customer Payments</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Customer Payments</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6 col-lg-4">

<?php $customer_id=$_REQUEST['cid'];?>
<form name="formID" ID="formID" method="post" action="customer_payments_insert.php">
  <p>&nbsp;</p>
  <div align="center">
    <table width="496" height="406" border="0">
        <tr>
          <td width="162">Customer Name </td>
          <td width="146"><select name="cid" id="cid" class="form-control validate[required]" >
	     
	     <?php
include('database.php');
$sql1="select * from customer_details where customer_id='$customer_id'";
$res1=mysqli_query($conn,$sql1);
while($row1=mysqli_fetch_array($res1))
{
?>
    <option value="<?php echo $row1['customer_id'];?>"><?php echo $row1['customer_name'];?></option>
    <?php
}
?>
	      </select></td>
        </tr>
		<?php
		$bill_amount=0;
 $sql11="select * from bill_details sd, bill_master sm, product p,customer_details cd where sd.bill_master_id=sm.bill_master_id and sd.product_id=p.product_id and sm.customer_id=cd.customer_id and cd.customer_id='$customer_id'";
$res11=mysqli_query($conn,$sql11);
while($row11=mysqli_fetch_array($res11))
{
echo$quantity=$row11['quantity'];
$rate=$row11['rate'];
$discount=$row11['discount'];

$bamt=($quantity*$rate)-$discount;
$bill_amount=$bill_amount+$bamt;

}

		?>
       <?php
		$gst=($bill_amount * 18)/100;
		$bill_amount1=$bill_amount+$gst
		?>
        <tr>
          <td>Total Bill Amount </td>
          <td>&nbsp;<?php echo $bill_amount1; ?></td>
        </tr>
		
		<?php
		$paid=0;

$sql2="select * from customer_payments cp, customer_details cd where  cp.customer_id=cd.customer_id and cp.customer_id='$customer_id'";
$res2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_array($res2))
{
$paid=$paid+$row2['payment_amount'];
}

$bal=$bill_amount1-$paid;
		?>
        <tr>
          <td>Paid Amount </td>
          <td>&nbsp;<?php echo $paid; ?></td>
        </tr>
        <tr>
          <td>Balance</td>
          <td>&nbsp;<?php echo $bal; ?></td>
        </tr>
        <tr>
          <td>Payment Amount</td>
          <td><input name="pa" type="text" id="pa" class="form-control validate[required,custom[onlyNumber]]"></td>
        </tr>
        <tr>
          <td>Description</td>
          <td><textarea name="cpd" id="cpd" class="form-control validate[required]"></textarea></td>
        </tr>
        <tr>
          <td>Payment Date</td>
          <td><input name="pd" type="date" id="pd" value="<?php echo date('Y-m-d'); ?>" class="form-control validate[required,custom[date]]"></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="Submit" value="Submit" class="btn btn-success">
          <input type="reset" name="Reset" value="Reset" class="btn btn-danger"></td>
        </tr>
    </table>
  </div>
  <p>&nbsp;  </p>
</form>
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
		
		<!-- Custom template | don't include it in your project! -->
		<?php include('setting.php'); ?>
		<!-- End Custom template -->
	</div>
	<?php include('script.php'); ?>
	<?php include('val.php'); ?>
	
</body>
</html>