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
        .title_link,.title_link:hover{color:#302727;text-decoration: none}
        #my_btn{margin-left:15px;border:1px solid #e5e7e9;width:200px;height:40px;box-shadow:0px 1px 3px silver;}
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
        <?php
        $cEmail=$_SESSION['customer_email'];
        $get_cart=mysqli_query($con,"SELECT * FROM cart WHERE added_by='$cEmail'");
        $total_pro=mysqli_num_rows($get_cart);
        if($total_pro<=0){
            echo"<center><h2 style='color:#564444'>Your cart is empty</h2></center>";
        }else{
            $sub_total_price=0;
            while($cart_rec=mysqli_fetch_array($get_cart)){
                $p_id=$cart_rec['p_id'];
                $get_pro=mysqli_query($con,"SELECT * FROM products WHERE product_id='$p_id'");
                while($pro_rec=mysqli_fetch_array($get_pro)){
                    $p_id=$pro_rec['product_id'];
                    $p_title=$pro_rec['product_title'];
                    if(strlen($p_title)>50)
                        $p_title=substr($p_title, 0,50).'...';                
                    $p_img=$pro_rec['product_img1'];
                    $p_qty=$cart_rec['qty'];
                    $p_price=($pro_rec['product_price'])*$p_qty;
                    $sub_total_price+=$p_price;


            ?>        
                    <div class="col-md-4">
                        <form action="cart_action.php" method="get">
                            <div class="well" style="height:170px;">

                                <div style="width:20%;height:100px;float:left;">
                                    <img src="admin/product_images/<?=$p_img;?>" height="90" width="80" style="border:1px solid silver" class="img-responsive">
                                </div>

                                <div style="width:80%;float:right;padding-left:5px;">
                                    <a href="details.php?pro_id=<?=$p_id;?>" class="title_link">
                                        <h4 style="margin:1px;margin-bottom:5px;"><?=$p_title;?></h4>
                                    </a>
                                    <h4 style="color:gray;font-weight:500;display:inline;font-size:1.2em;">Qty</h4>
                                    <input name="new_qty" class="form-control" value="<?=$p_qty;?>" style="width:40px;height:25px;display:inline">&nbsp;&nbsp;
                                    <p style="color:#ff3b00;font-size:1.2em;display:inline"><span class='fa fa-rupee'>. </span><?=$p_price;?></p>
                                    <p style="color:green;font-size:1.2em;">In stock</p>
                                </div>

                                <div style="clear:both"></div>
                                <div style="width:100%;padding-top:2px;text-align:center;" >
                                    <!--Collecting data-->
                                    <input type="hidden" name="pro_id" value="<?=$p_id;?>">
                                    <!--buttons-->
                                    <button name="update" type="submit" class="btn btn-success btn-xs" style="margin-left:7px;margin-right:7px;">Update</button>
                                    <a href="buynow.php?pro_id=<?=$p_id;?>">
                                        <button class="btn btn-info btn-xs" style="margin-left:7px;margin-right:7px;">Buy Now</button>
                                    </a>
                                    <button name="remove" type="submit" class="btn btn-danger btn-xs" style="margin-left:7px;margin-right:7px;">Remove</button>

                                </div>
                            </div>
                        </form>
                    </div>        
            <?php
                }
            }
        }
        ?>
        
    </div>
    
    
    <div class="row">
        <div class="container-fluid"><hr></div>
        <div class="container">
            <?php
                if($total_pro>1){
                    echo "<spam style='font-size:1.7em;color:#564444;'>
                        <spam style='font-weight:bold;'>Price(</spam>$total_pro Items<spam style='font-weight:bold;'>):</spam> <span class='fa fa-rupee'>. </span>$sub_total_price
                        </spam>";
                }if($total_pro==1){
                    echo "<spam style='font-size:1.7em;color:#564444;'>
                        <spam style='font-weight:bold;'>Price(</spam>$total_pro Item<spam style='font-weight:bold;'>):</spam> <span class='fa fa-rupee'>. </span>$sub_total_price
                        </spam>";
                }
            ?>
            <a href="checkout.php">
                <button id="my_btn" class="pull-right" style="background:#fb641b;color:#fff">PLACE ORDER</button>
            </a>
            <a href="index.php">
                <button id="my_btn" class="pull-right" style="background:#fff;color:#302727;"><spam class="glyphicon glyphicon-menu-left" style="font-size:.9em"> </spam>CONTINUE SHOPPING</button>
            </a>
        </div>
    </div>
    
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
<?php
    



?>