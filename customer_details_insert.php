<?php
include('database.php');
$Name=$_POST['cn'];
$Address=$_POST['ca'];
$City=$_POST['cc'];
$Number=$_POST['cnor'];
$Email=$_POST['em'];

$sql="insert into customer_details values(null,'$Name','$Address','$City','$Number','$Email')";
mysqli_query($conn,$sql);

$sql2="insert into login values('$Email','$Number','customer','Enter Ur Contact No','$Number','Active')";
mysqli_query($conn,$sql2);


?>
<script>
alert("inserted..");
document.location="customer_details_view.php";
</script>

