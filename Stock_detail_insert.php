<?php
$stock_id=$_POST['stock_id'];  
$product_id=$_POST['product_id'];
$stock=$_POST['stock'];

include('database.php');

$sql="insert into stock_details values(null,'$product_id','$stock')";
mysqli_query($conn,$sql);


?>
<script language="javascript1.2">
alert(' inserted');
document.location="Stock_detail_view.php";

</script>
