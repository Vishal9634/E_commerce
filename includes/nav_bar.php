<style>
#my_navbar {
    background-color:#ff0080;
    color: #FFFFFF;
}

.row1{
    padding-top: 10px;
}

.row2 {
    padding-bottom: 20px;
}

.input_user_query{
    padding: 11px 16px;
    border-radius: 2px 0 0 2px;
    border: 0 none;
    outline: 0 none;
    font-size: 15px;
}

.navbar_button {
    background-color: #970149;
    border: 1px solid #970149;
    border-radius: 0 2px 2px 0;
    color: #565656;
    padding: 10px 0;
    height: 43px;
    cursor: pointer;
}

.cart_button {
    background-color:#970149;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .23), inset 1px 1px 0 0 hsla(0, 0%, 100%, .2);
    padding: 10px 0;
    text-align: center;
    height: 41px;
    border-radius: 2px;
    font-weight: 500;
    width: 120px;
    display: inline-block;
    color: #FFFFFF;
    text-decoration: none;
    color: inherit;
    border: none;
    outline: none;
}

.cart_button:hover{
    text-decoration: none;
    color: #fff;
    cursor: pointer;
}

.cart_svg {
    display: inline-block;
    width: 16px;
    height: 16px;
    vertical-align: middle;
    margin-right: 8px;
}

.item_number {
    border-radius: 3px;
    background-color: rgba(0, 0, 0, .1);
    height: 20px;
    padding: 3px 6px;
    font-weight: 500;
    display: inline-block;
    color: #fff;
    line-height: 12px;
    margin-left: 10px;
}

.upper_links {
    display: inline-block;
    padding: 0 11px;
    line-height: 23px;
    font-family: 'Roboto', sans-serif;
    letter-spacing: 0;
    color: inherit;
    border: none;
    outline: none;
    font-size: 12px;
}

.dropdown {
    color:blue
    position: relative;
    display: inline-block;
    margin-bottom: 0px;
}

.dropdown:hover {
    background-color: #fff;
}

.dropdown:hover .links {
    color: #000;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown .dropdown-menu {
    position: absolute;
    top: 100%;
    display: none;
    background-color: #fff;
    color: #333;
    left: 0px;
    border: 0;
    border-radius: 0;
    box-shadow: 0 4px 8px -3px #555454;
    margin: 0;
    padding: 0px;
}

.links {
    color: #fff;
    text-decoration: none;
}

.links:hover {
    color: #fff;
    text-decoration: none;
}

.profile-links {
    font-size: 12px;
    font-family: 'Roboto', sans-serif;
    border-bottom: 1px solid #e9e9e9;
    box-sizing: border-box;
    display: block;
    padding: 0 11px;
    line-height: 23px;
}

.profile-li{
    padding-top: 2px;
}

.largenav {
    display: none;
}

.smallnav{
    display: block;
}

.smallsearch{
    margin-left: 15px;
    margin-top: 15px;
}

.menu{
    cursor: pointer;
}
@media screen and (min-width: 768px) {
    .largenav {
        display: block;
    }
    .smallnav{
        display: none;
    }
    .smallsearch{
        margin: 0px;
    }
}
@media screen and (max-height: 450px) {
  .sidenav a {font-size: 18px;}
}

/*Sidenav*/
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #fff;
    overflow-x: hidden;
    transition: 0.5s;
    box-shadow: 0 4px 8px -3px #555454;
    padding-top: 0px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s
}
.sidenav a:hover{
    color:black;
    font-weight:bold;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 0px;
    font-weight:bold;
    font-size: 4em;
    margin-left: 50px;
    color: #fff;  
    animation:blinking .3s infinite alternate;
}

