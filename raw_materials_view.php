<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<head>

<style>

body{
    background:#f1f5f9;
    font-family:'Poppins',sans-serif;
}

.page-header{
    margin-bottom:25px;
}

.page-title{
    font-size:30px;
    font-weight:700;
    color:#0f172a;
    letter-spacing:1px;
}

.card{
    border:none;
    border-radius:20px;
    overflow:hidden;
    background:white;
    box-shadow:0 8px 30px rgba(0,0,0,0.08);
    animation:fadeIn 0.8s ease;
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

.card-header{

    background:linear-gradient(135deg,#0f172a,#1e3a8a);

    padding:20px;

    border:none;

    display:flex;

    justify-content:space-between;

    align-items:center;

    flex-wrap:wrap;

    gap:15px;
}

.btn-primary{

    background:linear-gradient(135deg,#2563eb,#7c3aed);

    border:none;

    border-radius:12px;

    padding:12px 20px;

    font-weight:600;

    transition:0.4s;

    color:white;
}

.btn-primary:hover{

    transform:translateY(-2px);

    box-shadow:0 8px 20px rgba(37,99,235,0.4);
}

.search-box{

    display:flex;

    gap:10px;

    align-items:center;
}

.search-box input{

    padding:12px 15px;

    border:none;

    border-radius:12px;

    outline:none;

    width:260px;

    background:white;

    font-size:14px;

    transition:0.3s;
}

.search-box input:focus{

    box-shadow:0 0 10px rgba(37,99,235,0.3);

    border:2px solid #2563eb;
}

.search-btn{

    background:linear-gradient(135deg,#06b6d4,#0ea5e9);

    border:none;

    border-radius:12px;

    padding:12px 18px;

    color:white;

    font-weight:600;

    cursor:pointer;

    transition:0.3s;
}

.search-btn:hover{

    transform:translateY(-2px);

    box-shadow:0 8px 20px rgba(14,165,233,0.4);
}

.table-responsive{

    padding:15px;
}

table{

    width:100%;

    border-collapse:separate;

    border-spacing:0 12px;
}

table thead tr{

    background:#0f172a;

    color:white;
}

table thead th{

    padding:16px;

    border:none;

    font-size:15px;

    font-weight:600;

    text-align:center;
}

table tbody tr{

    background:white;

    transition:0.3s;

    box-shadow:0 4px 15px rgba(0,0,0,0.05);
}

table tbody tr:hover{

    transform:scale(1.01);

    box-shadow:0 8px 20px rgba(0,0,0,0.08);
}

table tbody td{

    padding:18px;

    vertical-align:middle;

    border-top:none !important;

    text-align:center;

    font-size:15px;

    color:#334155;

    font-weight:500;
}

.btn-info{

    background:linear-gradient(135deg,#06b6d4,#2563eb);

    border:none;

    border-radius:10px;

    padding:8px 15px;

    color:white;

    transition:0.3s;
}

.btn-info:hover{

    transform:translateY(-2px);

    box-shadow:0 6px 15px rgba(37,99,235,0.3);
}

.btn-danger{

    background:linear-gradient(135deg,#ef4444,#dc2626);

    border:none;

    border-radius:10px;

    padding:8px 15px;

    color:white;

    transition:0.3s;
}

.btn-danger:hover{

    transform:translateY(-2px);

    box-shadow:0 6px 15px rgba(239,68,68,0.3);
}

.badge-id{

    background:#dbeafe;

    color:#1e40af;

    padding:6px 12px;

    border-radius:20px;

    font-weight:600;
}

@media(max-width:768px){

    .card-header{

        flex-direction:column;

        align-items:flex-start;
    }

    .search-box{

        width:100%;
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

                <div class="page-header">

                    <h4 class="page-title">

                        Raw Materials

                    </h4>

                </div>

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">

                            <!-- Add Button -->

                            <a href="raw_materials_form.php"
                               class="btn btn-primary">

                                <i class="fas fa-plus"></i>

                                Add New Material

                            </a>

                            <!-- Search Box -->

                            <div class="search-box">

                                <input type="text"
                                       id="searchInput"
                                       placeholder="Search Material...">

                                <button type="button"
                                        class="search-btn"
                                        onclick="searchTable()">

                                    <i class="fas fa-search"></i>

                                    Search

                                </button>

                            </div>

                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                                <table id="materialTable"
                                       class="display table table-hover">

                                    <thead>

                                        <tr>

                                            <th>ID</th>

                                            <th>Material Name</th>

                                            <th>Description</th>

                                            <th>Edit</th>

                                            <th>Delete</th>

                                        </tr>

                                    </thead>

                                    <tbody>

<?php

$sr=1;

include('database.php');

$sql="select * from raw_materials";

$res=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($res))
{
?>

<tr>

<td>

<span class="badge-id">

<?php echo $sr++;?>

</span>

</td>

<td>

<?php echo $row['raw_material_name'];?>

</td>

<td>

<?php echo $row['raw_material_description'];?>

</td>

<td>

<a href="raw_materials_edit.php?r_id=<?php echo $row['raw_material_id'];?>"
   class="btn btn-info">

<i class="fas fa-edit"></i>

Edit

</a>

</td>

<td>

<a href="raw_materials_delete.php?r_id=<?php echo $row['raw_material_id'];?>"
   class="btn btn-danger"
   onclick="return confirm('Are you sure want to delete?')">

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

function searchTable() {

    let input = document.getElementById("searchInput").value.toLowerCase().trim();

    let table = document.getElementById("materialTable");

    let tbody = table.getElementsByTagName("tbody")[0];

    let rows = tbody.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {

        let row = rows[i];

        let cells = row.getElementsByTagName("td");

        let found = false;

        for (let j = 0; j < cells.length; j++) {

            let text = cells[j].textContent || cells[j].innerText;

            if (text.toLowerCase().indexOf(input) > -1) {

                found = true;

                break;
            }
        }

        row.style.display = found ? "" : "none";
    }
}

/* Live Search */

document.getElementById("searchInput").addEventListener("keyup", function(event) {

    searchTable();

    if(event.key === "Enter"){

        searchTable();
    }
});

</script>

</body>

</html>