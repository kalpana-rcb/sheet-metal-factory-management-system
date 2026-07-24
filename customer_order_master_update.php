<?php
include('dbconnect.php');
$com_id=$_POST['com_id']; 
$$customer_order_master_id=$_POST['customer_order_master_id'];  
$date=$_POST['date'];
$customer_id=$_POST['customer_id'];


$sql="update customer_order_master  set date='$date',customer_id='$customer_id' where customer_order_master_id='$com_id' ";
mysqli_query($conn,$$sql);
?>
<script>
alert("values is updeted...");
document.location="customer_order_master_view.php";
</script>