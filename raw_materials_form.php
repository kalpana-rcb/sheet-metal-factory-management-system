<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<head>

    <title>Raw Materials Form</title>

    <style>

        body{
            background:#f1f5f9;
            font-family:'Poppins',sans-serif;
        }

        .page-inner{
            padding:20px;
        }

        .premium-card{
            border:none;
            border-radius:20px;
            overflow:hidden;
            background:#ffffff;
            box-shadow:0 8px 25px rgba(0,0,0,0.08);
        }

        .premium-header{
            background:linear-gradient(135deg,#0f172a,#2563eb);
            padding:22px;
            color:white;
        }

        .premium-header h4{
            margin:0;
            font-size:28px;
            font-weight:700;
        }

        .form-section{
            padding:35px;
        }

        .form-group{
            margin-bottom:25px;
        }

        .form-label{
            font-weight:600;
            color:#1e293b;
            margin-bottom:8px;
            display:block;
            font-size:15px;
        }

        .form-control{
            height:50px;
            border-radius:12px;
            border:1px solid #dbeafe;
            background:#f8fafc;
            transition:0.3s;
            font-size:15px;
            padding:10px 15px;
            width:100%;
        }

        .form-control:focus{
            border-color:#2563eb;
            box-shadow:0 0 10px rgba(37,99,235,0.2);
            background:white;
            outline:none;
        }

        .btn-premium{
            border:none;
            padding:12px 28px;
            border-radius:12px;
            font-size:15px;
            font-weight:600;
            transition:0.3s;
            cursor:pointer;
        }

        .btn-submit{
            background:linear-gradient(135deg,#2563eb,#06b6d4);
            color:white;
        }

        .btn-submit:hover{
            transform:translateY(-2px);
            box-shadow:0 8px 20px rgba(37,99,235,0.3);
        }

        .btn-reset{
            background:linear-gradient(135deg,#ef4444,#dc2626);
            color:white;
        }

        .btn-reset:hover{
            transform:translateY(-2px);
            box-shadow:0 8px 20px rgba(239,68,68,0.3);
        }

        .btn-back{
            background:linear-gradient(135deg,#0f172a,#334155);
            color:white;
            text-decoration:none;
            display:inline-block;
        }

        .btn-back:hover{
            color:white;
            text-decoration:none;
            transform:translateY(-2px);
        }

        .button-group{
            display:flex;
            gap:12px;
            flex-wrap:wrap;
            margin-top:20px;
        }

        .page-title{
            font-weight:700;
            color:#0f172a;
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

                    <h4 class="page-title">Raw Materials</h4>

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

                            Raw Materials Form

                        </li>

                    </ul>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="premium-card">

                            <!-- Header -->

                            <div class="premium-header">

                                <h4>

                                    <i class="fas fa-boxes"></i>

                                    Add Raw Material

                                </h4>

                            </div>

                            <!-- Form Section -->

                            <div class="form-section">

                                <form
                                name="formID"
                                id="formID"
                                method="post"
                                action="raw_materials_insert.php">

                                    <!-- Raw Material Name -->

                                    <div class="form-group">

                                        <label class="form-label">

                                            Raw Material Name

                                        </label>

                                        <input
                                        name="rnm"
                                        type="text"
                                        id="rnm"
                                        class="form-control validate[required]"
                                        placeholder="Enter Raw Material Name">

                                    </div>

                                    <!-- Description -->

                                    <div class="form-group">

                                        <label class="form-label">

                                            Raw Material Description

                                        </label>

                                        <input
                                        name="rde"
                                        type="text"
                                        id="rde"
                                        class="form-control validate[required]"
                                        placeholder="Enter Description">

                                    </div>

                                    <!-- Buttons -->

                                    <div class="button-group">

                                        <!-- Submit -->

                                        <input
                                        type="submit"
                                        name="Submit"
                                        value="Submit"
                                        class="btn btn-premium btn-submit">

                                        <!-- Reset -->

                                        <button
                                        type="button"
                                        class="btn btn-premium btn-reset"
                                        onclick="resetForm()">

                                            Reset

                                        </button>

                                        <!-- Back -->

                                        <a href="raw_materials_view.php"
                                        class="btn btn-premium btn-back">

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

</div>

<?php include('script.php'); ?>

<?php include('val.php'); ?>

<!-- Working Reset Script -->

<script>

function resetForm() {

    document.getElementById("formID").reset();

}

</script>

</body>

</html>