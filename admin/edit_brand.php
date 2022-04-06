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
                <?php
                    if(isset($_GET['edit_id'])){
                        $brand_id=$_GET['edit_id'];
                    }else{
                        $brand_id=null;
                    }
                    $get_brands=mysqli_query($con,"SELECT * FROM brands WHERE brand_id='$brand_id'");
                    $BRAND=mysqli_fetch_array($get_brands);                
                ?>
                <form action="edit_brand.php" method="post">
                    <label style="font-size:1.5em;color:gray;">Update Brand Name:</label>
                    <input type="text" name="brand_name" value='<?=$BRAND['brand_title'];?>' class="form-control" style="height:45px;margin-top:10px;">
                    <button type="submit" name="update" class="btn btn-success pull-right" style="margin-top:20px;width:200px;height:40px;;margin-right:30px;font-size:1.2em;">UPDATE NOW</button>
                    <input name="brand_id" value="<?=$BRAND['brand_id'];?>" style="display:none;">
                </form>
            </div>
        </div>
    </div>      
<!---------------Content-Bar-End------------------------------------------------------------------------->    
</div>
</body>
</html>
<?php
    if(isset($_POST['update'])){
        $brand_title=$_POST['brand_name'];
        $brand_id=$_POST['brand_id'];
        $update=mysqli_query($con,"UPDATE brands SET brand_title='$brand_title' WHERE brand_id='$brand_id'");
        if($update){
            echo "<script>window.open('view_all_brands.php?msg=You have updated successfully a new brand!','_self');</script>";    
        }

    }
?>