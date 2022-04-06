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
      <h2>Welcome, <strong><?=$customer['customer_name']; ?></strong></h2>
      <h3>Your have successfully paid for your products</h3>
      
      <?php
      	$customer_id=['customer_id'];
      	$p_id=$_REQUEST['pro_id'];
      	$p_qty=$_REQUEST['pro_qty'];
        $transaction_id = $_REQUEST['tx']; //paypal transaction ID
      	$amount = $_REQUEST['amt']; //paypal $received amount
      	$currency = $_REQUEST['cc']; //paypal received carrency type
        $insert_payment=mysqli_query($con,"INSERT INTO paypal_payments (transaction_no,amount,currency,product_id,customer_id,qty) VALUES('$transaction_id','$amount','$currency','$p_id','$customer_id','$p_qty')");
      	
      	
      ?>
        
  </center>
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
