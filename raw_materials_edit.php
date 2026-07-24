<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Raw Materials</title>

    <style>

        body{
            background:#f1f5f9;
            font-family:'Poppins',sans-serif;
            margin:0;
            padding:0;
        }

        .page-inner{
            padding:20px;
        }

        .page-title{
            font-weight:700;
            color:#0f172a;
        }

        .premium-card{
            border:none;
            border-radius:24px;
            overflow:hidden;
            background:#ffffff;
            box-shadow:0 10px 35px rgba(0,0,0,0.08);
        }

        .premium-header{
            background:linear-gradient(135deg,#0f172a,#2563eb);
            padding:25px;
            color:white;
        }

        .premium-header h4{
            margin:0;
            font-size:28px;
            font-weight:700;
        }

        .card-body{
            padding:40px;
        }

        .form-group{
            margin-bottom:25px;
        }

        .form-label{
            display:block;
            margin-bottom:8px;
            font-size:15px;
            font-weight:600;
            color:#1e293b;
        }

        .form-control{
            width:100%;
            height:52px;
            border-radius:14px;
            border:1px solid #cbd5e1;
            background:#f8fafc;
            font-size:15px;
            padding:10px 15px;
            box-sizing:border-box;
            outline:none;
            transition:0.3s;
        }

        .form-control:focus{
            border-color:#2563eb;
            background:white;
            box-shadow:0 0 12px rgba(37,99,235,0.2);
        }

        .button-group{
            display:flex;
            gap:12px;
            flex-wrap:wrap;
            margin-top:30px;
        }

        .btn-premium{
            border:none;
            padding:12px 26px;
            border-radius:12px;
            font-size:15px;
            font-weight:600;
            cursor:pointer;
            transition:0.3s;
            text-decoration:none;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:8px;
        }

        .btn-update{
            background:linear-gradient(135deg,#16a34a,#22c55e);
            color:white;
        }

        .btn-back{
            background:linear-gradient(135deg,#0f172a,#334155);
            color:white;
        }

        .btn-premium:hover{
            transform:translateY(-2px);
            box-shadow:0 8px 20px rgba(0,0,0,0.15);
            color:white;
            text-decoration:none;
        }

        .breadcrumbs{
            background:white;
            padding:10px 15px;
            border-radius:12px;
            box-shadow:0 4px 12px rgba(0,0,0,0.05);
            list-style:none;
            display:flex;
            align-items:center;
            gap:10px;
        }

        .breadcrumbs li{
            list-style:none;
        }

        @media(max-width:768px){

            .card-body{
                padding:25px;
            }

            .premium-header h4{
                font-size:24px;
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

                <div class="page-header">

                    <h4 class="page-title">

                        Raw Materials

                    </h4>

                    <ul class="breadcrumbs">

                        <li>

                            <a href="#">

                                <i class="flaticon-home"></i>

                            </a>

                        </li>

                        <li>

                            <i class="flaticon-right-arrow"></i>

                        </li>

                        <li>

                            Edit Raw Material

                        </li>

                    </ul>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="premium-card">

                            <!-- Header -->

                            <div class="premium-header">

                                <h4>

                                    <i class="fas fa-edit"></i>

                                    Edit Raw Material

                                </h4>

                            </div>

                            <!-- Body -->

                            <div class="card-body">

<?php

include('database.php');

$r_id = '';

if(isset($_REQUEST['r_id']))
{
    $r_id = $_REQUEST['r_id'];
}

$sql = "SELECT * FROM raw_materials WHERE raw_material_id='$r_id'";

$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($res);

?>

<form
name="formID"
id="formID"
method="post"
action="raw_materials_update.php">

<input
type="hidden"
name="raw_material_id"
value="<?php echo $row['raw_material_id']; ?>">

<!-- Raw Material Name -->

<div class="form-group">

    <label class="form-label">

        Raw Material Name

    </label>

    <input
    type="text"
    name="rnm"
    id="rnm"
    class="form-control"
    value="<?php echo $row['raw_material_name']; ?>"
    placeholder="Enter Raw Material Name"
    required>

</div>

<!-- Description -->

<div class="form-group">

    <label class="form-label">

        Raw Material Description

    </label>

    <input
    type="text"
    name="rde"
    id="rde"
    class="form-control"
    value="<?php echo $row['raw_material_description']; ?>"
    placeholder="Enter Description"
    required>

</div>

<!-- Buttons -->

<div class="button-group">

    <!-- Update Button -->

    <input
    type="submit"
    name="Submit"
    value="Update"
    class="btn-premium btn-update">

    <!-- Back Button -->

    <a
    href="raw_materials_view.php"
    class="btn-premium btn-back">

        <i class="fas fa-arrow-left"></i>

        Back to Raw Materials

    </a>

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

    <?php include('setting.php'); ?>

</div>

<?php include('script.php'); ?>

</body>

</html>