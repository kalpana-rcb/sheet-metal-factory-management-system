<?php
include('database.php');
$customer_id=$_POST['customer_id'];
$customer_name=$_POST['cn'];
$customer_address=$_POST['ca'];
$customer_city=$_POST['cc'];
$contact_number=$_POST['cnor'];
$email=$_POST['em'];

$sql="update customer_details set customer_name='$customer_name',customer_address='$customer_address',customer_city='$customer_city',contact_number='$contact_number',email='$email' where customer_id='$customer_id'";
mysqli_query($conn,$sql);
?>
<script>
alert("Updated..");
document.location="customer_details_view.php";
</script>

