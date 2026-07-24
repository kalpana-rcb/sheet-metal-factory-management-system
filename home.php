<!DOCTYPE html>
<html lang="en">

<?php include('metatag.php'); ?>

<head>

<meta charset="UTF-8">

<title>Admin Dashboard</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

body{
    background:#f4f7fc;
    font-family:'Segoe UI',sans-serif;
}

/* DASHBOARD CARDS */

.dashboard-card{
    border-radius:18px;
    padding:25px;
    margin-bottom:25px;
    color:white;
    position:relative;
    overflow:hidden;
    box-shadow:0 6px 18px rgba(0,0,0,0.08);
    transition:0.4s;
    animation:fadeIn 1s ease;
}

.dashboard-card:hover{
    transform:translateY(-6px);
}

.dashboard-card::before{
    content:'';
    position:absolute;
    top:-40px;
    right:-40px;
    width:120px;
    height:120px;
    background:rgba(255,255,255,0.1);
    border-radius:50%;
}

.dashboard-card h5{
    font-size:16px;
    font-weight:500;
    margin-bottom:12px;
    letter-spacing:1px;
}

.dashboard-card h2{
    font-size:38px;
    font-weight:700;
}

/* PROFESSIONAL COLORS */

.bg1{
    background:linear-gradient(135deg,#1e3c72,#2a5298);
}

.bg2{
    background:linear-gradient(135deg,#134e5e,#71b280);
}

.bg3{
    background:linear-gradient(135deg,#42275a,#734b6d);
}

.bg4{
    background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
}

/* CHART BOX */

.chart-box{
    background:white;
    border-radius:18px;
    padding:20px;
    margin-bottom:25px;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
    transition:0.3s;
}

.chart-box:hover{
    transform:translateY(-3px);
}

.chart-box h4{
    margin-bottom:20px;
    color:#2d3436;
    font-weight:600;
}

/* PRODUCT BOX */

.product-box{
    background:white;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
    transition:0.4s;
    margin-bottom:25px;
}

.product-box:hover{
    transform:translateY(-5px);
}

.product-box img{
    width:100%;
    height:240px;
    object-fit:cover;
}

.product-content{
    padding:18px;
}

.product-content h4{
    font-size:20px;
    font-weight:600;
    color:#2d3436;
    margin-bottom:10px;
}

.product-content h5{
    color:#27ae60;
    font-weight:bold;
    font-size:18px;
}

/* CARD */

.card{
    border:none;
    border-radius:18px;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
}

.card-header{
    background:#1f2937;
    color:white;
    font-size:20px;
    font-weight:600;
    padding:18px;
    border-radius:18px 18px 0 0 !important;
}

.card-body{
    background:#fff;
    border-radius:0 0 18px 18px;
}

/* PAGE TITLE */

.page-title{
    color:#1f2937;
    font-weight:bold;
}

/* ANIMATION */

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

</style>

</head>

<body>

<div class="wrapper">

<div class="main-header">
<?php include('header.php'); ?>
</div>

<?php include('sidebar.php'); ?>

<div class="main-panel">

<div class="content">

<div class="page-inner">

<div class="page-header">
<h4 class="page-title">Admin Dashboard</h4>
</div>

<?php

include('database.php');

$product_count = mysqli_num_rows(mysqli_query($conn,"select * from product"));

$customer_count = mysqli_num_rows(mysqli_query($conn,"select * from customer_details"));

$order_count = mysqli_num_rows(mysqli_query($conn,"select * from customer_order_master"));

$employee_count = mysqli_num_rows(mysqli_query($conn,"select * from employee_details"));

$sales_query=mysqli_query($conn,"select sum(payment_amount) as total from customer_payments");
$sales_row=mysqli_fetch_array($sales_query);
$total_sales=$sales_row['total'];

?>

<!-- TOP CARDS -->

<div class="row">

<div class="col-md-3">
<div class="dashboard-card bg1">
<h5>Total Products</h5>
<h2><?php echo $product_count; ?></h2>
</div>
</div>

<div class="col-md-3">
<div class="dashboard-card bg2">
<h5>Total Customers</h5>
<h2><?php echo $customer_count; ?></h2>
</div>
</div>

<div class="col-md-3">
<div class="dashboard-card bg3">
<h5>Total Orders</h5>
<h2><?php echo $order_count; ?></h2>
</div>
</div>

<div class="col-md-3">
<div class="dashboard-card bg4">
<h5>Total Sales</h5>
<h2>Rs. <?php echo $total_sales; ?></h2>
</div>
</div>

</div>

<!-- CHARTS -->

<div class="row">

<div class="col-md-6">
<div class="chart-box">
<h4>Stock Details</h4>
<canvas id="stockChart"></canvas>
</div>
</div>

<div class="col-md-6">
<div class="chart-box">
<h4>Production Report</h4>
<canvas id="productionChart"></canvas>
</div>
</div>

<div class="col-md-6">
<div class="chart-box">
<h4>Customer Orders</h4>
<canvas id="orderChart"></canvas>
</div>
</div>

<div class="col-md-6">
<div class="chart-box">
<h4>Employee Salary</h4>
<canvas id="salaryChart"></canvas>
</div>
</div>

</div>

<!-- PRODUCTS -->

<div class="card">

<div class="card-header">
Water Bottle Products
</div>

<div class="card-body">

<div class="row">

<?php

$sql="select * from product";
$res=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($res))
{

?>

<div class="col-md-4">

<div class="product-box">

<img src="../uploads/<?php echo $row['photo'];?>">

<div class="product-content">

<h4><?php echo $row['product_name']; ?></h4>

<h5>Rs. <?php echo $row['rate']; ?></h5>

</div>

</div>

</div>

<?php
}
?>

</div>

</div>

</div>

</div>

</div>

<?php include('footer.php'); ?>

</div>

</div>

<?php include('script.php'); ?>

<?php

// STOCK DATA

$stock_name=[];
$stock_qty=[];

$stock=mysqli_query($conn,"
select product.product_name,stock_details.stock 
from stock_details 
inner join product on product.product_id=stock_details.product_id
");

while($s=mysqli_fetch_array($stock))
{
    $stock_name[]=$s['product_name'];
    $stock_qty[]=$s['stock'];
}

// PRODUCTION DATA

$prod_name=[];
$prod_qty=[];

$prod=mysqli_query($conn,"
select product.product_name,production.quantity
from production
inner join product on product.product_id=production.product_id
");

while($p=mysqli_fetch_array($prod))
{
    $prod_name[]=$p['product_name'];
    $prod_qty[]=$p['quantity'];
}

// ORDER DATA

$order_name=[];
$order_qty=[];

$order=mysqli_query($conn,"
select product.product_name,customer_order_details.quantity
from customer_order_details
inner join product on product.product_id=customer_order_details.product_id
");

while($o=mysqli_fetch_array($order))
{
    $order_name[]=$o['product_name'];
    $order_qty[]=$o['quantity'];
}

// SALARY DATA

$emp_name=[];
$emp_sal=[];

$salary=mysqli_query($conn,"
select employee_details.employee_name,emp_salary.basic_sal
from emp_salary
inner join employee_details on employee_details.employee_id=emp_salary.employee_id
");

while($e=mysqli_fetch_array($salary))
{
    $emp_name[]=$e['employee_name'];
    $emp_sal[]=$e['basic_sal'];
}

?>

<script>

/* COMMON COLORS */

const chartColors = [
'#1e3c72',
'#2a5298',
'#134e5e',
'#71b280',
'#42275a',
'#734b6d',
'#00b894',
'#0984e3'
];

/* STOCK CHART */

new Chart(document.getElementById('stockChart'),{

type:'bar',

data:{
labels:<?php echo json_encode($stock_name); ?>,

datasets:[{
label:'Stock',
data:<?php echo json_encode($stock_qty); ?>,
backgroundColor:chartColors,
borderRadius:8
}]
},

options:{
responsive:true,
plugins:{
legend:{
display:false
}
},
animation:{
duration:2000
}
}

});

/* PRODUCTION CHART */

new Chart(document.getElementById('productionChart'),{

type:'line',

data:{
labels:<?php echo json_encode($prod_name); ?>,

datasets:[{
label:'Production',
data:<?php echo json_encode($prod_qty); ?>,
borderColor:'#134e5e',
backgroundColor:'rgba(19,78,94,0.15)',
fill:true,
tension:0.4,
pointBackgroundColor:'#134e5e',
pointRadius:5
}]
},

options:{
responsive:true,
animation:{
duration:2000
}
}

});

/* ORDER CHART */

new Chart(document.getElementById('orderChart'),{

type:'pie',

data:{
labels:<?php echo json_encode($order_name); ?>,

datasets:[{
data:<?php echo json_encode($order_qty); ?>,
backgroundColor:chartColors
}]
},

options:{
responsive:true,
animation:{
duration:2000
}
}

});

/* SALARY CHART */

new Chart(document.getElementById('salaryChart'),{

type:'doughnut',

data:{
labels:<?php echo json_encode($emp_name); ?>,

datasets:[{
data:<?php echo json_encode($emp_sal); ?>,
backgroundColor:chartColors
}]
},

options:{
responsive:true,
animation:{
duration:2000
}
}

});

</script>

</body>
</html>