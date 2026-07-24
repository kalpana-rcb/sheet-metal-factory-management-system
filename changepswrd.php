<!DOCTYPE html>
<html lang="en">
<?php include('metatag.php'); ?>

<style>

body{
	background:linear-gradient(135deg,#eef2ff,#f8fbff);
	font-family:'Segoe UI',sans-serif;
}

.page-title{
	font-size:28px;
	font-weight:700;
	color:#1e3c72;
}

.card{
	border:none;
	border-radius:22px;
	box-shadow:0 12px 30px rgba(0,0,0,0.08);
	overflow:hidden;
}

.card-header{
	background:linear-gradient(135deg,#1e3c72,#2a5298);
	color:#fff;
	padding:20px;
	font-size:22px;
	font-weight:600;
}

.form-container{
	background:#fff;
	padding:40px;
	border-radius:18px;
	box-shadow:0 8px 20px rgba(0,0,0,0.05);
}

.form-group label{
	font-weight:600;
	color:#1e3c72;
	margin-bottom:8px;
}

.form-control{
	border-radius:12px;
	height:48px;
	border:1px solid #d9e2f2;
	padding-left:15px;
	transition:0.3s;
}

.form-control:focus{
	border-color:#2a5298;
	box-shadow:0 0 10px rgba(42,82,152,0.15);
}

.btn{
	border-radius:12px;
	padding:10px 18px;
	font-weight:600;
	transition:0.3s;
}

.btn-primary{
	background:linear-gradient(135deg,#1e3c72,#2a5298);
	border:none;
}

.btn-primary:hover{
	transform:translateY(-2px);
}

.btn-danger{
	background:linear-gradient(135deg,#dc2626,#ef4444);
	border:none;
}

.icon-box{
	font-size:60px;
	color:#1e3c72;
	margin-bottom:10px;
}

.title-text{
	font-size:24px;
	font-weight:700;
	color:#1e3c72;
	margin-bottom:5px;
}

.subtitle{
	color:#6b7280;
	margin-bottom:25px;
}

</style>

<body>

<div class="wrapper sidebar_minimize">

	<div class="main-header">
		<?php include('header.php'); ?>
	</div>

	<?php include('sidebar.php'); ?>

	<div class="main-panel">

		<div class="content">

			<div class="page-inner">

				<div class="page-header">
					<h4 class="page-title">
						<i class="fas fa-key"></i> Change Password
					</h4>
				</div>

				<div class="card">

					<div class="card-header">
						Secure Password Update
					</div>

					<div class="card-body">

						<div class="row justify-content-center">

							<div class="col-md-6">

								<div class="form-container text-center">

									<div class="icon-box">
										<i class="fas fa-lock"></i>
									</div>

									<div class="title-text">Update Your Password</div>
									<div class="subtitle">Keep your account secure by using a strong password</div>

									<form name="formID" id="formID" method="post" action="update_password.php">

										<div class="form-group text-left">
											<label>Current Password</label>
											<input name="cp" type="password" class="form-control validate[required]" placeholder="Enter current password">
										</div>

										<div class="form-group text-left">
											<label>New Password</label>
											<input name="pwd" type="password" class="form-control validate[required]" placeholder="Enter new password">
										</div>

										<div class="form-group text-left">
											<label>Confirm Password</label>
											<input name="pswd" type="password" class="form-control validate[required,confirm[pwd]]" placeholder="Confirm new password">
										</div>

										<div class="d-flex justify-content-between mt-4">

											<button type="submit" name="Submit" class="btn btn-primary">
												<i class="fas fa-save"></i> Update
											</button>

											<button type="submit" name="Cancel" class="btn btn-danger">
												<i class="fas fa-times"></i> Cancel
											</button>

										</div>

									</form>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		<?php include('footer.php'); ?>

	</div>

	<?php include('setting.php'); ?>

</div>

<?php include('script.php'); ?>
<?php include('val.php'); ?>

</body>
</html>