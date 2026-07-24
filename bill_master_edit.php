<!DOCTYPE html>
<html lang="en">
  <?php include('meta_tag.php');?>
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
  <?php include('header.php');?>
    <!-- Sidebar menu-->
    <?php include('sidebar.php'); ?> <?php include('cal.php'); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Bill Master</h1>
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
<?php include('val.php');?><?php
include('dbconnect.php');
$bm_id=$_REQUEST['bm_id'];
$sql="select * from bill_master where bill_master_id='$bm_id' ";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
?>
<form name="formID" ID="formID" method="post" action="bill_masterl_update.php">
<input type="hidden" name="bm_id" value="<?php echo $row['bill_master_id'];?>">

    <table width="423" height="198" border="0" align="center">
    <tr>
      <td colspan="2">Bill Master </td>
    </tr>
    <tr>
      <td>Bill Date </td>
      <td><?php					
      $date_default = "";
     
      if(isset($row['bill_date']))
      {
        $date_default =$row['bill_date'];
      }
      else
      {
         $date_default =date('Y-m-d');
      }



	  $myCalendar = new tc_calendar("bill_date", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d', strtotime($date_default))
            , date('m', strtotime($date_default))
            , date('Y', strtotime($date_default)));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(1900, date('Y'));
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->writeScript();	  
	  ?>	</td>
    </tr>
    <tr>
      <td>Customer  </td>
      <td> <select name="customer_id"  id="customer_id" class="form-control validate[required]">
	  <option value="">Select a customer</option>
	   <?php
  include('dbconnect.php');
  $sql1=" select * from customer_details ";
  $res1=mysqli_query($conn,$sql1);
  while($row1=mysqli_fetch_array($res1))
  {
  ?>
   <option value="<?php echo $row1['customer_id'];?>"<?php if($row1['customer_id']==$row['customer_id']){?> selected <?php } ?>><?php echo $row1['customer_name'];?></option>
  <?php
  }
  ?>
  </select></td>
    </tr>
    <tr>
      <td>Other Charges </td>
      <td><input name="other_charges" type="text" id="other_charges" value="<?php echo $row['other_charges'];?>" class="form-control validate[required,custom[onlyNumber]]"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="Submit" class="btn btn-success btn">      <input type="reset" name="Reset" value="Reset" class="btn btn-success btn"></td>
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