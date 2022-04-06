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
                    <th>Payment No.</th>
                    <th>Invoice No.</th>
                    <th>Amount Paid</th>
                    <th>Payment Method</th>
                    <th>Ref No.</th>
                    <th>Code</th>
                    <th>Payment Date</th>
                </tr>
                <?php
                    $get_payments=mysqli_query($con,"SELECT * FROM payments");
                    $p_no=1;
                    while($PAYMENTS=mysqli_fetch_array($get_payments))
                    {
                ?>
                <tr>
                    <td><?php echo $p_no; $p_no++;?></td>
                    <td><?=$PAYMENTS['invoice_no']?></td>
                    <td><?=$PAYMENTS['amount']?></td>
                    <td><?=$PAYMENTS['payment_mode']?></td>
                    <td><?=$PAYMENTS['ref_no']?></td>
                    <td><?=$PAYMENTS['code']?></td>
                    <td><?=$PAYMENTS['payment_date']?></td>
                    
                    
                </tr>
                
                <?php } ?>
            </table>
            
        </div>
            
        
        
        
    </div>      
<!---------------Content-Bar-End------------------------------------------------------------------------->    
</div>
</body>
</html>
