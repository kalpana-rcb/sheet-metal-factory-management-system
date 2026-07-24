<?php
include('database.php');
$raw_material_supplier_name=$_POST['rn'];
$raw_material_supplier_city=$_POST['rc'];
$Raw_Material_Supplier_Address=$_POST['ra'];

$sql="insert into raw_materials_supplier values(null,'$raw_material_supplier_name','$raw_material_supplier_city','$Raw_Material_Supplier_Address')";
mysqli_query($conn,$sql);
?>
<script>
alert("inserted..");
document.location="raw_materials_supplier_view.php";
</script>