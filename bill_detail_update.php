<?php
include('dbconnect.php');
$bd_id=$_POST['bd_id']; 
$bill_master_id=$_POST['bill_master_id'];
$product_id=$_POST['product_id'];
$quantity=$_POST['quantity'];
$rate=$_POST['rate'];
$discount=$_POST['discount'];

$sql="update bill_details set bill_master_id='$bill_master_id',product_id='$product_id',quantity='$quantity',rate='$rate',discount='$discount' where bill_details_id='$bd_id' ";
mysqli_query($conn,$sql);
?>
<script>
alert("values is updeted...");
document.location="bill_detail_view.php";
</script>