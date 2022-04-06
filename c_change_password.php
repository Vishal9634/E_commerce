<?php
    session_start();
    if(empty($_SESSION['customer_email'])){
        echo "<script>window.open('c_login.php','_self');</script>";
    }
    $c_email=$_SESSION['customer_email'];
	include("includes/connection.php");
	include("functions/functions.php");
    $run_customer=mysqli_query($con,"SELECT * FROM customers WHERE customer_email='$c_email'")or die('Customer query execution faild');
    $customer=mysqli_fetch_array($run_customer);
?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once('includes/head_items.php'); ?>
<style>
    /* Profile container */
    .profile {
      margin: 20px 0;
    }

    /* Profile sidebar */
    .profile-sidebar {
      padding: 20px 0 10px 0;
      background: #fff;
        
    }

    .profile-userpic img {
      float: none;
      margin: 0 auto;
      width: 50%;
      height: 50%;
      -webkit-border-radius: 50% !important;
      -moz-border-radius: 50% !important;
      border-radius: 50% !important;
    }

    .profile-usertitle {
      text-align: center;
      margin-top: 20px;
    }

    .profile-usertitle-name {
      color: #5a7391;
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 7px;
    }

    
    .profile-usermenu {
      margin-top: 30px;
    }

    .profile-usermenu ul li {
      border-bottom: 1px solid #f0f4f7;
    }

    .profile-usermenu ul li:last-child {
      border-bottom: none;
    }

    .profile-usermenu ul li a {
      color: #93a3b5;
      font-size: 14px;
      font-weight: 400;
    }

    .profile-usermenu ul li a i {
      margin-right: 8px;
      font-size: 14px;
    }

    .profile-usermenu ul li a:hover {
      background-color: #fafcfd;
      color: #5b9bd1;
    }

    .profile-usermenu ul li.active {
      border-bottom: none;
    }

    .profile-usermenu ul li.active a {
      color: #5b9bd1;
      background-color: #f6f9fb;
      border-left: 2px solid #5b9bd1;
      margin-left: -2px;
    }

    /* Profile Content */
    .profile-content {
      padding: 20px;
      background: #fff;
      min-height: 460px;
    }
    
        
</style>
</head>
<body>
<!-----------Top-bar--------------------------------->
    <?php include_once('includes/top_bar.php'); ?>
<!--Main-div-header---------------------------------------------------------------------------------------> 
   <?php include_once('includes/nav_bar.php'); ?>
<!--Content-bar-------------------------------------------------------------------------------------------->		
<div class="container-fluid main_div" id="hello" style="padding-top:20px;padding-bottom:20px;">
   <div class="row">
       
        <div class="col-md-3" style="padding-left:2px;">
            <div class="profile-sidebar">
                
                <div class="profile-userpic">
                    <img src="http://localhost/MyBlog/user/profile_picture/default.jpeg" class="img-responsive" class="img-responsive" style="heght:100px;;width:100px;" alt="">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?=$customer['customer_name'];?>
                    </div>
                    
                </div>
                <div class="profile-usermenu">
                    <ul class="nav">
                        
                        <li class="active">
                            <a href="#">
                            <i style="font-size:20px;" class="fa fa-cart-arrow-down"></i>
                            My Orders </a>
                        </li>
                        <li>
                            <a href="c_profile.php">
                            <i style="font-size:20px;" class="fa fa-user-o"></i>
                            My Profile </a>
                        </li>
                        
                        <li>
                            <a href="c_change_password.php">
                            <i style="font-size:20px;" class="glyphicon glyphicon-pencil"></i>
                            Change my password </a>
                        </li>
                        <li>
                            <a href="c_logout.php">
                            <i style="font-size:20px;" class="	fa fa-power-off"></i>
                            Log Out </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>       
       
       
       <div class="col-md-8">
           
           <form action="" method="post">
               <center>
                   <h1>Change your password !</h1>
                   <hr>
                   <input name="old_p" type="password" class="form-control" placeholder="Enter Current Password" style="width:50%;text-align:center;margin-bottom:15px">
                   <input name="new_p1" type="password" class="form-control" placeholder="Enter New Password" style="width:50%;text-align:center;margin-bottom:15px">
                   <input name="new_p2" type="password" class="form-control" placeholder="Re-type New Password" style="width:50%;text-align:center;margin-bottom:15px">
                   <button name="save" type="submit" class="btn btn-success" style="width:50%">Save As Changes</button>
               </center>
           </form>
           
           
       </div>
    </div>
    
    
    
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
<?php
    if(isset($_POST['save'])){
        $current=$_POST['old_p'];
        $new1=$_POST['new_p1'];
        $new2=$_POST['new_p2'];
        
    }



?>