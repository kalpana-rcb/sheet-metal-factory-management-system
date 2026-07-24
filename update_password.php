<?php
session_start();
$user_name=$_SESSION["uname"];
$cp=$_POST["cp"];
$pwd=$_POST["pwd"];
include('database.php');
$sql="select * from login where user_name='$user_name' and password='$cp'";
$res=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($res))
{
     $sql="update login set password='$pwd' where user_name='$user_name'";
		mysqli_query($conn,$sql);
?>
<script type="text/javascript">
alert("Password Changed Successfully");
history.back();
</script>
<?php	
}
else
{
?>
<script type="text/javascript">
alert("Invalid Current Password");
history.back();
</script>
<?php
}
?>