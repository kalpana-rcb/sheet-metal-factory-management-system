<?php
include('database.php');
$com_id=$_REQUEST['com_id'];
$sql="delete from customer_order_master where customer_order_master_id='$com_id' ";
mysqli_query($conn,$sql);

?>
<script>
alert("values is deleted..");
document.location="customer_order_master_view.php";
</script>