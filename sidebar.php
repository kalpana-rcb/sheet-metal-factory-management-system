<!-- PREMIUM SIDEBAR -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

.sidebar{

    width:270px;

    height:100vh;

    position:fixed;

    top:0;

    left:0;

    background:
    linear-gradient(180deg,#0f172a,#111827,#1e293b);

    box-shadow:5px 0 25px rgba(0,0,0,0.4);

    overflow-y:auto;

    padding-top:20px;

    transition:0.4s;
}

.sidebar::-webkit-scrollbar{
    width:5px;
}

.sidebar::-webkit-scrollbar-thumb{
    background:#334155;
    border-radius:10px;
}

.sidebar-logo{

    text-align:center;

    margin-bottom:30px;
}

.sidebar-logo h2{

    color:white;

    font-size:28px;

    letter-spacing:2px;

    font-weight:700;

    text-shadow:0 2px 10px rgba(0,0,0,0.5);
}

.sidebar-content{

    padding:0 15px;
}

.nav{

    list-style:none;
}

.nav-item{

    margin-bottom:12px;
}

.nav-item a{

    display:flex;

    align-items:center;

    gap:15px;

    text-decoration:none;

    padding:15px 18px;

    border-radius:14px;

    color:#e2e8f0;

    font-size:15px;

    font-weight:500;

    transition:0.4s;

    background:rgba(255,255,255,0.03);

    border:1px solid rgba(255,255,255,0.05);
}

.nav-item a i{

    font-size:18px;

    min-width:25px;

    text-align:center;

    color:#38bdf8;

    transition:0.4s;
}

.nav-item a:hover{

    background:
    linear-gradient(135deg,#2563eb,#7c3aed);

    transform:translateX(5px);

    box-shadow:0 8px 20px rgba(37,99,235,0.4);

    color:white;
}

.nav-item a:hover i{

    color:white;
}

.nav-item.active a{

    background:
    linear-gradient(135deg,#06b6d4,#2563eb);

    color:white;

    box-shadow:0 8px 20px rgba(37,99,235,0.4);
}

.nav-item.active a i{

    color:white;
}

.logout-btn a{

    background:
    linear-gradient(135deg,#dc2626,#ef4444);

    color:white;
}

.logout-btn a i{

    color:white;
}

.logout-btn a:hover{

    background:
    linear-gradient(135deg,#b91c1c,#dc2626);
}

@media(max-width:768px){

    .sidebar{

        width:220px;
    }

    .nav-item a{

        font-size:14px;

        padding:13px 15px;
    }
}

</style>

<!-- SIDEBAR -->

<div class="sidebar">

    <div class="sidebar-logo">

        <h2>SHEET METAL</h2>

    </div>

    <div class="sidebar-content">

        <ul class="nav">

            <li class="nav-item active">
                <a href="raw_materials_view.php">
                    <i class="fas fa-layer-group"></i>
                    <span>Raw Materials</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="raw_materials_supplier_view.php">
                    <i class="fas fa-truck-loading"></i>
                    <span>Raw Supplier</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="raw_material_supply_details_view.php">
                    <i class="fas fa-boxes"></i>
                    <span>Material Supply</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="product_view.php">
                    <i class="fas fa-industry"></i>
                    <span>Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="production_view.php">
                    <i class="fas fa-cogs"></i>
                    <span>Production</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="customer_details_view.php">
                    <i class="fas fa-users"></i>
                    <span>Customers</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="customer_payments_view.php">
                    <i class="fas fa-credit-card"></i>
                    <span>Payments</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="customer_order_master_view.php">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Orders</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="bill_master_view.php">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Billing</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="Stock_detail_view.php">
                    <i class="fas fa-warehouse"></i>
                    <span>Stock Details</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="changepswrd.php">
                    <i class="fas fa-key"></i>
                    <span>Change Password</span>
                </a>
            </li>

            <li class="nav-item logout-btn">
                <a href="../logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>

    </div>

</div>