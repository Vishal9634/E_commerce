<?php
@session_start();
if(empty($_SESSION['customer_email'])){
    echo "<script>window.open('c_login.php?request2cart=1','_self');</script>";
}
include("includes/connection.php");
include("functions/functions.php");

if(isset($_GET['update'])){
    $pid=$_GET['pro_id'];
    $qty=$_GET['new_qty'];
    $cEmail=$_SESSION['customer_email'];
    $update_qry=mysqli_query($con,"UPDATE cart SET qty='$qty' WHERE (added_by='$cEmail' AND p_id='$pid')") or die("cart-query updating error ");
    echo "<script>window.open('testing.php','_self');</script>";
        
}

if(isset($_GET['remove'])){
    $pid=$_GET['pro_id'];
    $cEmail=$_SESSION['customer_email'];
    $delete_pro=mysqli_query($con,"DELETE FROM cart WHERE (added_by='$cEmail' AND p_id='$pid')");
    echo "<script>window.open('testing.php','_self');</script>";
}

if(isset($_GET['buynow'])){
    $pid=$_GET['pro_id'];
    echo "<script>window.open('details.php?pro_id=$pid','_self');</script>";
}




?>