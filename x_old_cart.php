<?php
    @session_start();
    if(empty($_SESSION['customer_email'])){
        echo "<script>window.open('c_login.php?request2cart=1','_self');</script>";
    }
    
	include("includes/connection.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once('includes/head_items.php'); ?>
    <style>
        .cart_table{width: 100%;border-radius: 50px;}
        .cart_table>tbody>tr{background:linear-gradient(to bottom,silver,white);border:1px solid gray;border-radius: 50px;}
        .cart_table>tbody>tr>td{padding:5px 20px;line-height:0px;}
        table>thead>tr>th{background:#e3e5e7;font-weight: bold;padding:10px 20px;border:2px solid #e3e5e7;}
        table>tbody>tr>td{padding:2px 20px;}
        table>tbody>tr{border:1px solid #e3e5e7;}
        table>tbody>tr:hover{background:#f5f7f9;}
        input[type=checkbox]{zoom:1.5;}
        #cbtn{width:200px;}
        #c_btn_row,#c_btn_row:hover{border:0;background:none;}
        table{color:gray;}
        
    </style>
</head>
<body>
<!-----------Top-bar--------------------------------->
    <?php include_once('includes/top_bar.php'); ?>
<!--Main-div-header---------------------------------------------------------------------------------------> 
   <?php include_once('includes/nav_bar.php'); ?>
<!--Content-bar-------------------------------------------------------------------------------------------->		
<div class="container-fluid main_div" id="hello" style="padding:20px;">
    <div class="row">
        <div class="col-md-8">
            <div  style="padding-left:10px;">
                <form action="cart.php" method="post" enctype="multipart/form-data">
                    <table class="table" style="width:100%">
                        <thead>
                            <tr>                    
                                <th style="width:100px;">Remove</th>
                                <th>Products</th>
                                <th>Quantity</th>
                                <th style="width:150px;">Total Price</th>
                            </tr> 
                            <?php
                                $cEmail=$_SESSION['customer_email'];
                                $total=0;
                                $sel_price="SELECT * FROM cart WHERE added_by='$cEmail'";
                                $run_price=mysqli_query($con,$sel_price);
                                while($row=mysqli_fetch_array($run_price)){
                                    $pro_id=$row['p_id'];
                                    $pro_price="SELECT * FROM products WHERE product_id='$pro_id'";
                                    $run2=mysqli_query($con,$pro_price);
                                    while($rec=mysqli_fetch_array($run2)){
                                        $price_of_total_qty=($row['qty'])*($rec['product_price']);
                                        $product_price=array($rec['product_price']);
                                        $product_title=$rec['product_title'];
                                        $product_img=$rec['product_img1'];
                                        $values=array_sum($product_price);
                                        $total+=$values;
                            ?>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" ></td>
                                <td>
                                    <?php
                                    if(strlen($product_title)>20){
                                                $cut_product_title=substr($product_title, 0, 20);
                                                echo "<h4>$cut_product_title...</h4>";
                                            }else{
                                                echo "<h4>$product_title</h4>";
                                            }
                                    ?>
                                    <br><img src="admin/product_images/<?php echo $product_img; ?>" width="80" height="80" class="img-responsive" style="margin-top:-20px;">
                                </td>
                                <td><input type="text" name="qty[]" value="<?=$row['qty'];?>" size="1"></td>

                                <td><span style="font-size:1.5em;">₹.</span><?=$price_of_total_qty; ?></td>
                            </tr>
                        <?php }} ?>
                            <tr>
                                <td colspan="4" style="text-align:center;"><h3><font face="roboto">
                <?php 
                    $cEmail=$_SESSION['customer_email'];
                    $cart_run=mysqli_query($con,"SELECT * FROM cart WHERE added_by='$cEmail'");
                    $sub_total_price=0;
                                    
                    while($row=mysqli_fetch_array($cart_run)){
                        $qty=$row['qty'];  
                        $p_id=$row['p_id'];
                        
                        $run_pro=mysqli_query($con,"SELECT * FROM products WHERE product_id='$p_id'");
                        $row1=mysqli_fetch_array($run_pro);
                        $p_price=$row1['product_price'];
                        $temp_price=$qty*$p_price;
                        $sub_total_price+=$temp_price; 
                    }
                ?>
                                <strong>Sub Total Price: </strong></font><span style="font-size:1.2em">₹.</span><?php echo $sub_total_price; ?></h3></td>
                            </tr>
                            
                            <tr id="c_btn_row">
                                <br>
                                <td style="padding-top:15px;" colspan="4" >
                                        <center>
                                            <button id="cbtn" type="submit" class="btn btn-danger" name="update">Update Cart</button>
                                            &nbsp;&nbsp;&nbsp;
                                            <a href="index.php">
                                                <button id="cbtn" type="button" class="btn btn-success" name="continue">Continue Shopping</button>
                                            </a>
                                            &nbsp;&nbsp;&nbsp;
                                            <a href="checkout.php">
                                                <button id="cbtn" type="button" class="btn btn-warning" >Checkout</button>
                                            </a>
                                        </center>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php
                    if(isset($_POST['update'])){
                        include_once('includes/connection.php');
                        $cEmail=$_SESSION['customer_email'];
                            if(isset($_POST['qty'])){
                                $run_cart=mysqli_query($con,"SELECT * FROM cart WHERE added_by='$cEmail'");
                                /*loop start for updating*/
                                foreach($_POST['qty'] as $value){
                                    /*p_id from cart*/
                                    $row=mysqli_fetch_array($run_cart);
                                    $prod_id=$row['p_id'];
                                    $run_qty=mysqli_query($con,"UPDATE cart SET qty='$value'  WHERE p_id='$prod_id'");

                                }
                                if($run_qty){
                                    echo "<script>window.open('cart.php','_SELF');</script>";
                                }
                            }
                        }
                ?>
                <?php
                    if(isset($_POST['update'])){
                        include_once('includes/connection.php');
                        if(isset($_POST['remove'])){
                            foreach($_POST['remove'] as $remove_id){
                                $del_products="DELETE FROM cart WHERE p_id='$remove_id'";
                                $run_del=mysqli_query($con,$del_products);  
                                if($run_del){
                                    echo "<script>window.open('cart.php','_SELF');</script>";
                                }
                            }
                        }
                    }
                ?>
            </div>
        </div>
        <div class="col-md-4">
            
            
            
        
        
        </div>
    </div>
    
    
    
    
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
