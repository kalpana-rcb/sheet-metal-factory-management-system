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
					  <li><a href="#">Forms</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
		
            <div id="page-inner"> 
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Bill Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
								<?php include('val.php');?>
<form name="formID" ID="formID"  method="post" action="bill_detail_insert.php" >
        <table width="423" height="198" border="0" align="center">
    <tr>
      <td width="131" height="45">Bill Master</td>
     <td width="312"> <select name="bill_master_id" id="bill_master_id" class="form-control validate[required]">  
	  <option value="">Select a Bill</option>
	    <?php
  include('dbconnect.php');
  $sql1=" select * from bill_master ";
  $res1=mysqli_query($conn,$sql1);
  while($row1=mysqli_fetch_array($res1))
  {
  ?>
  <option value="<?php echo $row1['bill_master_id'];?>"><?php echo $row1['bill_date'];?></option>
  <?php
  }
  ?>
	  </select>
	     </td>
    </tr>
    <tr>
      <td height="50">Product</td>
      <td>
	  <select name="product_id" id="product_id" class="form-control  validate[onlyNumber]">  
	  <option value="">Select a Product</option>
	    <?php
    include('dbconnect.php');
  $sql1=" select * from product_details ";
  $res1=mysqli_query($conn,$sql1);
  while($row1=mysqli_fetch_array($res1))
  {
  ?>
  <option value="<?php echo $row1['product_id'];?>"><?php echo $row1['product_name'];?></option>
  <?php
  }
  ?>
	  </select>
	  </td>
    </tr>
    <tr>
      <td height="53">Quantity        </td>
      <td><input name="quantity" type="text" id="quantity" class="form-control validate[required,custom[onlyNumber]]"></td>
    </tr>
    <tr>
      <td height="46">Rate</td>
      <td><input name="rate" type="text" id="rate" class="form-control validate[required,custom[onlyNumber]]"></td>
    </tr>
    <tr>
      <td height="68">Discount</td>
      <td><input name="discount" type="text" id="discount" class="form-control validate[required,custom[onlyNumber]]"></td>
    </tr>
    <tr>
      <td height="63" colspan="2"><input type="submit" name="Submit" value="Submit" class="btn btn-success btn">
      <input type="reset" name="Reset" value="Reset" class="btn btn-danger"></td>
    </tr>
  </table>
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
