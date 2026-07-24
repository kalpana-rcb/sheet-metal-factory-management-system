<?php
$customer_payment_id=$_REQUEST['c_id'];
include('database.php');
$sql="delete from  customer_payments where customer_payment_id='$customer_payment_id'";
$res=mysqli_query($conn,$sql);
?>

<script>
alert("deleted..");
document.location="customer_payments_view.php";
</script>
