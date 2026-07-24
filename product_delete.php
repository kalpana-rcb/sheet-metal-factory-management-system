<?php
$product_Id=$_REQUEST['p_id'];
include('database.php');
$sql="delete from  product where product_id='$product_Id'";
$res=mysqli_query($conn,$sql);
?>

<script>
alert("deleted..");
document.location="product_view.php";
</script>
