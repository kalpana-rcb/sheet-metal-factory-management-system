<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<body>

<div class="wrapper">

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

                            <i class="fas fa-box-open mr-2"></i>

                            Product Details

                        </h4>

                    </div>

                </div>

                <!-- Product Card -->

                <div class="col-md-12">

                    <div class="card shadow-lg border-0">

                        <!-- Card Header -->

                        <div class="card-header text-white"
                             style="background: linear-gradient(135deg,#0f172a,#1e3a8a,#2563eb); border-radius:10px 10px 0 0;">

                            <div class="d-flex justify-content-between align-items-center flex-wrap">

                                <!-- Add Button -->

                                <a href="product_form.php"
                                   class="btn btn-light btn-round shadow-sm">

                                    <i class="fas fa-plus"></i>

                                    Add Product

                                </a>

                                <!-- Search Section -->

                                <div class="mt-2 mt-md-0 d-flex align-items-center">

                                    <!-- Search Button -->

                                    <button
                                    class="btn btn-warning shadow-sm"
                                    type="button"
                                    onclick="toggleSearchBar()">

                                        <i class="fas fa-search"></i>

                                        Search

                                    </button>

                                    <!-- Search Box -->

                                    <div
                                    id="searchBox"
                                    style="display:none; margin-left:10px;">

                                        <div class="input-group">

                                            <input
                                            type="text"
                                            id="productSearch"
                                            class="form-control"
                                            placeholder="Search Product..."
                                            style="border-radius:30px 0 0 30px; border:none;">

                                            <div class="input-group-append">

                                                <button
                                                class="btn btn-warning"
                                                type="button"
                                                style="border-radius:0 30px 30px 0;">

                                                    <i class="fas fa-search"></i>

                                                </button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Card Body -->

                        <div class="card-body">

                            <div class="table-responsive">

                                <table id="productTable"
                                       class="display table table-hover table-striped align-items-center">

                                    <thead class="thead-dark">

                                        <tr>

                                            <th>Product ID</th>

                                            <th>Product Name</th>

                                            <th>Rate</th>

                                            <th>Product Image</th>

                                            <th>Edit</th>

                                            <th>Delete</th>

                                        </tr>

                                    </thead>

                                    <tbody>

<?php

include('database.php');

$sql = "SELECT * FROM product";

$res = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{

?>

<tr>

    <td>

        <?php echo $row['product_id']; ?>

    </td>

    <td class="fw-bold text-dark">

        <?php echo $row['product_name']; ?>

    </td>

    <td>

        Rs. <?php echo $row['rate']; ?>

    </td>

    <td>

        <img
        src="../uploads/<?php echo $row['photo']; ?>"
        width="120"
        height="100"
        style="border-radius:12px;
               object-fit:cover;
               border:3px solid #dee2e6;
               box-shadow:0 4px 10px rgba(0,0,0,0.2);">

    </td>

    <!-- Edit Button -->

    <td>

        <a href="product_edit.php?p_id=<?php echo $row['product_id']; ?>"
           class="btn btn-info btn-sm shadow">

            <i class="fas fa-edit"></i>

            Edit

        </a>

    </td>

    <!-- Delete Button -->

    <td>

        <a href="product_delete.php?p_id=<?php echo $row['product_id']; ?>"
           class="btn btn-danger btn-sm shadow"
           onclick="return confirm('Are you sure you want to delete this product?');">

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

        <?php include('footer.php'); ?>

    </div>

</div>

<?php include('script.php'); ?>

<!-- Search Script -->

<script>

// SHOW / HIDE SEARCH BAR

function toggleSearchBar()
{
    var searchBox = document.getElementById("searchBox");

    if(searchBox.style.display === "none")
    {
        searchBox.style.display = "block";
    }
    else
    {
        searchBox.style.display = "none";
    }
}

// SEARCH FUNCTION

document.getElementById("productSearch").addEventListener("keyup", function(){

    let filter = this.value.toLowerCase();

    let rows = document.querySelectorAll("#productTable tbody tr");

    rows.forEach(function(row){

        let text = row.innerText.toLowerCase();

        row.style.display = text.includes(filter) ? "" : "none";

    });

});

</script>

</body>

</html>