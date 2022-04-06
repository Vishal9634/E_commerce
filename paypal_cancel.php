<?php
    @session_start();
    if(empty($_SESSION['customer_email'])){
        echo "<script>window.open('c_login.php?request2cart=1','_self');</script>";
    }
	include("includes/connection.php");
	include("functions/functions.php");
	$cEmail=$_SESSION['customer_email'];
	$get_customer=mysqli_query($con,"SELECT * FROM customers WHERE customer_email='$cEmail'");
	$customer=mysqli_fetch_array($get_customer);
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
<div class="container-fluid main_div" id="hello" style="padding:20px;">
        
    <center>
      <h2>You have cancelled the payment !</h2>
      
  </center>
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
