<!DOCTYPE html>
<html lang="en">
<?php include('metatag.php'); ?>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			
			<!-- End Logo Header -->

			<!-- Navbar Header -->
<?php include('header.php'); ?>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
<?php include('sidebar.php'); ?>
<!-- Sidebar End -->
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Customer Order Details</h4>
						
					</div>
					

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
<a href="Customer_Order_details_form.php" class="btn btn-primary">Add New Details</a>							</div>
								<div class="card-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>

    <td width="63"> ID </td>
    <td width="97">Customer Name </td>
    <td width="81">Product Name </td>
    <td width="64">Quantity</td>
    <td width="52">Edit</td>
    <td width="49">Delete</td>
  </tr>
    </thead>
  <tbody>
   <?php
  include('database.php');

  $sql=" select * from customer_order_details cod,customer_order_master com,product	 pd , customer_details cd where cod.customer_order_master_id=com.customer_order_master_id and cod.product_id=pd.product_id and com.customer_id=cd.customer_id";
  $res=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($res))
  {
 
  ?>
  <tr>
    <td>&nbsp;<?php echo $row['customer_order_details_id'];?></td>
    <td>&nbsp;<?php echo $row['customer_name'];?></td>
    <td>&nbsp;<?php echo $row['product_name'];?></td>
    <td>&nbsp;<?php echo $row['quantity'];?></td>
    <td>&nbsp;<a href="customer_order_details_edit.php?cod_id=<?php echo $row['customer_order_details_id'];?>" class="btn btn-info">Edit</a></td>
    <td>&nbsp;<a href="customer_order_details_delete.php?cod_id=<?php echo $row['customer_order_details_id'];?>"onClick="return confirm('Are you sure want to delete')"class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a></td>
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

						
				
			</div>
			<?php include('footer.php'); ?>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<?php //include('setting.php'); ?>
		</div>
		<!-- End Custom template -->
	</div>
	<?php include('script.php'); ?>
</body>
</html>