
<?php include("header.php"); ?>
<?php include("metatags.php"); ?>

<div>
        <!--BEGIN THEME SETTING-->
   
        <!--END TOPBAR-->
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
<?php include("nav.php"); ?>

            <!--END SIDEBAR MENU-->
			
			

            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                  <div class="page-header pull-left">
                        <div class="page-title">
                           <span class="style1">
						   <span class="style1">
						   Change Password</div>
                  </div>
                    <div class="clearfix">
                    </div>
              </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                       <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                            <div class="col-lg-12">
                                
                                            <div class="col-md-12">
                                                <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                                                </div>
                                            </div>
                                
                            </div>

                            <div class="col-lg-12">
                              
                                    
                              <div class="row">
                    <div class="col-md-12">
                        <div class="row mtl">
                            <div class="col-md-9">
                             
                                <div id="generalTabContent" class="tab-content">
                                    <div id="tab-edit" class="tab-pane fade in active">
						
					<form name="form2" method="post" action="changepin.php">
<p>Old Password </p>
  <label>
  <input type="password" name="old_pwd">
  </label>
  <p>New password </p>
  <p>
    <label>
      <input type="password" name="new_pwd">
      </label>
	  <p>Confirm password </p>
  <p>
    <label>
      <input type="password" name="conf_pwd">
      </label>
  </p>


  <label>
  <input type="submit" name="Submit" value="Change" />
  </label>
</form>
     <?php include('footer.php');  ?>   