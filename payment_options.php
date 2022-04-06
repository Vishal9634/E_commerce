<?php
    session_start();
    if(empty($_SESSION['customer_email'])){
        echo "<script>window.open('c_login.php','_self');</script>";
    }
    $c_email=$_SESSION['customer_email'];
	include("includes/connection.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once('includes/head_items.php'); ?>
    <style>
        .img-responsive{
            display:inline;
        }
        @keyframes rgb_color{
            0%{color:red;}
            40%{color:green;}
            100%{color:blue;}
        }
       
    </style>
</head>
<body>
<!-----------Top-bar--------------------------------->
    <?php include_once('includes/top_bar.php'); ?>
<!--Main-div-header---------------------------------------------------------------------------------------> 
   <?php include_once('includes/nav_bar.php'); ?>
<!--Content-bar-------------------------------------------------------------------------------------------->		
<div class="container-fluid main_div" id="hello" style="padding:20px;">
    
    <div class="row" style="padding:10px;">
        <div class="container">
            <div class="col-md-6" style="border-right:2px solid #e5e7e9;">
                <div style="width:50%;height:auto;float:right">
                    <?php
                        $get_cart=mysqli_query($con,"SELECT * FROM cart WHERE added_by='$c_email'");
                        $no_of_pro=mysqli_num_rows($get_cart);
                        $total_qty=0;
                        $total_price=0;
                        while($REC_CART=mysqli_fetch_array($get_cart)){
                            $get_qty=$REC_CART['qty'];
                            $total_qty+=$get_qty;
                            $pId=$REC_CART['p_id'];
                            $pro=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM products WHERE product_id='$pId'"));
                            $pro_price=$pro['product_price'];
                            $total_price=$total_price+($pro_price*$get_qty);
                        }
                    ?>
                    <h3 style="color:#4f4747;margin-bottom:0px;">Total product:</h3>
                    <p style="color:#4f4747;margin-left:50%;font-size:2em"><i><?=$no_of_pro;?></i></p>
                    
                    <h3 style="color:#4f4747;margin-bottom:0px;">Quantity:</h3>
                    <p style="color:#4f4747;margin-left:50%;font-size:2em"><i><?=$total_qty;?></i></p>
                    
                    <h3 style="color:#4f4747;margin-bottom:0px;">Total Price:</h3>
                    <p style="color:#4f4747;margin-left:50%;font-size:2em"><i><span class="fa fa-rupee">. </span><?=$total_price;?></i></p>
                </div>            
            </div>
            <div class="col-md-6">
                <div style="width:60%;height:auto;float:left">
                    <h1 style="font-size:2em;color:#4f4747;margin-left:8%;"><i>Pay with </i></h1>

                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                          <!-- Identify your business so that you can collect the payments. -->
                          <input type="hidden" name="business" value="info@devshop.com">

                          <!-- Specify a Buy Now button. -->
                          <input type="hidden" name="cmd" value="_xclick">

                          <!-- Specify details about the item that buyers will purchase. -->
                          <input type="hidden" name="item_name" value="<?="Total products: ".$pro_title; ?>">
                          <input type="hidden" name="amount" value="<?=($pro_price/72.59);?>">
                          <input type="hidden" name="currency_code" value="USD">
                          <!-- Return and cancel return URLs -->
                          <input type="hidden" name="return" value="http://mydevshop.ga/paypal_success.php?pro_id=<?=$pro_id;?>&pro_qty=<?$qty;?>">
                          <input type="hidden" name="cancel_return" value="http://mydevshop.ga/paypal_cancel.php" >
                          <!-- Display the payment button. -->
                        
                              <center>
                                  <input type="image" name="submit" border="0" src="images/paypal_blue.png" alt="Buy Now" style="width:210px;height:45px;display:inline;border-radius:5px;border:1px solid blue; padding:2px;padding-top:3px">
                              </center>
                              <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                        
                    </form>

                    <center>
                        <h3 style="margin-top:0;margin-bottom:20px;">OR</h3>
                    </center>

                    <center>
                        <a href="orders.php?c_id=<?=$customer_id;?>" >
                            <h2 style="display:inline;border-radius:5px;border:1px solid blue; padding:2px;padding-top:3px">Payment offline</h2></a>
                    </center>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