.sidenav-heading{
    font-size: 36px;
    color: #fff;
}

  
</style>
<?php include_once('includes/connection.php');?>

    <div id="my_navbar"  data-spy="affix" data-offset-top="33">
                <div class="container">
                    <!--Row1--------------------------------------------------------------------------------->                
                    <div class="row row1">
                        <ul class="largenav pull-right">
                            <li class="upper_links"><a class="links" href="index.php">Home</a></li>
                            <li class="upper_links"><a class="links" href="all_products.php">All Products</a></li>
                            <li class="upper_links"><a class="links" href="aboutus.php">About Us</a></li>
                            <li class="upper_links"><a class="links" href="contactus.php">Contact Us</a></li>
                            <li class="upper_links"><a class="links" href="my_account.php">My Acount</a></li>
                            <!--Bell------------------------------------------------------------------------>
                            <!--
                            <li class="upper_links">
                                <a class="links" href="#">
                                    <svg class="" width="16px" height="12px" style="overflow: visible;">
                                        <path d="M8.037 17.546c1.487 0 2.417-.93 2.417-2.417H5.62c0 1.486.93 2.415 2.417 2.415m5.315-6.463v-2.97h-.005c-.044-3.266-1.67-5.46-4.337-5.98v-.81C9.01.622 8.436.05 7.735.05 7.033.05 6.46.624 6.46 1.325v.808c-2.667.52-4.294 2.716-4.338 5.98h-.005v2.972l-1.843 1.42v1.376h14.92v-1.375l-1.842-1.42z" fill="#fff"></path>
                                    </svg>
                                </a>
                            </li>
                            -->
                            <!--Brand----------------------------------------------------------------------->
                            <li class="upper_links dropdown"><a class="links" href="#">Brands</a>
                                <ul class="dropdown-menu">
                                    <?php getBrands(); ?>
                                </ul>
                            </li>
                            <!--Category------------------------------------------------------------------->
                            <li class="upper_links dropdown"><a class="links" href="#">Categories</a>
                                <ul class="dropdown-menu">
                                   <?php getCats(); ?> 
                                </ul>
                            </li>
                            <?php
                                if(!empty($_SESSION['customer_email'])){
                                    echo "<li class='upper_links'>
                                            <span class='glyphicon glyphicon-log-out'></span>
                                            <a class='links' href='c_logout.php'>Log Out</a>
                                        </li>";
                                }else{
                                    echo "<li class='upper_links'>
                                            <span class='glyphicon glyphicon-log-in'></span>
                                            <a class='links' href='c_login.php'>Log In</a>
                                        </li>";
                                    
                                }
                            ?>
                        </ul>
                    </div>
                    <!--Row2--------------------------------------------------------------------------------->                    
                    <div class="row row2">
                        <div class="col-sm-2">
                            <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ Dev Shop</span></h2>
                            <h1 style="margin:0px;"><span class="largenav" style="font-family: Rockwell" >DevShop</span></h1>
                        </div>
                        <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                            <div class="row">
                                <form action="results.php" method="get">    
                                    <input class="input_user_query col-xs-11" type="text" name="user_query" placeholder="Search for Products, Brands and more" style="color:gray">
                                    <button class="navbar_button col-xs-1" type="submit" name="search">
                                        <span class="glyphicon glyphicon-search" style="color:white;font-size:1.4em"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!--Cart------------------------------------------------------------------------>                        
                        <div class="cart largenav col-sm-2">
                            <a class="cart_button" href="cart.php">
                                <svg class="cart_svg " width="16 " height="16 " viewBox="0 0 16 16 ">
                                    <path d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86 " fill="#fff "></path>
                                </svg> Cart
                                <span class="item_number "><?php items(); ?></span>
                            </a>
                        </div>
                        
                    </div>
                </div>
                <!--Side Nav------------------------------------------------------------------------------>
                <div id="mySidenav" class="sidenav">
                    <div class="container" style="background-color:#ff0080;padding-bottom:5px;">
                        <span class="sidenav_heading" ><h1>Dev Shop</h1></span>
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
                            <span style="color:#fff;" class="glyphicon glyphicon-arrow-left"></span>
                        </a>
                    </div>
                        <a class="links" href="index.php">Home</a>
                        <a class="links" href="all_products.php">All Products</a>
                        <a class="links" href="aboutus.php">About Us</a>
                        <a class="links" href="contactus.php">Contact Us</a>
                        <a class="links" href="my_account.php">My Acount</a>
                        <a class="links" href="cart.php">Cart(<?php items(); ?>)</a>
                        <?php
                                if(!empty($_SESSION['customer_email'])){
                                    echo "
                                            
                                            <a class='links' href='c_logout.php'>Log Out</a>
                                        ";
                                }else{
                                    echo "
                                            
                                            <a class='links' href='c_login.php'>Log In</a>
                                        ";
                                    
                                }
                        ?>
                        
                </div>
    </div>