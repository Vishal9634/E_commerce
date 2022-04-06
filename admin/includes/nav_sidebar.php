<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php" style="padding-top:20px;"><strong style="font-size:24px">DevShop</strong> Admin panel v1.0</a>
    </div>

    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw fa-2x"></i> <i class="fa fa-caret-down fa-lg"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                
                <li class="sidebar-search">   
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </li> 
                
                <li><a href="#"><i class="fa fa-user fa-fw fa-lg"></i> My Profile</a></li>
                <li><a href="#"><i class="fa fa-dashboard fa-fw fa-lg"></i> Dashboard</a></li>
                
                <li><a href="insert_new_product.php"><i class="fa fa-product-hunt fa-fw fa-lg"></i>Insert New Product</a></li>
                <li><a href="insert_new_category.php"><i class="fa fa-product-hunt fa-fw fa-lg"></i>Insert New Category</a></li>
                <li><a href="insert_new_brand.php"><i class="fa fa-product-hunt fa-fw fa-lg"></i>Insert New Brand</a></li>
                
                
                
                <li><a href="view_all_products.php"><i class="fa fa-product-hunt fa-fw fa-lg"></i>View All Products</a></li>
                <li><a href="view_all_categories.php"><i class="fa fa-product-hunt fa-fw fa-lg"></i>View All Categories</a></li>
                <li><a href="view_all_brands.php"><i class="fa fa-product-hunt fa-fw fa-lg"></i>View All Brands</a></li>
                
                <li><a href="view_all_orders.php"><i class="fa fa-dashboard fa-fw fa-lg"></i>View Orders</a></li>
                <li><a href="view_all_customers.php"><i class="fa fa-product-hunt fa-fw fa-lg"></i>View Customers</a></li>
                <li><a href="view_payments.php"><i class="fa fa-product-hunt fa-fw fa-lg"></i>View Payments</a></li>
                <li><a href="logout.php"><i class="fa fa-power-off fa-fw fa-lg"></i>Log out</a></li>
            </ul>
        </div>
    </div>
</nav>
