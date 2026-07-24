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
          <h1><i class="fa fa-edit"></i> Customer Order Details</h1>
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
$cod_id=$_REQUEST['cod_id'];
$sql="select * from customer_order_details  where customer_order_details_id='$cod_id' ";
$res=mysqli_query($conn,$$sql);
$row=mysqli_fetch_array($res);
?>
<form name="form1" ID="formID" method="post" action="customer_order_details_updatet.php">
<input type="hidden" name="cod_id" value="<?php echo $row['customer_order_details_id'];?>">

     <table width="423" height="198" border="0" align="center">
    <tr>
      <td>Customer Order Master  </td>
    <td>  <select name="customer_order_master_id" class="form-control validate[required]"  id="customer_order_master_id" >
	   <option value="">Select a Customer Order Master</option>
	   <?php
    include('dbconnect.php');
  $sql1=" select * from customer_order_master";
  $res1=mysqli_query($conn,$$sql1);
  while($row1=mysqli_fetch_array($res1))
  {
  ?>
    <option value="<?php echo $row1['customer_order_master_id']?>"<?php if($row1['customer_order_master_id']==$row['customer_order_master_id']){?> selected <?php } ?>><?php echo $row1['date'];?></option>
	<?php
	}
	?>
  </select></td>
    </tr>
    <td>Product</td>
      <td>
	  <select name="product_id" id="product_id" class="form-control validate[required]">  
	  <option value="">Select a Product</option>
	    <?php
 
  $sql1=" select * from product_details ";
  $res1=mysqli_query($conn,$$sql1);
  while($row1=mysqli_fetch_array($res1))
  {
  ?>
  <option value="<?php echo $row1['product_id'];?>"<?php if($row1['product_id']==$row['product_id']){?> selected <?php } ?>><?php echo $row1['product_name'];?></option>
  <?php
  }
  ?>
	  </select>
    </tr>
    <tr>
      <td>Quantity      </td>
      <td><input name="quantity" type="text" id="quantity" class="form-control validate[required,custom[onlyNumber]]" value="<?php echo $row['quantity'];?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="Submit" class="btn btn-success btn">
      <input type="reset" name="Reset" value="Reset" class="btn btn-danger btn"></td>
    </tr>
  </table>
  <p>&nbsp;</p>

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