<?php 
    session_start();
    if(empty($_SESSION['email'])){
        echo "<script>window.open('login.php','_self');</script>";
    }
    include('../includes/connection.php');
    if(isset($_GET['pro_id']))
        $pro_id=$_GET['pro_id'];
    else
        $pro_id=null;
    $get_product=mysqli_query($con,"SELECT * FROM products WHERE product_id='$pro_id'");
    $PRODUCT=mysqli_fetch_array($get_product);
    
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
            width:15%;
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
        <form method="post" action="edit_product.php" enctype="multipart/form-data">
            <table id="table1">
                <tr align="center">
                    <td colspan="2"><h1 style="font-weight:600;padding-bottom:10px;margin-top:5px;">Upadating Product</h1></td>
                </tr>
                <tr>
                    <td id="lbl_1"  align="right"><b>Product Title:</b></td>
                    <td id="lbl_2"><input class="form-control"  type="text" name="product_title"  value="<?=$PRODUCT['product_title'];?>" size="50" required></td>
                </tr>
                <tr>
                    <td id="lbl_1" align="right"><b>Product Category:</b></td>
                    <td id="lbl_2">
                        <select class="form-control" name="product_cat" required>
                            <?php 
                            $cat_id=$PRODUCT['cat_id'];
                            $get_cat=mysqli_query($con,"SELECT * FROM categories WHERE cat_id='$cat_id'");
                            $cat=mysqli_fetch_array($get_cat);
                            $cat_id=$cat['cat_id'];
                            $cat_title=$cat['cat_title'];
                            echo "<option selected='selected' value='$cat_id'>$cat_title</option>";
                        
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
                        <select class="form-control" name="product_brand" required>
                            <?php
                            $brand_id=$PRODUCT['brand_id'];
                            $get_brand=mysqli_query($con,"SELECT * FROM brands WHERE brand_id='$brand_id'");
                            $brand=mysqli_fetch_array($get_brand);
                            $brand_id=$brand['brand_id'];
                            $brand_title=$brand['brand_title'];
                            echo "<option selected='selected' value='$brand_id'>$brand_title</option>";
                                
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
                    <td id="lbl_1" align="right"><b>Product Price:</b></td>
                    <td id="lbl_2"><input class="form-control"  type="text" name="product_price"  value="<?=$PRODUCT['product_price'];?>" required></td>
                </tr>
                <tr>
                    <td id="lbl_1" align="right"><b>Product Description:</b></td>
                    <td id="lbl_2">
                        <textarea class="form-control ckeditor" name="content" cols="46" rows="5" required><?=$PRODUCT['product_desc'];?>"</textarea>
                    </td>
                </tr>


                <tr>
                    <td id="lbl_1" align="right"><b>Product Keywords:</b></td>
                    <td id="lbl_2"><input class="form-control"  type="text" name="product_keywords"  size="50" value="<?=$PRODUCT['product_keyword'];?>" required></td>
                </tr>
                <tr>
                    <td id="lbl_1" align="right"><b>Product Status:</b></td>
                    <td id="lbl_2">
                        <select class="form-control"  name="product_status" required>
                            <option  selected="selected" value="<?=$PRODUCT['product_status'];?>"><?=$PRODUCT['product_status'];?></option>
                            <option >On</option>
                            <option >Off</option>
                            
                        </select>
                    </td>
                </tr>
                    <tr align="center">
                        <td colspan="2" style="padding-top:20px;">
                            <button style="width:25%;margin-right:10px;" class="btn btn-danger"  type="reset">CANCEL</button>
                            <button style="width:25%;margin-left:10px;" class="btn btn-success"  type="submit" name="update_product">UPDATE PRODUCT</button>
                        </td>
                </tr>
            </table>
            <input name="product_id" value="<?=$PRODUCT['product_id'];?>" style="display:none;" >
        </form>
        
    </div> 
</div>
<!---------------Content-Bar-End------------------------------------------------------------------------->    
</div>
</body>
</html>
<?php
    
	if(isset($_POST['update_product'])){
        $product_id=$_POST['product_id'];
		$product_title=$_POST['product_title'];
		$product_cat=$_POST['product_cat'];
		$product_brand=$_POST['product_brand'];
		$product_price=$_POST['product_price'];
		$product_desc=$_POST['content'];
		$product_keywords=$_POST['product_keywords'];
		$product_status=$_POST['product_status'];
		
		$insert_product="UPDATE products SET cat_id='$product_cat',brand_id='$product_brand',date=NOW(),product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_keyword='$product_keywords',product_status='$product_status' WHERE product_id='$product_id'";
		
        $run_product=mysqli_query($con,$insert_product) or die("errooorrrrrrrrrrrrr");

		if($run_product)
			echo "<script>window.open('view_all_products.php?msg=Product updated successfully !','_self');</script>";
		
	}
?>
