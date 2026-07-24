<!DOCTYPE html>
<html lang="en">
<?php include('metatag.php'); ?>
<body>
	<div class="wrapper sidebar_minimize">
		<div class="main-header">
			<!-- Logo Header -->
			
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<?php include('header.php'); ?>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<?php include('sidebar.php');  ?>
<!-- Sidebar End -->
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Forms</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Form Elements</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6 col-lg-4">
										<form action="#">
										  <table width="287" height="190" border="0" align="center">
                                            <tr>
                                              <td>User name </td>
                                              <td><input type="text" name="textfield" class="form-control"></td>
                                            </tr>
                                            <tr>
                                              <td>Password</td>
                                              <td><input type="text" name="textfield2" class="form-control"></td>
                                            </tr>
                                            <tr>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td colspan="2"><input type="submit" name="Submit" value="Submit" class="btn btn-success">
                                              <input type="reset" name="Submit2" value="Reset" class="btn btn-danger"></td>
                                            </tr>
                                          </table>
										  </form>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<?php include('setting.php'); ?>
		<!-- End Custom template -->
	</div>
	<?php include('script.php'); ?>
	
</body>
</html>