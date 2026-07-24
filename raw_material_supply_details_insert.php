<?php
include('database.php');
$raw_material_supplier_id=$_POST['rmid'];
$raw_material_id=$_POST['rid'];
$quantity=$_POST['rq'];
$supply_date=$_POST['sd'];


$sql="insert into raw_material_supply_details values(null,'$raw_material_supplier_id','$raw_material_id','$quantity','$supply_date')";
mysqli_query($conn,$sql);
?>
<script>
alert("inserted..");
document.location="raw_material_supply_details_view.php";
</script>