<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<head>

<style>

body{
    background:#f4f7fb;
}

/* PAGE HEADER */

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.page-title{
    font-size:28px;
    font-weight:700;
    color:#1e293b;
}

/* CARD DESIGN */

.premium-card{
    border:none;
    border-radius:22px;
    overflow:hidden;
    background:#ffffff;
    box-shadow:0 8px 25px rgba(0,0,0,0.08);
}

.card-header-premium{
    padding:20px 25px;
    background:linear-gradient(135deg,#0f172a,#1e3a8a,#2563eb);
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.card-header-premium h4{
    color:#fff;
    margin:0;
    font-size:22px;
    font-weight:600;
}

/* FORM */

.form-section{
    padding:35px;
}

.form-group{
    margin-bottom:22px;
}

.form-group label{
    font-weight:600;
    color:#1e293b;
    margin-bottom:8px;
    display:block;
}

.form-control{
    border-radius:12px !important;
    height:48px !important;
    border:1px solid #dbeafe !important;
    box-shadow:none !important;
    transition:0.3s;
}

.form-control:focus{
    border-color:#2563eb !important;
    box-shadow:0 0 10px rgba(37,99,235,0.25) !important;
}

/* BUTTONS */

.btn{
    border-radius:12px !important;
    padding:11px 22px !important;
    font-weight:600 !important;
    transition:0.3s;
}

.btn-success{
    background:linear-gradient(135deg,#16a34a,#22c55e);
    border:none;
    color:white;
}

.btn-success:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 18px rgba(34,197,94,0.3);
    color:white;
}

.btn-primary{
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    border:none;
    color:white;
}

.btn-primary:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 18px rgba(59,130,246,0.3);
    color:white;
}

/* BUTTON AREA */

.button-group{
    margin-top:30px;
    display:flex;
    gap:15px;
    flex-wrap:wrap;
}

/* TEXTAREA */

textarea.form-control{
    height:120px !important;
    resize:none;
    padding-top:12px;
}

/* ANIMATION */

.premium-card{
    animation:fadeIn 0.7s ease;
}

@keyframes fadeIn{

    from{
        opacity:0;
        transform:translateY(15px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}

</style>

</head>

<body>

<div class="wrapper sidebar_minimize">

    <div class="main-header">

        <?php include('header.php'); ?>

    </div>

    <!-- Sidebar -->

    <?php include('sidebar.php'); ?>

    <!-- Sidebar End -->

    <div class="main-panel">

        <div class="content">

            <div class="page-inner">

                <!-- PAGE HEADER -->

                <div class="page-header">

                    <h4 class="page-title">

                        Raw Materials Supplier

                    </h4>

                    <a href="raw_materials_supplier_view.php"
                    class="btn btn-primary">

                        <i class="fas fa-arrow-left"></i>

                        Back to Supplier View

                    </a>

                </div>

                <!-- CARD -->

                <div class="row">

                    <div class="col-md-12">

                        <div class="premium-card">

                            <div class="card-header-premium">

                                <h4>

                                    <i class="fas fa-edit"></i>

                                    Edit Supplier Details

                                </h4>

                            </div>

                            <div class="form-section">

<?php

include('database.php');

$r_id = $_REQUEST['r_id'];

$sql = "SELECT * FROM raw_materials_supplier 
        WHERE raw_material_supplier_id='$r_id'";

$res = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($res);


?>

<form
name="formID"
id="formID"
method="post"
action="raw_materials_supplier_update.php">

<input
type="hidden"
value="<?php echo $row['raw_material_supplier_id']; ?>"
name="r_id">

<div class="row">

    <!-- Supplier Name -->

    <div class="col-md-6">

        <div class="form-group">

            <label>

                Raw Material Supplier Name

            </label>

            <input
            type="text"
            name="rn"
            id="rn"
            value="<?php echo $row['raw_material_supplier_name']; ?>"
            class="form-control validate[required,custom[onlyLetter]]"
            placeholder="Enter Supplier Name">

        </div>

    </div>

    <!-- Supplier City -->

    <div class="col-md-6">

        <div class="form-group">

            <label>

                Supplier City

            </label>

            <input
            type="text"
            name="rc"
            id="rc"
            value="<?php echo $row['raw_material_supplier_city']; ?>"
            class="form-control validate[required,custom[onlyLetter]]"
            placeholder="Enter Supplier City">

        </div>

    </div>

    <!-- Supplier Address -->

    <div class="col-md-12">

        <div class="form-group">

            <label>

                Supplier Address

            </label>

            <textarea
            name="ra"
            id="ra"
            class="form-control validate[required]"
            placeholder="Enter Supplier Address"><?php echo $row['raw_material_supplier_address']; ?></textarea>

        </div>

    </div>

</div>

<!-- BUTTONS -->

<div class="button-group">

    <button
    type="submit"
    name="Submit"
    class="btn btn-success">

        <i class="fas fa-save"></i>

        Update Supplier

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