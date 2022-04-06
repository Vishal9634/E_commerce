<?php
    session_start();
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
        
        if(isset($_GET['pro_id'])){
            $product_id=$_GET['pro_id'];
            include_once('includes/connection.php');
            $get_products="select * from products WHERE product_id=$product_id";
            $run_products=mysqli_query($con,$get_products);
            while($row_products=mysqli_fetch_array($run_products)){
                $pro_id=$row_products['product_id'];
                $pro_title=$row_products['product_title'];
                $pro_cat=$row_products['cat_id'];
                $pro_brand=$row_products['brand_id'];
                $pro_desc=$row_products['product_desc'];
                $pro_price=$row_products['product_price'];
                $pro_image1=$row_products['product_img1'];
                $pro_image2=$row_products['product_img2'];
                $pro_image3=$row_products['product_img3'];
                echo "
                    <div id='single_product'>
                        <h4>$pro_title</h4>
                        <img src='admin/product_images/$pro_image1' width='250' height='250'/>
                        <img src='admin/product_images/$pro_image2' width='250' height='250'/>
                        <img src='admin/product_images/$pro_image3' width='250' height='250'/>

                        <p><i>Price: </i><b>Rs.$pro_price</b></p>
                        <p>$pro_desc</p>
                        ";
              ?>
  
                        
  
			<?php
	              echo "</div>";
                }
            }
               ?>
             	<div class="row">
                    <!--Paypal payments start-->
                    <?php
                        $cart_rec=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM cart WHERE p_id='$pro_id'"));
                        $qty=$cart_rec['qty'];
                    ?>
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
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                              <a href="add_to_cart.php?add_cart=<?=$pro_id;?>">
                                  <img src="images/addtocart_logo.jpg" class="img-responsive" style="width:240px;height:60px;display:inline;margin-top:-50px;">
                              </a>
                              <input type="image" name="submit" border="0" src="images/checkout_logo.jpg" alt="Buy Now" style="width:240px;height:60px;display:inline;">
                              <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                        </div>
                      </form>
                    <!--paypal payments ends-->
                </div> 
                          	
    
    
    
    
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
