<?php
session_start();

$msg='';

if(isset($_POST['verify'])){

    $otp = $_POST['otp'];

    if($otp == $_SESSION['reset_otp']){

        header("Location: reset_password.php");
        exit();

    }else{
        $msg = '<div class="alert error">Invalid OTP</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>

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
            background:#28a745;
            color:#fff;
            border-radius:5px;
            cursor:pointer;
        }

        .alert.error{
            background:#ffdddd;
            color:#a10000;
            padding:10px;
            margin-bottom:15px;
            border-radius:5px;
        }
    </style>
</head>

<body>

<div class="auth">

    <div class="auth-box">

        <h2>Verify OTP</h2>

        <?php echo $msg; ?>

        <form method="post">

            <input type="text"
                   name="otp"
                   class="form-control"
                   placeholder="Enter OTP"
                   required>

            <button type="submit"
                    name="verify"
                    class="submit-btn">
                Verify OTP
            </button>

        </form>

    </div>

</div>

</body>
</html>