<!DOCTYPE html>
<html lang="en">
  <?php include('meta_tag.php');?>
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
  <?php include('header.php');?>
    <!-- Sidebar menu-->
    <?php include('sidebar.php'); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Employee Details</h1>
          <p>form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><A href="home.php"><i class="fa fa-home fa-lg"></i></A></li>
        
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <br/>
            <div class="tile-body">
<?php include('val.php');?>
<?php
include('dbconnect.php');
$bd_id=$_REQUEST['bd_id'];
$sql="select * from bill_details where bill_details_id='$bd_id' ";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
?>
<form name="formID" ID="formID"  method="post" action="bill_detail_update.php">
<input type="hidden" name="bd_id" value="<?php echo $row['bill_details_id'];?>">
     <table width="453" height="220" border="0" align="center">
    <tr>
      <td colspan="2">Bill Details </td>
    </tr>
    <tr>
        <td>Bill Master</td>
      <td><select name="bill_master_id" id="bill_master_id" class="form-control validate[required]">  
	  <option value="">Select a Bill</option>
	    <?php
		 include('dbconnect.php');
  $sql1=" select * from bill_master ";
  $res1=mysqli_query($conn,$sql1);
  while($row1=mysqli_fetch_array($res1))
  {
  ?>
  <option value="<?php echo $row1['bill_master_id'];?>"<?php if($row1['bill_master_id']==$row['bill_master_id']){?> selected <?php } ?>>;<?php echo $row1['bill_date'];?></option>
  <?php
  }
  ?>
	  </select>
	  </td>
    <tr>
       <td>Product</td>
      
	 <td> <select name="product_id" id="product_id" class="form-control validate[required]">  
	  <option value="">Select a Product</option>
	    <?php
  include('dbconnect.php');
  $sql1=" select * from product_details ";
  $res1=mysqli_query($conn,$sql1);
  while($row1=mysqli_fetch_array($res1))
  {
  ?>
  <option value="<?php echo $row1['product_id'];?>"<?php if($row1['product_id']==$row['product_id']){?> selected <?php } ?>>;<?php echo $row1['product_name'];?></option>
  <?php
  }
  ?>
	  </select>
	  </td>
    </tr>
    <tr>
      <td>Quantity</td>
      <td><input name="quantity" type="text" id="quantity" value="<?php echo $row['quantity'];?>" class="form-control validate[required,custom[onlyNumber]]"></td>
    </tr>
    <tr>
      <td>Rate</td>
      <td><input name="rate" type="text" id="rate" value="<?php echo $row['rate'];?>" class="form-control validate[required,custom[onlyNumber]]"></td>
    </tr>
    <tr>
      <td>Discount</td>
      <td><input name="discount" type="text" id="discount" value="<?php echo $row['discount'];?>" class="form-control validate[required,custom[onlyNumber]]"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="Submit" class="btn btn-success btn">
      <input type="reset" name="Reset" value="Reset" class="btn btn-danger btn"></td>
    </tr>
  </table>
</form>
 </div>

           
          </div>
        </div>
        
       
    </main>
    <!-- Essential javascripts for application to work-->
<?php include('script.php');?>
<?php include('val.php');?>
  </body>
</html>