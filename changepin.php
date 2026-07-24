<?php

session_start();
?>
<?php
	
	
	 $a=$_POST['new_pwd'];
	$b=$_POST['conf_pwd'];
	
		include('dbconnect.php');
		$sql = "select * from log_in where user_name ='".$_SESSION['uname']."' and user_password='".$_POST['old_pwd']."'";
		$res=mysql_query($sql);
	if($a==$b)
	{
		if(mysql_num_rows($res)>0)
		{
			$sql1 = "update log_in set user_password = '".$_POST['new_pwd']."' where user_name ='".$_SESSION['uname']."'";
			$res1 = mysql_query($sql1);
			?>
				<script>
					alert('Successfully updated your password');
					document.location="change pwd.php";
				</script>
			<?php
		} else
		{
			?>
				<script>
					alert('Failed to update your password');
					document.location="change pwd.php";
				</script>
			<?php
		}
	}else
		{
			?>
				<script>
					alert('New Password and Retype Password do not match');
					document.location="change pwd.php";
				</script>
			<?php
		}
		
?>
