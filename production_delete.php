<?php
$production_id=$_REQUEST['p_id'];
include('database.php');
$sql="delete from  production  where production_id='$production_id'";
$res=mysqli_query($conn,$sql);
?>

<script>
alert("deleted..");
document.location="production_view.php";
</script>
