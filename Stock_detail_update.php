<?php
include('database.php');
$s_id=$_POST['s_id']; 
$product_id=$_POST['product_id'];
$stock=$_POST['stock'];

$sql="update stock_details set product_id='$product_id',stock='$stock' where stock_id='$s_id' ";
mysqli_query($conn,$sql);
?>
<script>
alert("values is updeted...");
document.location="Stock_detail_view.php";
</script>