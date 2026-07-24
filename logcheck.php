<?php session_start();?>
<?php
$user_name=$_POST['username'];
$password=$_POST['password'];

include('database.php');
 $sql="select * from login where user_name='$user_name' and password='$password'";
$res=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($res))
{
$_SESSION['uname']=$user_name;
$type=$row['type'];


if($type=="admin")
{
header('location:admin/home.php');
}
else if($type=="user")
{
header('location:user/home.php');
}

else if($type=="customer")
{
header('location:customer/home.php');
}
else if($type=="manager")
{
header('location:manger/home.php');
}

}
else
{
?>
<script>
alert("Invalid Username Or Password");
history.back();
</script>
<?php
}

?>

