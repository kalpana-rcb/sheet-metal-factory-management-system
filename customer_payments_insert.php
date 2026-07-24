<?php
include('database.php');
$customer_id=$_POST['cid'];
$payment_amount=$_POST['pa'];
$description=$_POST['cpd'];
$payment_date=$_POST['pd'];

$sql="insert into customer_payments values(null,'$customer_id','$payment_amount','$description','$payment_date')";
mysqli_query($conn,$sql);
?>
<script>
alert("inserted..");
document.location="customer_payments_view.php";
</script>