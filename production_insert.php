<?php
include('database.php');
$product_id=$_POST['pid'];
$raw_material_id=$_POST['rid'];
$quantity=$_POST['qty'];
$description=$_POST['pd'];
$production_date=$_POST['pda'];

 $sql="insert into production values(null,'$product_id','$raw_material_id','$quantity','$description','$production_date')";
mysqli_query($conn,$sql);


$sql4="select * from stock_details where product_id='$product_id' ";
$res4=mysqli_query($conn,$sql4);
if($row4=mysqli_fetch_array($res4))
{
$stock=$row4['stock']+$quantity;

$sql3="update stock_details set stock='$stock' where product_id='$product_id'";
mysqli_query($conn,$sql3);

}
else
{

$sql2="insert into stock_details values(null,'$product_id','$quantity')";
mysqli_query($conn,$sql2);
}
?>
<script>
alert("Production Added..");
document.location="production_view.php";
</script>