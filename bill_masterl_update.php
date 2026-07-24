<?php
include('dbconnect.php');
$bm_id=$_POST['bm_id'];
$bill_master_id=$_POST['bill_master_id'];  
$bill_date=$_POST['bill_date'];
$customer_id=$_POST['customer_id'];
$other_charges=$_POST['other_charges'];



$sql="update bill_master set bill_date='$bill_date',customer_id='$customer_id',other_charges='$other_charges'where bill_master_id='$bm_id' ";
mysqli_query($conn,$sql);
?>
<script>
alert("values is updeted...");
document.location="bill_master_view.php";
</script>