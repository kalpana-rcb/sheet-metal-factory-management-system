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
                            <i class="fas fa-box-open mr-2"></i>
                            Product Details
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
                                Add Product
                            </li>
                        </ul>

                    </div>

                    <!-- Back Button -->
                    <div>

                        <a href="product_view.php"
                           class="btn btn-dark btn-round shadow">

                            <i class="fas fa-arrow-left"></i>
                            Back

                        </a>

                    </div>

                </div>

                <!-- Form Card -->
                <div class="row">

                    <div class="col-md-8 mx-auto">

                        <div class="card shadow-lg border-0">

                            <!-- Card Header -->
                            <div class="card-header text-white"
                                 style="background: linear-gradient(135deg,#0f172a,#1e3a8a,#2563eb); border-radius:10px 10px 0 0;">

                                <div class="card-title fw-bold">

                                    <i class="fas fa-plus-circle"></i>
                                    Add New Product

                                </div>

                            </div>

                            <!-- Card Body -->
                            <div class="card-body p-5">

<form action="product_insert.php"
      method="post"
      enctype="multipart/form-data"
      name="formID"
      id="formID">

<div class="row">

    <!-- Product Name -->
    <div class="col-md-12 mb-4">

        <label class="fw-bold text-dark">
            Product Name
        </label>

        <input name="pn"
               type="text"
               id="pn"
               placeholder="Enter Product Name"
               class="form-control validate[required,custom[onlyLetter]]"
               style="height:50px; border-radius:12px;">

    </div>

    <!-- Rate -->
    <div class="col-md-12 mb-4">

        <label class="fw-bold text-dark">
            Product Rate
        </label>

        <input name="pr"
               type="text"
               placeholder="Enter Price in Rs."
               id="pr"
               class="form-control validate[required,custom[onlyNumber]]"
               style="height:50px; border-radius:12px;">

    </div>

    <!-- Photo Upload -->
    <div class="col-md-12 mb-4">

        <label class="fw-bold text-dark">
            Product Photo
        </label>

        <div class="custom-file">

            <input name="photo"
                   type="file"
                   id="photo"
                   class="custom-file-input form-control"
                   style="padding:10px; border-radius:12px;">

            <label class="custom-file-label"
                   for="photo">

                Choose Product Image

            </label>

        </div>

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

<!-- File Upload Name Script -->
<script>

document.querySelector(".custom-file-input").addEventListener("change", function(e){

    var fileName = document.getElementById("photo").files[0].name;

    var nextSibling = e.target.nextElementSibling;

    nextSibling.innerText = fileName;

});

</script>

</body>
</html>