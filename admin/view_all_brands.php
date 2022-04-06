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
    <div id="page-wrapper"  >
        <div>
            <table class="table">
                <tr>
                    <th colspan="8"><center>
                        <h1 style="background:#f8f8f8;padding:5px;">All Brands</h1>
                        <?php 
                            if(isset($_GET['msg'])){
                                echo "<p style='color:red;font-size:1.5em;'>".$_GET['msg']."</p>";
                            }
                        ?>
                    </center></th>
                </tr>
                
                <tr>
                    <th>Brand No.</th>
                    <th>Brand Title</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                <?php
                    $get_BRAND=mysqli_query($con,"SELECT * FROM brands");
                    $p_no=1;
                    while($BRAND=mysqli_fetch_array($get_BRAND)){
                ?>
                <tr>
                    <td><?php echo $p_no; $p_no++;?></td>
                    <td><?=$BRAND['brand_title'];?></td>
                    <td><a href="edit_brand.php?edit_id=<?=$BRAND['brand_id'];?>">Edit</a></td>
                    <td><a href="delete_brand.php?del_id=<?=$BRAND['brand_id'];?>"><button class="btn btn-primary">Delete</button></a></td>
                </tr>
                
                <?php } ?>
            </table>
            
        </div>
            
        
        
        
    </div>            
<!---------------Content-Bar-End------------------------------------------------------------------------->    
</div>
</body>
</html>
