<?php
include('database.php');
$cd=$_POST['cd'];
$customer_id=$_POST['cid'];
$payment_amount=$_POST['pa'];
$description=$_POST['cpd'];
$payment_date=$_POST['pd'];

 $sql="update customer_payments set customer_id='$customer_id',payment_amount='$payment_amount',description='$description',payment_date='$payment_date' where customer_payment_id='$cd'";
mysqli_query($conn,$sql);
?>
<script>
alert("Updated..");
document.location="customer_payments_view.php";
</script>
