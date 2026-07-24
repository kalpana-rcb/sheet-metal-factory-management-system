<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<body>

<div class="wrapper sidebar_minimize">

    <!-- Header -->
    <div class="main-header">
        <?php include('header.php'); ?>
    </div>

    <!-- Sidebar -->
    <?php include('sidebar.php'); ?>
    <!-- Sidebar End -->

    <div class="main-panel">

        <div class="content">

            <div class="page-inner">

                <!-- Page Header -->
                <div class="page-header d-flex justify-content-between align-items-center">

                    <div>
                        <h4 class="page-title text-primary fw-bold">
                            <i class="fas fa-truck-loading mr-2"></i>
                            Raw Material Supply Details
                        </h4>

                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>

                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>

                            <li class="nav-item">
                                Add Supply Details
                            </li>
                        </ul>
                    </div>

                    <!-- Back Button -->
                    <div>
                        <a href="raw_material_supply_details_view.php"
                           class="btn btn-dark btn-round shadow">
                            <i class="fas fa-arrow-left"></i>
                            Back
                        </a>
                    </div>

                </div>

                <!-- Card -->
                <div class="row">

                    <div class="col-md-12">

                        <div class="card shadow-lg border-0">

                            <!-- Card Header -->
                            <div class="card-header text-white"
                                 style="background: linear-gradient(135deg,#0f172a,#1e3a8a,#2563eb); border-radius:10px 10px 0 0;">

                                <div class="card-title fw-bold">
                                    <i class="fas fa-plus-circle"></i>
                                    Add Raw Material Supply
                                </div>

                            </div>

                            <!-- Card Body -->
                            <div class="card-body p-5">

<form name="formID"
      id="formID"
      method="post"
      action="raw_material_supply_details_insert.php">

<div class="row">

    <!-- Supplier -->
    <div class="col-md-6 mb-4">

        <label class="fw-bold text-dark">
            Raw Material Supplier
        </label>

        <select name="rmid"
                id="rmid"
                class="form-control validate[required]"
                style="height:50px; border-radius:12px;">

            <option value="">Select Supplier</option>

<?php
include('database.php');

$sql1="select * from raw_materials_supplier";
$res1=mysqli_query($conn,$sql1);

while($row1=mysqli_fetch_array($res1))
{
?>

<option value="<?php echo $row1['raw_material_supplier_id'];?>">

<?php echo $row1['raw_material_supplier_name'];?>

</option>

<?php
}
?>

        </select>

    </div>

    <!-- Raw Material -->
    <div class="col-md-6 mb-4">

        <label class="fw-bold text-dark">
            Raw Material Name
        </label>

        <select name="rid"
                id="rid"
                class="form-control validate[required]"
                style="height:50px; border-radius:12px;">

            <option value="">Select Material</option>

<?php
$sql2="select * from raw_materials";
$res2=mysqli_query($conn,$sql2);

while($row2=mysqli_fetch_array($res2))
{
?>

<option value="<?php echo $row2['raw_material_id'];?>">

<?php echo $row2['raw_material_name'];?>

</option>

<?php
}
?>

        </select>

    </div>

    <!-- Quantity -->
    <div class="col-md-6 mb-4">

        <label class="fw-bold text-dark">
            Quantity (Kg)
        </label>

        <input type="text"
               name="rq"
               id="rq"
               placeholder="Enter Quantity in Kg"
               class="form-control validate[required,custom[onlyNumber]]"
               style="height:50px; border-radius:12px;">

    </div>

    <!-- Supply Date -->
    <div class="col-md-6 mb-4">

        <label class="fw-bold text-dark">
            Supply Date
        </label>

        <input type="date"
               name="sd"
               id="sd"
               class="form-control validate[required]"
               style="height:50px; border-radius:12px;">

    </div>

</div>

<!-- Buttons -->
<div class="text-center mt-4">

    <button type="submit"
            name="Submit"
            class="btn btn-primary btn-lg px-5 shadow">

        <i class="fas fa-save"></i>
        Submit

    </button>

    <button type="reset"
            name="Reset"
            class="btn btn-danger btn-lg px-5 shadow ml-3">

        <i class="fas fa-redo"></i>
        Reset

    </button>

</div>

</form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <?php include('footer.php'); ?>

    </div>

</div>

<?php include('script.php'); ?>
<?php include('val.php'); ?>

</body>
</html>