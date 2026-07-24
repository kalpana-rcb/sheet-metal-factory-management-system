<?php
$customer_order_details_id=$_POST['customer_order_details_id'];  
$customer_order_master_id=$_POST['customer_order_master_id'];
$product_id=$_POST['product_id'];
$quantity=$_POST['quantity'];



include('dbconnect.php');

$sql="insert into  customer_order_details values(null,'$customer_order_master_id','$product_id','$quantity')";
mysqli_query($conn,$$sql);


?>
<script language="javascript1.2">
alert(' inserted');
document.location="customer_order_details_view.php";

</script>
