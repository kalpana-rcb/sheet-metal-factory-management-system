<?php
include('database.php');
$raw_material_id=$_POST['raw_material_id'];
$raw_material_name=$_POST['rnm'];
$raw_material_description=$_POST['rde'];

$sql="update raw_materials set raw_material_name='$raw_material_name',raw_material_description='$raw_material_description' where raw_material_id='$raw_material_id'";
mysqli_query($conn,$sql);
?>
<script>
alert("Updated..");
document.location="raw_materials_view.php";
</script>

