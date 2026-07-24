<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <?php include('metadata.php');?>
 <?php include('header.php');?>
 <?php include('sidebar.php');?>
</head>
<body>
   
        <!--/. NAV TOP  -->
     
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Bill Details <small></small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Tables</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
		
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bill Details Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
							<a href="bill_detail_form.php" class="btn btn-primary">Add New Details</a>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
    <td>ID</td>
    <td>Bill Master Id </td>
    <td>Product Id </td>
    <td>Quantity</td>
    <td>Rate</td>
    <td>Discount</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>
  </thead>
  <tbody>
  <?php
  include('dbconnect.php');
  $sql="select * from bill_details bd,bill_master bm,product_details  pd where bd.bill_master_id=bm.bill_master_id and bd.product_id=pd.product_id
  ";
  $res=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($res))
  {
  ?>
  
  <tr>
    <td>&nbsp;<?php echo $row['bill_details_id'];?></td>
    <td>&nbsp;<?php echo $row['bill_master_id'];?></td>
    <td>&nbsp;<?php echo $row['product_id'];?></td>
    <td>&nbsp;<?php echo $row['quantity'];?></td>
    <td>&nbsp;<?php echo $row['rate'];?></td>
    <td>&nbsp;<?php echo $row['discount'];?></td>
    <td>&nbsp;<a href="bill_details_edit.php?bd_id=<?php echo $row['bill_details_id'];?>"class="btn btn-info"><i class="fas fa-edit"></i> Edit</a></td>
    <td>&nbsp;<a href="bill_details_edit.php?bd_id=<?php echo $row['bill_details_id'];?>"onClick="return confirm('Are you sure want to delete')"><img src="../image/delete.png" width="30" height="30">"</a></td>
  </tr>
  <?php
  }
  ?>
</tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
           <?php include('footer.php');?>
          </body>
</html>
