<!DOCTYPE html>
<html lang="en">
  <head>
<?php include('meta_tag.php');?>
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
<?php include('header.php');?>
    <!-- Sidebar menu-->
<?php include('sidebar.php');?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Month Production Details </h1>
          <p>Details</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="home.php"?><i class="fa fa-home fa-lg"></i> </a></li>
          
        </ul>
      </div>
	 <a href="productioon_form.php" class="btn btn-primary">Add New Details</a>
	 
	 
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
			 <a href="today_production_view.php" class="btn btn-primary">Today Prodction</a>
			  <a href="month_production_view.php" class="btn btn-primary">Month Prodction</a><hr/>
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>

    <td>Id</td>
    <td>Product Name </td>
    <td>Total Production </td>
    <td>Description</td>
    <td>Production Date </td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>
    </thead>
  <tbody>
  <?php
  include('dbconnect.php');
  $tot=0;
  $date=date('Y-m-%');
  $sql=" select * from production pr,product_details pd where pr.product_id=pd.product_id and production_date LIKE '$date'";
  $res=mysql_query($sql);
  while($row=mysql_fetch_array($res))
  {
  $tot=$tot+$row['total_production'];
  ?>
  <tr>
    <td>&nbsp;<?php echo $row['production_id'];?></td>
    <td>&nbsp;<?php echo $row['product_name'];?></td>
    <td>&nbsp;<?php echo $row['total_production'];?></td>
    <td>&nbsp;<?php echo $row['description'];?></td>
    <td>&nbsp;<?php echo $row['production_date'];?></td>
    <td>&nbsp;<a href="production_edit.php?pr_id=<?php echo $row['production_id'];?>"><img src="../image/edit.jpg" width="40" height="40"></a></td>
    <td>&nbsp;<a href="production_delete.php?pr_id=<?php echo $row['production_id'];?>"onClick="return confirm('Are you sure want to delete')"><img src="../image/delete.png" width="30" height="30"></a></td>
  </tr>
  <?php 
  }
  ?>

                </tbody>
              </table>
			   <b>Total Production <?php echo $tot;?></b>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Essential javascripts for application to work-->
<?php include('script.php');?>
	<?php include('footer.php'); ?>
  </body>
</html>