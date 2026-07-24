<?php
$raw_material_supplier_id=$_REQUEST['r_id'];
include('database.php');
$sql="delete from  raw_materials_supplier where raw_material_supplier_id='$raw_material_supplier_id'";
$res=mysqli_query($conn,$sql);
?>

<script>
alert("deleted..");
document.location="raw_materials_supplier_view.php";
</script>
