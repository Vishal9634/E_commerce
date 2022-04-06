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
                        <h1 style="background:#f8f8f8;padding:5px;">DevShop Customers</h1>
                        <?php 
                            if(isset($_GET['msg'])){
                                echo "<p style='color:red;font-size:1.5em;'>".$_GET['msg']."</p>";
                            }
                        ?>
                    </center></th>
                </tr>
                
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Profile Picture</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Delete</th>                    
                </tr>
                <?php
                    $get_customers=mysqli_query($con,"SELECT * FROM customers");
                    $c_no=1;
                    while($CUSTOMER=mysqli_fetch_array($get_customers)){
                ?>
                <tr>
                    <td><?php echo $c_no; $c_no++;?></td>
                    <td><?=$CUSTOMER['customer_name'];?></td>                    
                    <td><?=$CUSTOMER['customer_email'];?></td>                    
                    <td>
                        <img src="../customer/images/<?=$CUSTOMER['customer_image'];?>" style="width:60px;height:60px;" class="img-responsive">
                    </td>
                    
                    <?php 
                        $country_id=$CUSTOMER['customer_country'];
                        $get_con=mysqli_query($con,"SELECT * FROM countries WHERE id='$country_id'");
                        $country=mysqli_fetch_array($get_con);
                    ?>
                    <td><?=$country['name'];?></td>
                    <td><?=$CUSTOMER['customer_state'];?></td>

                    <td>
                        <a href="delete_customer.php?del_id=<?=$CUSTOMER['customer_id'];?>"><button class="btn btn-danger">Delete</button></a>
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
