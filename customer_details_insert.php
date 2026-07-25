<?php
include('admin/database.php');
$Name=$_POST['cn'];
$Address=$_POST['ca'];
$City=$_POST['cc'];
$Number=$_POST['cnor'];
$Email=$_POST['em'];
$password=$_POST["password"];
$hint_qtn=$_POST["hint_qtn"];
$hint_ans=$_POST["hint_ans"];
$sql="insert into customer_details values(null,'$Name','$Address','$City','$Number','$Email')";
mysqli_query($conn,$sql);
$sql="insert into login values('$Email','$password','customer','active','$password','customer')";
mysqli_query($conn,$sql);
?>
<script type="text/javascript">
alert("Customer Registered Successfully");
document.location="login.php";
</script>

