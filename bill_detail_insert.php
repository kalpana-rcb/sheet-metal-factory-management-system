<?php
$bill_details_id=$_POST['bill_details_id'];  
$bill_master_id=$_POST['bill_master_id'];
$product_id=$_POST['product_id'];
$quantity=$_POST['quantity'];
$rate=$_POST['rate'];
$discount=$_POST['discount'];

include('dbconnect.php');

$sql="insert into bill_details values(null,'$bill_master_id','$product_id','$quantity','$rate','$discount')";
mysqli_query($conn,$sql);


?>
<script language="javascript1.2">
alert(' inserted');
document.location="bill_detail_view.php";

</script>
