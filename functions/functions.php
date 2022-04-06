<?php include_once('includes/connection.php');?>


<?php
/*function for getting the IP address----------------------------------------------------------------------------------------*/
	function getRealIpAddr(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			//Check ip from internet
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			//To check ip pass from proxy
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
        return $ip;
	}
?>


<?php
/*creating thr script and Cart----------------------------------------------------------------------------------------*/
/*	function add_to_cart(){
        global $con;
		if(isset($_GET['add_cart'])){
            $cEmail=$_SESSION['customer_email'];
            $p_id=$_GET['add_cart'];
            
			$check_pro="SELECT * FROM cart WHERE added_by='$cEmail' AND p_id='$p_id'";
			$run_check=mysqli_query($con,$check_pro);
            
			if(mysqli_num_rows($run_check)==0){
				$run_q=mysqli_query($con,"INSERT INTO cart(p_id,added_by,qty) VALUES('$p_id','$cEmail','1')");
				header("Refresh:0");
             }
		}
	}*/
?>


<?php
/*Getting the number of items from the cart----------------------------------------------------------------------------------------*/
	function items(){
        global $con;
        if(!(empty($_SESSION['customer_email']))){
            $cEmail=$_SESSION['customer_email'];
            $get_items="SELECT * FROM cart WHERE added_by='$cEmail'";
            $run_items=mysqli_query($con,$get_items);
            echo $count_items=mysqli_num_rows($run_items);
        }else{
            echo "0";
        }
	}
?>


<?php
/*show product normally-------------------------------------------------------------------------*/
	function total_price(){
		global $con;
        $ip_add=getRealIpAddr();
		$total=0;

		$sel_price="SELECT * FROM cart WHERE ip_add='$ip_add'";
		$run_price=mysqli_query($con,$sel_price);
		while($record=mysqli_fetch_array($run_price)){
			$pro_id=$record['p_id'];

			$pro_price="SELECT * FROM products WHERE product_id='$pro_id'";
			$run_pro_price=mysqli_query($con,$pro_price);

			while($p_price=mysqli_fetch_array($run_pro_price)){
				$product_price=array($p_price['product_price']);
				$values=array_sum($product_price);
				$total+=$values;
			}


		}
		echo $total." Rs.";
	}
?>


<?php
/*Getting Product----------------------------------------------------------------------------------------*/
function getPro(){
    global $con;
    if( (!isset($_GET['cat']) AND !isset($_GET['brand'])) ){
            $get_products="select * from products order by rand() LIMIT 0,12";
            $run_products=mysqli_query($con,$get_products);
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
                                    <a href='details.php?pro_id=$pro_id'><button class='btn btn-danger btn-xs'>Buy Now</button></a>
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
    }/*getPro(); ends*/
    
}
?>

<?php
/*show product by brand--------------------------------------------------------------------------------------------------*/
function getAllPro(){
            global $con;
            $products="SELECT * FROM products ";
            $run_products=mysqli_query($con,$products);
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
                                    <a href='details.php?pro_id=$pro_id'><button class='btn btn-danger btn-xs'>Buy Now</button></a>
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
                
                
            }/*While ends*/
            echo "</div>";
}

?>

<?php
/*show product by category----------------------------------------------------------------------------------------------*/

function getCatPro(){
    global $con;    
    if(isset($_GET['cat'])){
        $cat_id=$_GET['cat'];
        $get_cat_pro="select * from products where cat_id='$cat_id' LIMIT 0,4";
        $run_cat_pro=mysqli_query($con,$get_cat_pro);
        $count=mysqli_num_rows($run_cat_pro);
        if($count==0)
            echo "<h2>No Products found in this category.</h2>";
        echo "<div class='row'>";
        $pro_box_optz=0;        
        while($row_products=mysqli_fetch_array($run_cat_pro)){
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
                                    <a href='details.php?pro_id=$pro_id'><button class='btn btn-danger btn-xs'>Buy Now</button></a>
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

        
    }/*cat products if body ends*/
}/*getCatPro() ends*/
?>


<?php
/*show product by brand--------------------------------------------------------------------------------------------------*/
function getBrandPro(){
    global $con;
    if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];
        $get_brand_pro="select * from products where brand_id='$brand_id'";
        $run_brand_pro=mysqli_query($con,$get_brand_pro);
        $count=mysqli_num_rows($run_brand_pro);
        if($count==0)
            echo "<h2>No Products found in this brand.</h2>";
        echo "<div class='row'>";
        $pro_box_optz=0;        
        while($row_products=mysqli_fetch_array($run_brand_pro)){
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
                                    <a href='details.php?pro_id=$pro_id'><button class='btn btn-danger btn-xs'>Buy Now</button></a>
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

}/*getBrandPro() Ends*/
?>




<?php
//Getting the brand of products
	function getBrands(){
        global $con;
		$get_brands="select * from brands";
		$run_brands=mysqli_query($con,$get_brands);
		while($row_brands=mysqli_fetch_array($run_brands)){
			$brand_id=$row_brands['brand_id'];
			$brand_title=$row_brands['brand_title'];
            echo "<li class='profile-li'><a class='profile-links' href='index.php?brand=$brand_id'>$brand_title</a></li>";
		}
	}
?>

<?php
//Getting the categorized of products
	function getCats(){
		global $con;
		$get_cats = "select * from categories";
		$run_cats=mysqli_query($con,$get_cats);
		while($row_cats=mysqli_fetch_array($run_cats)){
			$cat_id=$row_cats['cat_id'];
			$cat_title=$row_cats['cat_title'];
            echo "<li class='profile-li'><a class='profile-links' href='index.php?cat=$cat_id'>$cat_title</a></li>";
		}		
	}
?>