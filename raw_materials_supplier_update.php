<?php
include('database.php');
$r_id=$_POST['r_id'];
$raw_material_supplier_name=$_POST['rn'];
$raw_material_supplier_city=$_POST['rc'];
$raw_material_supplier_address=$_POST['ra'];

$sql="update raw_materials_supplier set raw_material_supplier_name='$raw_material_supplier_name',raw_material_supplier_city='$raw_material_supplier_city',raw_material_supplier_address='$raw_material_supplier_address' where raw_material_supplier_id='$r_id'";
mysqli_query($conn,$sql);
?>
<script>
alert("updated..");
document.location="raw_materials_supplier_view.php";
</script>