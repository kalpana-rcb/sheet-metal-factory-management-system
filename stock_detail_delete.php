<?php
include('dbconnect.php');
$s_id=$_REQUEST['s_id'];
$sql="delete from stock_details where stock_id='$s_id' ";
mysqli_query($conn,$$sql);

?>
<script>
alert("values is deleted..");
document.location="Stock_detail_view.php";
</script>