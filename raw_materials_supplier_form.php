<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<head>

    <title>Raw Material Supplier Form</title>

    <style>

        body{
            background:#f1f5f9;
            font-family:'Poppins',sans-serif;
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

            font-size:15px;

            font-weight:600;

            color:#1e293b;

            margin-bottom:8px;

            display:block;
        }

        .form-control{

            height:52px;

            border-radius:14px;

            border:1px solid #cbd5e1;

            background:#f8fafc;

            font-size:15px;

            transition:0.3s;
        }

        textarea.form-control{

            height:120px;

            resize:none;

            padding-top:15px;
        }

        .form-control:focus{

            border-color:#2563eb;

            box-shadow:0 0 12px rgba(37,99,235,0.2);

            background:white;
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

            transition:0.3s;

            text-decoration:none;

            display:inline-flex;

            align-items:center;

            gap:8px;
        }

        .btn-submit{

            background:linear-gradient(135deg,#16a34a,#22c55e);

            color:white;
        }

        .btn-reset{

            background:linear-gradient(135deg,#ef4444,#dc2626);

            color:white;
        }

        .btn-back{

            background:linear-gradient(135deg,#0f172a,#334155);

            color:white;
        }

        .btn-premium:hover{

            transform:translateY(-2px);

            color:white;

            text-decoration:none;

            box-shadow:0 8px 20px rgba(0,0,0,0.15);
        }

        .breadcrumbs{

            background:white;

            padding:10px 15px;

            border-radius:12px;

            box-shadow:0 4px 12px rgba(0,0,0,0.05);
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

                        Raw Material Supplier

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

                            Add Supplier

                        </li>

                    </ul>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="premium-card">

                            <!-- Header -->

                            <div class="premium-header">

                                <h4>

                                    <i class="fas fa-truck-loading"></i>

                                    Add Raw Material Supplier

                                </h4>

                            </div>

                            <!-- Body -->

                            <div class="card-body">

<form
name="formID"
id="formID"
method="post"
action="raw_materials_supplier_insert.php">

<!-- Supplier Name -->

<div class="form-group">

    <label class="form-label">

        Supplier Name

    </label>

    <input
    name="rn"
    type="text"
    id="rn"
    class="form-control validate[required,custom[onlyLetter]]"
    placeholder="Enter Supplier Name">

</div>

<!-- Supplier City -->

<div class="form-group">

    <label class="form-label">

        Supplier City

    </label>

    <input
    name="rc"
    type="text"
    id="rc"
    class="form-control validate[required,custom[onlyLetter]]"
    placeholder="Enter Supplier City">

</div>

<!-- Supplier Address -->

<div class="form-group">

    <label class="form-label">

        Supplier Address

    </label>

    <textarea
    name="ra"
    id="ra"
    class="form-control validate[required]"
    placeholder="Enter Supplier Address"></textarea>

</div>

<!-- Buttons -->

<div class="button-group">

    <input
    type="submit"
    name="Submit"
    value="Submit"
    class="btn-premium btn-submit">

    <input
    type="reset"
    name="Reset"
    value="Reset"
    class="btn-premium btn-reset">

    <a href="raw_materials_supplier_view.php"
    class="btn-premium btn-back">

        <i class="fas fa-arrow-left"></i>

        Back to Supplier View

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

    <!-- Settings -->

    <?php include('setting.php'); ?>

</div>

<?php include('script.php'); ?>

<?php include('val.php'); ?>

</body>

</html>