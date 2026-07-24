<!DOCTYPE HTML>

<html lang="zxx">

<head>

    <title>STEEL SHEETS Register</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta charset="UTF-8" />

    <link href="css/font-awesome.min.css" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

       body{

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    background:
    linear-gradient(rgba(0,0,0,0.70),rgba(0,0,0,0.70)),
    url('https://images.unsplash.com/photo-1565008447742-97f6f38c985c?q=80&w=2070&auto=format&fit=crop');

    background-size:cover;

    background-position:center;

    background-repeat:no-repeat;

    background-attachment:fixed;

    overflow:auto;
}
        .main-bg{

            width:100%;

            padding:40px 15px;
        }

        h1{

            text-align:center;

            color:white;

            margin-bottom:30px;

            font-size:45px;

            letter-spacing:4px;

            font-weight:700;

            text-shadow:0 4px 15px rgba(0,0,0,0.7);
        }

        .sub-main-w3{

            max-width:480px;

            margin:auto;

            background:rgba(255,255,255,0.10);

            backdrop-filter:blur(18px);

            border:1px solid rgba(255,255,255,0.18);

            padding:40px;

            border-radius:28px;

            box-shadow:
            0 10px 40px rgba(0,0,0,0.5),
            inset 0 0 20px rgba(255,255,255,0.05);

            animation:fadeIn 1s ease;
        }

        @keyframes fadeIn{

            from{
                opacity:0;
                transform:translateY(20px);
            }

            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        .legend{

            color:white;

            text-align:center;

            margin-bottom:30px;

            font-size:30px;

            font-weight:600;
        }

        .input{

            position:relative;

            margin-bottom:22px;
        }

        .input span{

            position:absolute;

            top:17px;

            left:15px;

            color:#dbeafe;

            font-size:16px;
        }

        .input input,
        .input select{

            width:100%;

            padding:15px 15px 15px 48px;

            border:none;

            outline:none;

            border-radius:14px;

            background:rgba(255,255,255,0.12);

            color:white;

            font-size:15px;

            border:1px solid rgba(255,255,255,0.15);

            transition:0.3s;
        }

        .input input:focus,
        .input select:focus{

            border-color:#38bdf8;

            background:rgba(255,255,255,0.18);

            box-shadow:0 0 12px rgba(56,189,248,0.4);
        }

        .input input::placeholder{

            color:#e2e8f0;
        }

        .input select{

            color:#e2e8f0;
        }

        .input option{

            color:black;
        }

        .btn{

            width:100%;

            padding:15px;

            border:none;

            border-radius:14px;

            background:
            linear-gradient(135deg,#06b6d4,#2563eb,#7c3aed);

            color:white;

            font-size:18px;

            font-weight:600;

            cursor:pointer;

            transition:0.4s;

            letter-spacing:1px;
        }

        .btn:hover{

            transform:translateY(-3px);

            box-shadow:0 10px 25px rgba(37,99,235,0.5);
        }

        .copyright{

            text-align:center;

            margin-top:25px;

            color:white;

            font-size:15px;

            text-shadow:0 2px 10px rgba(0,0,0,0.6);
        }

        @media(max-width:500px){

            .sub-main-w3{

                padding:25px;
            }

            h1{

                font-size:34px;
            }

            .legend{

                font-size:24px;
            }
        }

    </style>

    <script>

        function validateForm() {

            let name = document.forms["regForm"]["cn"].value;

            let phone = document.forms["regForm"]["cnor"].value;

            let password = document.forms["regForm"]["password"].value;

            let cpassword = document.forms["regForm"]["cpassword"].value;

            let namePattern = /^[A-Za-z ]{3,}$/;

            if (!namePattern.test(name)) {

                alert("Name must contain only letters and minimum 3 characters.");

                return false;
            }

            let phonePattern = /^[0-9]{10}$/;

            if (!phonePattern.test(phone)) {

                alert("Enter valid 10-digit contact number.");

                return false;
            }

            if (password.length < 6) {

                alert("Password must be at least 6 characters.");

                return false;
            }

            if (password !== cpassword) {

                alert("Passwords do not match.");

                return false;
            }

            return true;
        }

    </script>

</head>

<body>

<div class="main-bg">

    <h1>SHEET METAL</h1>

    <div class="sub-main-w3">

        <form name="regForm"
        action="customer_details_insert.php"
        method="post"
        onsubmit="return validateForm()">

            <h3 class="legend">Register Here</h3>

            <!-- Name -->

            <div class="input">

                <span class="fa fa-user-o"></span>

                <input type="text"
                placeholder="Full Name"
                name="cn"
                pattern="[A-Za-z ]{3,}"
                required />

            </div>

            <!-- Address -->

            <div class="input">

                <span class="fa fa-home"></span>

                <input type="text"
                placeholder="Address"
                name="ca"
                required />

            </div>

            <!-- City -->

            <div class="input">

                <span class="fa fa-building"></span>

                <input type="text"
                placeholder="City"
                name="cc"
                pattern="[A-Za-z ]{2,}"
                required />

            </div>

            <!-- Contact -->

            <div class="input">

                <span class="fa fa-phone"></span>

                <input type="text"
                placeholder="Contact Number"
                name="cnor"
                pattern="[0-9]{10}"
                required />

            </div>

            <!-- Email -->

            <div class="input">

                <span class="fa fa-envelope"></span>

                <input type="email"
                placeholder="Email Address"
                name="em"
                required />

            </div>

            <!-- Password -->

            <div class="input">

                <span class="fa fa-lock"></span>

                <input type="password"
                placeholder="Password"
                name="password"
                minlength="6"
                required />

            </div>

            <!-- Confirm Password -->

            <div class="input">

                <span class="fa fa-lock"></span>

                <input type="password"
                placeholder="Confirm Password"
                name="cpassword"
                minlength="6"
                required />

            </div>

            <!-- Security Question -->

            <div class="input">

                <span class="fa fa-question-circle"></span>

                <select name="hint_qtn" required>

                    <option value="">Select Security Question</option>

                    <option>Which is your favorite color?</option>

                    <option>Which is your favorite city?</option>

                </select>

            </div>

            <!-- Answer -->

            <div class="input">

                <span class="fa fa-pencil"></span>

                <input type="text"
                placeholder="Hint Answer"
                name="hint_ans"
                pattern="[A-Za-z ]{2,}"
                required />

            </div>

            <!-- Button -->

            <button type="submit" class="btn">

                Register Now

            </button>

        </form>

    </div>

    <div class="copyright">

        <h2>© 2026 SHEET METAL</h2>

    </div>

</div>

</body>

</html>