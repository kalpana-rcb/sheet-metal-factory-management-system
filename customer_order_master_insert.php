<?php
$customer_order_master_id=$_POST['customer_order_master_id'];  
$date=$_POST['date'];
$customer_id=$_POST['customer_id'];



include('dbconnect.php');

$sql="insert into customer_order_master  values(null,'$date','$customer_id')";
mysqli_query($conn,$$sql);


?>
<script language="javascript1.2">
alert(' inserted');
document.location="customer_order_master_view.php ";

</script>
