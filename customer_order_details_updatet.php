<?php
include('dbconnect.php');
$cod_id=$_POST['cod_id']; 
$customer_order_details_id=$_POST['customer_order_details_id'];  
$customer_order_master_id=$_POST['customer_order_master_id'];
$product_id=$_POST['product_id'];
$quantity=$_POST['quantity'];



$sql="update customer_order_details set customer_order_master_id='$customer_order_master_id',product_id='$product_id',quantity='$quantity' where customer_order_details_id='$cod_id' ";
mysqli_query($conn,$$sql);
?>
<script>
alert("values is updeted...");
document.location="customer_order_details_view.php";
</script>