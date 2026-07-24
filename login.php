<!DOCTYPE HTML>

<html lang="zxx">

<head>
	<title>SHEET METAL</title>

```
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8" />

<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet">


<script>

	let captchaCode;

	// Generate Letter + Number CAPTCHA
	function generateCaptcha() {

		let chars =
		"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

		captchaCode = "";

		for(let i = 0; i < 6; i++) {

			captchaCode += chars.charAt(
				Math.floor(Math.random() * chars.length)
			);
		}

		document.getElementById("captchaLabel").innerHTML =
		captchaCode;
	}

	// Validate Form
	function validateForm() {

		let captcha =
		document.getElementById("captcha").value.trim();

		if(captcha !== captchaCode){

			alert("Incorrect CAPTCHA");

			generateCaptcha();

			return false;
		}

		return true;
	}

	window.onload = generateCaptcha;

</script>
```

</head>

<body>
	<div class="main-bg">
		<h1>SHEET METAL </h1>

```
	<div class="sub-main-w3">
		<div class="vertical-tab">
			<div id="section1" class="section-w3ls">
				<input type="radio" name="sections" id="option1" checked>
				<label for="option1" class="icon-left-w3pvt">
					<span class="fa fa-user-circle"></span>Login
				</label>

				<article>
					<form action="logcheck.php" method="post" onsubmit="return validateForm()">

						<h3 class="legend">Login Here</h3>

						<!-- Email -->
						<div class="input">
							<span class="fa fa-envelope-o"></span>
							<input type="email" id="email" placeholder="Email" name="username" required />
						</div>

						<!-- Password -->
						<div class="input">
							<span class="fa fa-key"></span>
							<input type="password" id="password" placeholder="Password" name="password" required />
						</div>

						<!-- CAPTCHA -->
						<!-- CAPTCHA -->

<div class="input">

	<label id="captchaLabel"
	style="
	font-weight:bold;
	font-size:22px;
	letter-spacing:5px;
	color:black;
	display:block;
	margin-bottom:10px;
	">
	</label>

	<input type="text"
	id="captcha"
	placeholder="Enter CAPTCHA"
	required />

</div>
						<button type="submit" class="btn submit">Login</button>

						<a href="forgot_password.php" class="bottom-text-w3ls">Forgot Password?</a>
						<br><a href="registration.php" class="bottom-text-w3ls">Sign Up</a>

					</form>
				</article>
			</div>
		</div>

		<div class="clear"></div>
	</div>

	<div class="copyright">
		<h2>&copy; 2019 Triple Forms. All rights reserved | Design by
			<a href="http://w3layouts.com" target="_blank">W3layouts</a>
		</h2>
	</div>
</div>
```

</body>

</html>
