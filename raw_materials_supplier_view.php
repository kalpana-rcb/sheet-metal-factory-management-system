<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<head>

    <title>Raw Material Supplier Details</title>

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
            border-radius:22px;
            overflow:hidden;
            background:#ffffff;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }

        .premium-header{
            background:linear-gradient(135deg,#0f172a,#2563eb);
            padding:22px;
            color:white;
            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
            gap:15px;
        }

        .premium-header h4{
            margin:0;
            font-size:28px;
            font-weight:700;
        }

        .top-buttons{
            display:flex;
            gap:12px;
            flex-wrap:wrap;
        }

        .btn-premium{
            border:none;
            border-radius:12px;
            padding:11px 22px;
            font-size:15px;
            font-weight:600;
            transition:0.3s;
            text-decoration:none;
            display:inline-flex;
            align-items:center;
            gap:8px;
            cursor:pointer;
        }

        .btn-add{
            background:linear-gradient(135deg,#06b6d4,#2563eb);
            color:white;
        }

        .btn-search{
            background:linear-gradient(135deg,#16a34a,#22c55e);
            color:white;
        }

        .btn-premium:hover{
            transform:translateY(-2px);
            color:white;
            text-decoration:none;
            box-shadow:0 8px 20px rgba(0,0,0,0.18);
        }

        .card-body{
            padding:25px;
        }

        .search-box{
            margin-bottom:20px;
            position:relative;
            display:none;
        }

        .search-box input{
            width:100%;
            height:50px;
            border-radius:14px;
            border:1px solid #cbd5e1;
            padding-left:50px;
            font-size:15px;
            outline:none;
            transition:0.3s;
            background:#f8fafc;
            box-sizing:border-box;
        }

        .search-box input:focus{
            border-color:#2563eb;
            box-shadow:0 0 10px rgba(37,99,235,0.15);
            background:white;
        }

        .search-box i{
            position:absolute;
            left:18px;
            top:17px;
            color:#64748b;
        }

        table{
            width:100%;
            border-collapse:collapse;
            border-radius:15px;
            overflow:hidden;
        }

        table thead{
            background:linear-gradient(135deg,#1e293b,#334155);
            color:white;
        }

        table thead th{
            border:none;
            padding:16px;
            font-size:15px;
            text-align:left;
        }

        table tbody td{
            vertical-align:middle;
            padding:15px;
            font-size:14px;
            color:#334155;
            border-bottom:1px solid #e2e8f0;
        }

        table tbody tr{
            transition:0.3s;
        }

        table tbody tr:hover{
            background:#eff6ff;
        }

        .btn-edit{
            background:linear-gradient(135deg,#0ea5e9,#2563eb);
            color:white;
            border:none;
            border-radius:10px;
            padding:8px 16px;
            font-size:14px;
            font-weight:600;
            text-decoration:none;
        }

        .btn-delete{
            background:linear-gradient(135deg,#ef4444,#dc2626);
            color:white;
            border:none;
            border-radius:10px;
            padding:8px 16px;
            font-size:14px;
            font-weight:600;
            text-decoration:none;
        }

        .btn-edit:hover,
        .btn-delete:hover{
            color:white;
            text-decoration:none;
            transform:translateY(-2px);
        }

        @media(max-width:768px){

            .premium-header{
                flex-direction:column;
                align-items:flex-start;
            }

            .premium-header h4{
                font-size:24px;
            }

        }

    </style>

</head>

<body>

<div class="wrapper">

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

                        Raw Material Supplier Details

                    </h4>

                </div>

                <div class="col-md-12">

                    <div class="premium-card">

                        <!-- Header -->

                        <div class="premium-header">

                            <h4>

                                <i class="fas fa-truck-loading"></i>

                                Supplier Management

                            </h4>

                            <div class="top-buttons">

                                <!-- Add Supplier Button -->

                                <a href="raw_materials_supplier_form.php"
                                class="btn-premium btn-add">

                                    <i class="fas fa-plus"></i>

                                    Add Supplier

                                </a>

                                <!-- Search Button -->

                                <a href="javascript:void(0)"
                                class="btn-premium btn-search"
                                onclick="toggleSearch()">

                                    <i class="fas fa-search"></i>

                                    Search Supplier

                                </a>

                            </div>

                        </div>

                        <!-- Body -->

                        <div class="card-body">

                            <!-- Search Box -->

                            <div class="search-box" id="searchSection">

                                <i class="fas fa-search"></i>

                                <input
                                type="text"
                                id="supplierSearch"
                                placeholder="Search Supplier Name, City or Address...">

                            </div>

                            <!-- Table -->

                            <div class="table-responsive">

                                <table id="supplierTable">

                                    <thead>

                                        <tr>

                                            <th>Supplier ID</th>

                                            <th>Supplier Name</th>

                                            <th>City</th>

                                            <th>Address</th>

                                            <th>Edit</th>

                                            <th>Delete</th>

                                        </tr>

                                    </thead>

                                    <tbody>

<?php

include('database.php');

$sql = "SELECT * FROM raw_materials_supplier";

$res = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($res))
{

?>

<tr>

    <td>

        <?php echo $row['raw_material_supplier_id']; ?>

    </td>

    <td>

        <?php echo $row['raw_material_supplier_name']; ?>

    </td>

    <td>

        <?php echo $row['raw_material_supplier_city']; ?>

    </td>

    <td>

        <?php echo $row['raw_material_supplier_address']; ?>

    </td>

    <td>

        <a
        href="raw_materials_supplier_edit.php?r_id=<?php echo $row['raw_material_supplier_id']; ?>"
        class="btn-edit">

            <i class="fas fa-edit"></i>

            Edit

        </a>

    </td>

    <td>

        <a
        href="raw_materials_supplier_delete.php?r_id=<?php echo $row['raw_material_supplier_id']; ?>"
        class="btn-delete">

            <i class="fas fa-trash"></i>

            Delete

        </a>

    </td>

</tr>

<?php

}

?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <?php include('footer.php'); ?>

        </div>

    </div>

</div>

<?php include('script.php'); ?>

<script>

    // SHOW / HIDE SEARCH BAR

    function toggleSearch()
    {
        let searchBox = document.getElementById("searchSection");

        if(searchBox.style.display === "none" || searchBox.style.display === "")
        {
            searchBox.style.display = "block";
        }
        else
        {
            searchBox.style.display = "none";
        }
    }

    // SEARCH FUNCTION

    document.getElementById("supplierSearch").addEventListener("keyup", function() {

        let input = this.value.toLowerCase();

        let rows = document.querySelectorAll("#supplierTable tbody tr");

        rows.forEach(function(row) {

            let text = row.innerText.toLowerCase();

            if(text.includes(input))
            {
                row.style.display = "";
            }
            else
            {
                row.style.display = "none";
            }

        });

    });

</script>

</body>

</html>