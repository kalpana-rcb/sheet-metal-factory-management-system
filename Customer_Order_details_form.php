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
						<h4 class="page-title">Customer Order Details</h4>
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
									<div class="card-title">Customer Order Details</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6 col-lg-4"> 	
<?php include('val.php');?>
<form name="formID" ID="formID" method="post" action="customer_order_detail_insert.php">
     <table width="423" height="198" border="0" align="center">
    <tr>
       <td>Customer Order Master  </td>
      <td> <select name="customer_order_master_id"  id="customer_order_master_id"  class="form-control validate[required]">
	   <option value="">Select a Customer Order Master</option>
	   <?php
    include('dbconnect.php');
  $sql1=" select * from customer_order_master";
  $res1=mysqli_query($conn,$$sql1);
  while($row1=mysqli_fetch_array($res1))
  {
  ?>
    <option value="<?php echo $row1['customer_order_master_id'];?>"><?php echo $row1['date'];?></option>
	<?php
	}
	?>
  </select> </td>
    </tr>
    <tr>
      <td>Product</td>
      <td>
	  <select name="product_id" id="product_id" class="form-control validate[required]">  
	  <option value="">Select a Product</option>
	    <?php
    include('dbconnect.php');
  $sql1=" select * from product_details ";
  $res1=mysqli_query($conn,$$sql1);
  while($row1=mysqli_fetch_array($res1))
  {
  ?>
  <option value="<?php echo $row1['product_id'];?>"><?php echo $row1['product_name'];?></option>
  <?php
  }
  ?>
	  </select>
    </tr>
    <tr>
      <td>Quantity      </td>
      <td><input name="quantity" type="text" id="quantity" class="form-control validate[required,custom[onlyNumber]]"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="Submit" class="btn btn-success btn">
      <input type="reset" name="Reset" value="Reset" class="btn btn-danger btn"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
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