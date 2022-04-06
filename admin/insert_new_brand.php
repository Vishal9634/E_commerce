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
            width:50%;
            margin: auto;
            padding-top:200px;
            
            
        }
        .cat_div{
            width:100%;
            padding:30px 50px;
            height:auto;
            border-radius:7px;
            background:linear-gradient(to bottom,#f8f8f8,white);
        }
    </style>
</head>
<body>
<div id="wrapper">
<!------Navbar-Header-sidebar---------->
    <?php include('includes/nav_sidebar.php');?>
<!---------------Content-Bar-Start----------------------------------------------------------------------->
    <div id="page-wrapper">
        <div  id="content_div">
            <div class="cat_div">
                <form action="insert_new_brand.php" method="post">
                    <label style="font-size:1.5em;color:gray;">Enter Brand Name:</label>
                    <input type="text" name="brand_name" class="form-control" style="height:45px;margin-top:10px;">
                    <button type="submit" name="insert" class="btn btn-success pull-right" style="margin-top:20px;width:200px;height:40px;;margin-right:30px;font-size:1.2em;">INSERT NOW</button>
                </form>
            </div>
        </div>
    </div>      
<!---------------Content-Bar-End------------------------------------------------------------------------->    
</div>
</body>
</html>
<?php
    if(isset($_POST['insert'])){
        $brand_title=$_POST['brand_name'];
        $insert=mysqli_query($con,"INSERT INTO brands(brand_title) VALUE('$brand_title')");
        if($insert){
            echo "<script>window.open('view_all_brands.php?msg=You have added successfully a new brand!','_self');</script>";    
        }

    }
?>