<?php
include('database.php');
$raw_material_name=$_POST['rnm'];
$raw_material_description=$_POST['rde'];

$sql="insert into raw_materials values(null,'$raw_material_name','$raw_material_description')";
mysqli_query($conn,$sql);
?>
<script>
alert("inserted..");
document.location="raw_materials_view.php";
</script>
