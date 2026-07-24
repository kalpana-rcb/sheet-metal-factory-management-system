<?php
include('database.php');
$product_name=$_POST['pn'];
$rate=$_POST['pr'];

$photo=$_FILES['photo']['name'];
$tmp_location=$_FILES['photo']['tmp_name'];
$target="../uploads/".$photo;
move_uploaded_file($tmp_location,$target);


$sql="insert into product values(null,'$product_name','$rate','$photo')";
mysqli_query($conn,$sql);
?>
<script>
alert("inserted..");
document.location="product_view.php";
</script>