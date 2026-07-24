<?php
session_start();
include('database.php');

// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$msg = '';

if(isset($_POST['send_otp'])){

    $email = mysqli_real_escape_string($conn,$_POST['email']);

    $check = mysqli_query($conn,"SELECT * FROM login WHERE user_name='$email'");

    if(mysqli_num_rows($check)>0){

        $otp = rand(100000,999999);

        $_SESSION['reset_email'] = $email;
        $_SESSION['reset_otp'] = $otp;

        // =========================
        // SMTP MAIL CONFIGURATION
        // =========================

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();

            $mail->Host       = 'smtp.gmail.com';

            $mail->SMTPAuth   = true;

            $mail->Username   = 'vtechprojectmail@gmail.com';

            $mail->Password   = 'ttnftyfthdlaoohy';

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->Port       = 587;

            // Sender
            $mail->setFrom('yourgmail@gmail.com', 'Your Website');

            // Receiver
            $mail->addAddress($email);

            // Email Content
            $mail->isHTML(true);

            $mail->Subject = 'Password Reset OTP';

            $mail->Body = "
            <div style='font-family:Arial;padding:20px'>
                <h2>Password Reset Request</h2>

                <p>Your OTP code is:</p>

                <h1 style='color:#007bff'>$otp</h1>

                <p>Do not share this OTP with anyone.</p>
            </div>
            ";

            $mail->send();

            header("Location: verify_otp.php");
            exit();

        } catch (Exception $e) {

            $msg = '<div class="alert error">
                        Email could not be sent.
                    </div>';
        }

    }else{

        $msg = '<div class="alert error">
                    Email not found
                </div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <style>

        body{
            margin:0;
            background:#f5f5f5;
            font-family:Arial;
        }

        .auth{
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
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
            font-size:15px;
        }

        .submit-btn{
            width:100%;
            padding:12px;
            background:#007bff;
            border:none;
            color:#fff;
            border-radius:5px;
            cursor:pointer;
            font-size:16px;
        }

        .submit-btn:hover{
            background:#0056b3;
        }

        .alert.error{
            background:#ffdede;
            color:#a10000;
            padding:12px;
            border-radius:5px;
            margin-bottom:15px;
        }

    </style>
</head>

<body>

<div class="auth">

    <div class="auth-box">

        <h2>Forgot Password</h2>

        <?php echo $msg; ?>

        <form method="post">

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Enter Registered Email"
                   required>

            <button type="submit"
                    name="send_otp"
                    class="submit-btn">
                Send OTP
            </button>

        </form>


    </div>

</div>

</body>
</html>