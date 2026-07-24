<?php
$raw_material_id=$_REQUEST['r_id'];
include('database.php');
$sql="delete from  raw_materials where raw_material_id='$raw_material_id'";
$res=mysqli_query($conn,$sql);
?>

<script>
alert("deleted..");
document.location="raw_materials_view.php";
</script>
