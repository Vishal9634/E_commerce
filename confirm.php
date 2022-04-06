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

    if(isset($_GET['order_id']))
        $order_id=$_GET['order_id'];
    else
        $order_id=null;
    $get_details=mysqli_query($con,"SELECT * FROM customer_orders WHERE order_id='$order_id'");
    $details=mysqli_fetch_array($get_details);        
    
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

<style>
    .login-container{
        position: relative;
        width:50%;
        margin: 20px auto;
        padding: 20px 40px 40px;
        text-align: center;
        background: #fff;
        border: 1px solid #ccc;
    }
    
    .login-container::before,.login-container::after{
        content: "";
        position: absolute;
        width: 100%;height: 100%;
        top: 3.5px;left: 0;
        background: #fff;
        z-index: -1;
        -webkit-transform: rotateZ(5deg);
        -moz-transform: rotateZ(5deg);
        -ms-transform: rotateZ(5deg);
        border: 1px solid #ccc;

    }

    .login-container::after{
        top: 5px;
        z-index: -2;
        -webkit-transform: rotateZ(-2deg);
         -moz-transform: rotateZ(-2deg);
          -ms-transform: rotateZ(-2deg);
    }
   
    .my_label{
        display:block;
        text-align: left;
        color:#93a3b5;
        font-weight:500;
        margin-bottom:0px;
        padding-top: 2px;
        
    }
    .form-control:read-only { 
        background-color:white;
    }
    .table{
        border:2px solid black;
    }
    
</style>

</head>
<body onload="startDate()">
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
                            <a href="c_change_password.php" target="_blank">
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
           <div>          
               <div class="login-container">
                   <strong style="text-align:center;color:#93a3b5;font-size:24px;display:block;padding-bottom:5px;margin-top:-5px;"><span style="font-size:30px">C</span>onfirm your payment...<span class="glyphicon glyphicon-pencil"></span></strong>
                    <form action="confirm.php" method="POST">

                        <label class="my_label">Invoice No:</label>
                        <input type="text" name="invoice_no" value="<?=$details['invoice_no'];?>" class="form-control" required readonly>
                        <label class="my_label">Amount Sent:</label>
                        <input type="text" name="amount_sent" value="<?=$details['due_amount'];?>" class="form-control" required>
                        <label class="my_label">Select Payment Method:</label>
                        <select name="payment_method" class="form-control" style="color:#93a3b5;" required>
                            <option selected="selected">EasyPaisa/UBL Omni</option>
                            <option>Bank Transfer</option>
                            <option>Western Union</option>
                            <option>Paypal</option>
                        </select>
                        <label class="my_label">Transaction/Refference ID:</label>
                        <input type="text" name="ref_id" placeholder="" class="form-control" required>
                        <label class="my_label">Easypaisa/UBLOMNI code:</label>
                        <input type="text" name="pcode" placeholder="" class="form-control" required>
                        <label class="my_label">Payment Date:</label>
                        <?php 
                        if($order_id==null)
                            echo "<input type='text' name='date'  class='form-control' required readonly>";
                        else
                            echo "<input type='text' name='date' id='input_date' class='form-control' required readonly>";
                        ?>
                        <button class="btn btn-success btn-block login" type="submit" name="confirm" style="margin-top:15px;" >Confirm Payment</button>

                        <input type="text" name="order_id" value="<?=$order_id;?>" style="display:none;">
                    </form>
               </div>
           </div>

               <?php  
                if(isset($_POST['confirm'])){
                    $order_id=$_POST['order_id'];
                    $invoice_no=$_POST['invoice_no'];
                    $amount_sent=$_POST['amount_sent'];
                    $payment_method=$_POST['payment_method'];
                    $ref_id=$_POST['ref_id'];
                    $pcode=$_POST['pcode'];
                    $date=$_POST['date'];
                    
                    $ins_payment="INSERT INTO payments(payment_date,payment_mode,amount,invoice_no,ref_no,code) VALUES('$date','$payment_method','$amount_sent','$invoice_no','$ref_id','$pcode')";
                    $run_ins_payment=mysqli_query($con,$ins_payment);
                    
                    if($run_ins_payment){
                        echo "<center>
                            <h3>Thank You! Payment received, your order will be completed within 24 hours. </h3>
                            </center>
                        ";
                    }
                    
                    $update_customer_order=mysqli_query($con,"UPDATE customer_orders SET order_status='Complete' WHERE order_id='$order_id'");
                    
                    
                    
                    $update_pending_orders=mysqli_query($con,"UPDATE pending_orders SET order_status='Complete' WHERE order_id='$order_id'");
                }

               ?>
           


           
           
       </div>
    </div>
    
    
    
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
<script>
    function startDate() {
        var today = new Date();
        var h = checkTime(today.getHours());
        var m = checkTime(today.getMinutes());
        var s = checkTime(today.getSeconds());
        var yy = today.getFullYear();
        var mm = today.getMonth();
        var dd = today.getDate();
        document.getElementById('input_date').value =yy+"-"+mm+"-"+dd+" "+" "+h+":"+m+":"+s;
        var t = setTimeout(startDate,500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
</script>
