<?php
    @session_start(); 
    if(empty($_SESSION['customer_email'])){
        echo "<script>window.open('c_login.php','_self');</script>";
    }
    $cEmail=$_SESSION['customer_email'];

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
<div class="container-fluid main_div" id="hello" style="padding:20px;">
    <?php
        if(isset($_GET['c_id'])){
            $customer_id=$_GET['c_id'];
            
           	/*Getting products price and total number of products*/
                $cEmail=$_SESSION['customer_email'];
                $total=0;
            
                $run_cart=mysqli_query($con,"SELECT * FROM cart WHERE added_by='$cEmail'")or die(mysqli_error($run_price));
                while($cart_rec=mysqli_fetch_array($run_cart)){
                    $pro_id=$cart_rec['p_id'];
                    $run_pro_price=mysqli_query($con,"SELECT * FROM products WHERE product_id='$pro_id'");
                    while($pro_rec=mysqli_fetch_array($run_pro_price)){
                        $p_price=array($pro_rec['product_price']);
                        $values=array_sum($p_price);
                        $total+=$values;
                        
                    }
                }
            /*Determining some values*/    
                $status='Pending';
                $invoice_no=mt_rand();
                $total_cart_products=mysqli_num_rows($run_cart);
            /*getting quantity from the cart*/
                $sub_total_price=0;
                $run_get_cart=mysqli_query($con,"SELECT * FROM cart WHERE added_by='$cEmail'");
                while($get_cart_rec=mysqli_fetch_array($run_get_cart)){
                    $_p_id=$get_cart_rec['p_id'];
                    $_p_qty=$get_cart_rec['qty'];
                    
                    $_run_pro_price=mysqli_query($con,"SELECT * FROM products WHERE product_id='$_p_id'");
                    $_pro_rec=mysqli_fetch_array($_run_pro_price);
                    
                    $_pro_price=$_pro_rec['product_price'];
                    $sub_total_price+=$_p_qty *  $_pro_price;
                }
            
                /*inserting data into tables*/
                $ins_order="INSERT INTO customer_orders(customer_id,due_amount,invoice_no,total_products,order_date,order_status) VALUES('$customer_id','$sub_total_price','$invoice_no','$total_cart_products',NOW(),'$status');";
                $run_order=mysqli_query($con,$ins_order)or die('Failed, execution of $ins_order query');
            
                if($run_order){
                    
                    
                    $get_recently_order=mysqli_query($con,"SELECT * FROM customer_orders WHERE customer_id='$customer_id' AND invoice_no='$invoice_no'");
                    $recently_order=mysqli_fetch_array($get_recently_order);
                    $recently_order_id=$recently_order['order_id'];
                    
                    $_get_cart=mysqli_query($con,"SELECT * FROM cart WHERE added_by='$cEmail'");
                    while($_get_cart_rec=mysqli_fetch_array($_get_cart)){
                        $__p_id = $_get_cart_rec['p_id'];
                        $__p_qty= $_get_cart_rec['qty'];
                        
                        $ins_pending_order="INSERT INTO pending_orders(order_id,customer_id,invoice_no,product_id,product_qty,order_status) VALUES('$recently_order_id','$customer_id','$invoice_no','$__p_id','$__p_qty','$status')";    
                        $run_pending_order=mysqli_query($con,$ins_pending_order)or die('Failed, execution of $ins_pending_order query');
                        
                        
                        
                        
                        
                    }
                    
                    
                    $empty_cart=mysqli_query($con,"DELETE FROM cart WHERE added_by='$cEmail'");
                    /*--------mailing-----------*/
                    
                    $get_customer=mysqli_query($con,"SELECT * FROM customers WHERE customer_id='$customer_id'");
                    
                    $_customer=mysqli_fetch_array($get_customer);
                    $to=$_customer['customer_email'];
                    $from='HaxSantosh@gmail.com';
                    $sub='Order Deatails';
                    $message="
                        <html>
                            <p>Hello dear <strong></strong>, you have ordered some products on our website www.DevShop.com, please find your oreder details bellow and pay the dues as soon as possible, so we can proceed your order. <strong>Thank you!</strong></p>
                            <table width='600' align='center' bgcolor='#FFCC99' border='1'>
                                <tr>
                                    <td><h2>Your Order Details from www.DevShop.com</h2></td>
                                </tr>
                                <tr>
                                    <th>Invoice No:</th><td>$invoice_no</td>
                                </tr>
                                <tr>
                                    <th>Total Products:</th><td>$total_cart_products</td>
                                </tr>
                                <tr>
                                    <th>Due Amount:</th><td>$sub_total_price</td>
                                </tr>
                                <tr>
                                    <th>Invoice No.</th>
                                </tr>
                                
                            </table>
                            <h4>Please go to your account and pay the dues. <a href='devshop.com'>click here</a> to login to your account</h4>
                            <h3>Thank you for order on - www.DevShop.com</h3>
                        </html>
                    ";
                    
                    
                    
                    echo "<script>alert('Thank You! Order successfully submitted');</script>";
                    echo "<script>window.open('my_account.php','_self');</script>";
                    
                }
                
                
                mail($to,$sub,$message,$from);
            
                
         
            
            
            
            
            
            
            
        }    
    ?>
    
    
    
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
