<?php   
    @session_start(); 
    if(empty($_SESSION['customer_email'])){
        echo "<script>window.open('c_login.php','_self');</script>";
    }
    $c_email=$_SESSION['customer_email'];

?>



<?php
	include("includes/connection.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once('includes/head_items.php'); ?>
    
</head>
<body>
<!-----------Top-bar--------------------------------->
    <?php include_once('includes/top_bar.php'); ?>
<!--Main-div-header---------------------------------------------------------------------------------------> 
   <?php include_once('includes/nav_bar.php'); ?>
<!--Content-bar-------------------------------------------------------------------------------------------->
    <div class="main_div" id="hello" style="padding:20px;">
		

    <?php    
        
        $cEmail=$_SESSION['customer_email'];;
        $cart_data=mysqli_query($con,"SELECT * FROM cart WHERE added_by='$cEmail'");
        
        
        if(mysqli_num_rows($cart_data)==0){
            echo "<script>window.open('my_account.php?result=You have no any product in your cart','_self');</script>";
        }else{
            echo "<script>window.open('payment_options.php','_self')</script>";
        }
        
    ?>
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
