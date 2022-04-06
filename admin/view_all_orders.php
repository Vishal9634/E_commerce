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
        #content_div{
            width:100%;
            height:;
            overflow: auto;
            background: red;
        }
    </style>
</head>
<body>
<div id="wrapper">
<!------Navbar-Header-sidebar---------->
    <?php include('includes/nav_sidebar.php');?>
<!---------------Content-Bar-Start----------------------------------------------------------------------->
    <div id="page-wrapper"  id="content_div">
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
                    <th>Order No.</th>
                    <th>Product Title</th>
                    <th>Invoice No.</th>
                    <th>Ordered By</th>
                    <th>Product ID</th>
                    <th>QTY</th>
                    <th>Status</th>
                    <th>Delete</th>

                </tr>
                <?php
                    $get_ordered=mysqli_query($con,"SELECT * FROM pending_orders");
                    $sn=1;
                    while($ORDERED=mysqli_fetch_array($get_ordered)){
                ?>
                <tr>
                    <td><?php echo $sn; $sn++;?></td>
                    
                    <?php
                        $__pid=$ORDERED['product_id'];
                        $get_product=mysqli_query($con,"SELECT * FROM products WHERE product_id='$__pid'");
                        $PRODUCT=mysqli_fetch_array($get_product);
                        
                        if(strlen($PRODUCT['product_title'])>20)
                            echo "<td>".substr($PRODUCT['product_title'], 0,20)."...</td>";
                        else
                            echo "<td>".$PRODUCT['product_title']."</td>";
                    ?>

                    
                    <td><?=$ORDERED['invoice_no'];?></td>
                        <?php
                            $_c_id=$ORDERED['customer_id'];
                            $get_customer=mysqli_query($con,"SELECT * FROM customers WHERE customer_id='$_c_id'");
                            $_CUSTOMER=mysqli_fetch_array($get_customer);
                        ?>
                    <td><?=$_CUSTOMER['customer_email'];?></td>
                    <td><?=$ORDERED['product_id'];?></td>
                    <td><?=$ORDERED['product_qty'];?></td>
                    <td><?=$ORDERED['order_status'];?></td>
                    <td>
                        <a href="delete_order.php?del_id=<?=$ORDERED['serial_no'];?>"><button class="btn btn-primary">Delete</button></a>
                    </td>
                </tr>
                
                <?php } ?>
            </table>
            
        </div>
            
        
        
        
    </div>      
<!---------------Content-Bar-End------------------------------------------------------------------------->    
</div>
</body>
</html>
