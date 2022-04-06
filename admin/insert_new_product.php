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
        #table_box{
            margin:auto;
            width:100%;
            padding-top: 20px;
        }
        #lbl_1{
            width: 15%;
            text-align:left;
            padding-left:20px;
            padding-right:5px;
            padding-bottom:10px;
        }
        #lbl_2{
            width:83%; 
            padding-bottom:10px;
        }
        
        
    </style>
</head>
<body>
<div id="wrapper">
<!------Navbar-Header-sidebar---------->
    <?php include('includes/nav_sidebar.php');?>
<!---------------Content-Bar-Start----------------------------------------------------------------------->
<div id="page-wrapper">
    <div id="table_box">
        <form method="post" action="insert_new_product.php" enctype="multipart/form-data">
            <table id="table1">
                <tr align="center">
                    <td colspan="2"><h1 style="font-weight:600;padding-bottom:10px;margin-top:5px;">Insert New Product</h1></td>
                </tr>
                <tr>
                    <td id="lbl_1"  align="right"><b>Product Title:</b></td>
                    <td id="lbl_2"><input class="form-control"  type="text" name="product_title" size="50"></td>
                </tr>
                <tr>
                    <td id="lbl_1" align="right"><b>Product Category:</b></td>
                    <td id="lbl_2">
                        <select class="form-control" name="product_cat">
                            <option>Select a Category</option>
                            <?php 
                                $get_cats="select * from categories";
                                $run_cats=mysqli_query($con,$get_cats);

                                while($row_cats=mysqli_fetch_array($run_cats)){
                                    $cat_id=$row_cats['cat_id'];
                                    $cat_title=$row_cats['cat_title'];
                                    echo "<option value=$cat_id>$cat_title</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td id="lbl_1" align="right"><b>Product Brand:</b></td>
                    <td id="lbl_2">
                        <select class="form-control" name="product_brand">
                            <option>Select a Brand</option>
                            <?php
                                $get_brands="select * from brands";
                                $run_brands=mysqli_query($con,$get_brands);

                                while($row_brands=mysqli_fetch_array($run_brands)){
                                    $brand_id=$row_brands['brand_id'];
                                    $brand_title=$row_brands['brand_title'];
                                    echo "<option value=$brand_id>$brand_title</option>";
                                }
                            ?>	
                        </select>
                    </td>
                </tr>
                <tr>
                    <td id="lbl_1" align="right">
                        <b>Product Image 1:</b>
                        <spna style="color:silver;padding-top:10px;padding-right:10px;"> (200x200)</spna>
                    </td>
                    <td id="lbl_2"><input class="form-control"  type="file" name="product_img1"></td>
                </tr>
                <tr>
                    <td id="lbl_1" align="right"><b>Product Image 2:</b>
                    <spna style="color:silver;padding-top:10px;padding-right:10px;"> (...x...)</spna>
                    </td>
                    <td id="lbl_2"><input class="form-control"  type="file" name="product_img2"></td>
                </tr>
                <tr>
                    <td id="lbl_1" align="right"><b>Product image 3:</b>
                    <spna style="color:silver;padding-top:10px;padding-right:10px;"> (...x...)</spna>
                    </td>
                    <td id="lbl_2"><input class="form-control"  type="file" name="product_img3"></td>
                </tr>
                <tr>
                    <td id="lbl_1" align="right"><b>Product Price:</b></td>
                    <td id="lbl_2"><input class="form-control"  type="text" name="product_price"></td>
                </tr>
                <tr>
                    <td id="lbl_1" align="right"><b>Product Description:</b></td>
                    <td id="lbl_2"><textarea class="form-control ckeditor" name="content" cols="46" rows="5"></textarea>
                </tr>

                <tr>
                    <td id="lbl_1" align="right"><b>Product Keywords:</b></td>
                    <td id="lbl_2"><input class="form-control"  type="text" name="product_keywords" size="50"></td>
                </tr>
                    <tr align="center">
                        <td colspan="2" style="padding-top:20px;">
                            <button style="width:25%;margin-right:10px;" class="btn btn-danger"  type="reset">CANCEL</button>
                            <button style="width:25%;margin-left:10px;" class="btn btn-success"  type="submit" name="insert_product">INSERT PRODUCT</button>
                        </td>
                </tr>
            </table>
        </form>
        
    </div> 
</div>
<!---------------Content-Bar-End------------------------------------------------------------------------->    
</div>
</body>
</html>

<?php
	if(isset($_POST['insert_product'])){

		$product_title=$_POST['product_title'];
		$product_cat=$_POST['product_cat'];
		$product_brand=$_POST['product_brand'];
		$product_price=$_POST['product_price'];
		$product_desc=$_POST['content'];
		$product_keywords=$_POST['product_keywords'];
		$status='on';
		//images names
		$product_img1=$_FILES['product_img1']['name'];
		$product_img2=$_FILES['product_img2']['name'];
		$product_img3=$_FILES['product_img3']['name'];
		//image temp name
		$temp_img1=$_FILES['product_img1']['tmp_name'];
		$temp_img2=$_FILES['product_img2']['tmp_name'];
		$temp_img3=$_FILES['product_img3']['tmp_name'];

		if($product_title=='' OR $product_brand=='' OR $product_price=='' OR $product_cat=='' OR $product_keywords=='' OR $product_desc=='' OR $product_img1==''){
			echo "<script>alert('please fill all the fields!')</script>";
			exit();
		}
		else{
		//uploading images to its folder
		move_uploaded_file($temp_img1,"product_images/$product_img1");
		move_uploaded_file($temp_img2,"product_images/$product_img2");
		move_uploaded_file($temp_img3,"product_images/$product_img3");

		$insert_product="insert into products (cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_status) values ('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$status')";
		$run_product=mysqli_query($con,$insert_product);

		if($run_product)
			echo "<script>alert('Product inserted successfully')</script>";
		}
	}
?>
