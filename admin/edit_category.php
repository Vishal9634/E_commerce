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
                        $cat_id=$_GET['edit_id'];
                    }else{
                        $cat_id=null;
                    }
                    $get_cat=mysqli_query($con,"SELECT * FROM categories WHERE cat_id='$cat_id'");
                    $CAT=mysqli_fetch_array($get_cat);                
                ?>
                <form action="edit_category.php" method="post">
                    <label style="font-size:1.5em;color:gray;">Update Categorye Name:</label>
                    <input type="text" name="cat_name" value='<?=$CAT['cat_title'];?>' class="form-control" style="height:45px;margin-top:10px;">
                    <button type="submit" name="update" class="btn btn-success pull-right" style="margin-top:20px;width:200px;height:40px;;margin-right:30px;font-size:1.2em;">UPDATE NOW</button>
                    <input name="cat_id" value="<?=$CAT['cat_id'];?>" style="display:none;">
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
        $cat_title=$_POST['cat_name'];
        $cat_id=$_POST['cat_id'];
        $update=mysqli_query($con,"UPDATE categories SET cat_title='$cat_title' WHERE cat_id='$cat_id'");
        if($update){
            echo "<script>window.open('view_all_categories.php?msg=You have updated successfully a new category!','_self');</script>";    
        }

    }
?>