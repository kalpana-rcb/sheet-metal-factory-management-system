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

/* PREMIUM CARD */

.premium-card{
    border:none;
    border-radius:22px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 8px 30px rgba(0,0,0,0.08);
    animation:fadeIn 0.6s ease;
}

@keyframes fadeIn{

    from{
        opacity:0;
        transform:translateY(20px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}

/* CARD HEADER */

.card-header-premium{
    padding:22px 25px;
    background:linear-gradient(135deg,#0f172a,#1e3a8a,#2563eb);
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:15px;
}

.card-header-premium h4{
    color:#fff;
    margin:0;
    font-size:22px;
    font-weight:600;
}

/* BUTTONS */

.btn{
    border-radius:12px !important;
    padding:10px 18px !important;
    font-weight:600 !important;
    transition:0.3s;
    border:none !important;
}

.btn-primary{
    background:linear-gradient(135deg,#2563eb,#3b82f6);
}

.btn-primary:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(59,130,246,0.35);
}

.btn-info{
    background:linear-gradient(135deg,#0891b2,#06b6d4);
}

.btn-info:hover{
    transform:translateY(-2px);
}

.btn-danger{
    background:linear-gradient(135deg,#dc2626,#ef4444);
}

.btn-danger:hover{
    transform:translateY(-2px);
}

.btn-search{
    background:linear-gradient(135deg,#16a34a,#22c55e);
    color:white !important;
}

.btn-search:hover{
    transform:translateY(-2px);
}

/* SEARCH BOX */

.search-box{
    position:relative;
    display:none;
}

.search-box input{
    width:260px;
    padding:11px 15px 11px 42px;
    border:none;
    border-radius:12px;
    outline:none;
    background:#fff;
    color:#1e293b;
    font-weight:500;
}

.search-box i{
    position:absolute;
    top:13px;
    left:15px;
    color:#64748b;
}

/* TABLE */

.table{
    margin-bottom:0 !important;
}

.table thead{
    background:#eff6ff;
}

.table thead th{
    color:#1e293b;
    font-size:15px;
    font-weight:700;
    padding:16px !important;
    border:none !important;
}

.table tbody tr{
    transition:0.3s;
}

.table tbody tr:hover{
    background:#f8fafc;
    transform:scale(1.003);
}

.table tbody td{
    padding:15px !important;
    vertical-align:middle !important;
    font-weight:500;
    color:#334155;
}

/* RESPONSIVE */

@media(max-width:768px){

    .card-header-premium{
        flex-direction:column;
        align-items:flex-start;
    }

    .search-box input{
        width:100%;
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

                <!-- PAGE HEADER -->

                <div class="page-header">

                    <h4 class="page-title">

                        Raw Material Supply Details

                    </h4>

                </div>

                <!-- TABLE CARD -->

                <div class="row">

                    <div class="col-md-12">

                        <div class="premium-card">

                            <!-- CARD HEADER -->

                            <div class="card-header-premium">

                                <h4>

                                    <i class="fas fa-truck-loading"></i>

                                    Supply Details List

                                </h4>

                                <div style="display:flex; gap:12px; flex-wrap:wrap; align-items:center;">

                                    <!-- ADD BUTTON -->

                                    <a href="raw_material_supply_details_form.php"
                                    class="btn btn-primary">

                                        <i class="fas fa-plus"></i>

                                        Add New

                                    </a>

                                    <!-- SEARCH BUTTON -->

                                    <button
                                    type="button"
                                    class="btn btn-search"
                                    onclick="toggleSearch()">

                                        <i class="fas fa-search"></i>

                                        Search

                                    </button>

                                    <!-- SEARCH BOX -->

                                    <div class="search-box"
                                    id="searchBox">

                                        <i class="fas fa-search"></i>

                                        <input
                                        type="text"
                                        id="searchInput"
                                        placeholder="Search Supply Details...">

                                    </div>

                                </div>

                            </div>

                            <!-- TABLE BODY -->

                            <div class="card-body">

                                <div class="table-responsive">

                                    <table id="supplyTable"
                                    class="table table-hover">

                                        <thead>

<tr>

    <th>Supply Id</th>

    <th>Supplier Name</th>

    <th>Raw Material</th>

    <th>Quantity</th>

    <th>Supply Date</th>

    <th>Edit</th>

    <th>Delete</th>

</tr>

                                        </thead>

                                        <tbody>

<?php

include('database.php');

$sql="SELECT * FROM raw_material_supply_details rd,
raw_materials_supplier rms,
raw_materials rm
WHERE rd.raw_material_supplier_id=rms.raw_material_supplier_id
AND rd.raw_material_id=rm.raw_material_id";

$res=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($res))
{

?>

<tr>

    <td>

        <?php echo $row['supply_id']; ?>

    </td>

    <td>

        <?php echo $row['raw_material_supplier_name']; ?>

    </td>

    <td>

        <?php echo $row['raw_material_name']; ?>

    </td>

    <td>

        <?php echo $row['quantity']; ?>

    </td>

    <td>

        <?php echo $row['supply_date']; ?>

    </td>

    <!-- EDIT BUTTON -->

    <td>

        <a href="raw_material_supply_details_edit.php?s_id=<?php echo $row['supply_id']; ?>"
        class="btn btn-info">

            <i class="fas fa-edit"></i>

            Edit

        </a>

    </td>

    <!-- DELETE BUTTON -->

    <td>

        <a href="raw_material_supply_details_delete.php?s_id=<?php echo $row['supply_id']; ?>"
        class="btn btn-danger">

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

            </div>

        </div>

        <?php include('footer.php'); ?>

    </div>

</div>

<?php include('script.php'); ?>

<!-- SEARCH SCRIPT -->

<script>

// SHOW / HIDE SEARCH BOX

function toggleSearch()
{
    var searchBox = document.getElementById("searchBox");

    if(searchBox.style.display === "block")
    {
        searchBox.style.display = "none";
    }
    else
    {
        searchBox.style.display = "block";
    }
}

// SEARCH FUNCTION

document.getElementById("searchInput").addEventListener("keyup", function(){

    let input = this.value.toLowerCase();

    let rows = document.querySelectorAll("#supplyTable tbody tr");

    rows.forEach(function(row){

        let text = row.innerText.toLowerCase();

        row.style.display = text.includes(input) ? "" : "none";

    });

});

</script>

</body>

</html>