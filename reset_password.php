<?php
session_start();
include('database.php');

$msg='';

if(isset($_POST['reset'])){

    $newpass = mysqli_real_escape_string($conn,$_POST['new_password']);

    $email = $_SESSION['reset_email'];

    mysqli_query($conn,"UPDATE login 
    SET password='$newpass' 
    WHERE user_name='$email'");

    unset($_SESSION['reset_email']);
    unset($_SESSION['reset_otp']);

    $msg = '<div class="alert success">
                Password Updated Successfully
            </div>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        .auth{
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            background:#f5f5f5;
        }

        .auth-box{
            width:400px;
            background:#fff;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        .form-control{
            width:100%;
            padding:12px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:5px;
        }

        .submit-btn{
            width:100%;
            padding:12px;
            border:none;
            background:#dc3545;
            color:#fff;
            border-radius:5px;
            cursor:pointer;
        }

        .alert.success{
            background:#ddffdd;
            color:#006400;
            padding:10px;
            margin-bottom:15px;
            border-radius:5px;
        }
    </style>
</head>

<body>

<div class="auth">

    <div class="auth-box">

        <h2>Reset Password</h2>

        <?php echo $msg; ?>

        <form method="post">

            <input type="password"
                   name="new_password"
                   class="form-control"
                   placeholder="New Password"
                   required>

            <button type="submit"
                    name="reset"
                    class="submit-btn">
                Update Password
            </button>

        </form>
<a href="login.php">Go to Login</a>
    </div>

</div>

</body>
</html>