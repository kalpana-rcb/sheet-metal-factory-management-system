<?php
include('database.php');
$pur_id=$_REQUEST['pur_id'];
$c_id=$_REQUEST['c_id'];
$sql="delete from customer_order_details  where customer_order_details_id='$pur_id' ";
mysqli_query($conn,$sql);

?>
<script>
alert("values is deleted..");
document.location="customer_order_master_more.php?c_id=<?php echo $c_id; ?>&pur_id=<?php echo $pur_id; ?>";
</script>