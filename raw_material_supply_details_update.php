<?php
include('database.php');
$supply_id=$_POST['s_id'];
$raw_material_supplier_id=$_POST['rmid'];
$raw_material_id=$_POST['rid'];
$quantity=$_POST['rq'];
$supply_date=$_POST['sd'];


$sql="update raw_material_supply_details set raw_material_supplier_id='$raw_material_supplier_id',raw_material_id='$raw_material_id',quantity='$quantity',supply_date='$supply_date' where supply_id='$supply_id'";
mysqli_query($conn,$sql);
?>
<script>
alert("Updated..");
document.location="raw_material_supply_details_view.php";
</script>

