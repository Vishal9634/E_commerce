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
            if(isset($_GET['search']) ){
                $user_keyword=$_GET['user_query'];
                include_once('includes/connection.php');
                $get_products="select * from products where product_keyword like '%$user_keyword%'";
                $run_products=mysqli_query($con,$get_products);
                if(mysqli_num_rows($run_products)<1){
                    echo "<center><h1 style='coor:gray;opacity:0.3;font-weight:bold;'>Sorry, Results not found.</h1></center>";
                }
                echo "<div class='row'>";                
                $pro_box_optz=0;
                while($row_products=mysqli_fetch_array($run_products)){
                    $pro_id=$row_products['product_id'];
                    $pro_title=$row_products['product_title'];
                    $pro_cat=$row_products['cat_id'];
                    $pro_brand=$row_products['brand_id'];
                    $pro_desc=$row_products['product_desc'];
                    $pro_price=$row_products['product_price'];
                    $pro_image=$row_products['product_img1'];
                    echo "
                        <div class='col-md-2'>
                            <div class='well'>
                        ";
                            echo "<center><img src='admin/product_images/$pro_image' class='img-responsive'></center>";

                            if(strlen($pro_title)>35){
                                $cut_pro_title=substr($pro_title, 0, 35);
                                echo "<center><h4>$cut_pro_title...</h4></center>";
                            }else{
                                echo "<center><h4>$pro_title</h4></center>";
                            }

                            echo "        
                                <center>
                                    <span class='text-right'><span style='color:blue'>Price:</span><span class='fa fa-rupee'></span>$pro_price</span>
                                    <span><a href='details.php?pro_id=$pro_id'>Details</a></span> 
                                </center>
                                ";

                            echo "
                                <center>
                                    <a href='add_to_cart.php?add_cart=$pro_id'><button class='btn btn-danger btn-xs'>Buy Now</button></a>
                                    <a href='add_to_cart.php?add_cart=$pro_id'><button class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-shopping-cart'></span> Add to Cart</button></a>
                                </center>
                                ";             

                    echo "
                            </div>
                        </div>
                        ";
                $pro_box_optz+=1;
                if($pro_box_optz==6){
                    echo "</div>";
                    echo "<div class='row'>";
                    $pro_box_optz=0;
                }
            }/*while ends*/
            echo "</div>";
        }

?>    

    
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
