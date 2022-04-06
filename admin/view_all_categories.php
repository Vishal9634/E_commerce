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
                        <h1 style="background:#f8f8f8;padding:5px;">All Categories</h1>
                        <?php 
                            if(isset($_GET['msg'])){
                                echo "<p style='color:red;font-size:1.5em;'>".$_GET['msg']."</p>";
                            }
                        ?>
                    </center></th>
                </tr>
                
                <tr>
                    <th>Category No.</th>
                    <th>Category Title</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                <?php
                    $get_cat=mysqli_query($con,"SELECT * FROM categories");
                    $p_no=1;
                    while($CAT=mysqli_fetch_array($get_cat)){
                ?>
                <tr>
                    <td><?php echo $p_no; $p_no++;?></td>
                    <td><?=$CAT['cat_title'];?></td>
                    <td><a href="edit_category.php?edit_id=<?=$CAT['cat_id'];?>">Edit</a></td>
                    <td><a href="delete_category.php?del_id=<?=$CAT['cat_id'];?>"><button class="btn btn-primary">Delete</button></a></td>
                </tr>
                
                <?php } ?>
            </table>
            
        </div>
            
        
        
        
    </div>            
<!---------------Content-Bar-End------------------------------------------------------------------------->    
</div>
</body>
</html>
