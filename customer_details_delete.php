<?php
$Customer=$_REQUEST['c_id'];
include('database.php');
$sql="delete from  customer_details where customer_id='$Customer'";
$res=mysqli_query($conn,$sql);
?>

<script>
alert("deleted..");
document.location="customer_details_view.php";
</script>
