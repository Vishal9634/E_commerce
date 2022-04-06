<?php 
    session_start();
    if(empty($_SESSION['email'])){
        echo "<script>window.open('login.php','_self');</script>";
    }
    include('../includes/connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/head_items.php');?>
    <style>
        
    </style>
</head>
<body>
<div id="wrapper">
<!------Navbar-Header-sidebar---------->
    <?php include('includes/nav_sidebar.php');?>
<!---------------Content-Bar-Start----------------------------------------------------------------------->
    <div id="page-wrapper">
        <div>
            <table class="table">
                <tr>
                    <th colspan="8"><center>
                        <h1 style="background:#f8f8f8;padding:5px;">All Products</h1>
                        <?php 
                            if(isset($_GET['msg'])){
                                echo "<p style='color:red;font-size:1.5em;'>".$_GET['msg']."</p>";
                            }
                        ?>
                    </center></th>
                </tr>
                
                <tr>
                    <th>Product No.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Total Sold</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                <?php
                    $get_products=mysqli_query($con,"SELECT * FROM products");
                    $p_no=1;
                    while($PRODUCT=mysqli_fetch_array($get_products)){
                ?>
                <tr>
                    <td><?php echo $p_no; $p_no++;?></td>
                    
                    <?php
                        if(strlen($PRODUCT['product_title'])>25)
                            echo "<td>".substr($PRODUCT['product_title'], 0,25)."...</td>";
                        else
                            echo "<td>".$PRODUCT['product_title']."</td>";
                    ?>
                    
                    <td>
                        <img src="product_images/<?=$PRODUCT['product_img1'];?>" style="width:60px;height:60px;" class="img-responsive">
                    </td>
                    <td><span class='fa fa-rupee'>.</span><?=$PRODUCT['product_price'];?></td>
                
                    <?php
                            $_pid=$PRODUCT['product_id'];
                            $pending_order=mysqli_query($con,"SELECT * FROM pending_orders WHERE product_id='$_pid'");
                            echo "<td>".mysqli_num_rows($pending_order)."</td>";
                        
                    ?>
                    
                    
                    <td><?=$PRODUCT['product_status'];?></td>
                    <td><a href="edit_product.php?pro_id=<?=$PRODUCT['product_id'];?>">Edit</a></td>
                    <td><a href="delete_product.php?del_id=<?=$PRODUCT['product_id'];?>"><button class="btn btn-primary">Delete</button></a></td>
                </tr>
                
                <?php } ?>
            </table>
            
        </div>
            
        
        
        
    </div>      
<!---------------Content-Bar-End------------------------------------------------------------------------->    
</div>
</body>
</html>
