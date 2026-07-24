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
                                 Customer Order Master <small></small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Forms</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
		
            <div id="page-inner"> 
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Customer Order Master
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
<?php include('val.php');?>

<form name="formID" ID="formID" method="post" action="customer_order_master_insert.php ">
   <table width="423" height="198" border="0" align="center">
    <tr>
      <td>Date</td>
      <td><input name="date" type="date" id="date"class="form-control validate[required,custom[date]]" ></td>
    </tr>
    <tr>
      <td>Customer Id </td>
      <td> <select name="customer_id"  id="customer_id" class="form-control validate[required]" >
	  <option value="">Select a Customer </option>
	    <?php
   include ('dbconnect.php');
  $sql1=" select * from customer_details  ";
  $res1=mysqli_query($conn,$$sql1);
  while($row1=mysqli_fetch_array($res1))
  {
  ?>
     <option value="<?php echo $row1['customer_id'];?>">;<?php echo $row1['customer_name'];?></option>
  <?php
  }
  ?>
  </select> </td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="Submit" class="btn btn-success btn">
      <input type="reset" name="Reset" value="Reset" class="btn btn-danger btn"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</div>
                                <!-- /.col-lg-6 (nested) -->
                              
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel --><?php include('footer.php');?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
</body>
</html>

