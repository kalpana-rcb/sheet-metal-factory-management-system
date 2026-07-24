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
<?php include('cal.php'); ?>
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
Customer Order Details								</div>
						  <form name="form1" method="post" role="form" action="date_customer_order_master_view.php" id="formID">

                                           <table class="table table-striped table-bordered table-hover">
         <tr>
           <td><label>Select From Date</label></td>
           <td><input type="date" name="date1"></td>
           <td>&nbsp;</td>
           <td><label>Select To Date</label></td>
           <td><input type="date" name="date2"></td>
         </tr>
         <tr>
           <td colspan="4"><label><button type="submit" class="btn btn-primary">Search</button></label></td>
           <td>&nbsp;</td>
         </tr>
       </table>
</form>
<?php
$date1=$_REQUEST['date1'];
$date2=$_REQUEST['date2'];

?>
<b>From Date : <font color="#0000FF"><?php echo $date1; ?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Date : <font color="#0000FF"><?php echo $date2; ?></font>&nbsp;</b>

								
								<div class="card-body">
									<div class="table-responsive">
										<table id="multi-filter-select" class="display table table-striped table-hover" >
											<thead>
												<tr>
    <th>ID</th>
    <th>Date</th>
    <th>Customer Name </th>
    <th>More</th>
    <th>Delete</th>
  </tr>
    </thead>
  <tbody>
   <?php
   include('database.php');
  $sql=" select * from customer_order_master com,customer_details cd where com.customer_id=cd.customer_id and date between '$date1' and '$date2'";
  $res=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($res))
  {
  ?>
  <tr>
    <td>&nbsp;<?php echo $row['customer_order_master_id'];?></td>
    <td>&nbsp;<?php echo $row['date'];?></td>
    <td>&nbsp;<?php echo $row['customer_name'];?></td>
    <td>&nbsp;<a href="customer_order_master_more.php?pmid=<?php echo $row['customer_order_master_id'];?>&c_id=<?php echo $row['customer_id'];?>" class="btn btn-info" >More</a></td>
    <td>&nbsp;<a href="customer_order_master_delete.php?com_id=<?php echo $row['customer_order_master_id'];?>"onClick="return confirm('Are you sure want to delete')"class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a></td>
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